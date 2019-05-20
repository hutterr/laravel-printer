@extends('layouts.app')

@section('nav')
    @include('inc.navbar', ['title' => 'Alkatrész felvétele'])
@endsection
@section('content')
<div class="col-lg-11 mx-auto mt-3">
    <div class="card">
        <div class="card-header">
            <div class="row">             

            </div>

        </div>
        <div class="card-body">
            <form class="col-lg-11 mx-auto" action="/alkatresz/{{$alkatresz->id}}" method="POST">         
                <div class="form-group row">
                        <label for="edp" class="col-sm-2 col-form-label ">EDP kód</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="edp" name="edp" value="{{$alkatresz->edp}}">
                            <small>{{$errors->first('edp')}}</small>
                        </div>
                        </div>
                          <div class="form-group row">
                        <label for="megnevezes" class="col-sm-2 col-form-label">Megnevezés</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="megnevezes" name="megnevezes" value="{{$alkatresz->megnevezes }}" >
                            <small>{{$errors->first('megnevezes')}}</small>
                        </div>
                        </div>
                        <div class="form-group row">
                            <label for="ar" class="col-sm-2 col-form-label ">Beszer. ár</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="ar" name="ar" value="{{$alkatresz->ar}}">
                                <small>{{$errors->first('ar')}}</small>
                            </div>
                        </div>
                        <div class="row justify-content-center my-3">
                                <button type="submit" class="btn btn-primary col-lg-2">Módosít</button>                    
                        </div>     
                @method('patch')
                @csrf
            </form>  
            
      </div>
      
@endsection