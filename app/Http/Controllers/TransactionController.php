<?php

namespace App\Http\Controllers;

use IcehouseVentures\LaravelChartjs\Facades\Chartjs;
use Illuminate\Http\Request;
use App\Models\Transaction;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {       
    $transactions = Transaction::selectRaw('type, sum(amount) as total')
    ->where('user_id','=','1')
    ->groupBy('type')
    ->get();

    $labels = $transactions->pluck('type'); 
    $data = $transactions->pluck('total');  
        return view('index',compact('labels','data'))->with('transactions',Transaction::where("user_id","=","1")->get());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
