@extends('./index')

@section('body')
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Blank</title>

    <!-- Custom fonts for this template-->
    <link href="{{asset('vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{asset('css/sb-admin-2.min.css')}}" rel="stylesheet">

</head>


<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="">
                <div class="sidebar-brand-icon rotate-n-15">
                    <em class="fas fa-laugh-wink"></em>
                </div>
                <div class="sidebar-brand-text mx-3">Admin</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item {{ Request::is('admin/property') || Request::is('admin/property/*') ? 'active' : ''}}">
                <a class="nav-link" href="{{url('/admin/property')}}">
                    <em class="fas fa-fw fa-home"></em>
                    <span>Properti</span></a>
            </li>
            @if ( Auth::user()->role == 3)
            <li class="nav-item {{ Request::is('admin/user') || Request::is('admin/user/*') ? 'active' : ''}}">
                <a class="nav-link" href="{{url('/admin/user')}}">
                    <em class="fas fa-fw fa-user"></em>
                    <span>User</span></a>
            </li>
            @endif
            <li class="nav-item {{ Request::is('admin/area') || Request::is('admin/area/*') ? 'active' : ''}}">
                <a class="nav-link" href="{{route('pageArea')}}">
                    <em class="fas fa-fw fa-directions"></em>
                    <span>Properti Wilayah</span></a>
            </li>
            <li class="nav-item {{ Request::is('admin/order') || Request::is('admin/order/*') ? 'active' : ''}}">
                <a class="nav-link" href="{{url('/admin/order')}}">
                    <em class="fas fa-fw fa-shopping-cart"></em>
                    <span>Pesanan</span></a>
            </li>
            <li class="nav-item">
                <form action="{{url('/logout')}}" method="POST">
                    @csrf
                    <button type="submit" class="nav-link btn-logout">
                        <em class="fas fa-fw fa-sign-out-alt"></em>
                        <span>Keluar</span>
                    </button>
                </form>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <em class="fa fa-bars"></em>
                    </button>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ Auth::user()->firstName.' '.Auth::user()->lastName }}</span>
                                <img class="img-profile rounded-emircle"
                                    src="{{asset('images/adminPage/undraw_profile.svg')}}" alt="profile">
                            </a>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    @yield('content')

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2020</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <em class="fas fa-angle-up"></em>
    </a>

    <!-- Bootstrap core JavaScript-->
    <script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{asset('vendor/jquery-easing/jquery.easing.min.js')}}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{asset('js/sb-admin-2.min.js')}}"></script>
    <script>
        $('#addWilayah').on('click', function() {
            $('.modal').modal('show');
        })
        $('#formWilayah').on('submit', function(e) {
            e.preventDefault()
            console.log('otw submit')
        })
    </script>

</body>

</html>
@endsection

<style>
.btn-logout {
    background-color: transparent;
    border: none;
}
</style>