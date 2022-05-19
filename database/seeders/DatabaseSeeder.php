<?php

namespace Database\Seeders;

use App\Models\Exercise;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //\App\Models\User::factory(10)->create();
        $this->call(UserSeeder::class);
        $this->call(FoodSeeder::class);
        $this->call(ServingSizeSeeder::class);
        $this->call(ServingSizeFoodSeeder::class);
        $this->call(ExerciseSeeder::class);
    }
}

class UserSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->insert([
            ['name' => 'Brad', 'email' => 'braddinh@gmail.com', 'password' => Hash::make('123')],
            ['name' => 'Cody', 'email' => 'codyle@gmail.com', 'password' => Hash::make('123')],
            ['name' => 'Gage', 'email' => 'gagepham@gmail.com', 'password' => Hash::make('123')],
        ]);
    }
}

class FoodSeeder extends Seeder
{
    public function run()
    {
        DB::table('food')->insert([
            ['name' => 'Beef', 'imageURL' => 'https://res.cloudinary.com/dxtozrwr9/image/upload/v1652949668/Beef_co7xzu.jpg', 'detail' => '93% lean beef', 'fromCarbs' => 0, 'fromFat' => 44, 'fromProtein' => 56],
            ['name' => 'Chicken', 'imageURL' => 'https://res.cloudinary.com/dxtozrwr9/image/upload/v1652949668/Chicken_eshhtk.jpg', 'detail' => 'Grilled chicken', 'fromCarbs' => 4, 'fromFat' => 16, 'fromProtein' => 80],
            ['name' => 'Egg', 'imageURL' => 'https://res.cloudinary.com/dxtozrwr9/image/upload/v1652949668/Egg_rpfkcb.jpg', 'detail' => 'Egg', 'fromCarbs' => 2, 'fromFat' => 62, 'fromProtein' => 36],
            ['name' => 'Brocolini', 'imageURL' => 'https://res.cloudinary.com/dxtozrwr9/image/upload/v1652949668/Broccolini_jgr6cc.jpg', 'detail' => 'Generic', 'fromCarbs' => 64, 'fromFat' => 8, 'fromProtein' => 28],
        ]);
    }
}

class ExerciseSeeder extends Seeder
{
    public function run()
    {
        DB::table('exercises')->insert([
            ['name' => 'Running (jogging), 5.6 min per km', 'imageURL' => 'https://res.cloudinary.com/dxtozrwr9/image/upload/v1652950598/Running_cv0c5i.jpg', 'calories' => 14.6],
            ['name' => 'Running (jogging), 5.3 min per km', 'imageURL' => 'https://res.cloudinary.com/dxtozrwr9/image/upload/v1652950598/Running_cv0c5i.jpg', 'calories' => 15.3],
            ['name' => 'Running (jogging), 5 min per km', 'imageURL' => 'https://res.cloudinary.com/dxtozrwr9/image/upload/v1652949669/Running_cv0c5i.jpg', 'calories' => 16.6],
            ['name' => 'Running (jogging), 4.6 min per km', 'imageURL' => 'https://res.cloudinary.com/dxtozrwr9/image/upload/v1652949669/Running_cv0c5i.jpg', 'calories' => 18],
            ['name' => 'Running (jogging), 4.3 min per km', 'imageURL' => 'https://res.cloudinary.com/dxtozrwr9/image/upload/v1652949669/Running_cv0c5i.jpg', 'calories' => 18.6],
            ['name' => 'Running (jogging), 4.1 min per km', 'imageURL' => 'https://res.cloudinary.com/dxtozrwr9/image/upload/v1652949669/Running_cv0c5i.jpg', 'calories' => 20],
            ['name' => 'Running (jogging), 3.7 min per km', 'imageURL' => 'https://res.cloudinary.com/dxtozrwr9/image/upload/v1652949669/Running_cv0c5i.jpg', 'calories' => 21.3],
            ['name' => 'Running (jogging), 3.4 min per km', 'imageURL' => 'https://res.cloudinary.com/dxtozrwr9/image/upload/v1652949669/Running_cv0c5i.jpg', 'calories' => 24],
            ['name' => 'Running (jogging), 7.5 min per km', 'imageURL' => 'https://res.cloudinary.com/dxtozrwr9/image/upload/v1652949669/Running_cv0c5i.jpg', 'calories' => 10.6],
            ['name' => 'Running (jogging), 7.2 min per km', 'imageURL' => 'https://res.cloudinary.com/dxtozrwr9/image/upload/v1652949669/Running_cv0c5i.jpg', 'calories' => 12],
            ['name' => 'Running (jogging), 6.2 min per km', 'imageURL' => 'https://res.cloudinary.com/dxtozrwr9/image/upload/v1652949669/Running_cv0c5i.jpg', 'calories' => 13.3],
            ['name' => 'Running (jogging), in place', 'imageURL' => 'https://res.cloudinary.com/dxtozrwr9/image/upload/v1652949669/Running_cv0c5i.jpg', 'calories' => 10.6],
            ['name' => 'Running (jogging), up stairs', 'imageURL' => 'https://res.cloudinary.com/dxtozrwr9/image/upload/v1652951499/RunningUpstairs_pqz2i6.jpg', 'calories' => 20],
            ['name' => 'Bicycling, <16 kph leisure (cycling, biking, bike riding)', 'imageURL' => 'https://res.cloudinary.com/dxtozrwr9/image/upload/v1652950779/Biking_kcbfcr.jpg', 'calories' => 53.3],
        ]);
    }
}

class ServingSizeSeeder extends Seeder
{
    public function run()
    {
        DB::table('serving_sizes')->insert([
            ['name' => '1 ounce'], //1
            ['name' => '4 ounces'], //2
            ['name' => '1 g'], //3
            ['name' => '1 lb'], //4
            ['name' => '1 kg'], //5
            ['name' => '1 large'], //6
            ['name' => '1 medium'], //7
            ['name' => '1 extra large'], //8
            ['name' => '1 small'], //9
            ['name' => '100 g'], //10
        ]);
    }
}

class ServingSizeFoodSeeder extends Seeder
{
    public function run()
    {
        DB::table('serving_size_foods')->insert([
            ['serving_size_id' => 2, 'food_id' => 1, 'calories' => 170, 'fat' => 8, 'cholesterol' => 70, 'sodium' => 75, 'carbs' => 0, 'protein' => 23, 'vitamin_D' => 0, 'calcium' => 0, 'iron' => 15, 'potassium' => 0, 'vitamin_A' => 0, 'vitamin_C' => 0],
            ['serving_size_id' => 1, 'food_id' => 1, 'calories' => 43, 'fat' => 2, 'cholesterol' => 17.7, 'sodium' => 19, 'carbs' => 0, 'protein' => 5.8, 'vitamin_D' => 0, 'calcium' => 0, 'iron' => 3.8, 'potassium' => 0, 'vitamin_A' => 0, 'vitamin_C' => 0],
            ['serving_size_id' => 3, 'food_id' => 1, 'calories' => 2, 'fat' => 0.1, 'cholesterol' => 0.6, 'sodium' => 0.7, 'carbs' => 0, 'protein' => 0.2, 'vitamin_D' => 0, 'calcium' => 0, 'iron' => 0.1, 'potassium' => 0, 'vitamin_A' => 0, 'vitamin_C' => 0],
            ['serving_size_id' => 4, 'food_id' => 1, 'calories' => 688, 'fat' => 32.4, 'cholesterol' => 283.5, 'sodium' => 303.7, 'carbs' => 0, 'protein' => 93.1, 'vitamin_D' => 0, 'calcium' => 0, 'iron' => 60.7, 'potassium' => 0, 'vitamin_A' => 0, 'vitamin_C' => 0],
            ['serving_size_id' => 5, 'food_id' => 1, 'calories' => 1518, 'fat' => 71.4, 'cholesterol' => 625, 'sodium' => 669.6, 'carbs' => 0, 'protein' => 205.4, 'vitamin_D' => 0, 'calcium' => 0, 'iron' => 133.9, 'potassium' => 0, 'vitamin_A' => 0, 'vitamin_C' => 0],
            //['serving_size_id' => 10, 'food_id' => 1, 'calories' => 200],


            ['serving_size_id' => 2, 'food_id' => 2, 'calories' => 100, 'fat' => 2, 'cholesterol' => 50, 'sodium' => 110, 'carbs' => 1, 'protein' => 22, 'vitamin_D' => 0, 'calcium' => 2, 'iron' => 4, 'potassium' => 0, 'vitamin_A' => 0, 'vitamin_C' => 2],
            ['serving_size_id' => 1, 'food_id' => 2, 'calories' => 25, 'fat' => 0.5, 'cholesterol' => 12.5, 'sodium' => 27.5, 'carbs' => 0.2, 'protein' => 5.5, 'vitamin_D' => 0, 'calcium' => 0.5, 'iron' => 1, 'potassium' => 0, 'vitamin_A' => 0, 'vitamin_C' => 0.5],
            ['serving_size_id' => 3, 'food_id' => 2, 'calories' => 1, 'fat' => 0, 'cholesterol' => 0.4, 'sodium' => 1, 'carbs' => 0, 'protein' => 0.2, 'vitamin_D' => 0, 'calcium' => 0, 'iron' => 0, 'potassium' => 0, 'vitamin_A' => 0, 'vitamin_C' => 0],
            ['serving_size_id' => 4, 'food_id' => 2, 'calories' => 400, 'fat' => 8, 'cholesterol' => 200, 'sodium' => 440, 'carbs' => 4, 'protein' => 88, 'vitamin_D' => 0, 'calcium' => 8, 'iron' => 16, 'potassium' => 0, 'vitamin_A' => 0, 'vitamin_C' => 8],
            ['serving_size_id' => 5, 'food_id' => 2, 'calories' => 882, 'fat' => 17.6, 'cholesterol' => 440.9, 'sodium' => 970, 'carbs' => 8.8, 'protein' => 194, 'vitamin_D' => 0, 'calcium' => 17.6, 'iron' => 35.3, 'potassium' => 0, 'vitamin_A' => 0, 'vitamin_C' => 17.6],
            //['serving_size_id' => 10, 'food_id' => 2, 'calories' => 100],

            ['serving_size_id' => 6, 'food_id' => 3, 'calories' => 72, 'fat' => 4.8, 'cholesterol' => 186, 'sodium' => 71, 'carbs' => 0.4, 'protein' => 6.3, 'vitamin_D' => 0, 'calcium' => 28, 'iron' => 0.9, 'potassium' => 69, 'vitamin_A' => 80, 'vitamin_C' => 0],
            ['serving_size_id' => 7, 'food_id' => 3, 'calories' => 63, 'fat' => 4.2, 'cholesterol' => 163.7, 'sodium' => 62.5, 'carbs' => 0.3, 'protein' => 5.5, 'vitamin_D' => 0, 'calcium' => 24.6, 'iron' => 0.8, 'potassium' => 60.7, 'vitamin_A' => 70.4, 'vitamin_C' => 0],
            ['serving_size_id' => 8, 'food_id' => 3, 'calories' => 80, 'fat' => 5.3, 'cholesterol' => 208.3, 'sodium' => 79.5, 'carbs' => 0.4, 'protein' => 7, 'vitamin_D' => 0, 'calcium' => 31.4, 'iron' => 1, 'potassium' => 77.3, 'vitamin_A' => 89.6, 'vitamin_C' => 0],
            ['serving_size_id' => 9, 'food_id' => 3, 'calories' => 54, 'fat' => 3.6, 'cholesterol' => 141.4, 'sodium' => 54, 'carbs' => 0.3, 'protein' => 4.8, 'vitamin_D' => 0, 'calcium' => 21.3, 'iron' => 0.7, 'potassium' => 52.4, 'vitamin_A' => 60.8, 'vitamin_C' => 0],
            // ['serving_size_id' => 3, 'food_id' => 3, 'calories' => 1],
            // ['serving_size_id' => 1, 'food_id' => 3, 'calories' => 41],
            // ['serving_size_id' => 4, 'food_id' => 3, 'calories' => 649],
            // ['serving_size_id' => 5, 'food_id' => 3, 'calories' => 1430],


            ['serving_size_id' => 10, 'food_id' => 4, 'calories' => 33, 'fat' => 0.4, 'cholesterol' => 0, 'sodium' => 32, 'carbs' => 6.4, 'protein' => 2.8, 'vitamin_D' => 0, 'calcium' => 4, 'iron' => 4, 'potassium' => 317, 'vitamin_A' => 20, 'vitamin_C' => 10],
            ['serving_size_id' => 1, 'food_id' => 4, 'calories' => 9, 'fat' => 0.1, 'cholesterol' => 0, 'sodium' => 9.1, 'carbs' => 1.8, 'protein' => 0.8, 'vitamin_D' => 0, 'calcium' => 1.1, 'iron' => 1.1, 'potassium' => 89.9, 'vitamin_A' => 5.7, 'vitamin_C' => 2.8],
            ['serving_size_id' => 2, 'food_id' => 4, 'calories' => 36, 'fat' => 0.4, 'cholesterol' => 0, 'sodium' => 36.4, 'carbs' => 7.2, 'protein' => 3.2, 'vitamin_D' => 0, 'calcium' => 4.4, 'iron' => 4.4, 'potassium' => 359.6, 'vitamin_A' => 22.8, 'vitamin_C' => 11.2],
            ['serving_size_id' => 5, 'food_id' => 4, 'calories' => 330, 'fat' => 4, 'cholesterol' => 0, 'sodium' => 320, 'carbs' => 64, 'protein' => 28, 'vitamin_D' => 0, 'calcium' => 40, 'iron' => 40, 'potassium' => 3170, 'vitamin_A' => 200, 'vitamin_C' => 100],
        ]);
    }
}
