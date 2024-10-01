@extends('layouts.app')

@section('title','Login')

@section('content')

<div class="block mx-auto my-12 p-8 bg-gray-100 w-1/3 border border-gray-300 rounded-lg shadow-lg">

  <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 90rem;"
  src="{{asset('store.JPG')}}" alt="...">
  
  <h1 class="text-3xl text-center font-bold text-gray-800">CLOTHING STORE</h1>

  <form class="mt-4" method="POST" action="">
    @csrf
    <input type="email" class="border border-gray-300 rounded-md bg-white w-full text-lg placeholder-gray-600 p-2 my-2 focus:bg-gray-50" placeholder="Email" id="email" name="email">
    <input type="password" class="border border-gray-300 rounded-md bg-white w-full text-lg placeholder-gray-600 p-2 my-2 focus:bg-gray-50" placeholder="Contraseña" id="password" name="password">

    @error('message')
      <p class="border border-red-500 rounded-md bg-red-100 w-full text-red-600 p-2 my-2">{{$message}}</p>
    @enderror

    <button type="submit" class="w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
      Entrar
    </button>

  </form>

  <div class="mt-4 text-center">
    <a class="collapse-item text-blue-600 hover:underline" href="{{route('registercliente.index')}}">Registrarse</a>
  </div>

</div>

@endsection