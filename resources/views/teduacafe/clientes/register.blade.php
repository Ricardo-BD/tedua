@extends('teduacafe.layouts.app')

@section('content')
    <div class="container">
        <div class="card o-hidden border-0 shadow-lg my-5">
            <div>
                <!-- Nested Row within Card Body -->         
                   <div>
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Nuevo Cliente</h1>
                            </div>
                            <form class="user" method="POST" action="{{route('clientescafe.store')}}">
                                {{ csrf_field() }}
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">RUT</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="rut">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Nombre</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="nombre">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Apellido</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="apellido">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Direccion</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="direccion">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Email</label>
                                    <div class="col-sm-9">
                                        <input type="email" class="form-control" name="email">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Telefono</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="telefono">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Celular</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="celular">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Contacto</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="contacto">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Sitio web</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="sitio_web">
                                    </div>
                                </div>

                                <div class="form-group" >
                                    <div class="col-md-6">
                                     <div class="form-check">
                                        <input type="checkbox" class="form-check-input"  name="es_empresa" id="es_empresa" onclick="es_empresaa(this)" value="0">
                                        <label class="form-check-label">Es empresa</label>
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
<script type="text/javascript">
    document.addEventListener("DOMContentLoaded", function(event) {
        $('#es_empresa').val('0');
        console.log($('#es_empresa').val());
    });
    function es_empresaa(e) {
       if(e.checked){
            $(e).val('1');
       }else{
            $(e).val('0');
       }
    }
</script>
@endsection