<style>
.card {
    width: 48%;
}

.card-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.card-header h4 {
    margin: 0 !important;
}
.card-enderecos{
    display: flex;
    flex-wrap: wrap;
    justify-content: space-around;
}
</style>
<template>
    <div class="card-enderecos">
        <div v-for="dado, chave in dados" :value="dado.id" :key="chave" class="card">
            <div class="card-header">
                <h4>{{ dado.rua }}</h4>
                <button class="btn btn-outline-success">{{ botao }}</button>
            </div>
            <div class="card-body">
                <div class="row">
                    <p v-for="titulo, chave in titulos" :value="titulo.id" :key="chave"
                        v-if="dado[chave]">
                        {{ titulo.label }}: {{ dado[chave] }}
                    </p>
                    <p v-else>{{ titulo.label }} não cadastrada</p>
                </div>
            </div>
            <div class="card-footer">

            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: ['dados', 'titulos', 'nomedaview', 'botao']
}
</script>
