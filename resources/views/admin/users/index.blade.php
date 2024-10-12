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
                                <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="{{ route('dashboard')}}">Dashboard</a></li>
                                        <li class="breadcrumb-item active text-white" aria-current="page">Users Records</li>
                                    </ol>
                                </nav>
                            </div>
                            <div>
                               <div class="dropdown">
                                    <button class="btn btn-soft-light text-white dropdown-toggle me-2" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-file-settings">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                            <path d="M12 14m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                                            <path d="M12 10.5v1.5" />
                                            <path d="M12 16v1.5" />
                                            <path d="M15.031 12.25l-1.299 .75" />
                                            <path d="M10.268 15l-1.3 .75" />
                                            <path d="M15 15.803l-1.285 -.773" />
                                            <path d="M10.285 12.97l-1.285 -.773" />
                                            <path d="M14 3v4a1 1 0 0 0 1 1h4" />
                                            <path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z" />
                                        </svg>
                                        Export Options
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <li><a class="dropdown-item" href="#" id="export-csv">CSV</a></li>
                                        <li><a class="dropdown-item" href="#" id="export-excel">Excel</a></li>
                                        <li><a class="dropdown-item" href="#" id="export-pdf">PDF</a></li>
                                        <li><a class="dropdown-item" href="#" id="export-print">Print</a></li>
                                    </ul>
                                </div>
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
                                    <ul class="nav custom-tabs" id="myTab" role="tablist">
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link active" id="table-view-tab" data-bs-toggle="tab" data-bs-target="#table-view" type="button" role="tab" aria-controls="table-view" aria-selected="true">
                                                Users List
                                            </button>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link" id="archive-tab" data-bs-toggle="tab" data-bs-target="#archive" type="button" role="tab" aria-controls="archive" aria-selected="false">
                                                Archive List
                                            </button>
                                        </li>
                                    </ul>
                                    
                                </div>
                                
                                <div>
                                    <a href="#" class=" text-center btn btn-outline-secondary btn-icon mt-lg-0 mt-md-0 mt-3 " data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        <i class="btn-inner">
                                            <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-adjustments-horizontal"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M14 6m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" /><path d="M4 6l8 0" /><path d="M16 6l4 0" /><path d="M8 12m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" /><path d="M4 12l2 0" /><path d="M10 12l10 0" /><path d="M17 18m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" /><path d="M4 18l11 0" /><path d="M19 18l1 0" /></svg>
                                        </i>
                                        <span>Filter</span>
                                    </a>
                                    <a href="#" class=" text-center btn btn-primary btn-icon mt-lg-0 mt-md-0 mt-3" data-bs-toggle="modal" data-bs-target="#addUserModal">
                                        <i class="btn-inner">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                            </svg>
                                        </i>
                                        <span>Create</span>
                                    </a>
                                </div>
                            </div>
                            
                        {{-- <div class="d-flex flex-column align-items-center justify-content-center" style="height: 80vh;">
                                <img src="{{ asset('assets/images/no-data.svg')}}" class="img-fluid mb-4" alt="No Data Found">
                                <h1 style="color: #8A92A6;"><strong>No Data Found</strong></h1>
                                <span>Start adding user by clicking the “Add New” button.</span>
                            </div> --}}

                            <div class="card-body px-0" style="padding: 0; padding-bottom: 1.5rem;">
                                <!-- Bootstrap Tabs -->
                            
                                <!-- Tab Content -->
                                <div class="tab-content" id="myTabContent">
                                    <!-- Table View Tab Pane -->
                                    <div class="tab-pane fade show active" id="table-view" role="tabpanel" aria-labelledby="table-view-tab">
                                        <div class="pl-3 pr-3" style="padding-left: 1.5rem; padding-right: 1.5rem; padding-top: 1rem;">
                                            <div class="accordion" id="accordionExample">
                                                <div class="accordion-item">
                                                    
                                                    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                                        <div class="accordion-body">
                                                            <div class="text-end">
                                                                <a href="#" class="text-center btn-icon mt-lg-0 mt-md-0 mt-5" id="clear-filters">
                                                                    <i class="btn-inner">
                                                                        <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-x"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M18 6l-12 12" /><path d="M6 6l12 12" /></svg>
                                                                    </i>
                                                                    <span>Clear Filter</span>
                                                                </a>
                                                            </div>
                                                            
                                                            <div class="row">
                                                                <div class="col-md-4 mb-3">
                                                                    <label for="date" class="form-label">Date Created</label>
                                                                    <input type="text" id="created-date" name="start" class="form-control flatpickr_humandate flatpickr-input active" placeholder="Select Date" readonly>
                                                                </div>
                                                                <div class="col-md-4 mb-3">
                                                                    <label for="role" class="form-label">Role</label>
                                                                    <select class="form-control" id="role-filter" name="role">
                                                                        <option value="">Select Role</option>
                                                                        <option value="admin">Admin</option>
                                                                        <option value="driver">Driver</option>
                                                                        <option value="landfill">Landfill</option>
                                                                    </select>
                                                                </div>
                                                                <div class="col-md-4 mb-3">
                                                                    <label for="status" class="form-label">Status</label>
                                                                    <select class="form-control" id="status-filter" name="status">
                                                                        <option value="">Select Status</option>
                                                                        <option value="active">Active</option>
                                                                        <option value="inactive">Inactive</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                        </div>

                                        <div class="table-responsive mt-3">
                                            <table id="datatable" class="table" role="grid" data-bs-toggle="data-table">
                                                <thead>
                                                    <tr class="ligth" style="background-color: #01A94D; color: white;">
                                                        <th>No.</th>
                                                        <th>Name</th>
                                                        <th>Username</th>
                                                        <th>Contact No.</th>
                                                        <th>Role</th>
                                                        <th>Status</th>
                                                        <th>Date Created</th>
                                                        <th style="min-width: 100px">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="userTableBody">
                                                    <!-- Data will be fetched here using AJAX -->
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                            
                                    <!-- Archive Tab Pane -->
                                    <div class="tab-pane fade" id="archive" role="tabpanel" aria-labelledby="archive-tab">
                                        
                                        <div class="table-responsive mt-3">
                                            <table id="arch-datatable" class="table" role="grid">
                                                <thead>
                                                    <tr class="ligth" style="background-color: #01A94D; color: white;">
                                                        <th>No.</th>
                                                        <th>Name</th>
                                                        <th>Username</th>
                                                        <th>Contact No.</th>
                                                        <th>Role</th>
                                                        <th>Date Archive</th>
                                                        <th style="min-width: 100px">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="auserTableBody">
                                                    <!-- Archive data will be fetched here using AJAX -->
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
        </div>
    </div>
    
    <!-- Modal for Adding New User -->
    <div class="modal fade" id="addUserModal" tabindex="-1" aria-labelledby="addUserLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="addUserLabel">Create User</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="addUserForm" action="{{ route('users.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-8 mb-3">
                                <label for="add_firstname" class="form-label">First Name <span style="color: red;">*</span></label>
                                <input type="text" class="form-control" id="add_firstname" name="firstname" required>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="add_middle_initial" class="form-label">Middle Initial</label>
                                <input type="text" class="form-control" id="add_middle_initial" name="middle_initial" maxlength="1">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="add_lastname" class="form-label">Last Name <span style="color: red;">*</span></label>
                            <input type="text" class="form-control" id="add_lastname" name="lastname" required>
                        </div>
                        <div class="mb-3">
                            <label for="add_username" class="form-label">Username <span style="color: red;">*</span></label>
                            <input type="text" class="form-control" id="add_username" name="username" required>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="add_contact_num" class="form-label">Contact Number <span style="color: red;">*</span></label>
                                <input type="text" class="form-control" id="add_contact_num" name="contact_num" maxlength="13" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="add_user_type" class="form-label">Role <span style="color: red;">*</span></label>
                                <select class="form-control" id="add_user_type" name="user_type" required>
                                    <option></option>
                                    <option value="admin">Admin</option>
                                    <option value="landfill">Landfill</option>
                                    <option value="driver">Driver</option>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="add_password" class="form-label">Password <span style="color: red;">*</span></label>
                            <input type="password" class="form-control" id="add_password" name="password" required>
                        </div>
                        <div class="mb-4">
                            <label for="add_password_confirmation" class="form-label">Confirm Password <span style="color: red;">*</span></label>
                            <input type="password" class="form-control" id="add_password_confirmation" name="password_confirmation" required>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-soft-light" data-bs-dismiss="modal">Close</button>
                    <button type="submit" form="addUserForm" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal for Edit User -->
    <div class="modal fade" id="editUserModal" tabindex="-1" aria-labelledby="editUserLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="editUserLabel">Update User</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="editUserForm" method="POST">
                        @csrf
                        <!-- Hidden input for user ID -->
                        <input type="hidden" id="edit_user_id" name="user_id">
                    
                        <!-- Form fields for editing user -->
                        <div class="row">
                            <div class="col-md-8 mb-3">
                                <label for="edit_firstname" class="form-label">First Name <span style="color: red;">*</span></label>
                                <input type="text" class="form-control" id="edit_firstname" name="firstname" required>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="edit_middle_initial" class="form-label">Middle Initial</label>
                                <input type="text" class="form-control" id="edit_middle_initial" name="middle_initial" maxlength="1">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="edit_lastname" class="form-label">Last Name <span style="color: red;">*</span></label>
                            <input type="text" class="form-control" id="edit_lastname" name="lastname" required>
                        </div>
                        <div class="mb-3">
                            <label for="edit_username" class="form-label">Username <span style="color: red;">*</span></label>
                            <input type="text" class="form-control" id="edit_username" name="username" required>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="edit_contact_num" class="form-label">Contact Number <span style="color: red;">*</span></label>
                                <input type="text" class="form-control" id="edit_contact_num" name="contact_num" maxlength="13" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="edit_user_type" class="form-label">Role <span style="color: red;">*</span></label>
                                <select class="form-control" id="edit_user_type" name="user_type" required>
                                    <option></option>
                                    <option value="admin">Admin</option>
                                    <option value="landfill">Landfill</option>
                                    <option value="driver">Driver</option>
                                </select>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-soft-light" data-bs-dismiss="modal">Close</button>
                    <button type="submit" form="editUserForm" class="btn btn-primary">Save changes</button>
                </div>
            </div>
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
        $('#clear-filters').on('click', function(e) {
            e.preventDefault(); // Prevent the default anchor click behavior
            
            // Reset all select elements and inputs
            $('#role-filter').val('');
            $('#status-filter').val('');
            $('#created-date').val('');
            
            // Fetch users again to update the table without filters
            fetchUsers();
        });
        
        // Fetch users and display in the table
        function fetchUsers() {
            // Get the selected filter values
            let role = $('#role-filter').val();
            let status = $('#status-filter').val();
            let created_date = $('#created-date').val();
            let date = new Date(created_date);

            let shortDateFormat = date.toLocaleDateString('en-US');

            $.ajax({
                url: "{{ route('users.index') }}", // Route for fetching users
                type: "GET",
                data: {
                    role: role,              // Pass the role filter
                    status: status,          // Pass the status filter
                    created_date: shortDateFormat // Pass the created date filter
                },
                success: function (response) {
                    let rows = '';
                    let counter = 1;
                    
                    // Loop through the users and create table rows dynamically
                    $.each(response.users, function (key, user) {
                        // Check the filters before adding the rows
                        if ((role === '' || user.user_type === role) &&
                            (status === '' || user.status === status) &&
                            (created_date === '' || new Date(user.created_at).toLocaleDateString() === created_date)) {

                            const created_at = new Date(user.created_at);
                            const formatteddate = created_at.toLocaleDateString('en-US');

                            rows += `
                                <tr>
                                    <td>${counter}</td>
                                    <td><a href="#" class="view-user-btn" data-id="${user.id}">${user.fullname}</a></td>
                                    <td>${user.username}</td>
                                    <td>+${String(user.contact_num).replace(/(\d{2})(\d{3})(\d{3})(\d{4})/, '$1 $2 $3 $4')}</td>
                                    <td>${user.user_type}</td>
                                    <td>${user.status == 'active' ? '<span class="badge bg-primary">active</span>' : '<span class="badge bg-danger">inactive</span>'}</td>
                                    <td>${formatteddate}</td>
                                    <td>
                                        <div class="flex align-items-center list-user-action">
                                            <a class="btn btn-sm btn-icon btn-warning edit-user-btn" data-id="${user.id}" title="Edit User">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" style="fill: rgba(255, 255, 255, 1); transform: ; msFilter:;">
                                                    <path d="m18.988 2.012 3 3L19.701 7.3l-3-3zM8 16h3l7.287-7.287-3-3L8 13z"></path>
                                                    <path d="M19 19H8.158c-.026 0-.053.01-.079.01-.033 0-.066-.009-.1-.01H5V5h6.847l2-2H5c-1.103 0-2 .896-2 2v14c0 1.104.897 2 2 2h14a2 2 0 0 0 2-2v-8.668l-2 2V19z"></path>
                                                </svg>
                                                Edit
                                            </a>
                                            <a class="btn btn-sm btn-icon btn-secondary archive-user-btn" data-id="${user.id}" title="Archive User">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-archive">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                                    <path d="M3 4m0 2a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v0a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2z"/>
                                                    <path d="M5 8v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-10"/>
                                                    <path d="M10 12l4 0"/>
                                                </svg>
                                                Archive
                                            </a>
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

                    // Reinitialize the DataTable with export buttons but without displaying the default buttons
                    let table = $('#datatable').DataTable({
                        bSort: false,
                        fixedHeader: true, // Enable fixed header
                        retrieve: true, // Retrieve the existing table instead of initializing it again
                        paging: true, // Enable pagination
                        searching: true, // Enable search functionality
                        info: true, // Show the number of entries info
                        responsive: true, // Ensure responsiveness
                        buttons: [
                            { 
                                extend: 'csv', 
                                text: 'CSV',
                                title: 'Users List',
                                exportOptions: {
                                    columns: ':not(:last-child)'
                                }
                            },
                            { 
                                extend: 'excel', 
                                text: 'Excel',
                                title: 'Users List',
                                exportOptions: {
                                    columns: ':not(:last-child)'
                                }
                            },
                            { 
                                extend: 'pdf', 
                                text: 'PDF',
                                title: 'Users List',
                                exportOptions: {
                                    columns: ':not(:last-child)'
                                }
                            },
                            { 
                                extend: 'print', 
                                text: 'Print',
                                title: 'Users List',
                                exportOptions: {
                                    columns: ':not(:last-child)'
                                }
                            }
                        ]
                    });

                    // Add event listeners for export options in the dropdown
                    $('#export-csv').on('click', function () {
                        table.button('.buttons-csv').trigger();
                    });
                    $('#export-excel').on('click', function () {
                        table.button('.buttons-excel').trigger();
                    });
                    $('#export-pdf').on('click', function () {
                        table.button('.buttons-pdf').trigger();
                    });
                    $('#export-print').on('click', function () {
                        table.button('.buttons-print').trigger();
                    });
                },
                error: function (error) {
                    console.log("Error fetching data: ", error);
                    alert("Failed to fetch users. Please try again.");
                }
            });
        }

        // Attach event listeners to the filters to trigger the fetchUsers function
        $('#role-filter, #status-filter, #created-date').on('change', function () {
            fetchUsers(); // Fetch data whenever a filter changes
        });

        fetchUsers();

        function fetchAUsers() {
            $.ajax({
                url: "{{ route('users.getArchive') }}", // Route for fetching users
                type: "GET",
                success: function (response) {
                    let rows = '';
                    let counter = 1;
                    // Loop through the users and create table rows dynamically
                    $.each(response.ausers, function (key, ausers) {
                        if (ausers.status == 'archive') {

                            const updatedAt = new Date(ausers.updated_at);
                            const formattedupdatedAt = updatedAt.toLocaleDateString('en-US');

                            rows += `
                                <tr>
                                    <td>${counter}</td>
                                    <td><a href="#" class="view-user-btn" data-id="${ausers.id}">${ausers.fullname}</a></td>
                                    <td>${ausers.username}</td>
                                    <td>+${String(ausers.contact_num).replace(/(\d{2})(\d{3})(\d{3})(\d{4})/, '$1 $2 $3 $4')}</td>
                                    <td>${ausers.user_type}</td>
                                    <td>${formattedupdatedAt}</td>
                                    <td>
                                        <div class="flex align-items-center list-user-action">
                                            <a class="btn btn-sm btn-icon btn-secondary restore-user-btn" data-id="${ausers.id}">
                                                <svg  xmlns="http://www.w3.org/2000/svg"  width="20"  height="20"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-restore"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M3.06 13a9 9 0 1 0 .49 -4.087" /><path d="M3 4.001v5h5" /><path d="M12 12m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" /></svg>
                                                Restore
                                            </a>
                                            <a class="btn btn-sm btn-icon btn-danger delete-user-btn" data-id="${ausers.id}">
                                                <svg  xmlns="http://www.w3.org/2000/svg"  width="20"  height="20"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-trash"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 7l16 0" /><path d="M10 11l0 6" /><path d="M14 11l0 6" /><path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" /><path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" /></svg>
                                                Delete
                                            </a>
                                        </div>
                                    </td>
                                </tr>`;
                            counter++;
                        }
                    });

                    // Destroy the existing DataTable to avoid duplication issues
                    let dataTable = $('#arch-datatable').DataTable();
                    dataTable.clear(); // Clear the existing table data
                    dataTable.destroy(); // Destroy the current instance

                    // Append the new rows to the table body
                    $('#arch-datatable tbody').html(rows);

                    // Reinitialize the DataTable to apply DataTables functionality
                    $('#arch-datatable').DataTable({
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

        fetchAUsers();

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

                        $('#editUserModal').modal('hide');

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

                    $('#editUserModal').modal('show');
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
        $('#editUserModal').on('shown.bs.modal', function () {
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

                        $('#editUserModal').modal('hide');
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

        $(document).on('click', '.archive-user-btn', function () {
            let userId = $(this).data('id');

            // Use SweetAlert2 for the confirmation dialog
            Swal.fire({
                title: 'Move to Archive?',
                text: "Are you sure you want to remove this data?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Confirm',
                cancelButtonText: 'Cancel',
                confirmButtonColor: '#c03221',
                cancelButtonColor: '#6c757d',
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: `/admin/users/${userId}/archive`,
                        type: "PUT",
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // Add CSRF token header
                        },
                        success: function (response) {
                            fetchUsers();
                            fetchAUsers();
                            
                            Swal.fire({
                                icon: 'success',
                                title: 'User Archived!',
                                text: response.message,
                                confirmButtonText: 'OK',
                                confirmButtonColor: "#01A94D"
                            }).then(() => {
                                // fetchUsers();
                            });
                        },
                        error: function (error) {
                            console.log("Error archiving user: ", error);

                            // Show error message
                            Swal.fire({
                                icon: 'error',
                                title: 'Archive Failed!',
                                text: 'An error occurred while deleting the user. Please try again.',
                                confirmButtonText: 'OK',
                                confirmButtonColor: '#d33'
                            });
                        }
                    });
                }
            });
        });

        $(document).on('click', '.restore-user-btn', function () {
            let userId = $(this).data('id');

            // Use SweetAlert2 for the confirmation dialog
            Swal.fire({
                title: 'Restore data?',
                text: "Are you sure you want to restore this data?",
                icon: 'info',
                showCancelButton: true,
                confirmButtonText: 'Confirm',
                cancelButtonText: 'Cancel',
                confirmButtonColor: '#01A94D',
                cancelButtonColor: '#6c757d',
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: `/admin/users/${userId}/restore`,
                        type: "PUT",
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // Add CSRF token header
                        },
                        success: function (response) {
                            fetchUsers();
                            fetchAUsers();
                            
                            Swal.fire({
                                icon: 'success',
                                title: 'User Restored!',
                                text: response.message,
                                confirmButtonText: 'OK',
                                confirmButtonColor: "#01A94D"
                            }).then(() => {
                                // fetchUsers();
                            });
                        },
                        error: function (error) {
                            console.log("Error restoring user: ", error);

                            // Show error message
                            Swal.fire({
                                icon: 'error',
                                title: 'Restore Failed!',
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