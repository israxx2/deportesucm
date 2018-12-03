<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Response;
use App\User;
use App\Partido;
use App\Equipo;
use Illuminate\Support\Collection as Collection;

class PartidoController extends Controller
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
        $partido = Partido::withTrashed()->
        orderBy('id', 'ASC')->get();
        $equipos1 = Equipo::orderBy('id', 'ASC')->get();
        $partidosOnlyTrashed = Partido::onlyTrashed()
        ->get();

        //Se pasa la variable users a la vista
        return view('admin.partido.borrados')
        ->with('partido', $partido)
        ->with('equipos1', $equipos1)
        ->with('partidosOnlyTrashed', $partidosOnlyTrashed);
    }

    public function index()
    {
        //retorna todos los usuarios (hasta los borrados logicamente)
        //ordenados por id

        $partido = Partido::orderBy('id', 'ASC')->get();
        $equipos1 = Equipo::orderBy('id', 'ASC')->get();
        $partidosOnlyTrashed =Partido::onlyTrashed()
        ->get();
        

        //Se pasa la variable users a la vista
        return view('admin.partido.index')
        ->with('partido', $partido)
        ->with('equipos1', $equipos1)
        ->with('partidosOnlyTrashed', $partidosOnlyTrashed);
    }

    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $equipos = Equipo::all();
        return view('admin.partido.create')->with(compact('partido','equipos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       

        $partido = new Partido();
        $partido->local_id = $request->local;
        $partido->visita_id = $request->visita;
        $partido->puntos_local = $request->puntos_local;
        $partido->puntos_visita = $request->puntos_visita;
        $partido->ganador_id = $request->ganador;

        $partido->save();

        return Redirect('admin/partido/');

    }

    public function show($id)
    {
        //controlador usado para ver los detalles de un partido en especifico.
        $partido = Partido::find($id);
        return view('admin.partido.show')
        ->with('partido', $partido);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        $partido = Partido::find($id);
        $equipos = Equipo::all();
       
        return view('admin.partido.edit')
        ->with(compact('partido','equipos'));
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
        $partido = Partido::find($id);
        $partido->local_id = strtoupper($request->local);
        $partido->visita_id = strtoupper($request->visita);
        $partido->puntos_local = strtoupper($request->puntos_local);
        $partido->puntos_visita = strtoupper($request->puntos_visita);
        $partido->ganador_id = strtoupper($request->ganador);
  
        $partido->save();

        return Redirect('/admin/partido/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $partido = Partido::find($id);
        $partido->delete();
        $partido->save();
        return Redirect(route('admin.partido.index'));
    }

    public function activar($id)
    {
        $partido = Partido::withTrashed()
        ->where('id', '=', $id)
        ->restore();

        return Redirect(route('admin.partido.index'));

    }

    //Eliminar usuario de la base de datos
    public function destroy_force($id)
    {
        PArtido::where('id',$id)->forceDelete();
        return Redirect(route('admin.partido.borrados'));
    }

    //Borrar Varios usuarios de la base de datos.
    public function deleteall(Request $request)
    {
        $ids = $request->ids;
        Partido::whereIn('id',explode(",",$ids))->forceDelete();
        return response()->json(['status'=>true,'message'=>"PArtidos Borrados Correctamente."]);


    }

    //Borrar Varios usuarios logicamente.
    public function softdeleteAll(Request $request)
    {
        dd("llegó");
        $ids = $request->ids;
        Partido::whereIn('id',explode(",",$ids))->forceDelete();
        return response()->json(['status'=>true,'message'=>"PArtido Borrados Correctamente."]);


    }



}
