<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Direcciones;

class DireccionesController extends Controller
{
    
    public function CreateDireccion(Request $request){

        $direccion = new Direcciones();
        $direccion->direccion = $request->post('direccion');
        $direccion->latitud = $request->post('latitud');
        $direccion->longitud = $request->post('longitud');
        $direccion->descripcion = $request->post('descripcion');

        $direccion->save();
        return $direccion;

    }

    public function DeleteDireccion(Request $request){
        $direccion = Direcciones::find($request->id);
        $direccion->delete();
    }

    public function UpdateDireccion(Request $request){

        $direccion = Direcciones::find($request->id);
        $direccion->direccion = $request->direccion;
        $direccion->latitud = $request->latitud;
        $direccion->longitud = $request->longitud;
        $direccion->descripcion = $request->descripcion;

        $direccion->save();
        return Direcciones::find($request->id);
    }
    
    public function GetDirecciones(){
        return Direcciones::all();
    }

    public function GetDireccion(Request $request){
        return Direcciones::find($request->id);
    }





}
