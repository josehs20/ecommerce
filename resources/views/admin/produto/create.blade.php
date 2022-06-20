@extends('layouts.app')

@section('content')
    @if (!count($categorias))
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Cadastro de produto</div>
                        <div class="card-body">
                            <div class="row">

                                <div class="alert alert-warning" role="alert">
                                    Nenhuma categoria cadastrada!
                                </div>

                            </div>
                        </div>
                        <div class="card-footer">
                            <a href="/categorias/create" class="btn btn-outline-primary">Cadastrar categoria</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @elseif(!count($tamanhos))
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Cadastro de produto</div>
                    <div class="card-body">
                        <div class="row">

                            <div class="alert alert-warning" role="alert">
                                Nenhum tamanho cadastrado!
                            </div>

                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="/tamanho/create" class="btn btn-outline-primary">Cadastrar tamanho</a>
                    </div>
                </div>
            </div>
        </div>
    @elseif(!count($cores))
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Cadastro de produto</div>
                    <div class="card-body">
                        <div class="row">

                            <div class="alert alert-warning" role="alert">
                                Nenhuma cor cadastrada!
                            </div>

                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="/cor/create" class="btn btn-outline-primary">Cadastrar cor</a>
                    </div>
                </div>
            </div>
        </div>
    @else
        <cadastro-produto-component selects="{{ $data }}" csrf_token={{ @csrf_token() }}>
        </cadastro-produto-component>
    @endif
@endsection
