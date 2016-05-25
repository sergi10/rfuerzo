<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Alumno as Alumno;
use App\Tarea as Tarea;
use App\Notas as Notas;
use App\Tema as Tema;
use Auth;

class NotasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
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
        if (Auth::level() == 0){
            $alumnos = Alumno::where('id', '=', Auth::get_alumno_id());
        }else {
            $profe_id = Auth::get_owner();
            $alumnos = Alumno::where('profesor_id', '=', $profe_id);
            $temas = Tema::where('profesor_id', '=', $profe_id)->get()->toArray(); 
            $tareas = Tarea::where('tema_id','in', $temas)->get()->all();
        }
        
        $list_tareas = Tarea::lists('nombre', 'id');
        $list_alumnos = $alumnos->lists('nombre', 'id');
        return \View::make('notas.create', array('tareas'=>$list_tareas, 'alumnos'=>$list_alumnos));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = array(
            'alumno_id'    => 'required',           
            'tarea_id' => 'required',    
            'nota'      => 'required|numeric|min:0|max:10.01',
        );
          $messages = array(
            'min' => 'El campo :attribute debe tener un valor mayor de 0.',
            'max' => 'El campo :attribute debe tener un valor máximo de 10.',
            'required' => 'El campo :attribute es obligatorio.',
            'required.regex' => 'El campo :attribute solo admite valores numericos.\n p. ej.: 8,50.',
          
        );
        $validator = \Validator::make(\Input::all(), $rules, $messages);
        $validator->sometimes('nota', 'required|max:10', function($request) {
            return $request->nota >0;
        });
        // proceso de login
        if ($validator->fails()) {
            return \Redirect::to('notas/create')
                ->withErrors($validator);
        } else {
            $querynota = \DB::table('resultado_tarea')
                    ->where('alumno_id',\Input::get('alumno_id'))
                    ->where('tarea_id', \Input::get('tarea_id'))
                    ->get();
            
            if (count($querynota) > 0){
                $querynotaUP = \DB::table('resultado_tarea')
                    ->where('alumno_id',\Input::get('alumno_id'))
                    ->where('tarea_id', \Input::get('tarea_id'))
                    ->update(['nota' => \Input::get('nota')]);
                    \Session::flash('message', 'La nota ha sido actualizada!');
            } else{
                // guardar
                $nota = new Notas;                      
                $nota->alumno_id       = \Input::get('alumno_id');
                $nota->tarea_id        = \Input::get('tarea_id');
                $nota->nota            = \Input::get('nota');
                $nota->save();
                \Session::flash('message', 'La nota ' . $nota->nota . ' ha sido creado!');
            }
        }          
            
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
        $nota = Notas::find($id);
        $nota -> delete();

        // redirect
        \Session::flash('message', 'La nota ha sido borrada!');
        return \Redirect::to('notas');
    }
}
