@extends('layouts.app');


@section('content')
    @if($cegekOsszes->count() == 0)
        <h1 class="text-center">Nincsenek cégek</h1>
    
    @endif
@endsection