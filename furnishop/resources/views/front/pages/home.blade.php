@extends("front.layout")
@section("title", "Furnishop | Tailored To Your Needs")
@section("body_id","home")
@section("body_class", "")

@section("content")





    <div class="wrap-banner">
        <!-- menu category -->
        <div class="container position">
            <div class="section menu-banner d-xs-none">
                <div class="tiva-verticalmenu block">
                    <div class="box-content">
                        <div class="verticalmenu" role="navigation">
                            <ul class="menu level1">

                                @foreach($categories as $cat)

                                <li class="item parent">
                                    <a href="{{ route("category", ["category"=>$cat->id]) }}" class="hasicon">
                                        <img src="{{ asset("img/categories/".$cat["image"]) }}" alt="{{ $cat["name"] }} icon">
                                        {{ $cat["name"] }}
                                    </a>
                                    <div class="dropdown-menu">
                                        <div class="menu-items">
                                            <ul>

                                                @foreach($cat->subcategories as $sub)

                                                <li class="item">
                                                    <a href="{{ route("category", ["category"=>$sub->id]) }}" >{{ $sub->name }}</a>
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
        </div>
        <!-- slide show -->
        <div class="section banner">
            <div class="tiva-slideshow-wrapper">
                <div id="tiva-slideshow" class="nivoSlider">

                    @foreach($sliderImages as $image)

                    <a href="{{ $image->route ? route($image->route) : "#" }}">
                        <img class="img-responsive" src="{{ asset("img/slider/".$image->image) }}" alt="Slider image {{ $image->id }}">
                    </a>

                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <!-- main -->
    <div id="wrapper-site">
        <div id="content-wrapper" class="full-width">
            <div id="main">
                <section class="page-home">
                    <div class="container">

                        <!-- delivery form -->
                        <div class="section policy-home col-lg-12 col-xs-12">
                            <div class="row">
                                <div class="col-lg-4 col-md-4">
                                    <div class="block">
                                        <div class="block-content">
                                            <div class="policy-item">
                                                <div class="policy-content iconpolicy1">
                                                    <img src="{{ asset("img/home/home1-policy.png") }}" alt="img">
                                                    <div class="policy-name mb-5">FREE DELIVERY</div>
                                                    <div class="policy-des">No hidden fees</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tiva-html col-lg-4 col-md-4">
                                    <div class="block">
                                        <div class="block-content">
                                            <div class="policy-item">
                                                <div class="policy-content iconpolicy2">
                                                    <img src="{{ asset("img/home/home1-policy2.png") }}" alt="img">
                                                    <div class="policy-name mb-5">FREE INSTALLATION</div>
                                                    <div class="policy-des">You don't have to do anything</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tiva-html col-lg-4 col-md-4">
                                    <div class="block">
                                        <div class="block-content">
                                            <div class="policy-item">
                                                <div class="policy-content iconpolicy3">
                                                    <img src="{{ asset("img/home/home1-policy3.png") }}" alt="img">
                                                    <div class="policy-name mb-5">MONEY BACK GUARANTEED</div>
                                                    <div class="policy-des">You have 30 days to change your mind</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- product living room -->
                    <div class="section living-room"
                        style="background: url('{{ asset("img/home/home1-background1.jpg") }}');">
                        <div class="container">
                            <div class="tiva-row-wrap row">
                                <div class="groupcategoriestab-vertical col-md-12 col-xs-12">
                                    <div class="grouptab row">
                                        <div class="categoriestab-right col-lg-3 align-items-start d-flex flex-column col-md-3 flex-3">
                                            <div class="block-title-content">
                                                <h2 class="title-block">
                                                    {{ $featuredCategory->name }}
                                                </h2>
                                            </div>
                                            <!-- <div class="btn dropdown-toggle toggle-cate-child-vertical hidden-md-up mr-auto">Select category</div> -->
                                            <div class="cate-child-vertical">
                                                <ul class="d-flex align-items-start flex-column">
                                                    @foreach($featuredSubcategories as $cat)
                                                    <li>
                                                        <a href="{{ route("category", ["category"=>$cat->id]) }}">{{ $cat->name }}</a>
                                                    </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="categoriestab-left product-tab col-md-9 flex-9">
                                            <div class="title-tab-content d-flex justify-content-start">
                                                <ul class="nav nav-tabs">
                                                    <li>
                                                        <a href="#new" data-toggle="tab" class="active">New Arrivals</a>
                                                    </li>
                                                    <li>
                                                        <a href="#best" data-toggle="tab">Best Sellers</a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="tab-content">
                                                <div id="new" class="tab-pane fade in active show">
                                                    <div class="category-product-index owl-carousel owl-theme owl-loaded owl-drag">

                                                        @foreach($featuredCategoryLatest as $product)

                                                            <x-product :product="$product"/>

                                                        @endforeach
                                                    </div>
                                                </div>

                                                <div class="tab-pane fade" id="best">
                                                    <div class="category-product-index owl-carousel owl-theme">
                                                        @foreach($featuredCategoryBest as $product)

                                                            <x-product :product="$product"/>



                                                        @endforeach
                                                    </div>
                                                </div>


                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="container">
                        <!-- banner -->
                        @if(count($featuredCategoryLookbook))

                        <div class="section spacing-10 mx-auto group-image-special
                            @if(count($featuredCategoryLookbook) > 1) col-12
                            @else col-6
                            @endif">

                            <div class="row" id="featured-category-lookbook">
                                @foreach($featuredCategoryLookbook as $lb)

                                <div class="p-0 col-12 @if($loop->count > 1) col-sm-6 @endif">
                                    <div class="effect h-100">
                                        <a href="{{ route("lookbook.category", ["category"=>$lb->category_id])."#lookbook-idea-".$lb->id }}">
                                            <img class="h-100 img-fluid" src="{{ asset("img/lookbook/".$lb->image) }}" alt="{{ $lb->name }}">
                                        </a>
                                    </div>
                                </div>

                                @endforeach

                            </div>
                        </div>

                        @endif

                        <!-- best seller -->
                        <div class="section best-sellers col-lg-12 col-xs-12">
                            <div class="row">
                                <div class="col-md-12 col-xs-12">
                                    <div class="groupproductlist">
                                        <div class="row d-flex align-items-center">
                                            <!-- column 4 -->
                                            <div class="flex-12 col-lg-12 flex-12 flex-4 mt-3">
                                                <h2 class="title-block">
                                                    <span class="sub-title">get inspired</span>visit our lookbook
                                                </h2>
                                                <div class="content-text">
                                                    <p> Find the best combination for your perfect home
                                                    </p>
                                                    <div>
                                                        <a href="product-grid-sidebar-left.html"> take a look </a>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>



                    <!-- SHOP THE LOOK -->
                    <div class="section spacing-10 groupbanner-special py-2">
                        <div class="title-block">
                            <span class="sub-title">from our lookbook</span>
                            <span>FEATURED IDEAS</span>
                            <span> hand-picked by designers </span>
                        </div>

                        <div id="featured-ideas" class="row group-image-special">

                            @foreach($featuredLookbook as $lb)

                                <div class="col-lg-6 col-md-6 col-xs-12 p-1">

                                    <div class="effect h-100">
                                        <a href="{{ route("lookbook.category", ["category"=>$lb->category_id])."#lookbook-idea-".$lb->id }}">
                                            <img class="h-100 img-fluid" src="{{ asset("img/lookbook/".$lb->image) }}" alt="{{ $lb->name }}">
                                        </a>
                                    </div>
                                </div>

                            @endforeach


                        </div>
                    </div>

                </section>
            </div>
        </div>
    </div>
</div>

@endsection





