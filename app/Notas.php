<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Alumno;
use App\Notas;
use App\Tarea;
use App\Tema;
class Notas extends Model
{
    // alumno_id, tarea_ids, nota, activa
    protected $table = 'resultado_tarea';
	protected $fillable = array('alumno_id', 'tarea_id', 'nota', 'activa');
	protected $guarded = array('id');
	// protected $hidden = array('enlace','enlace_audio');
	// protected $hidden = array('created_at','updated_at');
	public $timestamps =  false;

    public function alumnos(){

        return $this->belongsToMany('App\Alumno');
    }
     public function tareas(){

        return $this->belongsToMany('App\Tarea');
    }
    public function my_alumno(){
        
        return $alumno = Alumno::find($this->alumno_id);
         
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
        dd($tarea,  $tema);
        // return $tarea = Tema::find($this::my_tarea()->tema_id);
        return $tema;
    }

    
}
