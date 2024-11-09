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

    <a href="{{ route('d.dashboard') }}" class="position-absolute" style="right: 1rem;">
        <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="#01A94D"  class="icon icon-tabler icons-tabler-filled icon-tabler-home"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12.707 2.293l9 9c.63 .63 .184 1.707 -.707 1.707h-1v6a3 3 0 0 1 -3 3h-1v-7a3 3 0 0 0 -2.824 -2.995l-.176 -.005h-2a3 3 0 0 0 -3 3v7h-1a3 3 0 0 1 -3 -3v-6h-1c-.89 0 -1.337 -1.077 -.707 -1.707l9 -9a1 1 0 0 1 1.414 0m.293 11.707a1 1 0 0 1 1 1v7h-4v-7a1 1 0 0 1 .883 -.993l.117 -.007z" /></svg>
    </a>
</header>

<main class="main-content">
    <div class="container">
        <form id="editProfileForm" class="mt-4" method="POST">
            @csrf
            <input type="text" id="edit_id" name="id" value="{{ $user->id }}" hidden>
            <input type="text" id="edit_fullname" name="fullname" value="{{ $user->fullname }}" hidden>

            <div class="list-group gap-3" style="font-size: 0.9rem;">
                <div class="list-group-item border-0 pb-2">
                    <div class="col-md-12">
                        <label for="edit_firstname" class="form-label fw-semibold">First Name</label>
                        <input type="text" class="form-control rounded custom-border" id="edit_firstname" name="firstname" required>
                    </div>
                </div>
                <div class="list-group-item border-0 pb-2">
                    <div class="col-md-12">
                        <label for="edit_middle_initial" class="form-label fw-semibold">Middle Initial</label>
                        <input type="text" class="form-control rounded custom-border" id="edit_middle_initial" name="middle_initial" maxlength="1">
                    </div>
                </div>
                <div class="list-group-item border-0 pb-2">
                    <div class="col-md-12">
                        <label for="edit_lastname" class="form-label fw-semibold">Last Name</label>
                        <input type="text" class="form-control rounded custom-border" id="edit_lastname" name="lastname" required>
                    </div>
                </div>
                <div class="list-group-item border-0 pb-2">
                    <div class="col-md-12">
                        <label for="edit_username" class="form-label fw-semibold">Username</label>
                        <input type="text" class="form-control rounded custom-border" id="edit_username" name="username" value="{{ $user->username }}" required>
                    </div>
                </div>
                <div class="list-group-item border-0 pb-2">
                    <div class="col-md-12">
                        <label for="edit_contact_num" class="form-label fw-semibold">Contact Number</label>
                        <input type="text" class="form-control rounded custom-border" id="edit_contact_num" name="contact_num" maxlength="13" value="+{{ $user->contact_num }}" required>
                    </div>
                </div>
                <div class="list-group-item border-0 pb-2">
                    <div class="col-md-12 w-100 text-center mb-4">
                        <button type="submit" form="editProfileForm" class="btn btn-primary w-100" id="saveChangesBtn">
                            <div class="spinner-border spinner-border-sm text-white d-none" role="status" id="saveChangesSpinner">
                                <span class="visually-hidden">Loading...</span>
                            </div>
                            Save changes
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</main>

<script>
    $(document).ready(function () {
        // Get the full name from the input field and trim whitespace
        let fullname = $('#edit_fullname').val().trim();
        
        // Split fullname into parts by spaces
        let nameParts = fullname.split(' ');
        
        let firstname = "";
        let middleInitial = "";
        let lastname = "";

        // If there's only one part, treat it as the first name
        if (nameParts.length === 1) {
            firstname = nameParts[0];
        } else {
            // Check if the second-last part is a middle initial (1 character + '.')
            if (nameParts.length > 2 && nameParts[nameParts.length - 2].length === 2 && nameParts[nameParts.length - 2][1] === '.') {
                // Middle initial exists
                middleInitial = nameParts[nameParts.length - 2][0];  // Set middle initial
                lastname = nameParts[nameParts.length - 1];          // Last part is last name
                firstname = nameParts.slice(0, -2).join(' ');        // Remaining parts are first name
            } else {
                // No middle initial, only last name and first names
                lastname = nameParts[nameParts.length - 1];          // Last part is last name
                firstname = nameParts.slice(0, -1).join(' ');        // Remaining parts are first name(s)
            }
        }

        // Populate the form fields
        $('#edit_firstname').val(firstname);
        $('#edit_middle_initial').val(middleInitial);
        $('#edit_lastname').val(lastname);

        // Capture original values after populating the form
        const originalUserValues = {};
        $('#editProfileForm').serializeArray().forEach(({ name, value }) => {
            originalUserValues[name] = value;
        });

        // Form submission event handler
        $('#editProfileForm').on('submit', function (e) {
            e.preventDefault();
            

            // Get current values
            const currentUserValues = {};
            $('#editProfileForm').serializeArray().forEach(({ name, value }) => {
                currentUserValues[name] = value;
            });
            
            // Check if there are any changes
            const hasUserChanges = Object.keys(originalUserValues).some(key => originalUserValues[key] !== currentUserValues[key]);

            if (!hasUserChanges) {
                // No changes made
                Swal.fire({
                    icon: 'info',
                    title: 'No Changes Made!',
                    text: 'You have not made any changes.',
                    confirmButtonText: 'OK',
                    confirmButtonColor: '#007bff'
                });
                return; // Exit the function if no changes were made
            }
            
            let firstname = $('#edit_firstname').val();
            let middleInitial = $('#edit_middle_initial').val();
            let lastname = $('#edit_lastname').val();

            // Concatenate to form fullname
            let fullname = `${firstname} ${middleInitial ? middleInitial + '.' : ''} ${lastname}`.trim();

            let formData = {
                _token: "{{ csrf_token() }}",
                fullname: fullname, 
                username: $('#edit_username').val(),
                contact_num: $('#edit_contact_num').val(),
            };

            Swal.fire({
                title: 'Are you sure?',
                text: "Do you want to update your profile?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes'
            }).then((result) => {
                if (result.isConfirmed) {
                    let id = $('#edit_id').val();
                    let redirectUrl = "{{ route('personalinfo') }}"

                    $.ajax({
                        url: `/driver/account/personal-information/edit/${id}/update`,
                        type: "PUT",
                        data: formData,
                        success: function (response) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Profile Updated!',
                                text: response.message,
                                confirmButtonText: 'OK',
                                confirmButtonColor: "#01A94D"
                            }).then(() => {
                                window.location.href = redirectUrl;
                            });
                        },
                        error: function (error) {
                            console.log("Error updating profile: ", error);
                            Swal.fire({
                                icon: 'error',
                                title: 'Update Failed!',
                                text: 'An error occurred while updating profile.',
                                confirmButtonText: 'OK',
                                confirmButtonColor: '#d33'
                            });
                        }
                    });
                }
            });
        });
    });
</script>

@endsection
