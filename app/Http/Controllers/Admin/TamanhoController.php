<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tamanho;
use Illuminate\Http\Request;

class TamanhoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tamanhos = Tamanho::orderBy('id')->get();
        return response()->json($tamanhos, 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tamanho.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tamanho = Tamanho::create(['nome' => strtoupper($request->nome)]);

        return response()->json(['msg' => 'Tamanho ' . $tamanho->nome . ' criado com sucesso'], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tamanho  $tamanho
     * @return \Illuminate\Http\Response
     */
    public function show(Tamanho $tamanho)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tamanho  $tamanho
     * @return \Illuminate\Http\Response
     */
    public function edit(Tamanho $tamanho)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tamanho  $tamanho
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tamanho $tamanho)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tamanho  $tamanho
     * @return \Illuminate\Http\Response
     */
    public function destroy($tamanho)
    {
        $tamanho = Tamanho::find($tamanho);
        $tamanho->delete();
        return response()->json(['msg' => 'Tamanho excluido com sucesso']);
    }
}
