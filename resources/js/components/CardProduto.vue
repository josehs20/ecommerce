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
    width: 250px;
    height: 320px;
    margin: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
}

.cardbody {
    margin-top: 7px;
}

.cardimgtop {
    width: 248px;
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

.divprodutos {   
    display: flex;
    padding: 10px;
    height: 410px;
    overflow-x: scroll;
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
        <div class="divprodutos dragscroll">      
                <!-- card do produto-->
                <div class="cardproduto">                    
                    <img src="./../../../public/img/f1.png" class="cardimgtop" alt="Imagem do produto">
                    <div class="cardbody">
                        <h5 class="text-center">Nome do produto</h5>
                        <!-- Preços-->
                        <div class="d-flex justify-content-around">
                            <p class="precoantigo">
                                <s>R$ 19,90</s>
                            </p>
                            <p class="preconovo">
                                R$ 15
                            </p>
                        </div>
                        <!-- botao de ver mais-->
                        <div class="divvermais">
                            <a href="#vermais" class="vermais">Ver mais</a>
                        </div>
                        <!-- indicador de promocao -->
                        <div class="empromocao">
                            <h5>EM PROMOÇÃO</h5>
                        </div>
                    </div>
                </div>
                <!-- card do produto-->
                 <!-- card do produto-->
                <div class="cardproduto">                    
                    <img src="./../../../public/img/f1.png" class="cardimgtop" alt="Imagem do produto">
                    <div class="cardbody">
                        <h5 class="text-center">Nome do produto</h5>
                        <!-- Preços-->
                        <div class="d-flex justify-content-around">
                            <p class="precoantigo">
                                <s>R$ 19,90</s>
                            </p>
                            <p class="preconovo">
                                R$ 15
                            </p>
                        </div>
                        <!-- botao de ver mais-->
                        <div class="divvermais">
                            <a href="#vermais" class="vermais">Ver mais</a>
                        </div>
                        <!-- indicador de promocao -->
                        <div class="empromocao">
                            <h5>EM PROMOÇÃO</h5>
                        </div>
                    </div>
                </div>
                <!-- card do produto-->
                 <!-- card do produto-->
                <div class="cardproduto">                    
                    <img src="./../../../public/img/f1.png" class="cardimgtop" alt="Imagem do produto">
                    <div class="cardbody">
                        <h5 class="text-center">Nome do produto</h5>
                        <!-- Preços-->
                        <div class="d-flex justify-content-around">
                            <p class="precoantigo">
                                <s>R$ 19,90</s>
                            </p>
                            <p class="preconovo">
                                R$ 15
                            </p>
                        </div>
                        <!-- botao de ver mais-->
                        <div class="divvermais">
                            <a href="#vermais" class="vermais">Ver mais</a>
                        </div>
                        <!-- indicador de promocao -->
                        <div class="empromocao">
                            <h5>EM PROMOÇÃO</h5>
                        </div>
                    </div>
                </div>
                <!-- card do produto-->
                 <!-- card do produto-->
                <div class="cardproduto">                    
                    <img src="./../../../public/img/f1.png" class="cardimgtop" alt="Imagem do produto">
                    <div class="cardbody">
                        <h5 class="text-center">Nome do produto</h5>
                        <!-- Preços-->
                        <div class="d-flex justify-content-around">
                            <p class="precoantigo">
                                <s>R$ 19,90</s>
                            </p>
                            <p class="preconovo">
                                R$ 15
                            </p>
                        </div>
                        <!-- botao de ver mais-->
                        <div class="divvermais">
                            <a href="#vermais" class="vermais">Ver mais</a>
                        </div>
                        <!-- indicador de promocao -->
                        <div class="empromocao">
                            <h5>EM PROMOÇÃO</h5>
                        </div>
                    </div>
                </div>
                <!-- card do produto-->
                 <!-- card do produto-->
                <div class="cardproduto">                    
                    <img src="./../../../public/img/f1.png" class="cardimgtop" alt="Imagem do produto">
                    <div class="cardbody">
                        <h5 class="text-center">Nome do produto</h5>
                        <!-- Preços-->
                        <div class="d-flex justify-content-around">
                            <p class="precoantigo">
                                <s>R$ 19,90</s>
                            </p>
                            <p class="preconovo">
                                R$ 15
                            </p>
                        </div>
                        <!-- botao de ver mais-->
                        <div class="divvermais">
                            <a href="#vermais" class="vermais">Ver mais</a>
                        </div>
                        <!-- indicador de promocao -->
                        <div class="empromocao">
                            <h5>EM PROMOÇÃO</h5>
                        </div>
                    </div>
                </div>
                <!-- card do produto-->
                 <!-- card do produto-->
                <div class="cardproduto">                    
                    <img src="./../../../public/img/f1.png" class="cardimgtop" alt="Imagem do produto">
                    <div class="cardbody">
                        <h5 class="text-center">Nome do produto</h5>
                        <!-- Preços-->
                        <div class="d-flex justify-content-around">
                            <p class="precoantigo">
                                <s>R$ 19,90</s>
                            </p>
                            <p class="preconovo">
                                R$ 15
                            </p>
                        </div>
                        <!-- botao de ver mais-->
                        <div class="divvermais">
                            <a href="#vermais" class="vermais">Ver mais</a>
                        </div>
                        <!-- indicador de promocao -->
                        <div class="empromocao">
                            <h5>EM PROMOÇÃO</h5>
                        </div>
                    </div>
                </div>
                <!-- card do produto-->          
        </div>
    </div>
</template>

<script>

</script>