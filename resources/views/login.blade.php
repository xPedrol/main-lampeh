<x-layout>
    <x-slot name="assets">
        <link href="{{ asset('css/form.css') }}" rel="stylesheet">
        <link href="{{ asset('css/estagio-voluntario.css') }}" rel="stylesheet">
    </x-slot>
    <x-slot name="title">Entrar</x-slot>
    <div class="card">
        <form action="{{route('logging')}}" method="POST">
            @method('POST')
            @csrf
            <div class="grid form-control">
                <div class="col-12">
                    <label for="email">Email</label>
                    <input id="email" name="email" type="email" placeholder="Digite o email do usuário..."/>
                </div>
                <div class="col-12">
                    <label for="password">Senha</label>
                    <input id="password" name="password" type="password" placeholder="Digite a senha do usuário..."/>
                </div>
                <div class="col-12">
                    <button>Enviar</button>
                </div>
            </div>
        </form>
    </div>
</x-layout>
