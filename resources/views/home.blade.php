@vite('/resources/css/home.scss')
<x-layout>
    <div class="card">
        <div class="carousel">
            <img class="img-carousel" alt="" id="img-carousel" src="{{asset('/carousel/c1.jpeg')}}"/>
        </div>
        <h3 class="informativo-title roboto-condensed">Informativo</h3>
        <hr/>
        <div class="informative">
            <a href=""><h5>INSTRUÇÕES DE USO ARQUIVO DA CASA SETECENTISTA DE MARIANA</h5></a>
            <small>maio 1, 2020 / Novos</small>
        </div>
        <div class="informative">
            <h5>INSTRUÇÕES DE USO ARQUIVO DA CASA SETECENTISTA DE MARIANA</h5>
            <small>maio 1, 2020 / Novos</small>
        </div>
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
