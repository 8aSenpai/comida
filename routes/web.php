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

Route::get('/', 'WelcomeController@index')->name('welcome'); 
 

Route::get('/home', 'HomeController@index')->name('home'); 
Route::get('/agregar_carrito/{item}', 'CarritoController@agregar')->name('add_cart'); 
Route::get('/producto/menu_nl=2019{item}', 'ProductoController@view')->name('producto');
Route::get('/carrito', 'CarritoController@view')->name('carrito');
Route::get('/descartar/it_desc=2019{item}', 'CarritoController@descartar')->name('descartar');
Route::get('/confirmar_pedido', 'CarritoController@confirm')->name('confirm');
Route::get('/pedido_confirmado/{item}', 'CarritoController@confirmed')->name('confirmed');
Route::get('/Estado_ordenes', 'EstadoController@view')->name('ordenes');
Route::get('/acerca_de', 'DatosGeneralesController@acerca_de')->name('acerca.de');
Route::get('/terminos_de_uso', 'DatosGeneralesController@terminos_uso')->name('terminos.uso');
Route::get('/politicas_de_privacidad', 'DatosGeneralesController@politicas_privacidad')->name('politicas.privacidad');
Route::get('/contacto', 'DatosGeneralesController@contacto')->name('contacto');

Route::get('admin/agregar_producto', 'RegProductoController@view')->name('Addprod');
Route::post('admin/subiendo_producto', 'RegProductoController@upload')->name('upprod');
Route::get('admin/lista_producto', 'RegProductoController@list')->name('listprod');
Route::get('admin/editar_producto/{item}', 'RegProductoController@modificar')->name('editar_producto');
Route::post('admin/actualizar_producto/{item}', 'RegProductoController@actualizar')->name('actualizar_producto');
Route::get('admin/productos_desactivados', 'RegProductoController@desactivados')->name('desactivados');
Route::get('admin/activar/{item}', 'RegProductoController@activar')->name('activar');
Route::get('admin/categorias', 'CategoriaController@index')->name('supcategoria');
Route::post('admin/actualizar_categoria/{item}', 'CategoriaController@actualizar')->name('actualizarcat');
Route::post('admin/agregar_categoria', 'CategoriaController@agregar')->name('agregarcat');
Route::get('admin/adicionales', 'AdicionalesController@index')->name('adicionales');
Route::get('admin/ver_adicionales/{item}', 'AdicionalesController@ver')->name('veradicional');
Route::get('admin/borrar_adicional/{item}', 'AdicionalesController@borrar')->name('deladicional');
Route::post('admin/agregar_adicionales/{item}', 'AdicionalesController@agregar')->name('addadicional');

Route::get('admin/ordenes_activas', 'AdminOrdenesController@view')->name('admin_ordenes');
Route::get('admin/orden_lista/{dato}', 'AdminOrdenesController@lista')->name('ad_orden_lista');
Route::get('admin/orden_espera/{dato}', 'AdminOrdenesController@espera')->name('ad_orden_espera');
Route::get('admin/orden_cancelar/{dato}', 'AdminOrdenesController@cancelar')->name('ad_orden_cancel');

Route::get('admin/ordenes_anteriores', 'AdminOrdenesController@viewant')->name('admin_ordenes_anteriores');


Route::get('admin/menu_cobros', 'AdminCobrosController@view')->name('admin.menu.cobros');
Route::get('admin/cobro_efectivo', 'AdminCobrosController@viewefectivo')->name('admin.cobro.efectivo');
Route::get('admin/cobro_tarjeta', 'AdminCobrosController@viewtarjeta')->name('admin.cobro.tarjeta');
Route::get('admin/consulta_pago', 'AdminCobrosController@viewconsulta')->name('admin.cobro.consulta');
Route::get('admin/consulta_efectivo', 'AdminCobrosController@viewconsultaefectivo')->name('admin.cobro.consulta.efectivo');
Route::get('admin/consulta_tarjeta', 'AdminCobrosController@viewconsultatarjeta')->name('admin.cobro.consulta.tarjeta');
Route::post('admin/consulta_busqueda', 'AdminCobrosController@viewconsultabusqueda')->name('admin.cobro.consulta.busqueda');


Route::post('admin/guardar_pago_efectivo', 'AdminCobrosController@pagoefectivo')->name('admin.guardar.cobro.efectivo');
Route::post('admin/guardar_pago_tarjeta', 'AdminCobrosController@pagotarjeta')->name('admin.guardar.cobro.tarjeta');


Route::get('admin/visuales', 'VisualesController@vista')->name('admin.visuales');
Route::get('admin/admin_contacto', 'VisualesController@admincontacto')->name('admin.contacto');
Route::post('admin/guardar_visuales', 'VisualesController@guardar')->name('admin.visuales.guardar');