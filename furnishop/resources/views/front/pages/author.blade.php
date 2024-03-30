@extends("front.layout")
@section("title", "Furnishop | Author")
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
                                <a href="{{ route("author") }}">
                                    <span>About author</span>
                                </a>
                            </li>
                        </ol>
                    </div>
                </div>
            </nav>
            <div id="main">
                <div class="page-home">
                    <div class="container">
                    <div class="text-center">

                        <h1 class="text-center title-page mt-5">About Author</h1>
                    </div>

                        <section id="author-data" class="row container mx-auto justify-content-center align-items-center">
                            <div id="author-portrait" class="col-10 col-md-4 p-5 p-md-2 p-lg-5">
                                <img src="{{ asset("img/author-portrait.jpg") }}" class="img-fluid" alt="Author"/>
                            </div>
                            <div id="author-info" class="col-12 col-md-8 p-5">
                                <h4>Mihailo Ilić<small class="text-muted"> 41/19</small></h4>
                                <p>Hi. I'm a web developer from Serbia. I've recently started studying IT/Web programming at <a href="https://ict.edu.rs/" class="primary-color" target="_blank"><span class="fa fa-graduation-cap"></span> ICT College</a> because I've always been interested in computers and technology.</p>
                                <p>Although my skills are limited at this moment, I will continuously try to improve them through my studies, projects etc. You can check my recent projects and learn more about me by visiting my portfolio website.</p>
                                <a href="https://mihailoilic.github.io/portfolio" target="_blank" class="btn btn-primary border-0">Portfolio</a>
                                <a href="{{ asset("documentation.pdf") }}" target="_blank" class="btn btn-primary border-0">Documentation</a>
                            </div>
                        </section>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
