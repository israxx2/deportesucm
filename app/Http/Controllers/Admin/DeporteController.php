<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use App\User;
use App\Carrera;
use App\Deporte;
use Illuminate\Support\Collection as Collection;

class DeporteController extends Controller
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

    public function borrados()
    {
        //retorna todos los usuarios (hasta los borrados logicamente)
        //ordenados por id
        $deporte = Deporte::withTrashed()->
        orderBy('id', 'ASC')->get();
        $deportesOnlyTrashed = Deporte::onlyTrashed()
        ->get();

        //Se pasa la variable users a la vista
        return view('admin.deporte.borrados')
        ->with('deporte', $deporte)
        ->with('deportesOnlyTrashed', $deportesOnlyTrashed);
    }

    public function index()
    {
        //retorna todos los deportes (hasta los borrados logicamente)
        //ordenados por id
        
        $deporte = Deporte:: orderBy('id', 'ASC')->get();
        $deportesOnlyTrashed = Deporte::onlyTrashed()
        ->get();
        //Se pasa la variable users a la vista
        return view('admin.deporte.index')
        ->with('deporte', $deporte)
        ->with('deportesOnlyTrashed', $deportesOnlyTrashed);
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('admin.deporte.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $deporte = new Deporte();
        $deporte->nombre = $request->nombre;
        $deporte->descripcion = $request->descripcion;
        $deporte->icon = $request->icono;

        $deporte->save();

        return Redirect(Route('admin.deporte.index'));

    }

    public function show($id)
    {
        //controlador usado para ver los detalles de un deporte en especifico.
        $deporte = Deporte::find($id);
        return view('admin.deporte.show')
        ->with('deporte', $deporte);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        $deporte = Deporte::find($id);
       
        return view('admin.deporte.edit')
        ->with('deporte', $deporte);
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
        $deporte = Deporte::find($id);
        $deporte->nombre = strtoupper($request->nombre);
        $deporte->descripcion = strtoupper($request->descripcion);
        $deporte->icon = $request->icono;
  
        $deporte->save();

        return Redirect(Route('admin.deporte.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deporte = Deporte::find($id);
        $deporte->delete();
        $deporte->save();

        return Redirect(Route('admin.deporte.index'));
    }

    public function activar($id)
    {
        $deporte = Deporte::withTrashed()
        ->where('id', '=', $id)
        ->restore();

        return Redirect(Route('admin.deporte.index'));
    }

    //Eliminar usuario de la base de datos
     public function destroy_force($id)
     {
         Deporte::where('id',$id)->forceDelete();
         return Redirect(route('admin.deporte.borrados'));
     }
    
     //Borrar Varios usuarios de la base de datos.
     public function deleteall(Request $request)
     {
        $ids = $request->ids;
        Deporte::whereIn('id',explode(",",$ids))->forceDelete();
        return response()->json(['status'=>true,'message'=>"Usuarios Borrados Correctamente."]);
    
    
     }
    
    //Borrar Varios usuarios logicamente.
    public function softdeleteAll(Request $request)
    {
         dd("llegó");
        $ids = $request->ids;
        Deporte::whereIn('id',explode(",",$ids))->forceDelete();
        return response()->json(['status'=>true,'message'=>"Usuarios Borrados Correctamente."]);
    
    
    }


}
