@extends('layouts.app')

@section('nav')
    @include('inc.navbar', ['title' => 'Alkatrész elhasználás'])
@endsection
@section('content')
<div class="col-lg-11 mx-auto mt-3">
    <div class="card">
        <div class="card-header">
            <div class="row">             

            </div>

        </div>
        <div class="card-body">
            <form class="col-lg-11 mx-auto" action="/hasznalt" method="POST"> 
                <div class="form-group row">
                        <label for="printer_id" class="col-sm-2 col-form-label ">Gépszám</label>
                        <div class="col-sm-10">
                                <select class="form-control" id="printerSelect" name="printer_id">
                                    @if($nyomtatok->count() == 0){
                                        <option disabled>Még nincsenek nyomtatok...</option>
                                    }
                                    @else
                                        @foreach ($nyomtatok as $nyomtato)
                                        <option value="{{$nyomtato->id}}" >{{$nyomtato->gepszam}}</option>
                                        @endforeach
                                    @endif
                                  
                                </select>
                        </div>
                </div> 
                <div class="form-group row">
                        <label for="db" class="col-sm-2 col-form-label ">Darabszám</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="db" name="db" value="{{old('db')}}">
                            <small>{{$errors->first('db')}}</small>
                        </div>
                        </div>
                <div class="form-group row">
                        <label for="parts_id" class="col-sm-2 col-form-label ">Alkatrész</label>
                        <div class="col-sm-10">
                                <select class="form-control" id="partsSelect" name="parts_id">
                                    @if($alkatreszek->count() == 0){
                                        <option disabled>Még nincsenek alkatrészek...</option>
                                    }
                                    @else
                                        @foreach ($alkatreszek as $alkatresz)
                                <option value="{{$alkatresz->id}}" >{{$alkatresz->edp}} - {{$alkatresz->megnevezes}}</option>
                                        @endforeach
                                    @endif
                                  
                                </select>
                        </div>
                </div>       
                <div class="row justify-content-center my-3">
                        <button type="submit" class="btn btn-primary col-lg-2">Rögzités</button>                    
                </div>     

                @csrf
            </form>  
            
      </div>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/js/select2.min.js"></script>
      <script type="text/javascript">
             $(document).ready(function(){
                $('#printerSelect').select2();
                $('#partsSelect').select2();
             });
      </script>
      
@endsection