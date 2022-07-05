@extends('welcome')
        @section('conteudo')
                <div id="app">
                        <individual-produto-component id="{{$id}}">
                        </individual-produto-component>
                </div>
        @endsection