<aside class="sidebar sidebar-default sidebar-white sidebar-base navs-rounded-all ">
    <div class="sidebar-header d-flex align-items-center justify-content-start">
        <a href="../dashboard/index.html" class="navbar-brand">
            <!--Logo start-->
            <!--logo End-->
            
            <!--Logo start-->
            <div class="logo-main">
                <div class="logo-normal">
                    <svg class=" icon-30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect x="-0.757324" y="19.2427" width="28" height="4" rx="2" transform="rotate(-45 -0.757324 19.2427)" fill="currentColor"/>
                        <rect x="7.72803" y="27.728" width="28" height="4" rx="2" transform="rotate(-45 7.72803 27.728)" fill="currentColor"/>
                        <rect x="10.5366" y="16.3945" width="16" height="4" rx="2" transform="rotate(45 10.5366 16.3945)" fill="currentColor"/>
                        <rect x="10.5562" y="-0.556152" width="28" height="4" rx="2" transform="rotate(45 10.5562 -0.556152)" fill="currentColor"/>
                    </svg>
                </div>
                <div class="logo-mini">
                    <svg class=" icon-30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect x="-0.757324" y="19.2427" width="28" height="4" rx="2" transform="rotate(-45 -0.757324 19.2427)" fill="currentColor"/>
                        <rect x="7.72803" y="27.728" width="28" height="4" rx="2" transform="rotate(-45 7.72803 27.728)" fill="currentColor"/>
                        <rect x="10.5366" y="16.3945" width="16" height="4" rx="2" transform="rotate(45 10.5366 16.3945)" fill="currentColor"/>
                        <rect x="10.5562" y="-0.556152" width="28" height="4" rx="2" transform="rotate(45 10.5562 -0.556152)" fill="currentColor"/>
                    </svg>
                </div>
            </div>
            <!--logo End-->
            
            
            
            
            <h4 class="logo-title">Hope UI</h4>
        </a>
        <div class="sidebar-toggle" data-toggle="sidebar" data-active="true">
            <i class="icon">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M4.25 12.2744L19.25 12.2744" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                    <path d="M10.2998 18.2988L4.2498 12.2748L10.2998 6.24976" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                </svg>
            </i>
        </div>
    </div>
    <div class="sidebar-body pt-0 data-scrollbar">
        <div class="sidebar-list">
            <!-- Sidebar Menu Start -->
            <ul class="navbar-nav iq-main-menu" id="sidebar-menu">
                <li class="nav-item static-item">
                    <a class="nav-link static-item disabled" href="#" tabindex="-1">
                        <span class="default-icon">Home</span>
                        <span class="mini-icon">-</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('admin/dashboard') ? 'active' : '' }}" aria-current="page" href="{{ route('dashboard') }}">
                        <i class="icon">
                            <svg width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="icon-20">
                                <path opacity="0.4" d="M16.0756 2H19.4616C20.8639 2 22.0001 3.14585 22.0001 4.55996V7.97452C22.0001 9.38864 20.8639 10.5345 19.4616 10.5345H16.0756C14.6734 10.5345 13.5371 9.38864 13.5371 7.97452V4.55996C13.5371 3.14585 14.6734 2 16.0756 2Z" fill="currentColor"></path>
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M4.53852 2H7.92449C9.32676 2 10.463 3.14585 10.463 4.55996V7.97452C10.463 9.38864 9.32676 10.5345 7.92449 10.5345H4.53852C3.13626 10.5345 2 9.38864 2 7.97452V4.55996C2 3.14585 3.13626 2 4.53852 2ZM4.53852 13.4655H7.92449C9.32676 13.4655 10.463 14.6114 10.463 16.0255V19.44C10.463 20.8532 9.32676 22 7.92449 22H4.53852C3.13626 22 2 20.8532 2 19.44V16.0255C2 14.6114 3.13626 13.4655 4.53852 13.4655ZM19.4615 13.4655H16.0755C14.6732 13.4655 13.537 14.6114 13.537 16.0255V19.44C13.537 20.8532 14.6732 22 16.0755 22H19.4615C20.8637 22 22 20.8532 22 19.44V16.0255C22 14.6114 20.8637 13.4655 19.4615 13.4655Z" fill="currentColor"></path>
                            </svg>
                        </i>
                        <span class="item-name">Dashboard</span>
                    </a>
                </li>
                 
                <li><hr class="hr-horizontal"></li>
                <li class="nav-item static-item">
                    <a class="nav-link static-item disabled" href="#" tabindex="-1">
                        <span class="default-icon">Manage</span>
                        <span class="mini-icon">-</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('admin/live-tracking') ? 'active' : '' }}" href="{{ route('live-tracking') }}">
                        <i class="icon">
                            @php
                                $iconPath = request()->is('admin/live-tracking') 
                                    ? asset('assets/images/icons/Address-1.png') 
                                    : asset('assets/images/icons/Address.png');
                            @endphp
                            <img src="{{ $iconPath }}" width="80%" alt="">
                        </i>
                        <span class="item-name">Live Tracking</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('admin/collection-schedule') ? 'active' : '' }}"  href="{{ route('collection-schedule') }}">
                        <i class="icon">
                            @php
                                $iconPath = request()->is('admin/collection-schedule') 
                                    ? asset('assets/images/icons/Schedule.png') 
                                    : asset('assets/images/icons/Schedule-1.png');
                            @endphp
                            <img src="{{ $iconPath }}" width="80%" alt="">
                        </i>
                        <span class="item-name">Collection Schedule</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('admin/waste-composition') ? 'active' : '' }}"  href="{{ route('waste-composition') }}">
                        <i class="icon">
                            @php
                                $iconPath = request()->is('admin/waste-composition') 
                                    ? asset('assets/images/icons/Waste Separation.png') 
                                    : asset('assets/images/icons/Waste Separation-1.png');
                            @endphp
                            <img src="{{ $iconPath }}" width="80%" alt="">
                        </i>
                        <span class="item-name">Waste Composition</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('admin/waste-conversion') ? 'active' : '' }}"  href="{{ route('waste-conversion') }}">
                        <i class="icon">
                            @php
                                $iconPath = request()->is('admin/waste-conversion') 
                                    ? asset('assets/images/icons/Recycle.png') 
                                    : asset('assets/images/icons/Recycle-1.png');
                            @endphp
                            <img src="{{ $iconPath }}" width="80%" alt="">
                        </i>
                        <span class="item-name">Waste Conversion</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('admin/dump-trucks') ? 'active' : '' }}"  href="{{ route('dump-trucks') }}">
                        <i class="icon">
                            @php
                                $iconPath = request()->is('admin/dump-trucks') 
                                    ? asset('assets/images/icons/Garbage Truck.png') 
                                    : asset('assets/images/icons/Garbage Truck-1.png');
                            @endphp
                            <img src="{{ $iconPath }}" width="80%" alt="">
                        </i>
                        <span class="item-name">Dump Trucks</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('admin/barangay') ? 'active' : '' }}"  href="{{ route('barangay') }}">
                        <i class="icon">
                            @php
                                $iconPath = request()->is('admin/barangay') 
                                    ? asset('assets/images/icons/Museum.png') 
                                    : asset('assets/images/icons/Museum-1.png');
                            @endphp
                            <img src="{{ $iconPath }}" width="80%" alt="">
                        </i>
                        <span class="item-name">Barangay</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('admin/notifications') ? 'active' : '' }}"  href="{{ route('notifications') }}">
                        <i class="icon">
                            @php
                                $iconPath = request()->is('admin/notifications') 
                                    ? asset('assets/images/icons/Notification.png') 
                                    : asset('assets/images/icons/Notification-1.png');
                            @endphp
                            <img src="{{ $iconPath }}" width="80%" alt="">
                        </i>
                        <span class="item-name">Notifications</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link "  href="../dashboard/admin.html">
                        <i class="icon">
                            <img src="{{ asset('assets/images/icons/Messaging-1.png') }}" width="80%" alt="">
                        </i>
                        <span class="item-name">Residents Concerns</span>
                    </a>
                </li>
                <li><hr class="hr-horizontal"></li>
                <li class="nav-item static-item">
                    <a class="nav-link static-item disabled" href="#" tabindex="-1">
                        <span class="default-icon">Others</span>
                        <span class="mini-icon">-</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link "  href="../dashboard/admin.html">
                        <i class="icon">
                            <img src="{{ asset('assets/images/icons/Users-1.png') }}" width="80%" alt="">
                        </i>
                        <span class="item-name">Users</span>
                    </a>
                </li>
                <li class="nav-item mb-5">
                    <a class="nav-link "  href="../dashboard/admin.html">
                        <i class="icon">
                            <img src="{{ asset('assets/images/icons/Help-1.png') }}" width="80%" alt="">
                        </i>
                        <span class="item-name">Help</span>
                    </a>
                </li>
            </ul>
            <!-- Sidebar Menu End -->        
        </div>
    </div>
    <div class="sidebar-footer"></div>
</aside>