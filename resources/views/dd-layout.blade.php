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
    <link rel="stylesheet" href="{{ asset('assets/css/core/libs.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/col-sched.css') }}" />
    
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&display=swap");

        :root {
            --bs-primary: #01A94D;
            --bs-primary-rgb: 1, 169, 77;
        }
        
        .btn-primary {
            --bs-btn-bg: #01A94D;
            --bs-btn-border-color: #01A94D;
            --bs-btn-hover-bg: #0e8142;
            --bs-btn-hover-border-color: #0e8142;
            --bs-btn-active-bg: #01A94D;
        }  

        .custom-border {
            border: 1px solid #cccccc96; /* Default border color */
            box-shadow: none;
            transition: border-color 0.3s ease;
        }

        .custom-border:active,
        .custom-border:focus,
        .custom-border:focus-within {
            border-color: #01A94D; /* Change to desired border color on click */
            box-shadow: none; /* Disable Bootstrap default shadow */
            outline: none;
        }

        /* Sticky header and bottom nav styling */
        .sticky-header {
            position: sticky;
            top: 0;
            z-index: 1000;
            background-color: #fff; /* Example background */
            padding: 15px;
            font-size: 1rem;
            margin-top: 10px;
        }

        .left-icon {
            font-size: 1.2rem;
            left: 10px; /* Adjust as needed for spacing from the left edge */
            top: 50%; /* Center vertically relative to the header */
            transform: translateY(-50%); /* Correct the vertical alignment */
            cursor: pointer; /* Change cursor to indicate it's clickable */
            z-index: 1; /* Ensure the icon is above the text */
        }

        .position-relative {
            position: relative;
        }

        .password-toggle-btn {
            position: absolute;
            top: 70%;
            right: 15px;
            transform: translateY(-50%);
            background: none;
            border: none;
            cursor: pointer;
            padding: 0;
        }

        .password-toggle-btn svg {
            width: 24px;
            height: 24px;
            color: #6c757d;
        }

        .password-toggle-btn:hover svg {
            color: #495057;
        }

    </style>
</head>
<body>

    @yield('main-content')
    
    <script>
        function goBack() {
            window.history.back();
        }
    </script>
</body>
</html>
