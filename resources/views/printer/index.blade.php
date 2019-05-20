@extends('layouts.app')

@section('nav')
    @include('inc.navbar', ['title' => 'Nyomtatók listája', 'route' => 'cegek.index'])
@endsection
@section('content')
  @if($errors->any())
    <div class="alert alert-success col-lg-11 my-3 mx-auto" role="alert">
    {{$errors->first('uzenet')}}
    </div>
  @endif
  <div class="row mx-auto mt-3" style="width: 80%">
    <form class="col-lg-2 form-inline" action="{{ route('nyomtatok.index') }}" method="get">
        <div class="form-group">
            <input class="form-control" name="gepszam" placeholder="Gépszám vagy típus">
          <div class="col-lg-2">
            <input class="btn btn-primary" type="submit" value="Keresés">
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
            <th class="text-center"scope="col">Hely</th>
            <th class="text-center" scope="col">Cég</th>
            <th class="text-center" scope="col"></th>
            
          
          </tr>
        </thead>
        <tbody>
          @if(count($nyomtatok) == 0)
          <tr>
                  <th scope="row" colspan="7" class="text-center">Nincsenek még nyomtatók!</th>             
          </tr>
          @else
              @foreach($nyomtatok as $nyomtato)       
              <tr>             
                <td class="align-middle text-center"><a class="button-list" href="\nyomtatok\{{$nyomtato->id}}\edit">{{$nyomtato->gepszam}}</a></td>
                <td class="align-middle text-center">{{$nyomtato->marka}}</td>
                <td class="align-middle text-center">{{$nyomtato->geptipus}}</td>
                <td class="align-middle text-center">{{$nyomtato->hely}}</td>
                <td class="align-middle text-center">{{$nyomtato->ceg->cegnev}}</td>  
                <td class="align-middle text-center"><a class="button-list" href="\nyomtatok\{{$nyomtato->id}}">Részletek</a></td>            
              </tr>
              @endforeach
          @endif
        </tbody>
      </table> 
      @if(count($nyomtatok) > 0)
              <div class="paginate mx-auto mt-2" >
                  {{$nyomtatok->links()}}            
              </div>
      @endif
     
      
@endsection