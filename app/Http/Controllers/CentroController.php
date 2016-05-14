<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Centro as Centro;

class CentroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $centros = Centro::all();
        return \View::make('centro.index', array('datos'=>$centros));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return \View::make('centro.create');
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
            'nombre' => 'required|min:6|unique:centro',
            'direccion' => 'required|min:6|unique:centro'
        );
        $messages = array(

            'required' => 'El campo :attribute es obligatorio.',
            'nombre.unique' => 'La dirección de correo :attribute ya esta registrada.',
            'direccion.unique' => 'El usuario :attribute ya esta registrado.',
            'nombre.min' => 'El campo :attribute debe de tener como minimo :min digitos.',
            'direccion.min' => 'El campo :attribute debe de tener como minimo :min digitos.',
        );
        $validator = \Validator::make(\Input::all(), $rules, $messages);

        // proceso de login
        if ($validator->fails()) {
            return \Redirect::to('centro/create')
                ->withErrors($validator);
        } else {
            // guardar
            // $centro = new Centro;
            
            // $centro->save();

            $centro = new Centro;
            // $ultimo = Centro::last();
            // $theId = \DB::getPdo()->lastInsertId(); 
            // dd($theId) ;
            // $new_id = $theId +1;
            // dd($new_id);
            // $centro->id            = $new_id;
            $centro->nombre       = \Input::get('nombre');
            $centro->direccion    = \Input::get('direccion');
            // $centro->create($request->all());
            // dd($centro);
            $centro->save();
            // redirect
            \Session::flash('message', 'El Centro ' . $centro->nombre . ' ha sido creado!');
            return \Redirect::to('centro');
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
        $centro = Centro::find($id);
        return \View::make('centro.show', array('datos'=>$centro));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $centro = Centro::find($id);
        return \View::make('centro.edit', array('datos'=>$centro));
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
            'nombre' => 'required|min:6|unique:centro',
            'direccion' => 'required|min:6|unique:centro'
        );
        $messages = array(
            'required' => 'El campo :attribute es obligatorio.',
            'nombre.unique' => 'La dirección de correo :attribute ya esta registrada.',
            'direccion.unique' => 'El usuario :attribute ya esta registrado.',
            'nombre.min' => 'El campo :attribute debe de tener como minimo :min digitos.',
            'direccion.min' => 'El campo :attribute debe de tener como minimo :min digitos.',
        );
        $validator = \Validator::make(\Input::all(), $rules, $messages);
// proceso de login
        if ($validator->fails()) {
            return \Redirect::to('centro/' . $id . '/edit')
                ->withErrors($validator);
        } else {
            // guardar
            $centro = Centro::find($id);
            $centro->nombre       = \Input::get('nombre');
            $centro->direccion    = \Input::get('direccion');
            $centro->save();

            // redirect
            \Session::flash('message', 'El Centro ' . $centro->nombre . ' ha sido actualizado!');
            return \Redirect::to('centro');
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
        $centro = Centro::find($id);
        $centro -> delete();

        // redirect
        \Session::flash('message', 'El Centro '. $centro->nombre . '  ha sido borrado!');
        return \Redirect::to('centro');
    }
}
