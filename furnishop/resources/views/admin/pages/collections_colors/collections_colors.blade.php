@extends("admin.layout")
@section("title", "Furnishop | Admin Panel | Collections & Colors")

@section("content")

    @if(session("message"))
        <div class="alert alert-{{ session("class") }}">
            <span>{{ session("message") }}</span>
        </div>
    @endif

    <h2 class="col-12"> Collections & Colors </h2>
    <br>

    <a href="{{ route("admin_collection_color.create") }}" class="btn btn-success btn-fill">Add new</a>

    <div class="col-12 mt-5">
        <div class="card">
            <div class="header">
                <form action="{{ route("admin_collection_color.index") }}" method="get">
                    <div class="pull-left">
                        Select:
                        <select class="form-control" name="show">
                            <option value="collection"
                            @if(request("show") == "collection") selected @endif>Collections</option>
                            <option value="colors"
                            @if(request("show") == "colors") selected @endif>Colors</option>
                        </select>

                    </div>
                    <div class="ml-3 pull-left">
                        Sort by:
                        <select class="form-control" name="sort">
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
                    <th>Name</th>
                    <th>Delete</th>
                    </thead>
                    <tbody>

                    @forelse($items as $item)

                        <tr>
                            <td>{{ $item->name }}</td>
                            <td>
                                <form action="{{ route("admin_collection_color.destroy", ["admin_collection_color"=>$item->id]) }}" method="post">

                                    <input type="hidden" name="table" value="{{ $show }}"/>

                                    <button type="sumbit" class="small-btn btn btn-danger btn-fill">
                                        <i class="big pe-7s-close"></i>
                                    </button>

                                    @method("DELETE")
                                    @csrf
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
            <span class="mx-3">Total: {{ $items->total() }}</span>

            <div class="mx-3">

                {{ $items->links() }}

            </div>

        </div>

    </div>



@endsection
