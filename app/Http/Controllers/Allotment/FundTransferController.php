<?php

namespace App\Http\Controllers\Allotment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FundTransfer;
use Illuminate\Support\Facades\Validator;

class FundTransferController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(FundTransfer::get(), 200);
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
            'allotclass'   => 'required',
            'pap_id'   => 'required',
            'pap_name'   => 'required',
            'activity'   => 'required',
            'office'   => 'required',
            'status'   => 'required',
            'amount'   => 'required',
            'year'   => 'required'
         ];
        $validator = Validator::make($request->all(), $rules);
        if($validator->fails()){
            return response()->json(['status' => 'error', 'message' => $validator->errors()], 400);
        }
        $transfer = FundTransfer::create($request->all());
        return response()->json(['status' => 'success','fundtransfer' => $transfer], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return response()->json(FundTransfer::where('year', $id)->get(), 200);
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
        $transfer = FundTransfer::find($id);
        $transfer->update($request->all());
        return response()->json(['status' => 'success','fundtransfer' => $transfer], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $transfer = FundTransfer::find($id);
        $transfer->delete();
        return response()->json(['status' => 'success','message' => 'successfully deleted'], 200);
    }

    public function transfer($aclass, $id)
    {
        $transfer = FundTransfer::with('transfer')
                    ->where('allotclass',$aclass)
                    ->where('pap_id',$id)->get();
        return response()->json(['status' => 'success','transfer' => $transfer], 200);
    }
}
