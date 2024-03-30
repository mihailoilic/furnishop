@extends("admin.layout")
@section("title", "Furnishop | Admin Panel | Dashboard")

@section("content")

    @if(session("message"))
        <div class="alert alert-{{ session("class") }}">
            <span>{{ session("message") }}</span>
        </div>
    @endif


    <h3 class="col-12">Hello, {{ session()->get("user")->first_name }}! </h3>

    <form action="{{ route("admin.change_cat") }}" method="post">
        <div class="row mt-big featured-category">
            <div class="col-md-12 mt-5 card">
                <label class="my-3">Change featured category on homepage:</label>
                <select class="form-control" name="category">

                    @foreach($categories as $cat)

                        <option value="{{ $cat->id }}"
                                @if($featuredCategory == $cat->id) selected @endif>
                            {{ $cat->name }}
                        </option>

                    @endforeach

                </select>
                <button type="submit" class="btn btn-info btn-fill mt-3">Change</button>

            </div>
        </div>


        @csrf
        @method("PUT")

    </form>


    @if($errors->any())
        @foreach($errors->all() as $error)
            <p class="text-danger text-left">{{ $error }}</p>
        @endforeach
    @endif

    <div class="row mt-5 card stats">
        <h3 class="ml-3">Stats</h3>
        <div class="col-md-12">
            <label>Total products: </label> <span class="h5 ml-3">{{ $productCount }}</span> <br>
            <label>Total users: </label> <span class="h5 ml-3">{{ $userCount }}</span> <br>
            <label>Total items added to carts: </label> <span class="h5 ml-3">{{ $inCart }}</span>
        </div>
    </div>


@endsection
