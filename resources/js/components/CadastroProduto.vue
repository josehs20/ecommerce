<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <card-component titulo="Cadastro de produto">
                    <template v-slot:conteudo>
                        <!-- Linha um cadastro de produto -->
                        <div class="row">
                            <div class="col-md-6">
                                <input-component titulo="Produto" id="nomeProduto" id-help="nomeProdutoHelp"
                                    texto-ajuda="Informe o nome do produto">
                                    <input type="text" class="form-control" id="nomeProduto"
                                        aria-describedby="nomeProdutoHelp" placeholder="Nome do Produto"
                                        v-model="nomeProduto">
                                </input-component>
                            </div>
                            <div class="col-md-2">
                                <input-component titulo="Custo" id="custoProduto" id-help="custoProduto"
                                    texto-ajuda="Informe o nome do produto">
                                    <input type="number" class="form-control" id="custoProduto"
                                        aria-describedby="custoProduto" placeholder="Custo" v-model="custoProduto">
                                </input-component>
                            </div>
                            <div class="col-md-2">
                                <input-component titulo="Preço" id="precoProduto" id-help="precoProduto"
                                    texto-ajuda="Informe o nome do produto">
                                    <input type="number" class="form-control" id="precoProduto"
                                        aria-describedby="precoProduto" placeholder="Preço" v-model="precoProduto">
                                </input-component>
                            </div>
                            <div class="col md-2">
                                <input-component titulo="Lucro" id="lucroProduto" id-help="lucroProduto">
                                    <input readonly type="number" class="form-control" id="lucroProduto"
                                        aria-describedby="lucroProduto" placeholder="Lucro" v-model="lucroProduto">
                                </input-component>
                            </div>
                        </div>
                        
                        <!-- Linha dois cadastro de produto -->
                        <div class="row mt-2">
                            
                            <div class="col-md-4">
                                <input-component titulo="Categoria" id="categoriaProduto" id-help="categoriaProduto">

                                    <select class="form-select" aria-label="Default select example">
                                        <option selected value="1">jeans</option>
                                        <option value="1">camisa</option>
                                        <option value="1">short</option>
                                    </select>
                                </input-component>
                            </div>
                            <div class="col-md-6">
                                <input-component titulo="Imagens" id="imagensProduto" id-help="imagensProduto">

                                    <input readonly type="file" class="form-control" id="lucroProduto"
                                        aria-describedby="lucroProduto" placeholder="Lucro">
                                </input-component>
                            </div>
                        </div>

                    </template>

                    <template v-slot:rodape>
                        rodape
                    </template>
                </card-component>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            nomeProduto: '',
            precoProduto: '',
            custoProduto: '',
            lucroProduto: '',
        }
    }
}

</script>
