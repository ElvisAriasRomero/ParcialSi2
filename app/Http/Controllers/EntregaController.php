<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use App\Models\bitacora;
use App\Models\entrega;
use App\Models\personal;

class EntregaController extends Controller
{
    //


    
    public function ListarE(){
        $user = entrega::all();
        return view('entrega.EntregaRegister', compact('user'));
        
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
                                                   'plaza'=>'required',
                                                   'color'=>'required',
                                                   'tipo'=>'required',
                                                   'precio_comercial'=>'required',
                                                   'precio_credito'=>'required']);
       
       /*                                            $nombreimagen = time() . '_' . $request->imagen;
        $ruta = $request->imagen->storeAs('public/imagenes/productos', $nombreimagen);                                              
        $url = Storage::url($ruta);
        */
        $producto = new Producto();

        $producto->nombre=request('nombre');
        $producto->plaza = request('plaza');
        $producto->color = request('color');
        $producto->tipo = request('tipo');
        $producto->precio_comercial = request('precio_comercial');
        $producto->precio_credito = request('precio_credito');
      
    
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

    //editar una entrega

    public function editEntrega($id){
        $user = entrega::find($id);
        $prod = personal::all();



        return view('entrega.editarEntrega',compact('user','prod'));
    }

    /* cambia los datos al editar presionando el button */
    public function updateEntrega(Request $request, $id){
        $user = entrega::find($id);
        
        $user->estado = $request->estado;
        $codigo = $request->post("codigo");
        $personal = personal::where("id", "=", $codigo)->first();
        $user->id_personal = $personal->id;

        $user->user_id = auth()->user()->id;
        $user->save();

        
        $bitacora = new bitacora();
        $bitacora->descripcion = 'Se editó los datos de una entrega';
        $bitacora->user_name = auth()->user()->name;
        $bitacora->save();


        return redirect()->route('admin.listarentrega');

    }
    public function updateEntregaCancelar(Request $request, $id){
        $user = entrega::find($id);
        $user->estado = "cancelado";
        $user->save();
        $bitacora = new bitacora();
        $bitacora->descripcion = 'Se cancelo la entrega ';
        $bitacora->user_name = auth()->user()->name;
        $bitacora->save();
        return redirect()->route('admin.listarentrega');

    }
    public function updateEntregaEntregado(Request $request, $id){
        $user = entrega::find($id);
        $user->estado = "Entregado";
        $user->save();
        $bitacora = new bitacora();
        $bitacora->descripcion = 'Se Confirmo la entrega ';
        $bitacora->user_name = auth()->user()->name;
        $bitacora->save();
        return redirect()->route('admin.listarentrega');

    }

}
