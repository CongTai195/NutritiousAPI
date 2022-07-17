<?php

namespace App\Http\Controllers;

use App\Helpers\HttpCode;
use App\Helpers\ResponseHelper;
use App\Helpers\Status;
use App\Models\Diary;
use App\Http\Requests\StoreDiaryRequest;
use App\Http\Requests\UpdateDiaryRequest;
use App\Http\Resources\DiaryResource;
use App\Http\Resources\StatisticResource;
use App\Models\DiaryWaterDetail;
use App\Models\Process;
use App\Models\User;
use Carbon\Carbon;
use ErrorException;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Facades\DB;

class DiaryController extends Controller
{

    public function index()
    {
        $user_id = auth('api')->user()->id;
        $process_id = Process::where('user_id', $user_id)->get("id")->first()->id;
        $diary = StatisticResource::collection(Diary::all()->where('process_id', $process_id));
        return ResponseHelper::send($diary);

        //OLD_CODE:
        // $result = array();
        // $subset = $process_id->toArray();
        // foreach ($subset as $process) {
        //     $diary = Diary::where('process_id', $process['id'])->get(['id', 'date', 'weight_log', 'heart_rate_log', 'blood_pressure_log',]);
        //     $sub_diary = $diary->toArray();
        //     foreach ($sub_diary as $sub) {
        //         array_push($result, $sub);
        //     }
        // }
        // usort($result, function ($object1, $object2) {
        //     return $object1['date'] > $object2['date'];
        // });
        // $result_week = array_slice($result, -7);

        // $result_month = array_slice($result, -31);

        // $temp_month = [];
        // array_push($temp_month, $result_month[0]);
        // for ($x = 1; $x < count($result_month) - 1; $x += round(count($result_month) / 5)) {
        //     array_push($temp_month, $result_month[$x]);
        // }
        // array_push($temp_month, $result_month[count($result_month) - 1]);

        // $result_3_months = array_slice($result, -90);

        // $temp_3_months = [];
        // array_push($temp_3_months, $result_3_months[0]);
        // for ($x = 1; $x < count($result_3_months) - 1; $x += round(count($result_3_months) / 5)) {
        //     array_push($temp_3_months, $result_3_months[$x]);
        // }
        // array_push($temp_3_months, $result_3_months[count($result_3_months) - 1]);

        // $final_result = [];
        // array_push($final_result, $result_week);
        // array_push($final_result, $temp_month);
        // array_push($final_result, $temp_3_months);

        // return ResponseHelper::send($final_result);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreDiaryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDiaryRequest $request)
    {
        $now = Carbon::now()->format('Y-m-d');
        $date = $request->get('date');
        $requested_current_weight = $request->get('weight_log');
        $user_id = auth('api')->user()->id;
        $process = Process::where('user_id', $user_id)->whereDate('created_at', '<=', $date)->latest('created_at')->first();
        $current_weight = isset($requested_current_weight) ? $requested_current_weight : $process->current_weight;
        if (isset($requested_current_weight) && $date == $now) {
            DB::table('processes')->where('id', $process->id)->update(array(
                'current_weight' => $requested_current_weight,
            ));
        }
        $process_id = $process->id;
        $is_enough = $request->get('is_enough');
        $array = [
            'date' => $date,
            'process_id' => $process_id,
            'is_enough' => $is_enough,
            'weight_log' => $current_weight,
            'heart_rate_log' => 75,
            'blood_pressure_log' => 120
        ];
        $diary = Diary::create($array);

        DiaryWaterDetail::create([
            'diary_id' => $diary->id,
            'amount' => 0
        ]);

        return ResponseHelper::send(new DiaryResource($diary));
    }

    public function update(UpdateDiaryRequest $request, Diary $diary)
    {
        $now = Carbon::now()->format('Y-m-d');
        $requested_current_weight = $request->get('weight_log');
        $diary_id = $diary->id;
        $date = $diary->date;
        $process = Diary::where('id', $diary_id)->first();
        $process_id = Diary::where('id', $diary_id)->first()->process_id;
        $user = Process::where('id', $process_id)->first()->user_id;
        if ($user == auth('api')->user()->id) {
            $diary->update($request->all());
            if (isset($requested_current_weight) && $date == $now) {
                DB::table('processes')->where('id', $process_id)->update(array(
                    'current_weight' => $requested_current_weight,
                ));
            }
            return ResponseHelper::send();
        } else {
            return ResponseHelper::send(
                [],
                Status::NG,
                HttpCode::FORBIDDEN,
                ['jwt_middleware_error' => "You are not allowed to update this."]
            );
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Diary  $diary
     * @return \Illuminate\Http\Response
     */
    public function show(StoreDiaryRequest $request)
    {
        $date = $request['date'];
        $user_id = auth('api')->user()->id;
        $process = Process::where('user_id', $user_id)->whereDate('created_at', '<=', $date)->latest('created_at')->first();
        if (isset($process)) {
            $diary = Diary::where([['process_id', $process->id], ['date', $date]])->first();
            if (isset($diary)) {
                return ResponseHelper::send(new DiaryResource($diary));
            }
            throw new HttpResponseException(
                ResponseHelper::send([], Status::NG, HttpCode::NOT_FOUND, ['error' => "Diary not existed"])
            );
        } else {
            throw new HttpResponseException(
                ResponseHelper::send([], Status::NG, HttpCode::NOT_FOUND, ['error' => "Your process is not started"])
            );
        }

        // $diary = Diary::where([['process_id', $process_id], ['date', $date]])->first();
        // if (isset($diary)) {
        //     return ResponseHelper::send(new DiaryResource($diary));
        // }
        // throw new HttpResponseException(
        //     ResponseHelper::send([], Status::NG, HttpCode::NOT_FOUND, ["Diary not existed"])
        // );
    }
}
