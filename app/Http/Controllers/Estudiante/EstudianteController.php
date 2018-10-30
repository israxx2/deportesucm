<?php

namespace App\Http\Controllers\Estudiante;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Equipo;
use App\Deporte;
use App\Modalidad;

class EstudianteController extends Controller
{
    public function inicio(){
        $deportes_sidebar = Deporte::all();

        return view('estudiante.inicio')
        ->with('deportes_sidebar', $deportes_sidebar);
    }

    public function perfil(){

        $deportes_sidebar = Deporte::all();

        return view('estudiante.perfil')
        ->with('deportes_sidebar', $deportes_sidebar);
    }

    public function deporte_show($id){

        $deportes_sidebar = Deporte::all();
        $deporte = Deporte::find($id);

        return view('estudiante.deporte_show')
        ->with('deportes_sidebar', $deportes_sidebar)
        ->with('deporte', $deporte);
    }


    public function modalidad_show($id){

        $modalidad = Modalidad::find($id);
        $deportes_sidebar = Deporte::all();
        $deporte = Deporte::find($modalidad->deporte->id);

        return view('estudiante.modalidad_show')
        ->with('deportes_sidebar', $deportes_sidebar)
        ->with('deporte', $deporte);
    }

    public function equipo_store(Request $request){
        $equipo = new Equipo();
        $equipo->nombre = strtoupper($request->nombre);
        $equipo->modalidad_id = (int)$request->modalidad;
        $equipo->user_id = Auth::User()->id;
        $equipo->conformado = 0;
        $equipo->save();

        return Redirect(route('estudiante.equipos.show', ['id' => $equipo->id]));
    }

    public function equipos(){
        $deportes_sidebar = Deporte::all();

        return view('estudiante.equipos')
        ->with('deportes_sidebar', $deportes_sidebar);
    }

    public function equipo_show($id){
        $deportes_sidebar = Deporte::all();

        return view('estudiante.equipo_show')
        ->with('deportes_sidebar', $deportes_sidebar);
    }

    public function filtro_equipo(Request $modalidad)
    {

        if($modalidad->id == 'null'){


            $equipo = DB::select('SELECT nombre, descripcion FROM equipos where modalidad_id = '.$modalidad); 

        }

        else{

            $equipo='null';
    


        }
        return view('estudiante.filtro_equipo',['resultado'=>$equipo])->render();



    }


}
