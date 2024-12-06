<!-- Sticky Header -->
<header class="sticky-header d-flex justify-content-between align-items-center p-3">
    <img src="{{ asset('assets/images/newlogo.png')}}" alt="GTMS Logo" class="logo-img">
    
    <div class="d-flex align-items-center">
        <!-- Notification Icon with Dropdown -->
        <div class="notification-icon-container me-3">
            <a href="{{ route('notif.index') }}" id="notificationIcon" style="cursor: pointer;">
                {{-- <i class="bx bxs-bell notification-icon"></i> --}}
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: #01A94D;transform: ;msFilter:;"><path d="M12 22a2.98 2.98 0 0 0 2.818-2H9.182A2.98 2.98 0 0 0 12 22zm7-7.414V10c0-3.217-2.185-5.927-5.145-6.742C13.562 2.52 12.846 2 12 2s-1.562.52-1.855 1.258C7.185 4.074 5 6.783 5 10v4.586l-1.707 1.707A.996.996 0 0 0 3 17v1a1 1 0 0 0 1 1h16a1 1 0 0 0 1-1v-1a.996.996 0 0 0-.293-.707L19 14.586z"></path></svg>
            </a>
        </div>
    </div>
</header>