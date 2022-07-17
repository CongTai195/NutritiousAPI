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
        //$this->call(ServingSizeSeeder::class);
        //$this->call(ServingSizeFoodSeeder::class);
        //$this->call(ExerciseSeeder::class);
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
            // ['name' => 'Beef', 'imageURL' => 'https://res.cloudinary.com/dxtozrwr9/image/upload/v1652949668/Beef_co7xzu.jpg', 'detail' => '93% lean beef', 'fromCarbs' => 0, 'fromFat' => 44, 'fromProtein' => 56],
            // ['name' => 'Chicken', 'imageURL' => 'https://res.cloudinary.com/dxtozrwr9/image/upload/v1656142770/grill_chicken_nsngry.jpg', 'detail' => 'Grilled chicken', 'fromCarbs' => 4, 'fromFat' => 16, 'fromProtein' => 80],
            // ['name' => 'Egg', 'imageURL' => 'https://res.cloudinary.com/dxtozrwr9/image/upload/v1652949668/Egg_rpfkcb.jpg', 'detail' => 'Egg', 'fromCarbs' => 2, 'fromFat' => 62, 'fromProtein' => 36],
            // ['name' => 'Broccoli', 'imageURL' => 'https://res.cloudinary.com/dxtozrwr9/image/upload/v1652949668/Broccolini_jgr6cc.jpg', 'detail' => 'Generic', 'fromCarbs' => 64, 'fromFat' => 8, 'fromProtein' => 28],
            // ['name' => 'Beef Sausage', 'imageURL' => 'https://res.cloudinary.com/dxtozrwr9/image/upload/v1656140964/beef-sausage_k2jbqx.jpg', 'detail' => 'Beef sausage', 'fromCarbs' => 1, 'fromFat' => 77, 'fromProtein' => 22],
            // ['name' => 'Ground Beef Round', 'imageURL' => 'https://res.cloudinary.com/dxtozrwr9/image/upload/v1656141444/Ground_Beef_Craft_Paper_03052017_apgim2.jpg', 'detail' => 'Beef', 'fromCarbs' => 0, 'fromFat' => 65, 'fromProtein' => 35],
            // ['name' => 'Roast Beef', 'imageURL' => 'https://res.cloudinary.com/dxtozrwr9/image/upload/v1656142159/roast_beef_szrvqp.jpg', 'detail' => 'Roast Beef', 'fromCarbs' => 9, 'fromFat' => 39, 'fromProtein' => 52],
            // ['name' => 'Chicken Tenderloin', 'imageURL' => 'https://res.cloudinary.com/dxtozrwr9/image/upload/v1656142975/chicken_tenderloin_brdua2.jpg', 'detail' => 'Chicken tenderloin', 'fromCarbs' => 0, 'fromFat' => 5, 'fromProtein' => 95],
            // ['name' => 'Chicken Drumstick', 'imageURL' => 'https://res.cloudinary.com/dxtozrwr9/image/upload/v1656143283/chicken_thigh_cbdzql.jpg', 'detail' => 'Chicken drumstick', 'fromCarbs' => 0, 'fromFat' => 51, 'fromProtein' => 49],
            // ['name' => 'Chicken Wing', 'imageURL' => 'https://res.cloudinary.com/dxtozrwr9/image/upload/v1656143984/clean-raw-chicken-wing-isolated-white-background_131238-863_dihkws.jpg', 'detail' => 'Chicken wing', 'fromCarbs' => 0, 'fromFat' => 62, 'fromProtein' => 38],
            // ['name' => 'Chicken Breast', 'imageURL' => 'https://res.cloudinary.com/dxtozrwr9/image/upload/v1656144273/raw-chicken-breast-fillet-without-skin-arranged-board_527904-741_czptue.jpg', 'detail' => 'Chicken breast', 'fromCarbs' => 0, 'fromFat' => 8, 'fromProtein' => 92],
            // ['name' => 'Pork Tenderloin', 'imageURL' => 'https://res.cloudinary.com/dxtozrwr9/image/upload/v1656144746/raw-pork-tenderloin-fillet-fresh_492434-164_seccbn.jpg', 'detail' => 'Pork tenderloin', 'fromCarbs' => 3, 'fromFat' => 19, 'fromProtein' => 78],
            // ['name' => 'Pork Chops', 'imageURL' => 'https://res.cloudinary.com/dxtozrwr9/image/upload/v1656145206/istockphoto-953659100-1024x1024_yvckny.jpg', 'detail' => 'Pork chops', 'fromCarbs' => 3, 'fromFat' => 30, 'fromProtein' => 67],
            // ['name' => 'Salmon', 'imageURL' => 'https://res.cloudinary.com/dxtozrwr9/image/upload/v1656312353/salmon_faewmu.jpg', 'detail' => 'Atlantic salmon', 'fromCarbs' => 1, 'fromFat' => 48, 'fromProtein' => 51],
            // ['name' => 'Salmon', 'imageURL' => 'https://res.cloudinary.com/dxtozrwr9/image/upload/v1656312353/salmon_faewmu.jpg', 'detail' => 'Frozen salmon', 'fromCarbs' => 0, 'fromFat' => 23, 'fromProtein' => 77],
            // ['name' => 'Tuna in Water', 'imageURL' => 'https://res.cloudinary.com/dxtozrwr9/image/upload/v1656313242/tuna_in_water_nev0hb.jpg', 'detail' => 'Tuna', 'fromCarbs' => 0, 'fromFat' => 9, 'fromProtein' => 91],
            // ['name' => 'Tuna Sashimi', 'imageURL' => 'https://res.cloudinary.com/dxtozrwr9/image/upload/v1656313729/tuna_sashimi_ko6rdc.jpg', 'detail' => 'Tuna sashimi', 'fromCarbs' => 0, 'fromFat' => 8, 'fromProtein' => 92],
            // ['name' => 'Salmon Sashimi', 'imageURL' => 'https://res.cloudinary.com/dxtozrwr9/image/upload/v1656314227/salmon_sashimi_iisl8m.jpg', 'detail' => 'Salmon sashimi', 'fromCarbs' => 0, 'fromFat' => 38, 'fromProtein' => 62],
            // ['name' => 'Beef Pho', 'imageURL' => 'https://res.cloudinary.com/dxtozrwr9/image/upload/v1656314538/GoLive-Beef-Pho_v956w1.jpg', 'detail' => 'Pho', 'fromCarbs' => 50, 'fromFat' => 20, 'fromProtein' => 30],
            // ['name' => 'Potato', 'imageURL' => 'https://res.cloudinary.com/dxtozrwr9/image/upload/v1656314831/potato_gmeckx.jpg', 'detail' => 'Pho', 'fromCarbs' => 88, 'fromFat' => 2, 'fromProtein' => 10],
            // ['name' => 'Sweet Potato', 'imageURL' => 'https://res.cloudinary.com/dxtozrwr9/image/upload/v1656315356/sweet_potato_jmtdjj.jpg', 'detail' => 'Sweet potato', 'fromCarbs' => 61, 'fromFat' => 35, 'fromProtein' => 5],
            // ['name' => 'Sugar', 'imageURL' => 'https://res.cloudinary.com/dxtozrwr9/image/upload/v1656315860/sugar_swioo4.jpg', 'detail' => 'Sugar', 'fromCarbs' => 99, 'fromFat' => 1, 'fromProtein' => 0],
            // ['name' => 'Rice', 'imageURL' => 'https://res.cloudinary.com/dxtozrwr9/image/upload/v1656316508/1463518_iidzfj.jpg', 'detail' => 'Jasmine rice', 'fromCarbs' => 90, 'fromFat' => 3, 'fromProtein' => 7],
            // ['name' => 'Oil', 'imageURL' => 'https://res.cloudinary.com/dxtozrwr9/image/upload/v1656316987/oil_xjytkp.jpg', 'detail' => 'Vegetable oil', 'fromCarbs' => 0, 'fromFat' => 100, 'fromProtein' => 0],
            // ['name' => 'Shrimp', 'imageURL' => 'https://res.cloudinary.com/dxtozrwr9/image/upload/v1656317458/two-tail-shrimp-with-fresh-lemon-rosemary-white_2829-18154_ejrc4t.jpg', 'detail' => 'Shrimp', 'fromCarbs' => 5, 'fromFat' => 12, 'fromProtein' => 82],
            // ['name' => 'Oat', 'imageURL' => 'https://res.cloudinary.com/dxtozrwr9/image/upload/v1656318296/oat_ziknqb.jpg', 'detail' => 'Oatmeal', 'fromCarbs' => 70, 'fromFat' => 17, 'fromProtein' => 13],
            // ['name' => 'Green Bell Pepper', 'imageURL' => 'https://res.cloudinary.com/dxtozrwr9/image/upload/v1656318645/greenbellpepper_kd049y.jpg', 'detail' => 'chopped', 'fromCarbs' => 79, 'fromFat' => 7, 'fromProtein' => 15],
            // ['name' => 'Red Bell Pepper', 'imageURL' => 'https://res.cloudinary.com/dxtozrwr9/image/upload/v1656318724/food-cook-spice-ingredients_k7gsfy.jpg', 'detail' => 'chopped', 'fromCarbs' => 78, 'fromFat' => 9, 'fromProtein' => 13],
            // ['name' => 'Vietnamese Ham Banh Mi', 'imageURL' => 'https://res.cloudinary.com/dxtozrwr9/image/upload/v1656403903/banh-mi-cha-ca-nha-trang-600x400_q7dnjb.jpg', 'detail' => 'Banh mi', 'fromCarbs' => 47, 'fromFat' => 31, 'fromProtein' => 22],
            ['name' => 'Milk', 'imageURL' => 'https://res.cloudinary.com/dxtozrwr9/image/upload/v1658030899/milk_n9squz.jpg', 'detail' => 'Milk', 'fromCarbs' => 39, 'fromFat' => 33, 'fromProtein' => 29],
            ['name' => 'Coffee', 'imageURL' => 'https://res.cloudinary.com/dxtozrwr9/image/upload/v1658031415/coffee_mzhxul.jpg', 'detail' => 'Black coffee', 'fromCarbs' => 0, 'fromFat' => 0, 'fromProtein' => 0],
            ['name' => 'Vietnamese Coffee', 'imageURL' => 'https://res.cloudinary.com/dxtozrwr9/image/upload/v1658031679/vnese_coffee_debp03.jpg', 'detail' => 'Coffee with dense milk', 'fromCarbs' => 72, 'fromFat' => 28, 'fromProtein' => 0],
        ]);
    }
}

class ExerciseSeeder extends Seeder
{
    public function run()
    {
        DB::table('exercises')->insert([
            ['name' => 'Running (jogging), 5.6 min per km', 'imageURL' => 'https://res.cloudinary.com/dxtozrwr9/image/upload/v1656384448/running_kbdwnm.jpg', 'calories' => 14.6],
            ['name' => 'Running (jogging), 5.3 min per km', 'imageURL' => 'https://res.cloudinary.com/dxtozrwr9/image/upload/v1656384448/running_kbdwnm.jpg', 'calories' => 15.3],
            ['name' => 'Running (jogging), 5 min per km', 'imageURL' => 'https://res.cloudinary.com/dxtozrwr9/image/upload/v1656384448/running_kbdwnm.jpg', 'calories' => 16.6],
            ['name' => 'Running (jogging), 4.6 min per km', 'imageURL' => 'https://res.cloudinary.com/dxtozrwr9/image/upload/v1656384448/running_kbdwnm.jpg', 'calories' => 18],
            ['name' => 'Running (jogging), 4.3 min per km', 'imageURL' => 'https://res.cloudinary.com/dxtozrwr9/image/upload/v1656384448/running_kbdwnm.jpg', 'calories' => 18.6],
            ['name' => 'Running (jogging), 4.1 min per km', 'imageURL' => 'https://res.cloudinary.com/dxtozrwr9/image/upload/v1656384448/running_kbdwnm.jpg', 'calories' => 20],
            ['name' => 'Running (jogging), 3.7 min per km', 'imageURL' => 'https://res.cloudinary.com/dxtozrwr9/image/upload/v1656384448/running_kbdwnm.jpg', 'calories' => 21.3],
            ['name' => 'Running (jogging), 3.4 min per km', 'imageURL' => 'https://res.cloudinary.com/dxtozrwr9/image/upload/v1656384448/running_kbdwnm.jpg', 'calories' => 24],
            ['name' => 'Running (jogging), 7.5 min per km', 'imageURL' => 'https://res.cloudinary.com/dxtozrwr9/image/upload/v1656384448/running_kbdwnm.jpg', 'calories' => 10.6],
            ['name' => 'Running (jogging), 7.2 min per km', 'imageURL' => 'https://res.cloudinary.com/dxtozrwr9/image/upload/v1656384448/running_kbdwnm.jpg', 'calories' => 12],
            ['name' => 'Running (jogging), 6.2 min per km', 'imageURL' => 'https://res.cloudinary.com/dxtozrwr9/image/upload/v1656384448/running_kbdwnm.jpg', 'calories' => 13.3],
            ['name' => 'Running (jogging), in place', 'imageURL' => 'https://res.cloudinary.com/dxtozrwr9/image/upload/v1656385530/run_inplace_tukocg.jpg', 'calories' => 10.6],
            ['name' => 'Running (jogging), up stairs', 'imageURL' => 'https://res.cloudinary.com/dxtozrwr9/image/upload/v1656385864/run_up_x0muos.jpg', 'calories' => 20],
            ['name' => 'Bicycling, <16 kph, leisure (cycling, biking, bike riding)', 'imageURL' => 'https://res.cloudinary.com/dxtozrwr9/image/upload/v1652950779/Biking_kcbfcr.jpg', 'calories' => 5.8],
            ['name' => 'Bicycling, 16-19 kph, light (cycling, biking, bike riding)', 'imageURL' => 'https://res.cloudinary.com/dxtozrwr9/image/upload/v1652950779/Biking_kcbfcr.jpg', 'calories' => 8.7],
            ['name' => 'Bicycling, 19-23 kph, moderate (cycling, biking, bike riding)', 'imageURL' => 'https://res.cloudinary.com/dxtozrwr9/image/upload/v1652950779/Biking_kcbfcr.jpg', 'calories' => 11.6],
            ['name' => 'Bicycling, 23-26 kph, vigorous (cycling, biking, bike riding)', 'imageURL' => 'https://res.cloudinary.com/dxtozrwr9/image/upload/v1652950779/Biking_kcbfcr.jpg', 'calories' => 14.5],
            ['name' => 'Bicycling, >32 kph, racing (cycling, biking, bike riding)', 'imageURL' => 'https://res.cloudinary.com/dxtozrwr9/image/upload/v1652950779/Biking_kcbfcr.jpg', 'calories' => 23.2],
            ['name' => 'Jumping jacks, vigorous', 'imageURL' => 'https://res.cloudinary.com/dxtozrwr9/image/upload/v1656405636/jumpingjack_kbxlf0.jpg', 'calories' => 12],
            ['name' => 'Rope jumping, fast', 'imageURL' => 'https://res.cloudinary.com/dxtozrwr9/image/upload/v1656405811/young-sportive-woman-doing-exercises-with-jumping-rope-white_176420-7781_fmnnf6.jpg', 'calories' => 17.4],
            ['name' => 'Rope jumping, moderate', 'imageURL' => 'https://res.cloudinary.com/dxtozrwr9/image/upload/v1656405811/young-sportive-woman-doing-exercises-with-jumping-rope-white_176420-7781_fmnnf6.jpg', 'calories' => 14.5],
            ['name' => 'Rope jumping, slow', 'imageURL' => 'https://res.cloudinary.com/dxtozrwr9/image/upload/v1656405811/young-sportive-woman-doing-exercises-with-jumping-rope-white_176420-7781_fmnnf6.jpg', 'calories' => 11.6],
            ['name' => 'Football, playing catch', 'imageURL' => 'https://res.cloudinary.com/dxtozrwr9/image/upload/v1656405991/goalkeeper_l9yh1k.jpg', 'calories' => 3.6],
            ['name' => 'Football, competitive', 'imageURL' => 'https://res.cloudinary.com/dxtozrwr9/image/upload/v1656406066/football_einn5t.jpg', 'calories' => 13],
            ['name' => 'Badminton, social, general', 'imageURL' => 'https://res.cloudinary.com/dxtozrwr9/image/upload/v1656406286/badminton-action-shuttlecock-fast-racket-motion-sport-167143259_kafcfr.jpg', 'calories' => 3.6],
            ['name' => 'Badminton, competitive', 'imageURL' => 'https://res.cloudinary.com/dxtozrwr9/image/upload/v1656406198/wp3621908_slpfka.jpg', 'calories' => 6.5],
            ['name' => 'Martial arts', 'imageURL' => 'https://res.cloudinary.com/dxtozrwr9/image/upload/v1656406419/wp2696425_l6chgo.jpg', 'calories' => 12.75],
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
            ['name' => '1 fillet'], //15
            ['name' => '1 slice'], //16
            ['name' => '1 bowl'], //17
            ['name' => '1 tsp'], //18
            ['name' => '1 tbsp'], //19
            ['name' => '1 sugar cube'], //20
            ['name' => '1 cup'], //21\
            ['name' => '1 loaf'], //22
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

            ['serving_size_id' => 2, 'food_id' => 2, 'calories' => 100, 'fat' => 2, 'cholesterol' => 50, 'sodium' => 110, 'carbs' => 1, 'protein' => 22, 'vitamin_D' => 0, 'calcium' => 2, 'iron' => 4, 'potassium' => 0, 'vitamin_A' => 0, 'vitamin_C' => 2],
            ['serving_size_id' => 1, 'food_id' => 2, 'calories' => 25, 'fat' => 0.5, 'cholesterol' => 12.5, 'sodium' => 27.5, 'carbs' => 0.2, 'protein' => 5.5, 'vitamin_D' => 0, 'calcium' => 0.5, 'iron' => 1, 'potassium' => 0, 'vitamin_A' => 0, 'vitamin_C' => 0.5],
            ['serving_size_id' => 3, 'food_id' => 2, 'calories' => 1, 'fat' => 0, 'cholesterol' => 0.4, 'sodium' => 1, 'carbs' => 0, 'protein' => 0.2, 'vitamin_D' => 0, 'calcium' => 0, 'iron' => 0, 'potassium' => 0, 'vitamin_A' => 0, 'vitamin_C' => 0],
            ['serving_size_id' => 4, 'food_id' => 2, 'calories' => 400, 'fat' => 8, 'cholesterol' => 200, 'sodium' => 440, 'carbs' => 4, 'protein' => 88, 'vitamin_D' => 0, 'calcium' => 8, 'iron' => 16, 'potassium' => 0, 'vitamin_A' => 0, 'vitamin_C' => 8],
            ['serving_size_id' => 5, 'food_id' => 2, 'calories' => 882, 'fat' => 17.6, 'cholesterol' => 440.9, 'sodium' => 970, 'carbs' => 8.8, 'protein' => 194, 'vitamin_D' => 0, 'calcium' => 17.6, 'iron' => 35.3, 'potassium' => 0, 'vitamin_A' => 0, 'vitamin_C' => 17.6],

            ['serving_size_id' => 6, 'food_id' => 3, 'calories' => 72, 'fat' => 4.8, 'cholesterol' => 186, 'sodium' => 71, 'carbs' => 0.4, 'protein' => 6.3, 'vitamin_D' => 0, 'calcium' => 28, 'iron' => 0.9, 'potassium' => 69, 'vitamin_A' => 80, 'vitamin_C' => 0],
            ['serving_size_id' => 7, 'food_id' => 3, 'calories' => 63, 'fat' => 4.2, 'cholesterol' => 163.7, 'sodium' => 62.5, 'carbs' => 0.3, 'protein' => 5.5, 'vitamin_D' => 0, 'calcium' => 24.6, 'iron' => 0.8, 'potassium' => 60.7, 'vitamin_A' => 70.4, 'vitamin_C' => 0],
            ['serving_size_id' => 8, 'food_id' => 3, 'calories' => 80, 'fat' => 5.3, 'cholesterol' => 208.3, 'sodium' => 79.5, 'carbs' => 0.4, 'protein' => 7, 'vitamin_D' => 0, 'calcium' => 31.4, 'iron' => 1, 'potassium' => 77.3, 'vitamin_A' => 89.6, 'vitamin_C' => 0],
            ['serving_size_id' => 9, 'food_id' => 3, 'calories' => 54, 'fat' => 3.6, 'cholesterol' => 141.4, 'sodium' => 54, 'carbs' => 0.3, 'protein' => 4.8, 'vitamin_D' => 0, 'calcium' => 21.3, 'iron' => 0.7, 'potassium' => 52.4, 'vitamin_A' => 60.8, 'vitamin_C' => 0],

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

            ['serving_size_id' => 15, 'food_id' => 14, 'calories' => 280, 'fat' => 15, 'cholesterol' => 95, 'sodium' => 170, 'carbs' => 1, 'protein' => 36, 'vitamin_D' => 0, 'calcium' => 2, 'iron' => 4, 'potassium' => 0, 'vitamin_A' => 1, 'vitamin_C' => 0],

            ['serving_size_id' => 2, 'food_id' => 15, 'calories' => 100, 'fat' => 2.5, 'cholesterol' => 45, 'sodium' => 150, 'carbs' => 0, 'protein' => 19, 'vitamin_D' => 0, 'calcium' => 0, 'iron' => 4, 'potassium' => 0, 'vitamin_A' => 0, 'vitamin_C' => 0],
            ['serving_size_id' => 1, 'food_id' => 15, 'calories' => 25, 'fat' => 0.6, 'cholesterol' => 11.2, 'sodium' => 37.5, 'carbs' => 0, 'protein' => 4.6, 'vitamin_D' => 0, 'calcium' => 0, 'iron' => 1, 'potassium' => 0, 'vitamin_A' => 0, 'vitamin_C' => 0],
            ['serving_size_id' => 4, 'food_id' => 15, 'calories' => 400, 'fat' => 10, 'cholesterol' => 180, 'sodium' => 600, 'carbs' => 0, 'protein' => 76, 'vitamin_D' => 0, 'calcium' => 0, 'iron' => 16, 'potassium' => 0, 'vitamin_A' => 0, 'vitamin_C' => 0],
            ['serving_size_id' => 5, 'food_id' => 15, 'calories' => 882, 'fat' => 22, 'cholesterol' => 396.8, 'sodium' => 1322.8, 'carbs' => 0, 'protein' => 167.6, 'vitamin_D' => 0, 'calcium' => 0, 'iron' => 35.3, 'potassium' => 0, 'vitamin_A' => 0, 'vitamin_C' => 0],

            ['serving_size_id' => 1, 'food_id' => 16, 'calories' => 25, 'fat' => 0.2, 'cholesterol' => 12.5, 'sodium' => 90, 'carbs' => 0, 'protein' => 5.5, 'vitamin_D' => 0, 'calcium' => 0, 'iron' => 1, 'potassium' => 37.5, 'vitamin_A' => 0, 'vitamin_C' => 0],
            ['serving_size_id' => 2, 'food_id' => 16, 'calories' => 100, 'fat' => 1, 'cholesterol' => 50, 'sodium' => 360, 'carbs' => 0, 'protein' => 22, 'vitamin_D' => 0, 'calcium' => 0, 'iron' => 4, 'potassium' => 150, 'vitamin_A' => 0, 'vitamin_C' => 0],
            ['serving_size_id' => 4, 'food_id' => 16, 'calories' => 400, 'fat' => 4, 'cholesterol' => 200, 'sodium' => 1440, 'carbs' => 0, 'protein' => 88, 'vitamin_D' => 0, 'calcium' => 0, 'iron' => 16, 'potassium' => 600, 'vitamin_A' => 0, 'vitamin_C' => 0],
            ['serving_size_id' => 5, 'food_id' => 16, 'calories' => 882, 'fat' => 8.8, 'cholesterol' => 440.9, 'sodium' => 3174.7, 'carbs' => 0, 'protein' => 194, 'vitamin_D' => 0, 'calcium' => 0, 'iron' => 35.3, 'potassium' => 1322.8, 'vitamin_A' => 0, 'vitamin_C' => 0],

            ['serving_size_id' => 16, 'food_id' => 17, 'calories' => 31, 'fat' => 0.3, 'cholesterol' => 13, 'sodium' => 10, 'carbs' => 0, 'protein' => 6.6, 'vitamin_D' => 0, 'calcium' => 2, 'iron' => 4, 'potassium' => 126, 'vitamin_A' => 1, 'vitamin_C' => 2],

            ['serving_size_id' => 16, 'food_id' => 18, 'calories' => 41, 'fat' => 1.7, 'cholesterol' => 13, 'sodium' => 13, 'carbs' => 0, 'protein' => 6.1, 'vitamin_D' => 0, 'calcium' => 4, 'iron' => 3, 'potassium' => 120, 'vitamin_A' => 2, 'vitamin_C' => 2],

            ['serving_size_id' => 17, 'food_id' => 19, 'calories' => 638, 'fat' => 14.2, 'cholesterol' => 86.2, 'sodium' => 3268.2, 'carbs' => 78.4, 'protein' => 47.1, 'vitamin_D' => 0.1, 'calcium' => 11.3, 'iron' => 37, 'potassium' => 1359.9, 'vitamin_A' => 12.1, 'vitamin_C' => 34.6],

            ['serving_size_id' => 10, 'food_id' => 20, 'calories' => 110, 'fat' => 0.2, 'cholesterol' => 0, 'sodium' => 10, 'carbs' => 26, 'protein' => 3, 'vitamin_D' => 0, 'calcium' => 2, 'iron' => 6, 'potassium' => 620, 'vitamin_A' => 0, 'vitamin_C' => 45],
            ['serving_size_id' => 5, 'food_id' => 20, 'calories' => 1100, 'fat' => 2, 'cholesterol' => 0, 'sodium' => 100, 'carbs' => 260, 'protein' => 30, 'vitamin_D' => 0, 'calcium' => 20, 'iron' => 60, 'potassium' => 6200, 'vitamin_A' => 0, 'vitamin_C' => 450],
            ['serving_size_id' => 1, 'food_id' => 20, 'calories' => 31, 'fat' => 0.1, 'cholesterol' => 0, 'sodium' => 2.8, 'carbs' => 7.4, 'protein' => 0.9, 'vitamin_D' => 0, 'calcium' => 0.6, 'iron' => 1.7, 'potassium' => 175.8, 'vitamin_A' => 0, 'vitamin_C' => 12.8],
            ['serving_size_id' => 4, 'food_id' => 20, 'calories' => 499, 'fat' => 0.9, 'cholesterol' => 0, 'sodium' => 45.4, 'carbs' => 117.9, 'protein' => 13.6, 'vitamin_D' => 0, 'calcium' => 9.1, 'iron' => 27.2, 'potassium' => 2812.3, 'vitamin_A' => 0, 'vitamin_C' => 204.1],

            ['serving_size_id' => 1, 'food_id' => 21, 'calories' => 31, 'fat' => 1.2, 'cholesterol' => 0.9, 'sodium' => 53.3, 'carbs' => 4.8, 'protein' => 0.4, 'vitamin_D' => 0, 'calcium' => 0.7, 'iron' => 1.1, 'potassium' => 62.1, 'vitamin_A' => 0, 'vitamin_C' => 5.7],
            ['serving_size_id' => 4, 'food_id' => 21, 'calories' => 494, 'fat' => 19.4, 'cholesterol' => 13.6, 'sodium' => 852.8, 'carbs' => 76.3, 'protein' => 5.9, 'vitamin_D' => 0, 'calcium' => 11.8, 'iron' => 17.4, 'potassium' => 993.4, 'vitamin_A' => 0, 'vitamin_C' => 91.5],
            ['serving_size_id' => 5, 'food_id' => 21, 'calories' => 1090, 'fat' => 42.8, 'cholesterol' => 30, 'sodium' => 1880, 'carbs' => 168.2, 'protein' => 13.1, 'vitamin_D' => 0, 'calcium' => 26, 'iron' => 38.3, 'potassium' => 2190, 'vitamin_A' => 0, 'vitamin_C' => 201.7],

            ['serving_size_id' => 18, 'food_id' => 22, 'calories' => 16, 'fat' => 0, 'cholesterol' => 0, 'sodium' => 0, 'carbs' => 4.2, 'protein' => 0, 'vitamin_D' => 0, 'calcium' => 0, 'iron' => 0, 'potassium' => 0.1, 'vitamin_A' => 0, 'vitamin_C' => 0],
            ['serving_size_id' => 19, 'food_id' => 22, 'calories' => 49, 'fat' => 0, 'cholesterol' => 0, 'sodium' => 0.1, 'carbs' => 12.5, 'protein' => 0, 'vitamin_D' => 0, 'calcium' => 0, 'iron' => 0, 'potassium' => 0.3, 'vitamin_A' => 0, 'vitamin_C' => 0],
            ['serving_size_id' => 20, 'food_id' => 22, 'calories' => 9, 'fat' => 0, 'cholesterol' => 0, 'sodium' => 0, 'carbs' => 168.2, 'protein' => 2.3, 'vitamin_D' => 0, 'calcium' => 0, 'iron' => 0, 'potassium' => 0, 'vitamin_A' => 0, 'vitamin_C' => 0],

            ['serving_size_id' => 10, 'food_id' => 23, 'calories' => 356, 'fat' => 1.1, 'cholesterol' => 0, 'sodium' => 0, 'carbs' => 80, 'protein' => 6.7, 'vitamin_D' => 0, 'calcium' => 0, 'iron' => 17.8, 'potassium' => 6.7, 'vitamin_A' => 0, 'vitamin_C' => 0],

            ['serving_size_id' => 18, 'food_id' => 24, 'calories' => 40, 'fat' => 4.7, 'cholesterol' => 0, 'sodium' => 0, 'carbs' => 0, 'protein' => 0, 'vitamin_D' => 0, 'calcium' => 0, 'iron' => 0, 'potassium' => 0, 'vitamin_A' => 0, 'vitamin_C' => 0],
            ['serving_size_id' => 19, 'food_id' => 24, 'calories' => 120, 'fat' => 14, 'cholesterol' => 0, 'sodium' => 0, 'carbs' => 0, 'protein' => 0, 'vitamin_D' => 0, 'calcium' => 0, 'iron' => 0, 'potassium' => 0, 'vitamin_A' => 0, 'vitamin_C' => 0],

            ['serving_size_id' => 2, 'food_id' => 25, 'calories' => 80, 'fat' => 1, 'cholesterol' => 165, 'sodium' => 640, 'carbs' => 1, 'protein' => 15, 'vitamin_D' => 0, 'calcium' => 6, 'iron' => 2, 'potassium' => 0, 'vitamin_A' => 3, 'vitamin_C' => 0],
            ['serving_size_id' => 1, 'food_id' => 25, 'calories' => 20, 'fat' => 0.2, 'cholesterol' => 41.2, 'sodium' => 160, 'carbs' => 0.2, 'protein' => 3.8, 'vitamin_D' => 0, 'calcium' => 1.5, 'iron' => 0.5, 'potassium' => 0, 'vitamin_A' => 0.8, 'vitamin_C' => 0],
            ['serving_size_id' => 4, 'food_id' => 25, 'calories' => 320, 'fat' => 4, 'cholesterol' => 660, 'sodium' => 2560, 'carbs' => 4, 'protein' => 60, 'vitamin_D' => 0, 'calcium' => 24, 'iron' => 8, 'potassium' => 0, 'vitamin_A' => 12, 'vitamin_C' => 0],
            ['serving_size_id' => 5, 'food_id' => 25, 'calories' => 705, 'fat' => 8.8, 'cholesterol' => 1455.1, 'sodium' => 5643.8, 'carbs' => 8.8, 'protein' => 132.3, 'vitamin_D' => 0, 'calcium' => 52.9, 'iron' => 17.6, 'potassium' => 0, 'vitamin_A' => 26.5, 'vitamin_C' => 0],

            ['serving_size_id' => 21, 'food_id' => 26, 'calories' => 300, 'fat' => 6, 'cholesterol' => 0, 'sodium' => 0, 'carbs' => 54, 'protein' => 10, 'vitamin_D' => 0, 'calcium' => 0, 'iron' => 20, 'potassium' => 1359.9, 'vitamin_A' => 12.1, 'vitamin_C' => 34.6],

            ['serving_size_id' => 21, 'food_id' => 27, 'calories' => 30, 'fat' => 0.2, 'cholesterol' => 0, 'sodium' => 4.4, 'carbs' => 7, 'protein' => 1.2, 'vitamin_D' => 0, 'calcium' => 1.6, 'iron' => 2.8, 'potassium' => 262.4, 'vitamin_A' => 0, 'vitamin_C' => 200.1],

            ['serving_size_id' => 21, 'food_id' => 28, 'calories' => 38, 'fat' => 0.4, 'cholesterol' => 0, 'sodium' => 6, 'carbs' => 9, 'protein' => 1.4, 'vitamin_D' => 0, 'calcium' => 1, 'iron' => 3.6, 'potassium' => 314.4, 'vitamin_A' => 311, 'vitamin_C' => 317.2],

            ['serving_size_id' => 22, 'food_id' => 29, 'calories' => 547, 'fat' => 18.7, 'cholesterol' => 68.7, 'sodium' => 1902.9, 'carbs' => 64.4, 'protein' => 29.9, 'vitamin_D' => 0, 'calcium' => 11.2, 'iron' => 20.3, 'potassium' => 1186.4, 'vitamin_A' => 35.2, 'vitamin_C' => 42.4],
        ]);
    }
}
