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
                @include('cegek.form')
                @csrf
              </form>         
        
        </div>
      </div>
</div>

@endsection