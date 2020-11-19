<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('users')->insert(array(
        	'id_rol' 	  => 1,
			'email' 	  => 'usuario@usuario.com',
			'password'	  => \Hash::make('usuario1234'),
		)); 

        \DB::table('personas_54')->insert(array(
            'id_user'        => 1,
            'nombre'         => 'Usuario',
            'email'          => 'usuario@usuario.com',
            'tipo_documento' => 'V',
            'num_documento'  => '12345678',
            'direccion'      => 'Maracay',
            'telefono'       => '12345678'
        )); 
    }
}
