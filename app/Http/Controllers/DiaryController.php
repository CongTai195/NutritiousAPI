<?php

namespace App\Http\Controllers;

use App\Helpers\HTTPCode;
use App\Helpers\ResponseHelper;
use App\Helpers\Status;
use App\Models\Diary;
use App\Http\Requests\StoreDiaryRequest;
use App\Http\Requests\UpdateDiaryRequest;
use App\Http\Resources\DiaryResource;
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
        $array = ['date' => $date, 'user_id' => $user_id];
        $diary = Diary::create($array);
        //dd(auth('api')->user()->email);

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
        $diary = Diary::where([['user_id', auth('api')->user()->id], ['date', $date]])->first();
        if (isset($diary)) {
            return ResponseHelper::send(new DiaryResource($diary));
        }
        throw new HttpResponseException(
            ResponseHelper::send([], Status::NG, HttpCode::UNPROCESSABLE_ENTITY, ["Diary not existed"])
        );
    }
}
