<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('roles_54')->insert(array(
        	'nombre'      =>  'Usuario',
			'descripcion' =>  'Usuario común',
		));   

		\DB::table('roles_54')->insert(array(
        	'nombre'      =>  'Proveedor',
			'descripcion' =>  'Proveedor de artículos',
		));     
    }
}
