<?php

namespace uvm\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use View;
use Auth;

class ReferenciaContorller extends Controller
{
    //

    public function validarReferencia(Request $request){
        $credentials = $this->validate(request(),[
            'referencia' => 'required|string',
            'password' => 'required|string',
        ]);

        $usuario = $request->session()->get('usuario');
        $datosReservacionUsuario = $request->session()->get('datosReservacionUsuario');

        $user = DB::table('alumno')
        ->where('no_cuenta', $usuario)
        ->where('pass', $credentials['password'])
        ->first();
        
        if($user){
            return View::make('copia', ['datosReservacionUsuario' => $datosReservacionUsuario]);
        }else{
            return back()->withErrors(['error'=> trans('auth.failed')])
            ->withInput(request($usuario));
        }
    }
    
}
