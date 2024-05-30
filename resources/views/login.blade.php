{{-- <!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login - Inventaris 18329</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.1.0/css/adminlte.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="/" style="color: #007bff"><b>Inventaris</b>18329</a>
  </div>
  <div class="card rounded">
    <div class="card-body b-1">
      <p class="login-box-msg">Silakan masuk untuk mengelola inventaris</p>

      @if ($errors->any())
          <div class="alert alert-danger">
            <ul>@foreach ($errors->all() as $item)
                <li>{{ $item }}</li>
            @endforeach
            </ul>
          </div>
      @endif

      <form action="#" method="post">
        @csrf
        <div class="input-group mb-3">
          <input type="text" class="form-control" value="{{ old('username') }}" name="username" placeholder="Username">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="password" value="{{ old('password') }}" class="form-control" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Ingat Saya
              </label>
            </div>
          </div>
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Masuk</button>
          </div>
        </div>
      </form>

      <p class="mb-1">
        <a href="#">Lupa password?</a>
      </p>
    </div>
  </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.1.0/js/adminlte.min.js"></script>
</body>
</html> --}}

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login - App Inventaris 18329</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
    <style>
        html, body {
            height: 100%;
            margin: 0;
            overflow: hidden; /* Menghilangkan scroll */
        }
        body {
            background-color: #f0f5ff; /* Biru muda */
            font-family: Arial, sans-serif;
            background-image: url('https://source.unsplash.com/featured/?halal'); /* Gambar latar belakang acak dari Unsplash dengan kata kunci 'halal' */
            background-size: cover;
            background-position: center;
            padding: 40px 0; /* Padding tambahan di atas dan bawah */
        }
        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100%; /* Mengisi tinggi layar */
        }
        .login-box {
            background-color: rgba(255, 255, 255, 0.9); /* Putih dengan transparansi */
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0px 0px 20px 0px rgba(0,0,0,0.2);
            width: 350px;
            max-width: 100%; /* Mengikuti lebar layar */
            position: relative; /* Diperlukan untuk animasi */
        }
        .login-box h2 {
            text-align: center;
            color: #007bff; /* Biru */
            margin-bottom: 30px;
        }
        .login-box label {
            color: #007bff; /* Biru */
        }
        .login-box .btn-primary {
            background-color: #007bff; /* Biru */
            border-color: #007bff; /* Biru */
        }
        .login-box .btn-primary:hover {
            background-color: #0056b3; /* Biru tua saat hover */
            border-color: #0056b3; /* Biru tua saat hover */
        }
        .register-link {
            text-align: center;
        }
        .register-link a {
            color: #007bff; /* Biru */
            text-decoration: none;
        }
        .register-link a:hover {
            text-decoration: underline;
        }
        /* Animasi keranjang */
        .cart-animation {
            position: relative;
            animation: cart-bounce 0.5s;
        }
        @keyframes cart-bounce {
            0% {
                transform: translateY(0);
            }
            50% {
                transform: translateY(-5px);
            }
            100% {
                transform: translateY(0);
            }
        }

        /* Animasi dekoratif di border */
        @keyframes border-glow {
            0% {
                box-shadow: 0 0 5px #007bff, 0 0 10px #007bff, 0 0 15px #007bff;
            }
            50% {
                box-shadow: 0 0 15px #007bff, 0 0 20px #007bff, 0 0 25px #007bff;
            }
            100% {
                box-shadow: 0 0 5px #007bff, 0 0 10px #007bff, 0 0 15px #007bff;
            }
        }
        .border-animation {
            animation: border-glow 2s infinite alternate;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="login-box cart-animation border-animation">
            <h2><b>Asavan</b><br>Inventaris 18329</h2>
            @if ($errors->any())
            <div class="alert alert-danger">
              <ul>
                @foreach ($errors->all() as $item)
                  <li>{{ $item }}</li>
                @endforeach
              </ul>
            </div>
            @endif
             <form action="#" method="post">
             @csrf
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" name="username" value="{{ old('username') }}" class="form-control" id="username" placeholder="Enter username" required="">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" class="form-control" id="password" placeholder="Password" required="">
                </div>
                <button type="submit" class="btn btn-primary btn-block">Login</button>
            </form>
        </div>
    </div>
</body>
</html>




{{-- 
 <!DOCTYPE html>
 <html lang="en">
 <head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <title>InventarisApp 18329 | Log in</title>
 
   <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="{{ asset("https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback") }}">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{ asset("asset/plugins/fontawesome-free/css/all.min.css") }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset("asset/dist/css/adminlte.min.css") }}">
 </head>
 <body class="hold-transition login-page">
 <div class="login-box">
   <!-- /.login-logo -->
   <div class="card card-outline card-primary">
     <div class="card-header text-center">
       <a href="#" class="h1"><b>InventarisApp</b>Asa</a>
     </div>
     @if ($errors->any())
          <div class="alert alert-danger">
            <ul>@foreach ($errors->all() as $item)
                <li>{{ $item }}</li>
            @endforeach
            </ul>
          </div>
      @endif
     <div class="card-body">
       <p class="login-box-msg">Sign in to start your session</p>
 
       <form action="#" method="post">
        @csrf
         <div class="input-group mb-3">
           <input type="username" class="form-control" value="{{ old('username') }}" placeholder="Username">
           <div class="input-group-append">
             <div class="input-group-text">
               <span class="fas fa-envelope"></span>
             </div>
           </div>
         </div>
         <div class="input-group mb-3">
           <input type="password" class="form-control" value="{{ old('password') }}" placeholder="Password">
           <div class="input-group-append">
             <div class="input-group-text">
               <span class="fas fa-lock"></span>
             </div>
           </div>
         </div>
         <div class="row">
           <div class="col-8">
             <div class="icheck-primary">
               <input type="checkbox" id="remember">
               <label for="remember">
                 Remember Me
               </label>
             </div>
           </div>
           <!-- /.col -->
           <div class="col-4">
             <button type="submit" class="btn btn-primary btn-block">Masuk</button>
           </div>
           <!-- /.col -->
         </div>
       </form>
 
       <div class="social-auth-links text-center mt-2 mb-3">
         <a href="#" class="btn btn-block btn-primary">
           <i class="fab fa-facebook mr-2"></i> Sign in using Facebook
         </a>
         <a href="#" class="btn btn-block btn-danger">
           <i class="fab fa-google-plus mr-2"></i> Sign in using Google+
         </a>
       </div>
       <!-- /.social-auth-links -->
 
       <p class="mb-1">
         <a href="forgot-password.html">I forgot my password</a>
       </p>
       <p class="mb-0">
         <a href="register.html" class="text-center">Register a new membership</a>
       </p>
     </div>
     <!-- /.card-body -->
   </div>
   <!-- /.card -->
 </div>
 <!-- /.login-box -->
 
 <!-- jQuery -->
 <script src="../../plugins/jquery/jquery.min.js"></script>
 <!-- Bootstrap 4 -->
 <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
 <!-- AdminLTE App -->
 <script src="../../dist/js/adminlte.min.js"></script>
 </body>
 </html>
  --}}