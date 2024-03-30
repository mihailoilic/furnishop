@extends("admin.layout")
@section("title", "Furnishop | Admin Panel | Edit Lookbook Idea")

@section("content")

    <script>
        const baseUrl = "{{ route("home") }}";
    </script>

    @if(session("message"))
        <div class="alert alert-{{ session("class") }}">
            <span>{{ session("message") }}</span>
        </div>
    @endif

    <br>
    <br>

    <div class="col-12">
        <a href="{{ route("admin_lookbook.index") }}">< Back to Lookbook</a>
    </div>

    <br>

    <div class="card col-lg-8 col-xl-6">
        <div class="header">
            <h4 class="title">Edit Lookbook Idea</h4>
        </div>
        <div class="content">
            <form id="update-form" action="{{ route("admin_lookbook.update", ["admin_lookbook"=>$idea->id]) }}" method="post" >
                <div class="row">
                    <div id="idea-image" class="col-md-12">
                        <img class="img-responsive" src="{{ asset("img/lookbook/".$idea->image) }}" alt="{{ $idea->name }}">
                        <span class="pin-circle"></span>
                    </div>
                    <div>
                        <label>{{ $idea->name }}</label>
                    </div>
                </div>

                <div id="pins" class="row mt-5">


                    @foreach($idea->items as $item)

                        <div class="product-pin col-md-12 mt-5">

                            <input type="hidden" class="final-input" name="pins[]" value=""/>

                            <div>
                                <label>Left:</label>
                                <input type="number"  value="{{ $item->position_x }}" min="1" max="99" class="pos-x form-control">
                                <span class="text-muted h4">%</span>

                                <label class="ml-5">Top:</label>
                                <input type="number" value="{{ $item->position_y }}" min="1" max="99" class="pos-y form-control">
                                <span class="text-muted h4">%</span>


                                <label class="ml-5">product id:</label>
                                <input type="text" class="form-control product" value="{{ $item->product_id }}"/>
                            </div>
                            <div class="mt-3">
                                <a href="#!" class="check-pin btn btn-fill btn-info">Check coordinates</a>
                                <a href="#!" class="btn btn-fill btn-danger remove-pin ml-5">
                                    <i class="pe-7s-less"></i> Remove pin
                                </a>
                            </div>
                            <div class="mt-3">
                            </div>
                        </div>

                        @endforeach
                </div>

                <div class="row">

                    <div class="col-md-12 mt-5">
                        <a href="#!" class="add-pin">
                            <i class="pe-7s-plus"></i> Add product pin
                        </a>
                    </div>

                </div>

                <br>
                <button type="submit" class="btn btn-info btn-fill pull-left">Done</button>
                <div class="clearfix"></div>



                @csrf
                @method("PUT")


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
@section("page_script")
    <script src="{{ asset("admin-assets/js/lookbook.js") }}"></script>
@endsection
