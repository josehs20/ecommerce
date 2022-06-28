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

    public function show($id){
        $p = $this->produto->find($id);
        return view('welcome', compact('id'));
    }

    public function carregaProduto($data){
        return $this->produto->find($data);
    }
}
