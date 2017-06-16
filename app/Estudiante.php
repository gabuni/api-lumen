<?php namespace App;

use Illiminate\Database\Eloquent\Model;


/**
* 
*/
class Estudiante extends Model
{
	protected $fillable = ['nombre','direccion', 'telefono', 'carrera'];

	protected $hidden = ['id','created_at','updated_at'];
	
	public function cursos()
	{
		//un estudiante puede pertenecer a muchos cursos
		return $this->belongsToMany('App\Curso');
	}

	protected $table = 'estudiantes';

}