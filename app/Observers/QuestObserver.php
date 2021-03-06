<?php

namespace App\Observers;

use App\Models\MiscModel;
use App\Models\Quest;

class QuestObserver extends MiscObserver
{
    /**
     * @param Quest $model
     */
    public function deleting(MiscModel $model)
    {
        /**
         * We need to do this ourselves and not let mysql to it (set null), because the plugin wants to delete
         * all descendants when deleting the parent, which is stupid.
         * @var Quest $sub
         */
        foreach ($model->quests as $sub) {
            $sub->quest_id = null;
            $sub->save();
        }

        // We need to refresh our foreign relations to avoid deleting our children nodes again
        $model->refresh();
    }
}
