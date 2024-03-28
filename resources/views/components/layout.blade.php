<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{isset($title)?($title.' - LAMPEH'):'LAMPEH'}}</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

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
        <div class="col-12 @if(!$oneCol) col-lg-8 @endif">
            <main>
                @if(Session::has('success'))
                    <div class="alert alert-success mb-15" role="alert">
                        {{Session::get('success')}}
                    </div>
                @endif
                @if(Session::has('error'))
                    <div class="alert alert-danger mb-15" role="alert">
                        {{Session::get('error')}}
                    </div>
                @endif
                {{$slot}}
            </main>
        </div>
        @if(!$oneCol)
            <aside class="col-12 col-lg-4">
                <div class="sticky">
                    <div class="card destaques">
                        <h3 class="destaques-title roboto-condensed">Destaques</h3>
                        <div class="banner">
                            <a target="_blank" href="https://casasetecentista.lampeh.ufv.br">
                                Projeto Acervos de Minas Gerais
                                <br/>
                                Casa Setecentista de Mariana/IPHAN
                            </a>
                        </div>
                        <div class="banner">
                            <a target="_blank" href="https://arquivocamaravicosa.lampeh.ufv.br">
                                Projeto Arquivo Câmara Municipal de Viçosa
                            </a>
                        </div>
                        <div class="banner">
                            <a target="_blank" href="https://posarqueologia.ufv.br">
                                Curso de Especialização em Arqueologia
                            </a>
                        </div>
                        <div class="banner">
                            <a target="_blank" href="https://arqueologia.lampeh.ufv.br">
                                Patrimônio Arqueológico
                            </a>
                        </div>
                    </div>
                    <div class="card nos-encontre mt-30">
                        <h3 class="destaques-title roboto-condensed">Nos encontre</h3>
                        <hr/>
                        <h4>
                            Endereço
                        </h4>
                        <p>
                            Edifício da GeoHistória – UFV
                        </p>
                        <p>
                            Rua Purdue, 632
                        </p>
                        <p>
                            Santo Antonio, Viçosa – MG
                        </p>
                        <p>
                            CEP: 36579-900
                        </p>
                    </div>
                </div>
            </aside>
        @endif
    </div>
</div>
<script src="{{ asset('js/app.js') }}" defer></script>

{{$bAssets??''}}
</body>
</html>
