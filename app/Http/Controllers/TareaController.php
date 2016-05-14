<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Mapa as Mapa;
use App\Tarea as Tarea;

// include 'phpQuery-onefile.php';
// include 'phpQuery-onefile.php';

class TareaController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {

        $tareas = Tarea::all();
        return \View::make('tarea.index', array('datos'=>$tareas));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        
        $mapas = Mapa::lists('titulo', 'id');
        return \View::make('tarea.create', array('mapas'=>$mapas));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
         // ('nombre', 'descripcion', 'file', 'audio', 'mapa_id')

        $rules = array(
            'nombre'        => 'required',           
            'descripcion'   => 'required', 
            'file'          => 'required', 
            'mapa_id'       => 'required'
        );
        $validator = \Validator::make(\Input::all(), $rules);
        // proceso de login
        if ($validator->fails()) {
            return \Redirect::to('tarea/create')
                ->withErrors($validator->messages())->withInput();
        } else {
            // guardar fichero
            $file = \Input::file('file');
            $document = \phpQuery::newDocumentHTML($file);
            // <button class="NavButton"
            // $( ":button" )
            // Sets the HTML content of the element
            $document->find(':button .NavButton')->html('HTML markup');
            // Sets the element's "class" attribute
            // $document->find('#container')->attr('class', 'my-container');
            // onclick="location='../index.html'; return false;"
            $document->find(':button .NavButton')->attr('onclick', "location='..'; return false;");

            $archivo = \Input::get('file');
            $nombre =  $file->getClientOriginalName();
            $destino = '/tareas/';
            $file->move(getcwd().$destino, $nombre);
            
            // \Storage::put($nombre, $file);
            // $destino = 'public/tareas/' . $nombre;
            // \Storage::move($nombre, $destino);
            // \Storage::copy($nombre, $destino);
            // file_put_contents("public/tareas/$nombre", $file);
            $tarea = new Tarea;            
            // $tarea->id                = $new_id;
            $tarea->nombre               = \Input::get('nombre');
            $tarea->descripcion          = \Input::get('descripcion');
            // $tarea->file                 = \Input::get('file');
            // $tarea->audio                = \Input::get('audio');
            $tarea->enlace_imagen        = $nombre;
            $tarea->mapa_id              = \Input::get('mapa_id');
            $tarea->save();

            // redirect
            \Session::flash('message', 'La tarea ' . $tarea->nombre . ' ha sido creado!');
            return \Redirect::to('tarea');
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
        $tarea = Tarea::find($id);
        $document = \phpQuery::newDocumentHTML($tarea->file);
        return \View::make('tarea.show', array('datos'=>$tarea, 'doc'=>$document));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $tarea = Tarea::find($id);
        $mapas = Mapa::lists('titulo', 'id');
        return \View::make('tarea.edit', array('datos'=>$tarea, 'mapas'=>$mapas));
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
            'nombre'    => 'required',           
            'descripcion' => 'required',    
            // 'enlace_imagen'      => 'required',
            // 'imagen'      => 'required',
            // 'audio'      => 'required',
            'mapa_id' => 'required'
        );
        $validator = \Validator::make(\Input::all(), $rules);
        // proceso de login
        if ($validator->fails()) {
            return \Redirect::to('tarea/' . $id . 'edit')
                ->withErrors($validator);
        } else {
            // guardar
            $tarea = Tarea::find($id);
            $tarea->nombre               = \Input::get('nombre');
            $tarea->descripcion          = \Input::get('descripcion');
            // $tarea->file                 = \Input::get('file');
            // $tarea->audio                = \Input::get('audio');
            // $tarea->enlace_imagen               = \Input::get('enlace_imagen');
            $tarea->mapa_id              = \Input::get('mapa_id');
            $tarea->save();

            // redirect
            \Session::flash('message', 'La tarea ' . $tarea->nombre . ' ha sido actualizada!');
            return \Redirect::to('tarea');
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
        $tarea = Tarea::find($id);
        $tarea-> delete();

        // redirect
        \Session::flash('message', 'La tarea '. $tarea->nombre . '  ha sido borrada!');
        return \Redirect::to('tarea');
    }
}
