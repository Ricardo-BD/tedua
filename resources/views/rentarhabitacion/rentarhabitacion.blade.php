@extends('layouts.app2')

@section('content')
@foreach($tipohabitaciones as $tipohabitacion)
<div class="container-fluid">
     <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">{{$tipohabitacion->titulo}}</h1>
    </div>
    
 
            <div class="shadow mb-4 row">
                @foreach($habitaciones as $habitacion)
                @if($habitacion->idhabitacion == $tipohabitacion->id)
                <div class="card-body col-md-1">
                    <div class="text-center text-white p-2" style="border: 1px solid; border-radius: 0.5em;background-color: #3c8dbc;">
                        <a href="{{ route('rentas.index', $habitacion->id) }}" class="text-center text-white">
                            <p class="mb-0">{{$habitacion->codigo}}</p>
                            <i class="fa fa-bed fa-2x"></i>
                            <p class="mb-0">{{\App\Estado::find($habitacion->idestatus)->nombre}}</p>
                        </a>
                    </div>
                </div>
                @endif
                @endforeach
            </div>
    
    
</div>
@endforeach
@endsection