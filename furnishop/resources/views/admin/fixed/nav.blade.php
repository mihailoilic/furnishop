<nav class="navbar navbar-default navbar-fixed">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{ route("home") }}"><i class="pe-7s-angle-left"></i> Back to front</a>
        </div>
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-left">

            </ul>

            <ul class="nav navbar-nav navbar-right">
                <li>
                    <a href="{{ route("logout") }}">
                        Sign out
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
