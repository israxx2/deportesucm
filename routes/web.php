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

          Route::resource('reclamo','Admin\ReclamosController', ['names' => [
            'index' => 'admin.reclamo.index',
            'destroy' => 'admin.reclamo.destroy',
            'estado'=> 'admin.reclamo.estado',
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

    //VER MIS PARTIDOS
    Route::get('partidos/', [
      'uses' => 'Estudiante\EstudianteController@partidos',
      'as' => 'estudiante.partidos'
    ]);

    Route::resource('invitacion', 'estudiante\InvitacionController', ['names' => [
      'index' => 'estudiante.invitaciones.index',
      'create' => 'estudiante.invitaciones.create',
      'store' => 'estudiante.invitaciones.store',
      'destroy' => 'estudiante.invitaciones.destroy',
      'show' => 'estudiante.invitaciones.show',
      'edit' => 'estudiante.invitaciones.edit',
      'update' => 'estudiante.invitaciones  .update',
      ]]);
    //Aceptar una invitacion
    Route::post('invitacion/aceptar/{id}', [
    'uses' => 'estudiante\InvitacionController@aceptar',
    'as' => 'estudiante.invitaciones.aceptar'
    ]);
    //realizar invitacion publica
    Route::post('store_pu', [
    'uses' => 'estudiante\InvitacionController@store_pu',
    'as' => 'estudiante.invitaciones.store_pu'
    ]);
    //ver invitaciones publicas
    Route::get('publico', [
      'uses' => 'estudiante\InvitacionController@publico',
      'as' => 'estudiante.invitaciones.publico'
    ]);
    //VER EQUIPOS
    Route::get('equipos/', [
        'uses' => 'Estudiante\EstudianteController@equipos',
        'as' => 'estudiante.equipos'
    ]);
   //VER UN EQUIPO
   Route::POST('equi', [
    'uses' => 'Estudiante\EstudianteController@eq',
    'as' => 'estudiante.equipos2'
   ]);
      //aceptar a un jugador
      Route::post('equi/aceptar', [
        'uses' => 'Estudiante\EstudianteController@aceptar_soli'
       ]);
      //rechazar a un jugador
      Route::post('equi/rechazar', [
        'uses' => 'Estudiante\EstudianteController@rechazar_soli'
       ]);
     //eliminar a un jugador de un equipo
      Route::post('equi/eliminar', [
        'uses' => 'Estudiante\EstudianteController@eliminar_jugador',
        'as' => 'estudiante.eliminar'
       ]);

    //VER UN EQUIPO
    Route::get('equipos/{id}', [
        'uses' => 'Estudiante\EstudianteController@equipo_show',
        'as' => 'estudiante.equipos.show'
    ]);

    //FILTRO DE PARTIDOS POR MODALIDAD
    Route::post('partidos/filtro_deporte',[
      'uses'  =>'Estudiante\EstudianteController@filtro_deporte',
      'as'    =>'estudiante.filtro_deporte'
    ]);

    //Registrar  resultado (index)
    Route::get('registrar_resultado_index/',[
      'uses'  =>'Estudiante\EstudianteController@registrar_resultado_index',
      'as'    =>'estudiante.registrar_resultado_index'
    ]);

    //Registrar nuevo resultado (vista)
    Route::get('registrar_resultado/',[
      'uses'  =>'Estudiante\EstudianteController@registrar_resultado',
      'as'    =>'estudiante.registrar_resultado'
    ]);
     //Registrar nuevo resultado (store)
    Route::post('registrar_resultado_store/',[
          'uses'  =>'Estudiante\EstudianteController@registrar_resultado_store',
          'as'    =>'estudiante.registrar_resultado_store'
        ]);
      //RECLAMAR
    Route::post('reclamo/',[
      'uses'  =>'Estudiante\EstudianteController@reclamo',
      'as'    =>'estudiante.reclamo'
    ]);

    Route::get('comunidad/',[
      'uses'  =>'Estudiante\EstudianteController@show_all_equipos',
      'as'    =>'estudiante.show_all_equipos'
    ]);

    //solicitud de equipo
    Route::post('solicitud_equipo/',[
      'uses'  =>'Estudiante\EstudianteController@solicitud_equipo',
      'as'    =>'estudiante.solicitud_equipo'
    ]);

    //Abandonar un  equipo
    Route::post('abandonar_equipo/',[
      'uses'  =>'Estudiante\EstudianteController@abandonar_equipo',
      'as'    =>'estudiante.abandonar_equipo'
    ]);

    //show_partido
    Route::get('partido_show/{id}',[
        'uses'  =>'Estudiante\EstudianteController@partido_show',
        'as'    =>'estudiante.partido_show'
      ]);

    //index torneos
    Route::get('torneos',[
        'uses'  =>'Estudiante\TorneoController@index',
        'as'    =>'estudiante.torneos.index'
    ]);
    //show torneo
    Route::get('torneos/{id}',[
        'uses'  =>'Estudiante\TorneoController@show',
        'as'    =>'estudiante.torneos.show'
    ]);

    //ingresar torneo
    Route::post('torneos/ingresar',[
        'uses'  =>'Estudiante\TorneoController@ingresar',
        'as'    =>'estudiante.torneos.ingresar'
    ]);

    //darse de baja
    Route::post('torneos/baja',[
        'uses'  =>'Estudiante\TorneoController@baja',
        'as'    =>'estudiante.torneos.baja'
    ]);

});

Route::group(['prefix' => 'mod'], function () {

    Route::resource('torneos', 'Mod\TorneoController', [
        'names' => [
            'index' => 'mod.torneos.index',
            'create' => 'mod.torneos.create',
            'store' => 'mod.torneos.store',
            'show' => 'mod.torneos.show',
            'update' => 'mod.torneos.update',
            'edit' => 'mod.torneos.edit',
            'destroy' => 'mod.torneos.destroy',
        ]
    ]);

});
