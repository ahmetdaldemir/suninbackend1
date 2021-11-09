<?php

namespace App\Http\Controllers\Landlord;

use App\Http\Controllers\Controller;
use App\Models\MyCalender;
use Illuminate\Http\Request;

class MyCalenderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mycalender = new MyCalender();
        return $mycalender->all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
//
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $mycalender = new MyCalender();
        $mycalender->start_date  = $request->start_date;
        $mycalender->finish_date = $request->finish_date;
        $mycalender->description = $request->description;
        $mycalender->save();
        return response()->json($mycalender, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $mycalender =   MyCalender::find($id);
        return response()->json($mycalender, 201);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $mycalender =   MyCalender::find($id);
        return response()->json($mycalender, 201);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $mycalender =  MyCalender::find($id);
        $mycalender->start_date  = $request->start_date;
        $mycalender->finish_date = $request->finish_date;
        $mycalender->description = $request->description;
        $mycalender->save();
        return response()->json($mycalender, 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $mycalender =   MyCalender::find($id);
        $mycalender->delete();
        return response()->json('Başarılı', 201);
    }
}
