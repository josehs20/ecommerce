<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <card-component titulo="Página inicial">
                    <template v-slot:conteudo>
                        <div class="form-row">
                            conteudo
                        </div>
                    </template>

                    <template v-slot:rodape>
                        rodape
                    </template>
                </card-component>
            </div>
        </div>
    </div>
</template>

<script>
</script>