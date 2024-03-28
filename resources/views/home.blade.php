<x-layout>
    <x-slot name="assets">
        <link href="{{ asset('css/home.css') }}" rel="stylesheet">
        <link href="{{ asset('css/grid.css') }}" rel="stylesheet">
    </x-slot>
    <div class="card">
        <div class="carousel">
            <img class="img-carousel" alt="" id="img-carousel" src="{{asset('/carousel/c1.jpeg')}}"/>
        </div>
        <h3 class="informativo-title roboto-condensed">Informativo</h3>
        <hr/>
        @if(count($informatives) == 0)
            <p class="mt-30 text-center">Sem registros</p>
        @endif
        @foreach($informatives as $informative)
            <div class="informative mb-20">
                <a href="{{route('informativo',['id'=>$informative->id])}}"><h5>{{$informative->title}}</h5></a>
                @if(isset($informative->expires_at))
                    <small>Disponivel até: {{$informative->getFormatedExpiresAt()}}</small>
                @else
                    <small>Criado em: {{$informative->getFormatedCreatedAt()}}</small>
                @endif
            </div>
        @endforeach
    </div>
    <script>
        let i = 1;
        img_carousel = document.getElementById('img-carousel')
        let img_interval = setInterval(() => {
            console.log(img_carousel)
            if (i > 7) i = 1
            img_carousel.src = `/carousel/c${i}.jpeg`
            i++
        }, 5000)
    </script>
</x-layout>
