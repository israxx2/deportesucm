<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use App\User;
use App\Carrera;
use App\Equipo;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function borrados()
    {
        //retorna todos los usuarios (hasta los borrados logicamente)
        //ordenados por id

        $users = User::withTrashed()->
        orderBy('id', 'ASC')->get();

        $usersOnlyTrashed = User::onlyTrashed()
        ->get();

        //Se pasa la variable users a la vista
        return view('admin.users.index')
        ->with('users', $users)
        ->with('usersOnlyTrashed', $usersOnlyTrashed);
    }

    public function index()
    {
        //retorna todos los usuarios (hasta los borrados logicamente)
        //ordenados por id

        $users = User::withTrashed()->
        orderBy('id', 'ASC')->get();

        $usersOnlyTrashed = User::onlyTrashed()
        ->get();

        //Se pasa la variable users a la vista
        return view('admin.users.borrados')
        ->with('users', $users)
        ->with('usersOnlyTrashed', $usersOnlyTrashed);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //para crear un usuario se necesita asignarle una carrera a este,
        //es por ello que se debe pasar las carreras a la vista para visualizarlas
        //con un <select>
        $carreras= Carrera::orderBy('nombre', 'ASC')
        ->get();
        return view('admin.users.create')
        ->with('carreras', $carreras);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $user = new User();
        $user->nombres = strtoupper($request->nombres);
        $user->apellidos = strtoupper($request->apellidos);
        $user->email = $request->email;
        $user->carrera_id = $request->carrera_id;
        $user->password = bcrypt($request->password);
        $user->save();

        return Redirect('/user/');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //controlador usado para ver los detalles de un usuario en especifico.
        $user = User::find($id);
        return view('admin.users.show')
        ->with('user', $user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $carreras= Carrera::orderBy('nombre', 'ASC')
        ->pluck('nombre','id');

        $tipo = ['estudiante' => 'estudiante', 'admin' => 'admin'];

        return view('admin.users.edit')
        ->with('user', $user)
        ->with('tipo', $tipo)
        ->with('carreras', $carreras);
    }

    public function pw(Request $request)
    {
        $user = User::find($request->user_id);
        return view('admin.users.pw')
        ->with('user', $user);
    }

    public function pw_save(Request $request, $id)
    {
        $user = User::find($id);
        $user->password = bcrypt($request->password);
        $user->save();

        return Redirect('/admin/user/'.$id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $user->nombres = strtoupper($request->nombres);
        $user->apellidos = strtoupper($request->apellidos);
        $user->email = $request->email;
        $user->carrera_id = $request->carrera_id;

        $user->tipo = $request->tipo;

        $user->save();

        return Redirect('/admin/user/'.$user->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        $user->save();

        return Redirect('/user');
    }

    public function activar($id)
    {
        $user = User::withTrashed()
        ->where('id', '=', $id)
        ->restore();

        return Redirect('/user');
    }
}
