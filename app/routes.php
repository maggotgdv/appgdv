<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', 'UsuariosController@index');
Route::get('principal', 'UsuariosController@principal');
Route::get('tu-perfil', 'UsuariosController@tuperfil');
Route::get('promociones', 'UsuariosController@promociones');
Route::get('/eliminar/{id}', 'UsuariosController@eliminar');
Route::get('/recuperarContrasena', 'UsuariosController@recuperarContrasena');
Route::get('/categoria', 'NuevaCategoriaController@index');
Route::get('/empresa', 'NuevaEmpresaController@index');
Route::get('producto', 'UsuariosController@producto');
Route::get('/eliminarPro/{id}', 'UsuariosController@eliminarPro');

Route::post('/validar', 'UsuariosController@post_validar');
Route::post('principal', 'UsuariosController@post_guardarPrincipal');
Route::post('tu-perfil', 'UsuariosController@post_guardarTuPerfil');
Route::post('promociones', 'UsuariosController@post_guardarPromociones');
Route::post('/recuperarContrasena', 'UsuariosController@post_recuperarContrasena');
Route::post('/categoria', 'NuevaCategoriaController@store');
Route::post('/empresa', 'NuevaEmpresaController@store');
Route::group(['prefix' => 'includes'],function()
{
	Route::get("/",array('before'=>'header_get', function() {
	    ob_start();
	    require(path("public/includes")."api.php");
	    return ob_get_clean();
	}));
	Route::get("/",array('before'=>'header_get', function() {
	    ob_start();
	    require(path("public/includes")."apiProductos.php");
	    return ob_get_clean();
	}));
	Route::get("/",array('before'=>'header_get', function() {
	    ob_start();
	    require(path("public/includes")."config.php");
	    return ob_get_clean();
	}));
	Route::get("/",array('before'=>'header_get', function() {
	    ob_start();
	    require(path("public/includes")."configProductos.php");
	    return ob_get_clean();
	}));
	Route::get("/",array('before'=>'header_get', function() {
	    ob_start();
	    require(path("public/includes")."functions.php");
	    return ob_get_clean();
	}));
	Route::get("/",array('before'=>'header_get', function() {
	    ob_start();
	    require(path("public/includes")."imgPicker.php");
	    return ob_get_clean();
	}));
	Route::post("/",array('before'=>'header_post2','uses'=>  function() {
	     ob_start();
	    require(path("public/includes")."api.php");
	    return ob_get_clean();
	}));
	Route::post("/",array('before'=>'header_post','uses'=>  function() {
	    ob_start();
	    require(path("public/includes")."apiProductos.php");
	    return ob_get_clean();
	}));
	Route::post("/",array('before'=>'header_post','uses'=>  function() {
	    ob_start();
	    require(path("public/includes")."config.php");
	    return ob_get_clean();
	}));
	Route::post("/",array('before'=>'header_post','uses'=>  function() {
	    ob_start();
	    require(path("public/includes")."configProductos.php");
	    return ob_get_clean();
	}));
	Route::post("/",array('before'=>'header_post','uses'=>  function() {
	    ob_start();
	    require(path("public/includes")."functions.php");
	    return ob_get_clean();
	}));
	Route::post("/",array('before'=>'header_post','uses'=>  function() {
	    ob_start();
	    require(path("public/includes")."imgPicker.php");
	    return ob_get_clean();
	}));
});
Route::group(['prefix' => 'assets/js'],function()
{
	Route::get("/",array('before'=>'header_get', function() {
	    ob_start();
	    require(path("public/assets/js")."imgPicker.js");
	    return ob_get_clean();
	}));
	Route::get("/",array('before'=>'header_get', function() {
	    ob_start();
	    require(path("public/assets/js")."imgPicker.min.js");
	    return ob_get_clean();
	}));
	Route::get("/",array('before'=>'header_get', function() {
	    ob_start();
	    require(path("public/assets/js")."jquery-1.11.0.min.js");
	    return ob_get_clean();
	}));
	Route::post("/",array('before'=>'header_post','uses'=>  function() {
	    ob_start();
	    require(path("public/assets/js")."imgPicker.js");
	    return ob_get_clean();
	}));
	Route::post("/",array('before'=>'header_post','uses'=>  function() {
	    ob_start();
	    require(path("public/assets/js")."imgPicker.min.js");
	    return ob_get_clean();
	}));
	Route::post("/",array('before'=>'header_post','uses'=>  function() {
	    ob_start();
	    require(path("public/assets/js")."jquery-1.11.0.min.js");
	    return ob_get_clean();
	}));
});

Route::group(['prefix' => 'app'],function()
{
	Route::get('categorias', array('before'=>'header_get','uses'=>'CategoriasController@index'));
	Route::get('categorias/{id}', array('before'=>'header_get','uses'=>'CategoriasController@show'));
	Route::get('buscar/{id}',array('before'=>'header_get','uses'=>'BuscarController@show'));
	Route::get('local/{id}',array('before'=>'header_get','uses'=> 'LocalController@show'));
	Route::get('catselect/{id}/{limite}/{latitud}/{longitud}',array('before'=>'header_get','uses'=> 'CategoriaSeleccionadoController@index'));
	Route::get('catselect/{limite}/{latitud}/{longitud}',array('before'=>'header_get','uses'=> 'CategoriaSeleccionadoController@show'));
	Route::get('productos/{id}',array('before'=>'header_get','uses'=> 'ProductosController@show'));
	Route::get('comentarios/{id}',array('before'=>'header_get','uses'=>  'ComentariosController@show'));
	Route::get('promociones/{id}',array('before'=>'header_get','uses'=>  'PromocionesController@show'));
	Route::get('promociones',array('before'=>'header_get','uses'=>  'PromocionesController@index'));
	Route::get('informacion/{id}',array('before'=>'header_get','uses'=>  'InformacionController@show'));
	Route::post('comentarios/{id}/{titulo}/{descripcion}/{valoracion}',array('before'=>'header_post','uses'=>  'ComentariosController@store'));
	Route::post('favoritos/{id}',array('before'=>'header_post','uses'=>  'FavoritosController@store'));
	Route::post('visitas/{id}',array('before'=>'header_post','uses'=>  'VisitasController@store'));
});
App::missing(function($exception)
{
    return Response::view('mensajeError404', array(), 404);
});