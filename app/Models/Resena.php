<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resena extends Model
{
    use HasFactory;

    protected $table = "resena";

    public $timestamps = false;
    protected $fillable = ['id_plaza', 'descripcion', 'puntuacion'];

}
