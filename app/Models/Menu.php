<?php

namespace App\Models;

use App\Enums\LocaleEnums;
use App\Enums\MenuEnums;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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

    protected $casts = [
        'locale' => LocaleEnums::class,
        'type' => MenuEnums::class,
    ];


}
