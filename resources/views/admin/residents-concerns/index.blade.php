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
                                <h1><strong>Residents Concerns Records</strong></h1>
                                <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="{{ route('dashboard')}}">Dashboard</a></li>
                                        <li class="breadcrumb-item active text-white" aria-current="page">Residents Concerns</li>
                                    </ol>
                                </nav>
                            </div>
                            <div class="d-flex">
                                {{-- <div>
                                    <a target="_blank" href="{{ route('rc.index') }}" class="btn btn-soft-light text-white me-2" type="button">
                                        <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-external-link">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                            <path d="M12 6h-6a2 2 0 0 0 -2 2v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-6" />
                                            <path d="M11 13l9 -9" />
                                            <path d="M15 4h5v5" />
                                        </svg>
                                        Complaint Form
                                    </a>
                                </div> --}}
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
                                    <h4 class="card-title">Residents Concerns List</h4>
                                    {{-- <p class="mb-0">Sub Title Here</p>           --}}
                                </div>
                                
                            </div>
                            <div class="card-body px-0">
                                <div class="table-responsive">
                                    <table id="concerns-table" class="table" role="grid" data-bs-toggle="data-table">
                                        <thead>
                                            <tr class="ligth" style="background-color: #01A94D; color: white;">
                                                <th>No.</th>
                                                <th>Complainant</th>
                                                <th>Address</th>
                                                <th>Status</th>
                                                <th>Date Reported</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($concerns as $concerns)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $concerns->fullname }}</td>
                                                <td>{{ $concerns->address }}</td>
                                                <td>{{ $concerns->status }}</td>
                                                <td>{{ $concerns->dateOfIncident }}</td>
                                                <td>
                                                    <div class="flex align-items-center list-user-action">
                                                        <!-- Archive Button with Tooltip -->
                                                        <a class="btn btn-sm btn-icon btn-gray view-concerns btn-hover" data-id="{{ $concerns->id }}">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-eye">
                                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                                                <path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
                                                                <path d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6" />
                                                            </svg>
                                                            Show
                                                        </a>
                                                        @if (!$concerns->notification)
                                                            <a class="btn btn-sm btn-icon btn-secondary forwardTo btn-hover" data-id="{{ $concerns->id }}" data-bs-toggle="modal" data-bs-target="#forwardToModal">
                                                                <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-share-2">
                                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                                                    <path d="M8 9h-1a2 2 0 0 0 -2 2v8a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-8a2 2 0 0 0 -2 -2h-1" />
                                                                    <path d="M12 14v-11" />
                                                                    <path d="M9 6l3 -3l3 3" />
                                                                </svg>
                                                                Forward
                                                            </a>
                                                        @endif
                                                        {{-- @if ($concerns->status == 'Pending')
                                                            <a class="btn btn-sm btn-icon btn-primary finish-concern btn-hover" data-id="{{ $concerns->id }}" data-bs-toggle="tooltip" title="Finish">
                                                                <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-checkbox">
                                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                                                    <path d="M9 11l3 3l8 -8" />
                                                                    <path d="M20 12v6a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2h9" />
                                                                </svg>
                                                                Finish
                                                            </a>
                                                        @endif --}}
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
    
    <div class="modal fade" id="viewConcernModal" tabindex="-1" aria-labelledby="viewConcernModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="viewConcernModalLabel">Resident Concern Information</h1>
                </div>
                <div class="modal-body">
                    <ul class="list-unstyled">
                        <li><strong>Complainant Details:</strong>
                            <ul>
                                <li>Name - <span id="fullname"></span></li>
                                <li>Contact No. - <span id="contact_num"></span></li>
                            </ul>
                        </li>
                        <li><strong>Description:</strong>
                            <ul>
                                <li><span id="complaint_details"></span></li>
                            </ul>
                        </li>
                        <li><strong>Location - </strong> <span id="brgy_location"></span></li>
                    </ul>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-soft-light" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="forwardToModal" tabindex="-1" aria-labelledby="forwardToLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="forwardToLabel">Forward Complaint To</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="forwardToForm" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="receiver" class="form-label">Recipient <span style="color: red;">*</span></label>
                            <select class="form-control" id="receiver" name="recipient" required>
                                <option></option>
                            </select>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-soft-light" data-bs-dismiss="modal">Close</button>
                    <button type="submit" form="forwardToForm" class="btn btn-primary" id="saveChangesBtn">
                        <div class="spinner-border spinner-border-sm text-white d-none" role="status" id="saveChangesSpinner">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                        Submit
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer Section Start -->
    @include('partials.footer')
    <!-- Footer Section End -->    
</main>

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

<script>
    $(document).ready(function() {
        var table = $('#concerns-table').DataTable({
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
                    title: 'Residents Concerns',
                    // exportOptions: {
                    //     columns: ':not(:last-child)' // Exclude action column
                    // }
                },
                { 
                    extend: 'excel', 
                    text: 'Excel',
                    title: 'Residents Concerns',
                    // exportOptions: {
                    //     columns: ':not(:last-child)' // Exclude action column
                    // }
                },
                { 
                    extend: 'pdf', 
                    text: 'PDF',
                    title: 'Residents Concerns',
                    // exportOptions: {
                    //     columns: ':not(:last-child)' // Exclude action column
                    // }
                },
                { 
                    extend: 'print', 
                    text: 'Print',
                    title: 'Residents Concerns',
                    // exportOptions: {
                    //     columns: ':not(:last-child)' // Exclude action column
                    // }
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

        $(document).on('click', '.forwardTo', function() {
            let concernId = $(this).data('id');
            $('#forwardToForm').data('id', concernId); // Set the data-id on the form
        });

        $('#forwardToForm').on('submit', function (e) {
            e.preventDefault();

            $('#saveChangesBtn').attr('disabled', true); 
            $('#saveChangesSpinner').removeClass('d-none');

            let concernId = $(this).data('id');
            
            console.log(concernId);
            
            let formData = {
                _token: "{{ csrf_token() }}", // Laravel CSRF token
                notification_msg: concernId,
                user_id: $('#receiver').val(),
            };

            $.ajax({
                url: "{{ route('notifications.store') }}", // Route for storing barangay
                type: "POST",
                data: formData,
                success: function (response) {
                    $('#toastMessage').text('Complaint forwarded successfully!');

                    // Trigger Bootstrap toast instead of SweetAlert
                    var toastEl = new bootstrap.Toast(document.getElementById('userSuccessToast'));
                    toastEl.show();

                    $('#forwardToForm')[0].reset();
                    $('#forwardToModal').modal('hide');

                    location.reload();
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

        function fetchDrivers() {
            $.ajax({
                url: "{{ route('notifications.getDrivers') }}", // Your route for fetching drivers
                type: "GET",
                success: function (response) {
                    let driverSelect1 = $('#receiver'); // First driver select

                    // Clear the select options for both select elements
                    driverSelect1.empty();

                    // Add default options for both selects
                    driverSelect1.append('<option></option>');

                    // Populate both selects with the drivers
                    $.each(response.drivers, function (key, driver) {
                        driverSelect1.append(`<option value="${driver.id}">${driver.fullname}</option>`);
                    });
                },
                error: function (error) {
                    console.log("Error fetching drivers: ", error);
                }
            });
        }

        // Call the fetch function when the page loads
        fetchDrivers();

        $(document).on('click', '.view-concerns', function (e) {
            e.preventDefault();
            
            let concernId = $(this).data('id');

            $.ajax({
                url: `/admin/residents-concerns/${concernId}/show`, // Adjust route as needed
                type: "GET",
                success: function (response) {
                    // Populate modal with user data
                    $('#fullname').text(response.concern.fullname);
                    $('#contact_num').text(response.concern.contact_num);
                    $('#complaint_details').text(response.concern.complaint_details);
                    $('#brgy_location').text(response.concern.address);


                    // Show the modal
                    $('#viewConcernModal').modal('show');
                },
                error: function (error) {
                    console.log("Error fetching concern data: ", error);
                    alert("Failed to fetch concern details.");
                }
            });
        });

        $(document).on('click', '.finish-concern', function (e) {
            e.preventDefault();

            let concernId = $(this).data('id'); // Get the concern ID
            let finishUrl = `/admin/residents-concerns/${concernId}/finish`; // Adjust the route as needed

            // Show confirmation dialog using SweetAlert
            Swal.fire({
                title: "Are you sure?",
                text: "Do you want to mark this concern as finished?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Confirm",
            }).then((result) => {
                if (result.isConfirmed) {
                    // Send AJAX request to mark concern as finished
                    $.ajax({
                        url: finishUrl,
                        type: "PUT",
                        data: {
                            _token: $('meta[name="csrf-token"]').attr('content') // Add CSRF token
                        },
                        success: function (response) {
                            if (response.success) {
                                Swal.fire(
                                    "Finished!",
                                    response.message,
                                    "success"
                                );
                                location.reload(); // Reload the page
                            } else {
                                Swal.fire(
                                    "Failed!",
                                    "Failed to mark the concern as finished.",
                                    "error"
                                );
                            }
                        },
                        error: function (error) {
                            console.error("Error finishing concern:", error);
                            Swal.fire(
                                "Error!",
                                "An error occurred while processing your request.",
                                "error"
                            );
                        }
                    });
                }
            });
        });


    });
</script>

@endsection