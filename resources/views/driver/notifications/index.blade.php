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
    <span class="fw-semibold flex-grow-1 text-center">Notifications</span>
</header>


@section('main-content')

<main class="main-content">
    <div class="container">

        <div class="container text-center">
            <div class="d-flex flex-column align-items-center justify-content-center" style="height: 80vh;">
                <div class="d-flex flex-column align-items-center justify-content-center p-4" style="height: 80vh;">
                    <img src="{{ asset('assets/images/no-data.svg')}}" class="img-fluid mb-4" width="75%" alt="No Data Found">
                    <h3 class="fw-bold">No notifications found</h3>
                    <p style="color: #525356; font-size: 15px;">All of your notifications will be displayed here</p>
                </div>
            </div>
        </div>

    </div>
</main>

@endsection
