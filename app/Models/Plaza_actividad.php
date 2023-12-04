<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plaza_actividad extends Model
{
    use HasFactory;

    protected $table = "plaza_actividad";

    public $timestamps = false;
    protected $fillable = ['id_plaza', 'id_actividad'];
}
