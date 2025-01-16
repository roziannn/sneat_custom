<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default"
    data-assets-path="../assets/" data-template="vertical-menu-template-free">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Sneat Custom</title>

    <meta name="description" content="" />

    <link rel="icon" type="image/x-icon" href="../assets/img/favicon/favicon.ico" />

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet" />

    <link rel="stylesheet" href="../assets/vendor/fonts/boxicons.css" />

    <link rel="stylesheet" href="../assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="../assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="../assets/css/demo.css" />

    <link rel="stylesheet" href="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

    <link rel="stylesheet" href="../assets/vendor/libs/apex-charts/apex-charts.css" />

    <script src="../assets/vendor/js/helpers.js"></script>
    <script src="../assets/js/config.js"></script>

    <!-- DataTables-->
    <link rel="stylesheet" href="../assets/vendor/libs/datatables/css/dataTables.bootstrap5.css" />
    <link rel="stylesheet" href="../assets/vendor/libs/datatables/css/fixedColumns.bootstrap5.css" />

    <!-- select2 -->
    {{-- <link rel="stylesheet" href="../assets/vendor/libs/select2/css/select2.css" /> --}}
</head>

<body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            @include('partials.menu')

            <div class="layout-page">

                @include('partials.navbar')

                <!-- Content wrapper -->
                <div class="content-wrapper">
                    <!-- Content -->
                    @yield('content')
                    <!-- / Content -->

                    @include('partials.footer')
                    <div class="content-backdrop fade"></div>
                </div>
            </div>
        </div>

        <div class="layout-overlay layout-menu-toggle"></div>
    </div>

    @include('partials.scripts')

    <style>
        <style>.loading-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(255, 255, 255, 0.8);
            z-index: 9999;
            display: none;
            align-items: center;
            justify-content: center;
        }

        .loading-overlay .spinner-grow {
            width: 3rem;
            height: 3rem;
        }

        .loading-overlay .loading-text {
            font-size: 1.2rem;
            color: #333;
        }
    </style>
    </style>

</body>

</html>
