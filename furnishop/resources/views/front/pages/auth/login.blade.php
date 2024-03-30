@extends("front.layout")
@section("title", "Furnishop | Login")
@section("body_id","")
@section("body_class", "user-login blog")

@section("content")

    <!-- main -->
    <div id="wrapper-site" class="">
        <div id="content-wrapper" class="full-width">
            <div id="main">
                <div class="container">
                    <h1 class="text-center title-page">Sign In</h1>
                    <div class="login-form">
                        <p class="text-muted">{{ session("message") ?? "" }}</p>
                        <form id="customer-form" action="{{ route("login.auth") }}" method="post">
                            <div>
                                <div class="form-group no-gutters">
                                    <input class="form-control" name="email" type="email" placeholder="Email">
                                </div>
                                <div class="form-group no-gutters">

                                        <input class="form-control js-child-focus js-visible-password" name="password" type="password" value="" placeholder="Password">

                                </div>
                            </div>
                            <div>
                                <p class="text-danger">{{ session("error") ?? "" }}</p>
                                @if($errors->any())
                                    @foreach($errors->all() as $error)
                                        <p class="text-danger">{{ $error }}</p>
                                    @endforeach
                                @endif


                            </div>
                            <div class="clearfix">
                                <div class="text-center no-gutters">
                                    <input type="hidden" name="submitLogin" value="1">
                                    <button class="btn btn-primary" data-link-action="sign-in" type="submit">
                                        Sign in
                                    </button>
                                </div>
                            </div>
                            @csrf
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
