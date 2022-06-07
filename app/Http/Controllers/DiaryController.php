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
use Illuminate\Http\Exceptions\HttpResponseException;

class DiaryController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreDiaryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDiaryRequest $request)
    {
        $date = $request->get('date');
        $user_id = auth('api')->user()->id;
        $process_id = Process::all()->where('user_id', $user_id)->last()->id;
        $is_enough = $request->get('is_enough');
        $array = [
            'date' => $date,
            'process_id' => $process_id,
            'is_enough' => $is_enough,
        ];
        $diary = Diary::create($array);

        return ResponseHelper::send(new DiaryResource($diary));
    }

    public function update(UpdateDiaryRequest $request, Diary $diary)
    {
        $diary_id = $diary->id;
        $process_id = Diary::where('id', $diary_id)->first()->process_id;
        $user = Process::where('id', $process_id)->first()->user_id;
        if ($user == auth('api')->user()->id) {
            $diary->update($request->all());

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
        $process_id = Process::all()->where('user_id', $user_id)->last()->id;
        $diary = Diary::where([['process_id', $process_id], ['date', $date]])->first();
        if (isset($diary)) {
            return ResponseHelper::send(new DiaryResource($diary));
        }
        throw new HttpResponseException(
            ResponseHelper::send([], Status::NG, HttpCode::UNPROCESSABLE_ENTITY, ["Diary not existed"])
        );
    }
}
