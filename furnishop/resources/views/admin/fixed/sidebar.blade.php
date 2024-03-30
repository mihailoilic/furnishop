<div class="sidebar" data-color="purple" data-image="{{ asset("admin-assets/img/sidebar-5.jpg") }}">


    <div class="sidebar-wrapper">
        <div class="logo">
            <a href="{{ route("home") }}" class="simple-text">
                <img src="{{ asset("img/mobile-logo.png") }}" alt="furnishop"/>
            </a>
        </div>

        <ul class="nav">
            @foreach($menu as $link)
            <li @if(request()->routeIs($link["route"]))
                class="active"
                @endif>
                <a href="{{ route($link["route"]) }}">
                    <i class="{{ $link["icon"] }}"></i>
                    <p>{{ $link["name"] }}</p>
                </a>
            </li>
            @endforeach
        </ul>
    </div>
</div>
