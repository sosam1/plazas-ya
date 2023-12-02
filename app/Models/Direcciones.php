<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Direcciones extends Model
{
    use HasFactory;

    protected $table = "direcciones";

    public $timestamps = false;
    protected $fillable = ['direccion', 'latitud', 'longitud', 'descripcion'];

}
