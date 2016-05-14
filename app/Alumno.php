<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Centro;
use App\Notas;
use App\Profesor;


class Alumno extends Model
{
    //
    protected $table = 'alumno';
	protected $fillable = array('nombre','apellidos','mail','user','pass','avatar', 'nacimiento',  'profesor_id', 'centro_id', 'enlace_avatar');
	protected $guarded = array('id');
	// protected $hidden = array('created_at','updated_at');
	public $timestamps = false;

	public function centro(){

		return $this->belongsTo('App\Centro');
	}

	public function my_centro(){
		
		return $centro = Centro::find($this->centro_id) -> nombre;
		 
	}

public function profesor(){

		return $this->belongsTo('App\Profesor');
	}

	public function my_profesor(){
		
		return $centro = Profesor::find($this->profesor_id) -> nombre;
		 
	}


	public function notas()
    {
        return $this->belongsToMany('App\Notas', 'resultado_tarea');
    }

    public function my_notas(){
    	$notas = \DB::table('resultado_tarea')
                    ->where('alumno_id', '=', $this->id)
                    ->get();
		// $notas = Notas::whereHas('alumno_id', function($q){
			// $q->where('alumno_id', '=', $this->id );
		// }) -> get();
		// $notas = Notas::find($this->id);
		// $notas = Notas::has('alumno_id', '=', $this->id)->get();
		// $notas = Notas::with('alumno_id', '=', $this->id)->get();
		// $notas = Notas::with(['alumno_id' => function($q){
		// 	$q->where('alumno_id', '=', $this->id);
		// }])->get();
		// dd($notas);
		return $notas;
		 
	}

	public function my_puntuacion(){
		$notas = $this::my_notas();
		$puntuacion = 0;
		foreach ($notas as $nota){
			$puntuacion += $nota->nota;
		}
		// dd($notas, $puntuacion);
		return $puntuacion;
	}
}
