<template>
    <div>
        <meus-enderecos-component :dados="endereco" 
        nomedaview="Endereços" 
        botao="Editar endereço" 
        :titulos="{
            rua: { label: 'Rua' },
            numero: { label: 'Numero' },
            bairro: { label: 'Bairro' },
            cidade: { label: 'Cidade' },
            complemento: { label: 'Complemento' },
            referencia: { label: 'Referência' },
            estado: { label: 'Estado' },
            cep: { label: 'CEP' }
        }">
        </meus-enderecos-component>

    </div>
</template>

<script>
import parseJson from 'parse-json';

export default {
    props: ['dados'],
    data() {
        return {
            endereco: parseJson(this.dados)
        }
    }
}
</script>