<?php

namespace App\Models;

use App\Scopes\RecentScope;
use Illuminate\Database\Eloquent\Model;
use Sofa\Eloquence\Eloquence;
use DateTime;

abstract class MiscModel extends Model
{
    /**
     * Eloquence trait for easy search
     */
    //use Eloquence;

    /**
     * Entity type
     * @var
     */
    protected $entityType;

    /**
     * Entity image path
     * @var
     */
    public $entityImagePath;

    /**
     * Create a short name for the interface
     * @return mixed|string
     */
    public function shortName()
    {
        if (strlen($this->name) > 30) {
            return '<span title="' . e($this->name) . '">' . substr(e($this->name), 0, 28) . '...</span>';
        }
        return $this->name;
    }

    /**
     * Scope a query to only include users of a given type.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param mixed $type
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeSearch($query, $term)
    {
        $searchFields = $this->searchableColumns;

        return $query->where(function($q) use ($term, $searchFields) {
            foreach ($searchFields as $field) {
                $q->orWhere($field, 'like', "%$term%");
            }
        });
    }

    /**
     * @param $query
     * @return mixed
     */
    public function scopeRecent($query)
    {
        return $query->orderBy('updated_at', 'desc');
    }

    /**
     * @param $query
     * @param $field
     * @return mixed
     */
    public function scopeOrder($query, $field, $desc = false)
    {
        $order = $desc ? 'desc' : 'asc';

        if (!empty($field)) {
            $segments = explode('.', $field);
            if (count($segments) > 1) {
                $relation = $this->{$segments[0]}();
                //dd($relation->getForeignKey());
                $foreignName = $relation->getQuery()->getQuery()->from;
                return $query->join($foreignName . ' as f', 'f.id', $relation->getForeignKey())
                    ->orderBy('f.' . $field, $order);
            } else {
                return $query->orderBy($field, $order);
            }
        } else {
            return $query->orderBy('name', $order);
        }
    }

    /**
     * @param string $field
     * @param bool $full
     * @return string
     */
    public function elapsed($field = 'updated_at', $full = false)
    {
        $now = new DateTime;
        $ago = new DateTime($this->$field);
        $diff = $now->diff($ago);

        $diff->w = floor($diff->d / 7);
        $diff->d -= $diff->w * 7;

        $string = array(
            'y' => 'year',
            'm' => 'month',
            'w' => 'week',
            'd' => 'day',
            'h' => 'hour',
            'i' => 'minute',
            's' => 'second',
        );
        foreach ($string as $k => &$v) {
            if ($diff->$k) {
                $v = $diff->$k . ' ' . trans('datetime.' . ($v . ($diff->$k > 1 ? 's' : '')));
            } else {
                unset($string[$k]);
            }
        }

        if (!$full) {
            $string = array_slice($string, 0, 1);
        }
        // Formatting
        if ($string) {
            return  trans('datetime.elapsed_ago', ['duration' => implode(', ', $string)]);
        }
        return trans('datetime.just_now');
    }


    /**
     * Get the image (or default image) of an entity
     * @param bool $thumb
     * @return string
     */
    public function getImageUrl($thumb = false)
    {
        if (empty($this->image)) {
            return '/images/defaults/' . $this->getTable() . ($thumb ? '_thumb' : null) . '.jpg';
        } else {
            return '/storage/' . ($thumb ? str_replace('.', '_thumb.', $this->image) : $this->image);
        }
    }

    /**
     * @return $this
     */
    public function entity()
    {
        return $this->hasOne('App\Models\Entity', 'entity_id', 'id')->where('type', $this->entityType);
    }

    public function getEntityType()
    {
        return $this->entityType;
    }
}