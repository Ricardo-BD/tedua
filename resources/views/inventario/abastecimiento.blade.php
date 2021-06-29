@extends('layouts.app2')

@section('content')
<div class="container-fluid">     
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Reabastecer Inventario</h1>
    </div>
    
                    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Codigo</th>
                            <th>Nombre</th>
                            <th>Precio unitario</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    
                    @foreach($productos as $producto)
                    @if($producto)

                        <tbody>
                            <tr>
                                <td >{{ $producto->codigo }}</td>
                                <td >{{ $producto->nombre }}</td>
                                <td id="" >{{\App\Configuracion::first()->simbolo}} {{ $producto->unidad }}</td>
                             
                                <td class="d-flex">
                                  <div class="modal fade" id="exampleModal1-{{$producto->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModal1Label" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModal1Label">Comprar Producto</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                        
                                        <div class="modal-body">
                                            <form method="POST" action="{{ route('compra.store') }}"  role="form">
                                           
                                            {{ csrf_field() }}

                                        
                                          <div class="form-group row">
                                              <div class="col-sm-6 mb-3 mb-sm-0">
                                                  <label class="col-sm-8">Producto</label>
                                                  <input type="text" class="form-control" 
                                                       style="border-radius: 10rem;
                                                          " name="producto" value="{{$producto->nombre}}" readonly>
                                                  <input type="" name="idproducto" value="{{$producto->id}}" class="collapse">         
                                              </div> 
                                              <div class="col-sm-6 mb-3 mb-sm-0">
                                                  <label class="col-sm-8">Cantidad</label>
                                                  <input type="text" class="form-control" 
                                                       style="border-radius: 10rem;
                                                          " name="cantidad" id="cantidad" 
                                                          onchange="precio(this)" precio="{{$producto->unidad }}">
                                              </div>   
                                          </div>
                                          <div class="form-group row">
                                             
                                              <div class="col-sm-6 mb-3 mb-sm-0">
                                                  <label class="col-sm-8">Efectivo</label>
                                                  <input type="text" class="form-control" 
                                                       style="border-radius: 10rem;
                                                          " name="efectivo">
                                              </div>   
                                          </div>
                                          <div class="form-group row">
                                              <div class="col-sm-6 mb-3 mb-sm-0">
                                                  <label class="col-sm-8">Pago</label>
                                                  <input type="text" class="form-control" 
                                                       style="border-radius: 10rem;
                                                          " name="pago" value="Pagado" readonly>
                                              </div> 
                                              <div class="col-sm-6 mb-3 mb-sm-0">
                                                  <label class="col-sm-8">Entrega</label>
                                                  <input type="text" class="form-control" 
                                                       style="border-radius: 10rem;
                                                          " name="entrega" value="Entregado" readonly>
                                              </div>   
                                          </div>
                                          <div class="form-group row">
                                              <div class="col-sm-4 mb-3 mb-sm-0">
                                                  <label class="col-sm-8">Subtotal</label>
                                                  <input type="text" class="form-control" 
                                                       style="border-radius: 10rem;
                                                          " id="subtotal"  readonly>
                                              </div> 
                                              <div class="col-sm-4 mb-3 mb-sm-0">
                                                  <label class="col-sm-12">{{\App\Configuracion::first()->nombre_impuesto}} ({{\App\Configuracion::first()->valor_impuesto}}%)</label>
                                                  <input type="text" class="form-control" 
                                                       style="border-radius: 10rem;
                                                          " name="iva" id="iva" readonly>
                                                  <input class="collapse" value="{{\App\Configuracion::first()->valor_impuesto}}" id="valor_impuesto">       
                                              </div>
                                              <div class="col-sm-4 mb-3 mb-sm-0">
                                                  <label class="col-sm-8">Total</label>
                                                  <input type="text" class="form-control" 
                                                       style="border-radius: 10rem;
                                                          " name="total" id="total" readonly>
                                              </div>   
                                          </div>
                                           
                                              </div>
                                              <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                                <button type="submit" class="btn btn-primary">Comprar</button>
                                                 </form>
                                              </div>
                                            </div>
                                          </div>
                                        </div>

                                        <a type="button" data-toggle="modal" data-target="#exampleModal1-{{$producto->id}}" class="btn btn-sm btn-success" style=" margin: 0em 0.2em 0em 0.2em;">reabastecer</a>
                                  
                                
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
  function precio(e) {
      var total = e.parentElement.parentElement.nextElementSibling.nextElementSibling.nextElementSibling.lastElementChild.lastElementChild;
      var iva = e.parentElement.parentElement.nextElementSibling.nextElementSibling.nextElementSibling.firstElementChild.nextElementSibling.lastElementChild.previousElementSibling;
      var subtotal = e.parentElement.parentElement.nextElementSibling.nextElementSibling.nextElementSibling.firstElementChild.lastElementChild;
      var precio = $(e).attr('precio') * $(e).val();
      $(total).val(precio);
      var iva2 = $(iva).val(precio * Number(document.getElementById('valor_impuesto').value)/Number(100));
      $(subtotal).val(precio - iva2.val());
      console.log(iva2);
  }
</script>
                 
@endsection