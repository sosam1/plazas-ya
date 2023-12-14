<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Resena;

class ResenaController extends Controller
{
    public function GetAllResenas(){
        return Resena::All();    
    }
    public function GetResena(Request $request){
        $id_resena = $request->id;
        return Resena::find($id_resena);    
    }
    public function GetResenasDePlaza(Request $request){
        $id_plaza = $request->id;
        $resenas = Resena::where('id_plaza', $id_plaza)->get();
        return response()->json($resenas);
    }
    public function CreateResena(Request $request){
        $resena = new Resena();
        $resena->id_plaza = $request->post('id_plaza');
        $resena->descripcion = $request->post('descripcion');
        $resena->puntuacion = $request->post('puntuacion');
        $resena->save();

        return response()->json(['message' => 'Actividad asignada a la plaza con éxito' . " id_plaza: " . $resena->id_plaza . 
                                " descripción: " . $resena->descripcion . " puntuación: " . $resena->puntuacion]);
    }
    public function DeleteResena(Request $request){
        $id_resena = $request->id;
        $resena = Resena::find($id_resena);
        $resena->delete();
        return response()->json(['message' => 'Reseña eliminada con exito']);
    }

}
