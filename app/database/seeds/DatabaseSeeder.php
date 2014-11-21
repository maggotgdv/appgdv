<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		// $this->call('UserTableSeeder');

		DB::table('estadousuario')->insert(array('estadoUsuario_Descripcion'=>'Activo'));
		DB::table('estadousuario')->insert(array('estadoUsuario_Descripcion'=>'Inactivo'));
		DB::table('estadousuario')->insert(array('estadoUsuario_Descripcion'=>'Eliminado'));
		$this->command->info('Estados creados en estadoUsuario');

		//LLENADO TABLA ROLES
		DB::table('roles')->insert(array('roles_Descripcion'=>'Super_Usuario'));
		DB::table('roles')->insert(array('roles_Descripcion'=>'Administrador'));
		DB::table('roles')->insert(array('roles_Descripcion'=>'Usuario_Final'));

		//LLENADO DE TABLA DIA
		DB::table('dia')->insert(array('dia_Nombre'=>'Lunes'));
		DB::table('dia')->insert(array('dia_Nombre'=>'Martes'));
		DB::table('dia')->insert(array('dia_Nombre'=>'Miercoles'));
		DB::table('dia')->insert(array('dia_Nombre'=>'Jueves'));
		DB::table('dia')->insert(array('dia_Nombre'=>'Viernes'));
		DB::table('dia')->insert(array('dia_Nombre'=>'Sabado'));
		DB::table('dia')->insert(array('dia_Nombre'=>'Domingo'));

		//LLENADO DE TABLA CATEGORIAS
		DB::table('categorias')->insert(array('categorias_SubCategorias'=>null, 'categorias_Nombre'=>'Comida', 'categorias_Color'=>'#12FF56','categorias_Icono'=> 'http://amepozuelo.com/wp-content/uploads/2012/06/Icono-Comida.png', 'categorias_Nivel'=>1));
		DB::table('categorias')->insert(array('categorias_SubCategorias'=>null, 'categorias_Nombre'=>'Ocio', 'categorias_Color'=>'#FF0A22','categorias_Icono'=> 'http://www.flaticon.com/png/256/8655.png', 'categorias_Nivel'=>1));
		DB::table('categorias')->insert(array('categorias_SubCategorias'=>null, 'categorias_Nombre'=>'Vestimenta', 'categorias_Color'=>'#0A2FF2','categorias_Icono'=> 'http://monaguillosdelaasuncion.files.wordpress.com/2011/09/can-stock-photo_csp3175599.jpg?w=500', 'categorias_Nivel'=>1));
		DB::table('categorias')->insert(array('categorias_SubCategorias'=>1, 'categorias_Nombre'=>'Cevicheria', 'categorias_Color'=>'#F0A522','categorias_Icono'=> 'http://revista.peruanosenusa.net/wp-content/gallery/comida-peruana/ceviche4.jpg', 'categorias_Nivel'=>2));
		DB::table('categorias')->insert(array('categorias_SubCategorias'=>2, 'categorias_Nombre'=>'Discotecas', 'categorias_Color'=>'#00045F','categorias_Icono'=> 'http://www.urdi.com.ar/php/wp-content/uploads/2008/12/icono-entretenimientos.jpg', 'categorias_Nivel'=>2));
	}

}
