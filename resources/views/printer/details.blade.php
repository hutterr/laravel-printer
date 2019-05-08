@extends('layouts.app')

@section('nav')
    @include('inc.navbar', ['title' => 'Részletek', 'route' => 'cegek.index'])
@endsection
@section('content')
<div class="col-lg-12 mx-auto mt-3">
    <div class="row">
            <div class="col-lg-6 mb-2">
                    <div class="card">
                            <div class="card-header">
                                <h5 class="text-center">Fekete számláló</h5>
                                <h5 class="text-center">Havi átlag {{$atlagFekete}} oldal</h5>
                            </div>
                            <div class="card-body">
                                <div>
                                    {!! $feketeChart->container() !!}
                                </div>
                        </div>
                        </div>
            </div>
            <div class="col-lg-6">
                    <div class="card">
                            <div class="card-header">
                                    <h5 class="text-center">Színes számláló</h5>
                                    <h5 class="text-center">Havi átlag {{$atlagSzines}} oldal</h5>
                            </div>
                            <div class="card-body">
                                <div>
                                    {!! $szinesChart->container() !!}
                                </div>
                        </div>
                        </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3 mb-2">
                    <div class="card" style="min-height: 450px">
                    <div class="card-header">
                            <h5 class="text-center">Adatok</h5>
                    </div>
                    <div class="card-body">
                            <div class="form-group row">
                                    <label for="gepszam" class="col-sm-4 col-form-label ">Gépszám</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="gepszam" name="gepszam" value="{{$printer->gepszam}}" @isset($printer->gepszam) readonly @endisset>
                                        <small>{{$errors->first('gepszam')}}</small>
                                    </div>
                                    </div>
                                      <div class="form-group row">
                                    <label for="gyszam" class="col-sm-4 col-form-label ">Gyári szám</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="gyszam" name="gyszam" value="{{$printer->gyszam }}" @isset($printer->gyszam) readonly @endisset>
                                        <small>{{$errors->first('gyszam')}}</small>
                                    </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="marka" class="col-sm-4 col-form-label ">Márka</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" id="marka" name="marka" value="{{$printer->marka}}" readonly>
                                            <small>{{$errors->first('marka')}}</small>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                            <label for="geptipus" class="col-sm-4 col-form-label ">Géptípus</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" id="geptipus" name="geptipus" value="{{$printer->geptipus}}" readonly>
                                                <small>{{$errors->first('geptipus')}}</small>
                                            </div>
                                    </div>
                                    <div class="form-group row">
                                            <label for="ceg" class="col-sm-4 col-form-label ">Cég</label>
                                            <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="geptipus" name="geptipus" value="{{$printer->ceg()->first()->cegnev}}" readonly>
                                            </div>
                                    </div>
                                    <div class="form-group row">
                                            <label for="ceg" class="col-sm-4 col-form-label ">Kapcsolattartó</label>
                                            <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="kapcsolattarto" name="kapcsolattarto" value="{{$printer->ceg()->first()->kapcsolattarto}}" readonly>
                                            </div>
                                    </div>
                                    <div class="form-group row">
                                            <label for="ceg" class="col-sm-4 col-form-label ">Kapcs. telefon</label>
                                            <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="kapcstel" name="kapcstel" value="{{$printer->ceg()->first()->kapcstel}}" readonly>
                                            </div>
                                    </div>
                                    <div class="form-group row">
                                            <label for="hely" class="col-sm-4 col-form-label ">Jelengi hely</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" id="hely" name="hely" value="{{$printer->hely}}" readonly>
                                                <small>{{$errors->first('hely')}}</small>
                                            </div>
                                    </div>

                                    <div class="form-group row">
                                            <label for="telefon" class="col-sm-4 col-form-label ">Hely telefon</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" id="telefon" name="telefon" value="{{$printer->telefon}}" readonly>
                                                <small>{{$errors->first('telefon')}}</small>
                                            </div>
                                    </div>
                                    <div class="row justify-content-center">
                                        <a class="btn btn-primary" href="\nyomtatok\{{$printer->id}}\edit">Részletek</a>

                                    </div>
                </div>
            </div>
            </div>
            <div class="col-lg-3 mb-2">
                <div class="card" style="min-height: 450px">
                <div class="card-header">
                        <h5 class="text-center">Számláló táblázat</h5>
                </div>
                <div class="card-body">
                <table class="table table-hover mx-auto mt-3" >
                        <thead>
                            <tr>
                            <th class="text-center" scope="col">Dátum</th>
                            <th class="text-center" scope="col">Fekete</th>
                            <th class="text-center" scope="col">Színes</th>
                            
                            
                            </tr>
                        </thead>
                        <tbody>
                            @if(count($szamlalok) == 0)
                            <tr>
                                    <th scope="row" colspan="3" class="text-center">Nincsenek számlálók!</th>             
                            </tr>
                            @else
                                @foreach($szamlalok as $szamlalo)       
                                <tr>             
                                <td class="align-middle text-center">{{$szamlalo->created_at->format('Y/m/d')}}</td>
                                <td class="align-middle text-center">{{$szamlalo->fekete}}</td>
                                <td class="align-middle text-center">{{$szamlalo->szines}}</td>
                                
                                </tr>
                                @endforeach
                            @endif
                        </tbody>
                        </table> 
                        @if(count($szamlalok) > 0)
                        <div class="paginate mx-auto mt-2" >
                            {{$szamlalok->links()}}            
                        </div>
                    @endif    
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card" style="min-height: 450px">
                    <div class="card-header">
                            <h5 class="text-center">Javítások táblázat</h5>
                    </div>
                    <div class="card-body">
                            <table class="table table-hover mx-auto mt-3" >
                                    <thead>
                                        <tr>
                                        <th class="text-center" scope="col">Dátum</th>
                                        <th class="text-center" scope="col">Fekete</th>
                                        <th class="text-center" scope="col">Színes</th>
                                        <th class="text-center" scope="col">Technikus</th>
                                        <th class="text-center" scope="col"></th>
                                        
                                        
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if(count($javitasok) == 0)
                                        <tr>
                                                <th scope="row" colspan="5" class="text-center">Nincsenek javítások!</th>             
                                        </tr>
                                        @else
                                            @foreach($javitasok as $javitas)       
                                            <tr>             
                                                <td class="align-middle text-center">{{$javitas->created_at->format('Y/m/d')}}</td>
                                                <td class="align-middle text-center">{{$javitas->fekete}}</td>
                                                <td class="align-middle text-center">{{$javitas->szines}}</td>
                                                <td class="align-middle text-center">{{$javitas->technikus}}</td>      
                                                <td class="align-middle text-center"><a href="/javitasok/{{$javitas->id}}"></a>Részletek</td>                                           
                                            </tr>
                                            @endforeach
                                        @endif
                                    </tbody>
                                    </table> 
                                    @if(count($javitasok) > 0)
                                    <div class="paginate mx-auto mt-2" >
                                        {{$javitasok->links()}}            
                                    </div>
                                @endif    
                    </div>
                </div>
        </div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>

{!! $feketeChart->script() !!}
{!! $szinesChart->script() !!}


@endsection