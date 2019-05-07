@extends('layouts.app')

@section('content')

    <div class="row justify-content-center mt-4">
        <div class="col-md-11">
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
    </div>

@endsection
