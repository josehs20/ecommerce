<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Categoria;
use App\Models\Cor;
use App\Models\Estoque;
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
        $produtos = Produto::get();

        foreach ($produtos as $key => $p) {

            $data['produtos'][$p->id] = $p;
            $data['produtos'][$p->id]['imagens'] = $p->imagens->toArray();

            foreach ($p->prodTamCors as $key => $ptc) {
               $data['produtos'][$p->id]['prod_tam_cors'] = ['tam' => $ptc->tamanho, 'cor' => $ptc->cor, 'estoque' => $ptc->estoque->quantidade, 'id' => $ptc->estoque->id];
            }
        }
   
        return response()->json($data, 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['selects']['categorias'] = Categoria::get()->toArray();
        $data['selects']['tamanhos'] =  Tamanho::get()->toArray();
        $data['selects']['cores'] = Cor::get()->toArray();

        return view('admin.produto.create', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $produto = Produto::with('prodTamCors')->whereRaw("nome like '{$request->nome}'")->first();

        $prod_tam_cor = ProdTamCor::where('produto_id', $produto ? $produto->id : '')
            ->where('tamanho_id', $request->tamanho)->where('cor_id', $request->cor)->first();

        if (!$prod_tam_cor) {

            if (!$produto) {

                $produto = Categoria::find($request->categoria_id)
                    ->produtos()->create([
                        'nome'  =>  $request->nome,
                        'custo' =>  $request->custo,
                        'preco' =>  $request->preco,
                        'lucro' =>  $request->lucro,
                    ]);

                $prod_tam_cor =  ProdTamCor::create([
                    'produto_id' => $produto->id,
                    'tamanho_id' => $request->tamanho,
                    'cor_id' => $request->cor
                ]);

                $prod_tam_cor->estoque()->create(['quantidade' => $request->estoqueProduto]);

                if ($request->file('imagens')) {

                    $this->upload_redimensiona_salva_image_produto($request, $produto);
                }

                return response()->json(['msg' => 'Produto cadastrado com sucesso', 'prodInserido' => $produto->id, 'existe' => false], 200);
            } else {

                $prod_tam_cor = ProdTamCor::create([
                    'produto_id' => $produto->id,
                    'tamanho_id' => $request->tamanho,
                    'cor_id' => $request->cor
                ]);
                $prod_tam_cor->estoque()->create(['quantidade' => $request->estoqueProduto]);
                return response()->json(['msg' => 'Cor e tamanho adicionado para o produto com sucesso', 'prodInserido' => $produto->id, 'existe' => false], 200);
            }
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
    public function edit($produto)
    {
        $produto = Produto::find($produto);

        $data['produto'] = $produto->toArray();

        $data['produto']['categoria'] = $produto->categoria->nome;
        //  $data['produto']['imagens'] = $produto->imagens->toArray();

        $data['selects']['tamanhos'] = Tamanho::get()->toArray();
        $data['selects']['cores'] = Cor::get()->toArray();

        foreach ($produto->prodTamCors as $ptc) {
            $data['produto']['ptc'][] = ['tam' => $ptc->tamanho->nome, 'cor' => $ptc->cor->nome, 'estoque' => $ptc->estoque ? $ptc->estoque->quantidade : null, 'id' => $ptc->estoque ? $ptc->estoque->id : null];
        }

        $data = json_encode($data);

        return view('admin.produto.edit', compact('data'));
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
    public function destroy($produto)
    {
        $produto = Produto::find($produto);
        $produto->delete();
        return response()->json(['msg' => 'produto excluido com sucesso']);
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
