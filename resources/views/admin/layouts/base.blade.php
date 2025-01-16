<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title') | {{ config('app.name') }}</title>
    {{-- Favicon --}}
    <link rel="shortcut icon" href="{{ asset('admin-assets/dist/img/bysaf-logo.png') }}" />
    {{-- Google Font: Source Sans Pro --}}
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    {{-- Font Awesome --}}
    <link rel="stylesheet" href="{{ asset('admin-assets/plugins/fontawesome-free/css/all.min.css') }}">
    {{-- Ionicons --}}
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    {{-- Tempusdominus Bootstrap 4 --}}
    <link rel="stylesheet"
        href="{{ asset('admin-assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
    {{-- iCheck --}}
    <link rel="stylesheet" href="{{ asset('admin-assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    {{-- JQVMap --}}
    <link rel="stylesheet" href="{{ asset('admin-assets/plugins/jqvmap/jqvmap.min.css') }}">
    {{-- Theme style --}}
    <link rel="stylesheet" href="{{ asset('admin-assets/dist/css/adminlte.min.css') }}">
    {{-- overlayScrollbars --}}
    <link rel="stylesheet" href="{{ asset('admin-assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    {{-- Daterange picker --}}
    <link rel="stylesheet" href="{{ asset('admin-assets/plugins/daterangepicker/daterangepicker.css') }}">
    {{-- summernote --}}
    <link rel="stylesheet" href="{{ asset('admin-assets/plugins/summernote/summernote-bs4.min.css') }}">

    {{-- SweetAlert2 --}}
    <link rel="stylesheet"
        href="{{ asset('admin-assets/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">

    {{-- Toastr --}}
    <link rel="stylesheet" href="{{ asset('admin-assets/plugins/toastr/toastr.min.css') }}">

    {{-- DataTables --}}
    <link rel="stylesheet" href="{{ asset('admin-assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('admin-assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('admin-assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
    @stack('style')
</head>

<body>
    <div class="wrapper">
        {{-- Preloader --}}
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="{{ asset('admin-assets/dist/img/bysaf-logo.png') }}" alt="Logo"
                height="300" width="300">
        </div>

        {{-- Nav --}}
        @include('admin.partials._nav')

        {{-- Aside --}}
        @include('admin.partials._aside')

        @yield('content')

        {{-- Footer --}}
        @include('admin.partials._footer')

        {{-- Control Sidebar --}}
        <aside class="control-sidebar control-sidebar-dark">
            {{-- Control sidebar content goes here --}}
        </aside>
    </div>

    {{-- jQuery --}}
    <script src="{{ asset('admin-assets/plugins/jquery/jquery.min.js') }}"></script>
    {{-- jQuery UI 1.11.4 --}}
    <script src="{{ asset('admin-assets/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
    {{-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip --}}
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    {{-- Bootstrap 4 --}}
    <script src="{{ asset('admin-assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    {{-- DataTables  & Plugins --}}
    <script src="{{ asset('admin-assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('admin-assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('admin-assets/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('admin-assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('admin-assets/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('admin-assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('admin-assets/plugins/jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('admin-assets/plugins/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('admin-assets/plugins/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ asset('admin-assets/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('admin-assets/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('admin-assets/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
    {{-- ChartJS --}}
    <script src="{{ asset('admin-assets/plugins/chart.js/Chart.min.js') }}"></script>
    {{-- Sparkline --}}
    <script src="{{ asset('admin-assets/plugins/sparklines/sparkline.js') }}"></script>
    {{-- JQVMap --}}
    <script src="{{ asset('admin-assets/plugins/jqvmap/jquery.vmap.min.js') }}"></script>
    <script src="{{ asset('admin-assets/plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
    {{-- jQuery Knob Chart --}}
    <script src="{{ asset('admin-assets/plugins/jquery-knob/jquery.knob.min.js') }}"></script>
    {{-- daterangepicker --}}
    <script src="{{ asset('admin-assets/plugins/moment/moment.min.js') }}"></script>
    <script src="{{ asset('admin-assets/plugins/daterangepicker/daterangepicker.js') }}"></script>
    {{-- Tempusdominus Bootstrap 4 --}}
    <script src="{{ asset('admin-assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}">
    </script>
    {{-- Summernote --}}
    <script src="{{ asset('admin-assets/plugins/summernote/summernote-bs4.min.js') }}"></script>

    <script>
        $(function() {
            $('.summernote').summernote()
        });
    </script>

    {{-- overlayScrollbars --}}
    <script src="{{ asset('admin-assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
    {{-- AdminLTE App --}}
    <script src="{{ asset('admin-assets/dist/js/adminlte.js') }}"></script>
    {{-- AdminLTE for demo purposes --}}
    <script src="{{ asset('admin-assets/dist/js/pages/dashboard.js') }}"></script>

    {{-- SweetAlert2 --}}
    <script src="{{ asset('admin-assets/plugins/sweetalert2/sweetalert2.all.min.js') }}"></script>

    {{-- Toastr --}}
    <script src="{{ asset('admin-assets/plugins/toastr/toastr.min.js') }}"></script>
    <script>
        @if (Session::has('message'))
            let type = "{{ Session::get('type', 'success') }}";
            switch (type) {

                case 'success':
                    toastr.success("{{ Session::get('message') }}")
                    break;

                case 'info':
                    toastr.info("{{ Session::get('message') }}")
                    break;

                case 'danger':
                    toastr.error("{{ Session::get('message') }}")
                    break;
            }
        @endif
    </script>

    {{-- Datatable plugins --}}
    <script>
        $(document).ready(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["excel", "pdf", "print", "colvis"],
                "language": {
                    "url": "{{ asset('admin-assets/plugins/datatables-lang/fr-FR.json') }}"
                },
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>
    @yield('scripts')
</body>

</html>
