@extends("admin.layout")
@section("title", "Furnishop | Admin Panel | Edit Product")

@section("content")

    @if(session("message"))
        <div class="alert alert-{{ session("class") }}">
            <span>{{ session("message") }}</span>
        </div>
    @endif
    <br>
    <br>

    <div class="col-12">
        <a href="{{ route("admin_product.index") }}">< Back to Products</a>
    </div>

    <br>

    <div class="card col-lg-8 col-xl-6">
        <div class="header">
            <h4 class="title">Edit Product</h4>
        </div>
        <div class="content">
            <form action="{{ route("admin_product.update", ["admin_product"=>$product->id]) }}" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">

                            <label>subcategories</label>
                            <div id="subcategories" data-categories="{{ $categories }}"
                                 data-selected="{{ old("subcategories") ? implode(",", old("subcategories")) : implode(",", $product->categories->map(function($item){return $item->id;})->toArray()) }}">
                            </div>
                            <br>
                            <a href="#!"  id="add-subcat">
                                <i class="pe-7s-plus"></i> Add subcategory
                            </a>

                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control" placeholder="Name" value="{{ old("name") ?? $product->name }}">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <p>Colors</p>
                            <div class="d-flex flex-wrap">
                                @foreach($colors as $color)
                                    <div class="mx-3">

                                        <input type="checkbox" id="color-{{ $color->id }}" name="colors[]" value="{{ $color->id }}"
                                        @if(old("colors") ? in_array($color->id, old("colors")) : in_array($color->id, $product->colors->map(function($item){return $item->id;})->toArray())) checked @endif>
                                        <label class="text-black" for="color-{{$color->id}}">{{ $color->name }}</label>
                                    </div>
                                @endforeach
                            </div>


                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Collection</label>
                            <select name="collection" class="form-control">
                                <option value="">None</option>
                                @foreach($collections  as $coll)
                                    <option value="{{ $coll->id }}"
                                    @if(old("collection") ? old("collection") == $coll->id : ($product->collection ? $product->collection->id : "") == $coll->id) selected @endif>{{ $coll->name }}</option>
                                @endforeach
                            </select>

                        </div>
                        <div class="form-group">
                            <label>Price</label>
                            <input type="number"  class="form-control" min="0" name="price" value="{{ old("price") ?? $product->price }}">

                        </div>

                    </div>

                </div>

                <div class="row">
                    <div class="col-md-12">
                        <label>Description</label>
                        <textarea class="form-control" name="description" >{{ old("description") ?? $product->description }}</textarea>
                    </div>
                </div>
                <div class="row mt-5">
                    <input type="checkbox" id="change_images" name="change_images"/> <label for="change_images">Replace images</label> <br>
                </div>

                <div id="images-wrapper" class="row mt-5 d-none">
                    <div class="col-md-12">
                        <label >Images (Min. 1)</label>
                        <div>
                            <input type="file" name="images[]">
                        </div>
                        <div id="js-images" class="my-3">
                        </div>
                        <a href="#!" id="add-image"><i class="pe-7s-plus"></i> Add image</a>
                    </div>
                </div>


                <br>
                <br>
                <button type="submit" class="btn btn-info btn-fill pull-left mt-3">Done</button>
                <div class="clearfix"></div>



                @csrf
                @method("PUT")


            </form>
            <br>
        </div>
    </div>
    <div class="offset-lg-4 offset-xl-6"></div>

    <div class="col-md-12">
        @if($errors->any())
            @foreach($errors->all() as $error)
                <p class="text-danger text-left">{{ $error }}</p>
            @endforeach
        @endif
    </div>



@endsection

@section("page_script")
    <script src="{{ asset("admin-assets/js/product.js") }}"></script>
@endsection
