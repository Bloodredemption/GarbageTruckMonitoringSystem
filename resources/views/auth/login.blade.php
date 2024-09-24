<!doctype html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <title>GTMS Login</title>
      
        <!-- Favicon -->
        <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}" />

        <!-- Library / Plugin Css Build -->
        <link rel="stylesheet" href="{{ asset('assets/css/core/libs.min.css') }}" />

        <!-- Hope Ui Design System Css -->
        <link rel="stylesheet" href="{{ asset('assets/css/hope-ui.min.css?v=2.0.0') }}" />

        <!-- Custom Css -->
        <link rel="stylesheet" href="{{ asset('assets/css/custom.min.css?v=2.0.0') }}" />

        <!-- Dark Css -->
        <link rel="stylesheet" href="{{ asset('assets/css/dark.min.css') }}" />

        <!-- Customizer Css -->
        <link rel="stylesheet" href="{{ asset('assets/css/customizer.min.css') }}" />

        <!-- RTL Css -->
        <link rel="stylesheet" href="{{ asset('assets/css/rtl.min.css') }}" />

        <!-- Library Bundle Script -->
        <script src="{{ asset('assets/js/core/libs.min.js') }}"></script>

        <!-- External Library Bundle Script -->
        <script src="{{ asset('assets/js/core/external.min.js') }}"></script>

        <!-- Widgetchart Script -->
        <script src="{{ asset('assets/js/charts/widgetcharts.js') }}"></script>

        <!-- Mapchart Script -->
        <script src="{{ asset('assets/js/charts/vectore-chart.js') }}"></script>
        <script src="{{ asset('assets/js/charts/dashboard.js') }}"></script>

        <!-- fslightbox Script -->
        <script src="{{ asset('assets/js/plugins/fslightbox.js') }}"></script>

        <!-- Settings Script -->
        <script src="{{ asset('assets/js/plugins/setting.js') }}"></script>

        <!-- Slider-tab Script -->
        <script src="{{ asset('assets/js/plugins/slider-tabs.js') }}"></script>

        <!-- Form Wizard Script -->
        <script src="{{ asset('assets/js/plugins/form-wizard.js') }}"></script>

        <!-- App Script -->
        <script src="{{ asset('assets/js/hope-ui.js') }}" defer></script>

    <style>
        :root {
            --bs-primary: #01A94D;
            --bs-primary-tint-40: #01A94D;
            --bs-primary-shade-20: #01A94D;
        }
    </style>
  </head>
  <body class=" " data-bs-spy="scroll" data-bs-target="#elements-section" data-bs-offset="0" tabindex="0">
    <!-- loader Start -->
    {{-- <div id="loading">
      <div class="loader simple-loader">
          <div class="loader-body"></div>
      </div>    </div> --}}
    <!-- loader END -->
    
    <div class="wrapper">
        <section class="login-content">
            <div class="row m-0 align-items-center bg-white vh-100">            
                <div class="col-md-6">
                    <div class="row justify-content-center">
                        <div class="col-md-10">
                            <div class="card card-transparent shadow-none d-flex justify-content-center mb-0 auth-card">
                                <div class="card-body">
                                    <a href="#" class="navbar-brand d-flex flex-column align-items-center justify-content-center mb-3 text-center w-100">
                                        <!--Logo start-->
                                        <div class="logo-main d-flex flex-column align-items-center">
                                            <div class="logo-normal">
                                                <img src="{{ asset('assets/images/logo.png') }}" width="50%" alt="GTMS Logo">
                                            </div>
                                            <div class="logo-mini">
                                                <img src="{{ asset('assets/images/logo.png') }}" alt="GTMS Logo">
                                            </div>
                                        </div>
                                        <!--Logo End-->
                                        
                                        {{-- <h4 class="logo-title ms-3">Garbage Truck Monitoring System</h4> --}}
                                    </a>
                                    <h2 class="mb-2 text-center"><strong>Welcome!</strong></h2>
                                    <p class="text-center">Please enter your login credentials.</p>

                                    @if($errors->has('loginError'))
                                        <div class="alert alert-danger d-flex align-items-center" role="alert">
                                            <svg class="bi flex-shrink-0 me-2" width="24" height="24">
                                                <use xlink:href="#exclamation-triangle-fill" />
                                            </svg>
                                            <div>
                                                {{ $errors->first('loginError') }}
                                            </div>
                                        </div>
                                    @endif
                                    
                                    <form id="loginForm" method="POST" action="{{ route('login') }}">
                                        @csrf
                                        <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label for="username" class="form-label">Username</label>
                                                <input type="text" class="form-control" id="username" name="username" aria-describedby="username" placeholder=" " required>
                                                @error('username')
                                                    <span>{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label for="password" class="form-label">Password</label>
                                                <input type="password" class="form-control" id="password" name="password" aria-describedby="password" placeholder=" " required>
                                                @error('password')
                                                    <span>{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-12 d-flex justify-content-between">
                                            <div class="form-check mb-3">
                                                <input type="checkbox" class="form-check-input" id="customCheck1">
                                                <label class="form-check-label" for="customCheck1">Remember Me</label>
                                            </div>
                                            {{-- <a href="recoverpw.html">Forgot Password?</a> --}}
                                        </div>
                                        </div>
                                        <div class="d-flex justify-content-center mb-4">
                                            <button id="loginButton" type="submit" class="btn btn-primary" style="width: 100%;">
                                                <span style="display: none;" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                                Login
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
                <div class="col-md-6 d-md-block d-none bg-primary p-0 mt-n1 vh-100 overflow-hidden">
                    <img src="{{ asset('assets/images/login_bg.svg') }}" alt="images">
                </div>
            </div>
        </section>
    </div>

  </body>
</html>