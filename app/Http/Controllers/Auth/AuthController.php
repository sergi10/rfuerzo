<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Alumno as Alumno;
use App\Profesor as Profesor;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

use Auth;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\Request;
use Session;


class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct(Guard $auth)
    {
        $this->middleware('guest', ['except' => 'getLogout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'user' => 'required|max:255',
            'pass' => 'required|confirmed|min:6',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['usuario'],
            'password' => bcrypt($data['pass']),
            'level' => $data['level']
        ]);
    }
    
    /**
     * Gets the login.
     *
     * @param      Request  $request  (description)
     *
     * @return     <View>   The login.
     */
    public function getLogin(Request $request){
        return view("auth/login");
    }

    /**
     * Posts a login.
     *
     * @param      Request  $request  (description)
     *
     * @return     <View>   ( description_of_the_return_value )
     */
    public function postLogin(Request $request){    

        $rules = array(
            'usuario'      => 'required',
            'pass'      => 'required',
        );
        $messages = array(
            'required' => 'El campo :attribute es obligatorio.'
        );
        $validator = \Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return \Redirect::to('auth/login')
                ->withErrors($validator)
                ->withInput()
                ->with('message','Error de inicio de sesion');
        } else {
            $usuario = $request->input('usuario');
            $datos_login = array(
                    'name'=>$usuario,
                    'password'=>$request->input('pass'),
                );
            if (Auth::attempt($datos_login)){
                if (Auth::level() == 1){
                    $profesor = Profesor::where('user', '=',  $usuario)->get()->first();
                    return \Redirect::to('profesor/'.$profesor->id);
                }
                elseif (Auth::level() == 2) {
                    $alumno = Alumno::where('user', '=',  $usuario)->get()->first();
                    return \Redirect::to('alumno/');
                }
                else{
                    $alumno = Alumno::where('user', '=',  $usuario)->get()->first();
                    return \Redirect::to('alumno/'.$alumno->id);
                }
            }
            else{
                return \Redirect::to('auth/login')->withInput();
            }
        }

    }

    /**
     * Gets the logout.
     *
     * @param      Request  $request  (description)
     *
     * @return     <Vies>   The logout.
     */
    public function getLogout(Request $request){        
        Session::flush();
        return  \Redirect::to('home');
    }
}
