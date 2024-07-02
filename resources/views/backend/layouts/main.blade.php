<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Dashboard - Sistem Pemesanan Tiket Wahana Wisata Bukik Cinangkiak</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    @include('backend.layouts.css')

    @include('api.api')
</head>

<body>

    <!-- ======= Header ======= -->
    @include('backend.layouts.header')
    <!-- End Header -->

    <!-- ======= Sidebar ======= -->
    @include('backend.layouts.sidebar')
    <!-- End Sidebar-->

    <!-- ======= Main ======= -->
    <main id="main" class="main">
        @yield('contents')
    </main>
    <!-- End Main -->

    <!-- ======= Footer ======= -->
    @include('backend.layouts.footer')
    <!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    @include('backend.layouts.js')

</body>

</html>
