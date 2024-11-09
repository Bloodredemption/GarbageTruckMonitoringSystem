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
    <span class="fw-bold flex-grow-1 text-center">Personal Information</span>

    <!-- Home Icon -->
    <a href="{{ route('personalinfoedit') }}" class="position-absolute" style="right: 1rem;">
        <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="#01A94D"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-edit"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1" /><path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z" /><path d="M16 5l3 3" /></svg>
    </a>
</header>

<main class="main-content">
    <div class="container">
        <div class="row justify-content-center my-4">
            <div class="col-md-6 col-sm-8 col-12 text-center">
                <div class="card-body d-flex flex-column align-items-center">
                    <div class="d-flex flex-column align-items-center">
                        <img src="{{ asset('assets/images/avatars/01.png')}}" alt="Profile Picture" class="rounded-circle mb-2" style="width: 100px; height: 100px;">
                    </div>
                    <h5 class="card-title mt-2"><strong>{{ $user->fullname }}</strong></h5>
                    <p style="font-size: 0.9rem;" class="card-text">{{ $user->user_type }}</p>
                    
                </div>
            </div>
        </div>

        <div class="list-group gap-3" style="font-size: 0.9rem; padding-left: 1rem; padding-right: 1rem;">
            <div class="d-flex align-items-center border-0 border-bottom pb-2">
                <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-user">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                    <path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0" />
                    <path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" />
                </svg>
                <div class="list-group-item border-0">
                    <small class="text-muted d-block">Fullname</small>
                    <span class="d-block mt-1 fw-bold">{{ $user->fullname }}</span>
                </div>
            </div>

            <div class="d-flex align-items-center border-0 border-bottom pb-2">
                <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-phone">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                    <path d="M5 4h4l2 5l-2.5 1.5a11 11 0 0 0 5 5l1.5 -2.5l5 2v4a2 2 0 0 1 -2 2a16 16 0 0 1 -15 -15a2 2 0 0 1 2 -2" />
                </svg>
                <div class="list-group-item border-0">
                    <small class="text-muted d-block">Contact No.</small>
                    <span class="d-block mt-1 fw-bold">+{{ $user->contact_num }}</span>
                </div>
            </div>
            
            <div class="d-flex align-items-center border-0 border-bottom pb-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="me-1 icon icon-tabler icons-tabler-outline icon-tabler-user-square-rounded">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                    <path d="M12 13a3 3 0 1 0 0 -6a3 3 0 0 0 0 6z" />
                    <path d="M12 3c7.2 0 9 1.8 9 9s-1.8 9 -9 9s-9 -1.8 -9 -9s1.8 -9 9 -9z" />
                    <path d="M6 20.05v-.05a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v.05" />
                </svg>
                <div class="list-group-item border-0">
                    <small class="text-muted d-block">Username</small>
                    <span class="d-block mt-1 fw-bold">{{ $user->username }}</span>
                </div>
            </div>
            
            
            {{-- <div class="list-group-item border-0 border-bottom pb-2">
                <small class="text-muted d-block">Password</small>
                <span class="d-block mt-1 fw-bold">●●●●●●●●●</span>
                <a href="#" style="background: #01a94d10; border-radius: 15px; font-size: 12px; align-items: center; color: #01A94D;" class="btn btn-sm fw-bold mb-2 mt-2">
                    Change Password
                    <svg  xmlns="http://www.w3.org/2000/svg"  width="15"  height="15"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-edit"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1" /><path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z" /><path d="M16 5l3 3" /></svg>
                </a>
            </div> --}}
        </div>

    </div>
</main>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    @if(session('success'))
        Swal.fire({
            icon: 'success',
            title: 'Profile Updated!',
            text: '{{ session("success") }}',
            confirmButtonText: 'OK',
            confirmButtonColor: '#01A94D'
        });
    @endif
</script>
@endsection
