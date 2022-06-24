<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index(){
        $produtos = Produto::all();
        return view('welcome', compact('produtos'));
    }
}
