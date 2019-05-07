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
    public function index()
    {   
        $cegek = Cegek::paginate(10);

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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ceg = Cegek::where('id', $id)->first();
        
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
            'telefonszam' => '',
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

        return redirect('cegek');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
