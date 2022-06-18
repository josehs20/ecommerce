@extends('layouts.app')

@section('content')
    <cadastro-cor-component csrf_token={{ @csrf_token() }}></cadastro-cor-component>
@endsection