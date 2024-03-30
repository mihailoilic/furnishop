@extends("admin.layout")
@section("title", "Furnishop | Admin Panel | Create Lookbook Idea")

@section("content")

    <br>
    <br>

    <div class="col-12">
        <a href="{{ route("admin_lookbook.index") }}">< Back to Lookbook</a>
    </div>

    <br>

    <div class="card col-lg-8 col-xl-6">
        <div class="header">
            <h4 class="title">Create Lookbook Idea</h4>
        </div>
        <div class="content">
            <form action="{{ route("admin_lookbook.store") }}" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">

                            <label>Main category</label>
                            <select name="category" class="form-control">

                                @foreach($categories as $cat)

                                    <option value="{{ $cat->id }}"
                                    @if(old("category") == $cat->id) selected @endif>
                                        {{ $cat->name }}
                                    </option>

                                @endforeach

                            </select>

                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>idea name</label>
                            <input type="text" name="name" class="form-control" placeholder="Name" value="{{ old("name")}}">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Image</label>
                            <input type="file" name="image"  class="form-control">
                        </div>
                    </div>
                </div>

                <br>
                <button type="submit" class="btn btn-info btn-fill pull-left">Create</button>
                <div class="clearfix"></div>
                <p class="text-muted mt-3 small">In the next step you'll be offered to pin products</p>



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
