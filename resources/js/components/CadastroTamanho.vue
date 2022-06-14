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
        <!-- INSERIR TAMANHOS -->
         <div class="row justify-content-center">
            <div class="col-md-6">
                <card-component titulo="Cadastrar tamanhos">
                    <template v-slot:conteudo>
                        <div class="d-flex ip">
                            <input class="form-control" type="text" placeholder="Tamanho">
                            <botao-component titulo="Inserir"></botao-component>
                        </div>
                    </template>
                </card-component>
            </div>
        </div>
        </br>
        <!-- LISTA DE TAMANHOS -->
        <div class="row justify-content-center">
            <div class="col-md-6">
                <card-component titulo="Lista de tamanhos">
                    <template v-slot:conteudo>
                        <div>
                            <p>36</p>
                            <p>37</p>
                            <p>38</p>
                            <p>39</p>
                            <p>40</p>
                            <p>41</p>
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
