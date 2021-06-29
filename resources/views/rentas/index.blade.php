@extends('layouts.app2')

@section('content')
    <div class="container">
        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0 d-flex justify-content-center">
                <!-- Nested Row within Card Body -->         
                   <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Nueva Renta</h1>
                            </div>
                            @if ( session()->has('message') )
                                <div class="alert alert-danger alert-dismissable">{{ session()->get('message') }}</div>
                            @endif
                            <form class="user" method="POST" action="{{route('rentas.store')}}">
                                <input type="" name="idprecio_noche" class="collapse" value="{{$tipohabitacion->id}}">
                                <input type="" name="idprecio_mes" class="collapse" value="{{$tipohabitacion->id}}">
                                {{ csrf_field() }}
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <label class="col-sm-8">Nombre</label>
                                        <select class="form-control" name="idcliente">
                                            @foreach($clientes as $cliente)
                                            <option value="{{$cliente->id}}">{{$cliente->nombre}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-sm-6">
                                         <label class="col-sm-8">Tipo de Habitacion</label>
                                        <input type="text" class="form-control " id="telefono" value="{{$tipohabitacion->titulo}}" 
                                             style="border-radius: 10rem;
                                            " readonly="">
                                        <input type="" name="idtipohabitacion" value="{{$tipohabitacion->id}}" class="collapse">
                                    </div>
                                    
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6">
                                        <label class="col-sm-8">Fecha Inicio</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                              <span class="input-group-text" id="inputGroupPrepend2" >
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar" viewBox="0 0 16 16">
                                          <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z"/>
                                        </svg></span>
                                            </div>
                                             <input type="text" class="form-control datetime"  name="fecha_inicio" id="fecha_inicio1" readonly="" style="    border-radius: 0rem 10rem 10rem 0rem;background-color: white !important" value="{{\Carbon\Carbon::now()->format('m/d/Y')}}" onchange="noches();">
                                             <input class="collapse" id="fecha_inicio" value="{{\Carbon\Carbon::now()->format('Y-m-d')}}">
                                          </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <label class="col-sm-8">Fecha Fin</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                              <span class="input-group-text" id="inputGroupPrepend2" >
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar" viewBox="0 0 16 16">
                                          <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z"/>
                                        </svg></span>
                                            </div>
                                             <input type="text" class="form-control datetime"  name="fecha_fin" id="fecha_fin1" readonly="" style="    border-radius: 0rem 10rem 10rem 0rem;background-color: white !important" value="{{\Carbon\Carbon::now()->addDay()->format('m/d/Y')}}" onchange="noches();">
                                              <input class="collapse" id="fecha_fin" value="{{\Carbon\Carbon::now()->addDay()->format('Y-m-d')}}">
                                          </div>
                                        
                                       
                                    </div>
                                </div>
                                <div class="form-group row">

                                        <div class="col-sm-12">
                                        <label class="col-sm-8">Habitacion</label>
                                        <input type="text" class="form-control " id="email" name="email" 
                                             style="border-radius: 10rem;
                                                " value="{{$habitacion->codigo}}" readonly="">
                                        <input type="" name="idhabitacion" value="{{$habitacion->id}}" class="collapse">        
                                    </div>
                                </div>
                                <div class="form-group row">

                                        <div class="col-sm-4">
                                        <label class="col-sm-8">Noches</label>
                                        <input type="text" class="form-control " id="noche" name="direccion" 
                                             style="border-radius: 10rem;
                                                ">
                                            
                                    </div>
                                    <div class="col-sm-4">
                                        <label class="col-sm-8">Costo</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                              <span class="input-group-text" id="inputGroupPrepend2" >
                                                $</span>
                                            </div>
                                             <input name="costo" type="text" class="form-control" id="costo" readonly="" style="    border-radius: 0rem 10rem 10rem 0rem;background-color: white !important" >
                                          </div>
                                        
                                          
                                    </div>
                                </div>
                                 
                                <button type="submit" class="btn btn-primary btn-user btn-block">
                                    Registrar
                                </button>
                                <hr>
                            </form>
                            <hr>
                        </div>
                    </div>   
            </div>
        </div>

    </div>
    
    <input type="" id="precio_noche" class="collapse" value="{{$tipohabitacion->precio_noche}}">
    <input type="" id="precio_mes" class="collapse" value="{{$tipohabitacion->precio_mes}}">
    
<script type="text/javascript">


function noches() {
    
    function daydiff(first, second) { 
        return (second-first)/(1000*60*60*24); 
    } 
    var inicio = document.getElementById('fecha_inicio1').value;
    var fin = document.getElementById('fecha_fin1').value;
    var dias = daydiff(Date.parse(inicio), Date.parse(fin));
    document.getElementById('noche').value = dias;
    if(dias == 30 || dias == 60 || dias == 90 || dias == 120 || dias == 150 || dias == 180)
    {
        document.getElementById('costo').value = document.getElementById('precio_mes').value;
    }else if(dias < 30)
    {
        document.getElementById('costo').value = document.getElementById('precio_noche').value * dias;
    }else if(dias > 30 && dias < 60 || dias > 30 && dias < 60 || dias > 90 && dias < 120 || dias > 120 && dias < 150 || dias > 150 && dias < 180)
    {
        dias = dias - 30;
        document.getElementById('costo').value = Number(document.getElementById('precio_mes').value) + Number(dias*document.getElementById('precio_noche').value);
    }
    console.log(document.getElementById('fecha_inicio1').value);
    
    
}

</script>

@endsection