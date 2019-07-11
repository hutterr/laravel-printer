<?php

namespace App\Http\Controllers;

use App\RepairCounter;
use App\Printer;
use Illuminate\Http\Request;

class RepairCounterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('repair.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $nyomtatok = Printer::all();
        return view('repair.create', compact('nyomtatok'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $repairData = request()->validate(
            [
                'printer_id' => 'required',
                'fekete' => 'required',
                'szines' => '',
                'datum' => 'required',
                'megjegyzes' => 'required',
                'technikus' => 'required'          
            ],
            [
                'printer_id:required' => 'Kötelező nyomatót választani!',
                'fekete:required'  => 'Kötelező a fekete számláló kitöltése!',
                'datum:required' => 'Kötelező a dátum megadása!',
                'megjegyzes:required' => 'Kötelező megadni mi történt a géppel!'
            ]
        );
        RepairCounter::create($repairData);

        return redirect('javitasok')->withErrors(['uzenet' => ['Sikeresen hozzáadva!']]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\RepairCounter  $repairCounter
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $javitas = RepairCounter::findOrFail($id);
        
        return view('repair.show', compact('javitas'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\RepairCounter  $repairCounter
     * @return \Illuminate\Http\Response
     */
    public function edit(RepairCounter $repairCounter)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\RepairCounter  $repairCounter
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RepairCounter $repairCounter)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\RepairCounter  $repairCounter
     * @return \Illuminate\Http\Response
     */
    public function destroy(RepairCounter $repairCounter)
    {
        //
    }
}
