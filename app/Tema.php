<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Tarea;
use App\Profesor;
use App\Tema;


class Tema extends Model
{	
    ////
    protected $table = 'tema';
	protected $fillable = array('titulo', 'descripcion', 'enlace','enlace_imagen', 'profesor_id');
	protected $guarded = array('id');
	// protected $hidden = array('enlace','enlace_audio');
	public $timestamps =  false;

	public function tareas(){

		return $this->hasMany('App\Tarea','tema_id');
	}

	public function profesor(){

		return $this->belongsTo('App\Profesor');
	}
	public function my_profesor(){

		$profesor = Profesor::find($this->profesor_id) ;		
		return $profesor-> nombre . $profesor -> apellidos;
		 
	}
}
