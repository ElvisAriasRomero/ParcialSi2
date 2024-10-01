@extends('layouts.app')

@section('title','Editar Compra')

@section('content')
<nav class="bg-green-300 py-6 ">
    <a href="{{route('admin.listarcompra')}}" class="text-white mx-16 font-semibold border-2 border-white py-3 px-5 pt-1 h-10 rounded-md hover:bg-white hover:text-blue-700">Atras</a>
</nav>

<div class="block mx-auto my-12 p-8 bg-white w-1/3 borderr border-gray-200 rounded-lg shadow-lg">
<h1 class="text-3xl text-center font-bold">Editar Compra {{$user->name}}</h1>

<form action="{{route('admin.updatecompra',$user->id)}}" method="POST" >
    @csrf

    <h1 class="h3 mb-0 text-gray-800">Forma Pago</h1>
    <input type="text" class="border border-gray-200 rounded-md bg-gray-200 w-full text-lg placeholder-gray-900 p-2 my-2 focus:bg-white" placeholder="Forma Pago" id="forma_pago" name="forma_pago" value="{{$user->forma_pago}}">
    
    <h1 class="h3 mb-0 text-gray-800">Monto Total</h1>
    <input type="text" class="border border-gray-200 rounded-md bg-gray-200 w-full text-lg placeholder-gray-900 p-2 my-2 focus:bg-white" placeholder="Monto Total" id="monto_total" name="monto_total" value="{{$user->monto_total}}">

    <button type="sudmit" class="rounded-md bg-blue-500 w-full text-lg text-white font-semibold p-2 my-3 hover:bg-blue-600">Editar</button>

</form>





</div>
@endsection