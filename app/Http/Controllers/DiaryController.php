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
