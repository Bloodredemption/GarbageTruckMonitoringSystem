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
    <span class="fw-bold flex-grow-1 text-center">Edit Personal Information</span>
</header>

<main class="main-content">

    <div class="container">
        <div class="row justify-content-center my-4">
            <div class="col-md-6 col-sm-8 col-12 text-center">
                <div class="card-body d-flex flex-column align-items-center">
                    <div class="d-flex flex-column align-items-center">
                        <img src="{{ asset('assets/images/avatars/01.png')}}" alt="Profile Picture" class="rounded-circle mb-2" style="width: 100px; height: 100px;">
                        <a href="#" style="background: #01a94d10; border-radius: 15px; font-size: 12px; align-items: center; color: #01A94D;" class="btn btn-sm fw-semibold mb-2">
                            Change Profile Picture
                            <svg  xmlns="http://www.w3.org/2000/svg"  width="18"  height="18"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-edit"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1" /><path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z" /><path d="M16 5l3 3" /></svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="list-group gap-3" style="font-size: 0.9rem;">
            <div class="list-group-item border-0 pb-2">
                <div class="col-md-12">
                    <label for="add_firstname" class="form-label fw-semibold">First Name</label>
                    <input type="text" class="form-control rounded custom-border" id="add_firstname" name="firstname" required>
                </div>
            </div>
            <div class="list-group-item border-0 pb-2">
                <div class="col-md-12">
                    <label for="add_firstname" class="form-label fw-semibold">Middle Initial</label>
                    <input type="text" class="form-control rounded custom-border" id="add_firstname" name="firstname" required>
                </div>
            </div>
            <div class="list-group-item border-0 pb-2">
                <div class="col-md-12">
                    <label for="add_firstname" class="form-label fw-semibold">Last Name</label>
                    <input type="text" class="form-control rounded custom-border" id="add_firstname" name="firstname" required>
                </div>
            </div>
            <div class="list-group-item border-0 pb-2">
                <div class="col-md-12">
                    <label for="add_username" class="form-label fw-semibold">Username</label>
                    <input type="text" class="form-control rounded custom-border" id="add_username" name="username" required>
                </div>
            </div>
            <div class="list-group-item border-0 pb-2">
                <div class="col-md-12">
                    <label for="add_contact_num" class="form-label fw-semibold">Contact Number</label>
                    <input type="text" class="form-control rounded custom-border" id="add_contact_num" name="contact_num" maxlength="13" required>
                </div>
            </div>
            <div class="list-group-item border-0 pb-2">
                <div class="col-md-12 w-100 text-center mb-4">
                    <button type="submit" form="addUserForm" class="btn btn-primary w-100" id="saveChangesBtn">
                        <div class="spinner-border spinner-border-sm text-white d-none" role="status" id="saveChangesSpinner">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                        Save changes
                    </button>
                </div>
            </div>
            
        </div>

    </div>
</main>

@endsection
