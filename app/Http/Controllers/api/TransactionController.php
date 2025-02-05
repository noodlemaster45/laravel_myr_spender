<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Transaction::create([
            "user_id" => auth()->user()->id,
            "amount" => $request->input('amount'),
            "type" => $request->input('type')
        ]);
        return response()->json([
            'status' => "true",
            'message' => 'transaction added'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $id, $request)
    {
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $transModel = Transaction::find($id);
        if($transModel->user_id != auth()->user()->id){
            return response()->json([
                'status' => "false",
                'message' => 'unathorized'
            ]);
        }
        else{
            $transModel->update($request->all());
            return response()->json([
                'status' => "true",
                'message' => 'transaction edited'
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
