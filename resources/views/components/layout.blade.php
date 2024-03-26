<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$title??'LAMPEH'}}</title>
    @vite(['resources/css/app.scss', 'resources/js/app.js'])
    {{$assets??''}}
    {{--    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">--}}
</head>
<body>
<x-navbar/>
<div class="container">
    <div class="grid">
        @if(isset($title))
            <div class="col-12">
                <div class="gray-card">
                    <h2>{{$title}}</h2>
                </div>
            </div>
        @endif
        <div class="col-12 col-lg-8">
            {{$slot}}
        </div>
        <aside class="col-12 col-lg-4">
            <div class="sticky">
                <div class="card destaques">
                    <h3 class="destaques-title roboto-condensed">Destaques</h3>
                    <div class="banner">
                        Projeto Acervos de Minas Gerais
                        <br/>
                        Casa Setecentista de Mariana/IPHAN
                    </div>
                    <div class="banner">
                        Projeto Arquivo Câmara Municipal de Viçosa
                    </div>
                    <div class="banner">
                        Curso de Especialização em Arqueologia
                    </div>
                    <div class="banner">
                        Patrimônio Arqueológico
                    </div>
                </div>
                <div class="card nos-encontre mt-30">
                    <h3 class="destaques-title roboto-condensed">Nos encontre</h3>
                    <hr/>
                    <h4>
                        Endereço
                    </h4>
                    <p style="font-weight: 300">
                        Edifício da GeoHistória – UFV
                    </p>
                    <p style="font-weight: 300">
                        Rua Purdue, 632
                    </p>
                    <p style="font-weight: 300">
                        Santo Antonio, Viçosa – MG
                    </p>
                    <p style="font-weight: 300">
                        CEP: 36579-900
                    </p>
                </div>
            </div>
        </aside>
    </div>
</div>

</body>
</html>
