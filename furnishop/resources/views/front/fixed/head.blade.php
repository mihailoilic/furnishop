<head>

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <script>
        const baseUrl = "{{ route("home") }}"
    </script>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <!-- Basic Page Needs -->

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield("title")</title>

    <meta name="keywords" content="Furniture, Decor, Interior">
    <meta name="description" content="Furnishop - Imagine the feeling of a home designed to fit your lifestyle and reflect your personality">
    <meta name="author" content="Mihailo Ilic">


    <!-- Mobile Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,500,600,700" rel="stylesheet">

    <!-- Vendor CSS -->
    <link rel="stylesheet" href=" {{ asset("libs/bootstrap/css/bootstrap.min.css") }} ">
    <link rel="stylesheet" href=" {{ asset("libs/font-awesome/css/font-awesome.min.css") }} ">
    <link rel="stylesheet" href=" {{ asset("libs/font-material/css/material-design-iconic-font.min.css") }} ">
    <link rel="stylesheet" href=" {{ asset("libs/nivo-slider/css/nivo-slider.css") }} ">
    <link rel="stylesheet" href=" {{ asset("libs/nivo-slider/css/animate.css") }} ">
    <link rel="stylesheet" href=" {{ asset("libs/nivo-slider/css/style.css") }} ">
    <link rel="stylesheet" href=" {{ asset("libs/owl-carousel/assets/owl.carousel.min.css") }} ">

    <!-- Template CSS -->
    <link rel="stylesheet" type="text/css" href=" {{ asset("css/style.css") }} ">
    <link rel="stylesheet" type="text/css" href=" {{ asset("css/reponsive.css") }} ">

    <!-- My CSS -->
    <link rel="stylesheet" type="text/css" href=" {{ asset("css/custom.css") }} ">



    <!-- Pixel Code for https://leadee.ai/leadflows/ -->
    <script async src="https://leadee.ai/leadflows/pixel/dqnvrfs2891uzco9k5vbfrjcpiinsc84"></script>
    <!-- END Pixel Code -->
</head>
