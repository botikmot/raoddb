<?php

namespace App\Http\Controllers\Allotment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Raod;
use Illuminate\Support\Facades\Validator;

class RaodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(Raod::get(), 200);
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
            'user_id' => 'required',
            'serial'   => 'required',
            'activity'   => 'required',
            'uacscode'   => 'required',
            'name'   => 'required',
            'particular'   => 'required',
            'obligation'   => 'required'
         ];
        $validator = Validator::make($request->all(), $rules);
        if($validator->fails()){
            return response()->json(['status' => 'error', 'message' => $validator->errors()], 400);
        }
        $raod = Raod::create($request->all());
        return response()->json(['status' => 'success','raod' => $raod], 201);
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
        $raod = Raod::find($id);
        $raod->update($request->all());
        return response()->json(['status' => 'success','raod' => $raod], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $raod = Raod::find($id);
        $raod->delete();
        return response()->json(['status' => 'success','message' => 'successfully deleted'], 200);
    }
}
