<x-layout>
    <x-slot name="assets">
        <link href="{{ asset('css/form.css') }}" rel="stylesheet">
        <link href="{{ asset('css/estagio-voluntario.css') }}" rel="stylesheet">
    </x-slot>
    <x-slot name="title">Estágio Voluntário</x-slot>
    <div class="card">
        <p class="mb-30">Preencha o formulário abaixo para se cadastrar como um voluntário do projeto</p>
        <form action="{{route('estagio-voluntario')}}" method="POST">
            @method('POST')
            @csrf
            <div class="grid form-control">
                <div class="col-12">
                    <label for="name">Nome Completo</label>
                    <input id="name" name="name" type="text"/>
                </div>
                <div class="col-12">
                    <label for="email">Email</label>
                    <input id="email" name="email" type="email"/>
                </div>
                <div class="col-12">
                    <label for="message">Mensagem</label>
                    <textarea id="message" name="message" rows="4"></textarea>
                </div>
                <div class="col-12">
                    <button>Enviar</button>
                </div>
            </div>
        </form>
    </div>
</x-layout>
