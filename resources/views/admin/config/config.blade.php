@extends('layouts.app')
<style>
    .config-pai{
        display: flex;
        justify-content: center
    }
    .config-filho {
        width: 80%
    }
</style>
@section('content')
    <div class="config-pai">
        <div class="config-filho">
            <card-component titulo="Configurações">
                <template v-slot:conteudo>
                    <h5><b>Usuário:</b> {{ auth()->user()->name }}</h5>
                    <h5><b>Email:</b> {{ auth()->user()->email }}</h5>
                    <h5><b>Senha:</b> {{ auth()->user()->password }}</h5>
                    <h5><b>CPF:</b> {{ auth()->user()->cpf }}</h5>
                    <h5><b>Telefone:</b> {{ auth()->user()->telefone }}</h5>
                    <h5><b>Perfil:</b> {{ auth()->user()->perfil }}</h5>
                </template>
            </card-component>
        </div>
    </div>
@endsection
