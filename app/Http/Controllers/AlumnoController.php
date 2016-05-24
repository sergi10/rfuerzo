<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;use App\Alumno;

use App\Centro as Centro;
use App\Profesor as Profesor;
use App\User as User;
use DB;
use Hash;
class AlumnoController extends Controller
{
        /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        // 'nombre','apellidos','mail','user','pass','avatar', 'nacimiento',  'centro_id', 'enlace_avatar'
        $alumnos = Alumno::all(); //->simplePaginate(15);
        return \View::make('alumno.index', array('datos'=>$alumnos));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $centros = Centro::lists('nombre', 'id');
        $profesores = Profesor::lists('nombre', 'id');
        return \View::make('alumno.create', array('centros'=>$centros, 'profesores'=>$profesores));
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
            'mail'      => 'required|email|unique:alumno',
            'user'      => 'required|min:6|unique:alumno',
            'pass'      => 'required|min:6',
            'centro_id' => 'required',
            'profesor_id' => 'required',
            'nacimiento'=> 'required|date'
        );
        $messages = array(
            'required' => 'El campo :attribute es obligatorio.',
            'email' => 'La dirección de correo :attribute debe ser un email valido.',
            'email.unique' => 'La dirección de correo :attribute ya esta registrada.',
            'user.unique' => 'El usuario :attribute ya esta registrado.',
            'user.min' => 'El :attribute debe de tener como minimo :min digitos.',
            'pass.min' => 'El :attribute debe de tener como minimo :min digitos.',
            'nacimiento.date' => 'El :attribute debe de ser uan fecha valida.',

        );
        // proceso de validacion
        
        $validator = \Validator::make(\Input::all(), $rules, $messages);
        
        if ($validator->fails()) {
            return \Redirect::to('alumno/create')
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
            $alumno = new Alumno;      
            $user = new User;      
            $alumno->nombre       = \Input::get('nombre');
            $alumno->apellidos    = \Input::get('apellidos');
            $alumno->mail         = \Input::get('mail');
            $alumno->nacimiento   = \Input::get('nacimiento');
            $alumno->user         = \Input::get('user');            
            $user->name           = \Input::get('user');
            $user->password       = Hash::make(\Input::get('pass'));
            $user->level          =  0;
            $alumno->centro_id    = \Input::get('centro_id');
            $alumno->profesor_id  = \Input::get('profesor_id');
            $alumno->enlace_avatar= $avatar_name;
            $user->save();
            $alumno->save();
            // redireccion
            \Session::flash('message', 'El Alumno ' . $alumno->nombre . ' ha sido creado!');
            return \Redirect::to('alumno');
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
        $alumno = Alumno::find($id);
        $centro = Centro::find($alumno->centro_id);
        $profesor = Profesor::find($alumno->profesor_id);
        return \View::make('alumno.show', array('datos'=>$alumno, 'centro'=>$centro, 'profesor'=>$profesor));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $alumno = Alumno::find($id);
        $centros = Centro::lists('nombre', 'id');
        $profesores = Profesor::lists('nombre', 'id');

        return \View::make('alumno.edit', array('datos'=>$alumno, 'centros'=>$centros, 'profesores'=>$profesores));
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
            'mail'      => 'email',
            'user'      => 'min:6',
            'pass'      => 'min:6',
            'nacimiento'=> 'date'
        );
        $messages = array(
            'required' => 'El campo :attribute es obligatorio.',
            'email' => 'La dirección de correo :attribute debe ser un email valido.',
            'email.unique' => 'La dirección de correo :attribute ya esta registrada.',
            'user.unique' => 'El usuario :attribute ya esta registrado.',
            'user.min' => 'El campo :attribute debe de tener como minimo :min digitos.',
            'pass.min' => 'El campo :attribute debe de tener como minimo :min digitos.',
            'nacimiento.date' => 'El :attribute debe de ser uan fecha valida.',
        );
        $validator = \Validator::make(\Input::all(), $rules, $messages);

        // proceso de login
        if ($validator->fails()) {
            return \Redirect::to('alumno/' . $id . '/edit')
                ->withErrors($validator);
        } else {
            // guardar
            $alumno = Alumno::find($id);
            if (\Input::exists('nombre')){
                $alumno->nombre       = \Input::get('nombre');                
            }
            if (\Input::exists('apellidos')){
                $alumno->apellidos    = \Input::get('apellidos');
            }
            if (\Input::exists('mail')){
                $alumno->mail         = \Input::get('mail');
            }
            if (\Input::exists('user')){
                $alumno->user         = \Input::get('user');
            }
            if (\Input::exists('nacimiento')){
                $alumno->nacimiento   = \Input::get('nacimiento');
            }
            if (\Input::exists('pass')){
                $alumno->pass         = bcrypt(\Input::get('pass'));
            }
            if (\Input::exists('centro_id')){
                $alumno->centro_id    = \Input::get('centro_id');
            }
            if (\Input::exists('profesor_id')){
                $alumno->profesor_id    = \Input::get('profesor_id');
            }
            $alumno->save();

            // redireccion
            \Session::flash('message', 'El Alumno ' . $alumno->nombre . ' ha sido actualizado!');
            return \Redirect::to('alumno');
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
        $alumno = Alumno::find($id);
        $alumno -> delete();

        // redireccion
        \Session::flash('message', 'El Alumno '. $alumno->nombre . '  ha sido borrado!');
        return \Redirect::to('alumno');
    }
}