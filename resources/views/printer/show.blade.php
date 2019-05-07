@extends('layouts.app')

@section('nav')
    @include('inc.navbar', ['title' => 'Részletek', 'route' => 'cegek.index'])
@endsection
@section('content')
<div class="col-lg-11 mx-auto mt-3">
    <div class="card">
        <div class="card-header">
            <div class="row">             

            </div>

        </div>
        <div class="card-body">
                <form class="col-lg-11" action="/nyomtatok/{{$printer->id}}" method="POST">
                    @method('patch')
                    @include('printer.form', ['felirat' => 'Módosítás'])
                    @csrf
                </form>       
      </div>
     

@endsection