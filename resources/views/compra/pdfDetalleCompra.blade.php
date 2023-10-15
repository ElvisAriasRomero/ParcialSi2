<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>PDF Detalle de Ventas</title>

  
</head>
<body>
<h1 class="text-3xl text-center font-bold">Detalle de Compra</h1>


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
                            <th>Compra ID</th>
                            <th>Producto ID</th>
                            <th>Cantidad</th>
                            <th>Precio</th>
                            <th>Almacen ID</th>
                            <th>Created_at</th>
                      </tr>
                  </thead>

                  
                  <tbody>

      <!--############################################33#######-->

      @foreach($user as $row)

      <tr>
                <td class="py-3 px-7">{{$row->id}}</td>
                <td class="p-3">{{$row->compra_id}}</td>
                <td class="p-3 text-center">{{$row->producto_id}}</td>
                <td class="p-3 text-center">{{$row->cantidad}}</td>
                <td class="p-3 text-center">{{$row->precio}}</td>
                <td class="p-3 text-center">{{$row->almacen_id}}</td>
                <td class="p-3 text-center">{{$row->created_at}}</td>
       
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