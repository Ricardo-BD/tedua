<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Custom fonts for this template-->
    
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/jquery-ui.css" rel="stylesheet">

    <link href="css/bootstrap-datepicker.min.css" rel="stylesheet">

    <link href="css/custom.css" rel="stylesheet">
    <link href="css/jquery-ui.theme.min.css" rel="stylesheet">

    


    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="">


<div>
	<h1>{{\App\Configuracion::first()->titulo_sistema}}</h1>
	<div>
        
		<p>FOLIO: {{ $venta->first()->id }} - FECHA: {{ $venta->first()->created_at->format('d/m/Y') }}</p>
		<br>
		<div class="table-responsive">
                <table class="table table-sm" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>CANT.</th>
                            <th>ARTICULO</th>
                            <th>PRECIO</th>
                            <th>TOTAL</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($venta as $vent)
                            <tr>
                                <td>{{ $vent->cantidad }}</td>
                                <td>{{ \App\Producto::find($vent->idproducto)->nombre }}</td>
                                <td>{{ \App\Producto::find($vent->idproducto)->unidad }}</td>
                                <td>{{ $vent->cantidad * \App\Producto::find($vent->idproducto)->unidad }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

           
            <div class="table-responsive">
                <table class="table table-sm" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>

                            <th>SUBTOTAL:</th>
                            <th></th>
                            <th></th>
                            <th class="text-right">
                                <?php 
                                    $impuesto = (\App\Configuracion::first()->valor_impuesto)/100;
                                    $subtotal = 0;
                                    $total = 0;
                                   
                                ?>
                                @foreach($venta as $vent)
                                <?php
                                   
                                    $cantidad = $vent->cantidad;
                                    $precio =  \App\Producto::find($vent->idproducto)->unidad;
                                    $total += $cantidad * $precio;

                                    $subtotal = $total - ($total*$impuesto);
                                  
                                ?>
                                
                                @endforeach
                                
                            {{$subtotal}}
                            </th>
                        </tr>
                        <tr>
                            <th>DESCUENTO:</th>
                            <th></th>
                            <th></th>
                            <th class="text-right">{{ $venta->first()->descuento }}</th>
                        </tr>
                        <tr>
                            <th>IMPUESTO:</th>
                            <th></th>
                            <th></th>
                            <th class="text-right">{{$impuesto * $total}}</th>
                        </tr>
                        <tr>
                            <th>TOTAL:</th>
                            <th></th>
                            <th></th>
                            <th class="text-right">{{$total}}</th>
                        </tr>
                        <tr>
                            <th>EFECTIVO:</th>
                            <th></th>
                            <th></th>
                            <th class="text-right">{{$total}}</th>
                        </tr>
                    </thead>
                </table>
            </div>
            <br>
            <p class="text-uppercase">ATENDIDO POR {{Auth::user()->name}}</p>
            <p>GRACIAS POR SU COMPRA</p>


	</div>





</div>

































<script src="js/jquery-1.12.4.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="vendor/chart.js/Chart.min.js"></script>

<!-- Page level custom scripts -->
<script src="js/demo/chart-area-demo.js"></script>
<script src="js/demo/chart-pie-demo.js"></script>

<!-- Page level plugins -->
<script src="vendor/datatables/jquery.dataTables.min.js"></script>
<script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="js/demo/datatables-demo.js"></script>

<script src="js/jquery-ui.js"></script>

<script src="js/bootstrap-datepicker.min.js"></script>
<script src="js/moment.min.js"></script>   

  
<script>
   
    $(".datetime").datepicker({
        dateFormat: 'dd-mm-yy'
    });

</script>
</body>
</html>
