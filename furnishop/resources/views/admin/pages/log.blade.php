@extends("admin.layout")
@section("title", "Furnishop | Admin Panel | Logs")

@section("content")
    <h2 class="col-12"> Logs </h2>
    <br>

    <div class="col-12">
        <div class="card">
            <div class="header">
                <form action="{{ route("admin.log") }}" method="get">
                    <div class="pull-left">
                        Select category:
                        <select class="form-control" name="category">

                            <option value="">All categories</option>
                            @foreach($logCategories as $cat)
                                <option value="{{$cat->id}}"
                                @if(request("category") == $cat->id) selected @endif>{{ $cat->name }}</option>
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
                            <option value="message-asc"
                            @if(request("sort") == "message-asc") selected @endif>Message ASC</option>
                            <option value="message-desc"
                            @if(request("sort") == "message-desc") selected @endif>Message DESC</option>
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
                    <th>IP adress</th>
                    <th>Category</th>
                    <th>Message</th>
                    </thead>
                    <tbody>

                    @forelse($log as $item)

                    <tr>
                        <td>{{ $item->created_at }}</td>
                        <td>{{ $item->ip }}</td>
                        <td>{{ $item->category->name }}</td>
                        <td>{{ $item->message }}</td>
                    </tr>

                    @empty

                    <tr>
                        <td colspan="3">No log items to show.</td>
                    </tr>

                    @endforelse

                    </tbody>
                </table>



            </div>
        </div>

        <div>
            <span class="mx-3">Total: {{ $log->total() }}</span>

            <div class="mx-3">

                {{ $log->links() }}

            </div>

        </div>

    </div>



@endsection
