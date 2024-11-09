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
    <span class="fw-bold flex-grow-1 text-center">Change Password</span>

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
        <div class="list-group mt-4 gap-3" style="font-size: 0.9rem;">

            <form id="changePassForm" method="POST">
                @csrf
                <input type="text" id="edit_id" value="{{ $user->id }}" hidden>

                <div class="list-group-item border-0 pb-2">
                    <div class="col-md-12 position-relative">
                        <label for="new_password" class="form-label fw-semibold">New Password</label>
                        <input type="password" class="form-control rounded custom-border" id="new_password" name="new_password" >
                        <button type="button" onclick="togglePasswordVisibility('new_password', this)" class="password-toggle-btn">
                            <!-- Default show icon -->
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-eye"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" /><path d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6" /></svg>
                        </button>
                    </div>
                </div>
                
                <div class="list-group-item border-0 pb-2">
                    <div class="col-md-12 position-relative">
                        <label for="confirm_password" class="form-label fw-semibold">Confirm New Password</label>
                        <input type="password" class="form-control rounded custom-border" id="confirm_password" name="confirm_password" >
                        <button type="button" onclick="togglePasswordVisibility('confirm_password', this)" class="password-toggle-btn">
                            <!-- Default show icon -->
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-eye"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" /><path d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6" /></svg>
                        </button>
                    </div>
                </div>
                
                <div class="list-group-item border-0 pb-2">
                    <div class="col-md-12 w-100 text-center mb-4">
                        <button type="submit" form="changePassForm" class="btn btn-primary w-100" id="saveChangesBtn">
                            <div class="spinner-border spinner-border-sm text-white d-none" role="status" id="saveChangesSpinner">
                                <span class="visually-hidden">Loading...</span>
                            </div>
                            Save changes
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</main>

<script>
    function togglePasswordVisibility(inputId, toggleButton) {
        const inputField = document.getElementById(inputId);
        const isPasswordVisible = inputField.type === 'text';

        // Toggle the input type
        inputField.type = isPasswordVisible ? 'password' : 'text';

        // Toggle the icon inside the button
        toggleButton.innerHTML = isPasswordVisible
            ? `<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-eye"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" /><path d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6" /></svg>`
            : `<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-eye-off"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M10.585 10.587a2 2 0 0 0 2.829 2.828" /><path d="M16.681 16.673a8.717 8.717 0 0 1 -4.681 1.327c-3.6 0 -6.6 -2 -9 -6c1.272 -2.12 2.712 -3.678 4.32 -4.674m2.86 -1.146a9.055 9.055 0 0 1 1.82 -.18c3.6 0 6.6 2 9 6c-.666 1.11 -1.379 2.067 -2.138 2.87" /><path d="M3 3l18 18" /></svg>`;
    }

    function toggleSaveButton(disable) {
        $('#saveChangesBtn').attr('disabled', disable);
        $('#saveChangesBtnSpinner').toggleClass('d-none', !disable);
    }

    // Helper function to display alerts
    function showAlert(icon, title, text, confirmButtonColor) {
        Swal.fire({
            icon: icon,
            title: title,
            text: text,
            confirmButtonColor: confirmButtonColor
        });
    }

    $('#changePassForm').on('submit', function(event) {
        event.preventDefault();

        // Disable the button and show spinner
        toggleSaveButton(true);

        let password = $('#new_password').val();
        let confirmPassword = $('#confirm_password').val();

        if (!password || !confirmPassword) {
            showAlert('warning', 'Validation Error', 'Password fields are required.', '#d33');
            toggleSaveButton(false);
            return;
        }

        if (password.length < 8) {
            showAlert('warning', 'Validation Error', 'Password must be at least 8 characters long.', '#d33');
            toggleSaveButton(false);
            return;
        }

        if (password !== confirmPassword) {
            showAlert('warning', 'Warning!', 'Passwords do not match.', '#f8bb86');
            toggleSaveButton(false);
            return;
        }

        Swal.fire({
            title: 'Are you sure?',
            text: "Do you want to proceed?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes!'
        }).then((result) => {
            if (result.isConfirmed) {
                let id = $('#edit_id').val();
                let formData = { _token: "{{ csrf_token() }}", password: password };

                $.ajax({
                    url: `/driver/account/personal-information/edit/${id}/change-password`,
                    type: 'PUT',
                    data: formData,
                    success: function(response) {
                        showAlert('success', 'Password Updated!', response.message, '#01A94D');
                        location.reload();
                    },
                    error: function(xhr) {
                        showAlert('error', 'Error!', `An error occurred: ${xhr.status} - ${xhr.statusText}`, '#d33');
                    },
                    complete: function() {
                        toggleSaveButton(false);
                    }
                });
            } else {
                toggleSaveButton(false);
            }
        });
    });
</script>

@endsection
