<?php

namespace Database\Factories;

use App\Models\product;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word,
            'description' => $this->faker->paragraph,
            'category_id' => Category::orderByRaw('RAND()')->first()->id,
            'image' => '300x400-placeholder.png',
            'price' => $this->faker->numberBetween(0, 100)
        ];
    }
}
