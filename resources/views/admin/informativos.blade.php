<x-layout :oneCol="true">
    <x-slot name="assets">
{{--        <link href="{{ asset('css/tinymceTable.css') }}" rel="stylesheet">--}}
        <link href="{{ asset('css/form.css') }}" rel="stylesheet">
        <script src="{{asset('js/tinymce.js')}}"></script>
    </x-slot>
    <x-slot name="title">Informativos</x-slot>
    <div class="card">
        <div class="grid mb-30">
            <div class="col-12">
                <button class="mb-10" onclick="toggleForm()">Adicionar novo</button>
            </div>
            <div id="form-div" class="col-12 d-none">
                <form action="{{route('admin-informativos')}}" method="POST">
                    @method('POST')
                    @csrf
                    <div class="grid form-control">
                        <div class="col-12">
                            <label for="title">Título</label>
                            <input id="title" name="title" type="text"/>
                        </div>
                        <div class="col-12">
                            <label for="link">Link</label>
                            <input id="link" name="link" type="text"/>
                        </div>
                        <div class="col-12">
                            <label for="expires_at">Data de expiração</label>
                            <input id="expires_at" name="expires_at" type="datetime-local"/>
                        </div>
                        <div class="col-12">
                            <label for="tinymce">Mensagem</label>
{{--                            <textarea id="message" name="message" rows="4"></textarea>--}}
                            <textarea id="tinymce"  name="message" rows="4"></textarea>
                        </div>

                        <div class="col-12">
                            <button>Enviar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <table>
            <thead>
            <tr>
                <th>Título</th>
                <th>Link</th>
                <th>Expira em</th>
                <th>Mensagem</th>
            </tr>
            </thead>
            <tbody>
            @foreach($informatives as $informative)
                <tr>
                    <td>
                        <p>{{$informative->title}}</p>
                    </td>
                    <td>
                        <p class="truncate">{{$informative->link}}</p>
                    </td>
                    <td>
                        <p>{{$informative->getFormatedExpiresAt()}}</p>
                    </td>
                    <td>
                        <p class="truncate">{{$informative->message}}</p>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <script>
        const form = document.getElementById('form-div');
        form.style.display = 'none'
        const toggleForm = () => {
            form.style.display = form.style.display === 'none' ? 'block' : 'none'
        }
    </script>
</x-layout>
