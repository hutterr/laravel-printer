@extends('layouts.app')

@section('nav')
    @include('inc.navbar', ['title' => 'Létrehozás', 'route' => 'cegek.index'])
@endsection
@section('content')
<div class="col-lg-11 mx-auto mt-3">
    <div class="card">
        <div class="card-header">
            <div class="row">             

            </div>

        </div>
        <div class="card-body">
            <form class="col-lg-11 mx-auto" action="/nyomtatok" method="POST">         
                @include('printer.form', ['felirat' => 'Hozzáadás'])    
              
                    
                @csrf
            </form>  
            
      </div>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/js/select2.min.js"></script>
      <script type="text/javascript">
             $(document).ready(function(){
                $('#ceg').select2();
                
             });
      </script>

@endsection