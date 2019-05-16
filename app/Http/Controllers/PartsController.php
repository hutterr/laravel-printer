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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Parts  $parts
     * @return \Illuminate\Http\Response
     */
    public function show(Parts $parts)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Parts  $parts
     * @return \Illuminate\Http\Response
     */
    public function edit(Parts $parts)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Parts  $parts
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Parts $parts)
    {
        //
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
