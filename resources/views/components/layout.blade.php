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
{{$slot}}
</body>
</html>
