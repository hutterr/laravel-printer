@extends('layouts.app')

@section('content')

   
        <div class="col-md-11 mt-4 mx-auto">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-7 border py-3">                        
                            <h3 class="col-lg-4 mx-auto">Nyomtatók száma</h3>                    
                            <div class="col-lg-12 mt-5">
                                {!! $chart->container() !!}
                            </div>
                        </div>
                        <div class="col-lg-5">
                                <table class="table table-striped">
                                        <thead>
                                          <tr>
                                            <th colspan="2">Egyéb érdekességek</th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                          <tr>                                        
                                            <td>Összes javítás</td>
                                            <td>{{$javitasok}} db</td>
                                          </tr>
                                          <tr>                                        
                                                <td>Rendszerben lévő alkatrészek száma</td>
                                                <td>{{$alkatresz}} db</td>
                                              </tr>
                                          
                                        </tbody>
                                      </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>

        {!! $chart->script() !!}
        
@endsection
