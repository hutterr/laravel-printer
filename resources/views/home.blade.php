@extends('layouts.app')

@section('content')

   
        <div class="col-md-11 mt-4 mx-auto">
            <div class="card">
                <div class="card-header">
                  <h3>
                    Dashboard
                  </h3>                  
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-7 border py-3">                        
                            <div>
                              <h3>
                                Nyomtatók száma
                              </h3>
                              </div>                    
                            <div class="col-lg-12 mt-5 mx-auto">
                              
                              @if (is_null($gepszam))                              
                                {!! $chart->container() !!}
                              @else
                                  <h3>Nincsenek nyomtatók a rendszerben!</h3>
                              @endif
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
                                          <tr>                                        
                                              <td>Partnerek száma</td>
                                              <td>{{$partnerek}} db</td>
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
