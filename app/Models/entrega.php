<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class entrega extends Model
{
    use HasFactory;

    protected $fillable =[
        
        'venta_id',
       'precio',
       'nombre',
       'direccion',
       'detalle',
       'id_personal',
       'user_id',
       'cliente_id',
       'estado'

    ];

}
