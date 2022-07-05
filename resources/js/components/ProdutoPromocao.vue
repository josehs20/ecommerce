<template>
    <div>
        <div class="d">
            <h1 class="titulo">Promoção</h1>
            <br>
            <div>
                <card-produto-component 
                    classedocard="divprodutos"
                    :prod="produtoscompromocao"   
                ></card-produto-component>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['produtos'],
        data(){
            return {
                produtoscompromocao:[],
            }
        },
        mounted() {
            this.produtos.forEach(produto => {
                if(produto.desconto_id){
                    this.produtoscompromocao.push(produto)
                }
            });
        }
    }
</script>