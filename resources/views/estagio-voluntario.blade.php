<x-layout>
    <x-slot name="assets">
        <link href="{{ asset('css/form.css') }}" rel="stylesheet">
        <link href="{{ asset('css/estagio-voluntario.css') }}" rel="stylesheet">
        <script src="https://www.google.com/recaptcha/api.js" async defer></script>
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
