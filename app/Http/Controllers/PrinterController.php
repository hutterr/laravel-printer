<?php

namespace App\Http\Controllers;

use App\Printer;
use App\Cegek;
use App\PrinterCounter;
use App\Charts\CounterChart;
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
        return redirect('nyomtatok')->withErrors(['uzenet' => ['Sikeresen hozzáadva!']]);
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
       $printer = Printer::where('id',$id)->firstOrFail();
       $szamlalok = Printer::find($id)->szamlalo()->orderBy('created_at','desc')->paginate(6);
       $szamlalo = Printer::find($id)->szamlalo()->orderBy('created_at','asc')->take(12)->get();

       $datum = $szamlalo->map(function($szamlalo){
           return date('Y/m/d', strtotime($szamlalo->bejelentesi_datum));
       });

       $fekete = $szamlalo->map(function($szamlalo){
        return $szamlalo->fekete;
        }); 

        $szines = $szamlalo->map(function($szamlalo){
            return $szamlalo->szines;
         }); 

        $maxFekete=0;
        $dbFekete=0;
    
        foreach ($fekete as $szam) {            
            
            if($szam > $maxFekete){
                $maxFekete = $szam;
            }
            $dbFekete++;
        }

        $maxSzines=0;
        $dbSzines=0;
    
        foreach ($szines as $szin) {            
            
            if($szin > $maxSzines){
                $maxSzines = $szin;
            }
            $dbSzines++;
        }


        
       $atlagFekete = intval($maxFekete/$dbFekete);
       $atlagSzines = intval($maxSzines/$dbSzines);

       $feketeChart = new CounterChart;
       $feketeChart->height(200);
       $feketeChart->labels($datum);
       $feketeChart->dataset('Fekete', 'line', $fekete)->options([
        'color' => 'black',
        'backgroundColor' => 'grey'
        ]);
       $szinesChart = new CounterChart;
       $szinesChart->height(200);
       $szinesChart->labels($datum);
       $szinesChart->dataset('Színes', 'line', $szines)->options([
        'color' => '#00CED1',
        'backgroundColor' => '#00CED1',
        
        ]);

       return view('printer.details',compact('printer','cegek','szamlalok','feketeChart','szinesChart','atlagFekete','atlagSzines'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Printer  $printer
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cegek = Cegek::all();
        $printer  = Printer::where('id',$id)->first();
        
        return view('printer.show', compact('printer','cegek'));
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
