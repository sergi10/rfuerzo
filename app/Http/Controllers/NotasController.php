<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Alumno as Alumno;
use App\Tarea as Tarea;
use App\Notas as Notas;
class NotasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    // alumno_id, tarea_id, nota, activa
        $notas = Notas::all();
        return \View::make('notas.index', array('datos'=>$notas));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $alumnos = Alumno::lists('apellidos', 'id');
        $tareas = Tarea::lists('nombre', 'id');
        return \View::make('notas.create', array('tareas'=>$tareas, 'alumnos'=>$alumnos));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    // alumno_id, tarea_id, nota, activa
        $rules = array(
            'alumno_id'    => 'required',           
            'tarea_id' => 'required',    
            'nota'      => 'required|regex:/^\d*(\,\d{2})?$/',
        );
          $messages = array(
            'required' => 'El campo :attribute es obligatorio.',
            'required.regex' => 'El campo :attribute solo admite valores numericos.\n p. ej.: 8,50.',
          
        );
        $validator = \Validator::make(\Input::all(), $rules, $messages);
        // proceso de login
        if ($validator->fails()) {
            return \Redirect::to('alumno/create')
                ->withErrors($validator);
        } else {
            $querynota = \DB::table('resultado_tarea')
                    ->where('alumno_id',\Input::get('alumno_id'))
                    ->where('tarea_id', \Input::get('tarea_id'))
                    ->get();
            // dd($nota);
            if (count($querynota) > 0){
                $querynotaUP = \DB::table('resultado_tarea')
                    ->where('alumno_id',\Input::get('alumno_id'))
                    ->where('tarea_id', \Input::get('tarea_id'))
                    ->update(['nota' => \Input::get('nota')]);
                    \Session::flash('message', 'La nota ha sido actualizada!');
            } else{
                // guardar
                $nota = new Notas;      
                // $notas->id           = $new_id;
                $nota->alumno_id       = \Input::get('alumno_id');
                $nota->tarea_id        = \Input::get('tarea_id');
                $nota->nota            = \Input::get('nota');
                $nota->save();
                \Session::flash('message', 'La nota ' . $nota->nota . ' ha sido creado!');
            }
        }
            // $movie = new Movie;
            // $movie->create($request->all());
            // redirect
            
            return \Redirect::to('notas');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $nota       = Notas::find($id);
        $tarea      = Tarea::find($nota->tarea_id);
        $alumno     = Alumno::find($nota->alumno_id);
        return \View::make('notas.show', array('datos'=>$nota, 'tarea'=>$tarea, 'alumno'=>$alumno));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
