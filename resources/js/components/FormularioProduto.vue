<template>
    <div>
        <div class="row">
            <div class="col-md-6">
                <input-component titulo="Produto" id="nomeProduto" id-help="nomeProdutoHelp"
                    texto-ajuda="Informe o nome do produto">
                    <input required type="text" class="form-control disabledInsert" id="nomeProduto"
                        aria-describedby="nomeProdutoHelp" placeholder="Nome do Produto" v-model="data.nomeProduto">
                </input-component>
            </div>
            <div class="col-md-2">
                <input-component titulo="Custo" id="custoProduto" id-help="custoProduto"
                    texto-ajuda="Informe o nome do produto">
                    <input required type="number" class="form-control disabledInsert" id="custoProduto"
                        aria-describedby="custoProduto" @change="calculaLucro($event)" placeholder="Custo"
                        v-model="data.custoProduto">
                </input-component>
            </div>
            <div class="col-md-2">
                <input-component titulo="Preço" id="precoProduto" id-help="precoProduto"
                    texto-ajuda="Informe o nome do produto">
                    <input required type="number" class="form-control disabledInsert" id="precoProduto"
                        aria-describedby="precoProduto" @change="calculaLucro($event)" placeholder="Preço"
                        v-model="data.precoProduto">
                </input-component>
            </div>
            <div class="col md-2">
                <input-component titulo="Lucro %" id="lucroProduto" id-help="lucroProduto">
                    <input readonly type="number" class="form-control" id="lucroProduto" aria-describedby="lucroProduto"
                        placeholder="Lucro" v-model="data.lucroProduto">
                </input-component>
            </div>
        </div>



        <!-- Linha dois cadastro de produto -->
        <div class="row mt-2">

            <div class="col-md-4">
                <input-component titulo="Categoria" id="categoriaProduto" id-help="categoriaProduto">

                    <select required v-model="data.selectCategoria" id="categoriaProdutoSelect"
                        class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
                        <option v-for="item, key in categorias" :key="key" :value="item.id">{{
                                item.nome
                        }}</option>

                    </select>
                </input-component>
            </div>
            <div class="col-md-6">
                <input-component titulo="Imagens" id="imagensProduto" id-help="imagensProduto">
                    <input required type="file" class="form-control disabledInsert" id="imagensProdutoValue"
                        accept="image/*" multiple placeholder="Selecione uma imagem" @change="carregarImagem($event)">
                </input-component>
                <div class="mt-4">
                    <ul class="list">

                        <li v-if="data.imagens.length" class="" v-for="item, key in data.imagens" :key="key">
                            {{ item.name }}</li>

                    </ul>

                </div>
            </div>
        </div>

        <div class="row mt-4">

            <div class="col-md-4">
                <input-component titulo="Cor" id="categoriaProduto" id-help="categoriaProduto">

                    <select required class="form-select" v-model="data.selectCor" aria-label="Default select example">

                        <option v-for="item, key in cores" :value="item.id" :key="key">
                            {{ item.nome }}
                        </option>
                    </select>
                </input-component>
            </div>

            <div class="col-md-4">
                <input-component titulo="Tamanho" id="tamanhoProduto" id-help="tamanhoProduto">

                    <select required v-model="data.selectTamanho" class="form-select"
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
                    <input required min="0" type="number" class="form-control" id="quantidadeProduto"
                        aria-describedby="custoProduto" placeholder="Quantidade" v-model="data.estoqueProduto">
                </input-component>

            </div>
            <div class="col-md-2 d-flex justify-content-center h-20 mt-4">

                <button @click="setDados('functionEvento')" class="btn btn-outline-primary">Adicionar</button>


            </div>
        </div>
    </div>
</template>

<script>
import parseJson from 'parse-json';

export default {
    props: ['selects', 'functionEvento'],
    emits: ['inserirProduto', 'atualizarProduto'],

    data() {
        return {
            data: {
                url: '/produto',
                produtosLista: '',       
                nomeProduto: '',
                precoProduto: '',
                custoProduto: '',
                lucroProduto: '',
                selectCategoria: '',
                imagens: [],
                selectCor: '',
                selectTamanho: '',
                estoqueProduto: '',

            },
            categorias: parseJson(this.selects).categorias,
            cores: parseJson(this.selects).cores,
            tamanhos: parseJson(this.selects).tamanhos,
        }
    },
    methods: {

        desabilitaInputs() {
            var inputsDisable = document.querySelectorAll('.disabledInsert');

            inputsDisable.forEach(element => {
                element.readOnly = true
            });
            document.getElementById('imagensProdutoValue').style.display = 'none'
            document.getElementById('categoriaProdutoSelect').disabled = true
        },
        setDados() {         
            this.$emit('inserirProduto', this.data)  
        },
        calculaLucro(e) {
            var preco = this.data.precoProduto
            var custo = this.data.custoProduto

            if (custo && preco) {
                var lucro = ((preco - custo) / preco) * 100;
                this.data.lucroProduto = lucro.toFixed(2);
            }
        },
        carregarImagem(e) {
            this.data.imagens = e.target.files;
            var extensoesPermitidas = /(.png)$/i;
            var verify = true;
            if (this.data.imagens.length > 5) {
                Swal.fire({
                    icon: 'error',
                    title: 'Quantidade inválida',
                    text: 'Produto deve ter no mínimo 1 imagem e no máximo 5',
                })
                document.getElementById('imagensProdutoValue').value = []
                return
            }

            Object.keys(this.data.imagens).forEach(element => {
                if (!extensoesPermitidas.exec(this.data.imagens[element].name)) {
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


}
</script>
