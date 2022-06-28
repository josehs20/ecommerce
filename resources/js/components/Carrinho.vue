<style>
.carrinho {
    display: flex;
    justify-content: center;
    margin-top: 100px;
}

.meucarrinho {
    width: 50%;
    padding: 0 20px;
}

.resumodopedido {
    width: 30%;
    padding: 0 30px;
}

.produtonocarrinho {
    display: flex;
    justify-content: space-between;
}

.produtonocarrinho img {
    width: 90px;
    height: 90px;
}

.btnfinalizarcompra {
    border: 1px solid #304148;
    padding: 7px 15px;
    border-radius: 5px;
    background: #304148;
    letter-spacing: 1px;
    font-weight: bold;
    color: #FFF;
    width: 100%;
}

.btnfinalizarcompra:hover {
    opacity: 0.8;
}
</style>
<template>
    <div class="carrinho">

        <div class="meucarrinho">
            <h3>Meu carrinho</h3>
            <hr>
            <div>
                <div class="produtonocarrinho">
                    <img src="./../../../public/img/f3.png" alt="">
                    <div>
                        <h4 style="width: 260px">Nome do produto</h4>
                        <p style="margin: 0;">R$ 20,00</p>
                        <p>Cor: Branco</p>
                    </div>
                    <div class="input-group" style="width: 140px; height: fit-content;">
                        <span class="input-group-text">-</span>
                        <input type="text" class="form-control text-center" value="2"
                            aria-label="Amount (to the nearest dollar)" />
                        <span class="input-group-text">+</span>
                    </div>
                    <h5 style="height: fit-content;">R$ 40,00</h5>
                    <i class="fa fa-times" style="height: fit-content; font-size: 20px;"></i>
                </div>
                <hr>
            </div>
            <div>
                <div class="produtonocarrinho">
                    <img src="./../../../public/img/f2.png" alt="">
                    <div>
                        <h4 style="width: 260px">Nome do produto</h4>
                        <p style="margin: 0;">R$ 20,00</p>
                        <p>Cor: Preto</p>
                    </div>
                    <div class="input-group" style="width: 140px; height: fit-content;">
                        <span class="input-group-text">-</span>
                        <input type="text" class="form-control text-center" value="3"
                            aria-label="Amount (to the nearest dollar)" />
                        <span class="input-group-text">+</span>
                    </div>
                    <h5 style="height: fit-content;">R$ 60,00</h5>
                    <i class="fa fa-times" style="height: fit-content; font-size: 20px;"></i>
                </div>
                <hr>
            </div>

        </div>

        <div class="resumodopedido">
            <h3>Resumo do pedido</h3>
            <hr>
            <div>
                <div class="d-flex justify-content-between">
                    <h4>Subtotal</h4>
                    <h4>R$ 100,00</h4>
                </div>
                <div class="d-flex justify-content-between">
                    <h4>Frete</h4>
                    <h4>Grátis</h4>
                </div>
                <p style="font-size: 1.1rem">Itaperuna - RJ</p>
                <br>
                <hr>
                <div class="d-flex justify-content-between">
                    <h3> <b>Total</b> </h3>
                    <h3> <b>R$ 100,00</b> </h3>
                </div>
                <br>
                <button class="btnfinalizarcompra">Finalizar compra</button>
            </div>
        </div>

    </div>
</template>