<?php

namespace App\Utils\Traits;

use Illuminate\Support\Str;

trait UuIdTraits
{
    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model){
            if (empty($model->{$model->getKeyName()})){
                $model->{$model->getKeyName()} =  Str::uuid()->toString();
            }
        });
    }

    public function getIncrementing()
    {
        return false;
    }

    public function getKeyType()
    {
        return 'string';
    }
}
