<?php

use App\Enums\LocaleEnums;
use App\Enums\MenuEnums;

return [
    LocaleEnums::class => [
        LocaleEnums::FA => 'فارسی',
        LocaleEnums::EN => 'انگلیسی',
    ],
    MenuEnums::class => [
        MenuEnums::BACK_HEADER => 'هدر ادمین',
        MenuEnums::BACK_FOOTER => 'فوتر ادمین',
        MenuEnums::FRONT_HEADER => 'هدر وبسایت',
        MenuEnums::FRONT_FOOTER => 'فوتر وبسایت'
    ]
];
