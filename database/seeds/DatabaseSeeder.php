<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

use App\Estudiante;
use App\Profesor;
use App\Curso;



class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		//sentencia que desabilita la verificacion de claves foraneas
		//para poder truncar los modelos, esto es, antes de hacer la insercion
		//borramos todo lo que tiene el modelo (datos) y luego insertamos
		DB::statement('SET FOREIGN_KEY_CHECKS = 0');
		Estudiante::truncate();
		Profesor::truncate();
		Curso::truncate();
		DB::table('curso_estudiante')->truncate();

		//insercion de los elementos
		factory(Profesor::class,50)->create();

		factory(Estudiante::class,500)->create();

		factory(Curso::class,40)->create(['profesor_id' => mt_rand(1,50)])
		->each(function($curso)
		{
			//por cada instancia de un curso se asignara un conjunto aleatorio de estudiantes
			$curso->estudiantes()->attach(array_rand(range(1,500),40));
		});

		
		// $this->call('UserTableSeeder');
	}

}
