<?php

namespace App\Models\Admin;

use Illuminate\Support\Facades\Cache;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class Disease extends Model
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
        Cache::has('diseases') ? Cache::forget('diseases') : '';
    }

    // Logs
    protected static $logName = 'disease';

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults();
    }



        public function plants()
        {
            return $this->belongsToMany('App\Models\Admin\Plant', 'plant_disease', 'disease_id', 'plant_id');
        }


}
