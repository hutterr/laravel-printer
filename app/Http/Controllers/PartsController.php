<?php

namespace App\Http\Controllers;

use App\Parts;
use Illuminate\Http\Request;

class PartsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $edp = is_null($request->edp) ? null : $request->edp;
        $megnevezes = is_null($request->megnevezes) ? null : $request->megnevezes;
        $alkatreszek = Parts::edp($edp)->megnevezes($megnevezes)->paginate(10);
        return view('parts.show',compact('alkatreszek'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('parts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'edp' => 'required|unique:parts,edp',
            'megnevezes' => 'required',
            'ar' => 'required'
        ]);

        Parts::create($validate);
        $alkatreszek = Parts::paginate(10);
        return view('parts.show',compact('alkatreszek'))->withErrors(['uzenet' => ['Sikeresen hozzáadva!']]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Parts  $parts
     * @return \Illuminate\Http\Response
     */
    public function show(Parts $parts)
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Parts  $parts
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $alkatresz = Parts::findOrFail($id);
        return view('parts.modify', compact('alkatresz'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Parts  $parts
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validate = $request->validate([
            'edp' => 'required',
            'megnevezes' => 'required',
            'ar' => 'required'
        ]);

        Parts::findOrFail($id)->update($validate);
        $alkatreszek = Parts::paginate(10);

        return view('parts.show',compact('alkatreszek'))->withErrors(['uzenet' => ['Sikeresen hozzáadva!']]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Parts  $parts
     * @return \Illuminate\Http\Response
     */
    public function destroy(Parts $parts)
    {
        //
    }
}
