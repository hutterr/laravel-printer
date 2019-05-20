@extends('layouts.app')

@section('nav')
    @include('inc.navbar', ['title' => 'Javítás részletek'])
@endsection
@section('content')
<div class="col-lg-11 mx-auto mt-3">
        @if($errors->any())
        <div class="alert alert-success col-lg-11 my-3 mx-auto" role="alert">
        {{$errors->first('uzenet')}}
        </div>
      @endif
</div>
 <div class="col-lg-11 mx-auto mt-3">
    <div class="card">
        <div class="card-header">
            <div class="row">             

            </div>

        </div>
        <div class="card-body">
            <div class="form-group row">
                <label for="datum" class="col-sm-2 col-form-label ">Gép adatok</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="datum" name="datum" value="{{ $javitas->nyomtato()->first()->gepszam}} - {{ $javitas->nyomtato()->first()->marka}} {{ $javitas->nyomtato()->first()->geptipus}}">
                    <small>{{$errors->first('datum')}}</small>
                </div>
                </div>           
            
                <div class="form-group row">
                        <label for="datum" class="col-sm-2 col-form-label ">Dátum</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="datum" name="datum" value="{{ $javitas->datum}}">
                            <small>{{$errors->first('datum')}}</small>
                        </div>
                        </div>
                          <div class="form-group row">
                        <label for="fekete" class="col-sm-2 col-form-label">Fekete számláló</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="fekete" name="fekete" value="{{$javitas->fekete}}" >
                            <small>{{$errors->first('fekete')}}</small>
                        </div>
                        </div>
                        <div class="form-group row">
                            <label for="szines" class="col-sm-2 col-form-label ">Szines</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="szines" name="szines" value="{{$javitas->szines}}">
                                <small>{{$errors->first('szines')}}</small>
                            </div>
                        </div>
                        <div class="form-group row">
                                <label for="megjegyzes" class="col-sm-2 col-form-label ">Megjegyzés</label>
                                <div class="col-sm-10">
                                    <textarea type="text" class="form-control" rows="5" id="megjegyzes" name="megjegyzes" >{{$javitas->megjegyzes}}</textarea>
                                    <small>{{$errors->first('megjegyzes')}}</small>
                                </div>
                            </div>
                            <div class="form-group row">
                                    <label for="technikus" class="col-sm-2 col-form-label ">Technikus</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="technikus" name="technikus" value="{{$javitas->technikus}}" readonly>
                                        <small>{{$errors->first('technikus')}}</small>
                                    </div>
                                </div>
                            

            
      </div>
     
@endsection