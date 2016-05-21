<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Profesor as Profesor;
use App\Centro as Centro;
use App\Tema as Tema;
use App\User as User;


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
        // validacion de datos

        $rules = array(
            'nombre'    => 'required',           
            'apellidos' => 'required',    
            'mail'      => 'required|email|unique:profesor',
            'user'      => 'required|min:6|unique:profesor',
            'pass'      => 'required|min:6',
            'centro_id' => 'required'
            // 'nacimiento'=> 'required'
        );
         $messages = array(
            'required' => 'El campo :attribute es obligatorio.',
            'email' => 'La dirección de correo debe ser un email valido.',
            'email.unique' => 'La dirección de correo ya esta registrada.',
            'user.unique' => 'El usuario :attribute ya esta registrado.',
            'user.min' => 'El :attribute debe de tener como minimo :min digitos.',
            'pass.min' => 'El :attribute debe de tener como minimo :min digitos.',

        );
        $validator = \Validator::make(\Input::all(), $rules, $messages);

        
        // proceso de validacion
        if ($validator->fails()) {
            return \Redirect::to('profesor/create')
                ->withErrors($validator);
        } else {
            // obtener imagen 
            $identicon = new \Identicon\Identicon();
        $imageData = $identicon->getImageData(\Input::get('user'). \Input::get('mail'), 128);
        $avatar_name = uniqid();
        $avatar_name = $avatar_name .'.png';
        $destino = '/images/avatares/';
        \Storage::put($avatar_name, $imageData);
        file_put_contents(getcwd().$destino.$avatar_name, \Storage::get($avatar_name));

            // guardar
            // $theId = \DB::getPdo()->lastInsertId(); 
            // // dd($theId) ;
            // $new_id = 0;
            // if ($theId > 0){
            //     $new_id = $theId +1;    
            // }
            
            // $profesor->id           = $new_id;
            $profesor = new Profesor;
            $user = new User;

            $profesor->nombre       = \Input::get('nombre');
            $profesor->apellidos    = \Input::get('apellidos');
            $profesor->mail         = \Input::get('mail');
            $profesor->nacimiento   = \Input::get('nacimiento');
            $profesor->centro_id    = \Input::get('centro_id');
            $profesor->enlace_avatar= $avatar_name;
            $profesor->user         = \Input::get('user');
            $user->name             = \Input::get('user');
            $user->password         = bcrypt( \Input::get('pass'));
            $admin = (\Input::has('es_admin')) ? true : false;// ? true : false;
            // $admin = $user->level;
            if ($admin){
                $user->level            =  2;
            }
            else{
                $user->level            =  1;
            }
            // dd($user,$profesor,$admin);
            $user->save();
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
        $temas = $profesor->temas();
        // $mepas = Profesor::with('mapas', 'mapas.titulo')->find(1);
        // $mapas = Mapa::with('mapas')->find($profesor->id);
        // $mapas = \DB::table('mapa')->where('profesor_id', $profesor->id);
        // $mapas = Profesor::find($profesor->id)->mapas;
        // dd($mapas);  
        return \View::make('profesor.show', array('datos'=>$profesor, 'centro'=>$centro, 'temas'=>$temas));
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
        // if ($request){
        //     dd('CON Datos', $request);
        // }else{
        //     dd('Error sin datos', $request);

        // }
        $rules = array(
            'nombre'    => 'required',           
            'apellidos' => 'required',    
            'mail'      => 'email',
            'user'      => 'min:6',
            'pass'      => 'min:6',
            'centro_id' => 'required'
            // 'nacimiento'=> 'required'
        );
       $messages = array(
            'required' => 'El campo :attribute es obligatorio.',
            'email' => 'La dirección de correo :attribute debe ser un email valido.',
            'email.unique' => 'La dirección de correo :attribute ya esta registrada.',
            'user.unique' => 'El usuario :attribute ya esta registrado.',
            'user.min' => 'El campo :attribute debe de tener como minimo :min digitos.',
            'pass.min' => 'El campo :attribute debe de tener como minimo :min digitos.',
        );
        $validator = \Validator::make(\Input::all(), $rules, $messages);

        // proceso de login
        if ($validator->fails()) {
            return \Redirect::to('profesor/' . $id . '/edit')
                ->withErrors($validator);
        } else {
            // guardar
            $profesor = Profesor::find($id);
            if (\Input::exists('nombre')){
                $profesor->nombre         = \Input::get('nombre');                
            }
            if (\Input::exists('apellidos')){
                $profesor->apellidos    = \Input::get('apellidos');
            }
            if (\Input::exists('mail')){
                $profesor->mail         = \Input::get('mail');
            }
            if (\Input::exists('user')){
                $profesor->user         = \Input::get('user');
            }
            if (\Input::exists('nacimiento')){
                $profesor->nacimiento   = \Input::get('nacimiento');
            }
            if (\Input::exists('pass')){
                $profesor->pass         = bcrypt(\Input::get('pass'));
            }
            if (\Input::exists('centro_id')){
                $profesor->centro_id    = \Input::get('centro_id');
            }
            
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
