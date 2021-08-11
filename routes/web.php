<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\InicioController;
use App\Http\Controllers\CatalogoController;
use App\Http\Controllers\CarritoController;
use App\Http\Controllers\PagoController;
use App\Http\Controllers\RegistroController;
use App\Http\Controllers\ClienteController;

use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\InicioController as DashController;

use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\CategoriaController;
use App\Http\Controllers\Admin\ClienteAdmController;
use App\Http\Controllers\Admin\ProductoController;
use App\Http\Controllers\Admin\VentaController;

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

// Rutas Públicas
Route::get('/',[InicioController::class,'index']);
Route::get('/catalogo/{url}',[CatalogoController::class,'index']);
Route::get('/producto/{url}',[CatalogoController::class,'detalle']);
// Podemos acceder a la ruta desde el método POST o GET
Route::any('/carrito',[CarritoController::class,'index']);
Route::get('/carrito/eliminar/{id}',[CarritoController::class,'eliminar']);

Route::get('/registro',[RegistroController::class,'index'])->name('login');
Route::post('/registro/nuevo',[RegistroController::class,'nuevo']);
Route::post('/registro/login',[RegistroController::class,'login']);
Route::get('/registro/logout',[RegistroController::class,'logout']);

// Rutas para realizar el pago
Route::get('/pago',[PagoController::class,'index']);
Route::post('/procesar',[PagoController::class,'procesar']);
Route::get('/completado',[PagoController::class,'completado']);

// Rutas de acceso para los clientes
Route::group(['prefix'=>'/cliente', 'middleware'=>['auth']], function(){
    Route::get('/historial',[ClienteController::class,'index']);
    Route::get('/pedido/{id}',[ClienteController::class,'pedido']);
    Route::get('/perfil',[ClienteController::class,'perfil']);
    Route::post('/guardar',[ClienteController::class,'guardar']);
});

// Rutas de acceso para el administrador
Route::prefix('/admin')->group(function (){
    Route::get('/login',[LoginController::class, 'index']);
    Route::post('/ingresar',[LoginController::class, 'ingresar']);
    Route::post('/salir',[LoginController::class, 'salir']);
    Route::middleware(['auth:admin'])->group(function(){
        Route::get('/dash',[DashController::class, 'index'])->name('inicio.admin');
        //Usuarios
        Route::get('/usuarios', [UserController::class, 'index'])->name('usuario.index');
        Route::get('/usuarios/nuevo', [UserController::class, 'nuevo'])->name('usuario.nuevo');
        Route::post('/usuarios/guardar', [UserController::class, 'guardar'])->name('usuario.guardar');
        Route::get('/usuarios/editar/{id}', [UserController::class, 'detalle'])->name('usuario.editar');
        Route::get('/usuarios/eliminar/{id}', [UserController::class, 'eliminar'])->name('usuario.eliminar');
        Route::post('/usuarios/actualizar', [UserController::class, 'actualizar'])->name('usuario.actualizar');
        Route::get('/usuarios/reset/{id}', [UserController::class, 'reset'])->name('usuario.reset');
        //MiPerfil
        Route::get('/perfil/{id}', [UserController::class, 'perfilIndex'])->name('perfil.index');
        Route::post('/perfil/actualizar', [UserController::class, 'perfilUpdate'])->name('perfil.actualizar');
        //Categoria
        Route::get('/categorias', [CategoriaController::class, 'index'])->name('categoria.index');
        Route::get('/categorias/nuevo', [CategoriaController::class, 'nuevo'])->name('categoria.nuevo');
        Route::post('/categorias/guardar', [CategoriaController::class, 'guardar'])->name('categoria.guardar');
        Route::get('/categorias/editar/{id}', [CategoriaController::class, 'detalle'])->name('categoria.editar');
        Route::get('/categorias/eliminar/{id}', [CategoriaController::class, 'eliminar'])->name('categoria.eliminar');
        Route::post('/categorias/actualizar', [CategoriaController::class, 'actualizar'])->name('categoria.actualizar');
        //Productos
        Route::get('/productos', [ProductoController::class, 'index'])->name('producto.index');
        Route::get('/productos/nuevo', [ProductoController  ::class, 'nuevo'])->name('producto.nuevo');
        Route::post('/productos/guardar', [ProductoController::class, 'guardar'])->name('producto.guardar');
        Route::get('/productos/editar/{id}', [ProductoController::class, 'detalle'])->name('producto.editar');
        Route::get('/productos/eliminar/{id}', [ProductoController::class, 'eliminar'])->name('producto.eliminar');
        Route::post('/productos/actualizar', [ProductoController::class, 'actualizar'])->name('producto.actualizar');
        Route::get('/productos/exportar', [ProductoController::class, 'exportar'])->name('producto.exportar');
        Route::get('/productos/pdf/{id}', [ProductoController::class, 'pdf'])->name('producto.pdf');
        Route::get('/productos/pdf', [ProductoController::class, 'pdfAll'])->name('productoall.pdf');
        //Cliente Admin
        Route::get('/clientes', [ClienteAdmController::class, 'index'])->name('clienteadm.index');
        Route::get('/clientes/nuevo', [ClienteAdmController  ::class, 'nuevo'])->name('clienteadm.nuevo');
        Route::post('/clientes/guardar', [ClienteAdmController::class, 'guardar'])->name('clienteadm.guardar');
        Route::get('/clientes/editar/{id}', [ClienteAdmController::class, 'detalle'])->name('clienteadm.editar');
        Route::get('/clientes/eliminar/{id}', [ClienteAdmController::class, 'eliminar'])->name('clienteadm.eliminar');
        Route::get('/clientes/reset/{id}', [ClienteAdmController::class, 'reset'])->name('clienteadm.reset');
        Route::post('/clientes/actualizar', [ClienteAdmController::class, 'actualizar'])->name('clienteadm.actualizar');
        Route::get('/clientes/exportar', [ClienteAdmController::class, 'exportar'])->name('clienteadm.exportar');
        //Ventas Admin
        Route::get('/ventas', [VentaController::class, 'index'])->name('venta.index');
        Route::get('/ventas/detalle/{id}', [VentaController::class, 'detalle'])->name('venta.detalle');
        Route::get('/ventas/entregado/{id}', [VentaController::class, 'entregado'])->name('venta.entregado');
        Route::get('/ventas/pagado/{id}', [VentaController::class, 'pagado'])->name('venta.pago');
        Route::get('/ventas/anular/{id}', [VentaController::class, 'anulado'])->name('venta.anulado');
        Route::get('/ventas/exportar', [VentaController::class, 'exportar'])->name('venta.exportar');





    });
});