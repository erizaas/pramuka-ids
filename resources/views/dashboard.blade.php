<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Ayo! segera daftarkan dirimu ke SMK Wikrama">
    <title>PRAMUKA SMK WIKRAMA BOGOR</title>
    <link rel="shortcut icon" href="../../assets/img/wikrama.png" type="image/png">
    <link href="../../assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="../../assets/css/dashboard.css" rel="stylesheet">

</head>

<body id="page-top">
    @include('sweetalert::alert')

    <div id="wrapper">

        <ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar" style="background: linear-gradient(#D27E3A,#944A00);">

            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
                <div class="sidebar-brand-text mx-3">Pramuka Web</div>
            </a>

            <hr class="sidebar-divider my-0">

            <li class="nav-item active">
                <a class="nav-link" href="/#">
                    <i class="fas fa-fw fa-home"></i>
                    <span>Landing Page</span>
                </a>
            </li>

            <hr class="sidebar-divider">

            <div class="sidebar-heading">
                Menu
            </div>

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                    aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Halaman</span>
                </a>
                <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Pramuka Pages:</h6>
                        @foreach ($page as $pages)
                        <a class="collapse-item" href="/pages/{{$pages['link']}}">{{$pages['title']}}</a>
                        @endforeach
                    </div>
                </div>
            </li>

            @if (Auth::user()->role == 1)
            <li class="nav-item">
                <a class="nav-link" href="/admin">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Admin Dashboard</span>
                </a>
            </li>
            @endif

        </ul>

        <div id="content-wrapper" class="d-flex flex-column">

            <div id="content">

                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <ul class="navbar-nav ml-auto">

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{Auth::user()->nama}}</span>
                                <img class="img-profile rounded-circle" src="http://eriza.my.id/img/9b0fd5eedaad5df54142ef93fc587ef8.jpg">
                            </a>

                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>

                <div class="container-fluid">

                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Selamat datang di Halaman Pramuka!</h1>
                    </div>

                    <div class="row">


                        <div class="col-lg-6 mb-4">

                            <div class="card alert bg-light shadow p-3 mb-5 bg-body rounded">
                                <div class="card-header py-3 justify-content-between d-md-flex">
                                    <h6 class="m-0 font-weight-bold text-primary">Kepanduan (Scouting)</h6>
                                    {{-- <h6 class="m-0 font-weight-bold text-secondary" style="font-size: 15px"></h6> --}}
                                </div>
                                <div class="card-body">
                                    <span>Kepanduan atau kepramukaan adalah gerakan pandu. Sedangkan salah satu definisi pandu adalah anggota perkumpulan pemuda yang berpakaian seragam khusus, bertujuan mendidik anggotanya supaya menjadi orang yang berjiwa kesatria, gagah berani, dan suka menolong sesama makhluk.</span>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6 mb-4">

                            <div class="card alert bg-light shadow p-3 mb-5 bg-body rounded">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary ">Pengertian Pramuka</h6>
                                </div>
                                <div class="card-body">
                                    <span>Pramuka adalah singkatan dari Praja Muda Karana, yang artinya Orang Muda yang Suka Berkarya. Pramuka merupakan sebuah organisasi atau gerakan kepanduan (Boy Scout) yang menjadi wadah atau tempat dilakukannya proses pendidikan kepramukaan di Indonesia.</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; 2022 Eriza</span>
                    </div>
                </div>
            </footer>
        </div>
    </div>

    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Yakin ingin keluar?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Pencet "Logout" dibawah jika anda ingin mengakhiri season.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="/logout">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <script src="../../assets/vendor/jquery/jquery.min.js"></script>
    <script src="../../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../../assets/vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="../../assets/js/dashboard.js"></script>
    <script src="../../assets/vendor/chart.js/Chart.min.js"></script>
    <script src="../../assets/js/demo/chart-area-demo.js"></script>
    <script src="../../assets/js/demo/chart-pie-demo.js"></script>

</body>

</html>
