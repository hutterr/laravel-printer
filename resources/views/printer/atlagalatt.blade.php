@extends('layouts.app')

@section('nav')
    @include('inc.navbar', ['title' => 'Átlag szerinti szűrés', 'route' => 'cegek.index'])
@endsection
@section('content')
  @if($errors->any())
    <div class="alert alert-success col-lg-11 my-3 mx-auto" role="alert">
    {{$errors->first('uzenet')}}
    </div>
  @endif
  <div class="row mx-auto mt-3" style="width: 80%">
    <form class="col-lg-2 form-inline" action="{{ route('nyomtatok.atlagalatt') }}" method="get">
        <div class="form-group">
            <input class="form-control" name="atlagF" placeholder="Fekete átlag pl: 1000">
            <input class="form-control ml-2" name="atlagSz" placeholder="Színes átlag pl: 300">
          <div class="col-lg-2">
            <input class="btn btn-primary" type="submit" value="Szűrés">
          </div>
        </div>
      </form>
  </div>
<table class="table table-hover mx-auto mt-3" >
        <thead>
          <tr>
            <th class="text-center" scope="col">Gépszam</th>
            <th class="text-center" scope="col">Márka</th>
            <th class="text-center" scope="col">Típus</th>
            <th class="text-center"scope="col">Fekete átlag</th>
            <th class="text-center" scope="col">Színes átlag</th>
            <th class="text-center" scope="col"></th>
          </tr>
        </thead>
        <tbody>
          @if(count($atlagok) == 0)
          <tr>
                  <th scope="row" colspan="7" class="text-center">Nincsenek ilyen átlag alatti nyomtatók!</th>             
          </tr>
          @else
              @foreach($atlagok as $atlag)       
              <tr>             
                <td class="align-middle text-center">{{$atlag['gepszam']}}</td>
                <td class="align-middle text-center">{{$atlag['marka']}}</td>
                <td class="align-middle text-center">{{$atlag['tipus']}}</td>
                <td class="align-middle text-center">{{$atlag['atlagF']}}</td>
                <td class="align-middle text-center">{{$atlag['atlagSz']}}</td>
                <td class="align-middle text-center"><a class="btn btn-primary" href="\nyomtatok\{{$atlag['id']}}">Megnyitás</a></td>     
              </tr>
              @endforeach
          @endif
        </tbody>
      </table> 
      <small class="ml-3">*Alapértelmezetten a havi 1000 fekete oldal alattikat listázza</small>
      
   {{--  <nav aria-label="Page navigation example">
        <ul class="pagination">
        <li class="page-item"><a class="page-link" href="atlagalatt?page={{$page-1 || 1}}">Előző</a></li>
        <li class="page-item"><a class="page-link" href="atlagalatt?page={{$page+1}}">Következő</a></li>
        </ul>
    </nav> --}}
     
      
@endsection