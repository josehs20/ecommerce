<style>
    .carousel-item img {
        height: 430px;
    }

    .detalhes {
        margin-top: 10px;
        display: flex;
        justify-content: space-around;
        align-items: center;
        flex-wrap: wrap;
    }

    .detalhes div {
        display: flex;
        align-items: center;
        width: fit-content;
        padding: 15px 20px; 
        background-color: transparent !important      
    }

    .icone {
        font-size: 24px;
        margin-right: 20px;
    }

    button{
        border: none;
        background-color: transparent !important
    }

    .abrirmodal:hover {
        background-color: #CEAD7A !important;
        border-radius: 7px
    }

    .titulo {
        text-align: center;
        position: relative;
    }

    .titulo:before,
    .titulo:after {
        content: "";
        width: 40%;
        height: 1px;
        background: #555;
        position: absolute;
        top: 50%;
    }

    @media (max-width: 700px){
        .carousel-item img {
            height: 270px;
        }
        .titulo:before,
        .titulo:after {
            content: "";
            width: 25%;
            height: 1px;
            background: #555;
            position: absolute;
            top: 50%;
        }
    }

    .titulo:before {
        left: 0;
    }

    .titulo:after {
        right: 0;
    }

    .d {
        margin-top: 100px;
        padding: 0 40px;
    }

    .divinfo {
        display: flex;
        justify-content: space-around;
        flex-wrap: wrap
    }

    .divinfo>div {
        border: 1px solid black;
        width: 300px;
        height: 300px;
        margin: 10px 0
    }

    .imginfo{
        width: 300px !important;
        height: 300px !important;
    }

    .divlavar{
        display: flex;
        justify-content: space-between
    }
    .divlavar>div{
        width: 48%
    }

    .simboloslavar{
        height: 470px;
        overflow: hidden;
        overflow-y: scroll;
    }
    
</style>

<!-- Carousel -->
<div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="{{ asset('img/jeans1.png') }}" class="d-block w-100" alt="Foto de roupas jeans">
        </div>
        <div class="carousel-item">
            <img src="{{ asset('img/jeans2.png') }}" class="d-block w-100" alt="Foto de roupas jeans">
        </div>
        <div class="carousel-item">
            <img src="{{ asset('img/jeans3.png') }}" class="d-block w-100" alt="Foto de roupas jeans">
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>
<!-- Carousel -->
<br>
<!-- cards pequenos debaixo do carousel -->
<div class="detalhes">
    <!-- Botao para abrir o modal -->
    <button type="button" class="abrirmodal" data-bs-toggle="modal" data-bs-target="#exampleModal">
        <div>
            <i class="fa fa-shipping-fast icone"></i>
            <div
                style="flex-direction: column; align-items: unset !important; text-align: left !important; padding: unset">
                <h4 style="margin: 0">Frete</h4>
                <h6 style="margin: 0">Confira as condições</h6>
            </div>
        </div>
    </button>
    <!-- Botao para abrir o modal -->

    <div>
        <i class="fa fa-credit-card icone"></i>
        <h4 style="margin: 0">Até 4x no cartão!</h4>
    </div>

    <div class="abrirmodal" style="padding: 25px 20px">
        <i class="fab fa-whatsapp icone"></i>
        <a style="color: #000" target="_blank" href="https://api.whatsapp.com/send?phone=5522998321545&text=Ola%21+Gostaria+de+saber+mais+sobre+as+pe%C3%A7as%21">
            <h4 style="margin: 0">Dúvidas no whatsapp!</h4>
        </a>
    </div>
</div>
<!-- cards pequenos debaixo do carousel -->

<!-- Modal do frete -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel">Formas de envio</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p style="font-size: 1.1rem">
                    Em <b>Itaperuna - RJ</b> e para <b>Muriaé - MG</b>, levamos em condicional e buscamos seu jeans
                    no endereço que preferir.
                </p>
                <p style="font-size: 1.1rem">Para outras cidades enviamos sob frete.</p>
            </div>
        </div>
    </div>
</div>

<div class="d">
    <h1 class="titulo">Informações</h1>
    <br>
    <div class="divinfo">
        <div>
            <div id="carouselExampleControlss" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="{{asset('img/f1.png')}}" class="d-block w-100 imginfo" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="{{asset('img/f2.png')}}" class="d-block w-100 imginfo" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="{{asset('img/f3.png')}}" class="d-block w-100 imginfo" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="{{asset('img/f4.png')}}" class="d-block w-100 imginfo" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="{{asset('img/f5.png')}}" class="d-block w-100 imginfo" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="{{asset('img/f6.png')}}" class="d-block w-100 imginfo" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="{{asset('img/f7.png')}}" class="d-block w-100 imginfo" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="{{asset('img/f8.png')}}" class="d-block w-100 imginfo" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="{{asset('img/f9.png')}}" class="d-block w-100 imginfo" alt="...">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControlss"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControlss"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
        <div>
            <img src="{{asset('img/p1.png')}}" alt="" class="imginfo">
        </div>
        <div>
            <img src="{{asset('img/p2.png')}}" alt="" class="imginfo">
        </div>
        <div>
            <img src="{{asset('img/p3.png')}}" alt="" class="imginfo">
        </div>
    </div>
</div>

<div class="d">
    <h1 class="titulo">Como lavar<br>seu jeans</h1>
    <br>
    <div class="divlavar">
        <div>
            <h2>Como decifrar as etiquetas das roupas</h2>
            <br>
            <h3>
                &nbsp; Lavando suas roupas incorretamente a vida útil diminui, elas perdem a cor e encolhem. 
                Lavando de acordo com a etiqueta interna, você terá uma peça nova por muito mais tempo.
            </h3>
        </div>
        <div class="simboloslavar">
            <img style="width: 100%" src="{{asset('img/lavar.png')}}" alt="Simbolos de como lavar a roupa corretamente">
        </div>
    </div>
</div>