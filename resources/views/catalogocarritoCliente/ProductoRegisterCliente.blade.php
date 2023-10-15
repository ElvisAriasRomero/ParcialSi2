@extends('layouts.app')




<!-- AQUI INICIA LAS OPCIONES SUPERIORES   #####################################################################################-->


<!-- #AQUI INICIA EL DACHSBOARDDDDDD######################################################################################### -->

    <!DOCTYPE html>
    <html lang="en">
    
    <head>
    
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
    
        <title>Admin2023</title>
    
        <!-- Custom fonts for this template-->
        <link href="{{asset('bsadmin/vendor/fontawesome-free/css/all.min.css  ')}}" rel="stylesheet" type="text/css">
        <link
            href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
            rel="stylesheet">
    
        <!-- Custom styles for this template-->
        <link href=" {{asset('bsadmin/css/sb-admin-2.min.css')}}" rel="stylesheet">

           <!-- Custom styles for this page -->
        <link href="{{asset('bsadmin/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">

    </head>
    
    <body id="page-top">
    
        <!-- Page Wrapper -->
        <div id="wrapper">
    
            <!-- Sidebar -->
            <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
    
                <!-- Sidebar - Brand -->
                <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{route('cliente.listarcatalogocliente')}}">
                    
                    <div class="sidebar-brand-text mx-3"> E-COMMERCE</div>
                </a>
    
                <!-- Divider -->
                <hr class="sidebar-divider my-0">
    
                <!-- Nav Item - Dashboard -->
                <li class="nav-item active">
                    <a class="nav-link" href="{{route('cliente.listarcatalogocliente')}}">
                        <i class="fas fa-fw fa-tachometer-alt"></i>
                        <span>INICIO</span></a>
                </li>
    
                              <!-- Divider -->
                              <hr class="sidebar-divider">
                      
                              <!-- Nav Item - Pages Collapse Menu -->
                              <li class="nav-item">
                                  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                                      aria-expanded="true" aria-controls="collapseTwo">
                                      <i class="fas fa-fw fa-cog"></i>
                                      <span>Entregas</span>
                                  </a>
                                  <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                                      <div class="bg-white py-2 collapse-inner rounded">
                                                 
                                          <a class="collapse-item" href="{{route('cliente.listarentrega')}}"> Entregas</a> 
                                           <!-- encamina hacia las rutas -->
                                           {{-- <a class="collapse-item" href="{{route('admin.listarproducto')}}">Productos</a> --}}
                                           {{-- <a class="collapse-item" href="{{route('admin.listarcatalogo')}}">Catalogo</a>  --}}               
                                      </div>
                                  </div>
                              </li>

                <!-- Divider -->
                <hr class="sidebar-divider d-none d-md-block">
    
                <!-- Sidebar Toggler (Sidebar) -->
                <div class="text-center d-none d-md-inline">
                    <button class="rounded-circle border-0" id="sidebarToggle"></button>
                </div>
    
                <!-- Sidebar Message -->
                <div class="sidebar-card d-none d-lg-flex">
                  
                    <p class="text-center mb-2"><strong> Dashboard</strong> items, components, and more!</p>
                    
                </div>
    
            </ul>
            <!-- End of Sidebar -->
    
            <!-- Content Wrapper -->
            <div id="content-wrapper" class="d-flex flex-column">
    
                <!-- Main Content -->
                <div id="content">
    
                    <!-- Topbar -->
                    <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
    
                        <!-- Sidebar Toggle (Topbar) -->
                        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                            <i class="fa fa-bars"></i>
                        </button>
    

                        <!-- Topbar Navbar -->
                        <ul class="navbar-nav ml-auto">
    
                            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                            <li class="nav-item dropdown no-arrow d-sm-none">
                                <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-search fa-fw"></i>
                                </a>
                                <!-- Dropdown - Messages -->
                                <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                    aria-labelledby="searchDropdown">
                                    <form class="form-inline mr-auto w-100 navbar-search">
                                        <div class="input-group">
                                            <input type="text" class="form-control bg-light border-0 small"
                                                placeholder="Search for..." aria-label="Search"
                                                aria-describedby="basic-addon2">
                                            <div class="input-group-append">
                                                <button class="btn btn-primary" type="button">
                                                    <i class="fas fa-search fa-sm"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </li>
    

    
                            <!-- Nav Item - Messages -->
                            <li class="nav-item dropdown no-arrow mx-1">
                                <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-envelope fa-fw"></i>
                                    <!-- Counter - Messages -->
                                    <span class="badge badge-danger badge-counter">7</span>
                                </a>
                                <!-- Dropdown - Messages -->
                                <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                    aria-labelledby="messagesDropdown">
                                    <h6 class="dropdown-header">
                                        Message Center
                                    </h6>
                                    <a class="dropdown-item d-flex align-items-center" href="#">
                                        <div class="dropdown-list-image mr-3">
                                            <img class="rounded-circle" src="img/undraw_profile_1.svg"
                                                alt="...">
                                            <div class="status-indicator bg-success"></div>
                                        </div>
                                        <div class="font-weight-bold">
                                            <div class="text-truncate">Hi there! I am wondering if you can help me with a
                                                problem I've been having.</div>
                                            <div class="small text-gray-500">Emily Fowler · 58m</div>
                                        </div>
                                    </a>
                                    <a class="dropdown-item d-flex align-items-center" href="#">
                                        <div class="dropdown-list-image mr-3">
                                            <img class="rounded-circle" src="img/undraw_profile_2.svg"
                                                alt="...">
                                            <div class="status-indicator"></div>
                                        </div>
                                        <div>
                                            <div class="text-truncate">I have the photos that you ordered last month, how
                                                would you like them sent to you?</div>
                                            <div class="small text-gray-500">Jae Chun · 1d</div>
                                        </div>
                                    </a>
                                    <a class="dropdown-item d-flex align-items-center" href="#">
                                        <div class="dropdown-list-image mr-3">
                                            <img class="rounded-circle" src="img/undraw_profile_3.svg"
                                                alt="...">
                                            <div class="status-indicator bg-warning"></div>
                                        </div>
                                        <div>
                                            <div class="text-truncate">Last month's report looks great, I am very happy with
                                                the progress so far, keep up the good work!</div>
                                            <div class="small text-gray-500">Morgan Alvarez · 2d</div>
                                        </div>
                                    </a>
                                    <a class="dropdown-item d-flex align-items-center" href="#">
                                        <div class="dropdown-list-image mr-3">
                                            <img class="rounded-circle" src="https://source.unsplash.com/Mv9hjnEUHR4/60x60"
                                                alt="...">
                                            <div class="status-indicator bg-success"></div>
                                        </div>
                                        <div>
                                            <div class="text-truncate">Am I a good boy? The reason I ask is because someone
                                                told me that people say this to all dogs, even if they aren't good...</div>
                                            <div class="small text-gray-500">Chicken the Dog · 2w</div>
                                        </div>
                                    </a>
                                    <a class="dropdown-item text-center small text-gray-500" href="#">Read More Messages</a>
                                </div>
                            </li>
    
                            <div class="topbar-divider d-none d-sm-block"></div>
    
                            <!-- Nav Item - User Information -->
                            <li class="nav-item dropdown no-arrow">
                                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="mr-2 d-none d-lg-inline text-gray-600 small"><b>{{ auth()->user()->name}}</b></span>
                                    <img class="img-profile rounded-circle"
                                        src="{{asset('bsadmin/undraw_profile.svg')}}">
                                </a>
                                <!-- Dropdown - User Information -->
                                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                    aria-labelledby="userDropdown">
                                    <a class="dropdown-item" href="#">
                                        <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Profile
                                    </a>
                                    <a class="dropdown-item" href="#">
                                        <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Settings
                                    </a>
                                    <a class="dropdown-item" href="#">
                                        <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Activity Log
                                    </a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Logout
                                    </a>
                                </div>
                            </li>
    
                        </ul>
    
                    </nav>
                    <!-- End of Topbar -->
    
                    <!-- Begin Page Content -->

<!-- ########################################################################################## -->



<div class="container-fluid">
    
  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800"> </h1>
      <a href="{{route('cliente.carrito')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
              class="fas fa-shopping-cart fa-sm text-blue-50 "></i> Ver Carrito </a>
  </div>

  <!-- Content Row -->


<!-- ########################################################################################## -->

   
<!--  AQUI INICIA LAS OPCIONES ANTERIORESSS        ######################################################################################### -->
         

          <!-- #############################################################3######-->

        
  <h1 class="text-5xl text-center font-bold py-6">Catalogo </h1>

  <!-- #############################################################3######--> 


  <div class="container-fluid">

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-4">
       {{--  <h6 class="m-0 font-weight-bold text-primary">CATALOGO DEL CLIENTE </h6> --}}
    </div>
    <div class="row justify-content-center">
        <div class="col-lg-11">
            {{-- <div class="row">
                <div class="col-lg-7">
                    <h4>Productos</h4>
                </div>
            </div> --}}
            <hr>
            <div class="row">
                @foreach($user as $pro)
                <div class="col-lg-3">
                    <div class="card" style="margin-bottom: 20px; height: auto;">
                       
                        <div class="card-body">
                             <img src="{{asset('imagenes/productos/'.$pro->imagen)}}" alt="{{$pro->nombre}}" height="300px" width="300px" class="img-thumbnail">
                            <a href=""><h6 class="card-title">{{ $pro->nombre }} :: {{ $pro->marca }}</h6></a>
                            <p>${{ $pro->precio_comercial}}</p>
                            <p>Stock : {{ $pro->stock}}</p>
                            <td class="p-3">
                                <form action="{{route("cliente.agregarProductoVenta",$pro->id)}}" method="post" class="row">
                                    @csrf
                                <div class="col-12 col-md-7">                          
                                          <label for="ci">Cantidad</label>
                                        <input type="number" class="form-control" value='1'  name="cantidad" placeholder="cantidad">
                                        <div class="form-group">
                                            <button name="accion" value="cargar" type="submit" class="btn btn-success">Cargar
                                            </button>    
                                        </div>                  
                                      
                                </div>
                               
                               
                                </form>  
                              </td>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
  <!--####################################################################################3#######-->     
   
 <!-- BEGIN: Users Layout -->
  <!-- 
@if(session("productos") !== null)
<div class="table-responsive">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Codigo</th>
                <th>Nombre</th>
                <th>Precio</th>
                <th>Cantidad</th>
                <th>Sub Total</th>
             
                <th>Actions</th>
            </tr>
        </thead>
        <body>
            @foreach(session("productos") as $producto)
                <tr>
                    <td>{{$producto->id}}</td>
                    <td>{{$producto->nombre}}</td>
                    <td>{{number_format($producto->precio_comercial,2)}}</td>
                    <td>{{$producto->cantidad}}</td>
                    <td>{{number_format($producto->Subtotal,2)}}</td>
                  
                    <td>
                        <form action="{{route("admin.quitarProductoDeVenta")}}" method="post">
                            @method("delete")
                            @csrf
                            <input type="hidden" name="indice" value="{{$loop->index}}">
                            <button type="submit" class="btn btn-danger">
                                <i class="fa fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </body>
        <body>
          
        </body>
    </table>
</div>
@endif
-->





</div>
<!-- /.container-fluid -->






<!-- AQUI TERMINA LAS OPCIONES ANTEIROESSSSSSSSSSSS########################################################################################## -->
    
                        <!-- Content Row -->
                        <div class="row">
    
                            <!-- Content Column -->
                            <div class="col-lg-6 mb-4">
 
                             
                             
    
                            </div>
    
                            <div class="col-lg-6 mb-4">
    
                             
                              
    
    
                            </div>
                        </div>
    
                    </div>
                    <!-- /.container-fluid -->
    
                </div>
                <!-- End of Main Content -->
    
              
    
            </div>
            <!-- End of Content Wrapper -->
    
        </div>
        <!-- End of Page Wrapper -->
    
        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>
    
        <!-- Logout Modal-->
        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <a class="btn btn-primary" href="{{route('login.destroy')}}" >Logout</a>
                    </div>
                </div>
            </div>
        </div>
    
        <!-- Bootstrap core JavaScript-->
        <script src="{{asset('bsadmin/vendor/jquery/jquery.min.js')}}"></script>
        <script src="{{asset('bsadmin/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    
        <script src="{{asset('bsadmin/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

        <script src="{{asset('bsadmin/vendor/datatables/jquery.dataTables.min.js')}}"></script>
        <script src="{{asset('bsadmin/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>
    
        <!-- Page level custom scripts -->
        <script src="{{asset('bsadmin/js/demo/datatables-demo.js')}}"></script>

        <!-- Custom scripts for all pages-->
        <script src="{{asset('bsadmin/js/sb-admin-2.min.js')}}"></script>
    
        
    
    </body>
    
    </html>


<!-- TERMINA EL DHASBOARDDDDDDDDDDDDD########################################################################################## -->

