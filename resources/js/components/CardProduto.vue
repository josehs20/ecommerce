<style>
.divvermais {
    position: relative;
    bottom: 120px;
    left: 0;
    width: 100%;
    display: flex;
    justify-content: center;
}

.vermais {
    background-color: #cda981 !important;
    padding: 5px 20px;
    border-radius: 7px;
    text-decoration: none;
    color: #fff !important;
    font-weight: bold;
    opacity: 0;
    transition: opacity .5s linear;
}
@media (max-width: 700px){
    .vermais{
        opacity: 1;
    }
}
.cardproduto {
    position: relative;
    width: 245px;
    height: 320px;
    margin: 10px 7px;
    border: 1px solid #ccc;
    border-radius: 5px;
}

.cardbody {
    margin-top: 7px;
}

.cardimgtop {
    width: 243px;
    height: 250px;
    opacity: 1;
    transition: opacity .2s linear;
}

.cardproduto:hover .cardimgtop {
    opacity: 0.8;
}

.cardproduto:hover .vermais {
    opacity: 1 !important;
}

/* PARA PROMOÇÃO NA VIEW PAGINA PRINCIPAL EXIBIR ESSA DIV */
.divprodutos {   
    display: flex;
    padding: 10px;
    height: 400px;
    overflow-x: scroll;
}

/* NA VIEW LOJA EXIBIR ESSA DIV */
.divprodutosviewloja{
    display: flex;
    justify-content: center;
    flex-wrap: wrap;
}

@media (max-width: 900px){
    .cardproduto {      
        width: 170px; 
        height: 220px;  
        margin: 10px 3px;    
    }
    .cardimgtop {
        width: 168px;
        height: 150px;
    }    
    .divprodutos {        
        height: 280px;        
    }
}

.empromocao{
    background-color: rgb(89, 250, 89);
    position: absolute;
    top: 0;
    padding: 5px 20px;
}
.empromocao h5{
    font-size: 0.7rem;
    font-weight: bold;
    margin: 0 !important;
    letter-spacing: 2px;
}
.precoantigo{
    color: red;
}
.preconovo{
    font-weight: bold;
    color: green;
}
</style>

<template>
    <div>
        <div :class="classedocard + ' dragscroll'">      
                <!-- card do produto-->    
                <div class="cardproduto" v-for="prod, chave in prod" :key="chave" :value="prod.id">   
                  
                    <img :src="'./../'+prod.imagens[0].nome" class="cardimgtop" alt="Imagem do produto">
                    <div class="cardbody">
                        <h5 class="text-center">{{prod.nome}}</h5>
                        <!-- Preços-->
                        <div class="d-flex justify-content-around">
                            <!-- <p class="precoantigo">
                                <s>R$ 19,90</s>
                            </p>
                            <p class="preconovo">
                                R$ 15
                            </p> -->
                            <p>
                                R$ {{prod.preco}}
                            </p>
                        </div>
                        <!-- botao de ver mais-->
                        <div class="divvermais">
                            <a :href="'/loja/show/' + prod.id" class="vermais">Ver mais</a>
                        </div>
                        <!-- indicador de promocao -->
                        <div v-if="prod.desconto_id" class="empromocao">
                            <h5>EM PROMOÇÃO</h5>
                        </div>
                    </div>
                </div>
                <!-- card do produto-->      
        </div>
    </div>
</template>

<script>
import parseJson from 'parse-json'

    export default {
        props: ['classedocard', 'prod'],
        methods: {
            data() {
                return {
                    prod: parseJson(this.prod)
                }
            }
        }
    }
</script>