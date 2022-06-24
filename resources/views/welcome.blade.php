<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <!-- ICONES FAS FA-->
    <script src="https://kit.fontawesome.com/fc066fbf39.js" crossorigin="anonymous" defer></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js" defer></script>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

</head>

<style>
    .btnpadrao{
        border: 1px solid #304148;
        padding: 7px 15px;
        border-radius: 5px;
        background: transparent;
        letter-spacing: 1px;
        font-weight: bold;
        color: #304148
    }
    .btnpadrao:hover{
        background-color: #304148 !important;
        color: #FFF !important;
    }

    .btnpadraomobile{
        background-color: #304148 !important;
        padding: 7px 15px;
        border-radius: 5px;
        letter-spacing: 1px;
        font-weight: bold;
        color: #FFF
    }
</style>

<body>
    
    
        <!-- NAVBAR  -->
        @include('navbar.navbar')
    
        <!-- CONTEUDO PRINCIPAL -->
        @if(Request::segment(1) == '') 
            @include('pagina-principal.paginaprincipal', ['produtos' => $produtos])
        @elseif(Request::segment(1) == 'loja') 
            @include('loja.loja', ['produtos' => $produtos])            
        @endif

        <!-- FOOTER -->
        @include('footer.footer')

</body>
</html>