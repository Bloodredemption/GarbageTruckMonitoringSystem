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
        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
        <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
        
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
        <link href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.min.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js"></script>
        
        <!-- Fullcalender CSS -->
        <link rel='stylesheet' href='{{ asset('assets/vendor/fullcalendar/core/main.css')}}' />
        <link rel='stylesheet' href='{{ asset('assets/vendor/fullcalendar/daygrid/main.css')}}' />
        <link rel='stylesheet' href='{{ asset('assets/vendor/fullcalendar/timegrid/main.css')}}' />
        <link rel='stylesheet' href='{{ asset('assets/vendor/fullcalendar/list/main.css')}}' />
        <script src="https://cdn.jsdelivr.net/npm/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>

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

            .bootstrap-tagsinput {
                background-color: #fff;
                border: 1px solid #eee;
                box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
                display: inline-block;
                padding: 4px 6px;
                color: #555;
                vertical-align: middle;
                border-radius: 4px;
                width: 100%;
                line-height: 25px;
                cursor: text;
            }
            .bootstrap-tagsinput input {
                border: none;
                box-shadow: none;
                outline: none;
                background-color: transparent;
                padding: .5rem 1rem;
                margin: 0;
                width: auto;
            }
            .bootstrap-tagsinput.form-control input::-moz-placeholder {
                color: #777;
                opacity: 1;
            }
            .bootstrap-tagsinput.form-control input:-ms-input-placeholder {
                color: #777;
            }
            .bootstrap-tagsinput.form-control input::-webkit-input-placeholder {
                color: #777;
            }
            .bootstrap-tagsinput input:focus {
                border: none;
                box-shadow: none;
            }
            .bootstrap-tagsinput .tag {
                position: relative;
                display: inline-block;
                font-size: .875rem;
                color: #77838f;
                background-color: rgba(119, 131, 143, 0.1);
                border-radius: 0.3125rem;
                padding: .25rem 0.8rem .25rem;
                margin-bottom: .25rem;
                margin-right: 0;
            }
            .bootstrap-tagsinput .tag [data-role="remove"] {
                margin-left: 8px;
                cursor: pointer;
            }
            .bootstrap-tagsinput .tag [data-role="remove"]:after {
                content: "x";
                padding: 0px 2px;
            }
            .bootstrap-tagsinput .tag [data-role="remove"]:hover {
                box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.2), 0 1px 2px rgba(0, 0, 0, 0.05);
            }
            .bootstrap-tagsinput .tag [data-role="remove"]:hover:active {
                box-shadow: inset 0 3px 5px rgba(0, 0, 0, 0.125);
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
        <script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>
        <script>
            Pusher.logToConsole = true;

            var pusher = new Pusher('6067e4f4c5d9c44a0efa', {
                cluster: 'ap1'
            });

            var channel = pusher.subscribe('my-channel');
            channel.bind('complaint-submitted', function(data) {
                Swal.fire({
                    title: 'New Complaint Submitted',
                    text: `A new complaint has been submitted.`,
                    icon: 'info',
                    confirmButtonText: 'OK'
                });
            });
        </script>
    </body>
</html> 