@extends('usuario.minha-conta.minhaconta')
@section('exibirmenu')
    <div id="app" style="width: 100%">
        
            <enderecos-component dados="{{$enderecos}}"></enderecos-component>
        
    </div>
@endsection