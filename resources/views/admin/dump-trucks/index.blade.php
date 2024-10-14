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
                                <h1><strong>Dump Trucks</strong></h1>
                                <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="{{ route('dashboard')}}">Dashboard</a></li>
                                        <li class="breadcrumb-item active text-white" aria-current="page">Dump Trucks</li>
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
                                                Dump Truck List
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
                                    <a href="#" class=" text-center btn btn-primary btn-icon mt-lg-0 mt-md-0 mt-3" data-bs-toggle="modal" data-bs-target="#addDTModal">
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
                                                                <div class="col-md-6 mb-3">
                                                                    <label for="date" class="form-label">Date Created</label>
                                                                    <input type="text" id="created-date" name="start" class="form-control flatpickr_humandate flatpickr-input active" placeholder="Select Date" readonly>
                                                                </div>
                                                                <div class="col-md-6 mb-3">
                                                                    <label for="status" class="form-label">Vehicle Status</label>
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
                                            <table id="dump-trucks-tbl" class="table" role="grid" data-bs-toggle="data-table">
                                                <thead>
                                                    <tr class="ligth" style="background-color: #01A94D; color: white;">
                                                        <th>No.</th>
                                                        <th>Brand</th>
                                                        <th>Model</th>
                                                        <th>Vehicle Status</th>
                                                        <th>Date Created</th>
                                                        <th style="min-width: 100px">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <!-- Rows will be dynamically added here -->
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                            
                                    <!-- Archive Tab Pane -->
                                    <div class="tab-pane fade" id="archive" role="tabpanel" aria-labelledby="archive-tab">
                                        
                                        <div class="table-responsive mt-3">
                                            <table id="arcdump-trucks-tbl" class="table" role="grid">
                                                <thead>
                                                    <tr class="ligth" style="background-color: #01A94D; color: white;">
                                                        <th>No.</th>
                                                        <th>Brand</th>
                                                        <th>Model</th>
                                                        <th>Date Archive</th>
                                                        <th style="min-width: 100px">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
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
    
    <!-- Modal for Adding New Dump Truck -->
    <div class="modal fade" id="addDTModal" tabindex="-1" aria-labelledby="addDTLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="addDTLabel">Create Dump Truck</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="addDTForm" action="{{ route('dump-trucks.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="add_brand" class="form-label">Brand <span style="color: red;">*</span></label>
                            <input type="text" class="form-control" id="add_brand" name="brand" required>
                        </div>
                        <div class="mb-3">
                            <label for="add_model" class="form-label">Model <span style="color: red;">*</span></label>
                            <input type="text" class="form-control" id="add_model" name="model" required>
                        </div>
                        <div class="mb-3">
                            <label for="add_status" class="form-label">Vehicle Condition <span style="color: red;">*</span></label>
                            <select class="form-control" id="add_status" name="status" required>
                                <option>Select</option>
                                <option value="active">Active</option>
                                <option value="inactive">Inactive</option>
                            </select>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-soft-light" data-bs-dismiss="modal">Close</button>
                    <button type="submit" form="addDTForm" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal for Edit Dump Truck -->
    <div class="modal fade" id="editDTModal" tabindex="-1" aria-labelledby="editDTLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="editDTLabel">Update Dump Truck</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="editDTForm" method="POST">
                        @csrf
                        <!-- Hidden input for barangay ID -->
                        <input type="hidden" id="edit_dt_id" name="dt_id">
        
                        <div class="mb-3">
                            <label for="edit_brand" class="form-label">Brand <span style="color: red;">*</span></label>
                            <input type="text" class="form-control" id="edit_brand" name="brand" required>
                        </div>
                        <div class="mb-3">
                            <label for="edit_model" class="form-label">Model <span style="color: red;">*</span></label>
                            <input type="text" class="form-control" id="edit_model" name="model" required>
                        </div>
                        <div class="mb-3">
                            <label for="edit_status" class="form-label">Vehicle Condition <span style="color: red;">*</span></label>
                            <select class="form-control" id="edit_status" name="status" required>
                                <option></option>
                                <option value="active">Active</option>
                                <option value="inactive">Inactive</option>
                            </select>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-soft-light" data-bs-dismiss="modal">Close</button>
                    <button type="submit" form="editDTForm" class="btn btn-primary">Save changes</button>
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
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            }
        });

        $('#clear-filters').on('click', function(e) {
            e.preventDefault(); // Prevent the default anchor click behavior
            
            // Reset all select elements and inputs
            $('#status-filter').val('');
            let calendarInstance = document.querySelector('#created-date')._flatpickr;
            if (calendarInstance) {
                calendarInstance.clear();  // Clear the Flatpickr instance
            }
            
            // Fetch users again to update the table without filters
            fetchDumpTrucks();
        });

        function fetchDumpTrucks() {
            let status = $('#status-filter').val();
            let created_date = $('#created-date').val();

            let calendarDate = new Date(created_date).toLocaleDateString('en-CA');

            $.ajax({
                url: "{{ route('dump-trucks.index') }}", // Your route for fetching barangays
                type: "GET",
                data: {
                    status: status,          // Pass the status filter
                    created_date: calendarDate // Pass the created date filter
                },
                success: function (response) {
                    let rows = '';
                    let counter = 1;
                    $.each(response.dumpTrucks, function (key, dumptruck) {
                        let tableDate = new Date(dumptruck.created_at).toLocaleDateString('en-CA');

                        if ((status === '' || dumptruck.status === status) &&
                            (created_date === '' || tableDate === created_date)) { // Skip users with 'deleted' status

                            let formatteddate = tableDate;

                            rows += `
                                <tr>
                                    <td>${counter}</td>
                                    <td>${dumptruck.brand}</td>
                                    <td>${dumptruck.model}</td>
                                    <td>${dumptruck.status == 'active' ? '<span class="badge bg-primary">active</span>' : '<span class="badge bg-danger">inactive</span>'}</td>
                                    <td>${formatteddate}</td>
                                    <td>
                                        <div class="flex align-items-center list-user-action">
                                            <a class="btn btn-sm btn-icon btn-warning edit-dt-btn" data-id="${dumptruck.id}" title="Edit User">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" style="fill: rgba(255, 255, 255, 1); transform: ; msFilter:;">
                                                    <path d="m18.988 2.012 3 3L19.701 7.3l-3-3zM8 16h3l7.287-7.287-3-3L8 13z"></path>
                                                    <path d="M19 19H8.158c-.026 0-.053.01-.079.01-.033 0-.066-.009-.1-.01H5V5h6.847l2-2H5c-1.103 0-2 .896-2 2v14c0 1.104.897 2 2 2h14a2 2 0 0 0 2-2v-8.668l-2 2V19z"></path>
                                                </svg>
                                                Edit
                                            </a>
                                            <a class="btn btn-sm btn-icon btn-secondary archive-dt-btn" data-id="${dumptruck.id}" title="Archive User">
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

                    let dataTable = $('#dump-trucks-tbl').DataTable();
                    dataTable.clear(); // Clear the existing table data
                    dataTable.destroy();

                    $('#dump-trucks-tbl tbody').html(rows);

                    let table = $('#dump-trucks-tbl').DataTable({
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
                                title: 'Dump Trucks List',
                                exportOptions: {
                                    columns: ':not(:last-child)'
                                }
                            },
                            { 
                                extend: 'excel', 
                                text: 'Excel',
                                title: 'Dump Trucks List',
                                exportOptions: {
                                    columns: ':not(:last-child)'
                                }
                            },
                            { 
                                extend: 'pdf', 
                                text: 'PDF',
                                title: 'Dump Trucks List',
                                exportOptions: {
                                    columns: ':not(:last-child)'
                                }
                            },
                            { 
                                extend: 'print', 
                                text: 'Print',
                                title: 'Dump Trucks List',
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
                    alert("Failed to fetch dump trucks. Please try again.");
                }
            });
        }

        $('#status-filter, #created-date').on('change', function () {
            fetchDumpTrucks(); // Fetch data whenever a filter changes
        });

        fetchDumpTrucks();

        function fetchADumpTrucks() {
            $.ajax({
                url: "{{ route('dump-trucks.getArchive') }}", // Your route for fetching barangays
                type: "GET",
                success: function (response) {
                    let rows = '';
                    let counter = 1;
                    $.each(response.adumpTrucks, function (key, dumptruck) {
                        let tableDate = new Date(dumptruck.updated_at).toLocaleDateString('en-CA');

                        if (dumptruck.status) { // Skip users with 'deleted' status

                            let formatteddate = tableDate;

                            rows += `
                                <tr>
                                    <td>${counter}</td>
                                    <td>${dumptruck.brand}</td>
                                    <td>${dumptruck.model}</td>
                                    <td>${formatteddate}</td>
                                    <td>
                                        <div class="flex align-items-center list-user-action">
                                            <a class="btn btn-sm btn-icon btn-secondary restore-dt-btn" data-id="${dumptruck.id}">
                                                <svg  xmlns="http://www.w3.org/2000/svg"  width="20"  height="20"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-restore"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M3.06 13a9 9 0 1 0 .49 -4.087" /><path d="M3 4.001v5h5" /><path d="M12 12m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" /></svg>
                                                Restore
                                            </a>
                                            <a class="btn btn-sm btn-icon btn-danger delete-dt-btn" data-id="${dumptruck.id}">
                                                <svg  xmlns="http://www.w3.org/2000/svg"  width="20"  height="20"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-trash"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 7l16 0" /><path d="M10 11l0 6" /><path d="M14 11l0 6" /><path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" /><path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" /></svg>
                                                Delete
                                            </a>
                                        </div>
                                    </td>
                                </tr>`;
                            counter++;
                        }
                    });

                    let dataTable = $('#arcdump-trucks-tbl').DataTable();
                    dataTable.clear(); // Clear the existing table data
                    dataTable.destroy();

                    $('#arcdump-trucks-tbl tbody').html(rows);

                    $('#arcdump-trucks-tbl').DataTable({
                        retrieve: true, // Retrieve the existing table instead of initializing it again
                        paging: true, // Enable pagination
                        searching: true, // Enable search functionality
                        info: true, // Show the number of entries info
                        responsive: true, // Ensure responsiveness
                    });
                },
                error: function (error) {
                    console.log("Error fetching data: ", error);
                    alert("Failed to fetch dump trucks. Please try again.");
                }
            });
        }

        fetchADumpTrucks();

        // Add Dump Truck
        $('#addDTForm').on('submit', function (e) {
            e.preventDefault();

            let formData = {
                brand: $('#add_brand').val(),
                model: $('#add_model').val(),
                status: $('#add_status').val(),
            };

            $.ajax({
                url: "{{ route('dump-trucks.store') }}", // Route for storing barangay
                type: "POST",
                data: formData,
                success: function (response) {
                    fetchDumpTrucks();

                    Swal.fire({
                        icon: 'success',
                        title: 'Dump Truck Added!',
                        text: response.message,
                        confirmButtonText: 'OK',
                        confirmButtonColor: "#01A94D"
                    }).then(() => {
                        $('#addDTForm')[0].reset();
                        
                        $('#addDTModal').modal('hide');
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
        $('#dump-trucks-tbl').on('click', '.edit-dt-btn', function () {
            let id = $(this).data('id');

            $.ajax({
                url: `/admin/dump-truck/${id}/edit`,
                type: "GET",
                success: function (response) {
                    let dumptruck = response.dumpTruck;
                    $('#edit_brand').val(dumptruck.brand);
                    $('#edit_model').val(dumptruck.model);
                    $('#edit_status').val(dumptruck.status);
                    $('#edit_dt_id').val(dumptruck.id);

                    $('#editDTModal').modal('show');
                },
                error: function (error) {
                    console.log("Error fetching dump truck: ", error);
                }
            });
        });
        
        // Update Dump Truck
        // Store original values when the form is loaded
        let originalValues = {};

        function storeOriginalValues() {
            originalValues = {
                brand: $('#edit_brand').val(),
                model: $('#edit_model').val(),
                status: $('#edit_status').val(),
            };
        }

        // Call this function when the form is displayed
        $('#editDTModal').on('shown.bs.modal', function () {
            storeOriginalValues(); // Store values when the offcanvas is shown
        });

        $('#editDTForm').on('submit', function (e) {
            e.preventDefault();
            let id = $('#edit_dt_id').val();

            // Check for changes
            const currentValues = {
                brand: $('#edit_brand').val(),
                model: $('#edit_model').val(),
                status: $('#edit_status').val(),
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
                brand: $('#edit_brand').val(),
                model: $('#edit_model').val(),
                status: $('#edit_status').val(),
            };

            $.ajax({
                url: `/admin/dump-truck/${id}/update`,
                type: "PUT",
                data: formData,
                success: function (response) {
                    fetchDumpTrucks();

                    Swal.fire({
                        icon: 'success',
                        title: 'Dump Truck Updated!',
                        text: response.message,
                        confirmButtonText: 'OK',
                        confirmButtonColor: "#01A94D"
                    }).then(() => {
                        $('#editDTModal').modal('hide');
                    });
                },
                error: function (error) {
                    console.log("Error updating dump truck: ", error);
                    Swal.fire({
                        icon: 'error',
                        title: 'Update Failed!',
                        text: 'An error occurred while updating the dump truck. Please try again.',
                        confirmButtonText: 'OK',
                        confirmButtonColor: '#d33'
                    });
                }
            });
        });

        $(document).on('click', '.delete-dt-btn', function () {
            let id = $(this).data('id');

            Swal.fire({
                title: 'Delete Dump Truck?',
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
                        url: `/admin/dump-truck/${id}/delete`,
                        type: "DELETE",
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function (response) {
                            fetchDumpTrucks();

                            Swal.fire({
                                icon: 'success',
                                title: 'Dump Truck Deleted!',
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

        $(document).on('click', '.archive-dt-btn', function () {
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
                        url: `/admin/dump-truck/${userId}/archive`,
                        type: "PUT",
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // Add CSRF token header
                        },
                        success: function (response) {
                            fetchDumpTrucks();
                            fetchADumpTrucks();
                            
                            Swal.fire({
                                icon: 'success',
                                title: 'Dump Truck Archived!',
                                text: response.message,
                                confirmButtonText: 'OK',
                                confirmButtonColor: "#01A94D"
                            }).then(() => {
                                // fetchUsers();
                            });
                        },
                        error: function (error) {
                            console.log("Error archiving dump truck: ", error);

                            // Show error message
                            Swal.fire({
                                icon: 'error',
                                title: 'Archive Failed!',
                                text: 'An error occurred while archiving the dump truck. Please try again.',
                                confirmButtonText: 'OK',
                                confirmButtonColor: '#d33'
                            });
                        }
                    });
                }
            });
        });

        $(document).on('click', '.restore-dt-btn', function () {
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
                        url: `/admin/dump-truck/${userId}/restore`,
                        type: "PUT",
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // Add CSRF token header
                        },
                        success: function (response) {
                            fetchDumpTrucks();
                            fetchADumpTrucks();
                            
                            Swal.fire({
                                icon: 'success',
                                title: 'Dump Truck Restored!',
                                text: response.message,
                                confirmButtonText: 'OK',
                                confirmButtonColor: "#01A94D"
                            }).then(() => {
                                // fetchUsers();
                            });
                        },
                        error: function (error) {
                            console.log("Error restoring Dump Truck: ", error);

                            // Show error message
                            Swal.fire({
                                icon: 'error',
                                title: 'Restore Failed!',
                                text: 'An error occurred while deleting the Dump Truck. Please try again.',
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