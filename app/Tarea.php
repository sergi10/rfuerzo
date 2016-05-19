<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Tema;
use App\Tarea;
use App\Notas;

class Tarea extends Model
{
    //
  protected $table = 'tarea';
	protected $fillable = array('nombre', 'descripcion', 'enlace_tarea', 'tema_id');
	protected $guarded = array('id');
	public $timestamps =  false;
	
	
    public function tema(){

        return $this->belongsTo('App\Tema');
    }
	public function notas()
    {
        return $this->belongsToMany('App\Notas', 'resultado_tarea');
    }

  
    public function my_tema()
    {
        $tema = Tema::find($this->tema_id) ;        
        return $tema;
    }
  
    public function nombre_con_tema(){
        $tema = Tema::find($this->tema_id) ;        
        $nombre_con_tema = $this->nombre . ' ' . $tema->titulo;
        return $nombre_con_tema;

    }
}
