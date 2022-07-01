@extends('layouts.app')

@section('content')

        <formulario-produto-component data="{{ $data }}" csrf_token={{ @csrf_token() }}>
        </formulario-produto-component>
        
   
@endsection
