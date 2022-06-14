<style>
    .dropdown a{
        color: #ccc;
    }
    .dropdown a:hover{
        color: white;
    }
</style>
<template>
   <div>
        <div class="dropdown">
            <a class="btn dropdown" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                {{ titulo }}
            </a>

            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                <li v-for="obj, chave in itens" :key="chave"><a class="dropdown-item" :href="obj.rota">{{obj.titulo}}</a></li>
            </ul>
        </div>
   </div>
</template>

<script>
export default {
    props: ['titulo', 'itens']
}
</script>