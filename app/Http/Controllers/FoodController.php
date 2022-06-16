<?php

namespace App\Http\Controllers;

use App\Models\Food;
use App\Helpers\ResponseHelper;
use App\Http\Requests\StoreFoodRequest;
use App\Http\Requests\UpdateFoodRequest;
use App\Http\Resources\FoodResource;
use Response;
use App\Helpers\Status;
use App\Helpers\HTTPCode;
use App\Http\Requests\SearchFoodRequest;
use App\Models\Diary;
use App\Models\DiaryFoodDetail;
use App\Models\Process;
use App\Models\Serving_size;
use App\Models\Serving_size_food;
use Illuminate\Http\Request;

class FoodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return ResponseHelper::send(FoodResource::collection(Food::all()->where('user_id', null)));
        //return ResponseHelper::send(Serving_size_food::all());
    }

    public function indexMyFood()
    {
        $user = auth('api')->user();

        return ResponseHelper::send(FoodResource::collection(Food::all()->where('user_id', $user->id)->sortByDesc('id')));
    }

    public function addFood(StoreFoodRequest $request)
    {
        $user = auth('api')->user();
        $name = $request->name;
        $detail = $request->detail;
        $name_serving_size = $request->serving_size_name;
        $calories = $request->calories;
        $carbs = $request->carbs;
        $fat = $request->fat;
        $protein = $request->protein;
        $cholesterol = $request->cholesterol;
        $calcium = $request->calcium;
        $potassium = $request->potassium;
        $sodium = $request->sodium;
        $iron = $request->iron;
        $vitamin_A = $request->vitamin_A;
        $vitamin_C = $request->vitamin_C;
        $vitamin_D = $request->vitamin_D;
        $from_carbs = round($carbs * 4 / $calories * 100);
        $from_fat = round($fat * 9 / $calories * 100);
        $from_protein = round($protein * 4 / $calories * 100);

        $food = Food::create([
            "name" => $name,
            "user_id" => $user->id,
            "detail" => $detail,
            "fromCarbs" => $from_carbs,
            "fromFat" => $from_fat,
            "fromProtein" => $from_protein,
        ]);

        $serving_size = Serving_size::create([
            "name" => $name_serving_size
        ]);


        $serving_size_food = Serving_size_food::create(
            [
                "serving_size_id" => $serving_size->id,
                "food_id" => $food->id,
                "calories" => $calories,
                "carbs" => $carbs,
                "fat" => $fat,
                "protein" => $protein,
                "cholesterol" => $cholesterol,
                "calcium" => $calcium,
                "sodium" => $sodium,
                "potassium" => $potassium,
                "iron" => $iron,
                "vitamin_A" => $vitamin_A,
                "vitamin_C" => $vitamin_C,
                "vitamin_D" => $vitamin_D,
            ]
        );

        $diary_id = $request->diary_id;
        $meal = $request->meal;
        $serving_size_food_id = $serving_size_food->id;
        $process_id = Diary::where('id', $diary_id)->first()->process_id;
        $user = Process::where('id', $process_id)->first()->user_id;

        if ($user == auth('api')->user()->id) {
            DiaryFoodDetail::create([
                'diary_id' => $diary_id,
                'serving_size_food_id' => $serving_size_food_id,
                'quantity' => $request->quantity,
                'meal' => $meal
            ]);

            return ResponseHelper::send();
        } else {
            return ResponseHelper::send(
                [],
                Status::NG,
                HttpCode::FORBIDDEN,
                ['jwt_middleware_error' => "You are not allowed to add this."]
            );
        }

        //return ResponseHelper::send(new FoodResource($food));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Food  $food
     * @return \Illuminate\Http\Response
     */
    public function show(Food $food)
    {
        return ResponseHelper::send(new FoodResource($food));
    }

    /**
     * Display the specified resource.
     *
     * @param  StoreFoodRequest  $request
     * @return \Illuminate\Http\Response
     */

    // public function search($name)
    // {
    //     //$name = $request['name'];
    //     // if (empty($name)) {
    //     //     $errors['auth'] = "Invalid email or password";
    //     //     return ResponseHelper::send([], Status::NG, HttpCode::UNAUTHORIZED, $errors);
    //     // }
    //     return ResponseHelper::send(FoodResource::collection(Food::where('name', 'LIKE', '%' . $name . '%')->get()));
    // }

    public function search(SearchFoodRequest $request)
    {
        $name = $request['name'];
        $food = FoodResource::collection(Food::where([
            ['name', 'LIKE', '%' . $name . '%'],
            ['user_id', null]
        ])->get());
        return ResponseHelper::send($food);
    }

    public function searchMyFood(SearchFoodRequest $request)
    {
        $name = $request['name'];
        $user = auth('api')->user();
        $food = FoodResource::collection(Food::where([
            ['name', 'LIKE', '%' . $name . '%'],
            ['user_id', $user->id]
        ])->get());
        return ResponseHelper::send($food);
    }
}
