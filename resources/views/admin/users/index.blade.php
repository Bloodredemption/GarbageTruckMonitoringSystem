@extends('layout')

@section('main-content')

<main class="main-content">
    <div class="position-relative iq-banner">
        <!--Nav Start-->
        @include('partials.header')
        <!-- Nav Header Component Start -->
        <div class="iq-navbar-header" style="height: 215px;">
            <div class="container-fluid iq-container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="flex-wrap d-flex justify-content-between align-items-center">
                            <div>
                                <h1><strong>Users Records</strong></h1>
                                <p>Contains multiple user information.</p>
                            </div>
                            <div>
                                <a href="" class="btn btn-link btn-soft-light">
                                    <img src="data:image/svg+xml,%3Csvg width='20' viewBox='0 0 30 30' fill='none' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink'%3E%3Crect width='30' height='30' fill='url(%23pattern0_135_433)'/%3E%3Cdefs%3E%3Cpattern id='pattern0_135_433' patternContentUnits='objectBoundingBox' width='1' height='1'%3E%3Cuse xlink:href='%23image0_135_433' transform='scale(0.0333333)'/%3E%3C/pattern%3E%3Cimage id='image0_135_433' width='30' height='30' xlink:href='data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAYAAAA7MK6iAAAACXBIWXMAAAsTAAALEwEAmpwYAAAAaklEQVR4nO3UUQqAIAyA4R0v6djRRax7/FHPC8JNabXvVeWHoYqk3wJW7JaWsIs44e8DZmCnnw0oWvhc6K1q4SEkw7xt1NL+SjJ8yVHL3c/lfLmqtrFoccdwBabHB63hcQfDh63ihJM4OwBPnU7F1RVbMAAAAABJRU5ErkJggg=='/%3E%3C/defs%3E%3C/svg%3E%0A" alt="img">
                                    Print
                                </a>
                            </div>
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
            
            <div class="col-md-12 col-lg-12">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card" data-aos="fade-up" data-aos-delay="800">
                            <div class="flex-wrap card-header d-flex justify-content-between align-items-center">
                                <div class="header-title">
                                    <h4 class="card-title">Users List</h4>
                                    
                                    {{-- <a href="#" onclick="fetchUsers()" aria-label="Fetch users">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(0, 0, 0, 1);">
                                            <path d="M19.89 10.105a8.696 8.696 0 0 0-.789-1.456l-1.658 1.119a6.606 6.606 0 0 1 .987 2.345 6.659 6.659 0 0 1 0 2.648 6.495 6.495 0 0 1-.384 1.231 6.404 6.404 0 0 1-.603 1.112 6.654 6.654 0 0 1-1.776 1.775 6.606 6.606 0 0 1-2.343.987 6.734 6.734 0 0 1-2.646 0 6.55 6.55 0 0 1-3.317-1.788 6.605 6.605 0 0 1-1.408-2.088 6.613 6.613 0 0 1-.382-1.23 6.627 6.627 0 0 1 .382-3.877A6.551 6.551 0 0 1 7.36 8.797 6.628 6.628 0 0 1 9.446 7.39c.395-.167.81-.296 1.23-.382.107-.022.216-.032.324-.049V10l5-4-5-4v2.938a8.805 8.805 0 0 0-.725.111 8.512 8.512 0 0 0-3.063 1.29A8.566 8.566 0 0 0 4.11 16.77a8.535 8.535 0 0 0 1.835 2.724 8.614 8.614 0 0 0 2.721 1.833 8.55 8.55 0 0 0 5.061.499 8.576 8.576 0 0 0 6.162-5.056c.22-.52.389-1.061.5-1.608a8.643 8.643 0 0 0 0-3.45 8.684 8.684 0 0 0-.499-1.607z"></path>
                                        </svg>
                                    </a> --}}
                                </div>
                                
                                <div>
                                    <a href="#" class=" text-center btn btn-primary btn-icon mt-lg-0 mt-md-0 mt-3" data-bs-toggle="offcanvas" data-bs-target="#offcanvasUser" aria-controls="offcanvasUser">
                                        <i class="btn-inner">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                            </svg>
                                        </i>
                                        <span>Add New</span>
                                    </a>
                                </div>
                            </div>

                            <div class="card-body px-0">

                                {{-- <div class="d-flex flex-column align-items-center justify-content-center" style="height: 80vh;">
                                    <img src="{{ asset('assets/images/no-data.svg')}}" class="img-fluid mb-4" alt="No Data Found">
                                    <h1 style="color: #8A92A6;"><strong>No Data Found</strong></h1>
                                    <span>Start adding user by clicking the “Add New” button.</span>
                                </div> --}}
                                
                                <div class="table-responsive">
                                    <table id="datatable" class="table" role="grid" data-toggle="data-table">
                                        <thead>
                                            <tr style="background-color: #01A94D; color: white;">
                                                <th style="width: 5%;">No.</th>
                                                <th>Name</th>
                                                <th>Username</th>
                                                <th>Contact No.</th>
                                                <th>Role</th>
                                                <th>Status</th>
                                                <th>Operation</th>
                                            </tr>
                                        </thead>
                                        <tbody id="userTableBody">
                                            <!-- Users will be loaded here via AJAX -->
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Offcanvas for Adding New User -->
    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasUser" aria-labelledby="offcanvasRightLabel">
        <div class="offcanvas-header" style="padding-bottom: 0;">
            <div>
                <h5 id="offcanvasRightLabel">Add New User</h5>
                <p style="font-size: 15px;">Please fill all the required fields <span style="color: red;">*</span></p>
            </div>
            {{-- <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button> --}}
        </div>
        <div class="offcanvas-body">
            <form id="addUserForm" action="{{ route('users.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="add_firstname" class="form-label">First Name <span style="color: red;">*</span></label>
                    <input type="text" class="form-control" id="add_firstname" name="firstname" required>
                </div>
                <div class="mb-3">
                    <label for="add_middle_initial" class="form-label">Middle Initial</label>
                    <input type="text" class="form-control" id="add_middle_initial" name="middle_initial" maxlength="1">
                </div>
                <div class="mb-3">
                    <label for="add_lastname" class="form-label">Last Name <span style="color: red;">*</span></label>
                    <input type="text" class="form-control" id="add_lastname" name="lastname" required>
                </div>
                <div class="mb-3">
                    <label for="add_username" class="form-label">Username <span style="color: red;">*</span></label>
                    <input type="text" class="form-control" id="add_username" name="username" required>
                </div>
                <div class="mb-3">
                    <label for="add_contact_num" class="form-label">Contact Number <span style="color: red;">*</span></label>
                    <input type="text" class="form-control" id="add_contact_num" name="contact_num" maxlength="13" required>
                </div>
                <div class="mb-3">
                    <label for="add_user_type" class="form-label">Role <span style="color: red;">*</span></label>
                    <select class="form-control" id="add_user_type" name="user_type" required>
                        <option></option>
                        <option value="admin">Admin</option>
                        <option value="landfill">Landfill</option>
                        <option value="driver">Driver</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="add_password" class="form-label">Password <span style="color: red;">*</span></label>
                    <input type="password" class="form-control" id="add_password" name="password" required>
                </div>
                <div class="mb-4">
                    <label for="add_password_confirmation" class="form-label">Confirm Password <span style="color: red;">*</span></label>
                    <input type="password" class="form-control" id="add_password_confirmation" name="password_confirmation" required>
                </div>
                <button type="submit" class="btn btn-primary mb-3">Create</button>
                <button type="button" class="btn btn-light text-reset mb-3" data-bs-dismiss="offcanvas" aria-label="Close">Cancel</button>
            </form>
        </div>
    </div>

    <!-- Offcanvas for Edit User -->
    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasEditUser" aria-labelledby="offcanvasEditUserLabel">
        <div class="offcanvas-header" style="padding-bottom: 0;">
            <div>
                <h5 id="offcanvasEditUserLabel">Edit User</h5>
                <p style="font-size: 15px;">Please fill all the required fields <span style="color: red;">*</span></p>
            </div>
            {{-- <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button> --}}
        </div>
        <div class="offcanvas-body">
            <form id="editUserForm" method="POST">
                @csrf
                <!-- Hidden input for user ID -->
                <input type="hidden" id="edit_user_id" name="user_id">
            
                <!-- Form fields for editing user -->
                <div class="mb-3">
                    <label for="edit_firstname" class="form-label">First Name <span style="color: red;">*</span></label>
                    <input type="text" class="form-control" id="edit_firstname" name="firstname" required>
                </div>
                <div class="mb-3">
                    <label for="edit_middle_initial" class="form-label">Middle Initial</label>
                    <input type="text" class="form-control" id="edit_middle_initial" name="middle_initial" maxlength="1">
                </div>
                <div class="mb-3">
                    <label for="edit_lastname" class="form-label">Last Name <span style="color: red;">*</span></label>
                    <input type="text" class="form-control" id="edit_lastname" name="lastname" required>
                </div>
                <div class="mb-3">
                    <label for="edit_username" class="form-label">Username <span style="color: red;">*</span></label>
                    <input type="text" class="form-control" id="edit_username" name="username" required>
                </div>
                <div class="mb-3">
                    <label for="edit_contact_num" class="form-label">Contact Number <span style="color: red;">*</span></label>
                    <input type="text" class="form-control" id="edit_contact_num" name="contact_num" maxlength="13" required>
                </div>
                <div class="mb-3">
                    <label for="edit_user_type" class="form-label">Role <span style="color: red;">*</span></label>
                    <select class="form-control" id="edit_user_type" name="user_type" required>
                        <option></option>
                        <option value="admin">Admin</option>
                        <option value="landfill">Landfill</option>
                        <option value="driver">Driver</option>
                    </select>
                </div>
            
                <button type="submit" class="btn btn-primary mb-3">Update</button>
                <button type="button" class="btn btn-light text-reset mb-3" data-bs-dismiss="offcanvas" aria-label="Close">Cancel</button>
            </form>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="viewUserModal" tabindex="-1" aria-labelledby="viewUserModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="viewUserModalLabel">User Information</h1>
                </div>
                <div class="modal-body">
                    <ul class="list-unstyled">
                        <li><strong>Fullname:</strong> <span id="modal_fullname">Name Here</span></li>
                        <li><strong>Role:</strong> <span id="modal_role">Sample Role</span></li>
                        <li><strong>Account Status:</strong> <span id="modal_status">Active</span></li>
                        <li><strong>Contact No.:</strong> <span id="modal_contact_num">Number Here</span></li>
                        <li><strong>Date Created:</strong> <span id="modal_created_at">Date Here</span></li>
                        <li><strong>Date Updated:</strong> <span id="modal_updated_at">Date Here</span></li>
                        <li><strong>Login Credentials:</strong>
                            <ul>
                                <li>Username: <span id="modal_username">sample</span></li>
                                <li>Password: <span id="modal_password">********</span> <!-- Masked for security reasons --></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-soft-light" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Footer Section Start -->
    @include('partials.footer')
    <!-- Footer Section End -->    
</main>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const inputs = ['add_contact_num', 'edit_contact_num'];

        // Function to set prefix and ensure it's not removed
        function handleContactInput(inputId) {
            const contactInput = document.getElementById(inputId);

            // Set initial value to +63
            contactInput.value = "+63";

            // Prevent erasing or changing the prefix
            contactInput.addEventListener('input', function() {
                if (!contactInput.value.startsWith("+63")) {
                    contactInput.value = "+63" + contactInput.value.slice(3); // Preserve the rest of the input
                }
            });

            // Make sure the caret stays in the right place
            contactInput.addEventListener('keydown', function(e) {
                if (this.selectionStart < 3 && (e.key !== "ArrowRight" && e.key !== "ArrowLeft")) {
                    e.preventDefault(); // Prevent typing before +63
                }
            });
        }

        // Apply to both fields
        inputs.forEach(function(inputId) {
            handleContactInput(inputId);
        });
    });

    $(document).ready(function () {
        // Fetch users and display in the table
        function fetchUsers() {
            $.ajax({
                url: "{{ route('users.index') }}", // Route for fetching users
                type: "GET",
                success: function (response) {
                    let rows = '';
                    let counter = 1;
                    // Loop through the users and create table rows dynamically
                    $.each(response.users, function (key, user) {
                        if (user.status !== 'deleted') { // Skip users with 'deleted' status
                            rows += `
                                <tr>
                                    <td>${counter}</td>
                                    <td><a href="#" class="view-user-btn" data-id="${user.id}">${user.fullname}</a></td>
                                    <td>${user.username}</td>
                                    <td>+${String(user.contact_num).replace(/(\d{2})(\d{3})(\d{3})(\d{4})/, '$1 $2 $3 $4')}</td>
                                    <td>${user.user_type}</td>
                                    <td>${user.status == 'active' ? '<span class="badge bg-primary">active</span>' : '<span class="badge bg-danger">inactive</span>'}</td>
                                    <td>
                                        <div class="flex align-items-center list-user-action">
                                            <a class="btn btn-sm btn-icon btn-warning edit-user-btn" data-id="${user.id}">Edit</a>
                                            <a class="btn btn-sm btn-icon btn-danger delete-user-btn" data-id="${user.id}">Delete</a>
                                        </div>
                                    </td>
                                </tr>`;
                            counter++;
                        }
                    });

                    // Destroy the existing DataTable to avoid duplication issues
                    let dataTable = $('#datatable').DataTable();
                    dataTable.clear(); // Clear the existing table data
                    dataTable.destroy(); // Destroy the current instance

                    // Append the new rows to the table body
                    $('#datatable tbody').html(rows);

                    // Reinitialize the DataTable to apply DataTables functionality
                    $('#datatable').DataTable({
                        retrieve: true, // Retrieve the existing table instead of initializing it again
                        paging: true, // Enable pagination
                        searching: true, // Enable search functionality
                        info: true, // Show the number of entries info
                        responsive: true, // Ensure responsiveness
                    });
                },
                error: function (error) {
                    console.log("Error fetching data: ", error);
                    alert("Failed to fetch users. Please try again.");
                }
            });
        }

        fetchUsers();

        // Add User
        $('#addUserForm').on('submit', function (e) {
            e.preventDefault(); // Prevent form from submitting normally
            
            let formData = {
                _token: "{{ csrf_token() }}", // Laravel CSRF token
                firstname: $('#add_firstname').val(),
                middle_initial: $('#add_middle_initial').val(),
                lastname: $('#add_lastname').val(),
                username: $('#add_username').val(),
                contact_num: $('#add_contact_num').val(),
                user_type: $('#add_user_type').val(),
                password: $('#add_password').val(),
                password_confirmation: $('#add_password_confirmation').val(),
            };

            $.ajax({
                url: "{{ route('users.store') }}", // Your store route
                type: "POST",
                data: formData,
                success: function (response) {
                    fetchUsers();

                    Swal.fire({
                        icon: 'success',
                        title: 'Success!',
                        text: response.message,
                        confirmButtonText: 'OK',
                        confirmButtonColor: "#01A94D"
                    }).then(() => {
                        $('#addUserForm')[0].reset();

                        // Update this to match the correct ID in your HTML
                        var offcanvasElement = document.getElementById('offcanvasUser');

                        // Manually create the Offcanvas instance if it doesn't exist
                        var offcanvasInstance = bootstrap.Offcanvas.getInstance(offcanvasElement);

                        if (!offcanvasInstance) {
                            offcanvasInstance = new bootstrap.Offcanvas(offcanvasElement);
                        }

                        if (offcanvasInstance) {
                            offcanvasInstance.hide();
                        }
                    });
                },
                error: function (error) {
                    console.log("Error adding user: ", error);
                    if (error.responseJSON.errors) {
                        let errors = error.responseJSON.errors;

                        // Displaying all errors in a single SweetAlert2 message
                        let errorMessage = '';
                        for (let field in errors) {
                            errorMessage += errors[field][0] + '<br>'; // Concatenate error messages
                        }

                        // Replace alert with SweetAlert2 for error message
                        Swal.fire({
                            icon: 'error',
                            title: 'Error!',
                            html: errorMessage, // Use 'html' instead of 'text' for line breaks
                            confirmButtonText: 'OK',
                            confirmButtonColor: "#01A94D"
                        });
                    }
                }
            });
        });

        // Edit User (Populating data into modal)
        $(document).on('click', '.edit-user-btn', function () {
            let userId = $(this).data('id');
            var offcanvasElement = document.getElementById('offcanvasEditUser');
            var offcanvasInstance = bootstrap.Offcanvas.getInstance(offcanvasElement);

            if (!offcanvasInstance) {
                offcanvasInstance = new bootstrap.Offcanvas(offcanvasElement);
            }

            $.ajax({
                url: `/admin/users/${userId}/edit`,
                type: "GET",
                success: function (response) {
                    $('#edit_user_id').val(response.user.id);

                    let fullname = response.user.fullname.trim().split(" ");
                    let firstname = "";
                    let middleInitial = "";
                    let lastname = "";
                    let contactNum = String(response.user.contact_num);

                    // If it starts with 63 (without the plus), add the plus sign
                    if (contactNum.startsWith("63")) {
                        contactNum = "+" + contactNum;
                    } else if (!contactNum.startsWith("+63")) {
                        // If it doesn't start with 63 or +63, enforce the +63 prefix
                        contactNum = "+63" + contactNum;
                    }

                    // Loop through the parts of the name
                    for (let i = 0; i < fullname.length; i++) {
                        if (fullname[i].length === 2 && fullname[i][1] === '.') {
                            // This part is the middle initial (1 letter + '.')
                            middleInitial = fullname[i][0];
                        } else if (i === fullname.length - 1) {
                            // Last part is the last name
                            lastname = fullname[i];
                        } else {
                            // Other parts are the first name
                            firstname += fullname[i] + " ";
                        }
                    }

                    // Trim extra spaces from the first name
                    firstname = firstname.trim();

                    // Populate the form fields
                    $('#edit_firstname').val(firstname);
                    $('#edit_middle_initial').val(middleInitial);
                    $('#edit_lastname').val(lastname);

                    // Set the formatted contact number in the input field
                    $('#edit_contact_num').val(contactNum);
                    $('#edit_username').val(response.user.username);
                    $('#edit_user_type').val(response.user.user_type);

                    offcanvasInstance.show();
                },
                error: function (error) {
                    console.log("Error fetching user data: ", error);
                }
            });
        });

        // Update User
        // Store original values when the form is loaded
        let originalUserValues = {};

        function storeOriginalUserValues() {
            originalUserValues = {
                firstname: $('#edit_firstname').val(),
                middleinitial: $('#edit_middle_initial').val(),
                lastname: $('#edit_lastname').val(),
                username: $('#edit_username').val(),
                contact_num: $('#edit_contact_num').val(),
                role: $('#edit_user_type').val(),
            };
        }

        // Call this function when the offcanvas is displayed
        $('#offcanvasEditUser').on('shown.bs.offcanvas', function () {
            storeOriginalUserValues(); // Store values when the offcanvas is shown
        });

        $('#editUserForm').on('submit', function (e) {
            e.preventDefault();
            let userId = $('#edit_user_id').val();

            // Check for changes
            const currentUserValues = {
                firstname: $('#edit_firstname').val(),
                middleinitial: $('#edit_middle_initial').val(),
                lastname: $('#edit_lastname').val(),
                username: $('#edit_username').val(),
                contact_num: $('#edit_contact_num').val(),
                role: $('#edit_user_type').val(),
            };

            const hasUserChanges = Object.keys(originalUserValues).some(key => originalUserValues[key] !== currentUserValues[key]);

            if (!hasUserChanges) {
                // No changes made
                Swal.fire({
                    icon: 'info',
                    title: 'No Changes Made!',
                    text: 'You have not made any changes to the user details.',
                    confirmButtonText: 'OK',
                    confirmButtonColor: '#007bff'
                });
                return; // Exit the function
            }

            $.ajax({
                url: `/admin/users/${userId}/update`,
                type: "PUT",
                data: $(this).serialize(),
                success: function (response) {
                    fetchUsers();

                    Swal.fire({
                        icon: 'success',
                        title: 'User Updated!',
                        text: response.message,
                        confirmButtonText: 'OK',
                        confirmButtonColor: "#01A94D" // Optional: Customize the confirm button color
                    }).then(() => {

                        // Update this to match the correct ID in your HTML
                        var offcanvasElement = document.getElementById('offcanvasEditUser');

                        // Manually create the Offcanvas instance if it doesn't exist
                        var offcanvasInstance = bootstrap.Offcanvas.getInstance(offcanvasElement);

                        if (!offcanvasInstance) {
                            offcanvasInstance = new bootstrap.Offcanvas(offcanvasElement);
                        }

                        if (offcanvasInstance) {
                            offcanvasInstance.hide();
                        }
                    });
                },
                error: function (error) {
                    console.log("Error updating user: ", error);

                    // Use SweetAlert2 for error message
                    Swal.fire({
                        icon: 'error',
                        title: 'Update Failed!',
                        text: 'An error occurred while updating the user. Please try again.',
                        confirmButtonText: 'OK',
                        confirmButtonColor: '#d33' // Optional: Customize error button color
                    });
                }
            });
        });

        // Delete User
        $(document).on('click', '.delete-user-btn', function () {
            let userId = $(this).data('id');

            // Use SweetAlert2 for the confirmation dialog
            Swal.fire({
                title: 'Delete User?',
                text: "This action is irreversible.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Confirm',
                cancelButtonText: 'Cancel',
                confirmButtonColor: '#c03221',
                cancelButtonColor: '#6c757d',
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: `/admin/users/${userId}/delete`,
                        type: "PUT",
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // Add CSRF token header
                        },
                        success: function (response) {
                            fetchUsers();

                            Swal.fire({
                                icon: 'success',
                                title: 'User Deleted!',
                                text: response.message,
                                confirmButtonText: 'OK',
                                confirmButtonColor: "#01A94D"
                            }).then(() => {
                                // fetchUsers();
                            });
                        },
                        error: function (error) {
                            console.log("Error deleting user: ", error);

                            // Show error message
                            Swal.fire({
                                icon: 'error',
                                title: 'Delete Failed!',
                                text: 'An error occurred while deleting the user. Please try again.',
                                confirmButtonText: 'OK',
                                confirmButtonColor: '#d33'
                            });
                        }
                    });
                }
            });
        });


        // View User
        $(document).on('click', '.view-user-btn', function (e) {
            e.preventDefault();
            
            let userId = $(this).data('id');

            $.ajax({
                url: `/admin/users/${userId}/show`, // Adjust route as needed
                type: "GET",
                success: function (response) {
                    // Populate modal with user data using direct ID selectors
                    $('#modal_fullname').text(response.user.fullname);
                    $('#modal_role').text(response.user.user_type);
                    $('#modal_status').text(response.user.status);
                    $('#modal_contact_num').text('+' + response.user.contact_num);
                    $('#modal_created_at').text(response.user.created_at);
                    $('#modal_updated_at').text(response.user.updated_at);
                    $('#modal_username').text(response.user.username);
                    $('#modal_password').text('********'); // Masked password for security

                    // Show the modal
                    $('#viewUserModal').modal('show');
                },
                error: function (error) {
                    console.log("Error fetching user data: ", error);
                    alert("Failed to fetch user details.");
                }
            });
        });

    });
</script>

@endsection