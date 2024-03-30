@extends("admin.layout")
@section("title", "Furnishop | Admin Panel | Edit User")

@section("content")

    <br>
    <br>

    <div class="col-12">
        <a href="{{ route("admin_user.index") }}">< Back to Users</a>
    </div>

    <br>

    <div class="card col-lg-8 col-xl-6">
        <div class="header">
            <h4 class="title">Edit User</h4>
        </div>
        <div class="content">
            <form action="{{ route("admin_user.update", ["admin_user"=>$user->id]) }}" method="post">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email address</label>
                            <input type="email" name="email" class="form-control" placeholder="Email" value="{{ $user->email }}">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>First Name</label>
                            <input type="text" name="first" class="form-control" placeholder="Company" value="{{ $user->first_name }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Last Name</label>
                            <input type="text" name="last" class="form-control" placeholder="Last Name" value="{{ $user->last_name }}">
                        </div>
                    </div>
                </div>
                <br>
                <button type="submit" class="btn btn-info btn-fill pull-left">Update Profile</button>
                <div class="clearfix"></div>

                <input type="hidden" name="id" value="{{ $user->id }}">
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
