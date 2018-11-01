<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use App\User;
use App\Carrera;
use App\Equipo;

class CarreraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(){
        $this->middleware('usuarioAdmin',['only'=>['index']]);
        $this->middleware('usuarioAdmin',['only'=>['create']]);
        $this->middleware('usuarioAdmin',['only'=>['store']]);
        $this->middleware('usuarioAdmin',['only'=>['edit']]);
        $this->middleware('usuarioAdmin',['only'=>['update']]);
        $this->middleware('usuarioAdmin',['only'=>['destroy']]);
        $this->middleware('usuarioAdmin',['only'=>['activar']]);

    }

    public function index()
    {
        //retorna todos los carrera (hasta los borrados logicamente)
        //ordenados por id
        
        $carreras = Carrera::withTrashed()->
        orderBy('id', 'ASC')->get();
        //Se pasa la variable users a la vista
        return view('admin.carreras.index')
        ->with('carreras', $carreras);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
        return view('admin.carreras.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $carreras = new Carrera();
        $carreras->nombre = $request->nombre;
        $carreras->save();

        return Redirect('admin/carrera/');

    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        $carrera = Carrera::find($id);
       
        return view('admin.carreras.edit')
        ->with('carrera', $carrera);
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
        $carrera = Carrera::find($id);
        $carrera->nombre = strtoupper($request->nombre);
  
        $carrera->save();

        return Redirect('/admin/carrera/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $carrera = Carrera::find($id);
        $carrera->delete();
        $carrera->save();

        return Redirect('admin/carrera');
    }

    public function activar($id)
    {
        $carrera = Carrera::withTrashed()
        ->where('id', '=', $id)
        ->restore();

        return Redirect('admin/carrera');
    }
}
