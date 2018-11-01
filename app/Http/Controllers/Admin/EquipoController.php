<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use App\User;
use App\Carrera;
use App\Equipo;
use App\Modalidad;

class EquipoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(){
        $this->middleware('usuarioAdmin',['only'=>['index']]);
        $this->middleware('usuarioAdmin',['only'=>['create']]);
        $this->middleware('usuarioAdmin',['only'=>['show']]);
        $this->middleware('usuarioAdmin',['only'=>['store']]);
        $this->middleware('usuarioAdmin',['only'=>['edit']]);
        $this->middleware('usuarioAdmin',['only'=>['update']]);
        $this->middleware('usuarioAdmin',['only'=>['destroy']]);
        $this->middleware('usuarioAdmin',['only'=>['activar']]);
        

    }
    public function index()
    {
        //retorna todos los equipos (hasta los borrados logicamente)
        //ordenados por id
        
        $equipo = Equipo::withTrashed()->
        orderBy('id', 'ASC')->get();
        //Se pasa la variable users a la vista
        return view('admin.equipo.index')
        ->with('equipo', $equipo);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $modalidades = Modalidad::all();
        return view('admin.equipo.create')->with(compact('equipo','modalidades'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $equipo = new Equipo();
        $equipo->nombre = $request->nombre;
        $equipo->descripcion = $request->descripcion;
        $equipo->modalidad_id = $request->modalidad;
        $equipo->conformado = 2; #nose aun que añadir aqui

        $equipo->save();

        return Redirect('admin/equipo/');

    }

    public function show($id)
    {
        //controlador usado para ver los detalles de un equipo en especifico.
        $equipo = Equipo::find($id);
        return view('admin.equipo.show')
        ->with('equipo', $equipo);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        $equipo = Equipo::find($id);
       
        return view('admin.equipo.edit')
        ->with('equipo', $equipo);
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
        $equipo = Equipo::find($id);
        $equipo->nombre = strtoupper($request->nombre);
        $equipo->descripcion = strtoupper($request->descripcion);
  
        $equipo->save();

        return Redirect('/admin/equipo/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $equipo = Equipo::find($id);
        $equipo->delete();
        $equipo->save();

        return Redirect('admin/equipo');
    }

    public function activar($id)
    {
        $equipo = Equipo::withTrashed()
        ->where('id', '=', $id)
        ->restore();

        return Redirect('admin/equipo');
    }


}
