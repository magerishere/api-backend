<?php

namespace App\Handlers;

use App\Enums\LocaleEnums;
use App\Enums\MenuEnums;
use App\Models\Menu;
use Illuminate\Support\Facades\Log;

class MenuHandler
{
    public $locale;
    public $type;

    public function __construct(string $locale, string $type)
    {
        if (!LocaleEnums::hasValue($locale)) {
            throw new \Error("Locale does not belongs to LocaleEnums: $locale");
        }
        if (!MenuEnums::hasValue($type)) {
            throw new \Error("Type does not belongs to MenuEnums: $type");
        }
        $this->locale = $locale;
        $this->type = $type;
    }

    private function initialData(array $data)
    {
        // You must set these params
        // title,link other params is optional
        $initialData = [
            'locale' => $this->locale,
            'is_active' => 1,
            'parent_id' => null,
            'type' => $this->type,
            'icon' => '<i class="bi bi-house-door"></i>',
        ];

        return array_merge($initialData, $data);
    }

    private function createMenu(array $data)
    {
        return Menu::create($this->initialData($data));
    }

    public function createMenus(array $menus)
    {
        foreach ($menus as $menu) {
            $children = $menu['children'] ?? [];
            unset($menu['children']);
            $parentMenu = $this->createMenu($menu);
            foreach ($children as $subMenu) {
                $subMenu['parent_id'] = $parentMenu->id;
                $this->createMenu($subMenu);
            }
        }
    }
}
