<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Profesor as Profesor;
use App\Mapa as Mapa;

class MapaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {

        $temas = Mapa::all();
        return \View::make('tema.index', array('datos'=>$temas));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $profesores = Profesor::lists('nombre', 'id');            
        return \View::make('mapa.create', array('profesores'=>$profesores));
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
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
       
    // protected $fillable = array('titulo', 'descripcion', 'imagen', 'audio', 'enlace', 'profesor_id');

        $rules = array(
            'titulo'    => 'required',           
            'descripcion' => 'required',    
            // 'enlace'      => 'required',
            'imagen'      => 'required',
            // 'audio'      => 'required',
            'profesor_id' => 'required'
        );
        $archivo = \Input::file('imagen');
        // $nombre = uniqid();
        $nombre = uniqid();
        // $nombre = $nombre .'.png';
        // $nombre = $nombre .'.png';
        $nombre =  \Input::file('imagen')->getClientOriginalName();
        $destino = '/images/mapas/';
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
            return \Redirect::to('mapa/create')
                ->withErrors($validator);
        } else {
            // guardar
            $mapa = new Mapa;            
            // $mapa->id                = $new_id;
            $mapa->titulo               = \Input::get('titulo');
            $mapa->descripcion          = \Input::get('descripcion');
            // $mapa->imagen               = $nombre;
            // $mapa->audio                = \Input::get('audio');
            $mapa->enlace               = $nombre;
            $mapa->profesor_id          = \Input::get('profesor_id');
            $mapa->save();

            // redirect
            \Session::flash('message', 'El Mapa ' . $mapa->titulo . ' ha sido creado!');
            return \Redirect::to('mapa');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $mapa = Mapa::find($id);
        return \View::make('mapa.show', array('datos'=>$mapa));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $mapa = Mapa::find($id);
        $profesores = Profesor::lists('nombre', 'id');
        return \View::make('mapa.edit', array('datos'=>$mapa, 'profesores'=>$profesores));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $rules = array(
            'titulo'    => 'required',           
            'descripcion' => 'required',    
            // 'enlace'      => 'required',
            // 'imagen'      => 'required',
            // 'audio'      => 'required',
            'profesor_id' => 'required'
        );
        $validator = \Validator::make(\Input::all(), $rules);
        // proceso de login
        if ($validator->fails()) {
            return \Redirect::to('mapa/' . $id . 'edit')
                ->withErrors($validator);
        } else {
            // guardar
            $mapa = Mapa::find($id);
            $mapa->titulo               = \Input::get('titulo');
            $mapa->descripcion          = \Input::get('descripcion');
            // $mapa->imagen               = \Input::get('imagen');
            // $mapa->audio                = \Input::get('audio');
            $mapa->enlace               = \Input::get('enlace');
            $mapa->profesor_id          = \Input::get('profesor_id');
            $mapa->save();

            // redirect
            \Session::flash('message', 'El Mapa ' . $mapa->titulo . ' ha sido actualizado!');
            return \Redirect::to('mapa');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $mapa = Mapa::find($id);
        $mapa -> delete();

        // redirect
        \Session::flash('message', 'El Mapa '. $mapa->nombre . '  ha sido borrado!');
        return \Redirect::to('mapa');
    }
}
