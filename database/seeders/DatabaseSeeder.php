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
        //$this->call(UserSeeder::class);
        $this->call(FoodSeeder::class);
        $this->call(ServingSizeSeeder::class);
        $this->call(ServingSizeFoodSeeder::class);
        $this->call(ExerciseSeeder::class);
        //$this->call(DiarySeeder::class);
    }
}

class UserSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'Brad',
                'email' => 'braddinh@gmail.com',
                'password' => Hash::make('123456'),
                'gender' => 1,
                'age' => 22
            ],
        ]);
    }
}

class DiarySeeder extends Seeder
{
    public function run()
    {
        DB::table('diaries')->insert([
            [
                'process_id' => 1,
                'date' => '2022-06-06',
                'weight_log' => 89,
                'heart_rate_log' => 78,
                'blood_pressure_log' => 120,
                'is_enough' => 0,
                'created_at' => '2022-06-10 01:07:42',
                'updated_at' => '2022-06-13 18:50:28'
            ],
            [
                'process_id' => 1,
                'date' => '2022-06-07',
                'weight_log' => 89,
                'heart_rate_log' => 78,
                'blood_pressure_log' => 120,
                'is_enough' => 0,
                'created_at' => '2022-06-10 01:07:42',
                'updated_at' => '2022-06-13 18:50:28'
            ],
            [
                'process_id' => 1,
                'date' => '2022-06-08',
                'weight_log' => 89,
                'heart_rate_log' => 78,
                'blood_pressure_log' => 120,
                'is_enough' => 0,
                'created_at' => '2022-06-10 01:07:42',
                'updated_at' => '2022-06-13 18:50:28'
            ],
            [
                'process_id' => 1,
                'date' => '2022-06-09',
                'weight_log' => 89,
                'heart_rate_log' => 78,
                'blood_pressure_log' => 120,
                'is_enough' => 0,
                'created_at' => '2022-06-10 01:07:42',
                'updated_at' => '2022-06-13 18:50:28'
            ],
            [
                'process_id' => 1,
                'date' => '2022-06-10',
                'weight_log' => 89,
                'heart_rate_log' => 78,
                'blood_pressure_log' => 120,
                'is_enough' => 0,
                'created_at' => '2022-06-10 01:07:42',
                'updated_at' => '2022-06-13 18:50:28'
            ],
            [
                'process_id' => 1,
                'date' => '2022-06-11',
                'weight_log' => 89,
                'heart_rate_log' => 78,
                'blood_pressure_log' => 120,
                'is_enough' => 0,
                'created_at' => '2022-06-10 01:07:42',
                'updated_at' => '2022-06-13 18:50:28'
            ],
            [
                'process_id' => 1,
                'date' => '2022-06-12',
                'weight_log' => 89,
                'heart_rate_log' => 78,
                'blood_pressure_log' => 120,
                'is_enough' => 0,
                'created_at' => '2022-06-10 01:07:42',
                'updated_at' => '2022-06-13 18:50:28'
            ],
            [
                'process_id' => 1,
                'date' => '2022-06-13',
                'weight_log' => 89,
                'heart_rate_log' => 78,
                'blood_pressure_log' => 120,
                'is_enough' => 0,
                'created_at' => '2022-06-10 01:07:42',
                'updated_at' => '2022-06-13 18:50:28'
            ],
            [
                'process_id' => 1,
                'date' => '2022-06-14',
                'weight_log' => 89,
                'heart_rate_log' => 78,
                'blood_pressure_log' => 120,
                'is_enough' => 0,
                'created_at' => '2022-06-10 01:07:42',
                'updated_at' => '2022-06-13 18:50:28'
            ],
            [
                'process_id' => 1,
                'date' => '2022-06-15',
                'weight_log' => 89,
                'heart_rate_log' => 78,
                'blood_pressure_log' => 120,
                'is_enough' => 0,
                'created_at' => '2022-06-10 01:07:42',
                'updated_at' => '2022-06-13 18:50:28'
            ],
        ]);
    }
}

class FoodSeeder extends Seeder
{
    public function run()
    {
        DB::table('food')->insert([
            ['name' => 'Beef', 'imageURL' => 'https://res.cloudinary.com/dxtozrwr9/image/upload/v1652949668/Beef_co7xzu.jpg', 'detail' => '93% lean beef', 'fromCarbs' => 0, 'fromFat' => 44, 'fromProtein' => 56],
            ['name' => 'Chicken', 'imageURL' => 'https://res.cloudinary.com/dxtozrwr9/image/upload/v1656142770/grill_chicken_nsngry.jpg', 'detail' => 'Grilled chicken', 'fromCarbs' => 4, 'fromFat' => 16, 'fromProtein' => 80],
            ['name' => 'Egg', 'imageURL' => 'https://res.cloudinary.com/dxtozrwr9/image/upload/v1652949668/Egg_rpfkcb.jpg', 'detail' => 'Egg', 'fromCarbs' => 2, 'fromFat' => 62, 'fromProtein' => 36],
            ['name' => 'Broccoli', 'imageURL' => 'https://res.cloudinary.com/dxtozrwr9/image/upload/v1652949668/Broccolini_jgr6cc.jpg', 'detail' => 'Generic', 'fromCarbs' => 64, 'fromFat' => 8, 'fromProtein' => 28],
            ['name' => 'Beef Sausage', 'imageURL' => 'https://res.cloudinary.com/dxtozrwr9/image/upload/v1656140964/beef-sausage_k2jbqx.jpg', 'detail' => 'Beef sausage', 'fromCarbs' => 1, 'fromFat' => 77, 'fromProtein' => 22],
            ['name' => 'Ground Beef Round', 'imageURL' => 'https://res.cloudinary.com/dxtozrwr9/image/upload/v1656141444/Ground_Beef_Craft_Paper_03052017_apgim2.jpg', 'detail' => 'Beef', 'fromCarbs' => 0, 'fromFat' => 65, 'fromProtein' => 35],
            ['name' => 'Roast Beef', 'imageURL' => 'https://res.cloudinary.com/dxtozrwr9/image/upload/v1656142159/roast_beef_szrvqp.jpg', 'detail' => 'Roast Beef', 'fromCarbs' => 9, 'fromFat' => 39, 'fromProtein' => 52],
            ['name' => 'Chicken Tenderloin', 'imageURL' => 'https://res.cloudinary.com/dxtozrwr9/image/upload/v1656142975/chicken_tenderloin_brdua2.jpg', 'detail' => 'Chicken tenderloin', 'fromCarbs' => 0, 'fromFat' => 5, 'fromProtein' => 95],
            ['name' => 'Chicken Drumstick', 'imageURL' => 'https://res.cloudinary.com/dxtozrwr9/image/upload/v1656143283/chicken_thigh_cbdzql.jpg', 'detail' => 'Chicken drumstick', 'fromCarbs' => 0, 'fromFat' => 51, 'fromProtein' => 49],
            ['name' => 'Chicken Wing', 'imageURL' => 'https://res.cloudinary.com/dxtozrwr9/image/upload/v1656143984/clean-raw-chicken-wing-isolated-white-background_131238-863_dihkws.jpg', 'detail' => 'Chicken wing', 'fromCarbs' => 0, 'fromFat' => 62, 'fromProtein' => 38],
            ['name' => 'Chicken Breast', 'imageURL' => 'https://res.cloudinary.com/dxtozrwr9/image/upload/v1656144273/raw-chicken-breast-fillet-without-skin-arranged-board_527904-741_czptue.jpg', 'detail' => 'Chicken breast', 'fromCarbs' => 0, 'fromFat' => 8, 'fromProtein' => 92],
            ['name' => 'Pork Tenderloin', 'imageURL' => 'https://res.cloudinary.com/dxtozrwr9/image/upload/v1656144746/raw-pork-tenderloin-fillet-fresh_492434-164_seccbn.jpg', 'detail' => 'Pork tenderloin', 'fromCarbs' => 3, 'fromFat' => 19, 'fromProtein' => 78],
            ['name' => 'Pork Chops', 'imageURL' => 'https://res.cloudinary.com/dxtozrwr9/image/upload/v1656145206/istockphoto-953659100-1024x1024_yvckny.jpg', 'detail' => 'Pork chops', 'fromCarbs' => 3, 'fromFat' => 30, 'fromProtein' => 67],

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
            ['name' => '1 each'], //11
            ['name' => '1 piece'], //12
            ['name' => '1 drumstick'], //13
            ['name' => '1 wing'], //14
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

            ['serving_size_id' => 11, 'food_id' => 5, 'calories' => 143, 'fat' => 12, 'cholesterol' => 35, 'sodium' => 280, 'carbs' => 0.2, 'protein' => 7.8, 'vitamin_D' => 0, 'calcium' => 4.7, 'iron' => 0, 'potassium' => 110.9, 'vitamin_A' => 0, 'vitamin_C' => 0],

            ['serving_size_id' => 1, 'food_id' => 6, 'calories' => 60, 'fat' => 4.2, 'cholesterol' => 18.8, 'sodium' => 18.8, 'carbs' => 0, 'protein' => 5.2, 'vitamin_D' => 0, 'calcium' => 0.5, 'iron' => 3.8, 'potassium' => 0, 'vitamin_A' => 0, 'vitamin_C' => 0],
            ['serving_size_id' => 2, 'food_id' => 6, 'calories' => 240, 'fat' => 17, 'cholesterol' => 75, 'sodium' => 75, 'carbs' => 0, 'protein' => 21, 'vitamin_D' => 0, 'calcium' => 2, 'iron' => 15, 'potassium' => 0, 'vitamin_A' => 0, 'vitamin_C' => 0],
            ['serving_size_id' => 3, 'food_id' => 6, 'calories' => 2, 'fat' => 0.1, 'cholesterol' => 0.7, 'sodium' => 0.7, 'carbs' => 0, 'protein' => 0.2, 'vitamin_D' => 0, 'calcium' => 0, 'iron' => 0.1, 'potassium' => 0, 'vitamin_A' => 0, 'vitamin_C' => 0],
            ['serving_size_id' => 4, 'food_id' => 6, 'calories' => 960, 'fat' => 68, 'cholesterol' => 300, 'sodium' => 300, 'carbs' => 0, 'protein' => 84, 'vitamin_D' => 0, 'calcium' => 8, 'iron' => 60, 'potassium' => 0, 'vitamin_A' => 0, 'vitamin_C' => 0],
            ['serving_size_id' => 5, 'food_id' => 6, 'calories' => 2116, 'fat' => 149.9, 'cholesterol' => 661.4, 'sodium' => 661.4, 'carbs' => 0, 'protein' => 185.2, 'vitamin_D' => 0, 'calcium' => 17.6, 'iron' => 132.3, 'potassium' => 0, 'vitamin_A' => 0, 'vitamin_C' => 0],

            ['serving_size_id' => 1, 'food_id' => 7, 'calories' => 36, 'fat' => 1.6, 'cholesterol' => 14, 'sodium' => 110, 'carbs' => 0.8, 'protein' => 4.8, 'vitamin_D' => 0, 'calcium' => 0, 'iron' => 3, 'potassium' => 0, 'vitamin_A' => 0, 'vitamin_C' => 0],
            ['serving_size_id' => 3, 'food_id' => 7, 'calories' => 1, 'fat' => 0.1, 'cholesterol' => 0.5, 'sodium' => 3.9, 'carbs' => 0, 'protein' => 0.2, 'vitamin_D' => 0, 'calcium' => 0, 'iron' => 0.1, 'potassium' => 0, 'vitamin_A' => 0, 'vitamin_C' => 0],
            ['serving_size_id' => 4, 'food_id' => 7, 'calories' => 576, 'fat' => 25.6, 'cholesterol' => 224, 'sodium' => 1760, 'carbs' => 12.8, 'protein' => 76.8, 'vitamin_D' => 0, 'calcium' => 0, 'iron' => 48, 'potassium' => 0, 'vitamin_A' => 0, 'vitamin_C' => 0],
            ['serving_size_id' => 5, 'food_id' => 7, 'calories' => 1270, 'fat' => 56.4, 'cholesterol' => 493.8, 'sodium' => 3880.1, 'carbs' => 28.2, 'protein' => 169.3, 'vitamin_D' => 0, 'calcium' => 0, 'iron' => 105.8, 'potassium' => 0, 'vitamin_A' => 0, 'vitamin_C' => 0],

            ['serving_size_id' => 12, 'food_id' => 8, 'calories' => 10, 'fat' => 0.5, 'cholesterol' => 75, 'sodium' => 45, 'carbs' => 0, 'protein' => 22, 'vitamin_D' => 0, 'calcium' => 4.7, 'iron' => 8, 'potassium' => 0, 'vitamin_A' => 0, 'vitamin_C' => 2],

            ['serving_size_id' => 13, 'food_id' => 9, 'calories' => 180, 'fat' => 10, 'cholesterol' => 90, 'sodium' => 95, 'carbs' => 0, 'protein' => 22, 'vitamin_D' => 0, 'calcium' => 2, 'iron' => 6, 'potassium' => 0, 'vitamin_A' => 2, 'vitamin_C' => 6],
            ['serving_size_id' => 10, 'food_id' => 9, 'calories' => 180, 'fat' => 10, 'cholesterol' => 90, 'sodium' => 95, 'carbs' => 0, 'protein' => 22, 'vitamin_D' => 0, 'calcium' => 2, 'iron' => 6, 'potassium' => 0, 'vitamin_A' => 2, 'vitamin_C' => 6],
            ['serving_size_id' => 4, 'food_id' => 9, 'calories' => 816, 'fat' => 45.4, 'cholesterol' => 408.2, 'sodium' => 430.9, 'carbs' => 0, 'protein' => 99.8, 'vitamin_D' => 0, 'calcium' => 9.1, 'iron' => 27.2, 'potassium' => 0, 'vitamin_A' => 9.1, 'vitamin_C' => 27.2],
            ['serving_size_id' => 1, 'food_id' => 9, 'calories' => 51, 'fat' => 2.8, 'cholesterol' => 25.5, 'sodium' => 26.9, 'carbs' => 0, 'protein' => 6.2, 'vitamin_D' => 0, 'calcium' => 0.6, 'iron' => 1.7, 'potassium' => 0, 'vitamin_A' => 0.6, 'vitamin_C' => 1.7],
            ['serving_size_id' => 5, 'food_id' => 9, 'calories' => 1800, 'fat' => 100, 'cholesterol' => 900, 'sodium' => 950, 'carbs' => 0, 'protein' => 220, 'vitamin_D' => 0, 'calcium' => 20, 'iron' => 60, 'potassium' => 0, 'vitamin_A' => 20, 'vitamin_C' => 60],

            ['serving_size_id' => 14, 'food_id' => 10, 'calories' => 81, 'fat' => 5.4, 'cholesterol' => 23, 'sodium' => 113, 'carbs' => 0, 'protein' => 7.5, 'vitamin_D' => 0, 'calcium' => 0, 'iron' => 2, 'potassium' => 51, 'vitamin_A' => 0, 'vitamin_C' => 2],

            ['serving_size_id' => 1, 'food_id' => 11, 'calories' => 28, 'fat' => 0.2, 'cholesterol' => 13.8, 'sodium' => 92.5, 'carbs' => 0, 'protein' => 6.5, 'vitamin_D' => 0, 'calcium' => 0.5, 'iron' => 1, 'potassium' => 0, 'vitamin_A' => 0, 'vitamin_C' => 0.5],
            ['serving_size_id' => 2, 'food_id' => 11, 'calories' => 110, 'fat' => 1, 'cholesterol' => 55, 'sodium' => 370, 'carbs' => 0, 'protein' => 26, 'vitamin_D' => 0, 'calcium' => 2, 'iron' => 4, 'potassium' => 0, 'vitamin_A' => 0, 'vitamin_C' => 2],
            ['serving_size_id' => 4, 'food_id' => 11, 'calories' => 440, 'fat' => 4, 'cholesterol' => 220, 'sodium' => 1480, 'carbs' => 0, 'protein' => 104, 'vitamin_D' => 8, 'calcium' => 16, 'iron' => 8, 'potassium' => 0, 'vitamin_A' => 0, 'vitamin_C' => 8],

            ['serving_size_id' => 2, 'food_id' => 12, 'calories' => 120, 'fat' => 2.5, 'cholesterol' => 60, 'sodium' => 60, 'carbs' => 1, 'protein' => 23, 'vitamin_D' => 0, 'calcium' => 0, 'iron' => 6, 'potassium' => 0, 'vitamin_A' => 0, 'vitamin_C' => 0],
            ['serving_size_id' => 1, 'food_id' => 12, 'calories' => 30, 'fat' => 0.6, 'cholesterol' => 15, 'sodium' => 15, 'carbs' => 0.2, 'protein' => 5.8, 'vitamin_D' => 0, 'calcium' => 0, 'iron' => 1.5, 'potassium' => 0, 'vitamin_A' => 0, 'vitamin_C' => 0],
            ['serving_size_id' => 4, 'food_id' => 12, 'calories' => 480, 'fat' => 10, 'cholesterol' => 240, 'sodium' => 240, 'carbs' => 4, 'protein' => 92, 'vitamin_D' => 0, 'calcium' => 0, 'iron' => 24, 'potassium' => 0, 'vitamin_A' => 0, 'vitamin_C' => 0],
            ['serving_size_id' => 5, 'food_id' => 12, 'calories' => 1058, 'fat' => 22, 'cholesterol' => 529.1, 'sodium' => 529.1, 'carbs' => 8.8, 'protein' => 202.8, 'vitamin_D' => 0, 'calcium' => 0, 'iron' => 52.9, 'potassium' => 0, 'vitamin_A' => 0, 'vitamin_C' => 0],

            ['serving_size_id' => 2, 'food_id' => 13, 'calories' => 130, 'fat' => 4.5, 'cholesterol' => 55, 'sodium' => 210, 'carbs' => 1, 'protein' => 23, 'vitamin_D' => 0, 'calcium' => 2, 'iron' => 4, 'potassium' => 0, 'vitamin_A' => 0, 'vitamin_C' => 0],
            ['serving_size_id' => 1, 'food_id' => 13, 'calories' => 32, 'fat' => 1.1, 'cholesterol' => 13.8, 'sodium' => 52.5, 'carbs' => 0.2, 'protein' => 5.8, 'vitamin_D' => 0, 'calcium' => 0.5, 'iron' => 1, 'potassium' => 0, 'vitamin_A' => 0, 'vitamin_C' => 0],
            ['serving_size_id' => 4, 'food_id' => 13, 'calories' => 520, 'fat' => 18, 'cholesterol' => 220, 'sodium' => 840, 'carbs' => 4, 'protein' => 92, 'vitamin_D' => 0, 'calcium' => 8, 'iron' => 16, 'potassium' => 0, 'vitamin_A' => 0, 'vitamin_C' => 0],
            ['serving_size_id' => 5, 'food_id' => 13, 'calories' => 1146, 'fat' => 39.7, 'cholesterol' => 485, 'sodium' => 1851.9, 'carbs' => 8.8, 'protein' => 202.8, 'vitamin_D' => 0, 'calcium' => 17.6, 'iron' => 35.3, 'potassium' => 0, 'vitamin_A' => 0, 'vitamin_C' => 0],
        ]);
    }
}
