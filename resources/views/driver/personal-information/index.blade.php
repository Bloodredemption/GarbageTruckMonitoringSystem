@extends('dd-layout')

@section('main-content')

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
    <span class="fw-semibold flex-grow-1 text-center">Personal Information</span>

    <!-- Home Icon -->
    <a href="{{ route('d.dashboard') }}" class="position-absolute" style="right: 1rem;">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="#01A94D" class="nav-icon">
            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
            <path d="M12.707 2.293l9 9c.63 .63 .184 1.707 -.707 1.707h-1v6a3 3 0 0 1 -3 3h-1v-7a3 3 0 0 0 -2.824 -2.995l-.176 -.005h-2a3 3 0 0 0 -3 3v7h-1a3 3 0 0 1 -3 -3v-6h-1c-.89 0 -1.337 -1.077 -.707 -1.707l9 -9a1 1 0 0 1 1.414 0m.293 11.707a1 1 0 0 1 1 1v7h-4v-7a1 1 0 0 1 .883 -.993l.117 -.007z"/>
        </svg>
    </a>
</header>

<main class="main-content">
    <div class="container">
        <div class="row justify-content-center my-4">
            <div class="col-md-6 col-sm-8 col-12 text-center">
                <div class="card-body d-flex flex-column align-items-center">
                    <div class="d-flex flex-column align-items-center">
                        <img src="{{ asset('assets/images/avatars/01.png')}}" alt="Profile Picture" class="rounded-circle mb-1" style="width: 100px; height: 100px;">
                        <a href="#" style="background: #01a94d10; border-radius: 15px; font-size: 12px; align-items: center; color: #01A94D;" class="btn btn-sm fw-bold mb-2">
                            Change Photo
                            <svg  xmlns="http://www.w3.org/2000/svg"  width="15"  height="15"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-edit"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1" /><path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z" /><path d="M16 5l3 3" /></svg>
                        </a>
                    </div>
                    <h5 class="card-title mt-2 mb-2">MENRO Driver</h5>
                    <p style="font-size: 0.9rem;" class="card-text">Truck Driver</p>
                </div>
            </div>
        </div>

        <div class="list-group" style="font-size: 0.9rem;">
            <div class="list-group-item border-0 border-bottom pb-2">
                <small class="text-muted d-block">Fullname</small>
                <span class="d-block mt-1 fw-semibold">MENRO Driver</span>
            </div>
            <div class="list-group-item border-0 border-bottom pb-2">
                <small class="text-muted d-block">Contact No.</small>
                <span class="d-block mt-1 fw-semibold">+639876543210</span>
            </div>
            <div class="list-group-item border-0 border-bottom pb-2">
                <small class="text-muted d-block">Username</small>
                <span class="d-block mt-1 fw-semibold">menrodriver</span>
            </div>
            <div class="list-group-item border-0 border-bottom pb-2">
                <small class="text-muted d-block">Password</small>
                <span class="d-block mt-1 fw-semibold">●●●●●●●●●</span>
                <a href="#" style="background: #01a94d10; border-radius: 15px; font-size: 12px; align-items: center; color: #01A94D;" class="btn btn-sm fw-bold mb-2 mt-2">
                    Change Password
                    <svg  xmlns="http://www.w3.org/2000/svg"  width="15"  height="15"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-edit"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1" /><path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z" /><path d="M16 5l3 3" /></svg>
                </a>
            </div>
        </div>

    </div>
</main>

@endsection
