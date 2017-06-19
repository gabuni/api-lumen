<?php namespace App;

use Illuminate\Database\Eloquent\Model;


/**
* 
*/
class Curso extends Model
{
	protected $fillable = ['titulo','descripcion', 'valor'];

	protected $hidden = ['id','created_at','updated_at'];
	
	public function profesor()
	{
		//un curso es dictado por un profesor
		return $this->belongsTo('App\Profesor');
	}

	public function estudiantes()
	{
		//un curso puede tener muchos estudiantes
		return $this->belongsToMany('App\Estudiante');
	}

	protected $table = 'cursos';

}