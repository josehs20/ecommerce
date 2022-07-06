@extends('layouts.app')
<style>
    .form-adicionar {
        display: flex;
        justify-content: space-around
    }

    .inputQ {
        width: 150px !important;
    }

    .inputN {
        width: 250px !important
    }

    .produto-para-promocao{
        display: flex;
        justify-content: space-around
    }
    .produto-para-promocao > div{
        width: 80%
    }

    .ctnr > div{
        margin-bottom: 10px
    }
</style>
@section('content')
    <div class="container ctnr">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <!-- INSERIR PROMOÇÃO-->
                <card-component titulo="Pesquise o produto para incluir desconto">
                    <template v-slot:conteudo>
                        <div class="produto-para-promocao">
                            
                            <form action="{{ route('promocao.create') }}" method="get">
                                {{ csrf_field() }}
                                <label class="control-label">Pesquisar</label>

                                <input type="search" class="form-control input-sm" name="search">

                                <button type="submit" class="btn btn-outline-primary">Pesquisar</button>
                            </form>
                            {{-- <div class="input-group">
                                <input type="text" class="form-control" name="search" placeholder="Produto" />
                            </div>
                            <button type="submit" class="btn btn-outline-primary">Pesquisar</button> --}}
                        </div>
                        {{$unidades}}
                    </template>
                </card-component>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <!-- INSERIR PROMOÇÃO-->
                <card-component titulo="Cadastrar promoções">
                    <template v-slot:conteudo>
                        <div class="form-adicionar">
                            <div class="input-group inputN">
                                {{-- <span class="input-group-text" id="basic-addon1">@</span> --}}
                                <input type="text" class="form-control" placeholder="Nome da promoção">
                            </div>
                            <div class="input-group inputQ">
                                <span class="input-group-text" id="basic-addon1">%</span>
                                <input type="text" class="form-control" placeholder="Quantidade">
                            </div>
                            
                            <button class="btn btn-outline-success">Salvar</button>
                        </div>
                    </template>
                </card-component>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <!-- INSERIR PROMOÇÃO-->
                <card-component titulo="Lista de produtos com promoção">
                    <template v-slot:conteudo>
                        
                    </template>
                </card-component>
            </div>
        </div>
    </div>
@endsection
