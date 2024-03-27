<x-layout>
    <script>
        function initMap() {
            var local1 = {lat: -19.939, lng: -43.990};
            var local2 = {lat: -19.920, lng: -43.922};
            var local3 = {lat: -19.917, lng: -43.934};

            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 13,
                center: local1
            });

            var marker1 = new google.maps.Marker({
                position: local1,
                map: map
            });

            var marker2 = new google.maps.Marker({
                position: local2,
                map: map
            });

            var marker3 = new google.maps.Marker({
                position: local3,
                map: map
            });
        }
    </script>

    <script async defer
            src="https://maps.googleapis.com/maps/api/js?key=SUA_CHAVE_API&callback=initMap">
    </script>
    @vite(['resources/css/quem-somos.scss','resources/css/contato.scss'])
    <x-slot name="title">Contato</x-slot>
    <div class="card">
        <h3>Endereço</h3>
        <p>
            Universidade Federal de Viçosa (UFV)/Departamento de História (DHI)/Laboratório Multimídia de Pesquisa
            Histórica (LAMPEH).
            <br/>
            <br/>
            Avenida P. H. Rolfs s/n. Viçosa (MG). CEP: 36570-900
        </p>
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1865.3726974433398!2d-42.86867411112412!3d-20.76111118716023!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xa367f7e853a503%3A0x7fe5bd2a8ccb1cee!2sEdif%C3%ADcio%20da%20GeoHist%C3%B3ria!5e0!3m2!1spt-BR!2sbr!4v1711498691417!5m2!1spt-BR!2sbr"
            width="600" height="350" style="border:0;" allowfullscreen="" loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"></iframe>

        <h3>Telefones</h3>
        <p>
            (32) 3613-7427
            <br/>
            <br/>
            (31) 3612-7425 (DHI)
        </p>
        <h3>Email</h3>
        <p>jonasqueiroz@ufv.br</p>
    </div>
</x-layout>
