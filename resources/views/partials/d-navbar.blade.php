<!-- Sticky Bottom Navigation -->
<nav class="sticky-bottom-nav text-center py-2">
    <div class="container d-flex justify-content-around">
        <a href="{{ route('d.dashboard') }}" class="nav-link {{ request()->is('driver/dashboard') ? 'active' : '' }} d-flex align-items-center">
            <i class='bx bxs-home nav-icon'></i><span class="ms-2">Home</span>
        </a>
        <a href="{{ route('wc.index') }}" class="nav-link {{ request()->is('driver/waste-composition') ? 'active' : '' }} d-flex align-items-center">
            <i class='bx bxs-trash nav-icon'></i><span class="ms-2">Waste</span>
        </a>
        <a href="{{ route('dcs.index') }}" class="nav-link {{ request()->is('driver/collection-schedule') ? 'active' : '' }} d-flex align-items-center">
            <i class='bx bxs-calendar nav-icon'></i><span class="ms-2">Schedule</span>
        </a>
    </div>
</nav>