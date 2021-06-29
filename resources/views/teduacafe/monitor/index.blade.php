@extends('teduacafe.layouts.app')

@section('content')

<div class="container-fluid">
     <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Mesas</h1>
    </div>
    <?php 
                $cont = 0;
                $ct = 0;
                $cb = 0;
            ?>
    
 
            <div class="shadow mb-4 row">
                @foreach($mesas as $mesa)
                    

<div class="modal fade" id="exampleModal1-{{$mesa->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModal1Label" aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModal1Label">Pedidos {{$mesa->nombre}}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>

<div class="modal-body">
 
        
        <div>
            <table class="table table-sm w-100 table-bordered">
                <thead>
                    <tr>
                        <th>Cantidad</th>
                        <th>Nombre</th>
                        <th>Tiempo</th>
                        <th>Accion</th>
                    </tr>
                </thead>
                <?php
                    $vent = \App\Ventapendiente::where('idmesa', $mesa->id)->get();
                    $total = 0;
                ?>
                <tbody>
                    @foreach($vent as $v)
                    <tr>
                        <td>{{$v->cantidad}}</td>
                        <td>{{\App\Productocafe::find($v->idproducto)->nombre}}</td>
                        <td>{{\App\Productocafe::find($v->idproducto)->duracion * $v->cantidad}} min</td>
                        <td><a href="#" class="btn btn-sm btn-primary">Ticket</a></td>
                    </tr>
                    <?php
                        $total += $v->cantidad * \App\Productocafe::find($v->idproducto)->precio_salida; 
                    ?>
                    @endforeach
                </tbody>
                <?php
                    $configuracion = \App\Configuracioncafe::first();
                ?>


            </table>

        </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        
      </div>
    </div>
  </div>
</div>
                <div class="card-body col-md-1">
                    <div class="text-center text-white p-2" style="border: 1px solid; border-radius: 0.5em;background-color: #3c8dbc;">
                        <a type="button" data-toggle="modal" data-target="#exampleModal1-{{$mesa->id}}" >
                            <p class="mb-0">{{$mesa->nombre}}</p>
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
                             

                                </a>
                            </div>
                        </div>
                            
                         
                            <?php 
                                $ct = 0;
                            ?>
                    
                 
          
                @endforeach
            </div>
    
    
</div>

<script>
  //Cuando la página esté cargada completamente
  document.addEventListener("DOMContentLoaded", function(event) {
       setTimeout(refrescar, 30000)
    });
  function refrescar(){
    //Actualiza la página
    location.reload();
  }
</script>





@endsection