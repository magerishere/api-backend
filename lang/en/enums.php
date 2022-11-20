<?php

use App\Enums\LocaleEnums;
use App\Enums\MenuEnums;

return [
    LocaleEnums::class => [
        LocaleEnums::FA => 'Farsi',
        LocaleEnums::EN => 'English',
    ],
    MenuEnums::class => [
        MenuEnums::BACK_HEADER => 'Admin Header',
        MenuEnums::BACK_FOOTER => 'Admin Footer',
        MenuEnums::FRONT_HEADER => 'Website Header',
        MenuEnums::FRONT_FOOTER => 'Website Footer'
    ]
];
