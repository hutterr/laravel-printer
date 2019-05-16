<?php

namespace App\Http\Controllers;

use App\UsedParts;
use App\Printer;
use Illuminate\Http\Request;

class UsedPartsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
     * @param  \App\UsedParts  $usedParts
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $felhasznalas = Printer::find($id)->alkatresz()->paginate(10);

        return view('parts.usedShow',compact('felhasznalas'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\UsedParts  $usedParts
     * @return \Illuminate\Http\Response
     */
    public function edit(UsedParts $usedParts)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\UsedParts  $usedParts
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UsedParts $usedParts)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\UsedParts  $usedParts
     * @return \Illuminate\Http\Response
     */
    public function destroy(UsedParts $usedParts)
    {
        //
    }
}
