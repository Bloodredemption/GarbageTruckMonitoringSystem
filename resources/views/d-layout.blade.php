<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GTMS Driver</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href='https://cdn.datatables.net/2.1.8/css/dataTables.bootstrap5.css' rel='stylesheet'>
    <link rel="stylesheet" href="{{ asset('assets/css/core/libs.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/col-sched.css') }}" />

    <style>
        @import url("https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&display=swap");

        /* Sticky header and bottom nav styling */
        .sticky-header {
            position: sticky;
            top: 0;
            z-index: 1000;
            background-color: #01A94D; /* Example background */
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
            color: #fff;
            position: relative;
        }

        /* Optional: Add a notification count bubble */
        .notification-icon::after {
            content: attr(data-count);
            position: absolute;
            top: -5px;
            right: -10px;
            background-color: red;
            color: white;
            font-size: 12px;
            border-radius: 50%;
            padding: 2px 4px;
        }

        /* Responsive adjustments */
        @media (min-width: 768px) {
            .logo-img {
                width: 150px; /* Increase logo size for larger screens */
            }
        }

        /* Further adjustments for very small screens (mobile) */
        @media (max-width: 576px) {
            .logo-img {
                width: 150px; /* Smaller logo for mobile */
            }
        }
        
        /* Sticky bottom nav styling */
        .sticky-bottom-nav {
            font-size: 1rem;
            position: fixed;
            bottom: 0;
            width: 100%;
            background-color: #f8f9fa;
            z-index: 1000;
            border-top: 1px solid #dee2e6; /* Optional border for better separation */
        }

        /* Default nav link and icon color */
        .nav-link {
            color: #000; /* Default text color */
            padding: 10px 15px;
            border-radius: 10px; /* Rounded corners for nav buttons */
            transition: all 0.3s ease-in-out; /* Smooth transition for hover and active states */
            display: inline-flex;
            align-items: center;
        }

        /* Active menu item styling */
        .nav-link.active {
            width: 35%;
            background-color: #01A94D; /* Inverse background color for active state */
            color: #fff !important; /* Inverse text color for active */
            border-radius: 10px; /* Rounded button appearance */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); /* Add shadow to make it stand out */
            
            /* Flexbox properties to center text and icon */
            display: flex;
            justify-content: center; /* Center horizontally */
            align-items: center; /* Center vertically */
            text-align: center; /* Ensure the text is centered */
        }

        /* Ensure the icon inside the active link also changes color */
        .nav-link.active .nav-icon {
            color: #fff; /* Icon color changes to match the text when active */
        }

        /* Optional: Add spacing between the icon and the text */
        .nav-icon {
            font-size: 24px;
        }

        /* Add margin between icon and text */
        .nav-link span {
            margin-left: 8px; /* Add spacing between the icon and text */
        }

        .main-content {
            padding-top: 20px; /* Space for sticky header */
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
