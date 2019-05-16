<?php

namespace App\Http\Controllers;

use App\PrinterCounter;
use App\Printer;
use Illuminate\Http\Request;

class PrinterCounterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('counter.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $nyomtatok = Printer::all();
        return view('counter.create', compact('nyomtatok'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $counterData = request()->validate(
            [
                'printer_id' => 'required',
                'fekete' => 'required',
                'szines' => '',
                'bejelentesi_datum' => 'required'          
            ]
        );
        PrinterCounter::create($counterData);

        return redirect('szamlalo')->withErrors(['uzenet' => ['Sikeresen hozzáadva!']]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\PrinterCounter  $printerCounter
     * @return \Illuminate\Http\Response
     */
    public function show(PrinterCounter $printerCounter)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PrinterCounter  $printerCounter
     * @return \Illuminate\Http\Response
     */
    public function edit(PrinterCounter $printerCounter)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PrinterCounter  $printerCounter
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PrinterCounter $printerCounter)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PrinterCounter  $printerCounter
     * @return \Illuminate\Http\Response
     */
    public function destroy(PrinterCounter $printerCounter)
    {
        //
    }
}
