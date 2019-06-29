@extends('layouts.app')

@section('nav')
    @include('inc.navbar', ['title' => 'Részletek', 'route' => 'cegek.index'])
@endsection
@section('content')
<div class="col-lg-11 mx-auto mt-3">
    <div class="card">
        <div class="card-header">
            <div class="row">
                <h5 class="text-left col-lg-6">{{$ceg->id}} - {{$ceg->cegnev}}</h5>
                <h5 class="text-right col-lg-6">Létrehozva: {{$ceg->created_at->format('Y.m.d')}} </h5>

            </div>

        </div>
        <div class="card-body">
            <form class="col-lg-11" action="/cegek/{{$ceg->id}}" method="POST">
                @method('patch')
                @include('cegek.form', ['felirat' => 'Módosítás'])
                @csrf
            </form>  
            <div class="row justify-content-end mr-4">
              @if($ceg->cegnev != 'Master Partner Kft.')
                <button type="button" class="btn btn-danger col-lg-2" data-toggle="modal" data-target="#megerosites" >
                    Törlés
                </button>
              @endif
            </div>       
        </div>
      </div>
      <div  id="megerosites" class="modal" role="dialog">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Biztos benne?</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                    <div class="row justify-content-center">
                        <div class="col-lg-6">
                            <form class="col-lg-12" action="/cegek/{{$ceg->id}}" method="POST">
                                @method('delete')
                                <button type="submit" class="btn btn-danger btn-block" >Igen</button>                           
                                @csrf
                            </form>    
                        </div>
                        <div class="col-lg-6">
                            <button type="button" data-dismiss="modal" class="btn btn-primary btn-block">Mégse</button>
                        </div>                   
                    </div>
                </div>
              </div>
            </div>
          </div>
</div>
@php 
    $nyomtatok = $ceg->printer()->paginate(10);

@endphp
<h1 class="text-center my-3 mx-auto py-2 bg-secondary col-lg-11 text-white">A cég nyomtatói</h1>
<table class="table table-hover mx-auto mt-3" >
    <thead>
      <tr>
        <th class="text-center" scope="col">Gépszam</th>
        <th class="text-center" scope="col">Márka</th>
        <th class="text-center" scope="col">Típus</th>
       
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
<script>
  
</script>

@endsection