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

Route::get('/', function () {
    return view('welcome');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//RUTAS DEL ADMINISTRADOR
Route::group(['prefix' => 'admin'], function () {

	//Panel principal Administrador.
	Route::get('/','Admin\AdminController@index');

	//Rutas de los Usuarios
	Route::resource('user', 'Admin\UserController', ['names' => [
		'index' => 'admin.user.index',
		'create' => 'admin.user.create',
		'store' => 'admin.user.store',
		'destroy' => 'admin.user.destroy',
		'show' => 'admin.user.show',
		'edit' => 'admin.user.edit',
		'update' => 'admin.user.update',
    ]]);
    Route::post('user/activar/{user}',[
        'uses'  =>'Admin\UserController@activar',
        'as'    =>'admin.user.activar'
      ]);
      Route::post('user/pw',[
        'uses'  =>'Admin\UserController@pw',
        'as'    =>'admin.user.pw'
      ]);
      Route::put('user/pw_save/{user}',[
        'uses'  =>'Admin\UserController@pw_save',
        'as'    =>'admin.user.pw_save'
      ]);

});

Route::get('/carrera', 'Carrera_Controller@index');

