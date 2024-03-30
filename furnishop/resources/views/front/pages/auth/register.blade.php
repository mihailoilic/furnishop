@extends("front.layout")
@section("title", "Furnishop | Register")
@section("body_id","")
@section("body_class", "user-register blog")

@section("content")

    <div id="wrapper-site">
        <div class="container">
            <div class="row">
                <div id="content-wrapper" class="col-xs-12 col-sm-12 col-md-12 col-lg-12 onecol">
                    <div id="main">
                        <div id="content" class="page-content">
                            <p class="text-danger">{{ session("message") ?? "" }}</p>
                            <div class="register-form">
                                <h1 class="text-center title-page">Create Account</h1>
                                <form action="{{ route("register.store") }}" id="customer-form" class="js-customer-form" method="post">
                                    <div>
                                        <div class="form-group">
                                            <div>
                                                <input class="form-control" name="firstname" type="text" placeholder="First name">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div>
                                                <input class="form-control" name="lastname" type="text" placeholder="Last name">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div>
                                                <input class="form-control" name="email" type="email" placeholder="Email">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div>
                                                <div class="input-group js-parent-focus">
                                                    <input class="form-control js-child-focus js-visible-password" name="password" type="password" placeholder="Password">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="clearfix">
                                        <div class="text-center">
                                            <button class="btn btn-primary" data-link-action="sign-in" type="submit">
                                                Create Account
                                            </button>
                                        </div>
                                    </div>

                                    @csrf

                                    @if($errors->any())
                                        @foreach($errors->all() as $error)
                                            <p class="text-danger text-left">{{ $error }}</p>
                                        @endforeach
                                    @endif

                                </form>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
