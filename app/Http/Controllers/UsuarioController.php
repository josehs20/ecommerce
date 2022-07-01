<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsuarioController extends Controller
{
    public function index(){
        return view('usuario.minha-conta.minhaconta');
    }

    public function menu(Request $request){
        if($request->segment(2) == 'seguranca'){
            return view('usuario.minha-conta.menu.seguranca');
        }
        elseif($request->segment(2) == 'cartoes'){
            return view('usuario.minha-conta.menu.cartoes');
        }
    }
}
