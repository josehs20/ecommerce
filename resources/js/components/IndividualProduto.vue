<style>
.individualprod {
    padding: 0 20px;
    display: flex;
}

.imagensdoproduto {
    width: 60%;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 0 20px;
}

.descricaodoproduto {
    width: 40%;
    min-height: 100vh;
}

.listadeprodutos {
    display: flex;
    flex-direction: column;
    justify-content: space-around;
    height: 500px;
    margin-right: 50px;
}

.listadeprodutos img {
    height: 90px;
    width: 90px !important;
}

.slidedeprodutos {
    width: 70%;
    display: flex;
    justify-content: center;
    align-items: center;
}

.informacoesdoproduto {
    min-height: 40vh;
    padding: 0 30px;
}

.t {
    display: flex;
    justify-content: space-between;
    border: none;
    background: transparent;
    width: 100%;
    padding: 0
}

.c {
    display: flex;
    flex-direction: column;
}

@media (max-width: 870px){
    .listadeprodutos {
        display: none;
    }
    .slidedeprodutos {
        width: 100% !important;
    }
    .imagensdoproduto{
        width: 90%;
        margin-bottom: 40px;
    }
    .individualprod{
        flex-direction: column;
        align-items: center;
    }    
    .descricaodoproduto {
        width: 90%;
        min-height: 100vh;
    }
}
</style>

<template>
    <div class="individualprod">
        <!-- IMAGENS DO PRODUTO -->
        <div class="imagensdoproduto">

            <div class="listadeprodutos">
                <img src="./../../../public/img/f1.png" alt="..." />
                <img src="./../../../public/img/f2.png" alt="..." />
                <img src="./../../../public/img/f3.png" alt="..." />
            </div>
            <!-- SLIDE DO PRODUTOS-->
            <div class="slidedeprodutos">
                <div id="carouselExampleControls" class="carousel slide"
                    data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="./../../../public/img/f1.png" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="./../../../public/img/f2.png" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="./../../../public/img/f3.png" class="d-block w-100" alt="...">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>

        </div>
        <!-- DESCRIÇÕES DO PRODUTO -->
        <div class="descricaodoproduto">
            <h1>{{data.nome}}</h1>
            <hr>
            <h5>R$ &nbsp; {{data.preco}}</h5>
            <br>
            <h5>Cores </h5>
            <h5>Branco&nbsp;&nbsp;&nbsp; Preto &nbsp;&nbsp;&nbsp; Amarelo</h5>
            <br>
            <h5>Tamanhos</h5>
            <h5>PP &nbsp;&nbsp;&nbsp; P &nbsp;&nbsp;&nbsp; M</h5>
            <br>
            <h5>Quantidade: </h5>
            <div class="input-group" style="width: 140px">
                <span class="input-group-text">-</span>
                <input type="text" class="form-control text-center" value="0"
                    aria-label="Amount (to the nearest dollar)">
                <span class="input-group-text">+</span>
            </div>
            <br>
            <div class="d-flex justify-content-center">
                <button class="btnpadrao" style="width: 100%;">Adicionar ao carrinho</button>
            </div>

            <!-- INFORMAÇÕES DO PRODUTO-->
            <div class="informacoesdoproduto">
                <br>
                <br>
                <!-- INFORMAÇÕES DO PRODUTO -->
                <button class="t" @click="abrirfechar('ab', 'dab')">
                    <h4>Informações do produto</h4>
                    <i id="ab" class="fa fa-plus"></i>
                </button>
                <div id="dab" class="c" style="display: none">
                    <p style="font-size: 1rem">
                        Sou uma informação do produto. Sou um ótimo lugar para adicionar informações
                        sobre seu produto, como tamanho, material, cuidados especiais e instruções 
                        para limpeza. Escreva porque este produto é especial e como seus clientes podem
                        se beneficiar dele.
                    </p>
                </div>
                <hr>
                <!-- INFORMAÇÕES DO PRODUTO -->
                <button class="t" @click="abrirfechar('ab2', 'dab2')">
                    <h4>Medidas</h4>
                    <i id="ab2" class="fa fa-plus"></i>
                </button>
                <div id="dab2" class="c" style="display: none">
                    <p style="font-size: 1rem">
                        <b>Tamanho 34:</b> <br>
                        &nbsp;&nbsp;&nbsp;&nbsp;Cintura: 35 cm<br>
                        &nbsp;&nbsp;&nbsp;&nbsp;Quadril: 44 cm<br>
                        &nbsp;&nbsp;&nbsp;&nbsp;Gancho frente: 20 cm<br>
                        &nbsp;&nbsp;&nbsp;&nbsp;Gancho trás: 34 cm<br>
                        &nbsp;&nbsp;&nbsp;&nbsp;Barra: 18 cm<br>
                        &nbsp;&nbsp;&nbsp;&nbsp;Comprimento: 114 cm<br>
                        <b>Tamanho 35:</b> <br>
                        &nbsp;&nbsp;&nbsp;&nbsp;Cintura: 37 cm<br>
                        &nbsp;&nbsp;&nbsp;&nbsp;Quadril: 45 cm<br>
                        &nbsp;&nbsp;&nbsp;&nbsp;Gancho frente: 20 cm<br>
                        &nbsp;&nbsp;&nbsp;&nbsp;Gancho trás: 34 cm<br>
                        &nbsp;&nbsp;&nbsp;&nbsp;Barra: 19 cm<br>
                        &nbsp;&nbsp;&nbsp;&nbsp;Comprimento: 117 cm<br>
                    </p>
                </div>
                <hr>

            </div>
        </div>
    </div>
</template>

<script>

import axios from 'axios'

export default {
    props: ['id'],
    data() {
        return {
            data: {}
        }
    },
    methods: {
        carregadados() {
            var data = {
                id: this.id
            }
            axios.get('/loja/carregaProduto/' + data.id)
                .then(response => {
                    this.data = response.data
                    console.log(this.data);
                })
                .catch()
        },
        abrirfechar(idicone, iddiv) {
            var i = document.getElementById(idicone)
            var cat = document.getElementById(iddiv)

            if (i.classList.contains("fa-minus")) {
                i.classList.remove('fa-minus')
                i.classList.add('fa-plus')
                cat.style.display = "none"
            } else {
                i.classList.remove('fa-plus')
                i.classList.add('fa-minus')
                cat.style.display = "flex"
            }
        }
    },
    mounted() {
        this.carregadados()
    }
}
</script>