<?php

namespace App\Http\Controllers;

use App\Helpers\ResponseHelper;
use App\Models\DiaryFoodDetail;
use App\Http\Requests\StoreDiaryFoodDetailRequest;
use App\Http\Requests\UpdateDiaryFoodDetailRequest;

class DiaryFoodDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreDiaryFoodDetailRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDiaryFoodDetailRequest $request)
    {
        $food = DiaryFoodDetail::create($request->all());

        return ResponseHelper::send($food);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DiaryFoodDetail  $diaryFoodDetail
     * @return \Illuminate\Http\Response
     */
    public function show(DiaryFoodDetail $diaryFoodDetail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDiaryFoodDetailRequest  $request
     * @param  \App\Models\DiaryFoodDetail  $diaryFoodDetail
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDiaryFoodDetailRequest $request, DiaryFoodDetail $diaryFoodDetail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DiaryFoodDetail  $diaryFoodDetail
     * @return \Illuminate\Http\Response
     */
    public function destroy(DiaryFoodDetail $diaryFoodDetail)
    {
        //
    }
}
