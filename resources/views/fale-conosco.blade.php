<x-layout>
    <x-slot name="assets">
        <link href="{{ asset('css/form.css') }}" rel="stylesheet">
        <script>
            function onSubmit() {
                document.getElementById("contact-form").submit();
            }
        </script>
        <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    </x-slot>
    <x-slot name="title">Fale Conosco</x-slot>
    <div class="card">
        <p class="mb-30">Preencha o formulário abaixo para enviar um email com sua dúvida.</p>
        <form id="contact-form" action="{{route('fale-conosco')}}" method="POST">
            @method('POST')
            @csrf
            <div class="grid form-control">
                <div class="col-12 mb-10">
                    <label for="assunto">Assunto</label>
                    <input id="assunto" name="assunto" type="text" value="{{old("assunto")}}"/>
                    <small>Digite o assunto a ser tratado em poucas palavras
                    </small>
                    @error('assunto')
                    <div class="invalid-feedback">
                        Campo inválido
                    </div>
                    @enderror
                </div>
                <div class="col-12">
                    <label for="nome">Nome Completo</label>
                    <input id="nome" name="nome" type="text" value="{{old("nome")}}"/>
                    @error('nome')
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
                    <label for="texto">Descrição detalhada</label>
                    <textarea id="texto" name="texto" rows="4">{{old("texto")}}</textarea>
                    @error('texto')
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
