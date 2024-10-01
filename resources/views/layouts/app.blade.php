<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title') -E-Commerce </title>
    
    <!-- Tailwind CSS Link -->
    <link rel="stylesheet" 
    href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.0.1/tailwind.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/a23e6feb03.js"></script>
  </head>
  <body class="bg-gray-100 text-gray-800">
  <nav class="flex py-2 bg-green-300 text-white">
  <ul class="w-1/2 px-16 ml-auto flex justify-end pt-1">
    @if(auth()->check()) 
    <li class="mx-6">
      <p class="text-xl">Welcome <b>{{ auth()->user()->name}}</b></p>
    </li>
    
    <li>
      <a href="{{route('login.destroy')}}" class="font-semibold border-2 border-white py-2 px-4 rounded-md hover:bg-white hover:text-green-700">Logout</a>
    </li>
    
    @else
    <li class="mx-6">
      <a href="{{route('login.index')}}" class="flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">Login</a>
    </li>
    @endif
  </ul>
</nav>






  @yield('content')

  

  </body>
</html>