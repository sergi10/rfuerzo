<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Profesor as Profesor;
use App\Centro as Centro;
use App\Mapa as Mapa;

class ProfesorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $profesores = Profesor::all();
        return \View::make('profesor.index', array('datos'=>$profesores));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $centros = Centro::lists('nombre', 'id');
        return \View::make('profesor.create', array('centros'=>$centros));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        $rules = array(
            'nombre'    => 'required',           
            'apellidos' => 'required',    
            'mail'      => 'required|email',
            'user'      => 'required|min:2',
            'pass'      => 'required|min:2',
            'centro_id' => 'required'
            // 'nacimiento'=> 'required'
        );
        $identicon = new \Identicon\Identicon();
        $imageData = $identicon->getImageData(\Input::get('user'). \Input::get('mail'), 128);
        $avatar_name = uniqid();
        $avatar_name = $avatar_name .'.png';
        $destino = '/images/avatares/';
        \Storage::put($avatar_name, $imageData);
        file_put_contents(getcwd().$destino.$avatar_name, \Storage::get($avatar_name));

        $validator = \Validator::make(\Input::all(), $rules);
        // proceso de login
        if ($validator->fails()) {
            return \Redirect::to('profesor/create')
                ->withErrors($validator);
        } else {
            // guardar
            $profesor = new Profesor;
            $theId = \DB::getPdo()->lastInsertId(); 
            // dd($theId) ;
            $new_id = 0;
            if ($theId > 0){
                $new_id = $theId +1;    
            }
            
            // $profesor->id           = $new_id;
            $profesor->nombre       = \Input::get('nombre');
            $profesor->apellidos    = \Input::get('apellidos');
            $profesor->mail         = \Input::get('mail');
            $profesor->user         = \Input::get('user');
            $profesor->nacimiento   = \Input::get('nacimiento');
            $profesor->pass         = \Input::get('pass');
            $profesor->centro_id    = \Input::get('centro_id');
            $profesor->enlace_avatar    = $avatar_name;
            $profesor->save();

            // $movie = new Movie;
            // $movie->create($request->all());
            // redirect
            \Session::flash('message', 'El Profesor ' . $profesor->nombre . ' ha sido creado!');
            return \Redirect::to('profesor');
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
        $profesor = Profesor::find($id);
        $centro = Centro::find($profesor->centro_id);
        $mapas = $profesor->mapas();
        // $mepas = Profesor::with('mapas', 'mapas.titulo')->find(1);
        // $mapas = Mapa::with('mapas')->find($profesor->id);
        // $mapas = \DB::table('mapa')->where('profesor_id', $profesor->id);
        // $mapas = Profesor::find($profesor->id)->mapas;
        // dd($mapas);  
        return \View::make('profesor.show', array('datos'=>$profesor, 'centro'=>$centro, 'maps'=>$mapas));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $profesor = Profesor::find($id);
        $centros = Centro::lists('nombre', 'id');
        return \View::make('profesor.edit', array('datos'=>$profesor, 'centros'=>$centros));
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
            'apellidos' => 'required',    
            'mail'      => 'required|email',
            'user'      => 'required|min:2',
            'pass'      => 'required|min:2',
            'centro_id' => 'required'
            // 'nacimiento'=> 'required'
        );
        $validator = \Validator::make(\Input::all(), $rules);
        // proceso de login
        if ($validator->fails()) {
            return \Redirect::to('profesor/' . $id . 'edit')
                ->withErrors($validator);
        } else {
            // guardar
            $profesor = Profesor::find($id);
            $profesor->nombre       = \Input::get('nombre');
            $profesor->apellidos    = \Input::get('apellidos');
            $profesor->mail         = \Input::get('mail');
            $profesor->user         = \Input::get('user');
            $profesor->nacimiento   = \Input::get('nacimiento');
            $profesor->pass         = \Input::get('pass');
            $profesor->centro_id    = \Input::get('centro_id');
            $profesor->save();

            // redirect
            \Session::flash('message', 'El Profesor ' . $profesor->nombre . ' ha sido actualizado!');
            return \Redirect::to('profesor');
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
        $profesor = Profesor::find($id);
        $profesor -> delete();

        // redirect
        \Session::flash('message', 'El Profesor '. $profesor->nombre . '  ha sido borrado!');
        return \Redirect::to('profesor');
    }
}
