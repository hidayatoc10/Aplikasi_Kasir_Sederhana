<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- Link Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    {{-- Icon Bootstrap --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    {{-- link Library/Animasi --}}
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/dist/css/adminlte.min.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    {{-- <script src="../assets/plugins/alert.js"></script> --}}
    @foreach ($data2 as $row)
        <link rel="icon" href="{{ asset('storage/' . $row->image) }}">
</head>

<body class="hold-transition sidebar-mini">
    {{-- Navbar --}}
    <title>Website Kasir | {{ auth()->user()->nama_lengkap }}</title>

    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-blue navbar-light">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#">
                        <i class="bi bi-list"
                            style="font-size: 28px; color: white;  display: flex;
  align-items: center;
  justify-content: center;"></i>
                    </a>
                </li>

            </ul>
            <ul class="navbar-nav ml-auto">

                <li class="nav-item d-none d-sm-inline-block">
                    <a href="/dashboard_admin" class="nav-link">
                        <font color="white">
                            <b>
                                {{ $row->nama_sekolah }}
                            </b>

                        </font>
                    </a>
                </li>
            </ul>

        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="/dashboard_admin" class="brand-link">
                <img src="{{ asset('storage/' . $row->image) }}" alt="AdminLTE Logo" class="brand-image"
                    style="opacity: .8">


                <span class="brand-text">Website Kasir</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user (optional) -->
                <div class="user-panel mt-2 pb-2 mb-2 d-flex">
                    <div class="image">
                        <img src="{{ asset('storage/' . auth()->user()->image) }}" class="img-circle elevation-1"
                            alt="User Image">
                    </div>
                    <div class="info">
                        <a href="/dashboard_admin" class="d-block">
                            {{ auth()->user()->nama_lengkap }}
                        </a>
                        <span class="badge badge-success">
                            {{ auth()->user()->keterangan }}
                        </span>
                    </div>
                </div>
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">

                        <li class="nav-header ml-2">Home</li>
                        <li class="nav-item">
                            <a href="/dashboard_admin" class="nav-link">
                                <i class="bi bi-speedometer"></i>
                                <p>
                                    Dashboard
                                </p>
                            </a>
                        </li>


                        <li class="nav-item">
                            <a href="/petugas/data_produk_petugas" class="nav-link">
                                <i class="bi bi-box-seam-fill"></i>
                                <p>
                                    Data Produk
                                </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="/petugas/produk_masuk" class="nav-link">
                                <i class="bi bi-basket-fill"></i>
                                <p>
                                    Produk Masuk
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/petugas/laporan_penjualan" class="nav-link">
                                <i class="bi bi-calendar-plus-fill"></i>
                                <p>
                                    Laporan Penjualan
                                </p>
                            </a>
                        </li>

                        <li class="nav-header">Setting</li>
                        <li class="nav-item">
                            <a href="/petugas/akun_petugas" class="nav-link">
                                <i class="bi bi-person-circle"></i>
                                <p>
                                    Akun Saya
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a onclick="return confirm('Apakah anda yakin akan keluar ?')" href="/logout_petugas"
                                class="nav-link">
                                <i class="bi bi-dash-circle" style="color: red;"></i>
                                <p style="margin-left: 5px;">
                                    Logout
                                </p>
                            </a>
                        </li>

                </nav>
            </div>
        </aside>
        {{-- End Navbar --}}

        <div class="ml-4 mr-4">
            @yield('container')
        </div>


        <footer class="main-footer" id="printBtn">
            maa <div class="float-right d-none d-sm-block">
                <strong> {{ $row->nama_sekolah }}</strong>
                </a>
            </div>
            <b>Created {{ $row->tahun_ajaran }}</b>
        </footer>
        <aside class="control-sidebar control-sidebar-dark">
        </aside>
    </div>
    @endforeach
    <aside class="control-sidebar control-sidebar-dark">
    </aside>
    </div>

    {{-- javascript --}}

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script src="../assets/plugins/jquery/jquery.min.js"></script>
    <script src="../assets/plugins/datatables/jquery.dataTables.js"></script>
    <script src="../assets/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
    <script src="../assets/dist/js/adminlte.min.js"></script>

    <script>
        $(function() {
            $("#example1").DataTable();
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
            });
        });
    </script>

    <script>
        $(function() {
            $('.select2').select2()
            $('.select2bs4').select2({
                theme: 'bootstrap4'
            })
        })
    </script>
    <script>
        AOS.init();
    </script>
</body>

</html>
