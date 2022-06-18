@extends('layouts.app')

@section('content')
    <cadastro-tamanho-component csrf_token={{ @csrf_token() }}></cadastro-tamanho-component>
@endsection