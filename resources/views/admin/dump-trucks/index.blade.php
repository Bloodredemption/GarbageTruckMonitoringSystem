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
                                <p>Contains dump trucks information.</p>
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
                                    <h4 class="card-title">Dump Trucks List</h4>
                                    {{-- <p class="mb-0">Sub Title Here</p>           --}}
                                </div>
                                
                                <div>
                                    <a href="#" class=" text-center btn btn-primary btn-icon mt-lg-0 mt-md-0 mt-3" data-bs-toggle="offcanvas" data-bs-target="#offcanvasAddDT" aria-controls="offcanvasAddDT">
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
                                <div class="table-responsive">
                                    <table id="dump-trucks-tbl" class="table" role="grid" data-bs-toggle="data-table">
                                        <thead>
                                            <tr class="ligth" style="background-color: #01A94D; color: white;">
                                                <th>No.</th>
                                                <th>Driver</th>
                                                <th>Brand</th>
                                                <th>Model</th>
                                                <th>Vehicle Status</th>
                                                <th style="min-width: 100px">Operation</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <!-- Rows will be dynamically added here -->
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
    
    <!-- Offcanvas for Adding New Dump Truck -->
    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasAddDT" aria-labelledby="offcanvasRightLabel">
        <div class="offcanvas-header" style="padding-bottom: 0;">
            <div>
                <h5 id="offcanvasRightLabel">Add New Dump Truck</h5>
                <p style="font-size: 15px;">Please fill all the required fields <span style="color: red;">*</span></p>
            </div>
            {{-- <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button> --}}
        </div>
        <div class="offcanvas-body">
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
                    <label for="add_driver" class="form-label">Truck Driver <span style="color: red;">*</span></label>
                    <select class="form-control" id="add_driver" name="driver" required>
                        <option></option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="add_status" class="form-label">Vehicle Condition <span style="color: red;">*</span></label>
                    <select class="form-control" id="add_status" name="status" required>
                        <option>Select</option>
                        <option value="active">Active</option>
                        <option value="inactive">Inactive</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary mb-3">Create</button>
                <button type="button" class="btn btn-light text-reset mb-3" data-bs-dismiss="offcanvas" aria-label="Close">Cancel</button>
            </form>
        </div>
    </div>

    <!-- Offcanvas for Edit Dump Truck -->
    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasEditDT" aria-labelledby="offcanvasEditDTLabel">
        <div class="offcanvas-header" style="padding-bottom: 0;">
            <div>
                <h5 id="offcanvasEditDTLabel">Edit Dump Truck</h5>
                <p style="font-size: 15px;">Please fill all the required fields <span style="color: red;">*</span></p>
            </div>
            {{-- <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button> --}}
        </div>
        <div class="offcanvas-body">
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
                    <label for="edit_driver" class="form-label">Truck Driver <span style="color: red;">*</span></label>
                    <select class="form-control" id="edit_driver" name="driver" required>
                        <option></option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="edit_status" class="form-label">Vehicle Condition <span style="color: red;">*</span></label>
                    <select class="form-control" id="edit_status" name="status" required>
                        <option></option>
                        <option value="active">Active</option>
                        <option value="inactive">Inactive</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary mb-3">Update</button>
                <button type="button" class="btn btn-light text-reset mb-3" data-bs-dismiss="offcanvas" aria-label="Close">Cancel</button>
            </form>
        </div>
    </div>

    <!-- Footer Section Start -->
    @include('partials.footer')
    <!-- Footer Section End -->    
</main>

<script>
    $(document).ready(function () {
        // Fetch barangays and display in the table
        function fetchDrivers() {
            $.ajax({
                url: "{{ route('drivers.index') }}", // Your route for fetching drivers
                type: "GET",
                success: function (response) {
                    let driverSelect1 = $('#add_driver'); // First driver select
                    let driverSelect2 = $('#edit_driver'); // Second driver select (new)

                    // Clear the select options for both select elements
                    driverSelect1.empty();
                    driverSelect2.empty();

                    // Add default options for both selects
                    driverSelect1.append('<option></option>');
                    driverSelect2.append('<option></option>');

                    // Populate both selects with the drivers
                    $.each(response.drivers, function (key, driver) {
                        driverSelect1.append(`<option value="${driver.id}">${driver.fullname}</option>`);
                        driverSelect2.append(`<option value="${driver.id}">${driver.fullname}</option>`);
                    });
                },
                error: function (error) {
                    console.log("Error fetching drivers: ", error);
                }
            });
        }

        // Call the fetch function when the page loads
        fetchDrivers();

        function fetchDumpTrucks() {
            $.ajax({
                url: "{{ route('dump-trucks.index') }}", // Your route for fetching barangays
                type: "GET",
                success: function (response) {
                    let rows = '';
                    let counter = 1;
                    $.each(response.dumpTrucks, function (key, dumptruck) {
                        if (dumptruck.status !== 'deleted') { // Skip users with 'deleted' status

                            let fullname = dumptruck.user.fullname.trim().split(" ");
                            let firstname = "";
                            let middleInitial = "";
                            let lastname = "";

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
                            rows += `
                                <tr>
                                    <td>${counter}</td>
                                    <td>${firstname} ${lastname}</td>
                                    <td>${dumptruck.brand}</td>
                                    <td>${dumptruck.model}</td>
                                    <td>${dumptruck.status == 'active' ? '<span class="badge bg-primary">active</span>' : '<span class="badge bg-danger">inactive</span>'}</td>
                                    <td>
                                        <div class="flex align-items-center list-user-action">
                                            <a class="btn btn-sm btn-icon btn-warning edit-dt-btn" data-id="${dumptruck.id}">Edit</a>
                                            <a class="btn btn-sm btn-icon btn-danger delete-dt-btn" data-id="${dumptruck.id}">Delete</a>
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

                    $('#dump-trucks-tbl').DataTable({
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

        fetchDumpTrucks();

        // Add Dump Truck
        $('#addDTForm').on('submit', function (e) {
            e.preventDefault();

            let formData = {
                _token: "{{ csrf_token() }}", // Laravel CSRF token
                brand: $('#add_brand').val(),
                model: $('#add_model').val(),
                user_id: $('#add_driver').val(),
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
                        
                        $('#offcanvasAddDT').offcanvas('hide');
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
                    $('#edit_driver').val(dumptruck.user_id);
                    $('#edit_status').val(dumptruck.status);
                    $('#edit_dt_id').val(dumptruck.id);

                    $('#offcanvasEditDT').offcanvas('show');
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
                user_id: $('#edit_driver').val(),
                status: $('#edit_status').val(),
            };
        }

        // Call this function when the form is displayed
        $('#offcanvasEditDT').on('shown.bs.offcanvas', function () {
            storeOriginalValues(); // Store values when the offcanvas is shown
        });

        $('#editDTForm').on('submit', function (e) {
            e.preventDefault();
            let id = $('#edit_dt_id').val();

            // Check for changes
            const currentValues = {
                brand: $('#edit_brand').val(),
                model: $('#edit_model').val(),
                user_id: $('#edit_driver').val(),
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
                _token: "{{ csrf_token() }}", // Laravel CSRF token
                brand: $('#edit_brand').val(),
                model: $('#edit_model').val(),
                user_id: $('#edit_driver').val(),
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
                        $('#offcanvasEditDT').offcanvas('hide');
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
    });
</script>

@endsection