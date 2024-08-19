<x-layout>
    <x-slot name="assets">
        <link href="{{ asset('css/estagio-voluntario.css') }}" rel="stylesheet">
        <link href="{{ asset('css/form.css') }}" rel="stylesheet">
        <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    </x-slot>
    <x-slot name="title">Registrar</x-slot>
    <div class="card">
        <form action="{{route('registering')}}" method="POST">
            @method('POST')
            @csrf
            <div class="grid form-control">
                <div class="col-12">
                    <label for="name">Nome completo</label>
                    <input id="name" name="name" type="text" placeholder="Digite o nome do usuário..." value="{{old("name")}}"/>
                    @error('name')
                    <div class="invalid-feedback">
                        Campo inválido
                    </div>
                    @enderror
                </div>
                <div class="col-12">
                    <label for="email">Email</label>
                    <input id="email" name="email" type="email" placeholder="Digite o email do usuário..." value="{{old("email")}}"/>
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
                    <input id="confirmPassword" name="confirmPassword" type="password" placeholder="Confirme a senha do usuário..."/>
                    @error('confirmPassword')
                    <div class="invalid-feedback">
                        Campo inválido
                    </div>
                    @enderror
                </div>
                <div class="col-12">
                    <div class="g-recaptcha mb-15" data-sitekey="{{config('services.recaptcha.key')}}"></div>
                    @if(Session::has('reCAPTCHA'))
                        <div class="alert alert-danger mb-0" role="alert">
                            {{Session::get('reCAPTCHA')}}
                        </div>
                    @endif
                </div>
                <div class="col-12">
                    <button>Enviar</button>
                </div>
            </div>
        </form>
    </div>
</x-layout>
