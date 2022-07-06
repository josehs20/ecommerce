<style>  
    .btnC{
        width: 100%;
    }
</style>

<template>
    <div>
        <button class="btn btn-outline-primary btnC" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample"
            aria-expanded="false" aria-controls="collapseExample">
            {{titulo}}
        </button>

        <div class="collapse" id="collapseExample">
            <div class="card card-body">
                <slot name="conteudo"></slot>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['titulo']
    }
</script>