<?php

namespace App\Http\Controllers\Allotment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CapitalOutlay;
use Illuminate\Support\Facades\Validator;

class CapitalOutlayController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       return response()->json(CapitalOutlay::get(), 200);
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
            'name'   => 'required',
            'year'   => 'required',
            'amount'   => 'required'
         ];
        $validator = Validator::make($request->all(), $rules);
        if($validator->fails()){
            return response()->json(['status' => 'error', 'message' => $validator->errors()], 400);
        }
        $co = CapitalOutlay::create($request->all());
        return response()->json(['status' => 'success','co' => $co], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return response()->json(CapitalOutlay::where('year', $id)->get(), 200);
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
        $co = CapitalOutlay::find($id);
        $co->update($request->all());
        return response()->json(['status' => 'success','co' => $co], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $co = CapitalOutlay::find($id);
        $co->delete();
        return response()->json(['status' => 'success','message' => 'successfully deleted'], 200);
    }

    public function cotransfer($id)
    {
        $transfers = CapitalOutlay::with('transfer')->where('year', $id)->get();
        foreach ($transfers as $transfer) {
            $i = 0;
            foreach ($transfer->transfer as $trans)
            {
                $i = $i + $trans->amount;
            }
            //unset($transfer->transfer);
            $transfer->amount_transfer = $i;
            $transfer->available_amount = $transfer->amount - $i;
        }
        return response()->json(['status' => 'success','transfer' => $transfers], 200);
    }
}
