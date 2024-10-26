<!doctype html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>GTMS</title>
        
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

        <link rel="stylesheet" href="{{ asset('assets/vendor/flatpickr/dist/flatpickr.min.css') }}" />
        <script src="{{ asset('assets/vendor/flatpickr/dist/flatpickr.min.js')}}"></script>
        <script src="{{ asset('assets/js/plugins/flatpickr.js')}}" defer></script>
    
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

        <!-- AOS Animation Plugin-->
        <script src="{{ asset('assets/vendor/aos/dist/aos.js') }}"></script>

        <!-- App Script -->
        <script src="{{ asset('assets/js/hope-ui.js') }}" defer></script>
        
        <script src="{{ asset('assets/js/sweetalert.js') }}"></script>

        <!-- Fullcalender CSS -->
        <link rel='stylesheet' href='{{ asset('assets/vendor/fullcalendar/core/main.css')}}' />
        <link rel='stylesheet' href='{{ asset('assets/vendor/fullcalendar/daygrid/main.css')}}' />
        <link rel='stylesheet' href='{{ asset('assets/vendor/fullcalendar/timegrid/main.css')}}' />
        <link rel='stylesheet' href='{{ asset('assets/vendor/fullcalendar/list/main.css')}}' />

        <script src="https://cdn.datatables.net/buttons/2.3.6/js/dataTables.buttons.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.html5.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.print.min.js"></script>


        <style>
            :root {
                --bs-primary: #01A94D;
                --bs-primary-tint-40: #01A94D;
                --bs-primary-shade-20: #01A94D;
            }

            body {
                --sidebar-width: 18rem;
            }
            .no-data-image {
                max-width: 300px;
            }
            .no-data-heading {
                font-size: 2rem;
            }
            .no-data-subtext {
                font-size: 1.25rem;
            }

            /* Media query for mobile screens (max-width: 576px is for small devices) */
            @media (max-width: 576px) {
                .no-data-image {
                    max-width: 200px;
                }
                .no-data-heading {
                    font-size: 1.5rem;
                }
                .no-data-subtext {
                    font-size: 1rem;
                }
            }

            .breadcrumb-item+.breadcrumb-item::before {
                color: #fff;
            }

            .nav-link {
                color: #000;
            }

            .nav {
                --bs-nav-link-hover-color: #01A94D;
            }

            .accordion-item {
                color: #000;
                background-color: var(--bs-accordion-bg);
                border: var(--bs-accordion-border-width) solid rgb(255 255 255 / 13%);
            }

            .custom-tabs .nav-link {
                color: #000; /* Adjust the color you want for the text */
                border: none;
                padding-bottom: 10px; /* Add padding for spacing between text and border */
                background-color: #fff;
            }

            .custom-tabs .nav-link.active {
                color: var(--bs-primary); /* Same color as the text */
                border-bottom: 3px solid var(--bs-primary); /* Create the bottom colored line */
            }

            .custom-tabs .nav-link:hover {
                color: #087539; /* Optional: color change on hover */
            }

            .custom-tabs .nav-link:focus {
                box-shadow: none; /* Remove default Bootstrap focus outline */
            }

            
        </style>
    </head>
    <body class="">
        <!-- loader Start -->
        {{-- <div id="loading">
            <div class="loader simple-loader">
                <div class="loader-body"></div>
            </div>    
        </div> --}}
        <!-- loader END -->
    
        @include('partials.sidebar')

        @yield('main-content')

        <!-- Wrapper End-->

        <!-- Fullcalender Javascript -->
    </body>
</html> 