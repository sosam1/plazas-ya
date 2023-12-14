<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Plaza;

class PlazaController extends Controller
{
    //

    public function GetPlazas(){
        return Plaza::all();
    }

    public function GetPlaza(Request $request){
        return Plaza::find($request->id);
    }
    public function CreatePlaza(Request $request){
        $plaza = new Plaza();
        $plaza->nombre_plaza = $request->post('nombre_plaza');
        $plaza->direccion = $request->post('direccion');
        $plaza->descripcion = $request->post('descripcion');
        $plaza->latitud = $request->post('latitud');
        $plaza->longitud = $request->post('longitud');
        $plaza->valoracion = 0;
        
        $plaza->save();
        return $plaza;
    }
    public function UpdatePlaza(Request $request){
        $plaza = Plaza::find($request->id);
        $plaza->nombre_plaza = $request->nombre_plaza;
        $plaza->direccion = $request->direccion;
        $plaza->descripcion = $request->descripcion;
        $plaza->latitud = $request->latitud;
        $plaza->longitud = $request->longitud;


        $plaza->save();
        return Plaza::find($request->id);
    }

    public function DeletePlaza(Request $request){
        $plaza = Plaza::find($request->id);
        $plaza->delete();
    }


}
