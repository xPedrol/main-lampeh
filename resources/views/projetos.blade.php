<x-layout :oneCol="true">
    <x-slot name="assets">
        <script src="{{ asset('js/projetos.js') }}" ></script>
    </x-slot>
    <x-slot name="title">Projetos</x-slot>
    <div class="card responsive-table">
        <table>
            <thead>
            <tr>
                <th>Título</th>
                <th>Início/Fim</th>
                <th>Equipe Responsável</th>
                <th>Apoio/Financiamento</th>
            </tr>
            </thead>
            <tbody>
            @foreach($projects as $project)
                <tr id="{{$project->id}}" onmouseenter="extend({{$project->id}})" onmouseleave="reduce({{$project->id}})">
                    <td>
                        <p>{{$project->title}}</p>
                    </td>
                    <td class="no-wrap">
                        {{$project->periodo}}
                    </td>
                    <td>
                        <p>{{$project->equipe}}</p>
                    </td>
                    <td>
                        <p>{{$project->apoio}}</p>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</x-layout>
