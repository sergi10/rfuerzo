<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Auth;
use Redirect;
use App\Alumno as Alumno;

class HomeController extends Controller
{
	public function home(){
		
		return view('home');
	}

    public function index(){
    //	return 'Llamada al HomeController';
    	// return \View::make('alumno');

    	// $alumnos = Alumno::all();
        // return \View::make('alumno.index', array('datos'=>$alumnos));

        return Redirect::to('login');
    }

    public function login(){
    	return Redirect::to('auth/login');
    }

    public function logear(){

    	// $datos_login = array('usuario'=>'yoyo', 'pass'=>'yoyo');
    	$datos_login = array(
				'user'=>$Request::input('usuario'),
				'pass'=>$Request::input('pass'),
    		);

    	if (Auth::attempt($datos_login)){

    		return Redirect::intended('alumno');
    	}
    	else{

    		return Redirect::to('login')->withInput;
    	}
    }

    public function logout(){

    	Auth::logout();
    	return  Redirect::to('home');
    }
}
