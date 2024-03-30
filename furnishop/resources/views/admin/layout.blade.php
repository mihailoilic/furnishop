<!doctype html>
<html lang="en">

@include("admin.fixed.head")

<body>

@include("admin.fixed.sidebar")

<div class="wrapper">
    <div class="main-panel">

        @include("admin.fixed.nav")

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    @yield("content")
                </div>
            </div>
        </div>

        @include("admin.fixed.footer")

    </div>
</div>

@include("admin.fixed.scripts")

</body>
</html>
