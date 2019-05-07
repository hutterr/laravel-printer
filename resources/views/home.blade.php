@extends('layouts.app')

@section('content')

   
        <div class="col-md-11 mt-4 mx-auto">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h1 class="text-center">Sikeres bejelentkezés!</h1>
                </div>
            </div>
        </div>
    

@endsection
