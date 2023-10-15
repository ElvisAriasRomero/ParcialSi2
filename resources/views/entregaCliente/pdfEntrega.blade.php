<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>PDF Producto</title>

    
    <link href="{{public_path('bsadmin/vendor/fontawesome-free/css/all.min.css  ')}}" rel="stylesheet" type="text/css">
        <link
            href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
            rel="stylesheet">
    
        <!-- Custom styles for this template-->
        <link href=" {{public_path('bsadmin/css/sb-admin-2.min.css')}}" rel="stylesheet">

           <!-- Custom styles for this page -->
        <link href="{{public_path('bsadmin/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">

</head>
<body>
<h1 class="text-3xl text-center font-bold">Lista de Productos</h1>


<!-- #############################################################3######--> 


<div class="container-fluid">

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
      <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Datos</h6>
      </div>
      <div class="card-body">
          <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                      <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Plaza</th>
                        <th>Color</th>
                        <th>Tipo</th>
                        <th>Precio Comercial</th>
                        <th>Precio Credito</th>
                      </tr>
                  </thead>

                  
                  <tbody>

      <!--############################################33#######-->

      @foreach($user as $row)

      <tr>
            <td class="py-3 px-7">{{$row->id}}</td>
            <td class="p-3">{{$row->nombre}}</td>
            <td class="p-3 text-center">{{$row->plaza}}</td>
            <td class="p-3 text-center">{{$row->color}}</td>
            <td class="p-3 text-center">{{$row->tipo}}</td>
            <td class="p-3 text-center">{{$row->precio_comercial}}</td>
            <td class="p-3 text-center">{{$row->precio_credito}}</td>
       
        </tr>
  
    @endforeach

        <!--################################3#######-->              
                  </tbody>
              </table>
          </div>
      </div>
  </div>

</div>
</body>
</html>