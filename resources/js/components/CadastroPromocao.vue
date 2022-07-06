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

.produto-para-promocao {
    display: flex;
    justify-content: space-around
}

.produto-para-promocao>div {
    width: 80%
}

.ctnr>div {
    margin-bottom: 10px
}

.btnSearch {
    height: 37px !important;
}

.lista-produtos-pesquisados {
    list-style: none;
}
</style>

<template>
    <div class="container ctnr">

        <div class="row justify-content-center">
            <div class="col-md-8">
                <!-- PESQUISAR PRODUTOS -->
                <card-component titulo="Pesquise o produto para incluir desconto">
                    <template v-slot:conteudo>
                        <div>
                            <form method="get" class="produto-para-promocao"
                                @submit.prevent="searchProdutos($event)">
                                <input type="hidden" name="_token" :value="csrf_token">

                                <input v-model="search" type="search" class="form-control input-sm me-2" name="search">
                                <button type="submit" class="btn btn-outline-primary btnSearch"><i
                                        class="fa fa-search"></i></button>
                            </form>
                        </div>

                        <ul class="lista-produtos-pesquisados">
                            <li>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value=""
                                        id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">
                                        nome
                                    </label>
                                </div>
                            </li>
                        </ul>

                    </template>
               
                </card-component>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <!-- INSERIR PROMOÇÃO-->
                <card-component titulo="Insira a promoção">
                    <template v-slot:conteudo>
                        <div class="form-adicionar">
                            <div class="input-group inputN">
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
    </div>
</template>
 
<script>
import axios from 'axios';

    export default {
        props: ['csrf_token'],
        data(){
            return{
                url: '/promocao',
                search: ''
            }
        },
        methods: {
            searchProdutos(e){
                var search = {search: this.search}
                axios.get(this.url, search).then(response => {
                    console.log(response);
                }).catch(erros => {
                    
                })
                console.log(search)
            }
        }
    }
</script>