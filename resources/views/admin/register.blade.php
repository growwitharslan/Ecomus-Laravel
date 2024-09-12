<!DOCTYPE html>
<html>


<!-- Mirrored from webapplayers.com/inspinia_admin-v2.9.4/register.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 07 Aug 2024 07:23:16 GMT -->

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>INSPINIA | Register</title>

    <link href="{{ asset('admin_assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin_assets/font-awesome/css/font-awesome.css') }}" rel="stylesheet">
    <link href="{{ asset('admin_assets/css/plugins/iCheck/custom.css') }}" rel="stylesheet">
    <link href="{{ asset('admin_assets/css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('admin_assets/css/style.css') }}" rel="stylesheet">

</head>

<body class="gray-bg">

    <div class="middle-box text-center loginscreen   animated fadeInDown" style="padding-bottom: 20px;  box-shadow: rgba(0, 0, 0, 0.25) 0px 14px 28px, rgba(0, 0, 0, 0.22) 0px 10px 10px;">
        <div>
            <div>

                <h2 style="font-weight:bolder"><b>ADMIN | ECOMUS</b></h2>

            </div>
            <h3>Register to Ecomus.</h3>
            <p>Create account to access Admin Dashboard</p>
            <form class="m-t" role="form" action="{{ route('admin.processRegister') }}" method="post">
                @csrf
                <div class="form-group">
                    <input type="text" value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror " name="name" id="name" placeholder="Enter your Good name">
                </div>
                @error('name')
                <p class="invalid-feedback">{{ $message }}</p>
                @enderror
                <div class="form-group">
                    <input type="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror " name="email" id="email" placeholder="name@example.com">
                </div>
                @error('email')
                <p class="invalid-feedback">{{ $message }}</p>
                @enderror
                <div class="form-group">
                    <input type="password" class="form-control @error('password') is-invalid @enderror " name="password" id="password" value="" placeholder="Password">
                </div>
                @error('password')
                <p class="invalid-feedback">{{ $message }}</p>
                @enderror
                <div class="form-group">
                    <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" value="" placeholder="Confirm Password">
                </div>
                <div class="form-group">
                    <div class="checkbox i-checks"><label> <input type="checkbox"><i></i> Agree the terms and policy </label></div>
                </div>
                <button type="submit" class="btn btn-primary block full-width m-b">Register</button>

                <p class="text-muted text-center"><small>Already have an account?</small></p>
                <a class="btn btn-sm btn-white btn-block" href="login.html">Login</a>
            </form>
            <p class="m-t"> <small>Inspinia we app framework base on Bootstrap 3 &copy; 2014</small> </p>
        </div>
    </div>

    <!-- Mainly scripts -->
    <script src="{{ asset('admin_assets/js/jquery-3.1.1.min.js') }}"></script>
    <script src="{{ asset('admin_assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('admin_assets/js/bootstrap.js') }}"></script>
    <!-- iCheck -->
    <script src="{{ asset('admin_assets/js/plugins/iCheck/icheck.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('.i-checks').iCheck({
                checkboxClass: 'icheckbox_square-green',
                radioClass: 'iradio_square-green',
            });
        });
    </script>
</body>

</html>



<!-- <!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel 11 Multi Auth</title>
    <link rel="stylesheet" href="https://unpkg.com/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>

<body class="bg-light">
    <section class=" p-3 p-md-4 p-xl-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-md-9 col-lg-7 col-xl-6 col-xxl-5">
                    <div class="card border border-light-subtle rounded-4">
                        <div class="card-body p-3 p-md-4 p-xl-5">
                            <div class="row">
                                <div class="col-12">
                                    <div class="mb-5">
                                        <h4 class="text-center">ADMIN Register Here</h4>
                                    </div>
                                </div>
                            </div>
                            <form>

                                <div class="row gy-3 overflow-hidden">
                                    <div class="col-12">
                                        <div class="form-floating mb-3">
                                            
                                            <label for="name" class="form-label">Name</label>
                                            
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-floating mb-3">
                                            
                                            <label for="email" class="form-label">Email</label>
                                            @error('email')
                                            <p class="invalid-feedback">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-floating mb-3">
                                            
                                            <label for="password" class="form-label">Password</label>
                                            @error('password')
                                            <p class="invalid-feedback">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-floating mb-3">
                                            
                                            <label for="password" class="form-label">Confirm Password</label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="d-grid">
                                            <button class="btn bsb-btn-xl btn-primary py-3" type="submit">Register Now</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <div class="row">
                                <div class="col-12">
                                    <hr class="mt-5 mb-4 border-secondary-subtle">
                                    <div class="d-flex gap-2 gap-md-4 flex-column flex-md-row justify-content-center">
                                        <a href="{{ route('admin.login') }}" class="link-secondary text-decoration-none">Click here to login</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html> -->