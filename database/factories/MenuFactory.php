<?php

namespace Database\Factories;

use App\Enums\LocaleEnums;
use App\Enums\MenuEnums;
use App\Models\Menu;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Menu>
 */
class MenuFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'locale' => $this->faker->randomElement(LocaleEnums::phantom__all()),
            'is_active' => $this->faker->boolean(),
            'parent_id' => null,
            'type' => $this->faker->randomElement(MenuEnums::phantom__all()),
            'title' => $this->faker->title,
            'link' => $this->faker->randomElement(['/', '/news', '/blogs']),
            'icon' => $this->faker->randomElement(['HomeIcon', 'NewsIcon', 'BlogIcon']),
        ];
    }

    public function configure()
    {
        return $this->afterCreating(function (Menu $menu) {
            if ($this->faker->boolean()) {
                $menu->factory(2)->create([
                    'parent_id' => $menu->id,
                ]);
            }
        });
    }
}
