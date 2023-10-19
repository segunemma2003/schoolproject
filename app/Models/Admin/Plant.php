<?php

namespace App\Models\Admin;

use Illuminate\Support\Facades\Cache;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class Plant extends Model
{
    use LogsActivity;

    protected $guarded = [];

    // Forget cache on updating or saving and deleting
    public static function boot()
    {
        parent::boot();

        static::saving(function () {
            self::cacheKey();
        });

        static::deleting(function () {
            self::cacheKey();
        });
    }

    // Cache Keys
    private static function cacheKey()
    {
        Cache::has('plants') ? Cache::forget('plants') : '';
    }

    // Logs
    protected static $logName = 'plant';

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults();
    }

    public function diseases()
        {
            return $this->belongsToMany('App\Models\Admin\Disease', 'plant_disease', 'plant_id', 'disease_id');
        }
}
