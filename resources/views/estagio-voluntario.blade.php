<x-layout>
    @vite('resources/css/estagio-voluntario.scss')
    <x-slot name="title">Estágio Voluntário</x-slot>
    <div class="card">
        <p>Preencha o formulário abaixo para se cadastrar como um voluntário do projeto</p>
        <form action="" method="POST">
            @method('POST')
            @csrf
            <div class="grid form-voluntarios">
                <div class="col-12">
                    <label for="name">Nome Completo</label>
                    <input name="name"/>
                </div>
                <div class="col-12">
                    <label>Email</label>
                    <input/>
                </div>
                <div class="col-12">
                    <button>Enviar</button>
                </div>
            </div>
        </form>
    </div>
</x-layout>
