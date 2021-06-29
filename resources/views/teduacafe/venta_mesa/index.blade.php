@extends('teduacafe.layouts.app')

@section('content')

<div class="container-fluid">     
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Mesas</h1>
        
    </div>
                    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <?php 
                $cont = 0;
                $ct = 0;
                $cb = 0;
            ?>
          @foreach($secciones as $seccion)
            
          <li class="nav-item" role="presentation">
            @if($cont == 0)
            <button class="nav-link active" id="{{$seccion->nombre}}-tab" data-bs-toggle="tab" data-bs-target="#{{$seccion->nombre}}" type="button" role="tab" aria-controls="{{$seccion->nombre}}" aria-selected="true">{{$seccion->nombre}}</button>
            <?php 
                    $cont = 1;
                ?>


            @else 

            <button class="nav-link " id="{{$seccion->nombre}}-tab" data-bs-toggle="tab" data-bs-target="#{{$seccion->nombre}}" type="button" role="tab" aria-controls="{{$seccion->nombre}}" aria-selected="true">{{$seccion->nombre}}</button>
            @endif
          </li>
          @endforeach
        </ul>
        <div class="tab-content" id="myTabContent">
            <?php 
                $cont2 = 0;
            ?>
            @foreach($secciones as $seccion)
                @if($cont2 == 0)
                <div class="tab-pane fade show active" id="{{$seccion->nombre}}" role="tabpanel" aria-labelledby="{{$seccion->nombre}}-tab" style="min-height: 500px;">
                    <div class="row">
                    @foreach($mesas as $mesa)
                        @if($seccion->id == $mesa->idseccion)
                        
                        <div class="card-body col-md-2">
                            <div class="text-center text-white p-2">
                                <a href="{{ route('ventapendiente.mesa', $mesa->id) }}" class="text-dark">
                                    <?php 
                                        $pendientes = \App\Ventapendiente::where('idmesa', $mesa->id)->get();
                                    ?>
                               @foreach($pendientes as $pendiente)
                                    <?php 
                                        if($pendiente){
                                            if($pendiente->pendiente == '0')
                                            {
                                          
                                                $ct = 0;
                                            }else{
                                              
                                                $ct = 1;
                                            }
                                        }else{
                                           
                                            $ct = 0;
                                        }   
                                    ?>
                               @endforeach
                               @if($ct == 1)     
                               <img src="{{ asset('/storage/app/busy.png') }}" style="max-width: 100%;">

                                
                             
                                @else
                                 <img src="{{ asset('/storage/app/not-busy.png') }}" style="max-width: 100%;">
                                
                                 
                                
                                 @endif
                             
                                 
                                {{$mesa->nombre}}

                                </a>
                            </div>
                        </div>
                            
                            @endif
                            <?php 
                                $ct = 0;
                            ?>
                    @endforeach
                    </div>
                </div>

                <?php 
                    $cont2 = 1;
                ?>
                @else
                
                <div class="tab-pane fade" id="{{$seccion->nombre}}" role="tabpanel" aria-labelledby="{{$seccion->nombre}}-tab" style="min-height: 500px;">
                    <div class="row">
                    @foreach($mesas as $mesa)
                        @if($seccion->id == $mesa->idseccion)
                        
                        <div class="card-body col-md-2">
                            <div class="text-center text-white p-2">
                                <a href="{{ route('ventapendiente.mesa', $mesa->id) }}" class="text-dark">

                              <?php 
                                        $pendientes = \App\Ventapendiente::where('idmesa', $mesa->id)->get();
                                    ?>
                               @foreach($pendientes as $pendiente)
                                    <?php 
                                        if($pendiente){
                                            if($pendiente->pendiente == '0')
                                            {
                                          
                                                $ct = 0;
                                            }else{
                                              
                                                $ct = 1;
                                            }
                                        }else{
                                           
                                            $ct = 0;
                                        }   
                                    ?>
                               @endforeach
                               @if($ct == 1)     
                               <img src="{{ asset('/storage/app/busy.png') }}" style="max-width: 100%;">

                                
                             
                                @else
                                 <img src="{{ asset('/storage/app/not-busy.png') }}" style="max-width: 100%;">
                                
                                 
                                
                                 @endif
                                {{$mesa->nombre}}

                                </a>
                            </div>
                        </div>
                        
                        @endif
                      @endforeach
                      </div>
                </div>
                @endif
                 @endforeach
       

        </div>
      
    </div>
</div>                
@endsection