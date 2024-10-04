<x-layout>
    <x-slot name="assets">
        <link href="{{ asset('css/estagio-voluntario.css') }}" rel="stylesheet">
        <link href="{{ asset('css/form.css') }}" rel="stylesheet">
        <script>
            function onSubmit() {
                document.getElementById("register-form").submit();
            }
        </script>
        <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    </x-slot>
    <x-slot name="title">Registrar</x-slot>
    <div class="card">
        <form id="register-form" action="{{route('registering')}}" method="POST">
            <input class="d-none" id="trap" name="trap" type="text">
            @method('POST')
            @csrf
            <div class="grid form-control">
                <div class="col-12">
                    <label for="name">Nome completo</label>
                    <input id="name" name="name" type="text" placeholder="Digite o nome do usuário..."
                           value="{{old("name")}}"/>
                    @error('name')
                    <div class="invalid-feedback">
                        Campo inválido
                    </div>
                    @enderror
                </div>
                <div class="col-12">
                    <label for="email">Email</label>
                    <input id="email" name="email" type="email" placeholder="Digite o email do usuário..."
                           value="{{old("email")}}"/>
                    @error('email')
                    <div class="invalid-feedback">
                        Campo inválido
                    </div>
                    @enderror
                </div>
                <div class="col-12">
                    <label for="password">Senha</label>
                    <input id="password" name="password" type="password" placeholder="Digite a senha do usuário..."/>
                    @error('password')
                    <div class="invalid-feedback">
                        Campo inválido
                    </div>
                    @enderror
                </div>
                <div class="col-12">
                    <label for="confirmPassword">Confirmar senha</label>
                    <input id="confirmPassword" name="confirmPassword" type="password"
                           placeholder="Confirme a senha do usuário..."/>
                    @error('confirmPassword')
                    <div class="invalid-feedback">
                        Campo inválido
                    </div>
                    @enderror
                </div>
                <div class="col-12">
                    <button class="g-recaptcha" type="button"
                            data-sitekey="{{config('services.recaptcha.key')}}"
                            data-callback='onSubmit'
                            data-action='submit'>Enviar
                    </button>
                </div>
            </div>
        </form>
    </div>
</x-layout>
