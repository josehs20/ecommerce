@extends('welcome')

<style>
    main {
        display: flex;
        padding: 10px 30px;
    }

    main>aside {
        width: 15%;
        min-height: 65vh;
    }

    .c {
        display: flex;
        flex-direction: column;
    }

    .form-check-input:checked {
        background: #ceac78;
        border: 1px solid #ceac78
    }

    .form-check-label:hover {
        color: #ceac78;
    }


    main>div {
        width: 85%;
        min-height: 65vh;
    }

    .t {
        display: flex;
        justify-content: space-between;
        border: none;
        background: transparent;
        width: 100%;
        padding: 0
    }

    .b {
        display: none;
    }

    .form-select {
        width: 200px !important;
        float: right
    }

    .exibicaodeprodutos {
        margin-top: 46px;
        padding: 0 20px;
    }

    @media(max-width: 970px) {
        main {
            width: 100%;
            padding: 10px 10px;
            justify-content: center;
        }

        main>div {
            width: 100%;
        }

        main aside {
            display: none
        }

        .filtromobile {
            display: block;
            width: 100%;
        }

        .b {
            display: flex !important;
            justify-content: center;
            width: 100% !important;
            height: fit-content;
        }

        .form-select {
            float: unset;
            width: 100%;
            margin-top: 10px
        }

        .exibicaodeprodutos {
            margin-top: 10px;
            padding: 0;
        }
    }
</style>

@section('conteudo')
    <main>

        <!-- FILTRO -->
        <aside>
            <h3>Filtrar por</h3>
            <hr>
            <!-- Categorias -->
            <button class="t" onclick="alterarIcone('oicone', 'categorias')">
                <h5>Categorias</h5>
                <i id="oicone" class="fa fa-minus"></i>
            </button>
            <div id="categorias" class="c">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault1">
                    <label class="form-check-label" for="flexCheckDefault1">
                        Camisa
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault2">
                    <label class="form-check-label" for="flexCheckDefault2">
                        Jaqueta
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault3">
                    <label class="form-check-label" for="flexCheckDefault3">
                        Calça
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault4">
                    <label class="form-check-label" for="flexCheckDefault4">
                        Short
                    </label>
                </div>
            </div>
            <hr>

            <!-- Cores -->
            <button class="t" onclick="alterarIcone('oiconecores', 'cores')">
                <h5>Cores</h5>
                <i id="oiconecores" class="fa fa-plus"></i>
            </button>
            <div id="cores" class="c" style="display: none">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault5">
                    <label class="form-check-label" for="flexCheckDefault5">
                        Preto
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault6">
                    <label class="form-check-label" for="flexCheckDefault6">
                        Branco
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault7">
                    <label class="form-check-label" for="flexCheckDefault7">
                        Amarelo
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault8">
                    <label class="form-check-label" for="flexCheckDefault8">
                        Verde
                    </label>
                </div>
            </div>
            <hr>

            <!-- Tamanhos -->
            <button class="t" onclick="alterarIcone('oiconetamanhos', 'tamanhos')">
                <h5>Tamanhos</h5>
                <i id="oiconetamanhos" class="fa fa-plus"></i>
            </button>
            <div id="tamanhos" class="c" style="display: none">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault9">
                    <label class="form-check-label" for="flexCheckDefault9">
                        34
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault10">
                    <label class="form-check-label" for="flexCheckDefault10">
                        35
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault11">
                    <label class="form-check-label" for="flexCheckDefault11">
                        36
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault12">
                    <label class="form-check-label" for="flexCheckDefault12">
                        37
                    </label>
                </div>
            </div>

            <hr>

            <button class="btnpadrao">Filtrar</button>

        </aside>

        <!-- EXIBIR PRODUTOS  -->
        <div>
            <!-- ABRIR MODAL MOBILE -->
            <button type="button" class="btnpadraomobile b" data-bs-toggle="modal" data-bs-target="#exampleModal">
                <i class="fa fa-filter" style="margin-right: 10px"></i>
                <p style="margin: 0 !important">Filtrar</p>
            </button>

            <select class="form-select" aria-label="Default select example">
                <option selected>Ordenar por</option>
                <option value="1">Menor preço</option>
                <option value="2">Maior preço</option>
            </select>

            <div id="app" class="exibicaodeprodutos">
                <card-produto-component :prod="{{ json_encode($produtos) }}" classedocard="divprodutosviewloja">
                </card-produto-component>
            </div>
        </div>
        <!-- EXIBIR PRODUTOS TERMINA AQUI -->


        <!-- MODAL PARA FILTRO NO MOBILE -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Filtrar por</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- FILTRO -->
                        <aside class="filtromobile">
                            <!-- Categorias -->
                            <button class="t" onclick="alterarIcone('oiconemobile', 'categoriasmobile')">
                                <h5>Categorias</h5>
                                <i id="oiconemobile" class="fa fa-minus"></i>
                            </button>
                            <div id="categoriasmobile" class="c">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value=""
                                        id="flexCheckDefault1000">
                                    <label class="form-check-label" for="flexCheckDefault1000">
                                        Camisa
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value=""
                                        id="flexCheckDefault20">
                                    <label class="form-check-label" for="flexCheckDefault20">
                                        Jaqueta
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value=""
                                        id="flexCheckDefault30">
                                    <label class="form-check-label" for="flexCheckDefault30">
                                        Calça
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value=""
                                        id="flexCheckDefault40">
                                    <label class="form-check-label" for="flexCheckDefault40">
                                        Short
                                    </label>
                                </div>
                            </div>
                            <hr>

                            <!-- Cores -->
                            <button class="t" onclick="alterarIcone('oiconecoresmobile', 'coresmobile')">
                                <h5>Cores</h5>
                                <i id="oiconecoresmobile" class="fa fa-plus"></i>
                            </button>
                            <div id="coresmobile" class="c" style="display: none">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value=""
                                        id="flexCheckDefault50">
                                    <label class="form-check-label" for="flexCheckDefault50">
                                        Preto
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value=""
                                        id="flexCheckDefault60">
                                    <label class="form-check-label" for="flexCheckDefault60">
                                        Branco
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value=""
                                        id="flexCheckDefault70">
                                    <label class="form-check-label" for="flexCheckDefault70">
                                        Amarelo
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value=""
                                        id="flexCheckDefault80">
                                    <label class="form-check-label" for="flexCheckDefault80">
                                        Verde
                                    </label>
                                </div>
                            </div>
                            <hr>

                            <!-- Tamanhos -->
                            <button class="t" onclick="alterarIcone('oiconetamanhosmobile', 'tamanhosmobile')">
                                <h5>Tamanhos</h5>
                                <i id="oiconetamanhosmobile" class="fa fa-plus"></i>
                            </button>

                            <div id="tamanhosmobile" class="c" style="display: none">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value=""
                                        id="flexCheckDefault90">
                                    <label class="form-check-label" for="flexCheckDefault90">
                                        34
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value=""
                                        id="flexCheckDefault100">
                                    <label class="form-check-label" for="flexCheckDefault100">
                                        35
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value=""
                                        id="flexCheckDefault110">
                                    <label class="form-check-label" for="flexCheckDefault110">
                                        36
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value=""
                                        id="flexCheckDefault120">
                                    <label class="form-check-label" for="flexCheckDefault120">
                                        37
                                    </label>
                                </div>
                            </div>

                        </aside>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btnpadraomobile">Filtrar</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                    </div>
                </div>
            </div>
        </div>

    </main>
@endsection

<script>
    function alterarIcone(idicone, iddiv) {
        var i = document.getElementById(idicone)
        var cat = document.getElementById(iddiv)

        if (i.classList.contains("fa-minus")) {
            i.classList.remove('fa-minus')
            i.classList.add('fa-plus')
            cat.style.display = "none"
        } else {
            i.classList.remove('fa-plus')
            i.classList.add('fa-minus')
            cat.style.display = "flex"
        }
    }
</script>
