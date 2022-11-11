<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends PhantomModel
{
    use HasFactory;

    protected $fillable = [
        'locale',
        'parent_id',
        'is_active',
        'type',
        'title',
        'link',
        'icon'
    ];


}
