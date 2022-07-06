@extends('layouts.app')

@section('content')
    <cadastro-promocao-component csrf_token={{ @csrf_token() }}></cadastro-promocao-component>
@endsection