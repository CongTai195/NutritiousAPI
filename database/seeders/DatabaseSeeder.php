<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(FoodSeeder::class);
        $this->call(ServingSizeSeeder::class);
        $this->call(ServingSizeFoodSeeder::class);
    }
}

class FoodSeeder extends Seeder {
    public function run() {
        DB::table('food')->insert([
            ['name' => 'Beef', 'detail' => '93% lean beef', 'fromCarbs' => 0, 'fromFat' => 44, 'fromProtein' => 56],
            ['name' => 'Chicken', 'detail' => 'Grilled chicken', 'fromCarbs' => 4, 'fromFat' => 16, 'fromProtein' => 80],
            ['name' => 'Egg', 'detail' => 'Egg', 'fromCarbs' => 2, 'fromFat' => 62, 'fromProtein' => 36],
            ['name' => 'Brocolini', 'detail' => 'Generic', 'fromCarbs' => 64, 'fromFat' => 8, 'fromProtein' => 28],
        ]);
    }
}

class ServingSizeSeeder extends Seeder {
    public function run() {
        DB::table('serving_sizes')->insert([
            ['name' => '1 ounce'],
            ['name' => '4 ounce'],
            ['name' => '1 g'],
            ['name' => '1 lb'],
            ['name' => '1 kg'],
            ['name' => '1 large'],
            ['name' => '1 medium'],
            ['name' => '1 extra large'],
            ['name' => '1 small'],
        ]);
    }
}

class ServingSizeFoodSeeder extends Seeder {
    public function run() {
        DB::table('serving_size_foods')->insert([
            ['serving_size_id' => 1, 'food_id' => 1, 'calories' => 43],
            ['serving_size_id' => 2, 'food_id' => 1, 'calories' => 172],
            ['serving_size_id' => 3, 'food_id' => 1, 'calories' => 2],
            ['serving_size_id' => 4, 'food_id' => 1, 'calories' => 688],
            ['serving_size_id' => 5, 'food_id' => 1, 'calories' => 1518],

            ['serving_size_id' => 1, 'food_id' => 2, 'calories' => 25],
            ['serving_size_id' => 2, 'food_id' => 2, 'calories' => 100],
            ['serving_size_id' => 3, 'food_id' => 2, 'calories' => 1],
            ['serving_size_id' => 4, 'food_id' => 2, 'calories' => 400],
            ['serving_size_id' => 5, 'food_id' => 2, 'calories' => 882],

            ['serving_size_id' => 3, 'food_id' => 3, 'calories' => 1],
            ['serving_size_id' => 1, 'food_id' => 3, 'calories' => 41],
            ['serving_size_id' => 4, 'food_id' => 3, 'calories' => 649],
            ['serving_size_id' => 5, 'food_id' => 3, 'calories' => 1430],
            ['serving_size_id' => 6, 'food_id' => 3, 'calories' => 72],
            ['serving_size_id' => 7, 'food_id' => 3, 'calories' => 63],
            ['serving_size_id' => 8, 'food_id' => 3, 'calories' => 80],
            ['serving_size_id' => 9, 'food_id' => 3, 'calories' => 54],

            ['serving_size_id' => 1, 'food_id' => 4, 'calories' => 9],
            ['serving_size_id' => 2, 'food_id' => 4, 'calories' => 36],
            ['serving_size_id' => 3, 'food_id' => 4, 'calories' => 0],
            ['serving_size_id' => 5, 'food_id' => 4, 'calories' => 330],
        ]);
    }
}