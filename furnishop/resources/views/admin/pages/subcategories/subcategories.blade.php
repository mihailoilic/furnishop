@extends("admin.layout")
@section("title", "Furnishop | Admin Panel | Subcategories")

@section("content")
    @if(session("message"))
        <div class="alert alert-{{ session("class") }}">
            <span>{{ session("message") }}</span>
        </div>
    @endif
    <h2 class="col-12"> Subcategories </h2>
    <br>

    </div>
        <a href="{{ route("admin_subcategory.create") }}" class="btn btn-success btn-fill">Add new</a>

    <div>

    <div class="col-12 mt-5">
        <div class="card">
            <div class="header">
                <form action="{{ route("admin_subcategory.index") }}" method="get">

                    <div class="pull-left">
                        Keywords:
                        <input type="text" class="form-control" name="keywords" value="{{ request("keywords") ?? "" }}"/>

                    </div>


                    <div class="pull-left ml-3">
                        Select main category:
                        <select class="form-control" name="main-category">
                            <option value="">All</option>
                            @foreach($mainCategories as $cat)
                                <option value="{{ $cat->id }}"
                                @if(request("main-category") == $cat->id) selected @endif>
                                    {{ $cat->name }}
                                </option>
                            @endforeach

                        </select>

                    </div>

                    <div class="ml-3 pull-left">
                        Sort by:
                        <select class="form-control" name="sort">
                            <option value="name-asc"
                                    @if(request("sort") == "name-asc") selected @endif>Name ASC</option>
                            <option value="name-desc"
                                    @if(request("sort") == "name-desc") selected @endif>Name DESC</option>
                            <option value="created_at-desc"
                                    @if(request("sort") == "created_at-desc") selected @endif>Latest</option>
                            <option value="created_at-asc"
                                    @if(request("sort") == "created_at-asc") selected @endif>Oldest</option>
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
                    <th>Main Category</th>
                    <th>Delete</th>
                    </thead>
                    <tbody>

                    @forelse($subcategories as $item)

                        <tr>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->mainCategory->name }}</td>
                            <td>
                                <form action="{{ route("admin_subcategory.destroy", ["admin_subcategory"=>$item->id]) }}" method="post">

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
                            <td colspan="3">No categories to show.</td>
                        </tr>

                    @endforelse

                    </tbody>
                </table>



            </div>
        </div>

        <div>
            <span class="mx-3">Total: {{ $subcategories->total() }}</span>

            <div class="mx-3">

                {{ $subcategories->links() }}

            </div>

        </div>

    </div>



@endsection
