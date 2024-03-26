
<x-layout>

    <div class="container">
        <div class="grid">
            <div class="card col-8">
                <img class="img-carousel" alt="" id="img-carousel" src="{{asset('/carousel/c1.jpeg')}}"/>
            </div>
            <aside class="card col-4">
                <h3 class="destaques-title">Destaques</h3>
                <div class="banner">
                    Projeto Acervos de Minas Gerais
                    <br/>
                    Casa Setecentista de Mariana/IPHAN
                </div>
                <hr/>
                <div class="banner">
                    Projeto Arquivo Câmara Municipal de Viçosa
                </div>
                <hr/>
                <div class="banner">
                    Curso de Especialização em Arqueologia
                </div>
                <hr/>
                <div class="banner">
                    Patrimônio Arqueológico
                </div>
            </aside>
        </div>
    </div>
    <script>
        let i = 1;
        img_carousel = document.getElementById('img-carousel')
        let img_interval = setInterval(() => {
            console.log(img_carousel)
            if (i > 7) i = 1
            img_carousel.src =`/carousel/c${i}.jpeg`
            i++
        }, 5000)
    </script>
</x-layout>
