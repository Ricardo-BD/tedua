@extends('teduacafe.layouts.app')

@section('content')
<div class="container-fluid">     
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Productos</h1>
        <a class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" href="{{ route('productoscafe.register') }}"><i
                class="fas fa-plus fa-sm text-white-50"></i> Agregar producto</a> 
    </div>
                    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Codigo</th>
                            <th style="width: 50px !important;">Imagen</th>
                            <th>Nombre</th>
                            <th>Precio Unitario</th>
                            <th>En inventario</th>
                            <th>Cantidad</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    
                    @foreach($productos as $producto)
                    @if($producto)

                        <tbody>
                            <tr>
                                <td>{{ $producto->codigo }}</td>
                                <td ><img style="width:80px;" src="{{ asset('/storage/app/'.$producto->imagen) }}" alt=""></td>
                                <td>{{ $producto->nombre }}</td>
                                <td>{{ $producto->precio_salida }}</td>
                                <td>{{ $producto->inventario }}</td>
                                <td><input name="cantidad" class="form-control"></td>
                                <td class="d-flex">
                                    <a href="#" class="btn btn-primary">Agregar</a>
                                
			                     </td>
                            </tr>
                        </tbody>
                    @endif    
                    @endforeach          
                </table>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    function usa_ingredientess(e) {
       if(e.checked){
            $(e).val('1');
       }else{
            $(e).val('0');
       }
    }

    function usa_inventarioo(e) {
       if(e.checked){
            $(e).val('1');
       }else{
            $(e).val('0');
       }
    }

    function favoritoo(e) {
       if(e.checked){
            $(e).val('1');
       }else{
            $(e).val('0');
       }
    }

    function activoo(e) {
       if(e.checked){
            $(e).val('1');
       }else{
            $(e).val('0');
       }
    }
</script>                 
@endsection