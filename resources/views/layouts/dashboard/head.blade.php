
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0,minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title','ثلاجة جبنة')</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('asset/images/favicon.ico') }}">

    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;500;600;700;800;900;1000&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="{{ asset('asset/vendors/css/vendors-rtl.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('asset/vendors/css/extensions/sweetalert2.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('asset/vendors/css/extensions/toastr.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('asset/vendors/css/forms/select/select2.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('asset/css-rtl/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('asset/css-rtl/bootstrap-extended.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('asset/css-rtl/colors.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('asset/css-rtl/components.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('asset/css-rtl/themes/dark-layout.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('asset/css-rtl/themes/semi-dark-layout.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('asset/css-rtl/core/menu/menu-types/vertical-menu.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/custom-rtl.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/cust.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/pickers/flatpickr/flatpickr.min.css') }}">


    @stack('csslive')
    <style>
        .navigation .navigation-header,
        .navigation,
        .header-navbar,
        body {
            font-family: 'Cairo', 'sans-serif' !important;
        }
    </style>
</head>
