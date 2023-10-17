<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\venta;
use App\Models\cliente;
use App\Models\Producto;
use App\Models\suministro;
use App\Models\almacen;
use App\Models\detalleventa;
use App\Models\User;
use App\Models\bitacora;
use App\Models\entrega;
use PDF;

class VentaClienteController extends Controller
{
    //


    public function ListarV()
    {
        $user = venta::all();
        return view('venta.VentaRegister', compact('user'))->with('message', 'Data added Successfully');
    }

    public function verDetalleVenta($id)
    {
        $user = detalleventa::where("venta_id", "=", $id)->get();
        $comprobante = venta::where("id", "=", $id)->first();

        return view('venta.verDetalleVenta', compact('user', 'comprobante'), ['id' => $id]);
    }
    public function PdfDetalle($id)
    {
        $user = detalleventa::where("venta_id", "=", $id)->get();
        $pdf = PDF::loadView('venta.pdfDetalleVenta', ['user' => $user]);

        return $pdf->stream();
        //return $pdf->download('ventas.pdf'); 
    }
    public function Pdf()
    {
        $user = venta::all();
        $pdf = PDF::loadView('venta.pdfVenta', ['user' => $user]);

        return $pdf->stream();
        //return $pdf->download('ventas.pdf'); 
    }


    /*Manda al view crearCliente */
    public function createVenta()
    {

        $cliente = cliente::all();
        return view('venta.crearVenta', compact('cliente'));
    }


    public function createDetalleVenta($id)
    {
        $user = cliente::find($id);
        $prod = Producto::all();
        $total = $this->Monto_total();
        $monto = $this->Monto_total();
        $detalle = '2';


        //  return view('venta.GENERARVENTAS',compact('user','prod','lista_productos'));

        return view('venta.crearDetalleVenta', compact('user', 'prod', 'monto', 'detalle', 'total'));
    }

    /*Guarda los datos del cliente */
    public function addprod($id)
    {
        $user = cliente::find($id);
        $this->validate(request(), ['cant' => 'required',]);

        return view('venta.crearDetalleVenta', compact('user', 'cant'));
    }
    //#########################################################################################################
    public function agregarProductoVenta(Request $request, $id)
    {

        $cantidad = request('cantidad');
        $producto = Producto::where("id", "=", $id)->first();
        $user = cliente::find($id);

        $this->agregarProductoACarrito($producto, $cantidad);

        return redirect()->route("cliente.listarcatalogocliente");
    }

    private function agregarProductoACarrito($producto, $cantidad)
    {
        $productos = $this->obtenerProductos(); //le retorna la session 

        $stock = 100;


        if ($stock >= $cantidad) {
            $producto->cantidad = $cantidad;
            $producto->Subtotal = $producto->precio_comercial * $cantidad;
            array_push($productos, $producto);
            // Update the product's stock
           /*  $producto->stock -= $cantidad;
            $producto->save(); */
        }

        $this->guardarProductos($productos);
    }

    private function obtenerProductos()
    {
        $productos = session("productos");
        if (!$productos) {
            $productos = [];
        }
        return $productos;
    }

    public function quitarProductoDeVenta(Request $request)
    {
        $indice = $request->post("indice");
        $productos = $this->obtenerProductos();
        array_splice($productos, $indice, 1);
        $this->guardarProductos($productos);

        return redirect()->route("cliente.carrito");
    }

    private function buscarIndiceDeProducto(string $codigo, array &$productos)
    {

        foreach ($productos as $indice => $producto) {
            if ($producto->id == $codigo) {
                return $indice;
            }
        }
        return -1;
    }



    private function guardarProductos($productos)
    {
        session([
            "productos" => $productos,
        ]);
    }
    private function vaciarProductos()
    {
        $this->guardarProductos(null);
    }

    public function Monto_total()
    {
        $total = 0;
        foreach ($this->obtenerProductos() as $producto) {
            $total += $producto->Subtotal;
        }
        return $total;
    }



    public function terminarOCancelarVenta(Request $request)
    {




        if ($request->input("accion") == "terminar") {


            /* aqui inicia el control de la venta , el comprobante y la direccion , funcionas como forma de pago */
            $imagen = $request->file('imagen');
            $nombre = time() . '.' . $imagen->getClientOriginalExtension();
            $url = public_path('imagenes\comprobantes');
            $request->imagen->move($url, $nombre);

            $this->validate(request(), [
                'nombre' => 'required',
                'direccion' => 'required',
                'comprobante' => 'required',
                'descripcion' => 'required'
            ]);
            // aqui termina la validacion de la venta y el comprobante

            $nombrecliente = request('nombre');
            $direccion = request('direccion');
            $comprobante = request('comprobante');
            $descripcion = request('descripcion');


            return $this->terminarVenta($request, $nombre, $nombrecliente, $direccion, $comprobante, $descripcion);
        } else {
            return $this->cancelarVenta();
        }
    }

    public function terminarVenta(Request $request, $nombre, $nombrecliente, $direccion, $comprobante, $descripcion)
    {
        $venta = new venta();
        $venta->fecha = date('Y-m-d H:i:s');
        $venta->monto_total = $this->Monto_total();
        $venta->forma_pago = 'contado';
        $venta->imagen = $nombre; //guarda la imagen del pago por qr o sino el numero de comprobante
        $venta->comprobante = $comprobante;
        $venta->cliente_id = 1;
        $venta->factura_id = 1;
        $name = auth()->user()->name;
        $userows = User::select('id')->where("name", "=", $name)->first();
        $idd = $userows->id;
        $venta->user_id = $idd;

        $venta->save();

        $entreganueva = new entrega();
        $entreganueva->venta_id = $venta->id;
        $entreganueva->precio = $venta->monto_total;
        $entreganueva->nombre = $nombrecliente;
        $entreganueva->direccion = $direccion;
        $entreganueva->detalle = $descripcion;
        $entreganueva->estado = 'revision';
        $entreganueva->cliente_id =  auth()->user()->id;
        $entreganueva->save();

        $productos = $this->obtenerProductos();

        $bitacora = new bitacora();
        $bitacora->descripcion = 'Se realizó una Venta';
        $bitacora->user_name = auth()->user()->name;
        $bitacora->save();

        foreach ($productos as $producto) {
            $productovendido = new detalleventa();
            $productovendido->fill([
                "venta_id" => $venta->id,
                "producto_id" => $producto->id,
                "cantidad" => $producto->cantidad,
                "precio" => $producto->precio_comercial,
                "almacen_id" => 1

            ]);
            $productovendido->save();
        }
        $this->vaciarProductos();

        return redirect()->route("cliente.listarcatalogocliente");
    }
    public function cancelarVenta()
    {
        $this->vaciarProductos();
        return redirect()->route("cliente.listarcatalogocliente")
            ->with([
                "mensaje" => "No hay existencias del producto", "tipo" => "danger"
            ]);
    }
}
