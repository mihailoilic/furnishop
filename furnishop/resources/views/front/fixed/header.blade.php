

<header>
    <!-- header left mobie -->
    <div class="header-mobile d-md-none">
        <div class="mobile hidden-md-up text-xs-center d-flex align-items-center justify-content-around">

            <!-- menu left -->
            <div id="mobile_mainmenu" class="item-mobile-top">
                <i class="fa fa-bars" aria-hidden="true"></i>
            </div>

            <!-- logo -->
            <div class="mobile-logo">
                <a href="{{ route("home") }}">
                    <img src="{{ asset("img/mobile-logo.png") }}" alt="logo" class="img-fluid">
                </a>
            </div>

            <!-- menu right -->
            <div class="mobile-menutop" data-target="#mobile-pagemenu">
                <i class="zmdi zmdi-more"></i>
            </div>
        </div>

        <!-- search -->
        <div id="mobile_search" class="d-flex">
            <div id="mobile_search_content">
                <form method="get" action="{{ route("shop") }}">
                    <input type="text" name="keywords" value="" placeholder="Search">
                    <button type="submit">
                        <i class="fa fa-search"></i>
                    </button>
                </form>
            </div>
        </div>
    </div>

    <!-- header desktop -->
    <div class="header-top d-xs-none ">
        <div class="container">
            <div class="row">
                <!-- logo -->
                <div class="col-sm-2 col-md-2 d-flex align-items-center">
                    <div id="logo">
                        <a href="{{ route("home") }}">
                            <img src="{{ asset("img/logo.png") }}" alt="logo" class="img-fluid">
                        </a>
                    </div>
                </div>

                <!-- menu -->
                <div class="main-menu col-sm-4 col-md-5 align-items-center justify-content-center navbar-expand-md">
                    <div class="menu navbar collapse navbar-collapse">
                        <ul class="menu-top navbar-nav">

                            @foreach($menu as $link)

                            <li @if(request()->routeIs($link->route)) class="nav-link" @endif>
                                <a href="{{ $link->route ? route($link->route) : "#!" }}" class="parent">
                                    {{ $link->name }}
                                    @if($link->route == null) &#8675; @endif
                                </a>

                                @if($link->menus)

                                <div class="dropdown-menu">
                                    <ul>
                                        @foreach($link->menus as $sublink)
                                        <li class="item">
                                            <a href="{{ route($sublink->route) }}">{{ $sublink->name }}</a>
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>

                                @endif

                            </li>

                            @endforeach

                        </ul>
                    </div>
                </div>

                <!-- search-->
                <div id="search_widget" class="col-sm-6 col-md-5 align-items-center justify-content-end d-flex">
                    <form method="get" action="{{ route("shop") }}">
                        <input type="text" name="keywords" value="" placeholder="Search ..." class="ui-autocomplete-input" autocomplete="off">
                        <button type="submit">
                            <i class="fa fa-search"></i>
                        </button>
                    </form>

                    <!-- acount  -->
                    <div id="block_myaccount_infos" class="hidden-sm-down dropdown">
                        <div class="myaccount-title">
                            <a href="#acount" data-toggle="collapse" class="acount">
                                <i class="fa fa-user" aria-hidden="true"></i>
                                <span>{{ $accName }}</span>
                                <i class="fa fa-angle-down" aria-hidden="true"></i>
                            </a>
                        </div>
                        <div id="acount" class="collapse">
                            <div class="account-list-content">
                                @foreach($accMenu as $link)
                                <div>
                                    <a href="{{ route($link["route"]) }}" rel="nofollow">
                                        <i class="{{ $link["class"] }}"></i>
                                        <span>{{ $link["name"] }}</span>
                                    </a>
                                </div>
                                @endforeach

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>


