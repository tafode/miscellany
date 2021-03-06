<?php

namespace App\Jobs;

use App\Models\Campaign;
use App\Notifications\Header;
use App\Services\EntityService;
use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Http\File;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use ZipArchive;
use Exception;

class CampaignExport implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * The number of times the job may be attempted.
     *
     * @var int
     */
    public $tries = 1;

    /**
     * @var Campaign
     */
    protected $campaign;

    /**
     * @var User
     */
    protected $user;

    /**
     * @var EntityService
     */
    protected $entity;

    /**
     * CampaignExport constructor.
     * @param Campaign $campaign
     * @param User $user
     * @param EntityService $entityService
     */
    public function __construct(Campaign $campaign, User $user, EntityService $entityService)
    {
        $this->campaign = $campaign;
        $this->user = $user;
        $this->entity = $entityService;
    }

    /**
     * Execute the job
     * @throws Exception
     */
    public function handle()
    {
        // If the campaign already has a backup, remove it.
        if (!empty($this->campaign->export_path)) {
            Storage::delete($this->campaign->export_path);
            $this->campaign->export_path = null;
            $this->campaign->save();
        }

        // We want the full path for jobs running in the queue.
        $zipName = 'campaign_' . $this->campaign->id . '_' .  uniqid() . '_' . date('Ymd_His') . '.zip';
        $pathName = storage_path() . '/exports/campaigns/' . $zipName;
        $zip = new ZipArchive();
        $zip->open($pathName, ZipArchive::CREATE);

        // Campaign
        $zip->addFromString('campaign.json', $this->campaign->toJson());
        if (!empty($this->campaign->image) && Storage::exists($this->campaign->image)) {
            $zip->addFromString($this->campaign->image, Storage::get($this->campaign->image));
        }

        foreach ($this->entity->entities() as $entity => $class) {
            if ($this->campaign->enabled($entity) && method_exists($class, 'export')) {
                try {
                    $property = Str::camel($entity);
                    foreach ($this->campaign->$property()->with('entity')->get() as $model) {
                        $zip->addFromString($entity . '/' . Str::slug($model->name) . '.json', $model->export());
                        if (!empty($model->image) && Storage::exists($model->image)) {
                            $zip->addFromString($model->image, Storage::get($model->image));
                        }

                        // Locations have maps
                        if ($model->getEntityType() == 'location' && !empty($model->map)
                            && Storage::exists($model->map)) {
                            $zip->addFromString($model->map, Storage::get($model->map));
                        }
                    }
                } catch (Exception $e) {
                    $zip->close();
                    unlink($pathName);
                    throw new Exception(
                        'Missing campaign entity relation: ' . $entity . '-' . $class . '? '
                        . $e->getMessage()
                    );
                }
            }
        }

        // Save all the content.
        $zip->close();

        // Move to ?
        $downloadPath = Storage::putFileAs('exports/campaigns', new File($pathName), $zipName, 'public');
        //$zip->delete();
        unlink($pathName);

        // Email ?
        $this->user->notify(new Header(
            'campaign.export',
            'download',
            'green',
            ['link' => Storage::url($downloadPath), 'time' => 60]
        ));

        // Save the new path.
        $this->campaign->export_path = $downloadPath;
        $this->campaign->save();

        // Don't delete in "sync" mode as there is no delay.
        $queue = config('queue.default');
        if ($queue != 'sync') {
            CampaignExportCleanup::dispatch($this->campaign)->delay(now()->addMinutes(60));
        }
    }

    /**
     *
     */
    public function failed(Exception $exception)
    {
        // Set the campaign export date to null so that the user can try again.
        // If it failed once, trying again won't help, but this might motivate
        // them to report the error.
        $this->campaign->update([
            'export_date' => null
        ]);

        // Notify the user that something went wrong
        $this->user->notify(new Header(
            'campaign.export_error',
            'times',
            'red'
        ));

        // Sentry will handle the rest
    }
}
