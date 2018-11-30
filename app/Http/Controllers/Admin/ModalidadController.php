<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Response;
use App\User;
use App\Modalidad;
use App\Deporte;
use Illuminate\Support\Collection as Collection;

class ModalidadController extends Controller
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
        $modalidad = Modalidad::withTrashed()->
        orderBy('id', 'ASC')->get();
        $deportes = Deporte::orderBy('id', 'ASC')->get();
        $modalidadesOnlyTrashed = Modalidad::onlyTrashed()
        ->get();

        //Se pasa la variable users a la vista
        return view('admin.modalidad.borrados')
        ->with('modalidad', $modalidad)
        ->with('deportes', $deportes)
        ->with('modalidadesOnlyTrashed', $modalidadesOnlyTrashed);
    }

    public function index()
    {
        //retorna todos los usuarios (hasta los borrados logicamente)
        //ordenados por id

        $modalidad = Modalidad::orderBy('id', 'ASC')->get();
        $deportes = Deporte::orderBy('id', 'ASC')->get();
        $modalidadesOnlyTrashed =Modalidad::onlyTrashed()
        ->get();

        //Se pasa la variable users a la vista
        return view('admin.modalidad.index')
        ->with('modalidad', $modalidad)
        ->with('deportes', $deportes)
        ->with('modalidadesOnlyTrashed', $modalidadesOnlyTrashed);
    }


    public function filtro1(Request $request)
    {
        //retorna todos los usuarios (hasta los borrados logicamente)
        //ordenados por id

        if($request->id == 'null'){
            $modalidad = Modalidad::orderBy('id', 'ASC')
            ->get();
        } else {
            $modalidad = Modalidad::orderBy('id', 'ASC')
            ->where('deporte_id', $request->id)
            ->get();
        }

        //$a = response()->json(['success' => 'Pasó la prueba :3']);

        return view('admin.modalidad.filtro_deporte',['modalidad'=>$modalidad])->render();
        //->with('users', $users);
    }

    public function filtro2(Request $request)
    {
        //retorna todos los usuarios  borrados logicamente

        if($request->id == 'null'){
            $modalidad = Modalidad::onlyTrashed()->orderBy('id', 'ASC')
            ->get();
        } else {
            $modalidad = Modalidad::onlyTrashed()->orderBy('id', 'ASC')
            ->where('deporte_id', $request->id)
            ->get();
        }
        return view('admin.modalidad.filtro_deporte',['modalidad'=>$modalidad])->render();

    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $deportes = Deporte::all();
        return view('admin.modalidad.create')->with(compact('modalidad','deportes'));
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
        return Redirect(route('admin.modalidad.index'));
    }

    public function activar($id)
    {
        $modalidad = Modalidad::withTrashed()
        ->where('id', '=', $id)
        ->restore();

        return Redirect(route('admin.modalidad.index'));

    }

    //Eliminar usuario de la base de datos
    public function destroy_force($id)
    {
        Modalidad::where('id',$id)->forceDelete();
        return Redirect(route('admin.modalidad.borrados'));
    }

    //Borrar Varios usuarios de la base de datos.
    public function deleteall(Request $request)
    {
        $ids = $request->ids;
        Modaliad::whereIn('id',explode(",",$ids))->forceDelete();
        return response()->json(['status'=>true,'message'=>"Usuarios Borrados Correctamente."]);


    }

    //Borrar Varios usuarios logicamente.
    public function softdeleteAll(Request $request)
    {
        dd("llegó");
        $ids = $request->ids;
        Modalidad::whereIn('id',explode(",",$ids))->forceDelete();
        return response()->json(['status'=>true,'message'=>"Modalidad Borrados Correctamente."]);


    }



}
