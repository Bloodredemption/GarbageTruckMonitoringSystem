<!-- Sticky Header -->
<header class="sticky-header d-flex justify-content-between align-items-center p-3">
    <img src="{{ asset('assets/images/logo.png')}}" alt="GTMS Logo" class="logo-img">
    
    <div class="d-flex align-items-center">
        <!-- Notification Icon with Dropdown -->
        <div class="dropdown me-3">
            <i class="bx bxs-bell notification-icon dropdown-toggle" data-count="0" id="notificationDropdown" data-bs-toggle="dropdown" aria-expanded="false"></i>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="notificationDropdown" id="notificationDropdownMenu">
                <li>
                    <h6 class="dropdown-header">Notifications</h6>
                </li>
                <li><a class="dropdown-item" href="#">No new notifications</a></li>
            </ul>
        </div>

        <!-- Profile Picture with Dropdown -->
        <div class="dropdown">
            <img src="{{ asset('assets/images/avatars/01.png')}}" alt="Profile Picture" class="profile-img dropdown-toggle" id="profileDropdown" data-bs-toggle="dropdown" aria-expanded="false">
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="profileDropdown">
                <li><a class="dropdown-item" href="#">Profile</a></li>
                <li><hr class="dropdown-divider"></li>
                <li>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                    <a class="dropdown-item" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        Logout
                    </a>
                  </li>
            </ul>
        </div>
    </div>
</header>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    // Function to fetch notifications and update the dropdown
    function loadNotifications() {
        $.ajax({
            url: "{{ route('notifications.get') }}", // Route for fetching notifications
            method: "GET",
            success: function (data) {
                // Clear existing notifications
                $('#notificationDropdownMenu').empty();
                const notificationCount = data.length;

                // Set notification count
                if (notificationCount > 0) {
                    // Append notifications header
                    $('#notificationDropdownMenu').append('<li><h6 class="dropdown-header">Notifications</h6></li>');
                    data.forEach(function(notification) {
                        $('#notificationDropdownMenu').append('<li><a class="dropdown-item" href="#">' + notification.notification_msg + '</a></li>');
                    });
                } else {
                    // No notifications
                    $('#notificationDropdownMenu').append('<li><h6 class="dropdown-header">Notifications</h6></li>');
                    $('#notificationDropdownMenu').append('<li><a class="dropdown-item" href="#">No new notifications</a></li>');
                }

                // Update the data attribute instead of directly changing content
                $('.notification-icon').data('count', notificationCount);

            },
            error: function (error) {
                console.log("Error fetching notifications:", error);
            }
        });
    }

    // Trigger the function when the dropdown is clicked
    $(document).on('click', '#notificationDropdown', function () {
        loadNotifications();
    });
</script>
