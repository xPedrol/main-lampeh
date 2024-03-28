<link href="{{ asset('css/navbar.css') }}" rel="stylesheet">
<script src="{{ asset('js/navbar.js') }}" defer></script>
<header>

    <div class="logo-div">
        <button class="btn-menu" onclick="toggle_mobile_nav()">
            <i class="fa-solid fa-bars"></i>
        </button>
        <a href="{{route('home')}}">
            <img alt="logo_lampeh" class="logo" src="{{asset('/logo.webp')}}">
        </a>
    </div>
    <nav id="mobile-nav" class="mobile-nav">
        <ul class="ul-nav">
            @foreach($nav as $item)
                @if(isset($item['show']) && $item['show'])
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
                @endif
            @endforeach
        </ul>
    </nav>
    <nav class="desktop-nav">
        <ul class="ul-nav">
            @foreach($nav as $item)
                @if(isset($item['show']) && $item['show'])
                    <li class="li-nav">
                        <a @if(!isset($item['children'])) href="{{route($item['label'])}}"
                           @endif id="{{$item['label']}}"
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
                @endif
            @endforeach
        </ul>
    </nav>
</header>
