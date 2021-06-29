<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*
|
|--------------------------------------------------------------------------
|           RUTAS DE TEDUA CAFE
|--------------------------------------------------------------------------
|
|
*/

    Route::get('/cafeindex', 'UsercafeController@index')->name('cafe.index');
    Route::get('/cafelogin', 'UsercafeController@login')->name('cafe.login');
    Route::post('/cafeloginn', 'UsercafeController@loginn')->name('cafe.loginn');

    Route::get('/configuracion-cafe', 'ConfiguracioncafeController@index')->name('configuracioncafe.index');
    Route::post('/configuracion-cafe/{id}', 'ConfiguracioncafeController@update')->name('configuracioncafe.update');

    Route::get('/secciones' , 'SeccionController@index')->name('seccion.index');
    Route::get('/secciones-create' , 'SeccionController@create')->name('seccion.register');
    Route::post('/secciones-register' , 'SeccionController@store')->name('seccion.store');
    Route::post('/secciones-actualizar/{id}', 'SeccionController@update')->name('seccion.update');
    Route::delete('/secciones/{id}', 'SeccionController@destroy')->name('seccion.destroy');

    Route::get('/mesas' , 'MesaController@index')->name('mesas.index');
    Route::get('/mesas-create' , 'MesaController@create')->name('mesas.register');
    Route::post('/mesas-register' , 'MesaController@store')->name('mesas.store');
    Route::post('/mesas-actualizar/{id}', 'MesaController@update')->name('mesas.update');
    Route::delete('/mesas/{id}', 'MesaController@destroy')->name('mesas.destroy');

    Route::get('/delivery' , 'DeliveryController@index')->name('deliveris.index');
    Route::get('/delivery-create' , 'DeliveryController@create')->name('deliveris.register');
    Route::post('/delivery-register' , 'DeliveryController@store')->name('deliveris.store');
    Route::post('/delivery-actualizar/{id}', 'DeliveryController@update')->name('deliveris.update');
    Route::delete('/delivery/{id}', 'DeliveryController@destroy')->name('deliveris.destroy');

    Route::get('/usuarios-cafe' , 'HomeController@user_cafe')->name('users.cafe');
    Route::post('/usuarioscafe/{id}', 'HomeController@updatecafe')->name('userscafe.update');
    Route::delete('/usuarioscafe/{id}', 'HomeController@destroycafe')->name('userscafecafe.destroy');
    Route::get('/usuarioscafe-registro', 'HomeController@createcafe')->name('userscafe.create');
    Route::post('/usuarioscafe-registroo', 'HomeController@registercafe')->name('userscafe.register');

    Route::get('/productoscafe', 'ProductocafeController@index')->name('productoscafe.index');
    Route::get('/productoscafe-crear', 'ProductocafeController@create')->name('productoscafe.register');
    Route::post('/productoscafe-actualizar/{id}', 'ProductocafeController@update')->name('productoscafe.update');
    Route::post('/productoscafe-registrar', 'ProductocafeController@store')->name('productoscafe.store');
    Route::delete('/productoscafe/{id}', 'ProductocafeController@destroy')->name('productoscafe.destroy');

    Route::get('/ingredientes', 'IngredienteController@index')->name('ingredientes.index');
    Route::get('/ingredientes-crear', 'IngredienteController@create')->name('ingredientes.register');
    Route::post('/ingredientes-actualizar/{id}', 'IngredienteController@update')->name('ingredientes.update');
    Route::post('/ingredientes-registrar', 'IngredienteController@store')->name('ingredientes.store');
    Route::delete('/ingredientes/{id}', 'IngredienteController@destroy')->name('ingredientes.destroy');

    Route::get('/unidades', 'UnidadController@index')->name('unidades.index');
    Route::get('/unidades-crear', 'UnidadController@create')->name('unidades.register');
    Route::post('/unidades-actualizar/{id}', 'UnidadController@update')->name('unidades.update');
    Route::post('/unidades-registrar', 'UnidadController@store')->name('unidades.store');
    Route::delete('/unidades/{id}', 'UnidadController@destroy')->name('unidades.destroy');


    Route::get('/presentaciones', 'PresentacionController@index')->name('presentaciones.index');
    Route::get('/presentaciones-crear', 'PresentacionController@create')->name('presentaciones.register');
    Route::post('/presentaciones-actualizar/{id}', 'PresentacionController@update')->name('presentaciones.update');
    Route::post('/presentaciones-registrar', 'PresentacionController@store')->name('presentaciones.store');
    Route::delete('/presentaciones/{id}', 'PresentacionController@destroy')->name('presentaciones.destroy');

    Route::get('/categoriaproductos', 'CategoriapcafeController@index')->name('categoriaproductos.index');
    Route::get('/categoriaproductos-crear', 'CategoriapcafeController@create')->name('categoriaproductos.register');
    Route::post('/categoriaproductos-actualizar/{id}', 'CategoriapcafeController@update')->name('categoriaproductos.update');
    Route::post('/categoriaproductos-registrar', 'CategoriapcafeController@store')->name('categoriaproductos.store');
    Route::delete('/categoriaproductos/{id}', 'CategoriapcafeController@destroy')->name('categoriaproductos.destroy');

    Route::get('/categoriaingredientes', 'CategoriaicafeController@index')->name('categoriaingredientes.index');
    Route::get('/categoriaingredientes-crear', 'CategoriaicafeController@create')->name('categoriaingredientes.register');
    Route::post('/categoriaingredientes-actualizar/{id}', 'CategoriaicafeController@update')->name('categoriaingredientes.update');
    Route::post('/categoriaingredientes-registrar', 'CategoriaicafeController@store')->name('categoriaingredientes.store');
    Route::delete('/categoriaingredientes/{id}', 'CategoriaicafeController@destroy')->name('categoriaingredientes.destroy');


    Route::get('/estadoentregas', 'EstadoentregaController@index')->name('estadoentregas.index');
    Route::get('/estadoentregas-crear', 'EstadoentregaController@create')->name('estadoentregas.register');
    Route::post('/estadoentregas-actualizar/{id}', 'EstadoentregaController@update')->name('estadoentregas.update');
    Route::post('/estadoentregas-registrar', 'EstadoentregaController@store')->name('estadoentregas.store');
    Route::delete('/estadoentregas/{id}', 'EstadoentregaController@destroy')->name('estadoentregas.destroy');

    Route::get('/mediopagos', 'MediopagoController@index')->name('mediopagos.index');
    Route::get('/mediopagos-crear', 'MediopagoController@create')->name('mediopagos.register');
    Route::post('/mediopagos-actualizar/{id}', 'MediopagoController@update')->name('mediopagos.update');
    Route::post('/mediopagos-registrar', 'MediopagoController@store')->name('mediopagos.store');
    Route::delete('/mediopagos/{id}', 'MediopagoController@destroy')->name('mediopagos.destroy');

    Route::get('/tipopagos', 'TipopagoController@index')->name('tipopagos.index');
    Route::get('/tipopagos-crear', 'TipopagoController@create')->name('tipopagos.register');
    Route::post('/tipopagos-actualizar/{id}', 'TipopagoController@update')->name('tipopagos.update');
    Route::post('/tipopagos-registrar', 'TipopagoController@store')->name('tipopagos.store');
    Route::delete('/tipopagos/{id}', 'TipopagoController@destroy')->name('tipopagos.destroy');

    Route::get('/proveedores', 'ProveedorController@index')->name('proveedores.index');
    Route::get('/proveedores-crear', 'ProveedorController@create')->name('proveedores.register');
    Route::post('/proveedores-actualizar/{id}', 'ProveedorController@update')->name('proveedores.update');
    Route::post('/proveedores-registrar', 'ProveedorController@store')->name('proveedores.store');
    Route::delete('/proveedores/{id}', 'ProveedorController@destroy')->name('proveedores.destroy');

    Route::get('/clientescafe', 'ClientecafeController@index')->name('clientescafe.index');
    Route::get('/clientescafe-crear', 'ClientecafeController@create')->name('clientescafe.register');
    Route::post('/clientescafe-actualizar/{id}', 'ClientecafeController@update')->name('clientescafe.update');
    Route::post('/clientescafe-registrar', 'ClientecafeController@store')->name('clientescafe.store');
    Route::delete('/clientescafe/{id}', 'ClientecafeController@destroy')->name('clientescafe.destroy');


    Route::get('/venta-mesa', 'VentacafeController@venta_mesa_index')->name('ventamesa.index');

    Route::post('/usercafe-registrar', 'UsercafeController@store')->name('usercafe.store');
    Route::delete('/usercafe/{id}', 'UsercafeController@destroy')->name('usercafe.destroy');


    Route::get('/ventapendiente', 'VentapendienteController@index')->name('ventapendiente');
    Route::get('/ventapendiente-mesa{id}', 'VentapendienteController@create')->name('ventapendiente.mesa');
    Route::post('/ventamesa', 'VentapendienteController@ventamesa_store')->name('ventamesa.store');
    Route::post('/ventamesaup{id}', 'VentapendienteController@update')->name('ventapendiente.update');
    Route::delete('/ventapendiente/{id}', 'VentapendienteController@destroy')->name('ventapendiente.destroy');

    Route::get('/ventaproducto', 'VentapendienteController@ventaproducto_create')->name('ventaproducto.index');
    Route::post('/ventaproducto', 'VentapendienteController@ventaproducto_store')->name('ventaproducto.store');


    Route::get('/ventapendiente-delivery', 'VentadeliveryController@index')->name('ventapendiente.delivery');
    Route::get('/ventadelivery', 'VentadeliveryController@create')->name('ventadelivery.index');
    Route::post('/ventadelivery-create', 'VentadeliveryController@store')->name('ventadelivery.store');
    Route::post('/ventadelivery{id}', 'VentadeliveryController@update')->name('ventadelivery.update');

    Route::post('ventacompleta', 'VentacafeController@store')->name('ventacompleta.store');
    Route::post('ventacompletadelivery{id}', 'VentadeliveryController@store2')->name('ventacompletadelivery.store');
    Route::delete('/ventadelivery/{id}', 'VentadeliveryController@destroy')->name('ventadelivery.destroy');


    Route::get('/monitor', 'VentadeliveryController@monitor_index')->name('monitor');
    Route::get('/cocina', 'VentadeliveryController@cocina_index')->name('cocina');
    Route::post('/cocinaentregado{id}', 'VentadeliveryController@cocina_entregado')->name('cocina.entregado');

    Route::get('/ventasdiasrias', 'VentacafeController@ventasdiarias')->name('ventasdiarias');
    Route::get('/ventascafe', 'VentacafeController@ventascafe')->name('ventascafe');

    Route::delete('/ventascafe/{id}', 'VentacafeController@destroy')->name('ventascafe.destroy');


    Route::get('/ventascobrar', 'VentacafeController@ventascobrar')->name('ventascobrar');

    Route::get('/ventasentrega', 'VentacafeController@ventasentrega')->name('ventasentrega');















/*
|
|--------------------------------------------------------------------------
|           RUTAS DE TEDUA HOTEL
|--------------------------------------------------------------------------
|
|
*/


Route::get('/', function () {
    return view('welcome');
});


Auth::routes();


Route::group(['middleware' => 'admin'||'mostrador'||'ventas'], function () {

    Route::group(['middleware' => 'admin'], function () {
        Route::get('/home', 'HomeController@index')->name('home');
    });
    
Route::get('/entrada', 'HomeController@entrada')->name('entrada');

    Route::group(['middleware' => 'ventas' || 'admin'|| 'mostrador'], function () {

        Route::get('/rentar-habitacion', 'HomeController@rentarhabitacion')->name('rentar_habitacion');
        Route::get('/rentar{id}', 'RentaController@create')->name('rentas.index');
        Route::post('/rentar', 'RentaController@store')->name('rentas.store');
        Route::get('/ventas', 'ProductoController@venta')->name('ventas.index');
        Route::get('/ventasp', 'ProductoController@ventap')->name('ventasp.index');
        Route::post('/ventass', 'VentaController@store')->name('ventas.store');
        Route::post('/comprass', 'CompraController@store')->name('compra.store');
        Route::post('check_in/{id}', 'HomeController@check_in')->name('check_in');
        Route::post('check_out/{id}', 'HomeController@check_out')->name('check_out');


    });

 Route::group(['middleware' =>  'admin'], function () {
    Route::get('/rentas', 'RentaController@show')->name('rentas.show');
    Route::delete('/rentas/{id}', 'RentaController@destroy')->name('rentas.destroy');
    Route::get('/clientes', 'ClienteController@index')->name('cliente.index');
    Route::get('/clientes-crear', 'ClienteController@create')->name('cliente.register');
    Route::post('/clientes-registrar', 'ClienteController@store')->name('cliente.store');
    Route::post('/clientes-actualizar/{id}', 'ClienteController@update')->name('cliente.update');
    Route::delete('/clientes/{id}', 'ClienteController@destroy')->name('cliente.destroy');

    Route::get('/tipo-habitacion', 'TipohabitacionController@index')->name('tipohabitacion.index');
    Route::get('/tipo-habitacion-crear', 'TipohabitacionController@create')->name('tipohabitacion.register');
    Route::post('/tipo-habitacion-actualizar/{id}', 'TipohabitacionController@update')->name('tipohabitacion.update');
    Route::post('/tipo-habitacion-registrar', 'TipohabitacionController@store')->name('tipohabitacion.store');
    Route::delete('/tipo-habitacion/{id}', 'TipohabitacionController@destroy')->name('tipohabitacion.destroy');

    Route::get('/habitacion', 'HabitacionController@index')->name('habitaciones.index');
    Route::get('/habitacion-crear', 'HabitacionController@create')->name('habitaciones.register');
    Route::post('/habitacion-actualizar/{id}', 'HabitacionController@update')->name('habitaciones.update');
    Route::post('/habitacion-registrar', 'HabitacionController@store')->name('habitaciones.store');
    Route::delete('/habitacion/{id}', 'HabitacionController@destroy')->name('habitaciones.destroy');

    Route::get('/categoria', 'CategoriaController@index')->name('categorias.index');
    Route::get('/categoria-crear', 'CategoriaController@create')->name('categorias.register');
    Route::post('/categoria-actualizar/{id}', 'CategoriaController@update')->name('categorias.update');
    Route::post('/categoria-registrar', 'CategoriaController@store')->name('categorias.store');
    Route::delete('/categoria/{id}', 'CategoriaController@destroy')->name('categorias.destroy');

    Route::get('/categoriap', 'CategoriapController@index')->name('categoriasp.index');
    Route::get('/categoriap-crear', 'CategoriapController@create')->name('categoriasp.register');
    Route::post('/categoriap-actualizar/{id}', 'CategoriapController@update')->name('categoriasp.update');
    Route::post('/categoriap-registrar', 'CategoriapController@store')->name('categoriasp.store');
    Route::delete('/categoriap/{id}', 'CategoriapController@destroy')->name('categoriasp.destroy');

    Route::get('/productos', 'ProductoController@index')->name('productos.index');
    Route::get('/productos-crear', 'ProductoController@create')->name('productos.register');
    Route::post('/productos-actualizar/{id}', 'ProductoController@update')->name('productos.update');
    Route::post('/productos-registrar', 'ProductoController@store')->name('productos.store');
    Route::delete('/productos/{id}', 'ProductoController@destroy')->name('productos.destroy');   
});


Route::get('/inventario', 'ProductoController@inventario')->name('productos.inventario');
Route::get('/inventario-abastecimiento', 'ProductoController@abastecimiento')->name('productos.abastecimiento');
Route::get('/ventasp', 'ProductoController@ventap')->name('ventasp.index');


    Route::group(['middleware' => 'admin'], function () {

        Route::get('/ventas', 'ProductoController@venta')->name('ventas.index');
        
        Route::get('/compras', 'ProductoController@compra')->name('compras.index');

        

       
        Route::delete('/ventass/{id}', 'VentaController@destroy')->name('venta.destroy');

       
        Route::delete('/comprass/{id}', 'CompraController@destroy')->name('compra.destroy');

        
        Route::delete('/comprass/{id}', 'CompraController@destroy')->name('compra.destroy');


        Route::get('/usuarios', 'HomeController@usuario')->name('users.index');
        Route::post('/usuarios/{id}', 'HomeController@update')->name('users.update');
        Route::delete('/usuarios/{id}', 'HomeController@destroy')->name('users.destroy');
        Route::get('/usuarios-registro', 'HomeController@create')->name('users.create');
        Route::post('/usuarios-registroo', 'HomeController@register')->name('users.register');
        Route::get('configuraciones', 'HomeController@config_index')->name('configuraciones.index');
        Route::post('configuraciones/{id}', 'HomeController@config_update')->name('configuraciones.update');

        

        Route::get('factura/{id}', 'VentaController@factura')->name('factura.pdf');
    });
});