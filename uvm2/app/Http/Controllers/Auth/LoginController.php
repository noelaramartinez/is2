<?php

namespace uvm\Http\Controllers\Auth;

use Illuminate\Support\Facades\Request;
use uvm\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use DB;
use Auth;
use View;

class LoginController extends Controller
{
    // /*
    // |--------------------------------------------------------------------------
    // | Login Controller
    // |--------------------------------------------------------------------------
    // |
    // | This controller handles authenticating users for the application and
    // | redirecting them to your home screen. The controller uses a trait
    // | to conveniently provide its functionality to your applications.
    // |
    // */

    // use AuthenticatesUsers;

    // /**
    //  * Where to redirect users after login.
    //  *
    //  * @var string
    //  */
    // protected $redirectTo = '/home';

    // /**
    //  * Create a new controller instance.
    //  *
    //  * @return void
    //  */
    // public function __construct()
    // {
    //     $this->middleware('guest')->except('logout');
    // }

    public function login(){
        $credentials = $this->validate(request(),[
            'usuario' => 'required|string',
            'password' => 'required|string',
        ]);

        $user = DB::table('alumno')
        ->where('no_cuenta', $credentials['usuario'])
        ->where('pass', $credentials['password'])
        ->first();

        $reservaciones = DB::table('reservacion')
        ->join('asiento', 'asiento.id_reservacion', '=', 'reservacion.id')
        ->select('asiento.*', 'reservacion.*')
        ->orderBy('id_mesa', 'asc')
        ->orderBy('id_silla', 'asc')
        ->get();

        $datosReservacionUsuario = DB::table('reservacion')
        ->join('alumno', 'alumno.id', '=', 'reservacion.id_alumno')
        ->where('alumno.id', $user->id)
        ->select('alumno.*', 'reservacion.*', 'reservacion.id as id_reservacion')
        ->get();

        //echo $reservacion;

        //return View::make('mesas', ['reservaciones' => $reservaciones]);

        if($user){
            session(['usuario' => $credentials['usuario']]);
            session(['datosReservacionUsuario' => $datosReservacionUsuario]);
            View::share('datosReservacionUsuario', $datosReservacionUsuario);
            return View::make('mesas', ['reservaciones' => $reservaciones, 
            'datosReservacionUsuario' => $datosReservacionUsuario]);
        }else{
            return back()->withErrors(['error'=> trans('auth.failed')])
            ->withInput(request($credentials['usuario']));
        }
    }

    public function logout(){
        session()->forget('usuario');
        session()->flush();
        return view('main');
    }
}
