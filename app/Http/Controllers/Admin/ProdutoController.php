<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Categoria;
use App\Models\Cor;
use App\Models\ProdTamCor;
use App\Models\Produto;
use App\Models\Tamanho;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produtos = Produto::orderBy('id')->get();
        
        return response()->json($produtos, 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorias = Categoria::all();
        $tamanhos = Tamanho::all();
        $cores = Cor::all();

        $data['categorias'] = $categorias;
        $data['tamanhos'] =  $tamanhos;
        $data['cores'] = $cores;
        $data = json_encode($data);

        // dd($data);
        return view('admin.produto.create', compact('categorias', 'tamanhos', 'cores', 'data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $produtoVerify = !$request->prodInserido ? Produto::whereRaw("nome like '{$request->nome}'")->first() : false;

        $prod_tam_cor = ProdTamCor::where('produto_id', $request->prodInserido)
            ->where('tamanho_id', $request->tamanho)->where('cor_id', $request->cor)->first();

        if (!$prod_tam_cor && !$produtoVerify) {

            $produto = Produto::find($request->prodInserido);

            if (!$produto) {

                $produto = Categoria::find($request->categoria_id)
                    ->produtos()->create([
                        'nome'  =>  $request->nome,
                        'custo' =>  $request->custo,
                        'preco' =>  $request->preco,
                        'lucro' =>  $request->lucro,
                    ]);

                ProdTamCor::create([
                    'produto_id' => $produto->id,
                    'tamanho_id' => $request->tamanho,
                    'cor_id' => $request->cor
                ]);
            } else {

                ProdTamCor::create([
                    'produto_id' => $request->prodInserido,
                    'tamanho_id' => $request->tamanho,
                    'cor_id' => $request->cor
                ]);
            }

            if (!$request->prodInserido && $request->file('imagens')) {

                $this->upload_redimensiona_salva_image_produto($request, $produto);
            }

            $listaProdTamCor = $this->carregaListaProdTamCor($produto->id);

            return response()->json(['listaProdTamCor' =>  $listaProdTamCor, 'msg' => 'Produto cadastrado com sucesso', 'prodInserido' => $produto->id, 'existe' => false], 200);
        } else {
            return response()->json(['msg' => 'Produto com a mesma cor e tamanho já existe', 'prodInserido' => $request->prodInserido, 'existe' => true], 200);
        }
    }

    public function carregaListaProdTamCor($produto_id)
    {
        $prodTamCor = ProdTamCor::where('produto_id', $produto_id)->get();

        return $prodTamCor;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function show(Produto $produto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function edit(Produto $produto)
    {
        // $produto = Produto::find($id);
        // $categorias =  Categoria::all();
        // $tamanhos = Tamanho::all();
        // $cores = Cor::all();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Produto $produto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Produto $produto)
    {
        //
    }

    public function upload_redimensiona_salva_image_produto($request, $produto)
    {
        for ($i = 0; $i < count($request->file('imagens')); $i++) {

            //retira os espaços do nome da imagem
            $nameImage = str_replace(' ', '', $request->file('imagens')[$i]->getClientOriginalName());

            //baixa para storage/public/imageProduto e cria diretorio e faz o upload de acordo com id do produto
            $dir = $request->file('imagens')[$i]->storeAs('public/imageProduto/' . $produto->id,  $nameImage);

            //cria caminho da imagem no banco de acordo com id de produto
            $produto->imagens()->create(['nome' => str_replace('public', 'storage', $dir)]);

            //recupera imagem para redimencionar
            $img = Image::make('storage/imageProduto/' . $produto->id . '/' . $nameImage);
            $img->resize(400, 500, function ($constraint) {
                $constraint->aspectRatio();
            })->save();
        }

        return;
    }
}
