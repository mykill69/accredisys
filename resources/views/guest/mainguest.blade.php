<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CPSU | Online AccrediSys</title>
    <link rel="stylesheet" href="{{ asset('template/plugins/toastr/toastr.min.css') }}">
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="{{ asset('template/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('template/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('template/dist/css/adminlte.min.css') }}">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('template/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('template/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('template/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('template/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('template/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
    <!-- Logo  -->
    <link rel="shortcut icon" type="" href="{{ asset('template/img/CPSU_L.png') }}">
</head>

<style>
    .nav-link.active {
        font-weight: bold;
        color: #fff !important;
        /* Bootstrap success color */
        border-bottom: 3px solid #fff;
        /* green underline */
    }

    .nav-link:hover {
        border-bottom: 3px solid #fff;
        /* light green hover effect */
        color: #ffffff !important;

    }

    .small-footer {
        padding: 5px 10px !important;
        font-size: 13px;
        background-color: #f9f9f9;
        /* optional: lighten the footer */
        color: #555;
    }

    .nav-link.active {
        font-size: 14px;
    }

    a {
        color: #fff;
    }

    .logo:hover {
        text-decoration: none;
        color: #fff;
    }
</style>

<body class="hold-transition sidebar-collapse layout-footer-fixed">
    <div class="wrapper">
        <div class="col-12 col-sm-12">
            <div class="card" style="background-color: #14743F">
                <div class="card-header p-0 pt-1">
                    <div class="row justify-content-center">
                        <div class="col-12 col-md-11">
                            {{-- <ul class="nav flex-column flex-md-row align-items-start align-items-md-center justify-content-between"
                                id="custom-links-list">
                                <div class="d-flex align-items-center">
                                    <li class="px-3">
                                        <a href="{{ route('home') }}" class="d-flex align-items-center logo">
                                            <img src="{{ asset('template/img/CPSU_L.png') }}" alt="Logo"
                                                style="height:32px; width:auto;">
                                            <span class="ml-2">CPSU Online AccrediSys</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link {{ request()->is('/') ? 'active' : '' }}"
                                            href="{{ route('home') }}">
                                            <i class="fas fa-home"></i> Home
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link {{ request()->routeIs('programSettings') ? 'active' : '' }}"
                                            href="{{ route('programSettings') }}">
                                            <i class="fas fa-book-open"></i> Programs
                                        </a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link {{ request()->is('manageContent') ? 'active' : '' }}"
                                            href="{{ url('/manageContent') }}">
                                            <i class="fas fa-edit"></i> Manage Content
                                        </a>
                                    </li>
                                    {{-- <li class="nav-item">
                                        <a class="nav-link {{ request()->is('folders') ? 'active' : '' }}"
                                            href="{{ url('/folders') }}">
                                            <i class="fas fa-folder"></i> Folders
                                        </a>
                                    </li> 
                                </ul>--}}
                                    
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <div class="content-wrapper" style="padding-top: 14px; margin-top:-1%; height:auto;">
            @yield('body') <!-- This will display the content from index.blade.php -->
        </div>
        <!-- Main footer -->
        <footer class="main-footer small-footer">
            <strong>Maintained and Managed by MIS.</strong> All rights reserved.
        </footer>
        <aside class="control-sidebar control-sidebar-dark">
        </aside>
    </div>
    <script src="{{ asset('template/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('template/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('template/dist/js/adminlte.min.js') }}"></script>
    <!-- Toastr -->
    <script src="{{ asset('template/plugins/toastr/toastr.min.js') }}"></script>
    <!-- DataTables  & Plugins -->
    <script src="{{ asset('template/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('template/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('template/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('template/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('template/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('template/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('template/plugins/jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('template/plugins/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('template/plugins/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ asset('template/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('template/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('template/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
    <!-- Select2 -->
    <script src="{{ asset('template/plugins/select2/js/select2.full.min.js') }}"></script>
    <!-- SweetAlert2 -->
    <script src="{{ asset('template/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
    <script>
        @if (Session::has('error'))
            toastr.options = {
                "closeButton": true,
                "progressBar": true,
                'positionClass': 'toast-bottom-right'
            }
            toastr.error("{{ session('error') }}")
        @endif

        @if (Session::has('error1'))
            toastr.options = {
                "closeButton": true,
                "progressBar": true,
                'positionClass': 'toast-bottom-center'
            }
            toastr.error("{{ session('error1') }}")
        @endif
        @if (Session::has('success'))
            toastr.options = {
                "closeButton": true,
                "progressBar": true,
                'positionClass': 'toast-bottom-right'
            }
            toastr.success("{{ session('success') }}")
        @endif
        @if ($errors->any())
            var errorMessage = "";
            @foreach ($errors->all() as $error)
                errorMessage += "{{ $error }}" + "<br>";
            @endforeach
            toastr.options = {
                "closeButton": true,
                "progressBar": true,
                "positionClass": "toast-bottom-right"
            };
            toastr.error(errorMessage);
        @endif
    </script>
    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": false,
                "lengthChange": true,
                "autoWidth": true,
                //"buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
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
</body>

</html>
