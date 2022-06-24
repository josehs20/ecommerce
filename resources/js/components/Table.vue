<template>
    <div>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col" v-for="t, key in titulos" :key="key">{{ t.titulo }}</th>
                    <th v-if="remover.visivel || visualizar.visivel || atualizar.visivel"></th>

                </tr>
            </thead>
            <tbody>
                <tr v-for="obj, chave in dadosFiltrados" :key="chave">

                    <td v-for="valor, chaveValor in obj" :key="chaveValor">

                        <span v-if="titulos[chaveValor].tipo == 'texto'">{{ valor }}</span>
                        <span v-if="titulos[chaveValor].tipo == 'cor'"
                            :style="{ backgroundColor: valor }">&emsp;&emsp;&emsp;</span>
                        <span v-if="titulos[chaveValor].tipo == 'data'">{{ valor | formataDataTempo }}</span>
                    </td>

                    <td style="width: 270px !important;">
                        <button type="button" v-if="remover.visivel"
                            @click="modalConfirm(obj, remover.texto, remover.url)"
                            class="btn btn-outline-danger mx-1">{{ remover.titulo }}</button>

                        <button @click="setStore(obj)" v-if="visualizar.visivel" type="button"
                            :data-bs-toggle="visualizar.dataBsToggle" :data-bs-target="visualizar.dataBsTarget"
                            class="btn btn-outline-info">{{
                                    visualizar.titulo
                            }}</button>

                        <button v-if="atualizar.visivel" type="button" class="btn btn-outline-success">{{
                                atualizar.titulo
                        }}</button>

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
    data() {
        return {
            itensDados: {}
        }
    },
    computed: {

        dadosFiltrados() {

            let campos = Object.keys(this.titulos)
            let dadosFiltrados = []

            if (this.dados[0]['produto']) {

                this.dados.map(item => {
                    //console.log(item['produto']);
                    let itemFiltrado = {}
                    this.itensDados[item['produto']['id']] = { cores: {}, tamanhos: {} }
                    campos.forEach(campo => {
                        //atribuindo valor a abjeto
                        itemFiltrado[campo] = item['produto'][campo] //utilizar a sintaxe de array para atribuir valores a objetos
                    })
                    // console.log(item['cores']);
                    this.itensDados[item['produto']['id']]['cores'] = item['cores']
                    this.itensDados[item['produto']['id']]['tamanhos'] = item['tamanhos']
                    //adicionando objeto ao array
                    dadosFiltrados.push(itemFiltrado)
                })

                return dadosFiltrados //retorne um array de objetos 

            } else {

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
        }
    },
    methods: {
        setStore(obj) {
            // console.log(obj.id);
            // console.log(this.itensDados[obj.id]);
            this.$store.state.item.dados = obj
            this.$store.state.item.prodTamCor       
            console.log(this.$store.state.item);
        },

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
                            Swal.fire({
                                position: 'top-end',
                                icon: 'success',
                                title: response.data.msg,
                                showConfirmButton: false,
                                timer: 1500
                            })

                            this.$emit('carregarLista')
                        })

                        .catch(errors => {
                            console.log(errors);
                        })
                }
            })
        }
    },
}
</script>
