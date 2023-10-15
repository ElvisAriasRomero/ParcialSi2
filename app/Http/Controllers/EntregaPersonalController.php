<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use App\Models\bitacora;
use App\Models\entrega;

use App\Models\personal;


class EntregaPersonalController extends Controller
{
    
    public function ListarE(){

        
        $id = auth()->user()->id;

        $idpersonal = personal::where("user_id", "=", $id)->first();
      
        $user = entrega::where("id_personal", "=", $idpersonal->id)->get();

        return view('entregaPersonal.EntregaRegister', compact('user'));
        
    }

 
    public function Pdf(){
        $user = producto::all();
        $pdf = PDF::loadView('producto.pdfProducto',['user'=>$user]);

        return $pdf->stream();
        //return $pdf->download('productos.pdf'); 
    }

    public function updateEntregaCancelar(Request $request, $id){
        $user = entrega::find($id);
        $user->estado = "cancelado";
        $user->save();
        $bitacora = new bitacora();
        $bitacora->descripcion = 'Se cancelo la entrega ';
        $bitacora->user_name = auth()->user()->name;
        $bitacora->save();
        return redirect()->route('personal.listarentrega');

    }
    public function updateEntregaEntregado(Request $request, $id){
        $user = entrega::find($id);
        $user->estado = "Entregado";
        $user->save();
        $bitacora = new bitacora();
        $bitacora->descripcion = 'Se Confirmo la entrega ';
        $bitacora->user_name = auth()->user()->name;
        $bitacora->save();
        return redirect()->route('personal.listarentrega');

    }
}
