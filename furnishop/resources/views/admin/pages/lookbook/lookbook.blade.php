@extends("admin.layout")
@section("title", "Furnishop | Admin Panel | Lookbook")

@section("content")
    @if(session("message"))
        <div class="alert alert-{{ session("class") }}">
            <span>{{ session("message") }}</span>
        </div>
    @endif
    <h2 class="col-12"> Lookbook </h2>
    <br>

    </div>
    <a href="{{ route("admin_lookbook.create") }}" class="btn btn-success btn-fill">Add new idea</a>

    <div>

        <div class="col-12 mt-5">
            <div class="card">
                <div class="header">
                    <form action="{{ route("admin_lookbook.index") }}" method="get">

                        <div class="pull-left ml-3">
                            Select category:
                            <select class="form-control" name="category">
                                <option value="">All</option>
                                @foreach($categories as $cat)

                                    <option value="{{ $cat->id }}"
                                            @if(request("category") == $cat->id) selected @endif>
                                        {{ $cat->name }}
                                    </option>

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
                        <th>Image</th>
                        <th>Name</th>
                        <th>Category</th>
                        <th>View</th>
                        <th>Remove</th>
                        <th>pinned <br>products</th>
                        </thead>
                        <tbody>

                        @forelse($lookbook as $item)

                            <tr>
                                <td>
                                    {{ $item->created_at }}
                                </td>
                                <td>
                                    <div class="product-image">
                                        <img src="{{ asset("img/lookbook/".$item->image) }}" alt="{{ $item->name }}">
                                    </div>
                                </td>
                                <td>{{ $item->name }}</td>
                                <td>
                                    {{ $item->category->name }}
                                </td>
                                <td>
                                    <a href="{{ route("lookbook.category", ["category" => $item->category_id])."#lookbook-idea-".$item->id }}" class="small-btn btn btn-success btn-fill" target="_blank">
                                        <i class="big pe-7s-look"></i>
                                    </a>
                                </td>
                                <td>
                                    <form action="{{ route("admin_lookbook.destroy", ["admin_lookbook"=>$item->id]) }}" method="post">

                                        <button type="sumbit" class="small-btn btn btn-danger btn-fill">
                                            <i class="big pe-7s-close"></i>
                                        </button>

                                        @method("DELETE")
                                        @csrf
                                    </form>
                                </td>
                                <td>
                                    <form action="{{ route("admin_lookbook.edit", ["admin_lookbook"=>$item->id]) }}" method="get">

                                        <button type="sumbit" class="small-btn btn btn-secondary btn-fill">
                                            <i class="big pe-7s-photo-gallery"></i>
                                        </button>

                                    </form>
                                </td>
                            </tr>

                        @empty

                            <tr>
                                <td colspan="3">No items to show.</td>
                            </tr>

                        @endforelse

                        </tbody>
                    </table>



                </div>
            </div>

            <div>
                <span class="mx-3">Total: {{ $lookbook->total() }}</span>

                <div class="mx-3">

                    {{ $lookbook->links() }}

                </div>

            </div>

        </div>



@endsection
