<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\producto;
use GuzzleHttp\Client;

class CatalogoClienteController extends Controller
{
    //
    public function ListarC(){
        $client = new Client();
        $response = $client->request('GET', 'https://backendtienda-production-0535.up.railway.app/productos');
        $user = json_decode($response->getBody(), true);
        return view('catalogocarritoCliente.ProductoRegisterCliente', compact('user'));
        
    }


    public function ListarCarrito(){
        $total = $this->Monto_total();
        return view('catalogocarritoCliente.CarritoCliente',compact('total'));
        
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
