@extends('layouts.app')

@section('nav')
    @include('inc.navbar', ['title' => ''])
@endsection
@section('content')
<div class="col-lg-11 mx-auto mt-3">
        @if($errors->any())
        <div class="alert alert-success col-lg-11 my-3 mx-auto" role="alert">
        {{$errors->first('uzenet')}}
        </div>
      @endif
</div>
<div class="row mx-auto" style="width: 80%">
  <form class="col-lg-2 form-inline" action="{{ route('alkatresz.index') }}" method="get">
      <div class="form-group">
          <input class="form-control" name="edp" placeholder="EDP kód">
        <div class="col-lg-2">
          <input class="btn btn-primary" type="submit" value="Keresés">
        </div>
      </div>
    </form>
    <form class="col-lg-2 form-inline ml-auto" action="{{ route('alkatresz.index') }}" method="get">
      <div class="form-group">
          <input class="form-control" name="megnevezes" placeholder="Megnevezés">
        <div class="col-lg-2">
          <input class="btn btn-primary" type="submit" value="Keresés">
        </div>
      </div>
    </form>
<table class="table table-hover mx-auto mt-3" >
        <thead>
          <tr>
            <th class="text-center" scope="col">EDP kód</th>
            <th class="text-center" scope="col">Megnevezés</th>
            <th class="text-center" scope="col">Ár</th>           
            <th class="text-center" scope="col"></th>
            
          
          </tr>
        </thead>
        <tbody>
          @if(count($alkatreszek) == 0)
          <tr>
                  <th scope="row" colspan="7" class="text-center">Nincsen alkatrész!</th>             
          </tr>
          @else
              @foreach($alkatreszek as $alkatresz)       
              <tr>             
              <td class="align-middle text-center">{{$alkatresz->edp}}</td>
              <td class="align-middle text-center">{{$alkatresz->megnevezes}}</td>
              <td class="align-middle text-center">{{$alkatresz->ar}}</td>
              <td class="align-middle text-center"><a class="btn btn-primary" href="/alkatresz/{{$alkatresz->id}}/edit">Módosítás</a></td>
                 
              </tr>
              @endforeach
          @endif
        </tbody>
      </table> 
      @if(count($alkatreszek) > 0)
              <div class="paginate mx-auto mt-2" >
                  {{$alkatreszek->links()}}            
              </div>
      @endif
     
      
@endsection