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
@media (max-width: 900px){
    .dadoscampos {
        width: 100%
    }
}

.dadoscampos>div {
    margin-bottom: 20px;
}

.nomebotao{
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
                    <button class="btn btn-outline-success">{{botao}}</button>
                </div>
            </div>  
            <hr>
            <br>
            <div>
                <div class="dadoscampos">
                    <div v-for="titulo, chave in titulos" :value="titulo.id" :key="chave">
                        <label v-if="dados[chave]" for="inputUsuario" class="form-label">{{ titulo.label }}</label>
                        <div v-else>
                            <h5>{{titulo.label}} não cadastrado.</h5>
                            <h6>Clique em editar para cadastrar.</h6>
                        </div>                
                        <input v-if="dados[chave]"
                         type="text" id="inputUsuario" class="form-control" :value="dados[chave]" disabled />
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: ['dados','nomedaview', 'titulos', 'botao'],
}
</script>