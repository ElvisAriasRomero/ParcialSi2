@extends('layouts.app')

@section('title','Editar Producto')

@section('content')
<nav class="bg-green-300 py-6 ">
    <a href="{{route('admin.listarproducto')}}" class="text-white mx-16 font-semibold border-2 border-white py-3 px-5 pt-1 h-10 rounded-md hover:bg-white hover:text-blue-700">Atras</a>
</nav>

<div class="block mx-auto my-12 p-8 bg-white w-1/3 borderr border-gray-200 rounded-lg shadow-lg">
<h1 class="text-3xl text-center font-bold">Asignar personal para la Entrega - cambiar el estado a "ENVIO" o "CANCELADO"{{$user->name}}</h1>

<form action="{{route('admin.updateentrega',$user->id)}}" method="POST" >
    @csrf



    <div class="form-group">
        <label for="codigo">PERSONAL DELIVERY</label>
        <select required class="form-control" name="codigo" id="codigo">
            @foreach($prod as $p)
                <option value="{{$p->id}}">{{$p->nombre}}  - telefono: {{$p->telefono}} - estado: {{$p->estado}} </option>
            @endforeach
        </select>
        
    </div>  


    <h1 class="h3 mb-0 text-gray-800">estado</h1>
    <input type="text" class="border border-gray-200 rounded-md bg-gray-200 w-full text-lg placeholder-gray-900 p-2 my-2 focus:bg-white" placeholder="estado" id="estado" name="estado" value="{{$user->estado}}">

 
    <button type="sudmit" class="rounded-md bg-blue-500 w-full text-lg text-white font-semibold p-2 my-3 hover:bg-blue-600">Editar</button>

</form>





</div>
@endsection