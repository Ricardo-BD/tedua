@extends('teduacafe.layouts.app')

@section('content')
<div class="container-fluid row justify-content-around">     
    
    
                    <!-- DataTales Example -->
    <div class="card shadow mb-4 w-50">
        <div class="d-sm-flex align-items-center justify-content-between text-center">
            <h1 class="h3 mb-0 text-gray-800 w-100 mt-2">Productos</h1>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Codigo</th>
                            <th>Nombre</th>
                            <th>Precio unitario</th>
                            <th class="col-sm-4">Cantidad</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    
                    @foreach($productos as $producto)
                    @if($producto)

                        <tbody>
                            <tr>
                                <td id="codigo" name="codigo">{{ $producto->codigo }}</td>
                                <td id="codigo" name="codigo">{{ $producto->nombre }}</td>
                                <td id="" >{{\App\Configuracioncafe::first()->simbolo}} {{ $producto->precio_salida }}</td>
                                <td style="width:20px"><input type="" name="cantidad" id="cantidad" style="width:100%" class="form-control"></td>
                                <input type="" name="" id="unidad" value="{{ $producto->precio_salida }}" class="collapse">
                             
                                <td class="d-flex">
                                    <a type="button" id="agg" class="btn btn-primary" onclick="add(this)"
                                    pago="Pagado"
                                    entrega="Entregado"
                                    idproducto="{{ $producto->id }}"
                                    nombre="{{ $producto->nombre }}"
                                    codigo="{{ $producto->codigo }}"
                                    precio="{{ $producto->precio_salida }}"
                                    >Añadir</a>     
                                </td>
                            </tr>
                        </tbody>
                    @endif    
                    @endforeach          
                </table>
            </div>
        </div>
    </div>
    <form action="{{route('ventadelivery.store')}}" method="POST" class="w-50">
        {{ csrf_field() }}
    <div class="card shadow mb-4" style="min-width:500px;min-height: 500px;">
        <div class="d-sm-flex align-items-center justify-content-between text-center">
            <h1 class="h3 mb-0 text-gray-800 w-100 mt-2">Factura</h1>
        </div>
        
         @if ( session()->has('message') )
         <div class="p-4" id="mensaje">
            
            <div class="alert @if(session()->get('message') == 'Venta creada exitosamente') alert-success @else alert-danger @endif alert-dismissable">{{ session()->get('message') }}</div>
            </div>
        @endif

        <div class="p-4 pb-2">
            <label>Servicios Delivery</label>
            <select class="custom-select" name="idmesero" id="idservicio">
                    @foreach($servicios as $servicio)

                    @if($servicio)
                    
                    <option value="{{$servicio->id}}">{{$servicio->nombre}}</option>
                    @endif
                    @endforeach
                </select>
        </div>
        <div class="pl-4 pr-4 row justify-content-around">
            <div class="col-sm-6">
                <label>Mesero</label>
                <select class="custom-select" name="idmesero" id="idmesero">
                    @foreach($meseros as $mesero)

                    @if($mesero)
                    
                    <option value="{{$mesero->id}}">{{$mesero->name}}</option>
                    @endif
                    @endforeach
                </select>
            </div>
            <div class="col-sm-6">
                <label>Tipo de venta</label>
                <select class="custom-select" name="idtipoventa" id="idtipoventa">
                    @foreach($tipoventas as $tipoventa)
                    @if($tipoventa)
                    @if($tipoventa->id == 3)
                    <option value="{{$tipoventa->id}}">{{$tipoventa->nombre}}</option>
                    @endif
                    @endif
                    @endforeach
                </select>
            </div>
        </div>
        <div class="card-body" id="cabezera">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable1" width="100%" cellspacing="0">
                    <thead>
                        <tr >
                            <th>Nombre</th>
                            <th>Precio unitario</th>
                            <th>Cantidad</th>
                            <th>Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>
                        <td>Subtotal</td>
                        <td></td>
                        <td></td>
                        <td><input id="subtotall" readonly style="width: 50px;border: none;"></input></td>
                        
                    </tbody>  
                    <?php
                        $iva = \App\Configuracion::all()->first();
                    ?>
                    <tbody>
                        <td>{{$iva->nombre_impuesto}} (%)</td>
                        <td></td>
                        <td></td>
                        <td><input id="ivaa" readonly style="width: 50px;border: none;"></input></td>
                        
                    </tbody>  
                    <tbody>
                        <td>Total</td>
                        <td></td>
                        <td></td>
                        <td><input id="total" readonly name="total" style="width: 50px;border: none;" onchange="datos()"></input></td>
                        
                    </tbody>    
                </table>
            </div>
        </div>
        
        <input class="collapse" value="{{$iva->valor_impuesto/100}}" id="iva">
        <div id="TT">
            
        </div>
        <?php

            $date = \Carbon\Carbon::now();
         
        ?>
        <input  id="fecha" class="collapse" value="{{$date}}">
        <div class="p-4" style="text-align: end;" id="enviar">
            <?php
                        $ventas = \App\Ventapendiente::all();
                        $venta = $ventas->last();
                    ?>
                <input  class="collapse" id="idventa" @if($venta)value="{{$venta->idventa + 1}}" @else value="1" @endif> 
         <button type="submit"  onclick="add()" class="btn btn-success">Enviar</button>
        </div>
    </div>
   
    </form>
</div>
<script type="text/javascript" src="http://code.jquery.com/jquery-1.10.0.min.js"></script>
<script>
    function datos(){
        var total = $('#total').val();
        var iva = $('#iva').val() * total;
       
 
        $('#ivaa').val(iva);
        var subtotal = $('#subtotall').val(total - iva);
        if(subtotal.val() < 0){
            document.getElementById('subtotall').value = 0;
        }
   
    
    }
    function remove(e){
        e.parentElement.parentElement.remove();

        totall();
        datos();
    }

    $(document).ready(function() {
        $('#cabezera').hide();
        $('#enviar').hide();
        if($('#mensaje').show())
        {
            setTimeout(function(){ 
                $('#mensaje').toggle(); 
            }, 2000);
            
        }
    });

    
  function precio()
  {
    document.getElementById('total').value =  document.getElementById('unidad').value * document.getElementById('cantidad').value;
     document.getElementById('iva').value =  document.getElementById('total').value * Number(document.getElementById('valor_impuesto').value)/Number(100);
     document.getElementById('subtotal').value =  document.getElementById('total').value - document.getElementById('iva').value;
  }


  
  function add(e)
  {

    
    var table = $('#dataTable1 tr');
    var tabla = $('#dataTable1');
    var filas = table.length - 3;
    var idmesero = $('#idmesero').val();
    var idservicio = $('#idservicio').val();
    var i ;
    var nombre = $(e).attr('nombre');
    var precio = $(e).attr('precio');
    var idproducto = $(e).attr('idproducto');
    var pago = $(e).attr('pago');
    var entrega = $(e).attr('entrega');
    var cantidad = e.parentElement.previousElementSibling.firstElementChild.value;
    var subtotal = Number(precio) * Number(cantidad);
    var aux = 0;
    var idcliente = $('#idcliente').val();
    var efectivo = $('#efectivo').val();
    var idtipoventa = $('#idtipoventa').val();
    var idventa = $('#idventa').val();
    var fecha = $('#fecha').val();
    
  
    if(filas >= 1 && Number(cantidad) > 0){
        $('#cabezera').show();
        $('#enviar').show();
    }
    if(cantidad > 0){
        if(!(document.getElementById('subtotal['+filas+']'))){

        tabla.prepend('<tr><td>'+nombre+'<input class="collapse" type="text" name="ventapendientes['+filas+'][idproducto]" value="'+idproducto+'"><input class="collapse" type="text" name="ventapendientes['+filas+'][idservicio]" value="'+idservicio+'"><input class="collapse" type="text" name="ventapendientes['+filas+'][idmesero]" value="'+idmesero+'"></td><td>'+precio+'</td><td style="width:20px;"><input style="width: 100%;" value="'+cantidad+'" onchange="cambio(this)" name="ventapendientes['+filas+'][cantidad]" class="form-control"><input class="collapse" type="text" name="ventapendientes['+filas+'][idtipoventa]" value="'+idtipoventa+'"><input class="collapse" type="text" name="ventapendientes['+filas+'][idventa]" value="'+idventa+'"></td><td id="subtotal['+filas+']">'+subtotal+'</td><td><input type="button" class="btn btn-danger" value="X" onclick="remove(this)"><input class="collapse" type="text" name="ventapendientes['+filas+'][created_at]" value="'+fecha+'"><input class="collapse" type="text" name="ventapendientes['+filas+'][pendiente]" value="1"></td></tr>');
        for(i = 1; i <= filas; i++)
        {
            if (document.getElementById('subtotal['+i+']') != null){
                aux += Number(document.getElementById('subtotal['+i+']').textContent);
            }
            
        }
    var total = $('#total').val(aux);
        }else{
            filas = filas + 1;
            tabla.prepend('<tr><td>'+nombre+'<input class="collapse" type="text" name="ventapendientes['+filas+'][idproducto]" value="'+idproducto+'"><input class="collapse" type="text" name="ventapendientes['+filas+'][idservicio]" value="'+idservicio+'"><input class="collapse" type="text" name="ventapendientes['+filas+'][idmesero]" value="'+idmesero+'"></td><td>'+precio+'</td><td style="width:20px;"><input style="width: 100%;" value="'+cantidad+'" onchange="cambio(this)" name="ventapendientes['+filas+'][cantidad]" class="form-control"><input class="collapse" type="text" name="ventapendientes['+filas+'][idtipoventa]" value="'+idtipoventa+'"><input class="collapse" type="text" name="ventapendientes['+filas+'][idventa]" value="'+idventa+'"></td><td id="subtotal['+filas+']">'+subtotal+'</td><td><input type="button" class="btn btn-danger" value="X" onclick="remove(this)"><input class="collapse" type="text" name="ventapendientes['+filas+'][created_at]" value="'+fecha+'"><input class="collapse" type="text" name="ventapendientes['+filas+'][pendiente]" value="1"></td></tr>');
            for(i = 1; i <= filas; i++)
        {
            if (document.getElementById('subtotal['+i+']') != null){
                aux += Number(document.getElementById('subtotal['+i+']').textContent);
            }
        
        }
    var total = $('#total').val(aux);
        }
        
    }

    datos();
  }
  function totall(){
    var table = $('#dataTable1 tr');
    var filas = table.length - 3;
    var i ;
    var aux = 0;
    for(i = 1; i <= filas; i++)
    {
        
        if (document.getElementById('subtotal['+i+']') == null){
            $('#total').val('0');
           
        }else if(document.getElementById('subtotal['+i+']') != null){

            aux += Number(document.getElementById('subtotal['+i+']').textContent) ;
        }

    }
    var total = $('#total').val(aux);

    if(document.getElementById('total').value == 0){
        $('#enviar').hide();
    }
  }
</script>
<script type="text/javascript">
    function cambio(e){

        var table = $('#dataTable1 tr');
        var filas = table.length - 5;
        var subtotal = e.parentElement.nextElementSibling.textContent;
        var sub = e.parentElement.nextElementSibling;
        var precio = e.parentElement.previousElementSibling.textContent;
        var total = Number(e.value) * Number(precio);
        var i;
        var aux = 0;
        $(sub).text(total);
        for(i = 1; i <= filas + 1; i++)
        {   
           
            if(document.getElementById('subtotal['+i+']') != null){
                aux += Number(document.getElementById('subtotal['+i+']').textContent);
            }
        
            
            
        }

        var total = $('#total').val(aux);
        datos();

    }
</script>

@endsection