<style>
.ip {
    display: flex;
    justify-content: center;
}

.ip input {
    width: 60%;
    margin-right: 10px;
}

#corCodCadastro {
    width: 30%;
}
</style>

<template>
    <div class="container">
        <!-- INSERIR CORES -->
        <div class="row justify-content-center">
            <div class="col-md-6">
                <card-component titulo="Cadastrar cores">
                    <template v-slot:conteudo>
                        <form method="POST" @submit.prevent="inserirCor($event)">
                            <input type="hidden" name="_token" :value="csrf_token">
                            <div class="d-flex ip">
                                <input v-model="corCodCadastro" class="form-control mt-4" type="color"
                                    id="corCodCadastro" name="ArcoIris" list="arcoIris">
                                <datalist id="arcoIris">
                                    <option value="#FF0000">Vermelho</option>
                                    <option value="#FFA500">Laranja</option>
                                    <option value="#FFFF00">Amarelo</option>
                                    <option value="#008000">Verde</option>
                                    <option value="#0000FF">Azul</option>
                                    <option value="#4B0082">Indigo</option>
                                    <option value="#EE82EE">Violeta</option>
                                </datalist>
                                <input-component id="corNomeCadastro" id-help="corCadastro">
                                    <input required type="text" class="form-control" id="corNomeCadastro"
                                        aria-describedby="corNomeCadastro" placeholder="Nome da cor"
                                        v-model="corNomeCadastro">
                                </input-component>
                                <botao-component type="submit" estilo="btn btn-outline-primary" titulo="Inserir">
                                </botao-component>
                            </div>
                        </form>
                    </template>
                </card-component>
            </div>
        </div>
        <br>
        <!-- LISTA DE CORES -->
        <div class="row justify-content-center">
            <div class="col-md-6">
                <card-component v-if="!this.cores.length" titulo="Lista de cores">
                    <template v-slot:conteudo>

                        <div class="alert alert-warning" role="alert">
                            Nenhuma cor cadastrada!
                        </div>

                    </template>
                </card-component>

                <card-component v-if="this.cores.length" titulo="Lista de cores">
                    <template v-slot:conteudo>
                        <table-component @carregarLista="carregarLista" :dados="cores" :titulos="{
                            id: { titulo: 'nº', tipo: 'texto' },
                            nome: { titulo: 'Nome', tipo: 'texto' },
                            codigo: { titulo: 'Cor', tipo: 'cor' }
                        }"
                            :remover="{ visivel: true, titulo: 'Remover', texto: 'Deseja realmente excluir essa cor ?', url: '/cor' }"
                            :visualizar="{ visivel: false, titulo: 'Visualizar'}"
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
            url: '/cor',
            corNomeCadastro: '',
            corCodCadastro: '',
            cores: '',
        }
    },
    methods: {
        inserirCor(e) {
            var data = { nome: this.corNomeCadastro, codigo: this.corCodCadastro ? this.corCodCadastro : '#000' }

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
                            title: 'Cor Já Existe',
                            showConfirmButton: false,
                            timer: 2000
                        })
                    }

                })
                this.carregarLista()
        },
        carregarLista() {

            axios.get(this.url)
                .then(response => {
                    this.cores = response.data
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
