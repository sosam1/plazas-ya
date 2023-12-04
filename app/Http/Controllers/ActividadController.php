<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Actividad;

class ActividadController extends Controller
{
    //
    public function CreateActividad(Request $request){

        $actividad = new Actividad();
        $actividad->nombre = $request->post('nombre');
        $actividad->save();

        return $actividad;

    }

    public function GetActividades(){
        return Actividad::all();
    }

    public function GetActividad(Request $request){
        return Actividad::find($request->id);
    }

    public function UpdateActividad(Request $request){

        $actividad = Actividad::find($request->id);
        $actividad->nombre = $request->nombre;
       
        $actividad->save();
        return Actividad::find($request->id);
    }

    public function DeleteActividad(Request $request){
        $actividad = Actividad::find($request->id);
        $actividad->delete();
    }

}
