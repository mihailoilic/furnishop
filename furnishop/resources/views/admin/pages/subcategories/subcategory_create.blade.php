@extends("admin.layout")
@section("title", "Furnishop | Admin Panel | Create Subcategory")

@section("content")

    <br>
    <br>

    <div class="col-12">
        <a href="{{ route("admin_subcategory.index") }}">< Back to Subcategories</a>
    </div>

    <br>

    <div class="card col-lg-8 col-xl-6">
        <div class="header">
            <h4 class="title">Create Subcategory</h4>
        </div>
        <div class="content">
            <form action="{{ route("admin_subcategory.store") }}" method="post">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">

                            <label>Main category</label>
                            <select name="main" class="form-control">

                                @foreach($mainCategories as $cat)

                                    <option value="{{ $cat->id }}">
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
                            <label>Subcategory name</label>
                            <input type="text" name="name" class="form-control" placeholder="Name" value="{{ session("name") ?? "" }}">
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
