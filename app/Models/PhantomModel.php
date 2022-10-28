<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class PhantomModel extends Model {
    protected static function booted()
    {
        static::addGlobalScope('is_active',function(Builder $query) {
            $query->where('is_active',true);
        });
    }

    public function scopeOfType($query,mixed $type)
    {
        $query->where('type',$type);
    }

}
