<style>
.ip {
    display: flex;
    justify-content: center;
}

.ip input {
    width: 60%;
    margin-right: 10px;
}
</style>

<template>
    <div class="container">
        <!-- INSERIR CATEGORIAS -->
        <div class="row justify-content-center">
            <div class="col-md-6">
                <card-component titulo="Cadastrar categorias">
                    <template v-slot:conteudo>
                        <form id="formCadastroCategoria" method="POST" @submit.prevent="insereCategoria($event)">
                            <input type="hidden" name="_token" :value="csrf_token">
                            <div class="row">
                                <div class="col-md-9">

                                    <input-component id="categoriaCadastro" id-help="categoriaCadastro">
                                        <input type="text" class="form-control" id="categoriaCadastro"
                                            aria-describedby="categoriaCadastro" placeholder="Nome da categoria"
                                            v-model="categoriaCadastro">
                                    </input-component>

                                </div>
                                <div class="col mt-4">

                                    <botao-component type="submit" estilo="btn btn-outline-primary" titulo="Inserir">
                                    </botao-component>
                                </div>
                            </div>
                        </form>
                    </template>
                </card-component>
            </div>
        </div>
        <br>
        <!-- LISTA DE CATEGORIAS -->
        <div class="row justify-content-center">
            <div class="col-md-6">
                <card-component titulo="Lista de categorias">
                    <template v-slot:conteudo>
                        <table-component @carregarLista="carregarLista" :dados="categorias" :titulos="{
                            id: { titulo: 'nº', tipo: 'texto' },
                            nome: { titulo: 'Nome', tipo: 'texto' }
                        }"
                            :remover="{ visivel: true, titulo: 'Remover', texto: 'Deseja realmente excluir essa categoria ?', url: '/categorias' }">
                        </table-component>
                    </template>
                </card-component>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    props: ['csrf_token'], //data (semelhante)
    data() {
        return {
            url: '/categorias',
            categoriaCadastro: '',
            categorias: '',
        }
    },

    methods: {

        insereCategoria(e) {
            var data = { nome: this.categoriaCadastro }

            axios.post(this.url, data)
                .then(response => {
                    if (response.msg) {
                        console.log(response.msg);
                    }
                })
                .catch(errors => {
                    console.log(errors);
                })

            this.carregarLista()
        },

        carregarLista() {

            axios.get(this.url)
                .then(response => {
                    this.categorias = response.data
                })
                .catch(errors => {
                    console.log(errors);
                })
        }

    },
    mounted() {
        this.carregarLista();
    }
}
</script>
