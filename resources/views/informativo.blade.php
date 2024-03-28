<x-layout>
    <x-slot name="assets">
        <link href="{{ asset('css/quem-somos.css') }}" rel="stylesheet">
        <link href="{{ asset('css/form.css') }}" rel="stylesheet">
    </x-slot>
    <x-slot name="title">Detalhes da postagem</x-slot>
    <div class="card">
        <div class="mb-15">
            <h3>{{$informative->title}}</h3>
            <small>{{$informative->getFormatedExpiresAt()}}</small>
        </div>
        <hr/>
        <div class="mt-15">
            {!! $informative->message !!}
        </div>
    </div>
    <div class="card mt-15">
        <h4 class="mb-15">Comentários</h4>
        @if(count($comments) == 0)
            <p class="text-center">Sem registros</p>
        @endif
        <div class="grid mb-15 gap-25">
            @foreach($comments as $comment)
                <div class="col-12 comment d-flex gap-10">
                    <div>
                        <img width="45" height="45"
                             src="https://secure.gravatar.com/avatar/807e1e0ff64b5cca74a92d363b4e96bb?s=100&d=mm&r=g"/>
                    </div>
                    <div class="w-100">
                        <div class="d-flex justify-content-between align-items-start w-100">
                            <h5>{{$comment->name}}</h5>
                            <small class="d-sm-none">Publicado em: {{$comment->getFormatedCreatedAt()}}</small>
                        </div>
                        <p class="no-ident font-15">{{$comment->message}}</p>
                    </div>
                </div>
            @endforeach
        </div>
        <hr/>
        <form action="{{route('informativo',['id'=>$informative->id])}}" method="POST">
            @method('POST')
            @csrf
            <div class="grid gap-5 mt-15">
                <div class="col-12">
                    <input id="name" name="name" placeholder="Escreva seu nome..."/>
                </div>
                <div class="col-12">
                    <textarea id="message" name="message" placeholder="Escreva um comentário..." rows="3"></textarea>
                </div>
                <div class="col-12">
                    <button type="submit">Enviar</button>
                </div>
            </div>
        </form>
    </div>

</x-layout>
