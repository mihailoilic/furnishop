@extends("front.layout")
@section("title", "Furnishop | Shop")
@section("body_id","product-sidebar-left")
@section("body_class", "product-grid-sidebar-left")

@section("content")

    <script>
        const imgDir = "{{ asset("img/product") }}/"
        const productRoute = "{{ route("product", ["product"=>0]) }}";
    </script>


    <div id="wrapper-site">
        <!-- breadcrumb -->
        <nav class="breadcrumb-bg">
            <div class="container no-index">
                <div class="breadcrumb">
                    <ol>
                        <li>
                            <a href="{{ route("home") }}">
                                <span>Home</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route("shop") }}">
                                <span>Shop</span>
                            </a>
                        </li>
                    </ol>
                </div>
            </div>
        </nav>

        <div id="content-wrapper" class="full-width">
            <div id="main">
                <div class="page-home">
                                        <div class="container">
                        <div class="content">
                            <div class="row">
                                <div class="sidebar-3 sidebar-collection col-lg-3 col-md-4 col-sm-4">

                                    <!-- category menu -->
                                    <div class="sidebar-block">
                                        <div class="title-block" id="title-categories" data-initial-category="{{$category}}">Categories
                                        </div>
                                        <div class="block-content">

                                            <div class="cateTitle hasSubCategory open level1" id="category-">
                                                <a class="cateItem" href="">All Categories</a>

                                            </div>

                                            @foreach($categories as $cat)

                                            <div class="cateTitle hasSubCategory open level1" id="category-{{$cat->id}}">
                                                    <span class="arrow collapsed collapse-icons" data-toggle="collapse" data-target="#submenu-category-{{$cat->id}}" aria-expanded="false" role="status">
                                                        <i class="zmdi zmdi-minus"></i>
                                                        <i class="zmdi zmdi-plus"></i>
                                                    </span>
                                                <a class="cateItem" href="">{{$cat->name}}</a>
                                                <div class="subCategory collapse" id="submenu-category-{{$cat->id}}" aria-expanded="true" role="status">

                                                    @foreach($cat->subcategories as $sub)

                                                    <div class="cateTitle" data-parent="{{$cat->id}}" id="category-{{$sub->id}}">
                                                        <a href="" class="cateItem">{{ $sub->name }}</a>
                                                    </div>

                                                    @endforeach

                                                </div>
                                            </div>


                                            @endforeach

                                        </div>

                                    <!-- best seller -->
                                    <div class="sidebar-block mt-5 pt-3">

                                        <div class="title-block">Filters</div>

                                        <div class="new-item-content mt-5">
                                            <h3 class="title-product mb-0 border-0">keywords</h3>
                                            <div class="form-group no-gutters">

                                                <input class="form-control" type="text" name="keywords" id="keywords" value="{{ request("keywords") ?? "" }}"/>

                                            </div>
                                        </div>


                                        <div class="new-item-content mt-5">
                                            <h3 class="title-product">collections</h3>
                                            <ul class="scroll-product">

                                                @foreach($collections as $coll)

                                                <li>
                                                    <label class="check">
                                                        <input type="checkbox" id="collection-{{ $coll->id }}"
                                                        name="collections" value="{{ $coll->id }}">
                                                        <span class="checkmark"></span>
                                                    </label>
                                                    <label for="collection-{{ $coll->id }}">
                                                        <b>{{$coll->name}}</b>
                                                    </label>

                                                </li>

                                                @endforeach

                                            </ul>
                                        </div>
                                        <div class="new-item-content">
                                            <h3 class="title-product">colors</h3>
                                            <ul class="scroll-product">

                                                @foreach($colors as $col)

                                                    <li>
                                                        <label class="check">
                                                            <input type="checkbox" id="color-{{ $col->id }}"
                                                                   name="colors" value="{{ $col->id }}">
                                                            <span class="checkmark"></span>
                                                        </label>
                                                        <label for="color-{{ $col->id }}">
                                                            <b>{{$col->name}}</b>
                                                        </label>

                                                    </li>

                                                @endforeach

                                            </ul>
                                        </div>

                                    </div>

                                    </div>
                                </div>
                                <div class="col-sm-8 col-lg-9 col-md-8 product-container">
                                    <div class="js-product-list-top firt nav-top">
                                        <div class="d-flex justify-content-around row">
                                            <div class="col col-xs-12">

                                                <div class="hidden-sm-down total-products">
                                                    <p></p>
                                                </div>
                                            </div>
                                            <div class="col col-xs-12">
                                                <div class="d-flex sort-by-row justify-content-lg-end justify-content-md-end">

                                                    <div class="products-sort-order dropdown">
                                                        <select id="sort-products" class="select-title">
                                                            <option value="">Sort by</option>
                                                            <option value="name-asc">Name, A to Z</option>
                                                            <option value="name-desc">Name, Z to A</option>
                                                            <option value="price-asc">Price, low to high</option>
                                                            <option value="price-desc">Price, high to low</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="tab-content product-items">
                                        <div id="grid" class="related tab-pane fade in active show">

                                            <div id="products-loader" class="justify-content-center align-items-center">
                                                <div class="loadingio-spinner-eclipse-97z8f7sijjj"><div class="ldio-gtqqnh8aig">
                                                        <div></div>
                                                    </div></div>
                                            </div>
                                            <div id="product-grid" class="row">




                                            </div>
                                        </div>
                                    </div>

                                    <!-- pagination -->
                                    <div class="pagination d-none">
                                        <div class="js-product-list-top ">
                                            <div class="d-flex justify-content-around row">
                                                <div class="page-list col col-xs-12">
                                                    <ul>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- end col-md-9-1 -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>






@endsection
@section("page_script")
    <script src="{{asset("js/shop.js")}}"></script>
@endsection
