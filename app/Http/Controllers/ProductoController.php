<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\producto;
use PDF;
use App\Models\User;
use App\Models\bitacora;
use Illuminate\Support\Facades\Storage;
use GuzzleHttp\Client;

use App\Http\Requests\ProductoFormRequest;

class ProductoController extends Controller
{


    public function ListarP()
    {
        // $user = producto::all();

        $client = new Client();

        $response = $client->request('GET', 'https://backendtienda-production-0535.up.railway.app/productos');

        $user = json_decode($response->getBody(), true);

        return view('producto.ProductoRegister', compact('user'));

    }

    public function createProducto()
    {
        return view('producto.crearProducto');

    }
    public function Pdf()
    {
        $client = new Client();

        $response = $client->request('GET', 'https://backendtienda-production-0535.up.railway.app/productos');

        $user = json_decode($response->getBody(), true);
        $pdf = PDF::loadView('producto.pdfProducto', ['user' => $user]);

        return $pdf->stream();
        //return $pdf->download('productos.pdf'); 
    }


    public function storedProducto(Request $request)
    {
        
        $data = [
            'producto' => [
                'nombre' => $request->input('nombre'),
                'marca' => $request->input('marca'),
                'color' => $request->input('color'),
                'stock' => $request->input('stock'),
                'precio_comercial' => $request->input('precio_comercial'),
                'precio_compra' => $request->input('precio_compra'),
            ],
            'file' => $request->file('imagen'),
        ];

        $client = new Client();
        $response = $client->request('POST', 'https://backendtienda-production-0535.up.railway.app/productos', [
            'multipart' => [
                [
                    'name' => 'producto',
                    'contents' => json_encode($data['producto']),
                    'headers' => ['Content-Type' => 'application/json']
                ],
                [
                    'name' => 'file',
                    'contents' => fopen($data['file']->getPathname(), 'r'),
                    'filename' => $data['file']->getClientOriginalName()
                ],
            ],
        ]);

        $bitacora = new bitacora();
        $bitacora->descripcion = 'Se registró un producto';
        $bitacora->user_name = auth()->user()->name;
        $bitacora->save();

        return redirect()->route('admin.listarproducto');
    }

    // eliminar un producto
    public function destroyProducto($id)
    {
        $client = new Client();

        $client->request('DELETE', 'https://backendtienda-production-0535.up.railway.app/productos/' . $id);

        $bitacora = new bitacora();
        $bitacora->descripcion = 'Se eliminó un producto';
        $bitacora->user_name = auth()->user()->name;
        $bitacora->save();

        return redirect()->route('admin.listarproducto');
    }

    //editar un producto

    public function editProducto($id)
    {
        // $user = producto::find($id);

        $client = new Client();

        $response = $client->request('GET', 'https://backendtienda-production-0535.up.railway.app/productos/' . $id);

        $user = json_decode($response->getBody(), true);

        return view('producto.editarProducto', compact('user'));
    }

    /* cambia los datos al editar presionando el button */
    public function updateProducto(Request $request, $id)
    {
        $client = new Client();

        $url = 'https://backendtienda-production-0535.up.railway.app/productos/' . $id;

        try {
            $response = $client->request('PUT', $url, [
                'json' => [
                    'nombre' => $request->nombre,
                    'marca' => $request->marca,
                    'color' => $request->color,
                    'stock' => $request->stock,
                    'precio_comercial' => $request->precio_comercial,
                    'precio_compra' => $request->precio_compra
                ],
            ]);

        } catch (\GuzzleHttp\Exception\RequestException $e) {
            $response = $e->getResponse();
        }


        $bitacora = new bitacora();
        $bitacora->descripcion = 'Se editó los datos de un producto';
        $bitacora->user_name = auth()->user()->name;
        $bitacora->save();


        return redirect()->route('admin.listarproducto');

    }




}
