@include("front.fixed.ie")

<html lang="zxx">
@include("front.fixed.head")
<body id="@yield("body_id")" class="@yield("body_class")">

    @include("front.fixed.floating.loading")
    @include("front.fixed.floating.top")

    @include("front.fixed.header")

    <div class="main-content">
        @yield("content")
    </div>

    @include("front.fixed.floating.menus")
    @include("front.fixed.footer")
    @include("front.fixed.scripts")

</body>
</html>

