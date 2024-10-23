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
                                <h1><strong>Waste Conversions Records</strong></h1>
                                <p>Waste Conversions records will be displayed here.</p>
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
                                    <h4 class="card-title">Waste Conversions List</h4>
                                    {{-- <p class="mb-0">Sub Title Here</p>           --}}
                                </div>
                                
                                <div>
                                    <a href="" class="btn btn-link btn-primary" data-bs-toggle="modal" data-bs-target="#addWasteCModal">
                                        <img src="data:image/svg+xml,%3Csvg width='20' viewBox='0 0 20 20' fill='none' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink'%3E%3Crect width='20' height='20' fill='url(%23pattern0_23_2601)'/%3E%3Cdefs%3E%3Cpattern id='pattern0_23_2601' patternContentUnits='objectBoundingBox' width='1' height='1'%3E%3Cuse xlink:href='%23image0_23_2601' transform='scale(0.0333333)'/%3E%3C/pattern%3E%3Cimage id='image0_23_2601' width='30' height='30' xlink:href='data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAYAAAA7MK6iAAAACXBIWXMAAAsTAAALEwEAmpwYAAAAdklEQVR4nO3UQQrCMBBA0RzPuBDvv2hA60Iv8boRtF2I0E6oOA+yzYdJmFLSnuGMB+449QzfvIw9wzMZDmMhrrSQ4fKzo8YRzfYa6qfwRZxxl+GKISA64LDFX5hZfeG3Mlx6kW/8D6Nu78uhZ7ji+jzrN1IqgSYK2LXvCFcYxQAAAABJRU5ErkJggg=='/%3E%3C/defs%3E%3C/svg%3E%0A" alt="img">
                                        Add New
                                    </a>
                                </div>
                            </div>
                            <div class="card-body px-0">
                                <div class="table-responsive">
                                    <table id="wcov-tbl" class="table" role="grid" data-bs-toggle="data-table">
                                        <thead>
                                            <tr class="ligth" style="background-color: #01A94D; color: white;">
                                                <th>No.</th>
                                                <th>Waste Type</th>
                                                <th>Conversion Method</th>
                                                <th>Metrics</th>
                                                <th>Start Date</th>
                                                <th>End Date</th>
                                                <th>Status</th>
                                                <th style="min-width: 100px">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($wasteConversions as $wc)
                                                <tr>
                                                    <th scope="row">{{ $loop->iteration }}</th>
                                                    <td>{{ $wc->waste_type }}</td>
                                                    <td>{{ $wc->conversion_method }}</td>
                                                    <td>{{ $wc->metrics }} kg/s</td>
                                                    <td>{{ $wc->start_date }}</td>
                                                    <td>{{ $wc->end_date }}</td>
                                                    <td>{{ $wc->status }}</td>
                                                    <td>
                                                        <div class="flex align-items-center list-user-action">
                                                            <a class="btn btn-sm btn-icon btn-warning edit-wcov-btn" data-id="{{ $wc->id }}">Edit</a>
                                                            <a class="btn btn-sm btn-icon btn-danger delete-wcov-btn" data-id="{{ $wc->id }}">Delete</a>
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
    
    <!-- Offcanvas for Adding New Waste Conversion -->
    <div class="modal fade z-100" id="addWasteCModal" tabindex="-1" aria-labelledby="addWasteCLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="addWasteCLabel">Add Waste Conversion</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="addWCOVForm" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="add_wt" class="form-label">Waste Type <span style="color: red;">*</span></label>
                            <select class="form-control" id="add_wt" name="wt" required>
                                <option></option>
                                <option value="Biodegradable">Biodegradable</option>
                                <option value="Residual">Residual</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="add_cm" class="form-label">Conversion Method <span style="color: red;">*</span></label>
                            <input type="text" class="form-control" id="add_cm" name="cm" required>
                        </div>
                        <label for="add_metrics" id="add_metrics_label" class="form-label">Weight <span style="color: red;">*</span></label>
                        <div class="input-group mb-3">
                            <input type="number" class="form-control" id="add_metrics" name="metrics" required aria-label="Recipient's username" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <span class="input-group-text" id="basic-addon2">kg/s</span>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="form-group">
                                <label for="add_sd" class="form-label">Start Date <span style="color: red;">*</span></label>
                                <input type="date" class="form-control" id="add_sd" name="sd">
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="form-group">
                                <label for="add_ed" class="form-label">End Date <span style="color: red;">*</span></label>
                                <input type="date" class="form-control" id="add_ed" name="ed">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button  form="addWCOVForm" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Offcanvas for Edit Waste Composition -->
    <div class="modal fade z-100" id="editWasteCModal" tabindex="-1" aria-labelledby="editWasteCLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="editWasteCLabel">Update Waste Collection</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="editWCOVForm" method="POST">
                        @csrf
                        <input type="hidden" id="edit_wcov_id" name="wcov_id">
        
                        <div class="mb-3">
                            <label for="edit_wt" class="form-label">Waste Type <span style="color: red;">*</span></label>
                            <select class="form-control" id="edit_wt" name="wt" required>
                                <option></option>
                                <option value="Biodegradable">Biodegradable</option>
                                <option value="Residual">Residual</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="edit_cm" class="form-label">Conversion Method <span style="color: red;">*</span></label>
                            <input type="text" class="form-control" id="edit_cm" name="cm" required>
                        </div>
                        <label for="edit_metrics" id="edit_metrics_label" class="form-label">Weight <span style="color: red;">*</span></label>
                        <div class="input-group mb-3">
                            <input type="number" class="form-control" id="edit_metrics" name="metrics" required aria-label="" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <span class="input-group-text" id="editbasic-addon2">kg/s</span>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="form-group">
                                <label for="edit_sd" class="form-label">Start Date <span style="color: red;">*</span></label>
                                <input type="date" class="form-control" id="edit_sd" name="sd">
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="form-group">
                                <label for="edit_ed" class="form-label">End Date <span style="color: red;">*</span></label>
                                <input type="date" class="form-control" id="edit_ed" name="ed">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="submit" form="editWCOVForm" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer Section Start -->
    @include('partials.footer')
    <!-- Footer Section End -->    
</main>

<script>
    $(document).ready(function () {
        $('#wcov-tbl').DataTable({
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
                    title: 'Waste Conversion List',
                },
                { 
                    extend: 'excel', 
                    text: 'Excel',
                    title: 'Waste Conversion List',
                },
                { 
                    extend: 'pdf', 
                    text: 'PDF',
                    title: 'Waste Conversion List',
                },
                { 
                    extend: 'print', 
                    text: 'Print',
                    title: 'Waste Conversion List',
                }
            ]
        });
        
        function fetchWCOV() {
            $.ajax({
                url: "{{ route('wcov.index') }}", // Your route for fetching barangays
                type: "GET",
                success: function (response) {
                    let rows = '';
                    let counter = 1;
                    $.each(response.wasteConversions, function (key, wasteConversions) {
                        if (wasteConversions.isDeleted == '0') { 

                            rows += `
                                <tr>
                                    <td>${counter}</td>
                                    <td>${wasteConversions.waste_type}</td>
                                    <td>${wasteConversions.conversion_method}</td>
                                    <td>${wasteConversions.metrics} kg/s</td>
                                    <td>${wasteConversions.start_date}</td>
                                    <td>${wasteConversions.end_date}</td>
                                    <td>${wasteConversions.status}</td>
                                    <td>
                                        <div class="flex align-items-center list-user-action">
                                            <a class="btn btn-sm btn-icon btn-warning edit-wcov-btn" data-id="${wasteConversions.id}">Edit</a>
                                            <a class="btn btn-sm btn-icon btn-danger delete-wcov-btn" data-id="${wasteConversions.id}">Delete</a>
                                        </div>
                                    </td>
                                </tr>`;
                            counter++;
                        }
                    });

                    let dataTable = $('#wcov-tbl').DataTable();
                    dataTable.clear(); // Clear the existing table data
                    dataTable.destroy();

                    $('#wcov-tbl tbody').html(rows);

                    let table = $('#wcov-tbl').DataTable({
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
                                title: 'Waste Conversion List',
                            },
                            { 
                                extend: 'excel', 
                                text: 'Excel',
                                title: 'Waste Conversion List',
                            },
                            { 
                                extend: 'pdf', 
                                text: 'PDF',
                                title: 'Waste Conversion List',
                            },
                            { 
                                extend: 'print', 
                                text: 'Print',
                                title: 'Waste Conversion List',
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
                    alert("Failed to fetch waste conversion. Please try again.");
                }
            });
        }

        // fetchWCOV();

        // Add Waste Conversion
        $('#addWCOVForm').on('submit', function (e) {
            e.preventDefault();

            let formData = {
                _token: "{{ csrf_token() }}", // Laravel CSRF token
                waste_type: $('#add_wt').val(),
                conversion_method: $('#add_cm').val(),
                metrics: $('#add_metrics').val(),
                start_date: $('#add_sd').val(),
                end_date: $('#add_ed').val(),
            };

            $.ajax({
                url: "{{ route('wcov.store') }}", // Route for storing barangay
                type: "POST",
                data: formData,
                success: function (response) {
                    fetchWCOV();

                    Swal.fire({
                        icon: 'success',
                        title: 'Waste Conversion Added!',
                        text: response.message,
                        confirmButtonText: 'OK',
                        confirmButtonColor: "#01A94D"
                    }).then(() => {
                        $('#addWCOVForm')[0].reset();
                        
                        $('#addWasteCModal').modal('hide');
                    });
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
                }
            });
        });

        // Edit Dump Truck
        $('#wcov-tbl').on('click', '.edit-wcov-btn', function () {
            let id = $(this).data('id');

            $.ajax({
                url: `/landfill/waste-conversions/${id}/edit`,
                type: "GET",
                success: function (response) {
                    let wcov = response.wasteConversion;
                    $('#edit_wt').val(wcov.waste_type);
                    $('#edit_cm').val(wcov.conversion_method);
                    $('#edit_metrics').val(wcov.metrics.match(/\d+/)[0]);
                    $('#edit_sd').val(wcov.start_date);
                    $('#edit_ed').val(wcov.end_date);
                    $('#edit_wcov_id').val(wcov.id);

                    $('#editWasteCModal').modal('show');
                },
                error: function (error) {
                    console.log("Error fetching waste conversion: ", error);
                }
            });
        });
        
        // Update Waste Conversions
        let originalValues = {};

        function storeOriginalValues() {
            originalValues = {
                waste_type: $('#edit_wt').val(),
                conversion_method: $('#edit_cm').val(),
                metrics: $('#edit_metrics').val(),
                start_date: $('#edit_sd').val(),
                end_date: $('#edit_ed').val(),
            };
        }

        // Call this function when the form is displayed
        $('#editWasteCModal').on('shown.bs.modal', function () {
            storeOriginalValues(); // Store values when the offcanvas is shown
        });

        $('#editWCOVForm').on('submit', function (e) {
            e.preventDefault();
            let id = $('#edit_wcov_id').val();

            // Check for changes
            const currentValues = {
                waste_type: $('#edit_wt').val(),
                conversion_method: $('#edit_cm').val(),
                metrics: $('#edit_metrics').val(),
                start_date: $('#edit_sd').val(),
                end_date: $('#edit_ed').val(),
            };

            const hasChanges = Object.keys(originalValues).some(key => originalValues[key] !== currentValues[key]);

            if (!hasChanges) {
                // No changes made
                Swal.fire({
                    icon: 'info',
                    title: 'No Changes Made!',
                    text: 'You have not made any changes to the dump truck details.',
                    confirmButtonText: 'OK',
                    confirmButtonColor: '#007bff'
                });
                return; // Exit the function
            }

            let formData = {
                _token: "{{ csrf_token() }}", // Laravel CSRF token
                waste_type: $('#edit_wt').val(),
                conversion_method: $('#edit_cm').val(),
                metrics: $('#edit_metrics').val(),
                start_date: $('#edit_sd').val(),
                end_date: $('#edit_ed').val(),
            };

            $.ajax({
                url: `/landfill/waste-conversions/${id}/update`,
                type: "PUT",
                data: formData,
                success: function (response) {
                    fetchWCOV();

                    Swal.fire({
                        icon: 'success',
                        title: 'Waste Conversion Updated!',
                        text: response.message,
                        confirmButtonText: 'OK',
                        confirmButtonColor: "#01A94D"
                    }).then(() => {
                        $('#editWasteCModal').modal('hide');
                    });
                },
                error: function (error) {
                    console.log("Error updating waste conversion: ", error);
                    Swal.fire({
                        icon: 'error',
                        title: 'Update Failed!',
                        text: 'An error occurred while updating the waste conversion. Please try again.',
                        confirmButtonText: 'OK',
                        confirmButtonColor: '#d33'
                    });
                }
            });
        });

        $(document).on('click', '.delete-wcov-btn', function () {
            let id = $(this).data('id');

            Swal.fire({
                title: 'Delete Waste Conversion?',
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
                        url: `/landfill/waste-conversions/${id}/delete`,
                        type: "PUT",
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function (response) {
                            fetchWCOV();

                            Swal.fire({
                                icon: 'success',
                                title: 'Waste Conversion Deleted!',
                                text: response.message,
                                confirmButtonText: 'OK',
                                confirmButtonColor: "#01A94D"
                            }).then(() => {
                                // fetchDumpTrucks();
                            });
                        },
                        error: function (error) {
                            console.log("Error deleting data: ", error);
                        }
                    });
                }
            });
        });
    });
</script>

@endsection