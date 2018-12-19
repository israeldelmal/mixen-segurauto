<?php
// Web
Route::get('/', 'WebController@index')->name('/');
Route::get('/noticias/{slug}', 'WebController@blog_show');
Route::post('/contacto', 'WebController@contact');
// Autenticación
Route::prefix('autenticacion')->group(function() {
	Route::get('/', 'AuthController@index')->name('autenticacion');
	Route::post('/crear', 'AuthController@create');
	Route::post('/autenticar', 'AuthController@auth');
	Route::get('/cerrar-sesion', 'AuthController@logout');
});
// Escritorio
Route::prefix('escritorio')->middleware('user.status')->group(function() {
	// Index
	Route::get('/', 'DashboardController@index')->name('escritorio');
	// Usuarios
	Route::prefix('usuarios')->group(function() {
		Route::get('/', 'DashboardController@users')->name('escritorio/usuarios');
		Route::get('/editar/{id}', 'DashboardController@users_edit')->name('escritorio/editar');
		Route::get('/actualizar/{id}', 'DashboardController@users_update');
	});
	// Usuario
	Route::get('/usuario/{id}', 'DashboardController@user');
	Route::post('/usuario/actualizar/{id}', 'DashboardController@user_update');
	// Home
	Route::get('/cabecera', 'DashboardController@header')->name('escritorio/cabecera');
	Route::post('/cabecera/actualizar/{id}', 'DashboardController@header_update');
	Route::get('/descanso', 'DashboardController@break')->name('escritorio/descanso');
	Route::post('/descanso/actualizar/{id}', 'DashboardController@break_update');
	Route::get('/nosotros', 'DashboardController@about')->name('escritorio/nosotros');
	Route::post('/nosotros/actualizar/{id}', 'DashboardController@about_update');
	// Artículos
	Route::prefix('articulos')->group(function() {
		Route::get('/', 'DashboardController@articles')->name('escritorio/articulos');
		Route::get('/crear', 'DashboardController@articles_create')->name('escritorio/articulos/crear');
		Route::post('/almacenar', 'DashboardController@articles_store');
		Route::get('/editar/{id}', 'DashboardController@articles_edit')->name('escritorio/articulos/editar');
		Route::post('/actualizar/{id}', 'DashboardController@articles_update');
	});
	// Métodos de pago
	Route::prefix('metodos')->group(function() {
		Route::get('/', 'DashboardController@payments')->name('escritorio/metodos');
		Route::get('/crear', 'DashboardController@payments_create')->name('escritorio/metodos/crear');
		Route::post('/almacenar', 'DashboardController@payments_store');
		Route::get('/editar/{id}', 'DashboardController@payments_edit')->name('escritorio/metodos/editar');
		Route::post('/actualizar/{id}', 'DashboardController@payments_update');
	});
});