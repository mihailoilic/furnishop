@extends("front.layout")
@section("title", "Furnishop | Lookbook")
@section("body_id","lookbook")
@section("body_class", "product-cart checkout-cart blog")

@section("content")

<div id="wrapper-site">
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
                        <a href="{{ route("lookbook") }}">
                            <span>Lookbook</span>
                        </a>
                    </li>
                    @if($selectedCategory)
                        <li>
                            <a href="{{ route("lookbook.category", ["category" => $selectedCategory->id ]) }}">
                                <span>{{ $selectedCategory->name }}</span>
                            </a>
                        </li>
                    @endif
                </ol>
            </div>
        </div>
    </nav>
    <div id="content-wrapper">
        <div id="main">

            <h1 class="title-block container text-left">EXPLORE THE LOOK</h1>

            <div class="container d-flex flex-wrap">

                <div class="lookbook-category my-2">
                    <a href="{{ route("lookbook") }}" class="lookbook-link @if(!$selectedCategory) active @endif">All Categories</a>
                </div>

                @foreach($categories as $category)

                    <div class="lookbook-category my-2">
                        <a href="{{ route("lookbook.category", ["category" => $category->id ]) }}" class="lookbook-link @if($selectedCategory && $category->id ==  $selectedCategory->id) active @endif">{{ $category->name }}</a>
                    </div>

                @endforeach


            </div>


            <div class="groupbanner-special ">

                <div class="tiva-lookbook default">




                    <div class="row container mx-auto">
                        <div class="items col-12 py-5">

                            @foreach($lookbook as $lb)

                            <div id="lookbook-idea-{{ $lb->id }}" class="lookbook-title font-weight-normal text-left h6 pt-5">
                                {{$lb->name}}
                            </div>
                            <div class="tiva-content-lookbook mb-5">
                                <img class="img-fluid img-responsive" src="{{ asset("img/lookbook/".$lb->image) }}" alt="{{ $lb->name }}">

                                @foreach($lb->items as $item)

                                <div class="item-lookbook item{{$loop->index}} "
                                     style="top: {{ $item->position_y }}%;
                                         left: {{ $item->position_x }}%;">

                                    <span class="number-lookbook">+</span>

                                    <div class="content-lookbook mx-md-4
                                            @if($item->position_x > 50) open-left @endif">
                                        <div class="main-lookbook d-flex align-items-center p-2">
                                            <div class="item-thumb p-2">
                                                <a href="{{ route("product", ["product"=>$item->product->id]) }}">
                                                    <img src="{{ asset("img/product/".$item->product->images->get(0)->thumbnail_filename) }}" alt="{{ $item->product->name }}">
                                                </a>
                                            </div>
                                            <div class="content-bottom">
                                                <div class="item-title">
                                                    <a href="{{ route("product", ["product"=>$item->product->id]) }}">{{ $item->product->name }}</a>
                                                </div>

                                                <div class="item-price">
                                                    ${{ $item->product->price }}
                                                </div>
                                                <div class="readmore">
                                                    <a href="{{ route("product", ["product"=>$item->product->id]) }}">View More</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach

                            </div>

                            @endforeach



                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

@endsection
