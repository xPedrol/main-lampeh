@vite(['resources/css/navbar.scss','resources/js/navbar.js'])

<script>

    const children_hover = (id) => {
        const children = document.getElementById(id)
        if (!children) return
        if (children.style.display === 'block') {
            children.style.display = 'none'
            return
        }
        children.style.display = 'block'
    }

    const toggle_mobile_nav = () => {
        const mobile_nav = document.getElementById('mobile-nav')
        if (!mobile_nav.style.maxHeight || mobile_nav.style.maxHeight === '0px') {
            mobile_nav.style.maxHeight = '1000px'
            return
        }
        mobile_nav.style.maxHeight = '0px'
        // mobile_nav.style.backgroundColor = 'blue'
    }


</script>
<header>

    <div class="logo-div">
        <button class="btn-menu" onclick="toggle_mobile_nav()">
            <i class="fa-solid fa-bars"></i>
        </button>
        <img class="logo" src="{{asset('/logo.png')}}">
    </div>
    <nav id="mobile-nav" class="mobile-nav">
        <ul class="ul-nav">
            @foreach($nav as $item)
                <li class="li-nav">
                    <a @if(!isset($item['children'])) href="{{route($item['label'])}}"
                       @endif onclick="children_hover(`mobile-children-{{$item['label']}}`)"
                       class="@if(isset($item['children'])) has-children @endif">{{$item['title']}}</a>
                    @if(isset($item['children']))
                        <ul id="mobile-children-{{$item['label']}}" class="children">
                            @foreach($item['children'] as $child)
                                <li class="child">
                                    <a href="{{route($child['label'])}}">{{$child['title']}}</a>
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </li>
            @endforeach
        </ul>
    </nav>
    <nav class="desktop-nav">
        <ul class="ul-nav">
            @foreach($nav as $item)
                <li class="li-nav">
                    <a @if(!isset($item['children'])) href="{{route($item['label'])}}" @endif id="{{$item['label']}}"
                       onmouseenter="children_hover(`children-{{$item['label']}}`)"
                       onmouseleave="children_hover(`children-{{$item['label']}}`)"
                       class="@if(isset($item['children'])) has-children no-hover @endif">{{$item['title']}}</a>
                    @if(isset($item['children']))
                        <ul class="children" id="children-{{$item['label']}}"
                            onmouseenter="children_hover(`children-{{$item['label']}}`)"
                            onmouseleave="children_hover(`children-{{$item['label']}}`)">
                            @foreach($item['children'] as $child)
                                <li class="child">
                                    <a href="{{route($child['label'])}}">{{$child['title']}}</a>
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </li>
            @endforeach
        </ul>
    </nav>
</header>
