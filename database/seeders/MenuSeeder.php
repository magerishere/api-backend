<?php

namespace Database\Seeders;

use App\Enums\LocaleEnums;
use App\Enums\MenuEnums;
use App\Handlers\MenuHandler;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $MenuHandler = new MenuHandler(LocaleEnums::FA, MenuEnums::BACK_HEADER);
        $fa_menus = [
            [
                'title' => 'داشبورد',
                'link' => '/',
            ],
            [
                'title' => 'منو',
                'link' => '/menus',
                'children' => [
                    [
                        'title' => 'ایجاد منو',
                        'link' => '/menus/create',
                    ]
                ],
            ],
        ];
        $MenuHandler->createMenus($fa_menus);

        $MenuHandler->locale = LocaleEnums::EN;
        $en_menus = [
            [
                'title' => 'Dashboard',
                'link' => '/',
            ],
            [
                'title' => 'Menus',
                'link' => '/menus',
                'children' => [
                    [
                        'title' => 'Create Menu',
                        'link' => '/menus/create',
                    ]
                ],
            ],
        ];
        $MenuHandler->createMenus($en_menus);
    }
}
