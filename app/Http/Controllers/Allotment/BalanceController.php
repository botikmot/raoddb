<?php

namespace App\Http\Controllers\Allotment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Balance;
use Illuminate\Support\Facades\Validator;


class BalanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(Balance::get(), 200);
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
        $rules = [
            'balance'   => 'required'
         ];
        $validator = Validator::make($request->all(), $rules);
        if($validator->fails()){
            return response()->json(['status' => 'error', 'message' => $validator->errors()], 400);
        }
        $balance = Balance::create($request->all());
        return response()->json(['status' => 'success','balance' => $balance], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $balance = Balance::find($id);
        $balance->update($request->all());
        return response()->json(['status' => 'success','balance' => $balance], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $balance = Balance::find($id);
        $balance->delete();
        return response()->json(['status' => 'success','message' => 'successfully deleted'], 200);
    }
}
