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
Route::get('auth/{provider}', 'Auth\LoginController@redirectToProvider');
Route::get('auth/{provider}/callback', 'Auth\LoginController@handleProviderCallback');


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
            Route::post('user/lineatiempo/{user}', [
              'as'=>'admin.user.lineatiempo',
              'uses'=>'Admin\UserController@lineatiempo']);

            Route::post('user/destroy_force/{user}', [
              'as'=>'admin.user.destroy_force',
              'uses'=>'Admin\UserController@destroy_force']);

            Route::get('deleteall', [
              'as'=>'admin.user.deleteall',
              'uses'=>'Admin\UserController@deleteall']);

            Route::post('softdeleteall', [
            'as'=>'admin.user.softdeleteall',
            'uses'=>'Admin\UserController@softdeleteAll']
            );

            Route::get('userTrashed',[
                'uses'  =>'Admin\UserController@borrados',
                'as'    =>'admin.user.borrados'
              ]);
            Route::get('user/activar/{user}',[
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

            Route::post('user/aa/filtro1',[
                'uses'  =>'Admin\UserController@filtro1',
                'as'    =>'admin.user.filtro1'
              ]);

            Route::post('user/aa/filtro2',[
            'uses'  =>'Admin\UserController@filtro2',
            'as'    =>'admin.user.filtro2'
            ]);

      //Rutas de las Carreras
          Route::resource('carrera', 'Admin\CarreraController', ['names' => [
            'index' => 'admin.carrera.index',
            'create' => 'admin.carrera.create',
            'store' => 'admin.carrera.store',
            'destroy' => 'admin.carrera.destroy',
            'show' => 'admin.carrera.show',
            'edit' => 'admin.carrera.edit',
            'update' => 'admin.carrera.update',
            ]]);
            Route::post('carrera/activar/{carrera}',[
              'uses'  =>'Admin\CarreraController@activar',
              'as'    =>'admin.carrera.activar'
            ]);
       //Rutas de los Equipos
            Route::resource('equipo', 'Admin\EquipoController', ['names' => [
              'index' => 'admin.equipo.index',
              'create' => 'admin.equipo.create',
              'store' => 'admin.equipo.store',
              'destroy' => 'admin.equipo.destroy',
              'show' => 'admin.equipo.show',
              'edit' => 'admin.equipo.edit',
              'update' => 'admin.equipo.update',
              ]]);

              Route::post('equipo/activar/{equipo}',[
                'uses'  =>'Admin\EquipoController@activar',
                'as'    =>'admin.equipo.activar'
              ]);
       //Rutas de las modalidades
       Route::resource('modalidad', 'Admin\ModalidadController', ['names' => [
        'index' => 'admin.modalidad.index',
        'create' => 'admin.modalidad.create',
        'store' => 'admin.modalidad.store',
        'destroy' => 'admin.modalidad.destroy',
        'show' => 'admin.modalidad.show',
        'edit' => 'admin.modalidad.edit',
        'update' => 'admin.modalidad.update',
        ]]);

        Route::post('modalidad/activar/{modalidad}',[
          'uses'  =>'Admin\ModalidadController@activar',
          'as'    =>'admin.modalidad.activar'
        ]);
          // Rutas de los partidos
        Route::resource('partido', 'Admin\PartidoController', ['names' => [
          'index' => 'admin.partido.index',
          'create' => 'admin.partido.create',
          'store' => 'admin.partido.store',
          'destroy' => 'admin.partido.destroy',
          'show' => 'admin.partido.show',
          'edit' => 'admin.partido.edit',
          'update' => 'admin.partido.update',
          ]]);

          Route::post('partido/activar/{partido}',[
            'uses'  =>'Admin\PartidoController@activar',
            'as'    =>'admin.partido.activar'

          ]);

        // Rutas de los deportes
        Route::resource('deporte', 'Admin\DeporteController', ['names' => [
          'index' => 'admin.deporte.index',
          'create' => 'admin.deporte.create',
          'store' => 'admin.deporte.store',
          'destroy' => 'admin.deporte.destroy',
          'show' => 'admin.deporte.show',
          'edit' => 'admin.deporte.edit',
          'update' => 'admin.deporte.update',
          ]]);

          Route::post('deporte/activar/{deporte}',[
            'uses'  =>'Admin\DeporteController@activar',
            'as'    =>'admin.deporte.activar'
          ]);

        Route::resource('torneo', 'Admin\TorneoController', ['names' => [
            'index' => 'admin.torneo.index',
            'create' => 'admin.torneo.create',
            'store' => 'admin.torneo.store',
            'destroy' => 'admin.torneo.destroy',
            'show' => 'admin.torneo.show',
            'edit' => 'admin.torneo.edit',
            'update' => 'admin.torneo.update',
            ]]);

            Route::post('torneo/activar/{torneo}',[
              'uses'  =>'Admin\TorneoController@activar',
              'as'    =>'admin.torneo.activar'
            ]);
            Route::get('torneo/incribir/{torneo}',[
              'uses'  =>'Admin\TorneoController@inscripcion',
              'as'    =>'admin.torneo.inscripcion'
            ]);
            Route::post('torneo/inscrito/{torneo}',[
              'uses'  =>'Admin\TorneoController@inscribir',
              'as'    =>'admin.torneo.inscribir'
            ]);
});

Route::group(['prefix' => 'e'], function () {
    Route::get('inicio', [
        'uses' => 'Estudiante\EstudianteController@inicio',
        'as' => 'estudiante.inicio'
    ]);
    Route::get('perfil', [
        'uses' => 'Estudiante\EstudianteController@perfil',
        'as' => 'estudiante.perfil'
    ]);
    //VER DEPORTE
    Route::get('deporte/{id}', [
        'uses' => 'Estudiante\EstudianteController@deporte_show',
        'as' => 'estudiante.deportes.show'
    ]);
    //VER MODALIDAD DEL DEPORTE
    Route::get('mod/{id}', [
        'uses' => 'Estudiante\EstudianteController@modalidad_show',
        'as' => 'estudiante.modalidades.show'
    ]);

    //CREAR UN EQUIPO
    Route::post('equipo', [
        'uses' => 'Estudiante\EstudianteController@equipo_store',
        'as' => 'estudiante.equipo.store'
    ]);

    //VER EQUIPOS
    Route::get('equipos/', [
        'uses' => 'Estudiante\EstudianteController@equipos',
        'as' => 'estudiante.equipos'
    ]);

    //VER UN EQUIPO
    Route::get('equipos/{id}', [
        'uses' => 'Estudiante\EstudianteController@equipo_show',
        'as' => 'estudiante.equipos.show'
    ]);

    //FILTRO DE equipos por modalidad
    Route::get('deporte/{id}/filtro_equipo' , [
        'uses'  =>'Estudiante\EstudianteController@filtro_equipo',
        'as'    =>'estudiante.filtro_equipo'
     ]);

    //Ver equipo por modalidad
    Route::get('equipomod/{id}', [
      'uses' => 'Estudiante\EstudianteController@equipoMod_show',
      'as' => 'estudiante.equipoMod.show'
    ]);

    

});
