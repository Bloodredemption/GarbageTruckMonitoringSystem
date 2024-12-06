@extends('dd-layout')

<header class="sticky-header d-flex justify-content-between align-items-center p-3 position-relative">
    <!-- Back Button -->
    <a href="javascript:void(0);" onclick="goBack()" class="text-decoration-none position-absolute" style="left: 1rem;">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#01A94D" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-arrow-left">
            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
            <path d="M5 12l14 0"/>
            <path d="M5 12l6 6"/>
            <path d="M5 12l6 -6"/>
        </svg>
    </a>

    <!-- Title -->
    <span class="fw-bold flex-grow-1 text-center">Messages</span>

    <div class="dropdown position-absolute" style="right: 1rem;">
        <!-- Dropdown toggle icon without arrow -->
        <a href="#" class="dropdown-toggle no-arrow" data-bs-toggle="dropdown" aria-expanded="false">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#01A94D" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-dots">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                <path d="M5 12m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" />
                <path d="M12 12m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" />
                <path d="M19 12m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" />
            </svg>
        </a>
    
        <!-- Dropdown menu -->
        <ul class="dropdown-menu dropdown-menu-end">
            <li>
                <a class="dropdown-item" href="#" id="markAllAsRead">
                    Mark as Read
                </a>
            </li>
        </ul>
    </div>
</header>

@section('main-content')

<main class="main-content">
    <div class="container">

        <div class="container mt-4">
            <div class="d-flex overflow-auto custom-scrollbar mb-3">
                <a href="#" class="list-group-item message-item">
                    <div class="text-center me-3">
                    <div class="position-relative">
                        <img src="../assets/images/avatars/01.png" alt="User" class="rounded-circle" style="width: 50px; height: 50px;">
                    </div>
                    <div style="width: 60px; font-size: 13px; white-space: normal; word-wrap: break-word;">MENRO Admin</div>
                    </div>
                </a>
            </div>
              
            <div id="messagesContainer">
                <div id="messagesBlock" class="list-group">
                    <a href="#" class="list-group-item list-group-item-action d-flex align-items-start border-0 message-item">
                        <img src="../assets/images/avatars/01.png" 
                            alt="User" 
                            class="rounded-circle me-3" 
                            style="width: 50px; height: 50px;">

                        <div class="flex-grow-1">
                            <div class="d-flex justify-content-between align-items-center">
                                <span>MENRO Admin</span>
                            </div>
                            <p class="text-muted mb-0">
                                Sample Message
                            </p>
                            <span class="message-time">1 minute ago</span>
                        </div>
                    </a>

                    
                </div>
            </div>
        </div>

        {{-- <div class="mt-4 mb-4">
            <div class="text-center text-muted">
                <span style="font-size: 0.8rem;">End of Results</span><br>
            </div>
        </div> --}}
    </div>
</main>

<div class="toast-container bottom-0 start-50 translate-middle-x p-3" style="width: 220px;">
    <div id="userSuccessToast" class="toast align-items-center text-bg-success border-0" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="text-center">
            <div id="toastMessage" class="toast-body">
                <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="currentColor"  class="icon icon-tabler icons-tabler-filled icon-tabler-circle-check"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M17 3.34a10 10 0 1 1 -14.995 8.984l-.005 -.324l.005 -.324a10 10 0 0 1 14.995 -8.336zm-1.293 5.953a1 1 0 0 0 -1.32 -.083l-.094 .083l-3.293 3.292l-1.293 -1.292l-.094 -.083a1 1 0 0 0 -1.403 1.403l.083 .094l2 2l.094 .083a1 1 0 0 0 1.226 0l.094 -.083l4 -4l.083 -.094a1 1 0 0 0 -.083 -1.32z" /></svg>
                Marked as Read
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        // markAllNotificationsAsRead();  // Trigger the function on page load
    });
    
    function markAllNotificationsAsRead() {
        $.ajax({
            url: '{{ route("notifications.markAllAsRead") }}',
            method: 'POST',
            data: {
                _token: '{{ csrf_token() }}'
            },
            success: function(response) {
                if (response.success) {
                    // Hide icons for unread notifications
                    $('.notification-status').each(function() {
                        $(this).find('svg').addClass('d-none'); 
                    });
                }

                // Set the toast message based on the response
                $('#toastMessage').text(response.message);

                // Trigger Bootstrap toast
                var toastEl = new bootstrap.Toast(document.getElementById('userSuccessToast'));
                toastEl.show();
            },
            error: function(xhr) {
                console.error(xhr.responseText);
            }
        });
    }

    $('#markAllAsRead').click(function() {
        $.ajax({
            url: '{{ route("notifications.markAllAsRead") }}',
            method: 'POST',
            data: {
                _token: '{{ csrf_token() }}'
            },
            success: function(response) {
                if (response.success) {
                    $('.notification-status').each(function() {
                        $(this).find('svg').addClass('d-none'); // Hide icons for unread notifications
                    });
                }
                
                // Set the toast message based on the response
                $('#toastMessage').text(response.message);

                // Trigger Bootstrap toast instead of SweetAlert
                var toastEl = new bootstrap.Toast(document.getElementById('userSuccessToast'));
                toastEl.show();
            },
            error: function(xhr) {
                console.error(xhr.responseText);
            }
        });
    });
</script>

@endsection