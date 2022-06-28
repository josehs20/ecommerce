<?php

namespace App\Http\Controllers;

use App\Models\Imagem;
use App\Models\Produto;
use Illuminate\Http\Request;

class LojaController extends Controller
{
    public function __construct(Produto $produto)
    {
        $this->produto = $produto;
    }
    
    public function index(){
        $produtos = $this->produto->with('imagens')->get();
        return view('loja.loja', compact('produtos'));
    }

    public function show($id){
        return view('loja.individualproduto', compact('id'));
    }

    public function carregaProduto($data){
        return $this->produto->with('imagens')->find($data);
    }
}
