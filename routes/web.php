<?php

use App\Http\Controllers\ClienteController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProveedoreController;
use App\Http\Controllers\InsumoController;
use App\Http\Controllers\CompraController;
use App\Http\Controllers\DetallecompraController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\DetallepedidoController;
use App\Http\Controllers\VentaController;
use App\Http\Controllers\DetalleventaController;


Route::get('/', function () {
    return view('welcome');
});
/*llamdo de login y registro */ 
Auth::routes();
/*Rutas clientes*/ 
Route::resource('clientes', ClienteController::class);

/* Estado*/
Route::get('UpdateStatusNoti', 'ClienteController@UpdateStatusNoti')->name('UpdateStatusNoti');
/* para guardar form*/
Route::post('/clientes',[ClienteController::class, 'guardar'])->name('clientesGuardar');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

/*Rutas para proveedores*/
Route::resource('proveedores', ProveedoreController::class);

/* para guardar form*/
Route::post('/proveedores',[ProveedoreController::class, 'guardar'])->name('proveedoresGuardar');
/*Actualizar*/ 
Route::put('/proveedores/{proveedor}',[ProveedoreController::class, 'actualizar'])->name('proveedoresActualizar');

/* Rutas para insumos*/
Route::resource('insumos', InsumoController::class);

/*recibe get y post*/ 
Route::patch('/insumos/update', [App\Http\Controllers\InsumoController::class, 'update'])->name('insumos.update');
/*recibe post*/ 
Route::post('/insumos/store',[App\Http\Controllers\InsumoController::class, 'store'])->name('insumos.store');
/*para eliminar*/ 
Route::delete('/insumos/destroy/{IdInsumo}', [App\Http\Controllers\InsumoController::class, 'destroy'])->name('insumos.destroy');
/* para guardar form*/
Route::post('/insumos',[InsumoController::class, 'guardar'])->name('insumosGuardar');

/* Rutas para compra*/
Route::resource('compras', CompraController::class);
Route::post('/compras',[CompraController::class, 'guardar'])->name('comprasGuardar');
Route::get('compras/update', [App\Http\Controllers\CompraController::class, 'update'])->name('compras.update');
Route::delete('/compras/destroy/{IdCompra}', [App\Http\Controllers\InsumoController::class, 'destroy'])->name('compras.destroy');
Route::post('compras/store',[App\Http\Controllers\DetallecompraController::class, 'store'])->name('compras.store');

/* Rutas para detalle de compra */
Route::resource('detalleCompra', DetallecompraController::class);
Route::get('detalleCompra/create', [App\Http\Controllers\DetallecompraController::class, 'create'])->name('detallecompras.create');
Route::post('detalleCompra/store',[App\Http\Controllers\DetallecompraController::class, 'store'])->name('detallecompras.store');

/* Rutas para pedido*/
Route::resource('pedidos', PedidoController::class);

/* para guardar form*/
Route::post('pedidos',[PedidoController::class, 'guardar'])->name('pedidosGuardar');
/*Actualizar*/ 
Route::put('/pedidos/{pedido}',[PedidoController::class, 'actualizar'])->name('pedidosActualizar');


/* Rutas para detalle de pedido */
Route::resource('detallePedido', DetallepedidoController::class);
Route::get('detallePedido/create', [App\Http\Controllers\DetallepedidoController::class, 'create'])->name('detallepedidos.create');
Route::post('detallePedido/store',[App\Http\Controllers\DetallepedidoController::class, 'store'])->name('detallepedidos.store');
Route::delete('/detallePedido/destroy/{IdDetallePedido?}', [App\Http\Controllers\DetallepedidoController::class, 'destroy'])->name('detallepedidos.destroy');
Route::post('detallePedido/show/{Pedidos_IdPedido?}',[App\Http\Controllers\DetallepedidoController::class, 'store'])->name('detallepedidos.store');
Route::put('detallePedido/{DetallePedido?}',[App\Http\Controllers\DetallepedidoController::class, 'actualizar'])->name('actualizardetallepedido');


/* Rutas para venta*/
/* Estado de venta*/
Route::resource('ventas', VentaController::class);
Route::get('UpdateStatusNoti', 'VentaController@UpdateStatusNoti')->name('UpdateStatusNoti');
Route::get('ventas/update', [App\Http\Controllers\VentaController::class, 'update'])->name('ventas.update');
Route::post('ventas/store',[App\Http\Controllers\DetalleventaController::class, 'store'])->name('ventas.store');

/* Rutas para detalle de ventas */
Route::resource('detalleventas', DetalleventaController::class);
Route::get('detalleventas/create', [App\Http\Controllers\DetalleventaController::class, 'create'])->name('detalleventas.create');
Route::post('detalleventas/store',[App\Http\Controllers\DetalleventaController::class, 'store'])->name('detalleventas.store');
Route::delete('/detalleventas/destroy/{IdDetalleVenta?}', [App\Http\Controllers\DetalleventaController::class, 'destroy'])->name('detalleventas.destroy');
Route::post('detalleventas/show/{Ventas_IdVenta?}',[App\Http\Controllers\DetalleventaController::class, 'store'])->name('detalleventas.store');
Route::put('detalleventas\/{DetalleVenta?}',[App\Http\Controllers\DetalleventaController::class, 'actualizar'])->name('actualizardetalleventa');



