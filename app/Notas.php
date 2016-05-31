<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Alumno;
use App\Notas;
use App\Tarea;
use App\Tema;
class Notas extends Model
{
    protected $table = 'resultado_tarea';
	protected $fillable = array('alumno_id', 'tarea_id', 'nota', 'activa');
	protected $guarded = array('id');
	// protected $hidden = array('created_at','updated_at');
	public $timestamps =  false;

    public function alumnos(){

        return $this->belongsToMany('App\Alumno');
    }
    
    public function tareas(){

        return $this->belongsToMany('App\Tarea');
    }
    
    public function my_alumno(){
        $alumno = Alumno::find($this->alumno_id);
        if ($alumno){
            return $alumno;
        }        
    }

    public function my_tarea(){
        
        return $tarea = Tarea::find($this->tarea_id);
         
    }
    
    public function my_tema(){
        $tarea = \DB::table('tarea')
                    ->where('id','=',$this->tarea_id)
                    ->get();

        $tema = \DB::table('tema')
                    ->where('id', '=', $tarea->tema_id)
                    ->get();
        return $tema;
    }

    
}
