@extends("front.layout")
@section("title", "Furnishop | $product->name")
@section("body_id","product-detail")
@section("body_class", "")

@section("content")

    <script>
        const cartStoreUrl = "{{ route("cart.store") }}"
    </script>

    <div id="wrapper-site">
        <div id="content-wrapper">
            <div id="main">
                <div class="page-home">

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
                                        <a href="{{ route("category", ["category"=>$main_category->id]) }}">
                                            <span>{{ $main_category->name }}</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route("category", ["category"=>$product->categories->first()->id]) }}">
                                            <span>{{ $product->categories->first()->name }}</span>
                                        </a>
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </nav>
                    <div class="container">
                        <div class="content">
                            <div class="row">
                                <div class="col-12">
                                    <div class="main-product-detail">
                                        <h2>{{ $product->name }}</h2>
                                        <div class="product-single row">
                                            <div class="product-detail col-xs-12 col-md-5 col-sm-5">
                                                <div class="page-content" id="content">
                                                    <div class="images-container">
                                                        <div class="js-qv-mask mask tab-content border">
                                                            @foreach($product->images as $image)
                                                            <div id="item{{$loop->index}}" class="tab-pane fade @if($loop->index == 0) active in show @endif">
                                                                <img src="{{ asset("img/product/$image->filename") }}" alt="{{ $product->name }}">
                                                            </div>
                                                            @endforeach
                                                        </div>
                                                        <ul class="product-tab nav nav-tabs d-flex">
                                                            @foreach($product->images as $image)

                                                            <li class="@if($loop->index == 0) active @endif col">
                                                                <a href="#item{{ $loop->index }}" data-toggle="tab" aria-expanded="true" class="@if($loop->index == 0) active show @endif">
                                                                    <img src="{{ asset("img/product/$image->filename") }}" alt="{{ $product->name }}">
                                                                </a>
                                                            </li>
                                                                @endforeach
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="product-info col-xs-12 col-md-7 col-sm-7">
                                                <div class="detail-description">
                                                    <div class="price-del">
                                                        <span class="price">${{$product->price}}</span>
                                                    </div>
                                                    <p class="description">{{ $product->description }}</p>
                                                    <div class="option has-border d-lg-flex size-color">
                                                        <div class="colors ml-0">
                                                            <b class="title">Colors : </b>
                                                            @foreach($product->colors as $color)
                                                                {{$color->name}} &nbsp;
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                    <div class="has-border cart-area">

                                                        @if(!$active)
                                                            <p class="text-danger">This product is no longer active.</p>

                                                        @else

                                                        <div class="product-quantity">
                                                            <div class="qty">
                                                                <div class="input-group">
                                                                    <div class="quantity">
                                                                        <span class="control-label">QTY : </span>
                                                                        <input type="text" name="qty" id="quantity_wanted" value="1" class="input-group form-control">

                                                                        <span class="input-group-btn-vertical">
                                                                                <button class="btn btn-touchspin js-touchspin bootstrap-touchspin-up" type="button">
                                                                                    +
                                                                                </button>
                                                                                <button class="btn btn-touchspin js-touchspin bootstrap-touchspin-down" type="button">
                                                                                    -
                                                                                </button>
                                                                            </span>
                                                                    </div>
                                                                    <span class="add">
                                                                            <button class="btn btn-primary add-to-cart add-item"
                                                                                    @if(!session("user"))
                                                                                    onclick="location.href='{{ route("login") }}'"
                                                                                    @endif
                                                                                     data-id = "{{ $product->id }}" data-button-action="add-to-cart" type="submit">
                                                                                <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                                                                <span>Add to cart</span>
                                                                            </button>
                                                                        </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="clearfix"></div>
                                                        <p class="product-minimal-quantity">
                                                        </p>

                                                        @endif
                                                    </div>
                                                    <div class="content">

                                                        @if($product->collection)
                                                        <p>collection :
                                                            <span class="content2">
                                                                    {{ $product->collection->name }}
                                                                </span>
                                                            @endif
                                                        </p>

                                                        <p>Categories :
                                                            <span class="content2">
                                                                @foreach($product->categories as $cat)
                                                                    <a href="{{ route("category", ["category"=>$cat->id]) }}">{{ $cat->name }}</a>
                                                                    @if(!$loop->last),@endif
                                                                @endforeach
                                                                </span>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="related">
                                            <div class="title-tab-content  text-center">
                                                <div class="title-product justify-content-start">
                                                    <h2>Related Products</h2>
                                                </div>
                                            </div>
                                            <div class="tab-content">
                                                <div class="row justify-content-center justify-content-sm-start">
                                                    @forelse($related as $rp)

                                                        <x-product :product="$rp" :class="'col-8  col-sm-4 col-lg-3'"/>

                                                    @empty

                                                        <p class="text-muted m-3">No related products for now.</p>

                                                    @endforelse
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section("page_script")
    <script src="{{ asset("js/product.js") }}"></script>
@endsection
