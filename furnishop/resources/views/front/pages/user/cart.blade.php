@extends("front.layout")
@section("title", "Furnishop | Cart")

@section("body_id","")
@section("body_class", "product-cart checkout-cart blog")

@section("content")

    <script>
        const cartUpdateRoute = "{{ route("cart.update", 0) }}"
        const cartDestroyRoute = "{{ route("cart.destroy", 0) }}"
    </script>

    <div id="cart">
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
                                <a href="{{ route("cart.index") }}">
                                    <span>Shopping Cart</span>
                                </a>
                            </li>
                        </ol>
                    </div>
                </div>
            </nav>
            <div class="container">
                <div class="row">
                    <div id="content-wrapper" class="col-xs-12 col-sm-12 col-md-12 col-lg-12 onecol">
                        <section id="main">
                            <div class="cart-grid row">
                                <div class="col-md-9 col-xs-12 check-info">
                                    <h1 class="title-page">Shopping Cart</h1>
                                    <div class="cart-container">
                                        <div class="cart-overview js-cart">
                                            <ul class="cart-items">

                                                @forelse($cart as $item)



                                                <li class="cart-item">
                                                    <div class="product-line-grid row justify-content-between">
                                                        <!--  product left content: image-->
                                                        <div class="product-line-grid-left col-md-2">
                                                            <span class="product-image media-middle">
                                                                <a href="{{ route("product", ["product"=>$item->product->id]) }}">
                                                                    <img class="img-fluid" src="{{ asset("img/product/".$item->product->images->first()->thumbnail_filename) }}" alt="{{ $item->product->name }}">
                                                                </a>
                                                            </span>
                                                        </div>
                                                        <div class="product-line-grid-body col-md-6">
                                                            <div class="product-line-info">
                                                                <a class="label" href="{{ route("product", ["product"=>$item->product->id]) }}" data-id_customization="0">{{ $item->product->name }}</a>
                                                            </div>
                                                            <div class="product-line-info product-price">
                                                                <span class="value price-label" id="price-{{ $item->id }}" >${{ $item->product->price }}</span>
                                                            </div>
                                                        </div>
                                                        <div class="product-line-grid-right text-center product-line-actions col-md-4">
                                                            <div class="row">
                                                                <div class="col-md-5 col qty">
                                                                    <div class="label">Qty:</div>
                                                                    <div class="quantity">
                                                                        <input type="text" id="qty-{{$item->id}}"  value="{{ $item->quantity }}" class="qty-input input-group form-control">

                                                                        <span class="input-group-btn-vertical">
                                                                            <button class="btn btn-touchspin js-touchspin bootstrap-touchspin-up" type="button"
                                                                            data-target="#qty-{{$item->id}}">
                                                                                +
                                                                            </button>
                                                                            <button class="btn btn-touchspin js-touchspin bootstrap-touchspin-down" type="button"
                                                                            data-target="#qty-{{$item->id}}">
                                                                                -
                                                                            </button>
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-5 col price">
                                                                    <div class="label">Total:</div>
                                                                    <div class="product-price total" id="total-{{$item->id}}">${{ $totalPerProduct[$loop->index] }}</div>
                                                                </div>
                                                                <div class="col-md-2 col text-xs-right align-self-end">
                                                                    <div class="cart-line-product-actions ">
                                                                        <a class="remove-from-cart" rel="nofollow" href="#" data-link-action="delete-from-cart" data-id="{{ $item->id }}">
                                                                            <i class="fa fa-trash-o" aria-hidden="true"></i>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>


                                                @empty
                                                    <p class="text-muted">Your cart is empty.</p>
                                            @endforelse

                                            </ul>
                                        </div>
                                    </div>
{{--                                    <a href="#!" class="continue btn btn-primary pull-xs-right">--}}
{{--                                        Continue--}}
{{--                                    </a>--}}
                                </div>
                                <div class="cart-grid-right col-xs-12 col-lg-3">
                                    <div class="cart-summary">
                                        <div class="cart-detailed-totals">
                                            <div class="cart-summary-products">
                                                <div class="summary-label">There are {{ count($cart) }} items in your cart</div>
                                            </div>
                                            <div class="cart-summary-line" id="cart-subtotal-products">
                                                <span class="label js-subtotal">
                                                    Total products:
                                                </span>
                                                <span id="total-products" class="value">${{ $total }}</span>
                                            </div>
                                            <div class="cart-summary-line" id="cart-subtotal-shipping">
                                                <span class="label">
                                                    Total Shipping:
                                                </span>
                                                <span class="value">FREE</span>
                                                <div>
                                                    <small class="value"></small>
                                                </div>
                                            </div>
                                            <div class="cart-summary-line cart-total">
                                                <span class="label">Total:</span>
                                                <span id="total-all" class="value">${{ $total }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section("page_script")
    <script src="{{ asset("js/cart.js") }}"></script>
@endsection

