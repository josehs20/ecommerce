<template>
    <div>
        <minhaconta-component 
            :dados="usuario" nomedaview="Meus dados" 
            botao="Editar dados"
            :titulos="{
                name: { label: 'Usuario'},
                email: { label: 'Email' },
                cpf: { label: 'CPF' },
                telefone: { label: 'Telefone' },
            }">

        </minhaconta-component>

    </div>
</template>

<script>
import parseJson from 'parse-json';

export default {
    props: ['dados'],
    data(){
        return{
            usuario: parseJson(this.dados)
        }
    }
}
</script>