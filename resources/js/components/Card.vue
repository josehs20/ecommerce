<template>
    <!--Inicio do card-->
    <div class="card">
        <div class="card-header">{{ titulo }}</div>
        <div class="card-body">
            <div class="row">

                <slot name="conteudo"></slot>

            </div>
        </div>
        <div class="card-footer">

        </div>
    </div>
    <!--Fim do card-->
</template>

<script>
export default {
    props: ['titulo']
}
</script>
