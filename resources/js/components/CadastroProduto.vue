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
                    <form enctype="multipart/form-data" :action="url + '/' + dados.produto.id" method="POST"
                        @submit.prevent="eventoInserirProduto($event)">
                        <card-component titulo="Atualziar produto">
                            <template v-slot:conteudo>


                                <input type="hidden" name="_token" :value="csrf_token">

                                <formulario-produto-component @atualizarProduto="atualizarProduto"
                                    functionEvento="atualizarProduto" :dados="dados">

                                </formulario-produto-component>



                            </template>
                        </card-component>
                    </form>
                    <br>

                    <colapse-component titulo="Imagens">
                        <template v-slot:conteudo>

                            <div class="d-flex justify-content-center card-deck">
                                <div class="card col-4 mx-1" v-for="img, key in dados.produto.imagens" :key="key">
                                    <img class="card-img-top" :src="'../../' + img.nome" alt="Card image cap">
                                    <div class="card-body">
                                        <h5 class="card-title"></h5>
                                        <form method="POST" @submit.prevent="deletaImage($event, img.id)">
                                            <button style="font-size: 10px" type="submit" class="btn btn-danger"> <i
                                                    class="bi bi-trash bi-2x"></i></button>
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </template>
                    </colapse-component>


                    <br>

                    <card-component titulo="Produto">
                        <template v-slot:conteudo>
                            <!--Lista de produtos -->

                            <div v-if="!dados.produto" class="alert alert-warning" role="alert">
                                Nenhuma produto cadastrado!
                            </div>

                            <table-component v-if="produtosLista" @carregarLista="carregarLista" :dados="produtosLista"
                                :titulos="{
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
                    <img :src="'../../../' + img.nome" :alt="img.nome">
                </div>
            </template>
        </modal-produto-component>
    </div>
</template>

<script>
import axios from 'axios';
import parseJson from 'parse-json';

export default {
    props: ["csrf_token", "data"],
    data() {
        return {
            url: "/produto",
            verify: '',
            produtosLista: "",
            prodInserido: "",
            produto: "",
            imagens: [],
            dados: parseJson(this.data),
        };
    },
    methods: {
        atualizarProduto() {
            console.log("atualizarProduto");
        },
        deletaImage(e, idImage) {
            var url = '/delete-image/' + idImage

            Swal.fire({
                title: 'Excluir',
                text: 'Deseja realmente excluir essa imagem',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d333085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Sim, exluir!',
                cancelButtonText: 'Sair',
            }).then((result) => {
                if (result.isConfirmed) {

                    var formData = new FormData()
                    formData.append('_method', 'delete')

                    axios.post(url, formData)
                        .then(response => {

                            Swal.fire({
                                position: 'top-end',
                                icon: response.data.icon,
                                title: response.data.msg,
                                showConfirmButton: false,
                                timer: 1500
                            })
                            this.carregarLista();
                        }).catch(errors => {
                            console.log(errors);
                        })
                }
            })
        },
        inserirProduto(data) {
            let formData = new FormData();
            for (let i = 0; i < data.imagens.length; i++) {
                formData.append("imagens[]", data.imagens[i]);
            }
            formData.append("nome", data.nomeProduto);
            formData.append("custo", data.custoProduto);
            formData.append("preco", data.precoProduto);
            formData.append("lucro", data.lucroProduto);
            formData.append("cor", data.selectCor);
            formData.append("tamanho", data.selectTamanho);
            formData.append("estoqueProduto", data.estoqueProduto);
            formData.append("categoria_id", data.selectCategoria);
            axios.post(this.url, formData, { headers: { "Content-Type": "multipart/form-data" } })
                .then(response => {
                    this.prodInserido = response.data.prodInserido;
                    console.log(response.data);
                    if (response.data.existe === true) {
                        Swal.fire({
                            position: "top-end",
                            icon: "warning",
                            title: response.data.msg,
                            showConfirmButton: false,
                            timer: 3000
                        });
                    }
                    else {
                        this.carregarLista();
                        //pega niveis de componentes filho para acessar dados e methos...
                        const componenteFilho = this.$children.find(component => component.$options.name === "card-component").
                            $children.find(component => component.$options.name === "formulario-produto-component");
                        componenteFilho.desabilitaInputs();
                        Swal.fire({
                            position: "top-end",
                            icon: "success",
                            title: response.data.msg,
                            text: "Voce pode continuar adicionando cor, tamanho e estoque para este produto",
                            showConfirmButton: false,
                            timer: 5000
                        });
                    }
                })
                .catch(errors => {
                    if (errors) {
                        Swal.fire({
                            position: "top-end",
                            icon: "error",
                            title: "Não foi possível, tente novamente",
                            showConfirmButton: false,
                            timer: 2000
                        });
                        // $store.state.d = true;
                    }
                    return errors;
                });
        },
        atualizarProduto(data) {


            let formData = new FormData()
            let contImages = data.imagens.length + this.verify.produto.imagens.length
            for (let i = 0; i < data.imagens.length; i++) {
                formData.append('imagens[]', data.imagens[i])
            }

            if (contImages > 5) {
                Swal.fire({
                    icon: 'error',
                    title: 'Quantidade inválida',
                    text: 'Produto deve ter no mínimo 1 imagem e no máximo 5',
                })
                // console.log(document.getElementById('imagensProdutoValue'));
                document.getElementById('imagensProdutoValue').value = []
                return
            }

            formData.append('custo', data.custoProduto)
            formData.append('estoqueProduto', data.estoqueProduto)
            formData.append('lucro', data.lucroProduto)
            formData.append('nome', data.nomeProduto)
            formData.append('preco', data.precoProduto)
            // formData.append('categoria_id', data.selectCategoria)
            formData.append('cor', data.selectCor)
            formData.append('tamanho', data.selectTamanho)
            formData.append('produto_id', this.verify.produto.id)

            formData.append('_method', 'put')

            var url = this.url + '/' + this.verify.produto.id

            axios.post(url, formData, { headers: { 'Content-Type': 'multipart/form-data' } })
                .then(response => {
                    console.log(response.data);
                    //this.prodInserido = response.data.prodInserido
                    console.log(response.data);

                    Swal.fire({
                        position: 'top-end',
                        icon: response.data.icon,
                        title: response.data.msg,
                        showConfirmButton: false,
                        timer: 3000
                    })

                    //afeta metodos e atributos do componente filho
                    const componenteFilho = this.$children.find(component => component.$options.name === "card-component").
                        $children.find(component => component.$options.name === "formulario-produto-component");

                    componenteFilho.data.imagens = '';

                    this.carregarLista();

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
        eventoInserirProduto(e, data) {
        },
        carregarLista() {
            //caso tenha parametro chama no emtodo show, caso não metodo index
            var url = this.dados.produto ? this.url + '/' + this.dados.produto.id : this.url

            axios.get(url)
                .then(response => {
                    this.verify = response.data
                    if (response.data.produto) {
                        this.dados.produto.imagens = this.verify.produto.imagens
                        this.produtosLista = response.data.produto.prod_tam_cors
                    } else {

                        this.produtosLista = response.data.produtos;
                    }

                })
                .catch(errors => {
                    console.log(errors);
                });
        },
    },
    mounted() {
        this.carregarLista();
    },
}


</script>
