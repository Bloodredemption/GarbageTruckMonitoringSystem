<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GTMS Driver</title>
    <!-- Bootstrap 5 CSS -->
    <link rel="shortcut icon" href="{{ asset('assets/images/bali_logo.png') }}" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href='https://cdn.datatables.net/2.1.8/css/dataTables.bootstrap5.css' rel='stylesheet'>
    <link rel="stylesheet" href="{{ asset('assets/css/core/libs.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/col-sched.css') }}" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&display=swap");

        
        
        /* Sticky header and bottom nav styling */
        .sticky-header {
            position: sticky;
            top: 0;
            z-index: 1000;
            background-color: #fff; /* Example background */
            padding: 10px;
        }

        /* Logo styling */
        .logo-img {
            width: 35%; /* Adjust logo size */
        }

        /* Profile image styling */
        .profile-img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            cursor: pointer;
            object-fit: cover;
            border: 2px solid #fff; /* Optional border for profile picture */
        }

        /* Notification icon styling */
        .notification-icon {
            font-size: 24px;
            cursor: pointer;
            color: #01A94D;
            position: relative;
        }

        /* Optional: Add a notification count bubble */
        .notification-icon::after {
            position: absolute;
            top: -5px;
            right: -10px;
            color: white;
            font-size: 12px;
            border-radius: 50%;
            padding: 2px 4px;
        }

        /* Responsive adjustments */
        @media (min-width: 768px) {
            .logo-img {
                width: 150px;
            }

            .d-actions {
                --bs-btn-padding-y: .25rem;
                --bs-btn-padding-x: .5rem;
                --bs-btn-font-size: .75rem;
            }

            .sticky-bottom-nav {
                width: 95%;
                padding: 8px 10px;
            }

            .nav-link {
                font-size: 0.9rem;
                padding: 6px;
            }
        }

        /* Further adjustments for very small screens (mobile) */
        @media (max-width: 400px) {
            .logo-img {
                width: 150px;
            }
            
            .d-actions {
                --bs-btn-padding-y: .15rem;
                --bs-btn-padding-x: .3rem;
                --bs-btn-font-size: .55rem;
            }

            /* New styles for small screens */
            .sticky-bottom-nav {
                width: 100%;
                bottom: 10px;
                font-size: 0.8rem;
            }

            .nav-link {
                font-size: 0.8rem;
                padding: 4px;
            }

            .nav-icon {
                font-size: 18px;
            }
        }
        
        /* Sticky floating bottom nav styling */
        .sticky-bottom-nav {
            font-size: 1rem;
            position: fixed;
            bottom: 20px;
            left: 50%;
            transform: translateX(-50%);
            width: 90%;
            max-width: 600px;
            background-color: #fff;
            z-index: 1000;
            border-radius: 15px;
            box-shadow: 0 8px 16px rgba(99, 99, 99, 0.2);
        }

        /* Make container responsive to fit all links */
        .nav-link {
            flex: 1;
            color: #585858;
            padding: 8px;
            border-radius: 10px;
            transition: all 0.3s ease-in-out;
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
        }

        .sticky-bottom-nav .nav-link {
            display: flex !important; /* Ensure flex layout is applied */
            flex-direction: column !important; /* Stack icon and text vertically */
            align-items: center !important; /* Center content */
            justify-content: center !important; /* Center content vertically */
        }

        .sticky-bottom-nav .nav-icon {
            margin-bottom: 4px; /* Space between icon and text */
        }


        /* Active link color only */
        .nav-link.active {
            color: #01A94D !important;
        }

        .nav-icon {
            font-size: 20px;
            margin-bottom: 4px; /* Space between icon and text */
        }

        .nav-link span {
            font-size: 0.85rem; /* Smaller font for text */
        }

        .main-content {
            padding-top: 0; /* Space for sticky header */
            padding-bottom: 70px; /* Space for sticky bottom nav */
        }
        
        /* Floating button */
        .floating-btn {
            position: fixed;
            bottom: 100px; /* Distance from the bottom, adjust if necessary */
            right: 20px; /* Distance from the right */
            background-color: #01A94D;
            color: #fff;
            border-radius: 50%;
            width: 50px;
            height: 50px;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 24px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            z-index: 99;
            transition: background-color 0.3s ease;
            text-decoration: none;
        }

        .floating-btn:hover {
            background-color: #008d3c; /* Darker shade on hover */
        }

        /* Ensure the icon inside the floating button is centered */
        .floating-btn i {
            font-size: 28px; /* Size of the plus (+) icon */
        }

        /* Set the font size for the table headers */
        #wc-tbl thead th {
            font-size: 0.8rem; /* 1rem for columns */
        }

        /* Set the font size for the data rows */
        #wc-tbl tbody td {
            font-size: 13px; /* 13px for data rows */
        }

        /* Adjust font size of the search input */
        .dataTables_filter input {
            font-size: 13px; /* Adjust the search input text size */
            height: 30px; /* Adjust input height if necessary */
        }

        /* Adjust the placeholder text */
        ::placeholder {
            font-size: 13px; /* Adjust the placeholder text size */
            color: #888; /* Optional: You can also change the placeholder color */
        }

        /* Adjust the search label text (if any) */
        .dataTables_filter label {
            font-size: 0.8rem; /* Adjust search label text */
        }

        .dt-info, .dt-search-1 {
            font-size: 0.8rem;
        }

        .menu-item {
            display: flex;
            align-items: center;
            padding: 10px;
            background-color: #fff;
            border-radius: 0.5rem;
            text-decoration: none;
            color: #000;
            width: 100%;
            transition: background-color 0.2s ease;
        }
        .menu-item:hover {
            background-color: #f8f9fa;
        }
        .icon-circle {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 35px;
            height: 35px;
            border-radius: 50%;
            font-size: 1.2rem;
        }
        .menu-text {
            flex-grow: 1;
            margin-left: 10px;
            font-size: 0.9rem;
        }
    </style>
</head>
<body>

    @include('partials.d-header')

    @yield('main-content')

    @include('partials.d-navbar')

    <!-- Bootstrap 5 JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.bootstrap5.js"></script>
    <script src="{{ asset('assets/js/sweetalert.js') }}"></script>
    
</body>
</html>
