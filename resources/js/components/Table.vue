<template>
    <div>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col" v-for="t, key in titulos" :key="key">{{ t.titulo }}</th>
                    <th scope="col" v-if="remover.visivel"></th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="obj, chave in dadosFiltrados" :key="chave">

                    <td v-for="valor, chaveValor in obj" :key="chaveValor">
                        <span v-if="titulos[chaveValor].tipo == 'texto'">{{ valor }}</span>
                        <span v-if="titulos[chaveValor].tipo == 'data'">{{ valor | formataDataTempo }}</span>
                    </td>

                    <td>
                        <botao-component v-if="remover.visivel"
                            @function-evento="modalConfirm(obj, remover.texto, remover.url)" type="button"
                            estilo="btn btn-outline-danger" :titulo="remover.titulo">
                        </botao-component>

                    </td>
                </tr>

            </tbody>
        </table>
    </div>
</template>

<script>

export default {
    props: ['dados', 'titulos', 'visualizar', 'atualizar', 'remover'],
    emits: ['carregarLista'],
    methods: {
        modalConfirm(obj, texto, url) {
            var url = url + '/' + String(obj.id);
            Swal.fire({
                title: 'Excluir',
                text: texto,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d333085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Sim, exluir!',
                cancelButtonText: 'Sair',
            }).then((result) => {
                if (result.isConfirmed) {
                    let formData = new FormData()
                    formData.append('_method', 'delete')
                    axios.post(url, formData)
                        .then(response => {
                            Swal.fire(
                                'Deletado',
                                response.data.msg,
                                'success'
                            )
                            this.$emit('carregarLista')
                        })

                        .catch(errors => {
                            console.log(errors);
                        })
                }
            })
        }
    },
    computed: {
        dadosFiltrados() {

            let campos = Object.keys(this.titulos)
            let dadosFiltrados = []

            this.dados.map(item => {
                //objeto
                let itemFiltrado = {}
                campos.forEach(campo => {
                    //atribuindo valor a abjeto
                    itemFiltrado[campo] = item[campo] //utilizar a sintaxe de array para atribuir valores a objetos
                })
                //adicionando objeto ao array
                dadosFiltrados.push(itemFiltrado)
            })

            return dadosFiltrados //retorne um array de objetos 
        }
    },
}
</script>
