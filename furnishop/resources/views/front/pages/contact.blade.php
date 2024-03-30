@extends("front.layout")
@section("title", "Furnishop | Contact")
@section("body_id","contact")
@section("body_class", "blog")

@section("content")

    <div id="wrapper-site">
        <div id="content-wrapper">

            <!-- breadcrumb -->
            <nav class="breadcrumb-bg">
                <div class="container no-index">
                    <div class="breadcrumb">
                        <ol>
                            <li>
                                <a href="{{ route("home") }}">
                                    <span>Home</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route("contact") }}">
                                    <span>Contact</span>
                                </a>
                            </li>
                        </ol>
                    </div>
                </div>
            </nav>
            <div id="main">
                <div class="page-home">
                    <div class="container">

                        @if(session("msg"))
                            <p class="alert alert-{{session("class")}}">{{ session("msg") }}</p>
                        @endif

                        <h1 class="text-center title-page mt-5">Contact Us</h1>
                        <div class="row-inhert">

                            <div class="input-contact">



                                <p class="icon text-center">
                                    <img src="{{ asset("img/other/contact_mess.png") }}" alt="contact">
                                </p>

                                <div class="d-flex justify-content-center mt-5">
                                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                        <div class="contact-form">
                                            <form id="contact-form" action="{{ route("contact.send") }}" method="post">
                                                <div class="form-fields">
                                                    <div class="form-group row">
                                                        <div class="col-md-6">
                                                            <input class="form-control" name="name" placeholder="Your name">
                                                        </div>
                                                        <div class="col-md-6 margin-bottom-mobie">
                                                            <input class="form-control" name="email" type="email" value="" placeholder="Your email">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col-md-12 margin-bottom-mobie">
                                                            <input class="form-control" name="subject" type="text" value="" placeholder="Subject">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col-md-12">
                                                            <textarea class="form-control" name="message" placeholder="Message" rows="8"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div>
                                                    <button class="btn" type="submit" name="submitMessage">
                                                        <img class="img-fl" src="{{ asset("img/other/contact_email.png") }}" alt="send">Send message
                                                    </button>
                                                </div>

                                                @csrf

                                            </form>
                                        </div>
                                        <div class="mt-4">

                                            @if($errors->any())
                                                @foreach($errors->all() as $error)
                                                    <p class="text-danger">{{ $error }}</p>
                                                @endforeach
                                            @endif

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
