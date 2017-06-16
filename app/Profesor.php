<?php namespace App;

use Illiminate\Database\Eloquent\Model;


/**
* 
*/
class Profesor extends Model
{
	protected $fillable = ['nombre','direccion', 'telefono', 'profesion'];

	protected $hidden = ['id','created_at','updated_at'];
	
	public function cursos()
	{	
		//Un profesor tiene muchos cursos
		return $this->hasMany('App\Curso');
	}

	protected $table = 'profesores';
	
}