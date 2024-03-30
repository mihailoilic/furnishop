@extends("admin.layout")
@section("title", "Furnishop | Admin Panel | Create Product")

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
            <h4 class="title">Create Product</h4>
        </div>
        <div class="content">
            <form action="{{ route("admin_product.store") }}" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">

                            <label>subcategories</label>
                            <div id="subcategories" data-categories="{{ $categories }}" data-selected="{{ implode(",", old("subcategories") ?? []) }}">
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
                            <input type="text" name="name" class="form-control" placeholder="Name" value="{{ old("name") }}">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <p>Colors</p>
                            <div id="colors" class="d-flex flex-wrap">
                                @foreach($colors as $color)
                                    <div class="mx-3">
                                    <input type="checkbox" id="color-{{ $color->id }}" name="colors[]" value="{{ $color->id }}" @if(in_array($color->id, old("colors") ?? [])) checked @endif
                                    > <label class="text-black" for="color-{{$color->id}}">{{ $color->name }}</label>
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
                                    @if($coll->id == old("collection")) selected @endif >
                                        {{ $coll->name }}</option>
                                @endforeach
                            </select>

                        </div>
                        <div class="form-group">
                            <label>Price</label>
                            <input type="number"  class="form-control" min="0" name="price" placeholder="Price" value="{{ old("price") }}">

                        </div>

                    </div>

                </div>

                <div class="row">
                    <div class="col-md-12">
                        <label>Description</label>
                        <textarea class="form-control" placeholder="Description" name="description">{{ old("description") }}</textarea>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <label >Images (Min. 1)</label>
                        <div>
                            <input type="file" id="first-file" name="images[]">
                        </div>
                        <div id="js-images" class="my-3">
                        </div>
                        <a href="#!" id="add-image"><i class="pe-7s-plus"></i> Add image</a>
                    </div>
                </div>


                <br>
                <br>
                <button type="submit" class="btn btn-info btn-fill pull-left mt-3">Create</button>
                <div class="clearfix"></div>



                @csrf


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
