<?php

namespace Database\Seeders;

use App\Models\almacen;
use App\Models\cliente;
use App\Models\factura;
use App\Models\Producto;
use Illuminate\Database\Seeder;

use App\Models\proveedor;
use App\Models\compra;
use App\Models\personal;
use App\Models\User;
use App\Models\rol;
use App\Models\suministro;
use App\Models\venta;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(){
        // \App\Models\User::factory(10)->create();
        $user = new User;
        $user->name = 'admin';
        $user->carnet = '1234';
        $user->email =  'admin@ventaropa.com';
        $user->password = '12345';
        $user->role = 'admin';
        $user->save();

        $user = new User;
        $user->name = 'mamani';
        $user->carnet = '456546';
        $user->email =  'user2@gmail.com';
        $user->password = '1234';
        $user->role = 'admin';
        $user->save();

        $user = new User;
        $user->name = 'mamani';
        $user->carnet = '53452324';
        $user->email =  'user3@gmail.com';
        $user->password = '1234';
        $user->role = 'admin';
        $user->save();

        $user = new User;
        $user->name = 'cliente1';
        $user->carnet = '534523';
        $user->email =  'cliente1@gmail.com';
        $user->password = '1234';
        $user->role = 'cliente';
        $user->save();

        $user = new User;
        $user->name = 'cliente2';
        $user->carnet = '53452453';
        $user->email =  'cliente2@gmail.com';
        $user->password = '1234';
        $user->role = 'cliente';
        $user->save();

        $user = new User;
        $user->name = 'personal1';
        $user->carnet = '53459853';
        $user->email =  'personal1@gmail.com';
        $user->password = '1234';
        $user->role = 'personal';
        $user->save();

        $user = new User;
        $user->name = 'personal2';
        $user->carnet = '53498753';
        $user->email =  'personal2@gmail.com';
        $user->password = '1234';
        $user->role = 'personal';
        $user->save();

        $rols = new rol;
        $rols->descripcion = 'personal';
        $rols->save();

        $rols = new rol;
        $rols->descripcion = 'cliente';
        $rols->save();

        $rols = new rol;
        $rols->descripcion = 'admin';
        $rols->save();

        $user = new cliente;
        $user->ci = '88000';
        $user->nombre = 'joaquin';
        $user->a_paterno =  'chumacero';
        $user->a_materno= 'yupanqui';
        $user->sexo= 'm';
        $user->telefono = '12345678';
        $user->direccion = 'av. brasil';
        $user->estado = 'h';
        $user->user_id='4';
        $user->save();

        $user = new cliente;
        $user->ci = '99000';
        $user->nombre = 'saturnino';
        $user->a_paterno =  'mamani';
        $user->a_materno= 'yupanqui';
        $user->sexo= 'm';
        $user->telefono = '12345678';
        $user->direccion = 'av. brasil 2';
        $user->estado = 'h';
        $user->user_id='5';
        $user->save();

        $user = new personal();
        $user->ci = '97860';
        $user->nombre = 'saturnino';
        $user->a_paterno =  'mamanis';
        $user->a_materno= 'yupanquis';
        $user->sexo= 'm';
        $user->telefono = '12345678';
        $user->direccion = 'av. brasil 2';
        $user->estado = 'h';
        $user->user_id='6';
        $user->save();

        $user = new personal();
        $user->ci = '9789870';
        $user->nombre = 'saturnino2';
        $user->a_paterno =  'mamani2';
        $user->a_materno= 'yupanqui2';
        $user->sexo= 'm';
        $user->telefono = '3446478';
        $user->direccion = 'av. brasil 2432';
        $user->estado = 'h';
        $user->user_id='7';
        $user->save();

        $user = new Producto;
        $user->nombre = 'desarmador';
        $user->marca = 'total';
        $user->color =  'rojo';
        $user->stock= '100';
        $user->precio_comercial = '12';
        $user->precio_compra = '10';
        $user->imagen='desarmador.jpg';
        $user->save();

        $user = new Producto;
        $user->nombre = 'tenaza';
        $user->marca = 'total';
        $user->color =  'naranja';
        $user->stock= '100';
        $user->precio_comercial = '16';
        $user->precio_compra = '10';
        $user->imagen='tenaza.jpg';

        $user->save();
        $user = new Producto;
        $user->nombre = 'llave';
        $user->marca = 'total';
        $user->color =  'plomo';
        $user->stock= '100';
        $user->precio_comercial = '19';
        $user->precio_compra = '10';
        $user->imagen='llave.jpg';
        $user->save();
        $user = new Producto;
        $user->nombre = 'gato';
        $user->marca = 'total';
        $user->color =  'azul';
        $user->stock= '100';
        $user->precio_comercial = '90';
        $user->precio_compra = '70';
        $user->imagen='gato.jpg';
        $user->save();
      
    }




}
