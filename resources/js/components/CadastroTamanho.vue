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
        <!-- INSERIR TAMANHOS -->
        <div class="row justify-content-center">
            <div class="col-md-6">
                <colapse-component
                    titulo="Cadastro de tamanhos">
                    <template v-slot:conteudo>
                        <form method="POST" @submit.prevent="insereTamanho($event)">
                            <input type="hidden" name="_token" :value="csrf_token">
                            <div class="d-flex ip">
                                <input required type="text" class="form-control" id="cadastroTamanho"
                                    aria-describedby="cadastroTamanho" placeholder="Nome da categoria"
                                    v-model="cadastroTamanho">
                                    
                                <button type="submit" class="btn btn-outline-primary">Inserir</button>

                            </div>
                        </form>
                    </template>
                </colapse-component>
                <!-- <card-component titulo="Cadastrar tamanhos">
                    <template v-slot:conteudo>
                        <form method="POST" @submit.prevent="insereTamanho($event)">
                            <input type="hidden" name="_token" :value="csrf_token">
                            <div class="d-flex ip">
                                <input required type="text" class="form-control" id="cadastroTamanho"
                                    aria-describedby="cadastroTamanho" placeholder="Nome da categoria"
                                    v-model="cadastroTamanho">
                                    
                                <button type="submit" class="btn btn-outline-primary">Inserir</button>

                            </div>
                        </form>
                    </template>
                </card-component> -->
            </div>
        </div>
        <br>
        <!-- LISTA DE TAMANHOS -->
        <div class="row justify-content-center">
            <div class="col-md-6">

                <card-component v-if="!this.tamanhos.length" titulo="Lista de tamanhos">
                    <template v-slot:conteudo>

                        <div class="alert alert-warning" role="alert">
                            Nenhum tamanho cadastrada!
                        </div>

                    </template>
                </card-component>

                <card-component v-if="this.tamanhos.length" titulo="Lista de tamanhos">
                    <template v-slot:conteudo>
                        <table-component @carregarLista="carregarLista" :dados="tamanhos" :titulos="{
                            id: { titulo: 'nº', tipo: 'texto' },
                            nome: { titulo: 'Nome', tipo: 'texto' }
                        }" :remover="{ visivel: true, titulo: 'Remover', texto: 'Deseja realmente excluir esse tamanho ?', url: '/tamanho' }"
                            :visualizar="{ visivel: false, titulo: 'Visualizar' }"
                            :atualizar="{ visivel: false, titulo: 'Atualizar' }">
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
            url: '/tamanho',
            cadastroTamanho: '',
            tamanhos: '',
        }
    },

    methods: {

        insereTamanho(e) {
            var data = { nome: this.cadastroTamanho }

            axios.post(this.url, data)
                .then(response => {

                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: response.data.msg,
                        showConfirmButton: false,
                        timer: 2000
                    })

                })
                .catch(errors => {
                    if (errors.response.status == '500') {
                        Swal.fire({
                            position: 'top-end',
                            icon: 'warning',
                            title: 'Tamanho Já Existe',
                            showConfirmButton: false,
                            timer: 1500
                        })
                    }

                })

            this.carregarLista()
        },

        carregarLista() {

            axios.get(this.url)
                .then(response => {

                    this.tamanhos = response.data

                })
                .catch(errors => {

                })
        }

    },
    mounted() {
        this.carregarLista();
    }
}
</script>
