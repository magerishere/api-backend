<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class PhantomModel extends Model {
    protected static function booted()
    {
        static::addGlobalScope('is_active', function (Builder $query) {
            $query->where('locale', App::currentLocale())->where('is_active', true);
        });
    }

    public function scopeOfType($query, mixed $type)
    {
        $query->where('type', $type);
    }

    public function children()
    {
        return $this->hasMany(get_class($this), 'parent_id', 'id');
    }

}
