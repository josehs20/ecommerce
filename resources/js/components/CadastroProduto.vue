
<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <card-component titulo="Cadastro de produto">
                    <template v-slot:conteudo>
                        <form enctype="multipart/form-data" action="/produto" method="POST"
                            @submit.prevent="inserirProduto($event)">
                            <input type="hidden" name="_token" :value="csrf_token">
                            <!-- Linha um cadastro de produto -->
                            <div class="row">
                                <div class="col-md-6">
                                    <input-component titulo="Produto" id="nomeProduto" id-help="nomeProdutoHelp"
                                        texto-ajuda="Informe o nome do produto">
                                        <input required type="text" class="form-control disabledInsert" id="nomeProduto"
                                            aria-describedby="nomeProdutoHelp" placeholder="Nome do Produto"
                                            v-model="nomeProduto">
                                    </input-component>
                                </div>
                                <div class="col-md-2">
                                    <input-component titulo="Custo" id="custoProduto" id-help="custoProduto"
                                        texto-ajuda="Informe o nome do produto">
                                        <input required type="number" class="form-control disabledInsert"
                                            id="custoProduto" aria-describedby="custoProduto"
                                            @change="calculaLucro($event)" placeholder="Custo" v-model="custoProduto">
                                    </input-component>
                                </div>
                                <div class="col-md-2">
                                    <input-component titulo="Preço" id="precoProduto" id-help="precoProduto"
                                        texto-ajuda="Informe o nome do produto">
                                        <input required type="number" class="form-control disabledInsert"
                                            id="precoProduto" aria-describedby="precoProduto"
                                            @change="calculaLucro($event)" placeholder="Preço" v-model="precoProduto">
                                    </input-component>
                                </div>
                                <div class="col md-2">
                                    <input-component titulo="Lucro %" id="lucroProduto" id-help="lucroProduto">
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

                                        <select required v-model="selectCategoria" id="categoriaProdutoSelect"
                                            class="form-select form-select-lg mb-3"
                                            aria-label=".form-select-lg example">
                                            <option v-for="item, key in categorias" :key="key" :value="item.id">{{
                                                    item.nome
                                            }}</option>

                                        </select>
                                    </input-component>
                                </div>
                                <div class="col-md-6">
                                    <input-component titulo="Imagens" id="imagensProduto" id-help="imagensProduto">
                                        <input required type="file" class="form-control disabledInsert"
                                            id="imagensProdutoValue" accept="image/*" multiple
                                            placeholder="Selecione uma imagem" @change="carregarImagem($event)">
                                    </input-component>
                                    <div class="mt-4">
                                        <ul class="list">

                                            <li v-if="imagens.length" class="" v-for="item, key in imagens" :key="key">
                                                {{ item.name }}</li>

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

                                        <select required v-model="selectTamanho" class="form-select"
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
                                        <input required min="0" type="number" class="form-control"
                                            id="quantidadeProduto" aria-describedby="custoProduto"
                                            placeholder="Quantidade" v-model="estoqueProduto">
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

                    </template>
                </card-component>
                <br>

                <card-component titulo="Lista de produtos">
                    <template v-slot:conteudo>
                        <!--Lista de produtos -->
                        <table-component @carregarLista="carregarLista" :dados="produtosLista" :titulos="{
                            id: { titulo: 'nº', tipo: 'texto' },
                            nome: { titulo: 'Nome', tipo: 'texto' },
                            custo: { titulo: 'Custo', tipo: 'texto' },
                            preco: { titulo: 'Preço', tipo: 'texto' },
                            lucro: { titulo: 'Lucro', tipo: 'texto', },
                        }" :remover="{ visivel: true, titulo: 'Remover', texto: 'Deseja realmente excluir essa cor ?', url: '/cor', dataBsToggle: '', dataBsTarget: '' }"
                            :visualizar="{ visivel: true, titulo: 'Visualizar', dataBsToggle: 'modal', dataBsTarget: 'modalProdutoVisualizar' }"
                            :atualizar="{ visivel: true, titulo: 'Atualizar' }">

                        </table-component>

                    </template>

                    <template v-slot:rodape>

                    </template>
                </card-component>
            </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios';
import parseJson from 'parse-json';

export default {
    props: ['csrf_token', 'selects'],
    data() {
        return {
            url: '/produto',
            produtosLista: '',
            prodInserido: '',
            nomeProduto: '',
            precoProduto: '',
            custoProduto: '',
            lucroProduto: '',
            selectCategoria: '',
            imagens: [],
            selectCor: '',
            selectTamanho: '',
            estoqueProduto: '',
            categorias: parseJson(this.selects).categorias,
            cores: parseJson(this.selects).cores,
            tamanhos: parseJson(this.selects).tamanhos,
        }
    },
    methods: {
        inserirProduto(e) {
            let formData = new FormData()

            for (let i = 0; i < this.imagens.length; i++) {

                formData.append('imagens[]', this.imagens[i])
                console.log(this.imagens[i]);
            }

            formData.append('nome', this.nomeProduto)
            formData.append('custo', this.custoProduto)
            formData.append('preco', this.precoProduto)
            formData.append('lucro', this.lucroProduto)
            formData.append('cor', this.selectCor)
            formData.append('tamanho', this.selectTamanho)
            formData.append('estoqueProduto', this.estoqueProduto)
            formData.append('categoria_id', this.selectCategoria)
            formData.append('prodInserido', this.prodInserido)

            axios.post(this.url, formData, { headers: { 'Content-Type': 'multipart/form-data' } })
                .then(response => {
                    console.log(response.data);

                    this.prodInserido = response.data.prodInserido

                    if (response.data.existe === true) {
                        Swal.fire({
                            position: 'top-end',
                            icon: 'warning',
                            title: response.data.msg,
                            showConfirmButton: false,
                            timer: 3000
                        })
                    } else {
                        this.desabilitaInputs()

                        Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: response.data.msg,
                            text: 'Voce pode continuar adicionando cor, tamanho e estoque para este produto',
                            showConfirmButton: false,
                            timer: 5000
                        })
                    }
                })
                .catch(errors => {
                    console.log(errors.response);
                    Swal.fire({
                        position: 'top-end',
                        icon: 'error',
                        title: 'Não foi possível, tente novamente',
                        showConfirmButton: false,
                        timer: 2000
                    })
                })
        },
        desabilitaInputs() {
            var inputsDisable = document.querySelectorAll('.disabledInsert');

            inputsDisable.forEach(element => {
                element.readOnly = true
            });
            document.getElementById('imagensProdutoValue').style.display = 'none'
            document.getElementById('categoriaProdutoSelect').disabled = true
        },
        calculaLucro(e) {
            var preco = this.precoProduto
            var custo = this.custoProduto

            if (custo && preco) {
                var lucro = ((preco - custo) / preco) * 100;
                this.lucroProduto = lucro.toFixed(2);
            }
        },
        carregarImagem(e) {
            this.imagens = e.target.files;
            var extensoesPermitidas = /(.png)$/i;
            var verify = true;
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
        carregarLista() {

            axios.get(this.url)
                .then(response => {
                    this.produtosLista = response.data

                })
                .catch(errors => {
                    //console.log(errors);
                })
        },
    },
    mounted() {
        this.carregarLista();
    }
}

</script>
