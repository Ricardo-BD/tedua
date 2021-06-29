@extends('teduacafe.layouts.app')

@section('content')
    <div class="container">
        <div class="card o-hidden border-0 shadow-lg my-5">
            <div>
                <!-- Nested Row within Card Body -->         
                   <div>
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Ajustes Generales</h1>
                            </div>
                            <?php 
                                $configuracion = \App\Configuracioncafe::first();
                            ?>
                            <form class="user" method="POST" action="{{route('configuracioncafe.update', $configuracion->id)}}" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="form-group row">
								    <label  class="col-sm-3 col-form-label">Titulo del sistema</label>
								    <div class="col-sm-9">
								      <input type="text" class="form-control" name="titulo_sistema" value="{{$configuracion->titulo_sistema}}">
								    </div>
								 </div>
								 <div class="form-group row">
								    <label  class="col-sm-3 col-form-label">Nombre del impuesto</label>
								    <div class="col-sm-9">
								      <input type="text" class="form-control" name="nombre_impuesto" value="{{$configuracion->nombre_impuesto}}">
								    </div>
								 </div>
								 <div class="form-group row">
								    <label  class="col-sm-3 col-form-label">Valor impuesto (%)</label>
								    <div class="col-sm-9">
								      <input type="text" class="form-control" name="valor_impuesto" value="{{$configuracion->valor_impuesto}}">
								    </div>
								 </div>
								 <div class="form-group row">
								    <label  class="col-sm-3 col-form-label">Simbolo de moneda</label>
								    <div class="col-sm-9">
								      <input type="text" class="form-control" name="simbolo" value="{{$configuracion->simbolo}}">
								    </div>
								 </div>
								 <div class="form-group row">
								    <label  class="col-sm-3 col-form-label">Logo</label>
								    <div class="col-sm-9">
								      <input type="text" class="form-control" name="logo" value="{{$configuracion->logo}}">
								    </div>
								 </div>
								 <div class="form-group row">
								    <label  class="col-sm-3 col-form-label">Fondo</label>
								    <div class="col-sm-9">
								      <input type="text" class="form-control" name="fondo" value="{{$configuracion->fondo}}">
								    </div>
								 </div> 
								 <div class="form-group row">
								    <label  class="col-sm-3 col-form-label">Footer PDF</label>
								    <div class="col-sm-9">
								      <input type="text" class="form-control" name="footer_pdf" value="{{$configuracion->footer_pdf}}">
								    </div>
								 </div>
								 <div class="form-group row">
								    <label  class="col-sm-3 col-form-label">Titulo Ticket</label>
								    <div class="col-sm-9">
								      <input type="text" class="form-control" name="titulo_ticket" value="{{$configuracion->titulo_ticket}}">
								    </div>
								 </div>
								 <div class="form-group row">
								    <label  class="col-sm-3 col-form-label">Encabezado 1 Ticket</label>
								    <div class="col-sm-9">
								      <input type="text" class="form-control" name="encabezado_1" value="{{$configuracion->encabezado_1}}">
								    </div>
								 </div>
								 <div class="form-group row">
								    <label  class="col-sm-3 col-form-label">Encabezado 2 Ticket</label>
								    <div class="col-sm-9">
								      <input type="text" class="form-control" name="encabezado_2" value="{{$configuracion->encabezado_2}}">
								    </div>
								 </div>
								 <div class="form-group row">
								    <label  class="col-sm-3 col-form-label">NIT Ticket</label>
								    <div class="col-sm-9">
								      <input type="text" class="form-control" name="nit" value="{{$configuracion->nit}}">
								    </div>
								 </div>
								 <div class="form-group row">
								    <label  class="col-sm-3 col-form-label">Dirección Ticket</label>
								    <div class="col-sm-9">
								      <input type="text" class="form-control" name="direccion" value="{{$configuracion->direccion}}">
								    </div>
								 </div>
								 <div class="form-group row">
								    <label  class="col-sm-3 col-form-label">Teléfono Ticket</label>
								    <div class="col-sm-9">
								      <input type="text" class="form-control" name="telefono" value="{{$configuracion->telefono}}">
								    </div>
								 </div> 
                                <button type="submit" class="btn btn-primary btn-user btn-block">
                                    Actualizar
                                </button>
                                <hr>
                            </form>
                            <hr>
                        </div>
                    </div>   
            </div>
        </div>
    </div>

@endsection