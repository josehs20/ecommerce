/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
import 'bootstrap-icons/font/bootstrap-icons.css';
import Vuex from 'vuex';

require('./bootstrap');

window.Vue = require('vue').default;
window.Swal = require('sweetalert2');

Vue.use(Vuex)

const store = new Vuex.Store({
    state: {
        produto: { item: {}, prodTamCor: {}, imagens: {} }


    }
})
/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))
Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('home-component', require('./components/Home.vue').default);
Vue.component('card-component', require('./components/Card.vue').default);
Vue.component('dropdown-component', require('./components/Dropdown.vue').default);
Vue.component('input-component', require('./components/Input.vue').default);
Vue.component('modal-produto-component', require('./components/ModalProduto.vue').default);

//Colapse ou dropdown
Vue.component('colapse-component', require('./components/Colapse.vue').default);

//componentes produto
Vue.component('card-produto-component', require('./components/CardProduto.vue').default);
Vue.component('modal-produto-component', require('./components/ModalProduto.vue').default);
Vue.component('individual-produto-component', require('./components/IndividualProduto.vue').default);

//CARRINHO
Vue.component('carrinho-component', require('./components/Carrinho.vue').default);

//promoção do produto
Vue.component('produto-promocao-component', require('./components/ProdutoPromocao.vue').default);

//view de minha conta do usuario
Vue.component('minhaconta-component', require('./components/MinhacontaUsuario.vue').default);
Vue.component('meusdados-component', require('./components/Meusdados.vue').default);
Vue.component('enderecos-component', require('./components/Enderecos.vue').default);
Vue.component('meus-enderecos-component', require('./components/MeusEnderecos.vue').default);
Vue.component('formulario-produto-component', require('./components/FormularioProduto.vue').default);

//cadastros
// Vue.component('atualiza-produto-component', require('./components/AtualizaProduto.vue').default);
Vue.component('cadastro-produto-component', require('./components/CadastroProduto.vue').default);
Vue.component('cadastro-categoria-component', require('./components/CadastroCategoria.vue').default);
Vue.component('cadastro-cor-component', require('./components/CadastroCor.vue').default);
Vue.component('cadastro-tamanho-component', require('./components/CadastroTamanho.vue').default);

//Cadastro de promocao
Vue.component('cadastro-promocao-component', require('./components/CadastroPromocao.vue').default);


//tabelas
Vue.component('table-component', require('./components/Table.vue').default);
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.filter('formataPathImg', function (img) {
    let path = './../../../public/' + img.nome
    console.log(path);
});


Vue.filter('formataDataTempo', function (d) {
    if (!d) return ''

    d = d.split('T')

    let data = d[0]
    let tempo = d[1]

    //formata data
    data = data.split('-')
    data = data[2] + '/' + data[1] + '/' + data[0]

    tempo = tempo.split('.')
    tempo = tempo[0]

    return data + ' ' + tempo
})

const app = new Vue({
    el: '#app',
    store
});