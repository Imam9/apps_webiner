{{-- <!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Register Akun </title>

    <!-- Custom fonts for this template-->
    <link href="{{asset('')}}assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{asset('')}}assets/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Create an Account Anggota</h1>
                            </div>
                    
                            <form class="user" method = "POST" enctype='multipart/form-data' action = "{{url('insert-register')}}">
                                @csrf
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user" id="exampleFirstName"
                                            placeholder="Nama anggota" name = "name" required>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="number" class="form-control form-control-user" id="exampleLastName"
                                            placeholder="No Telepon anggota" name = "phone_number" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="exampleInputEmail" name = "alamat"
                                        placeholder="Alamat ..." required>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="email" class="form-control form-control-user" id="exampleFirstName"
                                            placeholder="email" required name = "email">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="password" class="form-control form-control-user" id="exampleLastName"
                                            placeholder="Password" name = "password" required>
                                    </div>
                                </div>
            
                                <input type="submit"  value = "Register" class="btn btn-primary btn-user btn-block">
                                <hr>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{asset('')}}assets/vendor/jquery/jquery.min.js"></script>
    <script src="{{asset('')}}assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{asset('')}}assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{asset('')}}assets/js/sb-admin-2.min.js"></script>

</body>

</html> --}}



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Register &mdash; Applikasi Webbiner</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="{{asset('')}}template/modules/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="{{asset('')}}template/modules/fontawesome/css/all.min.css">

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="{{asset('')}}template/modules/jquery-selectric/selectric.css">

  <!-- Template CSS -->
  <link rel="stylesheet" href="{{asset('')}}template/css/style.css">
  <link rel="stylesheet" href="{{asset('')}}template/css/components.css">
<!-- Start GA -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-94034622-3');
</script>
<!-- /END GA --></head>

<body>
  <div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
            <div class="login-brand">
              <img src="{{asset('')}}template/img/stisla-fill.svg" alt="logo" width="100" class="shadow-light rounded-circle">
            </div>

            <div class="card card-primary">
              <div class="card-header"><h4>Register Pengguna</h4></div>

              <div class="card-body">
                <form class="user" method = "POST" enctype='multipart/form-data' action = "{{url('insert-register')}}">
                    @csrf
                    <div class="form-group ">
                        <label for="frist_name">Nama</label>
                        <input id="frist_name" type="text" class="form-control" name="name" autofocus required>
                    </div>
                    <div class="row">
                        <div class="form-group col-6">
                            <label>Jenis Kelamin</label>
                            <select class="form-control selectric" name = "jenis_kelamin" required>
                                <option>--Pilih Jenis Kelamin--</option>
                                <option value ="laki-laki">Laki-laki</option>
                                <option value = "perempuan">Perempuan</option>
                            </select>
                        </div>
                        <div class="form-group col-6">
                            <label>Tanggal Lahir</label>
                            <input type="date" name = "tgl_lahir" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Profesi</label>
                        <input type="text" name="profesi" required class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Alamat</label>
                        <input type="text" name="alamat" required class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Kategori</label>
                        <select name="id_kategori" class="form-control" required id="">
                            <option>--Pilih Kategori</option>
                            @foreach ($kategori as $item)
                                <option value="{{$item->id_kategori}}">{{$item->kategori}}</option>
                            @endforeach
                        </select>
                    </div>
                
                    <div class="row">
                        <div class="form-group col-6">
                            <label for="email">Email</label>
                            <input id="email" type="email" class="form-control" name="email" required>
                        </div>
                        <div class="form-group col-6">
                            <label>Phone Number</label>
                            <input type="number" name = "phone_number" class="form-control" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="password" class="d-block">Password</label>
                        <input id="password" type="password" class="form-control pwstrength" data-indicator="pwindicator" name="password" required>
                        <div id="pwindicator" class="pwindicator">
                            <div class="bar"></div>
                            <div class="label"></div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="custom-control custom-checkbox">
                        <input type="checkbox" name="agree" class="custom-control-input" id="agree">
                        <label class="custom-control-label" for="agree">I agree with the terms and conditions</label>
                        </div>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-lg btn-block">
                        Register
                        </button>
                    </div>
                </form>

                <div class="mt-5 text-muted text-center">
                    Sudah Punya Akun? <a href="{{url('login')}}">Login</a>
                  </div>
              </div>
            </div>
            <div class="simple-footer">
              Copyright &copy; Applkikasi Webbiner 2023
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

  <!-- General JS Scripts -->
  <script src="{{asset('')}}template/modules/jquery.min.js"></script>
  <script src="{{asset('')}}template/modules/popper.js"></script>
  <script src="{{asset('')}}template/modules/tooltip.js"></script>
  <script src="{{asset('')}}template/modules/bootstrap/js/bootstrap.min.js"></script>
  <script src="{{asset('')}}template/modules/nicescroll/jquery.nicescroll.min.js"></script>
  <script src="{{asset('')}}template/modules/moment.min.js"></script>
  <script src="{{asset('')}}template/js/stisla.js"></script>
  
  <!-- JS Libraies -->
  <script src="{{asset('')}}template/modules/jquery-pwstrength/jquery.pwstrength.min.js"></script>
  <script src="{{asset('')}}template/modules/jquery-selectric/jquery.selectric.min.js"></script>

  <!-- Page Specific JS File -->
  <script src="{{asset('')}}template/js/page/auth-register.js"></script>
  
  <!-- Template JS File -->
  <script src="{{asset('')}}template/js/scripts.js"></script>
  <script src="{{asset('')}}template/js/custom.js"></script>
</body>
</html>