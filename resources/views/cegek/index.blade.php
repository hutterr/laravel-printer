@extends('layouts.app')

@section('nav')
    @include('inc.navbar', ['title' => 'Cégek listája', 'route' => 'cegek.index'])
@endsection
@section('content')
  @if($errors->any())
    <div class="alert alert-success col-lg-11 my-3 mx-auto" role="alert">
    {{$errors->first('uzenet')}}
    </div>
  @endif
  <div class="row mx-auto mt-3" style="width: 80%">
    <form class="col-lg-2 form-inline" action="{{ route('cegek.index') }}" method="get">
        <div class="form-group">
            <input class="form-control" name="cegnev" placeholder="Cégnév">
          <div class="col-lg-2">
            <input class="btn btn-primary" type="submit" value="Keresés">
          </div>
        </div>
      </form>
  </div>
<table class="table table-hover mx-auto mt-3" >
        <thead>
          <tr>
            <th class="text-center" scope="col">Cégnév</th>
            <th class="text-center" scope="col">Adószám</th>
            <th class="text-center" scope="col">Cím</th>
            <th class="text-center"scope="col">Telefon</th>
            <th class="text-center" scope="col">Kapcsolattartó</th>
            <th class="text-center" scope="col">Kapcs. telefon</th>
          
          </tr>
        </thead>
        <tbody>
          @if(count($cegek) == 0)
          <tr>
                  <th scope="row" colspan="7" class="text-center">Nincsenek még cégek!</th>             
          </tr>
          @else
              @foreach($cegek as $ceg)       
              <tr>
             
              <td class="align-middle text-center"><a class="button-list" href="\cegek\{{$ceg->id}}">{{$ceg->cegnev}}</a></td>
              <td class="align-middle text-center">{{$ceg->adoszam}}</td>
              <td class="align-middle text-center">{{$ceg->cim}}</td>
              <td class="align-middle text-center">{{$ceg->telefon}}</td>
              <td class="align-middle text-center">{{$ceg->kapcsolattarto}}</td>
              <td class="align-middle text-center">{{$ceg->kapcstel}}</td>
              </tr>
              @endforeach
          @endif
        </tbody>
      </table> 
      @if(count($cegek) > 0)
              <div class="paginate mx-auto mt-2" >
                  {{$cegek->links()}}            
              </div>
      @endif
     
      
@endsection