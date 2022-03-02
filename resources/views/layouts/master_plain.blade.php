<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Kitchen Panel | Starter</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Theme style -->

    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">

    <link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">

    <link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">


</head>

<body>
    @yield('content')
</body>


<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('dist/js/adminlte.min.js') }}"></script>
<!-- Data Table -->
<script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
{{-- <script src="{{asset('plugins/datatables/jquery.dataTables.js') }}"></script> --}}
<script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>

<script src=" {{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js') }} "></script>
<script src=" {{ asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }} "></script>
<script src=" {{ asset('plugins/datatables-buttons/js/dataTables.buttons.min.js') }} "></script>
<script src=" {{ asset('plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }} "></script>
<script src="{{ asset('plugins/jszip/jszip.min.js') }}"></script>
<script src=" {{ asset('plugins/pdfmake/pdfmake.min.js') }} "></script>
<script src="{{ asset('plugins/pdfmake/vfs_fonts.js') }}"></script>
<script src=" {{ asset('plugins/datatables-buttons/js/buttons.html5.min.js') }} "></script>
<script src=" {{ asset('plugins/datatables-buttons/js/buttons.print.min.js') }} "></script>
<script src=" {{ asset('plugins/datatables-buttons/js/buttons.colVis.min.js') }} "></script>
