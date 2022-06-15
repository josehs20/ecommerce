<style>
    .logo {
        display: flex;
        justify-content: center;
        margin: 20px 0;
    }

    .logo img {
        height: 110px;
    }

    .pnavbar {
        display: flex;
        justify-content: center;
        align-items: center;
        margin: 20px 0;
    }

    .pnavbar ul {
        list-style: none;
        text-decoration: none;
        display: flex;
        justify-content: space-between;
        margin: unset !important;
        padding: unset !important;
        width: 60%;
    }

    .pnavbar ul li {
        letter-spacing: 3px;
        color: #000;
        font-weight: bold;
        font-size: 0.85rem
    }

    .pnavbar ul li:hover {
        color: #CEAC78
    }

    .pnavbarmobile{
        display: none;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        margin: 20px 0;
        background-color: #eee;
        padding: 20px 0;
    }
    .pnavbarmobile ul {
        list-style: none;
        text-decoration: none;
        display: flex;
        flex-direction: column; 
        justify-content: space-between;
        margin: unset !important;
        padding: unset !important;
        width: 60%;
        
    }
    .pnavbarmobile ul li {
        letter-spacing: 3px;
        color: #000;
        font-weight: bold;
        font-size: 0.85rem;
        margin-bottom: 7px
    }

    .divcontemcarrinhoeusuario {
        position: absolute;
        right: 0;
        top: 100px;
        width: 400px;
        display: flex;
        justify-content: space-around
    }

    .nav-link {
        color: #000
    }

    .nav-link:focus {
        color: #CEAC78
    }

    .nav-link:hover {
        color: #CEAC78
    }
    .toggle-menu{
        display: none;
        cursor: pointer;
        position: absolute;
        right: 20px;
    }
    .toggle-menu div{        
            transition: 0.3s;
            width: 25px;
            height: 3px;
            margin: 5px;
            background-color: #000;        
    }

    .line1 {
        transform: rotate(-45deg) translate(-8px, 8px);
    }  
    .line2 {
        opacity: 0;
    }
    .line3 {
        transform: rotate(45deg) translate(-3px, -3px);
    }
    
    .divcarrinhomobile{
        display: none;
    }

    .divcontemcarrinhoeusuario .divusuario i{
        margin-top: 4px;
    }
    .divcarrinhomobile .divusuario i{
        margin-top: 4px;
    }
    @media (max-width: 900px) {
        .pnavbar ul {
            width: 100% !important;
            margin: 0 10px !important;
        }
        .toggle-menu{
            display: block
        }
        .pnavbar{
            display: none
        }
        .divcontemcarrinhoeusuario{
            display: none
        }
        .pnavbarmobile{
            display: none;
        }
        .divcarrinhomobile{
            display: flex
        }
    }

    .mshow{
        display: flex;
    }

    .isactive{
        color: #CEAC78 !important
    }

    a{
        text-decoration: none
    }
</style>

<div class="logo">
    <img src="{{ asset('img/logo.png') }}" alt="logo da loja">
</div>

<div class="divcontemcarrinhoeusuario">
    <div class="divcarrinho">
        <!-- CARRINHO DE COMPRAS -->
        <div class="nav-item carrinhodecompras">
            <a class="nav-link" href="#">
                <i class="fa fa-shopping-cart"></i>
                <span>10</span>
            </a>
        </div>
    </div>
    <div class="divusuario">
        <ul class="navbar-nav ms-auto">
            <!-- Authentication Links -->
            @guest
                @if (Route::has('login'))
                    <li class="nav-item">
                        <a class="nav-link d-flex" href="{{ route('login') }}">
                            <i class="fa fa-user"></i> &nbsp;
                            <span>Entrar</span>
                        </a>
                    </li>
                @endif

                <!-- @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">Cadastrar</a>
                                </li>
                    @endif -->
            @else
                <li class="nav-item">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        <i class="fa fa-user"></i> {{ Auth::user()->name }}
                    </a>

                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <a href="#" class="dropdown-item"> Perfil </a>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                                                         document.getElementById('logout-form').submit();">
                            {{ __('Sair') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>
            @endguest
        </ul>
    </div>
</div>

{{-- ↓↓ toggle menu ↓↓ --}}
<div class="toggle-menu" id="toggle-menu">
    <div class="" id="line1"></div>
    <div class="" id="line2"></div>
    <div class="" id="line3"></div>
</div>

<!-- DIV DO CARRINHO MOBILE -->
<div class="divcarrinhomobile">
    <div class="divcarrinho">
        <!-- CARRINHO DE COMPRAS -->
        <div class="nav-item carrinhodecompras">
            <a class="nav-link" href="#">
                <i class="fa fa-shopping-cart"></i>
                <span>10</span>
            </a>
        </div>
    </div> 
    <div class="divusuario">
        <ul class="navbar-nav ms-auto">
            <!-- Authentication Links -->
            @guest
                @if (Route::has('login'))
                    <li class="nav-item">
                        <a class="nav-link d-flex" href="{{ route('login') }}">
                            <i class="fa fa-user"></i> &nbsp;
                            <span>Entrar</span>
                        </a>
                    </li>
                @endif

                <!-- @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">Cadastrar</a>
                                </li>
                @endif -->
            @else
                <li class="nav-item">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        <i class="fa fa-user"></i> {{ Auth::user()->name }}
                    </a>

                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <a href="#" class="dropdown-item"> Perfil </a>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                                                         document.getElementById('logout-form').submit();">
                            {{ __('Sair') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>
            @endguest
        </ul>
    </div>
</div>

<div id="pnavbarmobile" class="pnavbarmobile">
    <ul>
        <li>Página inicial</li>
        <li>Loja</li>
        <li>Contato</li>
    </ul>
</div>

<div class="pnavbar">
    <ul>
        <a href="#paginainicial">
            <li class="@if(Request::segment(1) == '') isactive @endif">Página inicial</li>
        </a>
        <a href="#loja">
            <li class="@if(Request::segment(1) == 'loja') isactive @endif">Loja</li>
        </a>
        <a href="#contato">
            <li class="@if(Request::segment(1) == 'contato') isactive @endif">Contato</li>
        </a>
    </ul>
</div>

<script>
    /* ---------------------------- show and hide the menu ---------------------------- */
    var toggleMenu = document.getElementById('toggle-menu')
    var pnavbarmobile = document.getElementById('pnavbarmobile')
    var menuIcon = document.querySelectorAll('.toggle-menu div')

    toggleMenu.addEventListener("click", function() {
        pnavbarmobile.classList.toggle('mshow')
        /* forEach to make the menu an X */
        menuIcon.forEach((line) => {
            line.classList.toggle(line.id)
        })
    })
</script>