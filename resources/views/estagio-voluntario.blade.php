<x-layout>
    <x-slot name="assets">
        <link href="{{ asset('css/form.css') }}" rel="stylesheet">
        <script>
            function onSubmit() {
                document.getElementById("estagio-voluntario-form").submit();
            }
        </script>
        <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    </x-slot>
    <x-slot name="title">Estágio Voluntário</x-slot>
    <div class="card">
        <p class="mb-30">Preencha o formulário abaixo para se cadastrar como um voluntário do projeto</p>
        <form id="estagio-voluntario-form" action="{{route('estagio-voluntario')}}" method="POST">
            <input class="d-none" id="trap" name="trap" type="text">
            @method('POST')
            @csrf
            <div class="grid form-control">
                <div class="col-12">
                    <label for="name">Nome Completo</label>
                    <input id="name" name="name" type="text" value="{{old("name")}}"/>
                    @error('name')
                    <div class="invalid-feedback">
                        Campo inválido
                    </div>
                    @enderror
                </div>
                <div class="col-12">
                    <label for="email">Email</label>
                    <input id="email" name="email" type="email" value="{{old("email")}}"/>
                    @error('email')
                    <div class="invalid-feedback">
                        Campo inválido
                    </div>
                    @enderror
                </div>
                <div class="col-12">
                    <label for="message">Mensagem</label>
                    <textarea id="message" name="message" rows="4">{{old("message")}}</textarea>
                    @error('message')
                    <div class="invalid-feedback">
                        Campo inválido
                    </div>
                    @enderror
                </div>
                <div class="col-12">
                    <button class="g-recaptcha" type="button"
                            data-sitekey="{{config('services.recaptcha.key')}}"
                            data-callback='onSubmit'
                            data-action='submit'>Enviar</button>
                </div>
            </div>
        </form>
    </div>
</x-layout>
