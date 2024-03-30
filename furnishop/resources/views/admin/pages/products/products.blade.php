@extends("admin.layout")
@section("title", "Furnishop | Admin Panel | Products")

@section("content")
    @if(session("message"))
        <div class="alert alert-{{ session("class") }}">
            <span>{{ session("message") }}</span>
        </div>
    @endif
    <h2 class="col-12"> Products </h2>
    <br>

    </div>
    <a href="{{ route("admin_product.create") }}" class="btn btn-success btn-fill">Add new</a>

    <div>

        <div class="col-12 mt-5">
            <div class="card">
                <div class="header">
                    <form action="{{ route("admin_product.index") }}" method="get">

                        <div class="pull-left">
                            Keywords:
                            <input type="text" class="form-control" name="keywords" value="{{ request("keywords") ?? "" }}"/>

                        </div>


                        <div class="pull-left ml-3">
                            Select category:
                            <select class="form-control" name="category">
                                <option value="">All</option>
                                @foreach($categories as $cat)
                                    <option value="{{ $cat->id }}"
                                            @if(request("category") == $cat->id) selected @endif>
                                        {{ $cat->name }}
                                    </option>

                                    @foreach($cat->subcategories as $sub)

                                        <option value="{{ $sub->id }}"
                                                @if(request("category") == $sub->id) selected @endif>
                                            &nbsp;&nbsp;&nbsp;&nbsp;{{ $sub->name }}
                                        </option>

                                    @endforeach

                                @endforeach

                            </select>

                        </div>

                        <div class="ml-3 pull-left">
                            Sort by:
                            <select class="form-control" name="sort">
                                <option value="created_at-desc"
                                        @if(request("sort") == "created_at-desc") selected @endif>Latest</option>
                                <option value="created_at-asc"
                                        @if(request("sort") == "created_at-asc") selected @endif>Oldest</option>
                                <option value="name-asc"
                                        @if(request("sort") == "name-asc") selected @endif>Name ASC</option>
                                <option value="name-desc"
                                        @if(request("sort") == "name-desc") selected @endif>Name DESC</option>
                                <option value="price-asc"
                                        @if(request("sort") == "price-asc") selected @endif>Price ASC</option>
                                <option value="price-desc"
                                        @if(request("sort") == "price-desc") selected @endif>Price DESC</option>
                            </select>
                        </div>

                        <div class="ml-3 pull-left">
                            <br>
                            <button type="submit" class="btn btn-info btn-fill">Go</button>
                        </div>
                    </form>

                </div>
                <div class="content table-responsive table-full-width">
                    <table class="table table-hover table-striped">
                        <thead>
                            <th>Created</th>
                            <th>ID</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Categories</th>
                            <th>Colors</th>
                            <th>Collection</th>
                            <th>View</th>
                            <th>Set <br>Inactive</th>
                            <th>Edit</th>
                        </thead>
                        <tbody>

                        @forelse($products as $item)

                            <tr>
                                <td>
                                    {{ date("Y-m-d", strtotime($item->created_at)) }}
                                </td>
                                <td>
                                    {{ $item->id }}
                                </td>
                                <td>
                                    <div class="product-image">
                                        <img src="{{ asset("img/product/".$item->images->get(0)->thumbnail_filename) }}" alt="{{ $item->name }}">
                                    </div>
                                </td>
                                <td>{{ $item->name }}</td>
                                <td>${{ $item->price }}</td>
                                <td>
                                    @foreach($item->categories as $cat)
                                        <span class="text-muted">{{$cat->mainCategory->name}}</span> - {{ $cat->name }}
                                        @if(!$loop->last) <br> @endif
                                    @endforeach
                                </td>
                                <td>
                                    @foreach($item->colors as $color)
                                        <span>{{$color->name}}</span>
                                        @if(!$loop->last) <br> @endif
                                    @endforeach
                                </td>
                                <td>
                                    @if($item->collection)
                                        {{ $item->collection->name }}
                                    @else
                                        <span class='text-muted'>None</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route("product", ["product" => $item->id]) }}" class="small-btn btn btn-success btn-fill" target="_blank">
                                        <i class="big pe-7s-look"></i>
                                    </a>
                                </td>
                                <td>
                                    <form action="{{ route("admin_product.destroy", ["admin_product"=>$item->id]) }}" method="post">

                                        <button type="sumbit" class="small-btn btn btn-danger btn-fill">
                                            <i class="big pe-7s-close"></i>
                                        </button>

                                        @method("DELETE")
                                        @csrf
                                    </form>
                                </td>
                                <td>
                                    <form action="{{ route("admin_product.edit", ["admin_product"=>$item->id]) }}" method="get">

                                        <button type="sumbit" class="small-btn btn btn-secondary btn-fill">
                                            <i class="big pe-7s-note"></i>
                                        </button>

                                    </form>
                                </td>
                            </tr>

                        @empty

                            <tr>
                                <td colspan="3">No products to show.</td>
                            </tr>

                        @endforelse

                        </tbody>
                    </table>



                </div>
            </div>

            <div>
                <span class="mx-3">Total: {{ $products->total() }}</span>

                <div class="mx-3">

                    {{ $products->links() }}

                </div>

            </div>

        </div>



@endsection
