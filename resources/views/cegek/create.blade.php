@extends('layouts.app')

@section('nav')
    @include('inc.navbar', ['title' => 'Létrezhozás'])
@endsection
@section('content')
<div class="col-lg-11 mx-auto mt-3">
    <div class="card">
        <div class="card-header">
            <div class="row">
                

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