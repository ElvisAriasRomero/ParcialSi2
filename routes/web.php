<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BitacoraController;

use App\Http\Controllers\RolController;

use App\Http\Controllers\ClienteController;


// DESDE AQUI INICIA LOS METODOS DEL PROYECTO 
use App\Http\Controllers\PersonalController;

use App\Http\Controllers\VentaController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\CatalogoController;
use App\Http\Controllers\EntregaController;

//CONTROLADORES PARA EL CLIENTE
use App\Http\Controllers\CatalogoClienteController;
use App\Http\Controllers\VentaClienteController;
use App\Http\Controllers\EntregaClienteController;


//CONTROLADOR DEL PERSONA 
use App\Http\Controllers\EntregaPersonalController;


Route::get('/', function () {
    return view('home');
})->middleware('auth');

Route::get('/home', function () { return view('home');});



/*Rutas para inicio de session */
/*Ruta de registro de usuario*/
Route::get('/register',[RegisterController::class, 'create'])->middleware('guest')->name('register.index');
Route::post('/register',[RegisterController::class, 'store'])->name('register.store');
/*ruta de inicio de la session */
Route::get('/login',[SessionsController::class, 'create'])->middleware('guest')->name('login.index');
Route::post('/login',[SessionsController::class, 'store'])->name('login.store');
/*Ruta de finalizar session */
Route::get('/logout',[SessionsController::class, 'destroy'])->middleware('auth')->name('login.destroy');

/*///////////////////////////////////
////Rutas para el administrador////// 
/////////////////////////////////////*/

Route::get('/admin',[AdminController::class,'index'])->middleware('auth.admin')->name('admin.index');

/*/////////// CLIENTE////////////////// */

/*Rutas para que el administrador registre a un cliente*/
Route::get('/admin/registrarCliente',[AdminController::class,'registrarC'])->middleware('auth.admin')->name('admin.registrarcliente');

Route::get('/admin/registrarCliente/crear',[AdminController::class,'createCliente'])->middleware('auth.admin')->name('admin.crearcliente');
Route::post('/admin/registrarCliente/crear/create',[AdminController::class,'storedCliente'])->middleware('auth.admin')->name('admin.storedCliente');

/*Ruta para que el administrador elimine a un cliente */
Route::get('/admin/registrarCliente/deleteC/{id}',[AdminController::class,'destroyCliente'])->middleware('auth.admin')->name('admin.destroycliente');

/*Ruta para que el administrador edite los datos de un cliente */
Route::get('/admin/registrarCliente/editarC/{id}',[AdminController::class,'editCliente'])->middleware('auth.admin')->name('admin.editcliente');
Route::post('/admin/registrarCliente/editarC1/{id}',[AdminController::class,'updateCliente'])->middleware('auth.admin')->name('admin.updatecliente');


/*/////////// USUARIO /////////////*/

/*Rutas para que el administrador registre a un Usuario*/
Route::get('/admin/registrarUsuario',[AdminController::class,'registrarU'])->middleware('auth.admin')->name('admin.registrarusuario');
Route::get('/admin/registrarUsuario/crear',[AdminController::class,'createUsuario'])->middleware('auth.admin')->name('admin.crearusuario');
Route::post('/admin/registrarUsuario/crear/create',[AdminController::class,'storedUsuario'])->middleware('auth.admin')->name('admin.storedusuario');

/*Ruta para que el administrador elimine a un Usuario */
Route::get('/admin/registrarUsuario/deleteU/{id}',[AdminController::class,'destroyUsuario'])->middleware('auth.admin')->name('admin.destroyusuario');

/*Ruta para que el administrador edite los datos de un Usuario*/
Route::get('/admin/registrarUsuario/editarV/{id}',[AdminController::class,'editUsuario'])->middleware('auth.admin')->name('admin.editusuario');
Route::post('/admin/registrarUsuario/editarV1/{id}',[AdminController::class,'updateUsuario'])->middleware('auth.admin')->name('admin.updateusuario');


/*///////// Rutas Rol/////*/
/*///////// Rutas Rol/////*/
// LISTAR ROLES
Route::get('/admin/roles',[RolController::class,'ListarRol'])->middleware('auth.admin')->name('admin.roles');
// CREAR ROLES
Route::get('/admin/registrarRol/crear',[RolController::class,'CreateRol'])->middleware('auth.admin')->name('admin.crearrol');
Route::post('/admin/registrarRol/crear/create',[RolController::class,'storedRol'])->middleware('auth.admin')->name('admin.storedRoles');
// EDITAR ROLES
Route::get('/admin/registrarRol/editarC/{id}',[RolController::class,'editRol'])->middleware('auth.admin')->name('admin.editRol');
Route::post('/admin/registrarRol/editarC1/{id}',[RolController::class,'updateRol'])->middleware('auth.admin')->name('admin.updaterol');
// ELIMINAR ROLES
Route::get('/admin/registrarRol/deleteC/{id}',[RolController::class,'destroyRol'])->middleware('auth.admin')->name('admin.destroyroles');







/*///////// Rutas del Personal/////*/
Route::get('/admin/registrarPersonal',[PersonalController::class,'ListarP'])->middleware('auth.admin')->name('admin.listarpersonal');
Route::get('/admin/registrarPersonal/crear',[PersonalController::class,'createPersonal'])->middleware('auth.admin')->name('admin.crearpersonal');
Route::post('/admin/registrarPersonal/crear/create',[PersonalController::class,'storedPersonal'])->middleware('auth.admin')->name('admin.storedPersonal');
Route::get('/admin/registrarPersonal/editarP/{id}',[PersonalController::class,'editPersonal'])->middleware('auth.admin')->name('admin.editpersonal');
Route::post('/admin/registrarPersonal/editarP1/{id}',[PersonalController::class,'updatePersonal'])->middleware('auth.admin')->name('admin.updatepersonal');
Route::get('/admin/registrarPersonal/deleteP/{id}',[PersonalController::class,'destroyPersonal'])->middleware('auth.admin')->name('admin.destroypersonal');


/*///////// Rutas administrar clientes/////*/

Route::get('/admin/registrarClientes',[ClienteController::class,'ListarC'])->middleware('auth.admin')->name('admin.listarcliente');

Route::get('/admin/registrarClientes/crear',[ClienteController::class,'createCliente'])->middleware('auth.admin')->name('admin.crearclientes');
Route::post('/admin/registrarClientes/crear/create',[ClienteController::class,'storedCliente'])->middleware('auth.admin')->name('admin.storedClientes');

/*Ruta para que el administrador elimine a un cliente */
Route::get('/admin/registrarClientes/deleteC/{id}',[ClienteController::class,'destroyCliente'])->middleware('auth.admin')->name('admin.destroyclientes');

/*Ruta para que el administrador edite los datos de un cliente */
Route::get('/admin/registrarClientes/editarC/{id}',[ClienteController::class,'editCliente'])->middleware('auth.admin')->name('admin.editclientes');
Route::post('/admin/registrarClientes/editarC1/{id}',[ClienteController::class,'updateCliente'])->middleware('auth.admin')->name('admin.updateclientes');

Route::get('/admin/registrarClientes/pdf',[ClienteController::class,'Pdf'])->middleware('auth.admin')->name('admin.pdfclientes');




/*///////// Rutas Bitacora/////*/
Route::get('/admin/bitacora',[BitacoraController::class,'ListarB'])->middleware('auth.admin')->name('admin.listarbitacora');
Route::get('/admin/bitacora/pdf',[BitacoraController::class,'Pdf'])->middleware('auth.admin')->name('admin.pdfbitacora');


/*///////// Rutas VENTA - DETALLE VENTA/////*/
Route::get('/admin/registrarVentas',[VentaController::class,'ListarV'])->middleware('auth.admin')->name('admin.listarventa');

Route::get('/admin/registrarVentas/crear',[VentaController::class,'createVenta'])->middleware('auth.admin')->name('admin.crearventa');
//ruta ver detalle de venta
Route::get('/admin/registrarDetalleVentas/{id}',[VentaController::class,'verDetalleVenta'])->middleware('auth.admin')->name('admin.verDetalle');
Route::get('/admin/registrarVentas/pdf',[VentaController::class,'Pdf'])->middleware('auth.admin')->name('admin.pdfventas');

Route::get('/admin/registrarDetalleVentaspdf/pdf/{id}',[VentaController::class,'PdfDetalle'])->middleware('auth.admin')->name('admin.pdfdetalleventas');

//aqui se crea la venta , pero pide el id del cliente 

Route::get('/admin/registrarVentasDetalles/crear/{id}',[VentaController::class,'createDetalleVenta'])->middleware('auth.admin')->name('admin.creardetalleventa');

//Route::get('/admin/registrarVentasDetalles/storedd/{id}',[VentaController::class,'addprod'])->middleware('auth.admin')->name('admin.addprod');

Route::post('/admin/registrarVentasDetalles/storet/{id}',[VentaController::class,'agregarProductoVenta'])->middleware('auth.admin')->name('admin.agregarProductoVenta');
//-----post


Route::Delete('/admin/eliminarVentasDetalles/storet/',[VentaController::class,'quitarProductoDeVenta'])->middleware('auth.admin')->name('admin.quitarProductoDeVenta');

Route::post('/admin/TerminarCancelarVentasDetalles/storet',[VentaController::class,'terminarOCancelarVenta'])->middleware('auth.admin')->name('admin.terminarOCancelarVenta');




/*/////////////////////////////////
////////// Rutas del producto//////
/////////////////////////////////// */

Route::get('/admin/registrarProducto',[ProductoController::class,'ListarP'])->middleware('auth.admin')->name('admin.listarproducto');
Route::get('/admin/registrarProducto/crear',[ProductoController::class,'createProducto'])->middleware('auth.admin')->name('admin.crearProducto');
Route::post('/admin/registrarProducto/crear/create',[ProductoController::class,'storedProducto'])->middleware('auth.admin')->name('admin.storedProducto');
Route::get('/admin/registrarProducto/editarP/{id}',[ProductoController::class,'editProducto'])->middleware('auth.admin')->name('admin.editproductos');
Route::post('/admin/registrarProducto/editarP1/{id}',[ProductoController::class,'updateProducto'])->middleware('auth.admin')->name('admin.updateproductos');
Route::get('/admin/registrarProducto/deleteP/{id}',[ProductoController::class,'destroyProducto'])->middleware('auth.admin')->name('admin.destroyproductos');

Route::get('/admin/registrarProducto/pdf',[ProductoController::class,'Pdf'])->middleware('auth.admin')->name('admin.pdfproductos');



/*/////////////////////////////////
////////// Rutas del Catalogo - CARRITO//////
/////////////////////////////////// */

Route::get('/admin/catalogo',[CatalogoController::class,'ListarC'])->middleware('auth.admin')->name('admin.listarcatalogo');
Route::get('/admin/carrito',[CatalogoController::class,'ListarCarrito'])->middleware('auth.admin')->name('admin.carrito');



/*/////////////////////////////////
////////// Rutas de las Entregas//////
/////////////////////////////////// */

Route::get('/admin/registrarEntrega',[EntregaController::class,'ListarE'])->middleware('auth.admin')->name('admin.listarentrega');
Route::get('/admin/registrarEntrega/editarE/{id}',[EntregaController::class,'editEntrega'])->middleware('auth.admin')->name('admin.editentrega');
Route::post('/admin/registrarEntrega/editarE1/{id}',[EntregaController::class,'updateEntrega'])->middleware('auth.admin')->name('admin.updateentrega');
Route::get('/admin/registrarEntregaCancelar/editarE4/{id}',[EntregaController::class,'updateEntregaCancelar'])->middleware('auth.admin')->name('admin.updateentregaCancelar');
Route::get('/admin/registrarEntregaEntregado/editarE4/{id}',[EntregaController::class,'updateEntregaEntregado'])->middleware('auth.admin')->name('admin.updateentregaEntregado');


/*Route::get('/admin/registrarProducto/crear',[ProductoController::class,'createProducto'])->middleware('auth.admin')->name('admin.crearProducto');
Route::post('/admin/registrarProducto/crear/create',[ProductoController::class,'storedProducto'])->middleware('auth.admin')->name('admin.storedProducto');
Route::get('/admin/registrarProducto/editarP/{id}',[ProductoController::class,'editProducto'])->middleware('auth.admin')->name('admin.editproductos');
Route::post('/admin/registrarProducto/editarP1/{id}',[ProductoController::class,'updateProducto'])->middleware('auth.admin')->name('admin.updateproductos');
Route::get('/admin/registrarProducto/deleteP/{id}',[ProductoController::class,'destroyProducto'])->middleware('auth.admin')->name('admin.destroyproductos');
*/
Route::get('/admin/registrarProducto/pdf',[ProductoController::class,'Pdf'])->middleware('auth.admin')->name('admin.pdfproductos');


/*///////// Rutas administrar clientes/////*/

Route::get('/admin/registrarClientes',[ClienteController::class,'ListarC'])->middleware('auth.admin')->name('admin.listarcliente');

Route::get('/admin/registrarClientes/crear',[ClienteController::class,'createCliente'])->middleware('auth.admin')->name('admin.crearclientes');
Route::post('/admin/registrarClientes/crear/create',[ClienteController::class,'storedCliente'])->middleware('auth.admin')->name('admin.storedClientes');

/*Ruta para que el administrador elimine a un cliente */
Route::get('/admin/registrarClientes/deleteC/{id}',[ClienteController::class,'destroyCliente'])->middleware('auth.admin')->name('admin.destroyclientes');

/*Ruta para que el administrador edite los datos de un cliente */
Route::get('/admin/registrarClientes/editarC/{id}',[ClienteController::class,'editCliente'])->middleware('auth.admin')->name('admin.editclientes');
Route::post('/admin/registrarClientes/editarC1/{id}',[ClienteController::class,'updateCliente'])->middleware('auth.admin')->name('admin.updateclientes');

Route::get('/admin/registrarClientes/pdf',[ClienteController::class,'Pdf'])->middleware('auth.admin')->name('admin.pdfclientes');

/* #####################################################################################################################################################*/
/* #####################################################################################################################################################*/
/* #####################################################################################################################################################*/

/*-----------------------------------------------------------rutas de los clientes--------------------------------------------------------------------- */
/* #####################################################################################################################################################*/
/* #####################################################################################################################################################*/
/* #####################################################################################################################################################*/

/*Ruta de registro de usuario*/
Route::get('/registerCliente',[ClienteController::class,'createClientePropio'])->middleware('guest')->name('registercliente.index');
//Route::post('/registercliente',[RegisterController::class, 'storecliente'])->name('registercliente.store');
Route::post('/registrarClientes/crearPropio',[ClienteController::class,'storedClientePropio'])->name('admin.storedClientesPropio');

Route::get('/cliente/catalogo',[CatalogoClienteController::class,'ListarC'])->middleware('auth.admin')->name('cliente.listarcatalogocliente');
Route::get('/cliente/carrito',[CatalogoClienteController::class,'ListarCarrito'])->middleware('auth.admin')->name('cliente.carrito');

/*///////// Rutas VENTA - DETALLE VENTA/////*/


//aqui se crea la venta , pero pide el id del cliente 

Route::post('/cliente/registrarVentasDetalles/storet/{id}',[VentaClienteController::class,'agregarProductoVenta'])->middleware('auth.admin')->name('cliente.agregarProductoVenta');
//-----post


Route::Delete('/cliente/eliminarVentasDetalles/storet/',[VentaClienteController::class,'quitarProductoDeVenta'])->middleware('auth.admin')->name('cliente.quitarProductoDeVenta');

Route::post('/cliente/TerminarCancelarVentasDetalles/storet',[VentaClienteController::class,'terminarOCancelarVenta'])->middleware('auth.admin')->name('cliente.terminarOCancelarVenta');


/*/////////////////////////////////
////////// Rutas de las Entregas CLIENTESSSS//////
/////////////////////////////////// */

Route::get('/cliente/registrarEntrega',[EntregaClienteController::class,'ListarE'])->middleware('auth.admin')->name('cliente.listarentrega');
Route::get('/cliente/registrarEntregaCancelar/editarE4/{id}',[EntregaClienteController::class,'updateEntregaCancelar'])->middleware('auth.admin')->name('cliente.updateentregaCancelar');
Route::get('/cliente/registrarEntregaEntregado/editarE4/{id}',[EntregaClienteController::class,'updateEntregaEntregado'])->middleware('auth.admin')->name('cliente.updateentregaEntregado');


/* #####################################################################################################################################################*/
/* #####################################################################################################################################################*/
/*//////////////////// Rutas de las Entregas PERSONAL //////
SOLO TENDRA PARA VER LAS ENTREGAS Y PONERLAS EN ENTREGADO
/////////////////////////////////// */

Route::get('/personal/registrarEntrega',[EntregaPersonalController::class,'ListarE'])->middleware('auth.admin')->name('personal.listarentrega');
Route::get('/personal/registrarEntregaCancelar/editarE4/{id}',[EntregaPersonalController::class,'updateEntregaCancelar'])->middleware('auth.admin')->name('personal.updateentregaCancelar');
Route::get('/personal/registrarEntregaEntregado/editarE4/{id}',[EntregaPersonalController::class,'updateEntregaEntregado'])->middleware('auth.admin')->name('personal.updateentregaEntregado');







