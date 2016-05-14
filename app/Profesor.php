<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
	
use App\Centro ;
use App\Tema ;

class Profesor extends Model
{
    protected $table = 'profesor';
	protected $fillable = array('nombre','apellidos','mail','user','pass','avatar', 'nacimiento', 'centro_id', 'enlace_avatar', 'es_admin');
	protected $guarded = array('id');
	// protected $hidden = array('created_at','updated_at');
	public $timestamps = false;

	public function centro(){

		return $this->belongsTo('App\Centro');
	}

	// public function mapas(){
	
	// 	return $this->hasMany('App\Mapa','profesor_id');
	// }
	public function temas(){
	
		return $this->hasMany('App\Tema','profesor_id');
	}
	public function my_centro(){
		
		return $centro = Centro::find($this->centro_id) -> nombre;
		 
	}

}
