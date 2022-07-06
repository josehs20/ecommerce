<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div v-if="!dados.produto">
                    <form enctype="multipart/form-data" action="/produto" method="POST"
                        @submit.prevent="eventoInserirProduto($event)">
                        <card-component titulo="Cadastro de produto">
                            <template v-slot:conteudo>

                                <input type="hidden" name="_token" :value="csrf_token">

                                <formulario-produto-component @inserirProduto="inserirProduto"
                                    functionEvento="inserirProduto" :dados="dados">

                                </formulario-produto-component>

                            </template>

                            <template v-slot:rodape>

                            </template>
                        </card-component>
                    </form>
                    <br>

                    <card-component titulo="Lista de produtos">
                        <template v-slot:conteudo>
                            <!--Lista de produtos -->

                            <div v-if="!produtosLista" class="alert alert-warning" role="alert">
                                Nenhuma produto cadastrado!
                            </div>


                            <table-component v-if="produtosLista" @carregarLista="carregarLista" :dados="produtosLista"
                                :titulos="{
                                    id: { titulo: 'nº', tipo: 'texto' },
                                    nome: { titulo: 'Nome', tipo: 'texto' },
                                    custo: { titulo: 'Custo', tipo: 'texto' },
                                    preco: { titulo: 'Preço', tipo: 'texto' },
                                    lucro: { titulo: 'Lucro', tipo: 'texto', },
                                }"
                                :remover="{ visivel: true, titulo: 'Remover', texto: 'Deseja realmente excluir ess3 produto ?', url: '/produto' }"
                                :visualizar="{ visivel: true, titulo: 'Visualizar', dataBsToggle: 'modal', dataBsTarget: '#modalProdutoVisualizar' }"
                                :atualizar="{ visivel: true, titulo: 'Editar', url: '/produto' }">
                            </table-component>

                        </template>

                        <template v-slot:rodape>

                        </template>

                    </card-component>
                </div>
                <div v-else>
                    <card-component titulo="Atualziar produto">
                        <template v-slot:conteudo>

                            <form enctype="multipart/form-data" :action="url + '/' + dados.produto.id" method="POST"
                                @submit.prevent="eventoInserirProduto($event)">
                                <input type="hidden" name="_token" :value="csrf_token">

                                <formulario-produto-component @atualizarProduto="atualizarProduto"
                                    functionEvento="atualizarProduto" :dados="dados">

                                </formulario-produto-component>

                            </form>

                        </template>
                    </card-component>
                    <br>

                    <card-component titulo="Produto">
                        <template v-slot:conteudo>
                            <!--Lista de produtos -->

                            <div v-if="!dados.produto" class="alert alert-warning" role="alert">
                                Nenhuma produto cadastrado!
                            </div>
                            <table-component v-if="dados.produto" @carregarLista="carregarLista"
                                :dados="dados.produto.ptc" :titulos="{
                                    id: { titulo: 'nº', tipo: 'texto' },
                                    cor: { titulo: 'Cor', tipo: 'texto' },
                                    tam: { titulo: 'Tamanho', tipo: 'texto' },
                                    estoque: { titulo: 'Estoque', tipo: 'texto' },
                                    // lucro: { titulo: 'Lucro', tipo: 'texto', },
                                }"
                                :remover="{ visivel: true, titulo: 'Remover', texto: 'Deseja realmente excluir esse tamanho e cor deste produto ?', url: '/estoque' }"
                                :visualizar="{ visivel: false, titulo: 'Visualizar', dataBsToggle: 'modal', dataBsTarget: '' }"
                                :atualizar="{ visivel: false, titulo: 'Editar', url: '/produto' }">

                            </table-component>

                        </template>

                        <template v-slot:rodape>

                        </template>

                    </card-component>
                </div>

            </div>
        </div>

        <modal-produto-component :titulo="$store.state.produto.item.nome" id="modalProdutoVisualizar">
            <template v-slot:conteudo>
                <table class="table">
                    <thead>
                        <tr>

                            <th scope="col">Tamanhos</th>
                            <th scope="col">Cores</th>
                            <th scope="col">Estoque</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="obj, key in $store.state.produto.prodTamCor" :key="key">

                            <td>{{ obj.tamanho.nome }}</td>
                            <td>{{ obj.cor.nome }}</td>
                            <td>{{ obj.estoque.quantidade }}</td>

                        </tr>
                    </tbody>
                </table>
            </template>
            <template v-slot:imagens>
                <div style="width: 80%; border: 1px solid red;" v-for="img, key in $store.state.produto.imagens"
                    :key="key">
                    <img :src="'./../'+img.nome" alt="formataPathImg(img)">
                </div>
            </template>
        </modal-produto-component>
    </div>
</template>

<script>
import axios from 'axios';
import parseJson from 'parse-json';

export default {
    props: ['csrf_token', 'data'],

    data() {
        return {
            url: '/produto',
            produtosLista: '',
            prodInserido: '',
            produto: '',
            imagens: [],
            dados: parseJson(this.data),
        }
    },
    methods: {
        atualizarProduto() {
            console.log('atualizarProduto');
        },
        inserirProduto(data) {

            let formData = new FormData()

            for (let i = 0; i < data.imagens.length; i++) {

                formData.append('imagens[]', data.imagens[i])

            }

            formData.append('nome', data.nomeProduto)
            formData.append('custo', data.custoProduto)
            formData.append('preco', data.precoProduto)
            formData.append('lucro', data.lucroProduto)
            formData.append('cor', data.selectCor)
            formData.append('tamanho', data.selectTamanho)
            formData.append('estoqueProduto', data.estoqueProduto)
            formData.append('categoria_id', data.selectCategoria)

            axios.post(this.url, formData, { headers: { 'Content-Type': 'multipart/form-data' } })
                .then(response => {

                    this.prodInserido = response.data.prodInserido
                    console.log(response.data);
                    if (response.data.existe === true) {
                        Swal.fire({
                            position: 'top-end',
                            icon: 'warning',
                            title: response.data.msg,
                            showConfirmButton: false,
                            timer: 3000
                        })

                    } else {

                        this.carregarLista();

                        //pega niveis de componentes filho para acessar dados e methos...
                        const componenteFilho = this.$children.find(component => component.$options.name === "card-component").
                            $children.find(component => component.$options.name === "formulario-produto-component");

                        componenteFilho.desabilitaInputs()

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

                    if (errors) {
                        Swal.fire({
                            position: 'top-end',
                            icon: 'error',
                            title: 'Não foi possível, tente novamente',
                            showConfirmButton: false,
                            timer: 2000
                        })
                        // $store.state.d = true;
                    }
                    return errors
                })

        },
        atualizarProduto(data) {
            console.log(data);
            // let formData = new FormData()

            // for (let i = 0; i < data.imagens.length; i++) {

            //     formData.append('imagens[]', data.imagens[i])

            // }

            // formData.append('nome', data.nomeProduto)
            // formData.append('custo', data.custoProduto)
            // formData.append('preco', data.precoProduto)
            // formData.append('lucro', data.lucroProduto)
            // formData.append('cor', data.selectCor)
            // formData.append('tamanho', data.selectTamanho)
            // formData.append('estoqueProduto', data.estoqueProduto)
            // formData.append('categoria_id', data.selectCategoria)

            // axios.post(this.url, formData, { headers: { 'Content-Type': 'multipart/form-data' } })
            //     .then(response => {

            //         this.prodInserido = response.data.prodInserido
            //         console.log(response.data);
            //         if (response.data.existe === true) {
            //             Swal.fire({
            //                 position: 'top-end',
            //                 icon: 'warning',
            //                 title: response.data.msg,
            //                 showConfirmButton: false,
            //                 timer: 3000
            //             })

            //         } else {

            //             this.carregarLista();

            //             //pega niveis de componentes filho para acessar dados e methos...
            //             const componenteFilho = this.$children.find(component => component.$options.name === "card-component").
            //                 $children.find(component => component.$options.name === "formulario-produto-component");

            //             componenteFilho.desabilitaInputs()

            //             Swal.fire({
            //                 position: 'top-end',
            //                 icon: 'success',
            //                 title: response.data.msg,
            //                 text: 'Voce pode continuar adicionando cor, tamanho e estoque para este produto',
            //                 showConfirmButton: false,
            //                 timer: 5000
            //             })

            //         }
            //     })
            //     .catch(errors => {

            //         if (errors) {
            //             Swal.fire({
            //                 position: 'top-end',
            //                 icon: 'error',
            //                 title: 'Não foi possível, tente novamente',
            //                 showConfirmButton: false,
            //                 timer: 2000
            //             })
            //             // $store.state.d = true;
            //         }
            //         return errors
            //     })

        },
        eventoInserirProduto(e, data) {
        },
        carregarLista() {

            axios.get(this.url)
                .then(response => {
                    //console.log(response.data);
                    // this.produtosLista = { count: 0 }
                    this.produtosLista = response.data.produtos
                    //this.produtosLista['count'] = Object.keys(response.data).length
                    //  console.log(this.produtosLista)
                })
                .catch(errors => {
                    console.log(errors);
                })
        },
    },
    mounted() {

        this.carregarLista();
    },
}

</script>
