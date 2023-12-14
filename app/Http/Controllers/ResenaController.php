<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Resena;
use App\Models\Plaza;

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

        //calculo el promedio de las reseñas y lo inserto en la valoracion de la tabla Plaza
        $promedio = Resena::where('id_plaza', $resena->id_plaza)->avg('puntuacion');
        $plaza = Plaza::find($resena->id_plaza);
        $plaza->valoracion = $promedio;

        //actualizo contador de reseñas en la tabla Plaza
        $cantidad_resenas = Resena::where('id_plaza', $resena->id_plaza)->count();
        $plaza->cantidad_resenas = $cantidad_resenas;

        $plaza->save();

        return response()->json(['message' => 'Actividad asignada a la plaza con éxito' . " id_plaza: " . $resena->id_plaza . 
                                " descripción: " . $resena->descripcion . " puntuación: " . $resena->puntuacion .
                                " Promedio; " . $promedio]);
    }
    public function DeleteResena(Request $request){
        $id_resena = $request->id;
        $resena = Resena::find($id_resena);
        $resena->delete();

        //calculo el promedio de las reseñas y lo inserto en la valoracion de la tabla Plaza
        $promedio = Resena::where('id_plaza', $resena->id_plaza)->avg('puntuacion');
        $plaza = Plaza::find($resena->id_plaza);
        $plaza->valoracion = $promedio;

        //actualizo contador de reseñas en la tabla Plaza
        $cantidad_resenas = Resena::where('id_plaza', $resena->id_plaza)->count();
        $plaza->cantidad_resenas = $cantidad_resenas;

        $plaza->save();

        return response()->json(['message' => 'Reseña eliminada con exito']);
    }

}
