<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Ayo! segera daftarkan dirimu ke SMK Wikrama">
    <title>Pramuka Smk Wikrama Bogor</title>
    <link rel="stylesheet" href="../assets/css/bootstrap-4.css">
</head>
<body data-spy="scroll" data-target=".navbar" data-offset="40" id="home">
    @include('sweetalert::alert')

    <nav class="navbar custom-navbar navbar-expand-lg navbar-light bg-light" data-spy="affix" data-offset-top="20">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="https://www.smkwikrama.sch.id/../assets/images/construct/logo-wk.png" alt="Smk Wikrama Bogor">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
                <span>

                </span>
            </button>

            <div class="collapse navbar-collapse text-center" id="navbarContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#">PRAMUKA</a>
                    </li>
                    <li class="nav-item">
                        @if(Auth::check())
                        <a class="nav-link" href="dashboard">DASHBOARD</a>
                        @else
                        <a class="nav-link" href="login">LOGIN</a>
                        @endif
                    </li>
                </ul>
            </div>
        </div>
    </nav>


    <!-- Landing Page -->
    <header id="beranda" class="header">
        <div class="overlay">
            <h1 class="title text-center" style="font-size: 40px;">SCOUT OF SMK WIKRAMA BOGOR</h1>
            <h6 class="subtitle text-center" style="font-size: 15px; margin-bottom:20px;">Login untuk mengetahuinya</b></h6>
            <div class="buttons text-center">
                <a href="pendaftaran" class="btn btn-warning shadow-md bordered font-weight-bold text-white">LOGIN</a>
            </div>
        </div>
    </header>
</body>
</html>
