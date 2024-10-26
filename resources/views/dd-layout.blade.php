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
