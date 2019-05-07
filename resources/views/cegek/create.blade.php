@extends('layouts.app')

@section('nav')
    @include('inc.navbar', ['title' => 'Létrehozás'])
@endsection
@section('content')
<div class="col-lg-11 mx-auto mt-3">
    <div class="card">
        <div class="card-header">
            <div class="row">              

            </div>

        </div>
        <div class="card-body">
            <form class="col-lg-11" action="{{route('cegek.store')}}" method="POST">             
                @include('cegek.form' ,['felirat' => 'Hozzáadás'])
                @csrf
              </form>         
        
        </div>
      </div>
</div>

@endsection