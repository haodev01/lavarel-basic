<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Corona Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset('assets/vendors/mdi/css/materialdesignicons.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendors/css/vendor.bundle.base.css') }}" />
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/images/favicon.png') }}" />
    <!-- End layout styles -->
</head>

<body>
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="row w-100 m-0">
                <div class="content-wrapper full-page-wrapper d-flex align-items-center auth login-bg">
                    <div class="card col-lg-4 mx-auto">
                        <div class="card-body px-5 py-5">
                            <h3 class="card-title text-left mb-3">
                                Register
                            </h3>
                            <form action="{{ route('admin.register.do') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label>Username</label>
                                    <input value="{{ old('name') }}" type="text"
                                        class="form-control p_input @error('name') is-invalid @enderror"
                                        name="name" />
                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input value="{{ old('email') }}" type="email"
                                        class="form-control p_input
                                        @error('email') is-invalid @enderror""
                                        name=" email"> @error('email')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input value="{{ old(' password') }}" type="password"
                                        class="form-control
                                        p_input @error('password') is-invalid
                                        @enderror""
                                        name=" password">
                                    @error('password')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group d-flex align-items-center justify-content-between">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="checkbox" class="form-check-input" />
                                            Remember me
                                        </label>
                                    </div>
                                    <a href="#" class="forgot-pass">Forgot password</a>
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary btn-block enter-btn">
                                        Register
                                    </button>
                                </div>
                                <div class="d-flex">
                                    <button class="btn btn-facebook col mr-2">
                                        <i class="mdi mdi-facebook"></i>
                                        Facebook
                                    </button>
                                    <button class="btn btn-google col">
                                        <i class="mdi mdi-google-plus"></i>
                                        Google plus
                                    </button>
                                </div>
                                <p class="sign-up text-center">
                                    Already have an Account?<a href="{{ route('admin.login') }}">
                                        Sign Up</a>
                                </p>
                                <p class="terms">
                                    By creating an account you are accepting
                                    our<a href="#"> Terms & Conditions</a>
                                </p>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- content-wrapper ends -->
            </div>
            <!-- row ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <script src="{{ asset('assets/vendors/js/vendor.bundle.base.js') }}"></script>
    <script src="{{ asset('assets/js/off-canvas.js') }}"></script>
    <script src="{{ asset('assets/js/hoverable-collapse.js') }}"></script>
    <script src="{{ asset('assets/js/misc.js') }}"></script>
    <script src="{{ asset('assets/js/settings.js') }}"></script>
    <script src="{{ asset('assets/js/todolist.js') }}"></script>
    <!-- plugins:js -->
</body>

</html>
