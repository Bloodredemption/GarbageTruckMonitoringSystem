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
                                    <h4 class="card-title">Waste Conversions List</h4>
                                    {{-- <p class="mb-0">Sub Title Here</p>           --}}
                                </div>
                                
                                <div>
                                    <a href="" class="btn btn-link btn-primary" data-bs-toggle="offcanvas" data-bs-target="#offcanvasAddWCOV" aria-controls="offcanvasAddWCOV">
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
                                                <th>Start Date</th>
                                                <th>End Date</th>
                                                <th style="min-width: 100px">Action</th>
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
    
    <!-- Offcanvas for Adding New Waste Conversion -->
    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasAddWCOV" aria-labelledby="offcanvasRightLabel">
        <div class="offcanvas-header" style="padding-bottom: 0;">
            <div>
                <h5 id="offcanvasRightLabel">Add New Waste Conversion</h5>
                <p style="font-size: 15px;">Please fill all the required fields <span style="color: red;">*</span></p>
            </div>
            {{-- <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button> --}}
        </div>
        <div class="offcanvas-body">
            <form id="addWCOVForm" action="" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="add_wt" class="form-label">Waste Type <span style="color: red;">*</span></label>
                    <select class="form-control" id="add_wt" name="wt" required>
                        <option></option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="add_cm" class="form-label">Conversion Method <span style="color: red;">*</span></label>
                    <input type="text" class="form-control" id="add_cm" name="cm" required>
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

                <button type="submit" class="btn btn-primary mb-3">Create</button>
                <button type="button" class="btn btn-light text-reset mb-3" data-bs-dismiss="offcanvas" aria-label="Close">Cancel</button>
            </form>
        </div>
    </div>

    <!-- Offcanvas for Edit Waste Composition -->
    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasEditWCOV" aria-labelledby="offcanvasRightLabel">
        <div class="offcanvas-header" style="padding-bottom: 0;">
            <div>
                <h5 id="offcanvasRightLabel">Edit Waste Conversion</h5>
                <p style="font-size: 15px;">Please fill all the required fields <span style="color: red;">*</span></p>
            </div>
            {{-- <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button> --}}
        </div>
        <div class="offcanvas-body">
            <form id="editWCOVForm" method="POST">
                @csrf
                <input type="hidden" id="edit_wcov_id" name="wcov_id">

                <div class="mb-3">
                    <label for="edit_wt" class="form-label">Waste Type <span style="color: red;">*</span></label>
                    <select class="form-control" id="edit_wt" name="wt" required>
                        <option></option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="edit_cm" class="form-label">Conversion Method <span style="color: red;">*</span></label>
                    <input type="text" class="form-control" id="edit_cm" name="cm" required>
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
        function fetchWasteT() {
            $.ajax({
                url: "{{ route('wcov.wasteType') }}", // Your route for fetching drivers
                type: "GET",
                success: function (response) {
                    let driverSelect1 = $('#add_wt'); // First driver select
                    let driverSelect2 = $('#edit_wt'); // Second driver select (new)

                    // Clear the select options for both select elements
                    driverSelect1.empty();
                    driverSelect2.empty();

                    // Add default options for both selects
                    driverSelect1.append('<option></option>');
                    driverSelect2.append('<option></option>');

                    // Populate both selects with the drivers
                    $.each(response.wastetype, function (key, wastetype) {
                        driverSelect1.append(`<option value="${wastetype.id}">${wastetype.waste_type}</option>`);
                        driverSelect2.append(`<option value="${wastetype.id}">${wastetype.waste_type}</option>`);
                    });
                },
                error: function (error) {
                    console.log("Error fetching waste type: ", error);
                }
            });
        }

        // Call the fetch function when the page loads
        fetchWasteT();

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
                                    <td>${wasteConversions.waste_comp.waste_type}</td>
                                    <td>${wasteConversions.conversion_method}</td>
                                    <td>${wasteConversions.start_date}</td>
                                    <td>${wasteConversions.end_date}</td>
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

                    $('#wcov-tbl').DataTable({
                        retrieve: true, // Retrieve the existing table instead of initializing it again
                        paging: true, // Enable pagination
                        searching: true, // Enable search functionality
                        info: true, // Show the number of entries info
                        responsive: true, // Ensure responsiveness
                    });
                },
                error: function (error) {
                    console.log("Error fetching data: ", error);
                    alert("Failed to fetch waste conversion. Please try again.");
                }
            });
        }

        fetchWCOV();

        // Add Waste Conversion
        $('#addWCOVForm').on('submit', function (e) {
            e.preventDefault();

            let formData = {
                _token: "{{ csrf_token() }}", // Laravel CSRF token
                waste_comp_id: $('#add_wt').val(),
                conversion_method: $('#add_cm').val(),
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
                        
                        $('#offcanvasAddWCOV').offcanvas('hide');
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
                    $('#edit_wt').val(wcov.waste_comp_id);
                    $('#edit_cm').val(wcov.conversion_method);
                    $('#edit_sd').val(wcov.start_date);
                    $('#edit_ed').val(wcov.end_date);
                    $('#edit_wcov_id').val(wcov.id);

                    $('#offcanvasEditWCOV').offcanvas('show');
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
                waste_comp_id: $('#edit_wt').val(),
                conversion_method: $('#edit_cm').val(),
                start_date: $('#edit_sd').val(),
                end_date: $('#edit_ed').val(),
            };
        }

        // Call this function when the form is displayed
        $('#offcanvasEditWCOV').on('shown.bs.offcanvas', function () {
            storeOriginalValues(); // Store values when the offcanvas is shown
        });

        $('#editWCOVForm').on('submit', function (e) {
            e.preventDefault();
            let id = $('#edit_wcov_id').val();

            // Check for changes
            const currentValues = {
                waste_comp_id: $('#edit_wt').val(),
                conversion_method: $('#edit_cm').val(),
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
                waste_comp_id: $('#edit_wt').val(),
                conversion_method: $('#edit_cm').val(),
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
                        $('#offcanvasEditWCOV').offcanvas('hide');
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