<div class="{{ $class }}">

    <div class="item text-center">
        <div class="product-miniature first-item js-product-miniature item-one">
            <div class="thumbnail-container">
                <a href="{{ route("product", ["product"=>$id]) }}">
                    <img class="img-fluid image-cover" src="{{ asset("img/product/$img1") }}" alt="{{ $name }}">
                    <img class="img-fluid image-secondary" src="{{ asset("img/product/$img2") }}" alt="{{ $name }}">
                </a>

            </div>
            <div class="product-description">
                <div class="product-groups">
                    <div class="product-title">
                        <a href="{{ route("product", ["product"=>$id]) }}">{{ $name }}</a>
                    </div>
                    <div class="product-group-price">
                        <div class="product-price-and-shipping">
                            <span class="price">$ {{ $price }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
