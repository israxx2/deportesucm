<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use App\User;
use App\Modalidad;
use App\Deporte;

class ModalidadController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //retorna todos los modalidades (hasta los borrados logicamente)
        //ordenados por id

        $modalidad = Modalidad::withTrashed()->
        orderBy('id', 'ASC')->get();
        //Se pasa la variable users a la vista
        return view('admin.modalidad.index')
        ->with('modalidad', $modalidad);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $deportes = Deporte::all();
        return view('admin.modalidad.create')
        ->with('deportes',$deportes);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $modalidad = new Modalidad();
        $modalidad->deporte_id = $request->deporte;
        $modalidad->nombre = $request->nombre;
        $modalidad->descripcion = $request->descripcion;
        $modalidad->min = $request->minimo;
        $modalidad->max = $request->maximo;

        $modalidad->save();

        return Redirect('admin/modalidad/');

    }

    public function show($id)
    {
        //controlador usado para ver los detalles de un modalidad en especifico.
        $modalidad = Modalidad::find($id);
        return view('admin.modalidad.show')
        ->with('modalidad', $modalidad);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $modalidad = Modalidad::find($id);

        return view('admin.modalidad.edit')
        ->with('modalidad', $modalidad);
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
        $modalidad = Modalidad::find($id);
        $modalidad->nombre = strtoupper($request->nombre);
        $modalidad->descripcion = strtoupper($request->descripcion);
        $modalidad->min = strtoupper($request->minimo);
        $modalidad->max = strtoupper($request->maximo);

        $modalidad->save();

        return Redirect('/admin/modalidad/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $modalidad = Modalidad::find($id);
        $modalidad->delete();
        $modalidad->save();

        return Redirect('admin/modalidad');
    }

    public function activar($id)
    {
        $modalidad = Modalidad::withTrashed()
        ->where('id', '=', $id)
        ->restore();

        return Redirect('admin/modalidad');
    }



}
