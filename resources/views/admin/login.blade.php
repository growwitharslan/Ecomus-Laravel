<!DOCTYPE html>
<html>


<!-- Mirrored from webapplayers.com/inspinia_admin-v2.9.4/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 07 Aug 2024 07:21:23 GMT -->

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Ecommerce | Login</title>

    <link href="{{ asset('admin_assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin_assets/font-awesome/css/font-awesome.css') }}" rel="stylesheet">

    <link href="{{ asset('admin_assets/css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('admin_assets/css/style.css') }}" rel="stylesheet">

</head>

<body class="gray-bg">

    <div class="middle-box text-center loginscreen animated fadeInDown my-4 px-3" style="padding-bottom: 20px;  box-shadow: rgba(0, 0, 0, 0.25) 0px 14px 28px, rgba(0, 0, 0, 0.22) 0px 10px 10px;">
        <div>
            <div>
                <h2 class="text-dark" style="font-weight:bolder"><b>ADMIN | ECOMUS</b></h2>
            </div>
            <h3>Welcome to Ecomus.</h3>

            <p>Login in to continue.</p>
            <form class="m-t" role="form" action="{{ route('admin.authenticate') }}" method="post">
                @csrf
                <div class="form-group">
                    <!-- <input type="email" class="form-control" placeholder="Username" required=""> -->
                    <input type="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror " name="email" id="email" placeholder="name@example.com">
                </div>
                @error('email')
                <p class="invalid-feedback">{{ $message }}</p>
                @enderror
                <div class="form-group">
                    <!-- <input type="password" class="form-control" placeholder="Password" required=""> -->
                    <input type="password" class="form-control @error('password') is-invalid @enderror " name="password" id="password" value="" placeholder="Password">
                </div>
                @error('password')
                <p class="invalid-feedback">{{ $message }}</p>
                @enderror
                <button type="submit" class="btn btn-primary block full-width m-b">Login</button>

                <!-- <a href="#"><small>Forgot password?</small></a> -->
                <p class="text-muted text-center"><small>Do not have an account?</small></p>
                <a class="btn btn-sm btn-white btn-block" href="{{ route('admin.register') }}">Create an account</a>
            </form>
            <p class="m-t"> <small>Inspinia we app framework base on Bootstrap 3 &copy; 2014</small> </p>
        </div>
    </div>

    <!-- Mainly scripts -->
    <script src="js/jquery-3.1.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.js"></script>

</body>


<!-- Mirrored from webapplayers.com/inspinia_admin-v2.9.4/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 07 Aug 2024 07:21:23 GMT -->

</html>