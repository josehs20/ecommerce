@extends('welcome')

<style>
    .minha-conta{
        display: flex;
        justify-content: space-between;
        flex-wrap: wrap;
        padding: 0 20px;
        margin-top: 70px
    }
    @media (max-width: 900px){
        .minha-conta{
            justify-content: center
        }
    }
    .minha-conta aside{
        width: 250px;
        margin-bottom: 70px;
    }
    .minha-conta > div{
        width: 80%;
        min-height: 90vh;
        display: flex;
        justify-content: center
    }
    .list-group a{
        margin-bottom: 5px
    }
</style>

@section('conteudo')

    <main class="minha-conta">
        <!-- MENUS -->
        <aside class="menu">
            <ul class="list-group">
                <a href="{{route('meusdados')}}"><li class="list-group-item list-group-item-action">Meus dados</li></a>
                <a href="{{route('enderecos')}}"><li class="list-group-item list-group-item-action">Endereços</li></a>
                <a href="{{route('cartoes')}}"><li class="list-group-item list-group-item-action">Meus cartões</li></a>
                <a href="{{route('seguranca')}}"><li class="list-group-item list-group-item-action">Segurança</li></a>
            </ul>
        </aside>

        <!-- EXIBIÇÃO DOS CONTEUDOS DOS MENUS -->
        <div>
            @yield('exibirmenu')
        </div>
    </main>

@stop
