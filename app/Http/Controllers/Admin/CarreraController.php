<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use App\User;
use App\Carrera;
use App\Equipo;
use App\Deporte;
use App\Cuenta;
use App\Modalidad;
use Illuminate\Support\Collection as Collection;


class CarreraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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

    public function show($id)
    {

        //deportes mas jugados en la carrera.

        $users= User::all()->where('carrera_id', '=', $id);
        $equipos = Collection::make(); //crear una coleccion
        foreach ($users as $user) {
            if ($user->equipos()->get()->toArray()!=null) {
                $equipos = $equipos->concat([$user->equipos()->get()]);
            }    
        }  

        $equipos=array_collapse($equipos->toArray());   
        $M = Collection::make(); //crear una coleccion

        foreach ($equipos as $equipo => $e) {
           $M= $M->concat([
            Modalidad::find($e['modalidad_id'])
           ->deporte()
           ->select('nombre')
           ->get() 
           ]);    
        }   
       $M=$M->collapse()->groupBy('nombre');

       $datos = Collection::make(); //crear una coleccion
        foreach ($M as $m => $key) {
            $datos=$datos->concat([
                'Datos' => ['DEPORTE'=> $m,
                'CANTIDAD'=>$key->count()]
            ]);
        }
       $deporte= $datos->pluck('DEPORTE');
       $Cantidad= $datos->pluck('CANTIDAD');

    
   
        //controlador usado para ver los detalles de un partido en especifico.
        $carrera = Carrera::find($id);
        return view('admin.carreras.show')
        ->with('carrera', $carrera)
        ->with('deporte', $deporte)
        ->with('Cantidad', $Cantidad);

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
