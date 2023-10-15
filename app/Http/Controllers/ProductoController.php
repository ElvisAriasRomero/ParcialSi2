<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\producto;
use PDF;
use App\Models\User;
use App\Models\bitacora;
use Illuminate\Support\Facades\Storage;

use App\Http\Requests\ProductoFormRequest;

class ProductoController extends Controller{


    public function ListarP(){
        $user = producto::all();
        return view('producto.ProductoRegister', compact('user'));
        
    }

    public function createProducto(){
        return view('producto.crearProducto');

    }
    public function Pdf(){
        $user = producto::all();
        $pdf = PDF::loadView('producto.pdfProducto',['user'=>$user]);

        return $pdf->stream();
        //return $pdf->download('productos.pdf'); 
    }


    public function storedProducto(Request $request){
        $this->validate(request(),['nombre'=>'required',
                                                   'marca'=>'required',
                                                   'color'=>'required',
                                                   'stock'=>'required',
                                                   'precio_comercial'=>'required',
                                                   'precio_compra'=>'required']);
       
       /*                                            $nombreimagen = time() . '_' . $request->imagen;
        $ruta = $request->imagen->storeAs('public/imagenes/productos', $nombreimagen);                                              
        $url = Storage::url($ruta);
        */
        $producto = new Producto();

        $producto->nombre=request('nombre');
        $producto->marca = request('marca');
        $producto->color = request('color');
        $producto->stock = request('stock');
        $producto->precio_comercial = request('precio_comercial');
        $producto->precio_compra = request('precio_compra');
      
    
            $imagen=$request->file('imagen');
            $nombre = time().'_'.request('nombre').'.'.$imagen->getClientOriginalExtension();
            $url=public_path('imagenes\productos');
            $request->imagen->move($url,$nombre);
            $producto->imagen=$nombre;
    
        $producto->save();


        $bitacora = new bitacora();
        $bitacora->descripcion = 'Se registró un producto';
        $bitacora->user_name = auth()->user()->name;
        $bitacora->save();

        return redirect()->route('admin.listarproducto'); 
    }
    
    // eliminar un producto
    public function destroyProducto($id){
        $user = producto::find($id);
        $user->delete();

        $bitacora = new bitacora();
        $bitacora->descripcion = 'Se eliminó un producto';
        $bitacora->user_name = auth()->user()->name;
        $bitacora->save();

        return redirect()->route('admin.listarproducto');
    }

    //editar un producto

    public function editProducto($id){
        $user = producto::find($id);
        return view('producto.editarProducto',compact('user'));
    }

    /* cambia los datos al editar presionando el button */
    public function updateProducto(Request $request, $id){
        $user = producto::find($id);
        $user->nombre = $request->nombre;
        $user->marca = $request->marca;
        $user->color = $request->color;
        $user->stock = $request->stock;
        $user->precio_comercial = $request->precio_comercial;
        $user->precio_compra = $request->precio_compra;

        $user->save();

        
        $bitacora = new bitacora();
        $bitacora->descripcion = 'Se editó los datos de un producto';
        $bitacora->user_name = auth()->user()->name;
        $bitacora->save();


        return redirect()->route('admin.listarproducto');

    }
    



}
