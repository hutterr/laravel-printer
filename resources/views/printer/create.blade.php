@extends('layouts.app')

@section('nav')
    @include('inc.navbar', ['title' => 'Létrehozás', 'route' => 'cegek.index'])
@endsection
@section('content')
<div class="col-lg-11 mx-auto mt-3">
    <div class="card">
        <div class="card-header">
            <div class="row">             

            </div>

        </div>
        <div class="card-body">
            <form class="col-lg-11 mx-auto" action="" method="POST">         
                <div class="form-group row">
                    <label for="gepszam" class="col-sm-2 col-form-label ">Gépszám</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="gepszam" name="gepszam" value="{{old('gepszam')}}">
                        <small>{{$errors->first('gepszam')}}</small>
                    </div>
                    </div>
                      <div class="form-group row">
                    <label for="gyszam" class="col-sm-2 col-form-label ">Gyári szám</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="gyszam" name="gyszam" value="{{old('gyszam')}}">
                        <small>{{$errors->first('gyszam')}}</small>
                    </div>
                    </div>
                    <div class="form-group row">
                        <label for="marka" class="col-sm-2 col-form-label ">Gépszám</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="marka" name="marka" value="{{old('marka')}}">
                            <small>{{$errors->first('marka')}}</small>
                        </div>
                    </div>
                    <div class="form-group row">
                            <label for="geptipus" class="col-sm-2 col-form-label ">Géptípus</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="geptipus" name="geptipus" value="{{old('geptipus')}}">
                                <small>{{$errors->first('geptipus')}}</small>
                            </div>
                    </div>
                    <div class="form-group row">
                            <label for="ceg" class="col-sm-2 col-form-label ">Cég</label>
                            <div class="col-sm-10">
                                    <select class="form-control" id="ceg" name="ceg">
                                        @if($cegek->count() == 0){
                                            <option disabled>Még nincsenek cégek...</option>
                                        }
                                        @else
                                            @foreach ($cegek as $ceg)
                                            <option value="{{$ceg->id}}">{{$ceg->cegnev}}</option>
                                            @endforeach
                                        @endif
                                    </select>
                            </div>
                    </div>
                    <div class="form-group row">
                            <label for="hely" class="col-sm-2 col-form-label ">Jelengi hely</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="hely" name="hely" value="{{old('hely')}}">
                                <small>{{$errors->first('hely')}}</small>
                            </div>
                    </div>
                    <div class="form-group row">
                            <label for="elozohely" class="col-sm-2 col-form-label ">Előző helye</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="elozohely" name="elozohely" value="{{old('elozohely')}}">
                                <small>{{$errors->first('elozohely')}}</small>
                            </div>
                    </div>
                    <div class="form-group row">
                            <label for="telefon" class="col-sm-2 col-form-label ">Telefon</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="telefon" name="telefon" value="{{old('telefon')}}">
                                <small>{{$errors->first('telefon')}}</small>
                            </div>
                    </div>
                    <div class="form-group row ">
                            <div class="col-sm-2">Opciók</div>
                            <div class="col-sm-5">
                            <div class="form-check">
                                <input class="form-check-input " type="checkbox" value="" id="defaultCheck1">
                                <label class="form-check-label " for="defaultCheck1">
                                    DF
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                                <label class="form-check-label" for="defaultCheck1">
                                    Duplex
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                                <label class="form-check-label" for="defaultCheck1">
                                    Gépasztal
                                </label>
                            </div>
                            <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                                    <label class="form-check-label" for="defaultCheck1">
                                        Egy tálca
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                                    <label class="form-check-label" for="defaultCheck1">
                                        Két tálca
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                                    <label class="form-check-label" for="defaultCheck1">
                                        LCT
                                    </label>
                                </div>
                            </div>
                            <div class="col-sm-5">
                                    <div class="form-check">
                                        <input class="form-check-input " type="checkbox" value="" id="defaultCheck1">
                                        <label class="form-check-label " for="defaultCheck1">
                                            Szorter
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                                        <label class="form-check-label" for="defaultCheck1">
                                            Nyomtato
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                                        <label class="form-check-label" for="defaultCheck1">
                                            Halo
                                        </label>
                                    </div>
                                    <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                                            <label class="form-check-label" for="defaultCheck1">
                                                Scan
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                                            <label class="form-check-label" for="defaultCheck1">
                                               Fax
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                                            <label class="form-check-label" for="defaultCheck1">
                                                HDD
                                            </label>
                                        </div>
                                    </div>
                        </div>
                        <div class="form-group row">
                                <label for="beszer_ar" class="col-sm-2 col-form-label ">Beszerzési ár</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="beszer_ar" name="beszer_ar" value="{{old('beszer_ar')}}">
                                    <small>{{$errors->first('beszer_ar')}}</small>
                                </div>
                        </div>
                    </div>
                    
                    
                    
                    <div class="row justify-content-center my-3">
                        <button type="submit" class="btn btn-primary col-lg-2">Hozzáadás</button>                    
                    </div>
                @csrf
            </form>  
            
      </div>
     

@endsection