<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Torneo;
use App\Equipo;
use App\Modalidad;
class TorneoController extends Controller
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
        $this->middleware('usuarioAdmin',['only'=>['inscripcion']]);
        $this->middleware('usuarioAdmin',['only'=>['inscribir']]);
        

    }
    public function index()
    {
        $torneo = Torneo::withTrashed()->
        orderBy('id', 'ASC')->get();
        return view('admin.torneo.index')
        ->with('torneo', $torneo);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $modalidad = Modalidad::orderBy('id', 'DESC')->get();
        $torneo = Torneo::orderBy('id', 'DESC')->get();
        return view('admin.torneo.create')
        ->with('torneos', $torneo)
        ->with('modalidades', $modalidad);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $torneo = new Torneo;
        $torneo->nombre = $request->n_torneo;
        $torneo->descripcion = $request->descripcion;
        $torneo->fecha = $request->fecha;
        $torneo->min = $request->min;
        $torneo->max = $request->max;
        $torneo->tipo = $request->tipo_t;
        $torneo->modalidad_id=$request->modalidad;
        $torneo->fase_actual = 1;
        $torneo->cerrado = 0;
        $torneo->finalizado = 0;
        $torneo->save();
        $torneo->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $torneo = Torneo::find($id);

        
        //retorna las los equipos inscritos en el torneo
        //foreach($torneo->equipos as $equipo){
        //    $equipo->nombre;
        //}


        //acceder a la tabla inscripciones (no se usará a menos que la tabla inscripcion tuviera atributos de interés)
        //foreach($torneo->equipos as $equipo){
        //    $equipo->pivot->id; //id del registro de la inscricion
        //}

        //crear una inscripción en el torneo correspondiente
        //$torneo->equipos()->attach($equipo_id);

        
        //dd($inscripciones);

        return view('admin.torneo.show')
        ->with('torneo', $torneo);
        //->with('inscripciones', $inscripciones);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $torneos = Torneo::find($id);
        $modalidad = Modalidad::orderBy('id', 'DESC')->get();

        return view('admin.torneo.edit')->with('torneo', $torneos)
        ->with('modalidades', $modalidad);

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
        $torneo = Torneo::find($id);
        $torneo->nombre = $request->n_torneo;
        $torneo->descripcion = $request->descripcion;
        $torneo->fecha = $request->fecha;
        $torneo->min = $request->min;
        $torneo->max = $request->max;
        $torneo->tipo = $request->tipo_t;
        $torneo->modalidad_id=$request->modalidad;
        
        $torneo->save();

        return Redirect('/admin/torneo/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $torneo = Torneo::find($id);
        $torneo->delete();
        $torneo->save();

        return Redirect('admin/torneo');
    }
    public function activar($id)
    {
        $torneo = Torneo::withTrashed()
        ->where('id', '=', $id)
        ->restore();

        return Redirect('admin/torneo');
    }
    public function inscripcion($id)
    {   
        
        //se mostraran todos los equipos que no esten inscritos en un torneo
        $collection = collect([]);
        $torneo = Torneo::find($id);
        $equipo = Equipo::withTrashed()->
        orderBy('id', 'ASC')->get();
        foreach($equipo as $equip){
           $bool = $torneo->equipos->contains($equip->id);
            if($bool<>true){
                $data= new Equipo;
                $data->id = $equip->id;
                $data->nombre = $equip->nombre;
                $data->descripcion = $equip->descripcion;
                $data->modalidad_id = $equip->modalidad;
                $data->conformado = 2;
                $collection->push($data);
            }
        }
        return view('Admin/torneo/inscripcion')
        ->with('equipo', $collection)
        ->with('torneo', $torneo);
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function inscribir(Request $request, $id)
    {   
        $torneo = Torneo::find($id);
        $torneo->equipos()->attach($request->id);
        return Redirect('admin/torneo/'.$id);
    }
    public function desinscribir(Request $request, $id)
    {   
        $torneo = Torneo::find($request->torneo);
        $torneo->equipos()->detach($id);
        return Redirect('admin/torneo/'.$request->torneo);
    }
}
