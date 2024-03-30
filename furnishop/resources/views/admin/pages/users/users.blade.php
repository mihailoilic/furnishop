@extends("admin.layout")
@section("title", "Furnishop | Admin Panel | Users")

@section("content")

    @if(session("message"))
        <div class="alert alert-{{ session("class") }}">
            <span>{{ session("message") }}</span>
        </div>
    @endif

    <br>
    <h2 class="col-12"> Users </h2>
    <br>

    <div class="col-12">
        <div class="card">
            <div class="header">
                <form action="{{ route("admin_user.index") }}" method="get">
                    <div class="pull-left">
                        Keywords:
                        <input type="text" class="form-control" name="keywords" value="{{ request("keywords") ?? "" }}"/>

                    </div>
                    <div class="ml-3 pull-left">
                        Sort by:
                        <select class="form-control" name="sort">
                            <option value="created_at-desc"
                                    @if(request("sort") == "created_at-desc") selected @endif>Latest</option>
                            <option value="created_at-asc"
                                    @if(request("sort") == "created_at-asc") selected @endif>Oldest</option>
                            <option value="email-asc"
                                    @if(request("sort") == "email-asc") selected @endif>Email ASC</option>
                            <option value="email-desc"
                                    @if(request("sort") == "email-desc") selected @endif>Email DESC</option>
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
                    <th>Email</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Delete</th>
                    <th>Edit</th>
                    </thead>
                    <tbody>

                    @forelse($users as $user)

                        <tr>
                            <td>{{ $user->created_at }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->first_name }}</td>
                            <td>{{ $user->last_name }}</td>
                            <td>
                                <form action="{{ route("admin_user.destroy", ["admin_user"=>$user->id]) }}" method="post">

                                    <button type="sumbit" class="small-btn btn btn-danger btn-fill">
                                        <i class="big pe-7s-close"></i>
                                    </button>

                                    @method("DELETE")
                                    @csrf
                                </form>
                            </td>
                            <td>
                                <form action="{{ route("admin_user.edit", ["admin_user"=>$user->id]) }}" method="get">

                                    <button type="sumbit" class="small-btn btn btn-secondary btn-fill">
                                        <i class="big pe-7s-id"></i>
                                    </button>

                                </form>
                            </td>
                        </tr>

                    @empty

                        <tr>
                            <td colspan="3">No users to show.</td>
                        </tr>

                    @endforelse

                    </tbody>
                </table>



            </div>
        </div>

        <div>
            <span class="mx-3">Total: {{ $users->total() }}</span>

            <div class="mx-3">

                {{ $users->links() }}

            </div>

        </div>

    </div>



@endsection
