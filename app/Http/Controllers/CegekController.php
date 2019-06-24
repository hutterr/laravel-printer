<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cegek;

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
            'adoszam' => 'required|min:11|numeric|unique:cegek,adoszam',
            'cim' => 'required',
            'telefon' => '',
            'kapcsolattarto' => '',
            'kapcstel' => '',           
            ],
            [
                'cegnev.required' => 'A cégnév mező kötelezően kitöltendő!',
                'cegnev.unique' => 'Ez a cégnév már szerepel a rendszerben!',
                'adoszam.required' => 'Az adószám mező kötelezően kitöltendő!',
                'adoszam.numeric' => 'Csak számot tartalmazhat!',
                'adoszam.min' => 'Az adószámnak legalább 11 karakternek kell lennie!',
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
            'adoszam' => 'required|min:11',
            'cim' => 'required',
            'telefon' => '',
            'kapcsolattarto' => '',
            'kapcstel' => '',           
            ],
            [
                'cegnev.required' => 'A cégnév mező kötelezően kitöltendő!',
                'adoszam.required' => 'Az adószám mező kötelezően kitöltendő!',
                'adoszam.min' => 'Az adószámnak legalább 11 karakternek kell lennie!',
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
        Cegek::where('id',$id)->delete();

        return redirect('cegek')->withErrors(['uzenet' => ['Sikeres törlés!']]);
    }
}
