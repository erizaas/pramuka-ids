<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PRAMUKA SMK WIKRAMA BOGOR</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,300,400,500,700,900" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.0.1/mdb.min.css" rel="stylesheet">
	<link rel="stylesheet" href="../assets/css/bootstrap-4.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	</head>
	<body>
    <section class="vh-100" style="background: linear-gradient(#944A00,#D27E3A,#E7A042);background-repeat: no-repeat; ">
        <div class="container py-5 h-100">
          <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col col-xl-10">
              <div class="card" style="border-radius: 1rem;">
                <div class="row g-0">
                  <div class="col-md-6 col-lg-5 d-none d-md-block">
                    <img src="https://i.pinimg.com/564x/93/bc/c0/93bcc0c80879d97577e24b1a95f2caf5.jpg" class="img-fluid mt-2" style="border-radius: 1rem 0 0 1rem;">
                  </div>
                  <div class="col-md-6 col-lg-7 d-flex align-items-center">
                    <div class="card-body p-4 p-lg-5 text-black">
                      <form action="login" method="POST">
                        <div class="d-flex align-items-center mb-3 pb-1">
                          <span class="h1 fw-bold mb-0">Login</span>
                        </div>
                        <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;color:#944A00">Masuk ke Akun Pramuka-mu</h5>
                        @csrf
                        @if(session('successRegister'))
                            <div class="alert alert-success text-center" role="alert">{{ session('successRegister') }}</div>
                        @endif
                        @if(session('error'))
                            <div class="alert alert-danger text-center" role="alert">{{ session('error') }}</div>
                        @endif
                        @if(session('isLogin'))
                            <div class="alert alert-warning text-center" role="alert">{{ session('isLogin') }}</div>
                        @endif
                        @if(session('logout'))
                            <div class="alert alert-success text-center" role="alert">{{ session('logout') }}</div>
                        @endif
                        {{-- Email --}}
                        <div class="form-outline mb-4">
                          <input type="email" id="form-email" class="form-control form-control-lg" name="email" value="{{old('email')}}">
                          <label class="form-label" for="form-email">Alamat Email</label>
                        </div>

                        {{-- Password --}}
                        <div class="form-outline mb-4">
                          <input type="password" id="form-password" class="form-control form-control-lg" name="password">
                          <label class="form-label" for="form-password">Kata Sandi</label>
                        </div>

                        <div class="pt-1 mb-4">
                          <button class="btn btn-primary btn-lg btn-block mb-2" type="sumbit">Login</button>
                          <span class="fw-normal text-secondary text-center">Belum memiliki akun? <a href="register" class="text-dark">Daftar di sini</a></span>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.0.1/mdb.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous"></script>

	</body>
</html>

