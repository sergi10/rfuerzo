<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Alumno as Alumno;
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
        // $this->auth = $auth;
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

    public function getLogin(Request $request){
        // dd('getLogin',$request);
        return view("auth/login");
    }

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
                // $centro = Centro::find($profesor->centro_id);
                $alumno = Alumno::where('user', '=',  $usuario)->get();
                // $alumno = Alumno::where('user', 'ilike', '\''.$usuario.'\'')->get();
                // return ("El usuario y la contraseña SIIII son validos.");

                // dd('Acceso OK', $alumno);
                return \Redirect::to('alumno/'.$alumno->id);
            }
            else{
                // dd('Acceso KKKOOO', $datos_login, $request);
                // return ("El usuario o la contraseña NOOO son validos.");
                // return \Redirect::intended('alumno');
                // 123456 = $2y$10$YuTn
                return \Redirect::to('auth/login')->withInput();
            }
        }

        // $this->validate($request, [
        //     'usuario' => 'required',
        //     'pass' => 'required',    
        //     ]); 
        // $datos_login = $request->only('usuario','pass');

        // if ($this->auth->attempt($datos_login, $request->has('remember'))){

        //     return view("alumno");
        // }

        
        // return view()->with("msjerror","El usuario o la contraseña NO son validos.")
    }
    public function getLogout(Request $request){
        // dd($request);
        // $this -> auth->getLogout();
        Session::flush();
        return redirect('home');
    }
}
