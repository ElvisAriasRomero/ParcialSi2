<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\producto;


class CatalogoController extends Controller
{
    //

    public function ListarC(){
        $user = producto::all();
        return view('catalogocarrito.ProductoRegister', compact('user'));
        
    }


    public function ListarCarrito(){
        $total = $this->Monto_total();
        return view('catalogocarrito.Carrito',compact('total'));
        
    }

    public function Monto_total(){
        $total = 0;
          foreach ($this->obtenerProductos() as $producto) {
            $total += $producto->Subtotal;
        }
        return $total;
    }

    private function obtenerProductos()
            {
                $productos = session("productos");
                if (!$productos) {
                    $productos = [];
                }
                return $productos;
            }
}
