<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use App\User;
use App\Carrera;
use App\Equipo;
use App\Modalidad;
use App\Reclamo;

class ReclamosController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {

        //ordenados por id
        
        $reclamo = Reclamo::withTrashed()->
        orderBy('id', 'ASC')->get();
        //Se pasa la variable users a la vista
        return view('admin.reclamo.index')
        ->with('reclamo', $reclamo);
    }


    public function destroy($id)
    {
        $reclamo = Reclamo::find($id);
        $reclamo->delete();
        $reclamo->save();

        return Redirect('admin/reclamo');
    }

    public function estado($id){
        $reclamo = Reclamo::find($id);
        $reclamo->delete();
        $reclamo->save();
        return Redirect('admin/reclamo');
    }
}
