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
        if (!in_array($locale, LocaleEnums::phantom__all())) {
            throw new \Error("Locale does not belongs to LocaleEnums: $locale");
        }
        if (!in_array($type, MenuEnums::phantom__all())) {
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
            'icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house-door-fill" viewBox="0 0 16 16">
  <path d="M6.5 14.5v-3.505c0-.245.25-.495.5-.495h2c.25 0 .5.25.5.5v3.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5z"/>
</svg>',
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
