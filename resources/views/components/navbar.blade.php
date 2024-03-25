@vite(['resources/css/navbar.scss','resources/js/navbar.js'])
<script>
    const children_hover = (id) => {
        children = document.getElementById(id)
        if (!children) return
        if (children.style.display === 'block') {
            children.style.display = 'none'
            return
        }
        children.style.display = 'block'
    }

</script>
<header>
    <div class="logo-div">
        <img class="logo" src="{{asset('/logo.png')}}">
    </div>
    <nav>
        <ul class="ul-nav">
            @foreach($nav as $item)
                <li class="li-nav">
                    <a id="{{$item['label']}}" onmouseenter="children_hover(`children-{{$item['label']}}`)"
                       onmouseleave="children_hover(`children-{{$item['label']}}`)"
                       class="@if(isset($item['children'])) has-children @endif">{{$item['title']}}</a>
                    @if(isset($item['children']))
                        <ul class="children" id="children-{{$item['label']}}"
                            onmouseenter="children_hover(`children-{{$item['label']}}`)"
                            onmouseleave="children_hover(`children-{{$item['label']}}`)">
                            @foreach($item['children'] as $child)
                                <li class="child">{{$child['title']}}</li>
                            @endforeach
                        </ul>
                    @endif
                </li>
            @endforeach
        </ul>
    </nav>
</header>
