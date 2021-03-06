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
            'titulo'    => 'required|min:6|unique:tema',           
            'descripcion' => 'required',    
            'enlace'      => 'required|image|max:200',
            'profesor_id' => 'required'
        );
             $messages = array(
            'required' => 'El campo :attribute es obligatorio.',
            'titulo.unique' => 'El tema :attribute ya esta registrado.',
            'titulo.min' => 'El campo :attribute debe de tener como minimo :min digitos.',
            'enlace.image' => 'El campo :attribute debe ser un formato de imagen váliddo (jpg, jpeg, png, bmp, gif o svg).',
            'enlace.max' => 'El tamaño de la imagen excede de :max kb',
        );
        $validator = \Validator::make(\Input::all(), $rules, $messages);
       
                 
        // proceso de login
        if ($validator->fails()) {
            return \Redirect::to('tema/create')
                ->withErrors($validator);
        } else {
            // obtener imagen
            $archivo = \Input::file('enlace');
            $nombre_file = $archivo->getClientOriginalName();			           
            $destino = '/images/temas/';
            $archivo->move(getcwd().$destino, $nombre_file);
				

            // guardar
            $tema = new Tema;            
            $tema->titulo               = \Input::get('titulo');
            $tema->descripcion          = \Input::get('descripcion');
            $tema->enlace               = $nombre_file;
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
            'titulo'    => 'required|min:6',           
            'descripcion' => 'required',    
        );
        $messages = array(
            'required' => 'El campo :attribute es obligatorio.',
            'tema.unique' => 'El tema :attribute ya esta registrado.',
            'tema.min' => 'El campo :attribute debe de tener como minimo :min digitos.',
            'enlace.image' => 'El campo :attribute debe ser un formato de imagen váliddo (jpg, jpeg, png, bmp, gif o svg).',
            'enlace.max' => 'El tamaño de la imagen excede de :max kb',
        );
        $validator = \Validator::make(\Input::all(), $rules, $messages);
       
       // proceso de login
        if ($validator->fails()) {
            return \Redirect::to('tema/' . $id . '/edit')
                ->withErrors($validator);
        } else {
            // guardar
            $tema = Tema::find($id);
            if (\Input::exists('titulo')){
                $tema->titulo               = \Input::get('titulo');
            }
            if (\Input::exists('descripcion')){
                $tema->descripcion          = \Input::get('descripcion');
            }
            if (\Input::exists('enlace')){
				$archivo = \Input::file('enlace');				
				$nombre_file = $archivo->getClientOriginalName();
				if (strlen($nombre_file)> 0){							
					$destino = '/images/temas/';
					$archivo->move(getcwd().$destino, $nombre_file);
					$tema->enlace           = $nombre_file;
				} 
            }
            $tema->save();

            // redirect
            \Session::flash('message', 'El Tema ' . $tema->titulo . ' ha sido actualizado!');
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

