<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Element extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre_elemento',
        'tipo_elemento',
        'categoria_elemento',
        'fechaVencimiento_elemento',
    ];
}
