<x-layout>
    <x-slot name="assets">
        <link href="{{ asset('css/home.css') }}" rel="stylesheet">
        <link href="{{ asset('css/grid.css') }}" rel="stylesheet">
    </x-slot>
    <x-slot name="bAssets">
        <script src="{{asset('js/home.js')}}"></script>
    </x-slot>
    <div class="card">
        <div class="carousel">
            <div class="actions">
                <button id="btn-prev" class="left" onclick="change_image(true)">
                    <i class="fa-solid fa-chevron-left"></i>
                </button>
                <button id="btn-next" class="right" onclick="change_image(false)">
                    <i class="fa-solid fa-chevron-right"></i>
                </button>
            </div>
            <img class="img-carousel" alt="" id="img-carousel" src="{{asset('/carousel/webp/c1.webp')}}"/>
        </div>
        <h3 class="informativo-title roboto-condensed">Informativo</h3>
        <hr/>
        @if(count($informatives) == 0)
            <p class="mt-30 text-center">Sem registros</p>
        @endif
        @foreach($informatives as $informative)
            <div class="informative mb-20">
                <a href="{{route('informativo',['id'=>$informative->id])}}"><h5>{{$informative->title}}</h5></a>
                <small>Criado em: {{$informative->getFormatedCreatedAt()}}</small>

            </div>
        @endforeach
    </div>
</x-layout>
