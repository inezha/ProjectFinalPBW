<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no"
        />
        <title>Register | Forum Diskusi</title>
        <!-- base:css -->
        <link rel="stylesheet" href="{{ asset('/celestial/template/vendors/typicons.font/font/typicons.css') }}">
        <link rel="stylesheet" href="{{ asset('/celestial/template/vendors/css/vendor.bundle.base.css') }}">
        <!-- endinject -->
        <!-- plugin css for this page -->
        <!-- End plugin css for this page -->
        <!-- inject:css -->
        <link rel="stylesheet" href="{{ asset('/celestial/template/css/vertical-layout-light/style.css') }}">
        <!-- endinject -->
        <link rel="shortcut icon" href="{{ asset('/celestial/template/images/favicon.png') }}" />
    </head>

    <body>
        <div class="container-scroller">
            <div class="container-fluid page-body-wrapper full-page-wrapper">
                <div class="content-wrapper d-flex align-items-center auth px-0">
                    <div class="row w-100 mx-0">
                        <div class="col-lg-4 mx-auto">
                            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
                                <div class="brand-logo">
                                    <h1 class="text-primary text-center">Forum Diskusi Onlen</h1>
                                </div>

                                <form class="pt-3" method="POST" action="{{ route('register') }}">
                                    @csrf
                                    <div class="form-group">
                                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Name" name="name" value="{{ old('name') }}" autocomplete="name" autofocus/>

                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Email" name="email" value="{{ old('email') }}" autocomplete="email"/>

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Password" name="password" autocomplete="new-password"/>

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <input type="password" class="form-control" id="password_confirmation" placeholder="Confirmation Password" name="password_confirmation" autocomplete="new-password">
                                    </div>

                                    <div class="form-group">
                                        <input type="number" class="form-control @error('age') is-invalid @enderror" id="age" placeholder="Age" value="{{ old('age') }}" name="age" autocomplete="age"/>

                                        @error('age')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <textarea name="address" id="address" class="form-control @error('address') is-invalid @enderror" placeholder="Address" autocomplete="age">{{ old('email') }}</textarea>

                                        @error('address')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    
                                    <div class="mt-3">
                                        <button type="submit" class="btn btn-block btn-primary font-weight-medium auth-form-btn">Sign Up</button>
                                    </div>

                                    <div class="text-center mt-4 font-weight-light" >
                                        Already have an account?
                                        <a href="/login" class="text-primary"
                                            >Login
                                        </a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- content-wrapper ends -->
            </div>
            <!-- page-body-wrapper ends -->
        </div>
        <!-- container-scroller -->
        <!-- base:js -->
        <script src="{{ asset('/celestial/template/vendors/js/vendor.bundle.base.js') }}"></script>
        <!-- endinject -->
        <!-- Plugin js for this page-->
        <!-- End plugin js for this page-->
        <!-- inject:js -->
        <script src="{{ asset('/celestial/template/js/off-canvas.js') }}"></script>
        <script src="{{ asset('/celestial/template/js/hoverable-collapse.js')}}"></script>
        <script src="{{ asset('/celestial/template/js/template.js') }}"></script>
        <script src="{{ asset('/celestial/template/js/settings.js') }}"></script>
        <script src="{{ asset('/celestial/template/js/todolist.js') }}"></script>
        <!-- endinject -->
    </body>
</html>
