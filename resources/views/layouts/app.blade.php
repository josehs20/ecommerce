<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- ICONES FAS FA-->
    <script src="https://kit.fontawesome.com/fc066fbf39.js" crossorigin="anonymous" defer></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js" defer></script>
    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" defer></script> --}}
</head>

<style>
    @import url("https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap");

    :root {
        --header-height: 3rem;
        --nav-width: 68px;
        --first-color: #4723D9;
        --first-color-light: #AFA5D9;
        --white-color: #F7F6FB;
        --body-font: 'Nunito', sans-serif;
        --normal-font-size: 1rem;
        --z-fixed: 100
    }

    *,
    ::before,
    ::after {
        box-sizing: border-box
    }

    a {
        text-decoration: none
    }

    .header {
        width: 100%;
        height: var(--header-height);
        position: fixed;
        top: 0;
        left: 0;
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 0 1rem;
        background-color: var(--white-color);
        z-index: var(--z-fixed);
        transition: .5s
    }

    .header_toggle {
        color: var(--first-color);
        font-size: 1.5rem;
        cursor: pointer;
    }

    .header_img {
        width: 35px;
        height: 35px;
        display: flex;
        justify-content: center;
        border-radius: 50%;
        overflow: hidden
    }

    .header_img img {
        width: 40px
    }

    .l-navbar {
        position: fixed;
        top: 0;
        left: -30%;
        width: var(--nav-width);
        height: 100vh;
        background-color: var(--first-color);
        padding: .5rem 1rem 0 0;
        transition: .5s;
        z-index: var(--z-fixed)
    }

    .nav {
        height: 100%;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        overflow: hidden
    }

    .nav_logo,
    .nav_link {
        display: grid;
        grid-template-columns: max-content max-content;
        align-items: center;
        column-gap: 1rem;
        padding: .5rem 0 .5rem 1.5rem
    }

    .nav_logo {
        margin-bottom: 2rem
    }

    .nav_logo-icon {
        font-size: 1.25rem;
        color: var(--white-color)
    }

    .nav_logo-name {
        color: var(--white-color);
        font-weight: 700
    }

    .nav_link {
        position: relative;
        color: var(--first-color-light);
        margin-bottom: 1.5rem;
        transition: .3s
    }

    .nav_link:hover {
        color: var(--white-color)
    }

    .nav_icon {
        font-size: 1.25rem
    }

    .showBar {
        left: 0
    }

    .app {
        padding-left: calc(var(--nav-width) + 1rem)
    }

    .active {
        color: var(--white-color)
    }

    .active::before {
        content: '';
        position: absolute;
        left: 0;
        width: 2px;
        height: 32px;
        background-color: var(--white-color)
    }

    .height-100 {
        height: 100vh
    }

    @media screen and (min-width: 768px) {
        body {
            margin: calc(var(--header-height) + 1rem) 0 0 0;
            padding-left: calc(var(--nav-width) + 2rem)
        }

        .header {
            height: calc(var(--header-height) + 1rem);
            padding: 0 2rem 0 calc(var(--nav-width) + 2rem)
        }

        .header_img {
            width: 40px;
            height: 40px
        }

        .header_img img {
            width: 45px
        }

        .l-navbar {
            left: 0;
            padding: 1rem 1rem 0 0
        }

        .showBar {
            width: calc(var(--nav-width) + 156px)
        }

        .app {
            padding-left: calc(var(--nav-width) + 188px)
        }

    }

    @media screen and (max-width: 768px) {

        body {
            margin: calc(var(--header-height) + 1rem) 0 0 0;
            padding-left: calc(var(--nav-width) + 2rem)
        }

        .header {
            height: calc(var(--header-height) + 1rem);
            padding: 0 2rem 0 calc(var(--nav-width) + 2rem)
        }

        .header_img {
            width: 40px;
            height: 40px
        }

        .header_img img {
            width: 45px
        }

        .l-navbar {
            left: 0;
            padding: 1rem 1rem 0 0
        }

        .showBar {
            width: calc(var(--nav-width) + 100px)
        }

        .addpd {
            padding: 0 5rem
        }

    }
</style>

<body>
    <div id="app">
     
        @auth
            <header id="header" class="header">
                <div class="header_toggle"> <i class='bx bx-menu' id="header-toggle"></i> </div>
                <h3>{{ auth()->user()->name }} </h3>
            </header>
            <div id="nav-bar" class="l-navbar">
                <nav class="nav">
                    <div>
                        <a href="#" class="nav_logo">
                            <i class='bx bx-layer nav_logo-icon'></i>
                            <span class="nav_logo-name">Empresa</span>
                        </a>
                        <div id="nav_list" class="nav_list">
                            <a href="#" class="nav_link active">
                                <i onclick="abrirNav()" class='bx bx-grid-alt nav_icon'></i>
                                <span class="nav_name">Dashboard</span>
                            </a>
                            <a href="#" class="nav_link">
                                <i onclick="abrirNav()" class='bx bx-user nav_icon'></i>

                                <span class="nav_name">
                                    <dropdown-component titulo="Registros"
                                        :itens="{
                                            produto: { titulo: 'Produto', rota: '/produto/create' },
                                            categoria: { titulo: 'Categoria', rota: '/categorias/create' },
                                            cor: { titulo: 'Cor', rota: '/cor/create' },
                                            tamanho: { titulo: 'Tamanho', rota: '/tamanho/create' },
                                            estoque: { titulo: 'Estoque', rota: '/estoque/create' }
                                        }">
                                    </dropdown-component>
                                </span>

                            </a>

                            <a href="/promocao/create" class="nav_link"> 
                                <i class='bx bx-message-square-detail nav_icon'></i> 
                                <span class="nav_name">Promo????es</span>
                            </a> 
                            {{-- <a href="#" class="nav_link"> 
                                <i class='bx bx-bookmark nav_icon'></i> 
                                <span class="nav_name">Bookmark</span>
                            </a>
                            <a href="#" class="nav_link"> 
                                <i class='bx bx-folder nav_icon'></i>
                                <span class="nav_name">Files</span>
                            </a>
                            <a href="#" class="nav_link"> 
                                <i class='bx bx-bar-chart-alt-2 nav_icon'></i>
                                <span class="nav_name">Stats</span>
                            </a> --}}
                        </div>

                    </div>
                    <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                            document.getElementById('logout-form').submit();"
                        class="nav_link">
                        <i class='bx bx-log-out nav_icon'></i>
                        <span class="nav_name">Sair</span>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </a>
                </nav>
            </div>
        @endauth

        <main class="py-4">
            @yield('content')
        </main>
    </div>

    <script>
        function abrirNav() {

            var nav = document.getElementById("nav-bar")
            var bodypd = document.getElementById('app')
            var headerpd = document.getElementById('header')
            var toggle = document.getElementById('header-toggle')

            nav.classList.toggle('showBar')
            toggle.classList.toggle('bx-x')
            bodypd.classList.toggle('app')
            headerpd.classList.toggle('app')
            toggle.classList.toggle('addpd')
        }
        document.addEventListener("DOMContentLoaded", function(event) {

            const showNavbar = (toggleId, navId, bodyId, headerId) => {
                const toggle = document.getElementById(toggleId),
                    nav = document.getElementById(navId),
                    bodypd = document.getElementById(bodyId),
                    headerpd = document.getElementById(headerId)


                // Validate that all variables exist
                if (toggle && nav && bodypd && headerpd) {
                    toggle.addEventListener('click', () => {
                        // show navbar
                        nav.classList.toggle('showBar')
                        // change icon
                        toggle.classList.toggle('bx-x')
                        toggle.classList.toggle('addpd')

                        // add padding to body
                        bodypd.classList.toggle('app')
                        // add padding to header
                        headerpd.classList.toggle('app')
                    })
                }
            }

            showNavbar('header-toggle', 'nav-bar', 'app', 'header')

            /*===== LINK ACTIVE =====*/
            const linkColor = document.querySelectorAll('.nav_link')

            function colorLink() {
                if (linkColor) {
                    linkColor.forEach(l => l.classList.remove('active'))
                    this.classList.add('active')
                }
            }
            linkColor.forEach(l => l.addEventListener('click', colorLink))

            // Your code to run since DOM is loaded and ready
        });
    </script>
</body>

</html>
