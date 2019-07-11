@extends('layouts.app')

@section('nav')
    @include('inc.navbar', ['title' => 'Számláló rögzítése'])
@endsection
@section('content')
<div class="col-lg-11 mx-auto mt-3">
    <div class="card">
        <div class="card-header">
            <div class="row">             

            </div>

        </div>
        <div class="card-body">
            <form class="col-lg-11 mx-auto" action="/szamlalo" method="POST">  
                <div class="form-group row">
                    <label for="printer_id" class="col-sm-2 col-form-label ">Gépszám</label>
                    <div class="col-sm-10">
                            <select class="form-control" id="printer_id" name="printer_id">
                                @if($nyomtatok->count() == 0){
                                    <option disabled>Még nincsenek nyomtatok...</option>
                                }
                                @else
                                <option selected disabled>Válasszont nyomtatót!</option>
                                    @foreach ($nyomtatok as $nyomtato)
                                    <option value="{{$nyomtato->id}}" >{{$nyomtato->gepszam}}</option>
                                    @endforeach
                                @endif
                            </select>
                    </div>
                </div>       
                <div class="form-group row">
                        <label for="bejelentesi_datum" class="col-sm-2 col-form-label ">Bejelentési dátum</label>
                        <div class="col-sm-10">
                            <input type="date" class="form-control" id="bejelentesi_datum" name="bejelentesi_datum" value="{{old('bejelentesi_datum')}}">
                            <small>{{$errors->first('bejelentesi_datum')}}</small>
                        </div>
                        </div>
                          <div class="form-group row">
                        <label for="fekete" class="col-sm-2 col-form-label">Fekete számláló</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="fekete" name="fekete" value="{{old('fekete') }}" >
                            <small>{{$errors->first('fekete')}}</small>
                        </div>
                        </div>
                        <div class="form-group row">
                            <label for="szines" class="col-sm-2 col-form-label ">Szines</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="szines" name="szines" value="{{old('szines')}}">
                                <small>{{$errors->first('szines')}}</small>
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
                $('#printer_id').select2();
             });
      </script>

@endsection