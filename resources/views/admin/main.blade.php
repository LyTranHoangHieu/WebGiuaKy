<!DOCTYPE html>
<html lang="en">
<head>
    @include('admin.header')
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
    <!-- Navbar -->
@include('admin.navbar')

<!-- Sidebar -->
@include('admin.sidebar')

<!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                @include('admin.alert')
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-primary mt-3">
                            <div class="card-header">
                                <h3 class="card-title">{{$title}}</h3>
                            </div>
                            <br>
                            <!-- /.content -->
                                @yield('content')
                            <!-- /.content -->
                        </div>
                    </div>
                </div>
                <!-- /.row -->
            </div>
        </section>
    </div>
    <footer class="main-footer">
        <div class="float-right d-none d-sm-block">
            <b>Lý Hoàng Hiếu</b> 2001
        </div>
        <strong>Địa Chỉ:</strong> 70/10 Trần Phú Phường 4 TP Vĩnh Long, Vĩnh Long.
    </footer>
</div>
<!-- ./wrapper -->

@include('admin.footer')
</body>
</html>
