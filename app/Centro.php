<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Profesor;
use App\Alumno;
class Centro extends Model
{
    protected $table = 'centro';
	protected $fillable = array('nombre','direccion');
	protected $guarded = array('id');
	// protected $hidden = array('created_at','updated_at');
	public $timestamps =  false;

	public function profesores(){
		return $this->hasMany('App\Profesor','centro_id');
	}

	public function alumnos(){
		return $this->hasMany('App\Alumno','centro_id');
	}

}
