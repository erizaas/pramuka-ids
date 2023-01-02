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
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.css">

</head>

<body id="page-top">
    @include('sweetalert::alert')

    <div id="wrapper">

        <ul class="navbar-nav sidebar sidebar-dark accordion bg-primary" id="accordionSidebar" >

            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
                <div class="sidebar-brand-text mx-3">Admin Pramuka</div>
            </a>

            <hr class="sidebar-divider my-0">
            <li class="nav-item active">
                <a class="nav-link" href="#">
                    <i class="fas fa-fw fa-users"></i>
                    <span>Data Pengguna</span>
                </a>
            </li>


            <hr class="sidebar-divider">

            <div class="sidebar-heading">
                Menu
            </div>

            <li class="nav-item">
                <a class="nav-link" href="/admin/page/show">
                    <i class="fas fa-fw fa-marker"></i>
                    <span>Daftar Halaman</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="/admin/create">
                    <i class="fas fa-fw fa-plus"></i>
                    <span>Buat Halaman</span>
                </a>
            </li>



        </ul>

        <div id="content-wrapper" class="d-flex flex-column">

            <div id="content">

                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <span class="nav-link">Dashboard Admin</span>

                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <ul class="navbar-nav ml-auto">

                        <div class="topbar-divider d-none d-sm-block"></div>
                        {{-- Nama  --}}
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{Auth::user()->nama}}</span>
                                <img class="img-profile rounded-circle" src="http://eriza.my.id/img/9b0fd5eedaad5df54142ef93fc587ef8.jpg">
                            </a>
                            {{-- Logout --}}
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
                        <h6 class="m-0 font-weight-bold">Data User total : {{$total}}</h6>
                    </div>

                    <div class="row">


                        <div class="col-lg-12 mb-4">

                            <div class="card alert bg-light shadow p-3 mb-5 bg-body rounded">
                                <div class="card-header py-3 d-sm-flex align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Users Info</h6>
                                    {{-- <h6 class="m-0 font-weight-bold text-primary">Total online:10</h6> --}}
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table" id="table_siswa">
                                          <thead>
                                            <tr>
                                              <th scope="col">No</th>
                                              <th scope="col">Nama</th>
                                              <th scope="col">Email</th>
                                              <th scope="col">Status</th>
                                              <th scope="col">Last Seen</th>
                                              <th scope="col">Role</th>
                                              <th scope="col">Aksi</th>
                                            </tr>
                                          </thead>
                                          <tbody>
                                            @php
                                                $no = 1;
                                            @endphp
                                            @foreach ($users as $user)
                                            <tr>
                                                <th scope="row">{{ $no++ }}</th>
                                                <td>{{$user['nama']}}</td>
                                                <td>{{$user['email']}}</td>
                                                <td>
                                                @if(Cache::has('user-is-online-' . $user->id))
                                                    <span class="text-success">Online</span>
                                                @else
                                                    <span class="text-secondary">Offline</span>
                                                @endif</td>
                                                <td>{{ Carbon\Carbon::parse($user->last_seen)->diffForHumans() }}</td>
                                                <td>
                                                    @if($user['role'] == 1)
                                                    <span class="badge filter badge-success">admin</span>
                                                    @else
                                                    <span class="badge filter badge-warning">user</span>
                                                    @endif
                                                </td>
                                                <td class="d-flex">
                                                    @if($user['role'] == 0)
                                                    <form action="/update/{{$user['id']}}" method="post">
                                                        @csrf
                                                        @method("PATCH")
                                                        <button type="submit" class="btn btn-primary btn-sm mr-1">Jadikan Admin</button>
                                                    </form>
                                                    <form action="/destroy/{{$user['id']}}" method="post">
                                                        @csrf
                                                        @method("DELETE")
                                                        <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                                    </form>
                                                    @else
                                                    <span class="text-primary">Aksi tidak diizinkan</span>
                                                    @endif
                                                </td>
                                            </tr>
                                            @endforeach
                                          </tbody>
                                        </table>
                                      </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; 2022 Eriza</span>
                    </div>
                </div>
            </footer> --}}
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
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.js"></script>

    <script>
        $(document).ready(function () {
            $('#table_siswa').DataTable();
            $('.dataTables_length').addClass('bs-select');
        });
    </script>
</body>

</html>
