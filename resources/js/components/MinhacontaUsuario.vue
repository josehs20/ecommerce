<style>
.dados {
    width: 100%;
    padding: 0 30px
}

.dados>div {
    display: flex;
    justify-content: center;
    flex-wrap: wrap;
}

.dadoscampos {
    width: 50%;
}

.dadoscampos p {
    font-size: 1.05rem;
}

@media (max-width: 900px) {
    .dadoscampos {
        width: 100%
    }
}

.dadoscampos>div {
    margin-bottom: 20px;
}

.nomebotao {
    display: flex;
    justify-content: space-between !important;
    flex-wrap: wrap;
}
</style>

<template>
    <div>
        <div class="dados">
            <div class="nomebotao">
                <h3>{{ nomedaview }}</h3>
                <div>
                    <button class="btn btn-outline-success">{{ botao }}</button>
                </div>
            </div>
            <hr>
            <br>
            <div>
                <div class="dadoscampos">
                    <div  class="card">
                        <div class="card-header">
                            <h4>{{dados.name}}</h4>
                        </div>
                        <div class="card-body">
                            <div class="row" v-for="titulo, chave in titulos" :value="titulo.id" :key="chave">
                                <p v-if="dados[chave]">
                                    <b>{{ titulo.label }}:</b> {{ dados[chave] }}
                                </p>
                                <div v-else>
                                    <p style="margin: 0"><b>{{ titulo.label }}:</b> não cadastrado.</p>
                                    <p>Clique em editar para cadastrar.</p>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: ['dados', 'nomedaview', 'titulos', 'botao'],
}
</script>