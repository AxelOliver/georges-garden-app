<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'name' => 'Plants'
        ]);
        Category::create([
            'name' => 'Pots'
        ]);
        Category::create([
            'name' => 'Tools'
        ]);
        Category::create([
            'name' => 'Fertilisers'
        ]);
    }
}
