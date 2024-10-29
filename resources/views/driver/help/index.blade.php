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
    <span class="fw-bold flex-grow-1 text-center">Help</span>

    <!-- Home Icon -->
    <a href="{{ route('d.dashboard') }}" class="position-absolute" style="right: 1rem;">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="#01A94D" class="nav-icon">
            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
            <path d="M12.707 2.293l9 9c.63 .63 .184 1.707 -.707 1.707h-1v6a3 3 0 0 1 -3 3h-1v-7a3 3 0 0 0 -2.824 -2.995l-.176 -.005h-2a3 3 0 0 0 -3 3v7h-1a3 3 0 0 1 -3 -3v-6h-1c-.89 0 -1.337 -1.077 -.707 -1.707l9 -9a1 1 0 0 1 1.414 0m.293 11.707a1 1 0 0 1 1 1v7h-4v-7a1 1 0 0 1 .883 -.993l.117 -.007z"/>
        </svg>
    </a>
</header>

@section('main-content')

<main class="main-content">
    <div class="container">

        <div class="container text-center">
            <div class="d-flex flex-column align-items-center justify-content-center" style="height: 80vh;">
                <div class="d-flex flex-column align-items-center justify-content-center p-4" style="height: 80vh;">
                    <img src="{{ asset('assets/images/no-data.svg')}}" class="img-fluid mb-4" width="75%" alt="No Data Found">
                    <h3 class="fw-bold">No help found</h3>
                </div>
            </div>
        </div>

    </div>
</main>

@endsection
