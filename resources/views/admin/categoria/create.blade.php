@extends('layouts.app')

@section('content')
    <cadastro-categoria-component csrf_token={{ @csrf_token() }}></cadastro-categoria-component>

@endsection
