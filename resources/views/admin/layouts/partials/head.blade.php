<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Kleintbott</title>
    <link rel="shortcut icon" href="{{ adminVendors('logo/favicon-05.png') }}">


    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ adminVendors('feather/feather.css') }}">
    <link rel="stylesheet" href="{{ adminVendors('ti-icons/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ adminVendors('css/vendor.bundle.base.css') }}">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.dataTables.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="{{ adminVendors('datatables.net-bs4/dataTables.bootstrap4.css') }}">
    <link rel="stylesheet" href="{{ adminVendors('ti-icons/css/themify-icons.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ adminJs('select.dataTables.min.css') }}">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{ adminCss('vertical-layout-light/style.css') }}">
    <!-- endinject -->
    @yield('css')
    <style>
        th {
            text-transform: capitalize;
        }

        .table td img,
        .jsgrid .jsgrid-table td img {
            width: 100px;
            height: auto;
            border-radius: unset;
        }
        table button
        {
            border: none; background-color: transparent; cursor: pointer;
        }
    </style>
</head>
