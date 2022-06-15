<style>
    .ip{
        display: flex;
        justify-content: center;
    }
    .ip input{
        width: 60%;
        margin-right: 10px;
    }
</style>

<template>
    <div class="container">
        <!-- INSERIR CORES -->
         <div class="row justify-content-center">
            <div class="col-md-6">
                <card-component titulo="Cadastrar cores">
                    <template v-slot:conteudo>
                        <div class="d-flex ip">
                            <input class="form-control" type="text" placeholder="Cor">
                            <botao-component titulo="Inserir"></botao-component>
                        </div>
                    </template>
                </card-component>
            </div>
        </div>
        <br>
        <!-- LISTA DE CORES -->
        <div class="row justify-content-center">
            <div class="col-md-6">
                <card-component titulo="Lista de cores">
                    <template v-slot:conteudo>
                        <div>
                            <p>Jeans claro</p>
                            <p>Jeans claro</p>
                            <p>Jeans escuro</p>
                            <p>Jeans escuro</p>
                            <p>Jeans escuro</p>
                            <p>Jeans escuro</p>
                        </div>                        
                    </template>
                </card-component>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        
    }
</script>
