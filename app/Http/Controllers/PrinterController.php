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
    public function index(Request $request)
    {
        $gepszam = is_null($request->gepszam) ? null : $request->gepszam;
        $nyomtatok = Printer::gepszam($gepszam)->paginate(10);

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
       $szamlalo = Printer::find($id)->szamlalo()->orderBy('bejelentesi_datum','asc')->take(12)->get();
       $javitasok = Printer::find($id)->javitasok()->orderBy('datum','desc')->paginate(6);
       $alkatreszKoltseg = Printer::find($id)->alkatresz()->get();

       $alkKoltsegSzum=0;
       
       foreach($alkatreszKoltseg as $koltseg){
            $alkKoltsegSzum += ($koltseg->db * $koltseg->ar);
       }
       $honap = 0;
       $fekete = array();
       $szines = array(); 
       $datum  = array();
       $maxFekete=0; 
       $dbFekete=0;
      
       if($szamlalo->count() > 0){
            $datum = $szamlalo->map(function($szamlalo){
                return date('Y/m/d', strtotime($szamlalo->bejelentesi_datum));
            });
        
            
                $datum_tomb = array();
                foreach($szamlalo as $koltseg){
                array_push($datum_tomb,  strtotime($koltseg->bejelentesi_datum));
                }
            
            
                $min_date = min($datum_tomb);
                $max_date = max($datum_tomb);
        
                
        
                while (($min_date = strtotime("+1 MONTH", $min_date)) <= $max_date) {
                    $honap++;
                }
                
                
                if(count($szamlalo) == 0){
                       
                
                }else{
                        $fekete = $szamlalo->map(function($szamlalo){
                            return $szamlalo->fekete;
                        }); 
                
                        $szines = $szamlalo->map(function($szamlalo){
                            return $szamlalo->szines;
                        }); 
                }
            
        
                
                $minFekete=empty($fekete) ? 0 : $fekete[0];
                
                if(!empty($fekete)){
                foreach ($fekete as $szam) {            
                    
                    if($szam > $maxFekete){
                        $maxFekete = $szam;
                    }
                    if($szam < $minFekete){
                        $minFekete = $szam;
                    }
                    $dbFekete++;
                }
                }
        
                $maxSzines=0;
                $minSzines=empty($szines) ? 0 :$szines[0];
                $dbSzines=0;
                if(!empty($szines)){
                foreach ($szines as $szin) {            
                    
                    if($szin > $maxSzines){
                        $maxSzines = $szin;
                    }
                    if($szin < $minSzines){
                        $minSzines = $szin;
                    }
                    $dbSzines++;
                }
                }
        
            if($honap == 0){
                $honap = 1;
            }else {
                $honap++;
            }
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

       }
       else{
        
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

       }

        
       $atlagFekete = empty($fekete) ? 0 : intval(($maxFekete-$minFekete)/$honap);
       $atlagSzines = empty($szines) ? 0 : intval(($maxSzines-$minSzines)/$honap);


       return view('printer.details',compact('printer','cegek','szamlalok','feketeChart','szinesChart','atlagFekete','atlagSzines','javitasok','alkKoltsegSzum'));
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
    public function atlagAlatt(Request $request){
        $printers = Printer::all();
        
        $atlagSz = is_null($request->atlagSz) ? 0 : $request->atlagSz;
        if($atlagSz == 0){
            $atlagF = is_null($request->atlagF) ? 1000 : $request->atlagF;
        }
        else {
            $atlagF = is_null($request->atlagF) ? 100000 : $request->atlagF;
        }
        $szamlalo;
        $datum_tomb;
        $min_date;
        $max_date;
        
        $atlagok = array();

        foreach($printers as $printer){
            $datum_tomb = array();
            $honap = 0;
            $szamlalo = Printer::find($printer->id)->szamlalo()->get();
            if($szamlalo->count() > 0){
                $datum = $szamlalo->map(function($szamlalo){
                    return date('Y/m/d', strtotime($szamlalo->bejelentesi_datum));
                });     
                
                
                 foreach($szamlalo as $koltseg){
                    array_push($datum_tomb,  strtotime($koltseg->bejelentesi_datum));
                 }
                
               
                 $min_date = min($datum_tomb);
                 $max_date = max($datum_tomb);   
                     
                 while (($min_date = strtotime("+1 MONTH", $min_date)) <= $max_date) {
                     $honap++;
                 }
                 
                 
                 if(count($szamlalo) == 0){
                    $fekete = array();
                    $szines = array();         
                 }else{
                    $fekete = $szamlalo->map(function($szamlalo){
                        return $szamlalo->fekete;
                    }); 
            
                    $szines = $szamlalo->map(function($szamlalo){
                        return $szamlalo->szines;
                    }); 
                 }
                
         
                 $maxFekete=0;
                 $minFekete=empty($fekete) ? 0 : $fekete[0];
                 $dbFekete=0;
                 if(!empty($fekete)){
                 foreach ($fekete as $szam) {            
                     
                     if($szam > $maxFekete){
                         $maxFekete = $szam;
                     }
                     if($szam < $minFekete){
                         $minFekete = $szam;
                     }
                     $dbFekete++;
                 }
                 }
         
                 $maxSzines=0;
                 $minSzines=empty($szines) ? 0 :$szines[0];
                 $dbSzines=0;
                 if(!empty($szines)){
                 foreach ($szines as $szin) {            
                     
                     if($szin > $maxSzines){
                         $maxSzines = $szin;
                     }
                     if($szin < $minSzines){
                         $minSzines = $szin;
                     }
                     $dbSzines++;
                 }
                 }
         
                if($honap == 0){
                    $honap = 1;
                }
                else {
                    $honap++;
                }
                 
                $atlagFekete = empty($fekete) ? 0 : intval(($maxFekete-$minFekete)/$honap);
                $atlagSzines = empty($szines) ? 0 : intval(($maxSzines-$minSzines)/$honap);
                if($atlagFekete < $atlagF){
                    if($atlagSz > 0){
                        if($atlagSzines < $atlagSz && $atlagSzines > 0){
                            array_push($atlagok,
                                array(
                                    "id" => $printer->id,
                                    "gepszam" => $printer->gepszam,
                                    "marka" => $printer->marka,
                                    "tipus" => $printer->tipus,
                                    "atlagF" => $atlagFekete,
                                    "atlagSz" => $atlagSzines
                                )
                                );
                        }
                    }
                    else {
                            array_push($atlagok,
                                array(
                                    "id" => $printer->id,
                                    "gepszam" => $printer->gepszam,
                                    "marka" => $printer->marka,
                                    "tipus" => $printer->tipus,
                                    "atlagF" => $atlagFekete,
                                    "atlagSz" => $atlagSzines
                                )
                                );
                        }
                    
                }
            }
        }
        

       /*  $page = !empty( $_GET['page'] ) ? (int) $_GET['page'] : 1;
        $total = count( $atlagok ); //total items in array    
        $limit = 2; //per page    
        $totalPages = ceil( $total/ $limit ); //calculate total pages
        $page = max($page, 1); //get 1 page when $_GET['page'] <= 0
        $page = min($page, $totalPages); //get last page when $_GET['page'] > $totalPages
        $offset = ($page - 1) * $limit;
        if( $offset < 0 ) $offset = 0;

        $atlagTomb = array_slice( $atlagok, $offset, $limit ); */
        
        //dd($atlagTomb);
        usort($atlagok, function($a, $b) {
            return $a['atlagF'] <=> $b['atlagF'];
        });
        return view('printer.atlagalatt', compact('atlagok','totalPages','page'));
    }
}
