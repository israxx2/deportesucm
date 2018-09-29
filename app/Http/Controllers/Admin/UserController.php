<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Response;
use App\User;
use App\Carrera;
use App\Equipo;
use App\Partido;
use Illuminate\Support\Collection as Collection;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */





    public function borrados()
    {
        //retorna todos los usuarios (hasta los borrados logicamente)
        //ordenados por id
        $users = User::withTrashed()->
        orderBy('id', 'ASC')->get();
        $carreras = Carrera::orderBy('id', 'ASC')->get();
        $usersOnlyTrashed = User::onlyTrashed()
        ->get();

        //Se pasa la variable users a la vista
        return view('admin.users.borrados')
        ->with('users', $users)
        ->with('carreras', $carreras)
        ->with('usersOnlyTrashed', $usersOnlyTrashed);
    }

    public function index()
    {
        //retorna todos los usuarios (hasta los borrados logicamente)
        //ordenados por id

        $users = User::orderBy('id', 'ASC')->get();
        $carreras = Carrera::orderBy('id', 'ASC')->get();
        $usersOnlyTrashed = User::onlyTrashed()
        ->get();

        //Se pasa la variable users a la vista
        return view('admin.users.index')
        ->with('users', $users)
        ->with('carreras', $carreras)
        ->with('usersOnlyTrashed', $usersOnlyTrashed);
    }

    public function filtro1(Request $request)
    {
        //retorna todos los usuarios (hasta los borrados logicamente)
        //ordenados por id

        if($request->id == 'null'){
            $users = User::orderBy('id', 'ASC')
            ->get();
        } else {
            $users = User::orderBy('id', 'ASC')
            ->where('carrera_id', $request->id)
            ->get();
        }

        //$a = response()->json(['success' => 'Pasó la prueba :3']);

        return view('admin.users.filtro_carrera',['users'=>$users])->render();
        //->with('users', $users);
    }

    public function filtro2(Request $request)
    {
        //retorna todos los usuarios  borrados logicamente

        if($request->id == 'null'){
            $users = User::onlyTrashed()->orderBy('id', 'ASC')
            ->get();
        } else {
            $users = User::onlyTrashed()->orderBy('id', 'ASC')
            ->where('carrera_id', $request->id)
            ->get();
        }
        return view('admin.users.filtro_carrera',['users'=>$users])->render();

    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //para crear un usuario se necesita asignarle una carrera a este,
        //es por ello que se debe pasar las carreras a la vista para visualizarlas
        //con un <select>
        $carreras= Carrera::orderBy('nombre', 'ASC')
        ->get();
        return view('admin.users.create')
        ->with('carreras', $carreras);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $user = new User();
        $user->nombres = strtoupper($request->nombres);
        $user->apellidos = strtoupper($request->apellidos);
        $user->email = $request->email;
        $user->carrera_id = $request->carrera_id;
        $user->password = bcrypt($request->password);
        $user->save();

        return Redirect('/user/');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */




     //linea de tiempo en show

    public function show($id)
    {
        //controlador usado para ver los detalles de un usuario en especifico.
        $user = User::withTrashed()->find($id);
        $partido = Partido::all();
        $equipos = Equipo::all(); 

        //datos para grafico, deportes mas jugados
        $deportes=Deporte::all();
        

        
        $data_equipo = Collection::make(); //crear una coleccion
        foreach ($equipos as $e){  //concatenar todos los equipos en solo 1 coleccion
            $data_equipo = $data_equipo->concat([               
                'Equipo' => [
                    'id' =>$e->id,
                    'created_at' =>$e->created_at,
                    'titulo' =>'Nuevo Equipo!',
                    'titulo2' =>'',
                    'descrip' =>'Creo el equipo '.$e->nombre. ' correctamente',
                    'icon' => 'fa fa-group bg-green',
                    'ver_mas' => '/admin/equipo/'.$e->id
                ]]);
         }

         $data_partido = Collection::make(); //crear una coleccion
         foreach ($partido as $p){  //concatenar todos los partido en solo 1 coleccion
             $data_partido = $data_partido->concat([               
                 'Partido' => [
                     'id' =>$p->id,
                     'created_at' =>$e->created_at,
                     'titulo' =>'Partido Jugado!',
                     'titulo2' =>$p->puntos_local.' : '.$p->puntos_visita,
                     'descrip' =>'Se jugo un partido amistoso entre el equipo '.
                        $p->local_id.' vs '.$p->visita_id,
                     'icon' => 'fa fa-soccer-ball-o bg-purple',
                     'ver_mas' => '/admin/partido/'.$p->id
                 ]]);
          }

        
        $data_user= [//crear coleccion de registro user
            'Registro' => [
                'id' =>1,
                'titulo' =>'Registro',
                'titulo2' =>'',
                'created_at' =>$user->created_at,
                'descrip' =>'Usuario se registro correctamente',
                'icon' => 'fa fa-user bg-blue',
                'ver_mas'=> ''
            ]
        ];	
        $data_user = Collection::make($data_user); //transformar a coleccion

        $collection=$data_user->concat($data_equipo)->concat($data_partido);
        $collection = $collection->sortByDesc('created_at');//ordenar coleccion
        return view('admin.users.show', compact('user','collection'));

        
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $carreras= Carrera::orderBy('nombre', 'ASC')
        ->pluck('nombre','id');

        $tipo = ['estudiante' => 'estudiante', 'admin' => 'admin'];

        return view('admin.users.edit')
        ->with('user', $user)
        ->with('tipo', $tipo)
        ->with('carreras', $carreras);
    }

    public function pw(Request $request)
    {
        $user = User::find($request->user_id);
        return view('admin.users.pw')
        ->with('user', $user);
    }

    public function pw_save(Request $request, $id)
    {
        $user = User::find($id);
        $user->password = bcrypt($request->password);
        $user->save();

        return Redirect('/admin/user/'.$id);
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
        $user = User::find($id);
        $user->nombres = strtoupper($request->nombres);
        $user->apellidos = strtoupper($request->apellidos);
        $user->email = $request->email;
        $user->carrera_id = $request->carrera_id;
        $user->tipo = $request->tipo;
        $user->save();
        return Redirect('/admin/user/'.$user->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        $user->save();
        return Redirect(route('admin.user.index'));
    }

    public function activar($id)
    {
        $user = User::withTrashed()
        ->where('id', '=', $id)
        ->restore();

        return Redirect(route('admin.user.index'));

    }

    //Eliminar usuario de la base de datos
    public function destroy_force($id)
    {
        User::where('id',$id)->forceDelete();
        return Redirect(route('admin.user.borrados'));
    }

    //Borrar Varios usuarios de la base de datos.
    public function deleteall(Request $request)
    {
        $ids = $request->ids;
        User::whereIn('id',explode(",",$ids))->forceDelete();
        return response()->json(['status'=>true,'message'=>"Usuarios Borrados Correctamente."]);   

   
    }
}
