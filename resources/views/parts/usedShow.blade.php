@extends('layouts.app')

@section('nav')
    @include('inc.navbar', ['title' => 'Felhasznált alkatrészek', 'route' => 'cegek.index'])
@endsection
@section('content')
  @if($errors->any())
    <div class="alert alert-success col-lg-11 my-3 mx-auto" role="alert">
    {{$errors->first('uzenet')}}
    </div>
  @endif
<table class="table table-hover mx-auto mt-3" >
        <thead>
          <tr>
            <th class="text-center" scope="col">Dátum</th>
            <th class="text-center" scope="col">DB</th>
            <th class="text-center" scope="col">EDP</th>
            <th class="text-center"scope="col">Megnevezés</th>
            <th class="text-center" scope="col">Egységár</th> 
            <th class="text-center" scope="col">Összes ár</th>
            
            
          
          </tr>
        </thead>
        <tbody>
          @if(count($felhasznalas) == 0)
          <tr>
                  <th scope="row" colspan="7" class="text-center">Nincsenek még nyomtatók!</th>             
          </tr>
          @else
              @foreach($felhasznalas as $felhasznalt)       
              <tr>             
                <td class="align-middle text-center">{{$felhasznalt->created_at->format('Y/m/d')}}</td>
                <td class="align-middle text-center">{{$felhasznalt->db}}</td>
                <td class="align-middle text-center">{{$felhasznalt->alkatresz->edp}}</td>
                <td class="align-middle text-center">{{$felhasznalt->alkatresz->megnevezes}}</td>
                <td class="align-middle text-center">{{number_format($felhasznalt->alkatresz->ar,0, ' ', ' ')}} Ft</td>
                <td class="align-middle text-center">{{number_format($felhasznalt->db * $felhasznalt->alkatresz->ar, 0, ' ', ' ')}} Ft</td>  
                          
              </tr>
              @endforeach
          @endif
        </tbody>
      </table> 
      @if(count($felhasznalas) > 0)
            <div class="paginate mx-auto mt-2" >
                {{$felhasznalas->links()}}            
            </div>
        @endif    
     
      
@endsection