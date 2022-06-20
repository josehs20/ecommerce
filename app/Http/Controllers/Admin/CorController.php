<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cor;
use Illuminate\Http\Request;

class CorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cores = Cor::orderBy('id')->get();
        return response()->json($cores);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.cor.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cor = Cor::create($request->all());

        return response()->json(['msg' => 'Cor '. $cor->nome . ' criada com sucesso']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cor  $cor
     * @return \Illuminate\Http\Response
     */
    public function show(Cor $cor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cor  $cor
     * @return \Illuminate\Http\Response
     */
    public function edit(Cor $cor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cor  $cor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cor $cor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cor  $cor
     * @return \Illuminate\Http\Response
     */
    public function destroy($cor)
    {
        $cor = Cor::find($cor);
        $cor->delete();
        return response()->json(['msg' => 'Cor excluida com sucesso']);
    }
}
