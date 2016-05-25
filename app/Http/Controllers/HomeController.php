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
	/**
     * { function_description }
     *
     * @return     <View>  ( description_of_the_return_value )
     */
    public function home(){
		
		return view('home');
	}
    /**
     * { function_description }
     *
     * @return     <View>  ( description_of_the_return_value )
     */
    public function index(){    
        return Redirect::to('login');
    }

    /**
     * { function_description }
     *
     * @return     <View>  ( description_of_the_return_value )
     */
    public function login(){
    	return Redirect::to('auth/login');
    }

    /**
     * { function_description }
     *
     * @return     <View>  ( description_of_the_return_value )
     */
    public function logear(){
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
    /**
     * { function_description }
     *
     * @return     <View>  ( description_of_the_return_value )
     */
    public function logout(){
    	Auth::logout();
    	return  Redirect::to('home');
    }
}
