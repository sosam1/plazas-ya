<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Actividad;
use App\Models\Plaza;
use App\Models\Plaza_actividad;

class ActividadController extends Controller
{
    //

    public function GetActividades(){
        return Actividad::all();
    }

    public function GetActividad(Request $request){
        return Actividad::find($request->id);
    }
    public function CreateActividad(Request $request){
        $actividad = new Actividad();
        $actividad->nombre = $request->post('nombre');
        $actividad->save();

        return $actividad;
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

    public function AsignarActividadAPlaza(Request $request){
        $idPlaza = $request->post('id_plaza');
        $idActividad = $request->post('id_actividad');
    
        $plaza = Plaza::find($idPlaza);
        $actividad = Actividad::find($idActividad);
    
        if (!$plaza || !$actividad) {
            return response()->json(['error' => 'Plaza o actividad no encontrada'], 404);
        }
    
        $asignacion = new Plaza_actividad();
        $asignacion->id_plaza = $idPlaza;
        $asignacion->id_actividad = $idActividad;
        $asignacion->save();
    
        return response()->json(['message' => 'Actividad asignada a la plaza con éxito' . " " . $asignacion]);
    }

}
