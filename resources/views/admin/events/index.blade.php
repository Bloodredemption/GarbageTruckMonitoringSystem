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
                                <h1><strong>Event Records</strong></h1>
                                <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="{{ route('dashboard')}}">Dashboard</a></li>
                                        <li class="breadcrumb-item active text-white" aria-current="page">Events</li>
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
                                                Event List
                                            </button>
                                        </li>
                                        {{-- <li class="nav-item" role="presentation">
                                            <button class="nav-link" id="archive-tab" data-bs-toggle="tab" data-bs-target="#archive" type="button" role="tab" aria-controls="archive" aria-selected="false">
                                                Archive List
                                            </button>
                                        </li> --}}
                                    </ul>
                                </div>
                                
                                <div>
                                    <a href="#" class=" text-center btn btn-outline-secondary btn-icon mt-lg-0 mt-md-0 mt-3 " data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        <i class="btn-inner">
                                            <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-adjustments-horizontal"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M14 6m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" /><path d="M4 6l8 0" /><path d="M16 6l4 0" /><path d="M8 12m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" /><path d="M4 12l2 0" /><path d="M10 12l10 0" /><path d="M17 18m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" /><path d="M4 18l11 0" /><path d="M19 18l1 0" /></svg>
                                        </i>
                                        <span>Filter</span>
                                    </a>
                                    <a href="#" class=" text-center btn btn-primary btn-icon mt-lg-0 mt-md-0 mt-3" data-bs-toggle="modal" data-bs-target="#addNotifModal">
                                        <i class="btn-inner">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                            </svg>
                                        </i>
                                        <span>Create</span>
                                    </a>
                                </div>
                            </div>

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
                                                                <div class="col-md-12 mb-3">
                                                                    <label for="date" class="form-label">Date Created</label>
                                                                    <input type="text" id="created-date" name="start" class="form-control flatpickr_humandate flatpickr-input active" placeholder="Select Date" readonly>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                        </div>

                                        <div class="table-responsive mt-3">
                                            <table id="notification-tbl" class="table" role="grid" data-bs-toggle="data-table">
                                                <thead>
                                                    <tr class="ligth" style="background-color: #01A94D; color: white;">
                                                        <th>No.</th>
                                                        <th>Name</th>
                                                        <th>Date</th>
                                                        <th>Description</th>
                                                        <th style="min-width: 100px">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($events as $event)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $event->name }}</td>
                                                        <td>{{ $event->date }}</td>
                                                        <td>{{ $event->description }}</td>
                                                        <td>
                                                            <div class="flex align-items-center list-user-action">
                                                                <a class="btn btn-sm btn-icon btn-warning edit-notif-btn" data-id="{{ $event->id }}" title="Edit Event">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" style="fill: rgba(255, 255, 255, 1); transform: ; msFilter:;">
                                                                        <path d="m18.988 2.012 3 3L19.701 7.3l-3-3zM8 16h3l7.287-7.287-3-3L8 13z"></path>
                                                                        <path d="M19 19H8.158c-.026 0-.053.01-.079.01-.033 0-.066-.009-.1-.01H5V5h6.847l2-2H5c-1.103 0-2 .896-2 2v14c0 1.104.897 2 2 2h14a2 2 0 0 0 2-2v-8.668l-2 2V19z"></path>
                                                                    </svg>
                                                                    Edit
                                                                </a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    @endforeach
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
    
    <!-- Modal for Adding New Notification -->
    <div class="modal fade" id="addNotifModal" tabindex="-1" aria-labelledby="addNotifLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="addNotifLabel">Create Event</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="addEventForm" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="add_ename" class="form-label">Name <span style="color: red;">*</span></label>
                            <select class="form-control" id="add_ename" name="ename" required>
                                <option></option>
                                <option value="Fiesta Celebration">Fiesta Celebration</option>
                                <option value="Election Campaign">Election Campaign</option>
                                <option value="Natural Disaster">Natural Disaster</option>
                                <option value="Parade">Parade</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="add_date" class="form-label">Date <span style="color: red;">*</span></label>
                            <input type="date" id="add_date" name="date" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="add_desc" class="form-label">Description <span style="color: red;">*</span></label>
                            <textarea class="form-control" id="add_desc" name="desc" rows="4" cols="50" required></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-soft-light" data-bs-dismiss="modal">Close</button>
                    <button type="submit" form="addEventForm" class="btn btn-primary" id="saveChangesBtn">
                        <div class="spinner-border spinner-border-sm text-white d-none" role="status" id="saveChangesSpinner">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                        Save changes
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal for Editing Notification -->
    <div class="modal fade" id="editNotifModal" tabindex="-1" aria-labelledby="editNotifLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="editNotifLabel">Edit Event</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="editNotifForm" method="POST">
                        @csrf
                        <input type="hidden" id="edit_event_id" name="event_id">
        
                        <div class="mb-3">
                            <label for="edit_ename" class="form-label">Name <span style="color: red;">*</span></label>
                            <select class="form-control" id="edit_ename" name="ename" required>
                                <option></option>
                                <option value="Fiesta Celebration">Fiesta Celebration</option>
                                <option value="Election Campaign">Election Campaign</option>
                                <option value="Natural Disaster">Natural Disaster</option>
                                <option value="Parade">Parade</option>
                                <option value="No event">No event</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="edit_date" class="form-label">Date <span style="color: red;">*</span></label>
                            <input type="date" id="edit_date" name="date" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="edit_desc" class="form-label">Description <span style="color: red;">*</span></label>
                            <textarea class="form-control" id="edit_desc" name="desc" rows="4" cols="50" required></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-soft-light" data-bs-dismiss="modal">Close</button>
                    <button type="submit" form="editNotifForm" class="btn btn-primary" id="editsaveChangesBtn">
                        <div class="spinner-border spinner-border-sm text-white d-none" role="status" id="editsaveChangesSpinner">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                        Save changes
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div class="toast-container position-fixed bottom-0 end-0 p-3">
        <div id="userSuccessToast" class="toast align-items-center text-bg-success border-0" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="d-flex">
                <div id="toastMessage" class="toast-body">
                    <!-- Success message will be dynamically inserted here -->
                </div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
        </div>
    </div>
    
    <!-- Footer Section Start -->
    @include('partials.footer')
    <!-- Footer Section End -->    
</main>

<script>
    $(document).ready(function () {
        table = $('#notification-tbl').DataTable({
            bSort: true,
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
                    title: 'Event List',
                    exportOptions: {
                        columns: ':not(:last-child)'
                    }
                },
                { 
                    extend: 'excel', 
                    text: 'Excel',
                    title: 'Event List',
                    exportOptions: {
                        columns: ':not(:last-child)'
                    }
                },
                { 
                    extend: 'pdf', 
                    text: 'PDF',
                    title: 'Event List',
                    exportOptions: {
                        columns: ':not(:last-child)'
                    }
                },
                { 
                    extend: 'print', 
                    text: 'Print',
                    title: 'Event List',
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
        
        $('#clear-filters').on('click', function(e) {
            e.preventDefault(); // Prevent the default anchor click behavior
            
            let calendarInstance = document.querySelector('#created-date')._flatpickr;
            if (calendarInstance) {
                calendarInstance.clear();  // Clear the Flatpickr instance
            }
            
            // Fetch users again to update the table without filters
            fetchNotifications();
        });

        
        // Fetch barangays and display in the table
        function fetchNotifications() {
            let created_date = $('#created-date').val();  // Get the flatpickr input value

            // Convert to a common format (use 'en-CA' for YYYY-MM-DD or 'en-US' for MM/DD/YYYY)
            let calendarDate = new Date(created_date).toLocaleDateString('en-CA');

            $.ajax({
                url: "{{ route('events.index') }}", // Your route for fetching barangays
                type: "GET",
                data: {
                    created_date: calendarDate // Pass the created date filter
                },
                
                success: function (response) {
                    let rows = '';
                    let counter = 1;

                    $.each(response.events, function (key, event) {
                        // Convert event.created_at to the same format
                        let tableDate = new Date(event.date).toLocaleDateString('en-CA');

                        if ((created_date === '' || tableDate === created_date)) {

                            let formatteddate = tableDate;

                            rows += `
                                <tr>
                                    <td>${counter}</td>
                                    <td>${event.name}</td>
                                    <td>${formatteddate}</td>
                                    <td>${event.description}</td>
                                    <td>
                                        <div class="flex align-items-center list-user-action">
                                            <a class="btn btn-sm btn-icon btn-warning edit-notif-btn" data-id="${event.id}" title="Edit Event">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" style="fill: rgba(255, 255, 255, 1); transform: ; msFilter:;">
                                                    <path d="m18.988 2.012 3 3L19.701 7.3l-3-3zM8 16h3l7.287-7.287-3-3L8 13z"></path>
                                                    <path d="M19 19H8.158c-.026 0-.053.01-.079.01-.033 0-.066-.009-.1-.01H5V5h6.847l2-2H5c-1.103 0-2 .896-2 2v14c0 1.104.897 2 2 2h14a2 2 0 0 0 2-2v-8.668l-2 2V19z"></path>
                                                </svg>
                                                Edit
                                            </a>
                                        </div>
                                    </td>
                                </tr>`;
                            counter++;
                        }
                    });

                    let dataTable = $('#notification-tbl').DataTable();
                    dataTable.clear(); // Clear the existing table data
                    dataTable.destroy();

                    $('#notification-tbl tbody').html(rows);

                    let table = $('#notification-tbl').DataTable({
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
                                title: 'Event List',
                                exportOptions: {
                                    columns: ':not(:last-child)'
                                }
                            },
                            { 
                                extend: 'excel', 
                                text: 'Excel',
                                title: 'Event List',
                                exportOptions: {
                                    columns: ':not(:last-child)'
                                }
                            },
                            { 
                                extend: 'pdf', 
                                text: 'PDF',
                                title: 'Event List',
                                exportOptions: {
                                    columns: ':not(:last-child)'
                                }
                            },
                            { 
                                extend: 'print', 
                                text: 'Print',
                                title: 'Event List',
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
                }
            });
        }

        $('#status-filter, #created-date').on('change', function () {
            fetchNotifications(); // Fetch data whenever a filter changes
        });

        // Add Event
        $('#addEventForm').on('submit', function (e) {
            e.preventDefault();

            $('#saveChangesBtn').attr('disabled', true); 
            $('#saveChangesSpinner').removeClass('d-none');

            let formData = {
                _token: "{{ csrf_token() }}", // Laravel CSRF token
                name: $('#add_ename').val(),
                date: $('#add_date').val(),
                description: $('#add_desc').val(),
            };

            $.ajax({
                url: "{{ route('events.store') }}", // Route for storing barangay
                type: "POST",
                data: formData,
                success: function (response) {
                    fetchNotifications();

                    $('#toastMessage').text(response.message);

                    // Trigger Bootstrap toast instead of SweetAlert
                    var toastEl = new bootstrap.Toast(document.getElementById('userSuccessToast'));
                    toastEl.show();

                    $('#addEventForm')[0].reset();
                    $('#addNotifModal').modal('hide');
                },
                error: function (error) {
                    let errors = error.responseJSON.errors;
                    let errorMessage = '';
                    for (let field in errors) {
                        errorMessage += errors[field][0] + '<br>';
                    }
                    Swal.fire({
                        icon: 'error',
                        title: 'Error!',
                        html: errorMessage,
                        confirmButtonText: 'OK',
                        confirmButtonColor: "#01A94D"
                    });
                },
                complete: function() {
                    // Re-enable the button and hide spinner after the request is complete
                    $('#saveChangesBtn').attr('disabled', false);
                    $('#saveChangesSpinner').addClass('d-none'); // Hide spinner
                }
            });
        });

        // Edit Notification
        $('#notification-tbl').on('click', '.edit-notif-btn', function () {
            let id = $(this).data('id');

            $.ajax({
                url: `/admin/events/${id}/edit`,
                type: "GET",
                success: function (response) {
                    let event = response.event;
                    $('#edit_ename').val(event.name);
                    $('#edit_date').val(event.date);
                    $('#edit_desc').val(event.description);
                    $('#edit_event_id').val(event.id);

                    $('#editNotifModal').modal('show');
                },
                error: function (error) {
                    console.log("Error fetching event: ", error);
                }
            });
        });
        
        let originalValues = {};

        function storeOriginalValues() {
            originalValues = {
                name: $('#edit_ename').val(),
                date: $('#edit_date').val(),
                description: $('#edit_desc').val(),
            };
        }

        // Call this function when the form is displayed
        $('#editNotifModal').on('shown.bs.modal', function () {
            storeOriginalValues(); // Store values when the offcanvas is shown
        });

        $('#editNotifForm').on('submit', function (e) {
            e.preventDefault();
            let id = $('#edit_event_id').val();

            // Check for changes
            const currentValues = {
                name: $('#edit_ename').val(),
                date: $('#edit_date').val(),
                description: $('#edit_desc').val(),
            };

            const hasChanges = Object.keys(originalValues).some(key => originalValues[key] !== currentValues[key]);

            if (!hasChanges) {
                // No changes made
                Swal.fire({
                    icon: 'info',
                    title: 'No Changes Made!',
                    text: 'You have not made any changes to the nofication details.',
                    confirmButtonText: 'OK',
                    confirmButtonColor: '#007bff'
                });
                return; // Exit the function
            }

            let formData = {
                _token: "{{ csrf_token() }}", // Laravel CSRF token
                name: $('#edit_ename').val(),
                date: $('#edit_date').val(),
                description: $('#edit_desc').val(),
            };

            $('#editsaveChangesBtn').attr('disabled', true); 
            $('#editsaveChangesSpinner').removeClass('d-none');

            $.ajax({
                url: `/admin/events/${id}/update`,
                type: "PUT",
                data: formData,
                success: function (response) {
                    fetchNotifications();

                    $('#toastMessage').text(response.message);

                    // Trigger Bootstrap toast instead of SweetAlert
                    var toastEl = new bootstrap.Toast(document.getElementById('userSuccessToast'));
                    toastEl.show();

                    $('#editNotifForm')[0].reset(); // Reset form
                    $('#editNotifModal').modal('hide');
                },
                error: function (error) {
                    console.log("Error updating event: ", error);
                    Swal.fire({
                        icon: 'error',
                        title: 'Update Failed!',
                        text: 'An error occurred while updating the event. Please try again.',
                        confirmButtonText: 'OK',
                        confirmButtonColor: '#d33'
                    });
                },
                complete: function() {
                    // Re-enable the button and hide spinner after the request is complete
                    $('#editsaveChangesBtn').attr('disabled', false);
                    $('#editsaveChangesSpinner').addClass('d-none'); // Hide spinner
                }
            });
        });

    });
</script>

@endsection