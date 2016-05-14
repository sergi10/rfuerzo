<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Profesor as Profesor;
use App\Tema as Tema;

class TemaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $temas = Tema::all();
        return \View::make('tema.index', array('datos'=>$temas));

    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $profesores = Profesor::lists('nombre', 'id');            
        return \View::make('tema.create', array('profesores'=>$profesores));

    }

    public function create_profe($profe_id){
        if (is_null($profe_id)){
            $profesores = Profesor::lists('nombre', 'id');            
        }else{
           $profesores = Profesor::find($profe_id);
        }
        // $profesores = Profesor::lists('nombre', 'id');
        dd('function create_profe', $profe_id, $profesores);
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
            'titulo'    => 'required',           
            'descripcion' => 'required',    
            'enlace'      => 'required',
            'profesor_id' => 'required'
        );
        $archivo = \Input::file('enlace');
        $nombre = uniqid();
        // $nombre = $nombre .'.png';
        // $nombre = $nombre .'.png';
        $nombre =  \Input::file('enlace')->getClientOriginalName();
        $destino = '/images/temas/';
        \Storage::put($nombre, $archivo);
        file_put_contents(getcwd().$destino.$nombre, \Storage::get($nombre));
        // dd($archivo, $nombre, $destino, \Storage::get($archivo));         
        // \Storage::put($archivo, \Input::get('imagen'));
        // file_put_contents(getcwd().$destino.$archivo, \Storage::get($archivo));
        

        // \Storage::put($nombre, $archivo);
        // file_put_contents(getcwd().$destino.$nombre, \Storage::get($nombre));
        // $file->move(getcwd().$destino, $nombre);
        $validator = \Validator::make(\Input::all(), $rules);
        // proceso de login
        if ($validator->fails()) {
            return \Redirect::to('tema/create')
                ->withErrors($validator);
        } else {
            // guardar
            $tema = new Tema;            
            // $tema->id                = $new_id;
            $tema->titulo               = \Input::get('titulo');
            $tema->descripcion          = \Input::get('descripcion');
            // $tema->imagen               = $nombre;
            // $tema->audio                = \Input::get('audio');
            $tema->enlace               = $nombre;
            $tema->profesor_id          = \Input::get('profesor_id');
            $tema->save();

            // redirect
            \Session::flash('message', 'El Tema ' . $tema->titulo . ' ha sido creado!');
            return \Redirect::to('tema');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
     {
        $tema = Tema::find($id);
        return \View::make('tema.show', array('datos'=>$tema));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tema = Tema::find($id);
        $profesores = Profesor::lists('nombre', 'id');
        return \View::make('tema.edit', array('datos'=>$tema, 'profesores'=>$profesores));
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
         $rules = array(
            'titulo'    => 'required',           
            'descripcion' => 'required',    
            'enlace'      => 'required',
            // 'imagen'      => 'required',
            // 'audio'      => 'required',
            'profesor_id' => 'required'
        );
        $validator = \Validator::make(\Input::all(), $rules);
        // proceso de login
        if ($validator->fails()) {
            return \Redirect::to('tema/' . $id . 'edit')
                ->withErrors($validator);
        } else {
            // guardar
            $tema = Mapa::find($id);
            $tema->titulo               = \Input::get('titulo');
            $tema->descripcion          = \Input::get('descripcion');
            // $tema->imagen               = \Input::get('imagen');
            // $tema->audio                = \Input::get('audio');
            $tema->enlace               = \Input::get('enlace');
            $tema->profesor_id          = \Input::get('profesor_id');
            $tema->save();

            // redirect
            \Session::flash('message', 'El Mapa ' . $tema->titulo . ' ha sido actualizado!');
            return \Redirect::to('tema');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tema = Tema::find($id);
        $tema -> delete();

        // redirect
        \Session::flash('message', 'El Tema '. $tema->nombre . '  ha sido borrado!');
        return \Redirect::to('tema');
    }
}
