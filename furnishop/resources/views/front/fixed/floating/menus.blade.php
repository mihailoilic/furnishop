<!-- menu mobie left -->
<div class="mobile-top-menu d-md-none">
    <button type="button" class="close" aria-label="Close">
        <i class="zmdi zmdi-close"></i>
    </button>
    <div class="tiva-verticalmenu block" data-count_showmore="17">
        <div class="box-content block-content">
            <div class="verticalmenu" role="navigation">
                <ul class="menu level1">

                    @foreach($categories as $cat)


                    <li class="item  parent">
                        <a href="{{ route("category", ["category"=>$cat->id]) }}" class="hasicon">
                            <img src="{{ asset("img/categories/$cat->image") }}" alt="{{ $cat->name }}">{{ $cat->name }}</a>
                        <span class="arrow collapsed" data-toggle="collapse" data-target="#mobile-cat-{{$cat->id}}" aria-expanded="false" role="status">
                                <i class="zmdi zmdi-minus"></i>
                                <i class="zmdi zmdi-plus"></i>
                            </span>
                        <div class="subCategory collapse" id="mobile-cat-{{$cat->id}}" aria-expanded="true" role="status">
                            <div class="menu-items">
                                <ul>

                                    @foreach($cat->subcategories as $sub)

                                    <li class="item">
                                        <a href="{{ route("category", ["category"=>$sub->id]) }}">{{ $sub->name }}</a>
                                    </li>

                                    @endforeach

                                </ul>
                            </div>
                        </div>
                    </li>

                    @endforeach

                </ul>
            </div>
        </div>
    </div>
</div>

<!-- menu mobie right -->
<div id="mobile-pagemenu" class="mobile-boxpage d-flex hidden-md-up active d-md-none">
    <div class="content-boxpage col">
        <div class="box-header d-flex justify-content-between align-items-center">
            <div class="title-box">Menu</div>
            <div class="close-box">Close</div>
        </div>
        <div class="box-content">
            <nav>
                <!-- Brand and toggle get grouped for better mobile display -->
                <div id="megamenu" class="clearfix">
                    <ul class="menu level1">

                        @foreach($menu as $link)

                        <li class="item home-page has-sub">

                            <a href="{{ $link->route ? route($link->route) :  "#!" }}">
                                {{ $link->name }}
                            </a>

                            @if(count($link->menus))

                            <span class="arrow collapsed" data-toggle="collapse" data-target="#megamenu-{{$link->id}}" aria-expanded="true" role="status">
                                <i class="zmdi zmdi-minus"></i>
                                <i class="zmdi zmdi-plus"></i>
                            </span>

                            <div class="subCategory collapse" id="megamenu-{{ $link->id }}" aria-expanded="true" role="status">
                                <ul>
                                    @foreach($link->menus as $sublink)
                                    <li class="item">
                                        <a href="{{ route($sublink->route) }}" >{{ $sublink->name }}</a>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>

                            @endif

                        </li>

                        @endforeach

                        <li id="mobile-menu-separator">

                        </li>

                        <li class="item home-page">
                                &nbsp;
                                <i class="fa fa-user" aria-hidden="true"></i>
                                {{ $accName }}
                        </li>

                        @foreach($accMenu as $link)

                            <li class="item home-page">
                                <a href="{{ route($link["route"]) }}">{{ $link["name"] }}</a>
                            </li>

                        @endforeach


                    </ul>
                </div>
            </nav>
        </div>
    </div>
</div>
