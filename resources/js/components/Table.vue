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

                    <td style="width: 250px !important;">
                        <button type="button" v-if="remover.visivel"
                            @click="modalConfirm(obj, remover.texto, remover.url)"
                            class="btn btn-outline-danger mx-1">{{ remover.titulo }}</button>

                        <button @click="setStore(obj)" v-if="visualizar.visivel" type="button"
                            :data-bs-toggle="visualizar.dataBsToggle" :data-bs-target="visualizar.dataBsTarget"
                            class="btn btn-outline-info">{{
                                    visualizar.titulo
                            }}</button>

                        <a v-if="atualizar.visivel" :href="atualizar.url + '/' + obj.id + '/edit'" type="button"
                            class="btn btn-outline-success">{{
                                    atualizar.titulo
                            }}</a>

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
    // mounted() {
    //     console.log(this.dados);
    // },
    computed: {
        dadosFiltrados() {

            let campos = Object.keys(this.titulos)
            let dadosFiltrados = []

            Object.keys(this.dados).forEach((key) => {
                let itemFiltrado = {}

                campos.forEach(campo => {
                    itemFiltrado[campo] = this.dados[key][campo] //utilizar a sintaxe de array para atribuir valores a objetos
                })
                //adicionando objeto ao array
                dadosFiltrados.push(itemFiltrado)
            });

            return dadosFiltrados //retorne um array de objetos 

            // console.log(convertida);
            // this.dados.map(item => {
            //     //objeto
            //     let itemFiltrado = {}
            //     campos.forEach(campo => {
            //         //atribuindo valor a abjeto
            //         console.log(item[campo]);
            //         itemFiltrado[campo] = item[campo] //utilizar a sintaxe de array para atribuir valores a objetos
            //     })
            //     //adicionando objeto ao array
            //     dadosFiltrados.push(itemFiltrado)
            // })

            // return dadosFiltrados //retorne um array de objetos 
            // if (this.dados.count) {
            //     var produtos = this.dados.produtos

            //     produtos = Object.keys(produtos)
            //         .map(function (key) {
            //             return produtos[key][0][0];
            //         })

            //     produtos.map(item => {

            //         let itemFiltrado = {}

            //         campos.forEach(campo => {
            //             //atribuindo valor a abjeto
            //             itemFiltrado[campo] = item[campo] //utilizar a sintaxe de array para atribuir valores a objetos
            //         })
            //         //adicionando objeto ao array
            //         dadosFiltrados.push(itemFiltrado)

            //     })

            //     // console.log(dadosFiltrados);
            //     return dadosFiltrados //retorne um array de objetos 

            // } else {

            // this.dados.map(item => {
            //     //objeto
            //     let itemFiltrado = {}
            //     campos.forEach(campo => {
            //         //atribuindo valor a abjeto
            //         itemFiltrado[campo] = item[campo] //utilizar a sintaxe de array para atribuir valores a objetos
            //     })
            //     //adicionando objeto ao array
            //     dadosFiltrados.push(itemFiltrado)
            // })

            //  }
        }
    },
    methods: {
        setStore(obj) {

            //console.log(this.dados[obj.id]);

            this.$store.state.produto.item = this.dados[obj.id]
            this.$store.state.produto.prodTamCor = this.dados[obj.id].prod_tam_cors
            this.$store.state.produto.imagens = this.dados[obj.id].imagens
console.log(this.$store.state.produto.imagens);
            // ptc = Object.keys(ptc)
            //     .map(function (key) {
            //         return ptc[key][1];
            //     })

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
