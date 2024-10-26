@extends('d-layout')

@section('main-content')

<main class="main-content">
    <div class="container">
        <!-- Profile Info Section -->
        <div class="row justify-content-center my-4">
            <div class="col-md-6 col-sm-8 col-12 text-center">
                <div class="card">
                    <div class="card-body">
                        <img src="{{ asset('assets/images/avatars/01.png')}}" alt="Profile Picture" class="rounded-circle mb-3" style="width: 100px; height: 100px;">
                        <h5 class="card-title">MENRO Driver</h5>
                        <p class="card-text">+639876543210</p>
                        <p class="card-text">Role: Driver</p>
                        {{-- <a href="profile/edit" class="btn btn-primary">Edit Profile</a> --}}
                    </div>
                </div>
            </div>
        </div>

        <!-- Original Home Page Content -->
        <div class="container text-center">
            <h5></h5>
        </div>
    </div>
</main>

<script>
    // Function to check for new notifications
    function checkForNotifications() {
        // This should ideally be replaced with a real API call to check for notifications
        const hasNewNotification = true; // Replace with actual condition
    
        if (hasNewNotification) {
            Swal.fire({
                icon: 'info',
                title: 'New Notification',
                text: 'You have a new notification!',
                confirmButtonText: 'View',
                timer: 5000 // Auto-close after 5 seconds
            });
        }
    }
    
    // Call the function on page load
    document.addEventListener("DOMContentLoaded", checkForNotifications);
</script>

@endsection