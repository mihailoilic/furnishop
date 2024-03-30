@extends("admin.layout")
@section("title", "Furnishop | Admin Panel | Create Collection/Color")

@section("content")

    <br>
    <br>

    <div class="col-12">
        <a href="{{ route("admin_collection_color.index") }}">< Back to Collections & Colors</a>
    </div>

    <br>

    <div class="card col-lg-8 col-xl-6">
        <div class="header">
            <h4 class="title">Create Collection/Color</h4>
        </div>
        <div class="content">
            <form action="{{ route("admin_collection_color.store") }}" method="post">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">

                            <label>Select</label>
                            <select name="table" class="form-control">
                                <option value="collections" @if(old("table") ==  "collections") selected @endif >Collection</option>
                                <option value="colors" @if(old("table") ==  "colors") selected @endif >Color</option>
                            </select>

                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control" placeholder="Name" value="{{ old("name") ?? "" }}">
                        </div>
                    </div>
                </div>
                <br>
                <button type="submit" class="btn btn-info btn-fill pull-left">Create</button>
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
