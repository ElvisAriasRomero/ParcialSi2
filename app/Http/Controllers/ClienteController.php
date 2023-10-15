<?php

namespace App\Http\Controllers;

use App\Models\bitacora;
use Illuminate\Http\Request;
use App\Models\cliente;
use App\Models\User;
use PDF;
// tiene que ser inportado



class ClienteController extends Controller
{
    
    /*////// Crear al cliente /////*/

    /*Manda al view clienteRegister */
    public function ListarC(){
        $user = cliente::all();
        return view('cliente.ClienteRegister', compact('user'));
        
    }


    public function Pdf(){
        $user = cliente::all();
        //return view('cliente.pdf', compact('user'));
        $pdf = PDF::loadView('cliente.pdfCliente',['user'=>$user]);
        //$pdf->loadHTML('<h1>Test</h1>');
        return $pdf->stream();
        //return $pdf->download('clientes.pdf');
    }


    /*Manda al view crearCliente */
    public function createCliente(){
        return view('cliente.crearCliente');
    }

    public function createClientePropio(){
        return view('cliente.crearClientePropio');
    }


    /*Guarda los datos del cliente */
    public function storedCliente(){
        $this->validate(request(),['ci'=>'required',
                                                   'nombre'=>'required',
                                                   'a_paterno'=>'required',
                                                   'a_materno'=>'required',
                                                   'sexo'=>'required',
                                                   'telefono'=>'required',
                                                   'direccion'=>'required']);


        $user = cliente::create(request(['ci','nombre','a_paterno','a_materno','sexo','telefono','direccion']));
        $user->estado='h';
       
        
        $user->save();

        $bitacora = new bitacora();
        $bitacora->descripcion = 'Se agregó un cliente';
        $bitacora->user_name = auth()->user()->name;
        $bitacora->save();

        return redirect()->route('admin.listarcliente');     
    }


 /*Guarda los datos del cliente */
 public function storedClientePropio(){


    $this->validate(request(),['name'=>'required','email'=>'required|email','password'=>'required|confirmed',]);
       
    
    $user = User::create(request(['name','email','password']));
        $user->role='cliente';

        $user->save();

    $this->validate(request(),['ci'=>'required',
                                               'nombre'=>'required',
                                               'a_paterno'=>'required',
                                               'a_materno'=>'required',
                                               'sexo'=>'required',
                                               'telefono'=>'required',
                                               'direccion'=>'required']);


    $usercliente = cliente::create(request(['ci','nombre','a_paterno','a_materno','sexo','telefono','direccion']));
    $usercliente->estado='h';
    $usercliente->user_id=$user->id;
  

    $usercliente->save();

    $bitacora = new bitacora();
    $bitacora->descripcion = 'Se agregó un cliente de forma externa (nuevo)';
    $bitacora->user_name ='cliente nuevo';
    $bitacora->save();

    return redirect()->route('login.index');     
}



    /*////// Elimina a un cliente //// */

    public function destroyCliente($id){
        $user = cliente::find($id);
        $user->delete();
        $bitacora = new bitacora();
        $bitacora->descripcion = 'Se eliminó un cliente';
        $bitacora->user_name = auth()->user()->name;
        $bitacora->save();
        return redirect()->route('admin.listarcliente');
    }

    /*///// Edita un cliente////// */

    public function editCliente($id){
        $user = cliente::find($id);
        return view('cliente.editarCliente',compact('user'));
    }

    /* cambia los datos al editar presionando el button */
    public function updateCliente(Request $request, $id){
        $user = cliente::find($id);
        $user->ci = $request->ci;
        $user->nombre = $request->nombre;
        $user->a_paterno = $request->a_paterno;
        $user->a_materno = $request->a_materno;
        $user->sexo = $request->sexo;
        $user->telefono = $request->telefono;
        $user->direccion = $request->direccion;
        $user->estado = $request->estado;
       
        $user->save();
         
        $bitacora = new bitacora();
        $bitacora->descripcion = 'Se editó los datos de un cliente';
        $bitacora->user_name = auth()->user()->name;
        $bitacora->save();


        return redirect()->route('admin.listarcliente');

    }
}
