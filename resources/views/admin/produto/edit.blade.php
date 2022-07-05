@extends('layouts.app')

@section('content')

          <cadastro-produto-component data="{{ $data }}" csrf_token={{ @csrf_token() }}>
        </cadastro-produto-component>
        
   
@endsection
