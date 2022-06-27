<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function __construct(Produto $produto)
    {
        $this->produto = $produto;
    }
    
    public function index(){
        $produtos = $this->produto->all();
        return view('welcome', compact('produtos'));
    }
}
