<?php

namespace App\Http\Controllers;

use App\Helpers\HTTPCode;
use App\Helpers\ResponseHelper;
use App\Helpers\Status;
use App\Models\Diary;
use App\Http\Requests\StoreDiaryRequest;
use App\Http\Requests\UpdateDiaryRequest;
use App\Http\Resources\DiaryResource;
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
        $process_id = Process::where('user_id', $user_id)->get("id");
        $result = array();
        $subset = $process_id->toArray();
        foreach ($subset as $process) {
            $diary = Diary::where('process_id', $process['id'])->get(['id', 'date', 'weight_log', 'heart_rate_log', 'blood_pressure_log',]);
            $sub_diary = $diary->toArray();
            foreach ($sub_diary as $sub) {
                array_push($result, $sub);
            }
        }
        $result = array_slice($result, -7);
        usort($result, function ($object1, $object2) {
            return $object1['date'] > $object2['date'];
        });
        return ResponseHelper::send($result);
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
        ];
        $diary = Diary::create($array);

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
                // $process::update([
                //     "current_weight" => $requested_current_weight
                // ]);
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
