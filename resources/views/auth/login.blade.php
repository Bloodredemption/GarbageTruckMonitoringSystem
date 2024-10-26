<!doctype html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <title>GTMS Login</title>
      
        <!-- Favicon -->
        <link rel="shortcut icon" href="{{ asset('assets/images/bali_logo.png') }}" />

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
                                                    <input type="text" class="form-control" id="username" name="username" placeholder=" " required>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label for="password" class="form-label">Password</label>
                                                    <div class="input-group">
                                                        <input type="password" class="form-control" id="password" name="password" placeholder=" " required>
                                                        <span class="input-group-text" id="togglePassword" style="cursor: pointer;">
                                                            <!-- Show Password SVG (initial state) -->
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-eye">
                                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                                                <path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
                                                                <path d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6" />
                                                            </svg>
                                                        </span>
                                                    </div>
                                                    @error('password')
                                                        <span>{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-12 d-flex justify-content-between">
                                                <div class="form-check mb-3">
                                                    <input type="checkbox" class="form-check-input" id="rememberMe" checked>
                                                    <label class="form-check-label" for="rememberMe">Remember Me</label>
                                                </div>
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

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const passwordField = document.getElementById('password');
            const togglePassword = document.getElementById('togglePassword');
            const rememberMeCheckbox = document.getElementById('rememberMe');
            const usernameField = document.getElementById('username');

            // SVGs for show and hide password icons
            const showPasswordSvg = `
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-eye">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                    <path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
                    <path d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6" />
                </svg>
            `;
            const hidePasswordSvg = `
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-eye-off">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                    <path d="M10.585 10.587a2 2 0 0 0 2.829 2.828" />
                    <path d="M16.681 16.673a8.717 8.717 0 0 1 -4.681 1.327c-3.6 0 -6.6 -2 -9 -6c1.272 -2.12 2.712 -3.678 4.32 -4.674m2.86 -1.146a9.055 9.055 0 0 1 1.82 -.18c3.6 0 6.6 2 9 6c-.666 1.11 -1.379 2.067 -2.138 2.87" />
                    <path d="M3 3l18 18" />
                </svg>
            `;

            // Show/Hide Password Functionality
            togglePassword.addEventListener('click', () => {
                const isPasswordHidden = passwordField.getAttribute('type') === 'password';
                passwordField.setAttribute('type', isPasswordHidden ? 'text' : 'password');
                togglePassword.innerHTML = isPasswordHidden ? hidePasswordSvg : showPasswordSvg;
            });

            // Load Username from Cookie if Exists
            const savedUsername = getCookie('username');
            if (savedUsername) {
                usernameField.value = savedUsername;
                rememberMeCheckbox.checked = true;
            }

            // Store Username in Cookie if "Remember Me" is checked
            rememberMeCheckbox.addEventListener('change', () => {
                if (rememberMeCheckbox.checked) {
                    setCookie('username', usernameField.value, 30); // Store for 30 days
                } else {
                    deleteCookie('username');
                }
            });

            // Update Cookie whenever Username is changed and "Remember Me" is checked
            usernameField.addEventListener('input', () => {
                if (rememberMeCheckbox.checked) {
                    setCookie('username', usernameField.value, 30);
                }
            });

            // Cookie Helper Functions
            function setCookie(name, value, days) {
                const expires = new Date(Date.now() + days * 864e5).toUTCString();
                document.cookie = name + '=' + encodeURIComponent(value) + '; expires=' + expires + '; path=/';
            }

            function getCookie(name) {
                return document.cookie.split('; ').reduce((r, v) => {
                    const parts = v.split('=');
                    return parts[0] === name ? decodeURIComponent(parts[1]) : r;
                }, '');
            }

            function deleteCookie(name) {
                setCookie(name, '', -1);
            }
        });

    </script>
  </body>
</html>