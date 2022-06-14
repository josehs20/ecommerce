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
        <!-- INSERIR CATEGORIAS -->
         <div class="row justify-content-center">
            <div class="col-md-6">
                <card-component titulo="Cadastrar categorias">
                    <template v-slot:conteudo>
                        <div class="d-flex ip">
                            <input class="form-control" type="text" placeholder="Categoria">
                            <botao-component titulo="Inserir"></botao-component>
                        </div>
                    </template>
                </card-component>
            </div>
        </div>
        </br>
        <!-- LISTA DE CATEGORIAS -->
        <div class="row justify-content-center">
            <div class="col-md-6">
                <card-component titulo="Lista de categorias">
                    <template v-slot:conteudo>
                        <div>
                            <p>Calça jeans</p>
                            <p>Calça jeans</p>
                            <p>Calça jeans</p>
                            <p>Calça jeans</p>
                            <p>Calça jeans</p>
                            <p>Calça jeans</p>
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
