<?php

namespace App\Http\Controllers;

use App\Printer;
use App\Cegek;
use Illuminate\Http\Request;

class PrinterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $nyomtatok = Printer::paginate(10);

        return view('printer.index',compact('nyomtatok'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cegek = Cegek::all();
        $printer = new Printer();
        return view('printer.create',compact('cegek','printer'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $printerData = request()->validate(
            [
            'gepszam' => 'required|unique:printers,gepszam',
            'gyszam' => 'required|unique:printers,gyszam',
            'marka' => '',
            'geptipus' => '',
            'ceg_id' => 'required',
            'hely' => '',
            'elozohely' => '',
            'telefon' => '',
            'df' => '',
            'duplex' => '',
            'gepasztal' => '',
            'egytalca' => '',
            'kettotalca' => '',
            'lct' => '',
            'szorter' => '',
            'nyomtato' => '',
            'halo' => '',
            'scan' => '',
            'fax' => '',
            'hdd' => '',
            'beszer_ar' => '',           
            ]
        );
        Printer::create($printerData);
    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Printer  $printer
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cegek = Cegek::all();
        $printer  = Printer::find(1)->first();
        
        return view('printer.show', compact('printer','cegek'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Printer  $printer
     * @return \Illuminate\Http\Response
     */
    public function edit(Printer $printer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Printer  $printer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $printerData = request()->validate(
            [
            'marka' => '',
            'geptipus' => '',
            'ceg_id' => 'required',
            'hely' => '',
            'elozohely' => '',
            'telefon' => '',
            'df' => '',
            'duplex' => '',
            'gepasztal' => '',
            'egytalca' => '',
            'kettotalca' => '',
            'lct' => '',
            'szorter' => '',
            'nyomtato' => '',
            'halo' => '',
            'scan' => '',
            'fax' => '',
            'hdd' => '',
            'beszer_ar' => '',           
            ]
        );
       Printer::where('id',$id)->update($printerData);
       
       return redirect('nyomtatok')->withErrors(['uzenet' => ['Sikeresen módosítva!']]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Printer  $printer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Printer $printer)
    {
        //
    }
}
