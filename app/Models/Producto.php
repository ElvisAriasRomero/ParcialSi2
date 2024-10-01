<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;
    protected $fillable =[
        'nombre',
        'marca',
        'color',
        'stock',
        'precio_comercial',
        'precio_compra',
        'imagen'
    ];

    public $timestamps = false;


}

