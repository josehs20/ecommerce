<style>
.card-e {
    width: 48% !important;
}

.card-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.card-header h4 {
    margin: 0 !important;
}

.card-enderecos {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-around;
}
.dnb{
    display: flex;
    justify-content: space-between;
}
.cb p{
    font-size: 1.05rem;
}
</style>
<template>
    <div>
        <div class="dnb">
            <h3>{{nomedaview}}</h3>
            <button class="btnPadrao">Adicionar endereço</button>
        </div>
        <hr>
        <br>
        <div class="card-enderecos">
            <div v-for="dado, chave in dados" :value="dado.id" :key="chave" class="card card-e">
                <div class="card-header">
                    <h4>{{ dado.rua }}</h4>
                    <button class="btn btn-outline-success">{{ botao }}</button>
                </div>
                <div class="card-body cb">
                    <div class="row">
                        <p v-for="titulo, chave in titulos" :value="titulo.id" :key="chave" v-if="dado[chave]">
                            <b>{{ titulo.label }}:</b> {{ dado[chave] }}
                        </p>
                        <p v-else><b>{{ titulo.label }}:</b> não cadastrada</p>
                    </div>
                </div>
                <div class="card-footer">

                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: ['dados', 'titulos', 'nomedaview', 'botao']
}
</script>
