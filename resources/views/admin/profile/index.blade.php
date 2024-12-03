@extends('layout')

@section('main-content')

<main class="main-content">
    <div class="position-relative iq-banner">
        <!--Nav Start-->
        @include('partials.header')
        <!-- Nav Header Component Start -->
        <div class="iq-navbar-header mb-2" style="height: 215px;">
            <div class="container-fluid iq-container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="flex-wrap d-flex justify-content-between align-items-center">
                            <div>
                                <h1><strong>Profile Page</strong></h1>
                                <p>Modify your personal information.</p>
                            </div>
                            {{-- <div>
                                <a href="" class="btn btn-link btn-soft-light">
                                    <svg class="icon-20" width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M11.8251 15.2171H12.1748C14.0987 15.2171 15.731 13.985 16.3054 12.2764C16.3887 12.0276 16.1979 11.7713 15.9334 11.7713H14.8562C14.5133 11.7713 14.2362 11.4977 14.2362 11.16C14.2362 10.8213 14.5133 10.5467 14.8562 10.5467H15.9005C16.2463 10.5467 16.5263 10.2703 16.5263 9.92875C16.5263 9.58722 16.2463 9.31075 15.9005 9.31075H14.8562C14.5133 9.31075 14.2362 9.03619 14.2362 8.69849C14.2362 8.35984 14.5133 8.08528 14.8562 8.08528H15.9005C16.2463 8.08528 16.5263 7.8088 16.5263 7.46728C16.5263 7.12575 16.2463 6.84928 15.9005 6.84928H14.8562C14.5133 6.84928 14.2362 6.57472 14.2362 6.23606C14.2362 5.89837 14.5133 5.62381 14.8562 5.62381H15.9886C16.2483 5.62381 16.4343 5.3789 16.3645 5.13113C15.8501 3.32401 14.1694 2 12.1748 2H11.8251C9.42172 2 7.47363 3.92287 7.47363 6.29729V10.9198C7.47363 13.2933 9.42172 15.2171 11.8251 15.2171Z" fill="currentColor"></path>
                                        <path opacity="0.4" d="M19.5313 9.82568C18.9966 9.82568 18.5626 10.2533 18.5626 10.7823C18.5626 14.3554 15.6186 17.2627 12.0005 17.2627C8.38136 17.2627 5.43743 14.3554 5.43743 10.7823C5.43743 10.2533 5.00345 9.82568 4.46872 9.82568C3.93398 9.82568 3.5 10.2533 3.5 10.7823C3.5 15.0873 6.79945 18.6413 11.0318 19.1186V21.0434C11.0318 21.5715 11.4648 22.0001 12.0005 22.0001C12.5352 22.0001 12.9692 21.5715 12.9692 21.0434V19.1186C17.2006 18.6413 20.5 15.0873 20.5 10.7823C20.5 10.2533 20.066 9.82568 19.5313 9.82568Z" fill="currentColor"></path>
                                    </svg>
                                    Announcements
                                </a>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="iq-header-img" style="background-color: #01A94D;">
                
            </div>
        </div>          
        <!-- Nav Header Component End -->
        <!--Nav End-->
    </div>
    <div class="conatiner-fluid content-inner mt-n5 py-0">
        <div class="row">
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-center align-items-center">
                            <img src="../../assets/images/avatars/01.png" alt="User-Profile" class="img-fluid rounded-pill avatar-100">
                        </div>
                        <div class="d-flex flex-column justify-content-center align-items-center mt-3">
                            <h4 class="h4">{{ $user->fullname }}</h4>
                            <span>{{ $user->user_type }}</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 text-start">
                                <h5 class="fw-bold">Profile Information</h5>
                                <p>Modify your profile information here.</p>
                            </div>
                            <div class="col-md-6 text-start">
                                <form id="editprofileInfoForm" method="POST">
                                    <input type="text" id="edit_id" name="id" value="{{ $user->id }}" hidden>
                                    <input type="text" id="edit_fullname" name="fullname" value="{{ $user->fullname }}" hidden>

                                    <div class="row">
                                        <div class="col-md-8 mb-3">
                                            <label for="upd_firstname" class="form-label">First Name</label>
                                            <input type="text" class="form-control" id="upd_firstname" name="firstname" required>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label for="upd_middle_initial" class="form-label">Middle Initial</label>
                                            <input type="text" class="form-control" id="upd_middle_initial" name="middle_initial" maxlength="1">
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="upd_last_name" class="form-label">Last Name</label>
                                        <input type="text" class="form-control" id="upd_last_name" name="lastname" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="upd_username" class="form-label">Username</label>
                                        <input type="text" class="form-control" id="upd_username" name="username" value="{{ $user->username }}" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="contact_num" class="form-label">Contact Number</label>
                                        <div class="input-group">
                                            <span class="input-group-text">
                                                <img src="{{ asset('assets/images/Flag/ph-flag.png') }}" alt="Philippine Flag" style="width: 20px; height: 15px;">
                                                &nbsp;+63
                                            </span>
                                            <input type="tel" class="form-control" id="contact_num" name="contact_num" placeholder="9123456789" required>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary" id="saveProfileInfo">
                                        <div class="spinner-border spinner-border-sm text-white d-none" role="status" id="saveProfileInfoSpinner">
                                            <span class="visually-hidden">Loading...</span>
                                        </div>
                                        Save Changes
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 text-start">
                                <h5 class="fw-bold">Change Password</h6>
                                <p>Modify your profile information here.</p>
                                <!-- Add more fields as needed -->
                            </div>
                            <div class="col-md-6 text-start">
                                <form id="cprofilePassForm" method="POST">
                                    <div class="mb-3 position-relative">
                                        <label for="upd_password" class="form-label">New Password</label>
                                        <input type="password" class="form-control" id="upd_password" >
                                        <span class="position-absolute top-50 end-0 translate-middle-y me-3" style="margin-top: 15px; cursor: pointer;" onclick="togglePasswordVisibility('upd_password', 'upd_password_icon')" style="cursor: pointer;">
                                            <svg id="upd_password_icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-eye">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                                <path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
                                                <path d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6" />
                                            </svg>
                                        </span>
                                    </div>
                                    <div class="mb-4 position-relative">
                                        <label for="upd_cpassword" class="form-label">Confirm Password</label>
                                        <input type="password" class="form-control" id="upd_cpassword" >
                                        <span class="position-absolute top-50 end-0 translate-middle-y me-3" style="margin-top: 15px; cursor: pointer;" onclick="togglePasswordVisibility('upd_cpassword', 'upd_cpassword_icon')" style="cursor: pointer;">
                                            <svg id="upd_cpassword_icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-eye">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                                <path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
                                                <path d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6" />
                                            </svg>
                                        </span>
                                    </div>
                                    <button type="submit" class="btn btn-primary" id="cProfilePassBtn">
                                        <div class="spinner-border spinner-border-sm text-white d-none" role="status" id="cProfilePassBtnSpinner">
                                            <span class="visually-hidden">Loading...</span>
                                        </div>    
                                        Save Changes
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Footer Section Start -->
    @include('partials.footer')
    <!-- Footer Section End -->    
</main>

<script>
    const input = document.getElementById('contact_num');

    input.addEventListener('input', function (e) {
        let value = e.target.value.replace(/\D/g, ''); // Remove non-numeric characters
        if (value.length > 10) value = value.slice(0, 10); // Limit to 10 digits
        e.target.value = value.replace(/(\d{4})(\d{3})(\d{3})/, '$1 $2 $3'); // Format as 4-3-3
    });

    const originalContactNum = "{{ $user->contact_num }}";

    // Remove the "63" prefix if it exists
    const formattedContactNum = originalContactNum.startsWith("63") ? originalContactNum.slice(2) : originalContactNum;

    // Set the formatted value to the input
    document.getElementById("contact_num").value = formattedContactNum;

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
    
    $(document).ready(function() {
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
        $('#upd_firstname').val(firstname);
        $('#upd_middle_initial').val(middleInitial);
        $('#upd_last_name').val(lastname);

        // Initialize originalUserValues with the correct form
        const originalUserValues = {};
        $('#editprofileInfoForm').serializeArray().forEach(({ name, value }) => {
            originalUserValues[name] = value;
        });

        $('#editprofileInfoForm').on('submit', function (e) {
            e.preventDefault();

            // Get current values
            const currentUserValues = {};
            $('#editprofileInfoForm').serializeArray().forEach(({ name, value }) => {
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

            let firstname = $('#upd_firstname').val();
            let middleInitial = $('#upd_middle_initial').val();
            let lastname = $('#upd_last_name').val();

            // Concatenate to form fullname
            let fullname = `${firstname} ${middleInitial ? middleInitial + '.' : ''} ${lastname}`.trim();

            let formData = {
                _token: "{{ csrf_token() }}",
                fullname: fullname, 
                username: $('#upd_username').val(),
                contact_num: $('#contact_num').val(),
            };

            Swal.fire({
                title: 'Are you sure?',
                text: "Do you want to update your information?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes'
            }).then((result) => {
                if (result.isConfirmed) {
                    let id = $('#edit_id').val();

                    $.ajax({
                        url: `/admin/profile/${id}/update`,
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
                                // window.location.href = redirectUrl;
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

        function showAlert(icon, title, text, confirmButtonColor) {
            Swal.fire({
                icon: icon,
                title: title,
                text: text,
                confirmButtonColor: confirmButtonColor
            });
        }
        
        function toggleSaveButton(disable) {
            $('#cProfilePassBtn').attr('disabled', disable);
            $('#cProfilePassBtnSpinner').toggleClass('d-none', !disable);
        }
        
        $('#cprofilePassForm').on('submit', function(event) {
            event.preventDefault();

            // Disable the button and show spinner
            toggleSaveButton(true);

            let password = $('#upd_password').val();
            let confirmPassword = $('#upd_cpassword').val();

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
                        url: `/admin/profile/${id}/changePassword`,
                        type: 'PUT',
                        data: formData,
                        success: function(response) {
                            showAlert('success', 'Password Updated!', response.message, '#01A94D');
                            // location.reload();
                            $('#cprofilePassForm')[0].reset();
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

    });
</script>
@endsection