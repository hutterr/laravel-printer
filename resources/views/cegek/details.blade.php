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
                <button type="button" class="btn btn-danger col-lg-2" data-toggle="modal" data-target="#megerosites">
                    Törlés
                </button>
            </div>       
        </div>
      </div>
      <div  id="megerosites" class="modal" tabindex="-1" role="dialog">
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
<script>
    $('#myModal').on('shown.bs.modal', function () {
  $('#myInput').trigger('focus')
})
</script>

@endsection