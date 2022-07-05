@extends('usuario.minha-conta.minhaconta')
@section('exibirmenu')
    <div id="app" style="width: 100%">
        <meusdados-component dados="{{$usuario}}"></meusdados-component>
    </div>
@endsection