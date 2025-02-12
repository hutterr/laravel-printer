<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cegek;
use App\Printer;

class CegekController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)

    {   
        $cegnev = is_null($request->cegnev) ? null : $request->cegnev;
        $cegek = Cegek::nev($cegnev)->paginate(10);

        
        return view('cegek.index', compact('cegek'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ceg = new Cegek();
        return view('cegek.create', compact('ceg'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cegData = request()->validate(
            [
            'cegnev' => 'required|unique:cegek,cegnev',
            'adoszam' => 'unique:cegek,adoszam',
            'cim' => 'required',
            'telefon' => '',
            'kapcsolattarto' => '',
            'kapcstel' => '',           
            ],
            [
                'cegnev.required' => 'A cégnév mező kötelezően kitöltendő!',
                'cegnev.unique' => 'Ez a cégnév már szerepel a rendszerben!',
                'adoszam.unique' => 'Ez az adószám már szerepel a rendszerben',
                'cim.required' => 'A cím kötelezően kitöltendő mező!'
            ]
        );
        Cegek::create($cegData);
        return redirect('cegek')->withErrors(['uzenet' => ['Sikeresen hozzáadva!']]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ceg = Cegek::where('id', $id)->firstorFail();
        
        return view('cegek.details',compact('ceg'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        
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
        
        $cegData = request()->validate(
            [
            'cegnev' => 'required',
            'adoszam' => '',
            'cim' => 'required',
            'telefon' => '',
            'kapcsolattarto' => '',
            'kapcstel' => '',           
            ],
            [
                'cegnev.required' => 'A cégnév mező kötelezően kitöltendő!',
                'cim.required' => 'A cím kötelezően kitöltendő mező!'
            ]
        );
        
       
        
        Cegek::where('id', $id)->update($cegData);

        return redirect('cegek')->withErrors(['uzenet' => ['Sikeres módosítás!']]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   
        if( Cegek::where('cegnev', 'LIKE', 'Master Partner Kft.')->first()->id == $id){
            return redirect('cegek')->withErrors(['uzenet' => ['A saját cég nem törölhető!']]);
        }else{
            Cegek::where('id',$id)->delete();
            $nyomtatok = Printer::where('ceg_id', 'LIKE', $id)->get();
            $sajatCegID = Cegek::where('cegnev', 'LIKE', 'Master Partner Kft.')->first()->id;
            foreach($nyomtatok as $nyomtato){
                $nyomtato->ceg_id = $sajatCegID;
                $nyomtato->elozohely = $nyomtato->hely;
                $nyomtato->hely = '';
                $nyomtato->save();
            }
    
            return redirect('cegek')->withErrors(['uzenet' => ['Sikeres törlés!']]);
        }
    }
}
