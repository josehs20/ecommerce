<style>
    .btn-padrao{
        background-color: #4723D9;
        border-radius: 7px;
        padding: 2px 10px;
        opacity: 0.8;
    }
    .btn-padrao:hover{
        opacity: 1;
    }
</style>

<template>
    <button class="btn-padrao" type="submit">{{ titulo }}</button>
</template>

<script>
export default {
    props: ['titulo']
}
</script>