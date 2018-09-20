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
    public function index()
    {
        //retorna todos los usuarios (hasta los borrados logicamente)
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

        return Redirect('/admin/carrera/');

    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        $carreras= Carrera::orderBy('nombre', 'ASC')
        ->pluck('nombre','id');
        dd($carreras);  
        return view('admin.carreras.edit')
        ->with('carreras', $carreras);
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
        $carrera->nombre = strtoupper($request->nombres);
  
        $carrera->save();

        return Redirect('/admin/carreras/'.$carrera->id);
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

        return Redirect('/admin/carrera');
    }

    public function activar($id)
    {
        $carrera = Carrera::withTrashed()
        ->where('id', '=', $id)
        ->restore();

        return Redirect('/admin/carrera');
    }
}
