<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <card-component titulo="Cadastro de produto">
                    <template v-slot:conteudo>
                        <form method="POST" @submit.prevent="inserirProduto($event)">
                            <!-- Linha um cadastro de produto -->
                            <div class="row">
                                <div class="col-md-6">
                                    <input-component titulo="Produto" id="nomeProduto" id-help="nomeProdutoHelp"
                                        texto-ajuda="Informe o nome do produto">
                                        <input type="text" class="form-control" id="nomeProduto"
                                            aria-describedby="nomeProdutoHelp" placeholder="Nome do Produto"
                                            v-model="nomeProduto">
                                    </input-component>
                                </div>
                                <div class="col-md-2">
                                    <input-component titulo="Custo" id="custoProduto" id-help="custoProduto"
                                        texto-ajuda="Informe o nome do produto">
                                        <input type="number" class="form-control" id="custoProduto"
                                            aria-describedby="custoProduto" placeholder="Custo" v-model="custoProduto">
                                    </input-component>
                                </div>
                                <div class="col-md-2">
                                    <input-component titulo="Preço" id="precoProduto" id-help="precoProduto"
                                        texto-ajuda="Informe o nome do produto">
                                        <input type="number" class="form-control" id="precoProduto"
                                            aria-describedby="precoProduto" placeholder="Preço" v-model="precoProduto">
                                    </input-component>
                                </div>
                                <div class="col md-2">
                                    <input-component titulo="Lucro" id="lucroProduto" id-help="lucroProduto">
                                        <input readonly type="number" class="form-control" id="lucroProduto"
                                            aria-describedby="lucroProduto" placeholder="Lucro" v-model="lucroProduto">
                                    </input-component>
                                </div>
                            </div>

                            <!-- Linha dois cadastro de produto -->
                            <div class="row mt-2">

                                <div class="col-md-4">
                                    <input-component titulo="Categoria" id="categoriaProduto"
                                        id-help="categoriaProduto">

                                        <select v-model="selectCategoria" class="form-select form-select-lg mb-3"
                                            aria-label=".form-select-lg example">
                                            <option v-for="item, key in categorias" :value="item.id" :key="key"
                                                :selected="key == 1">{{ item.nome }}</option>

                                        </select>
                                    </input-component>
                                </div>
                                <div class="col-md-6">
                                    <input-component titulo="Imagens" id="imagensProduto" id-help="imagensProduto">
                                        <input type="file" class="form-control" id="imagensProdutoValue"
                                            accept="image/*" multiple placeholder="Selecione uma imagem"
                                            @change="carregarImagem($event)">
                                    </input-component>
                                    <div class="mt-4">
                                        <ul class="list">

                                            <li v-if="imagens.length" class="" v-for="item, key in imagens" :key="key">{{ item.name }}</li>

                                        </ul>

                                    </div>
                                </div>
                            </div>

                            <div class="row mt-4">

                                <div class="col-md-4">
                                    <input-component titulo="Cor" id="categoriaProduto" id-help="categoriaProduto">

                                        <select required class="form-select" v-model="selectCor"
                                            aria-label="Default select example">

                                            <option v-for="item, key in cores" :value="item.id" :key="key">
                                                {{ item.nome }}
                                            </option>
                                        </select>
                                    </input-component>
                                </div>

                                <div class="col-md-4">
                                    <input-component titulo="Tamanho" id="tamanhoProduto" id-help="tamanhoProduto">

                                        <select v-model="selectTamanho" class="form-select"
                                            aria-label="Default select example">
                                            <option v-for="item, key in tamanhos" :value="item.id" :key="key">
                                                {{ item.nome }}
                                            </option>
                                        </select>
                                    </input-component>
                                </div>

                                <div class="col-md-2">
                                    <input-component titulo="Estoque" id="quantidadeProduto" id-help="quantidadeProduto"
                                        texto-ajuda="Informe o nome do produto">
                                        <input min="0" type="number" class="form-control" id="quantidadeProduto"
                                            aria-describedby="custoProduto" placeholder="Quantidade"
                                            v-model="custoProduto">
                                    </input-component>

                                </div>
                                <div class="col-md-2 d-flex justify-content-center h-20 mt-4">

                                    <botao-component type="submit" estilo="btn btn-outline-primary" titulo="Adicionar">
                                    </botao-component>
                                </div>
                            </div>
                        </form>
                    </template>

                    <template v-slot:rodape>
                        rodape
                    </template>
                </card-component>
                <br>

                <card-component titulo="Lista de produtos ">
                    <template v-slot:conteudo>
                        <!-- Linha um cadastro de produto -->
                        <div class="row">


                        </div>

                    </template>

                    <template v-slot:rodape>

                    </template>
                </card-component>
            </div>
        </div>
    </div>
</template>

<script>
import parseJson from 'parse-json';

export default {
    props: ['csrf_token', 'selects'],
    data() {
        return {
            nomeProduto: '',
            precoProduto: '',
            custoProduto: '',
            lucroProduto: '',
            selectCategoria: '',
            selectCor: '',
            selectTamanho: '',
            imagens: [],
            categorias: parseJson(this.selects).categorias,
            cores: parseJson(this.selects).cores,
            tamanhos: parseJson(this.selects).tamanhos,
        }
    },

    methods: {
        inserirProduto(e) {
            var data = { nome: this.nomeProduto, preco: this.precoProduto, custo: this.custoProduto, lucro: this.lucroProduto, categoria_id: this.selectCategoria, imagens: this.imagens }

            console.log(this.selectCategoria);

        },
        carregarImagem(e) {
            this.imagens = e.target.files;
            var extensoesPermitidas = /(.png)$/i;
            var verify = true;
            console.log(this.imagens.length);
            if (this.imagens.length > 5) {
                  Swal.fire({
                        icon: 'error',
                        title: 'Quantidade inválida',
                        text: 'Produto deve ter no mínimo 1 imagem e no máximo 5',
                    })
                    document.getElementById('imagensProdutoValue').value = []
                    return
            }

            Object.keys(this.imagens).forEach(element => {
                if (!extensoesPermitidas.exec(this.imagens[element].name)) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Formato inválido',
                        text: 'Formato suportado : png.',
                    })
                    verify = false
                    document.getElementById('imagensProdutoValue').value = []
                    return
                }
            });
        },
    },
    mounted() {
        //var categoriass =  parseJson(this.cat)
        //console.log();
    }
}

</script>
