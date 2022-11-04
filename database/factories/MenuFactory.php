<?php

namespace Database\Factories;

use App\Enums\LocaleEnums;
use App\Enums\MenuEnums;
use App\Models\Menu;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Log;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Menu>
 */
class MenuFactory extends Factory
{

    private function makeData(array $more_data = [])
    {
        $initial_data = [
            'locale' => $this->faker->randomElement(LocaleEnums::phantom__all()),
            'is_active' => 1,
            'parent_id' => null,
            'type' => $this->faker->randomElement(MenuEnums::phantom__all()),
            'title' => $this->faker->words(),
            'link' => $this->faker->randomElement(['/', '/news', '/blogs']),
            'icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house-door-fill" viewBox="0 0 16 16">
  <path d="M6.5 14.5v-3.505c0-.245.25-.495.5-.495h2c.25 0 .5.25.5.5v3.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5z"/>
</svg>',
        ];

        return array_merge($initial_data, $more_data);
    }

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return $this->makeData();
    }

    public function configure()
    {
        return $this->afterCreating(function (Menu $menu) {
            $data = $this->makeData([
                'parent_id' => $menu->id,
                'is_active' => true
            ]);
            for ($i = 0; $i < 5; $i++) {
                Menu::create($data);
            }

        });
    }
}
