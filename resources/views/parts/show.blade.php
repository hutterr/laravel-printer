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
     

@endsection