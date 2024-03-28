<x-layout :oneCol="true">
    {{--    @vite('resources/css/quem-somos.scss')--}}
    <x-slot name="title">Projetos</x-slot>
    <div class="card">
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
                <tr>
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
