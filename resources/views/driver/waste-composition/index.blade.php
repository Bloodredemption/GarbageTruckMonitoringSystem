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
                                <h1><strong>Waste Composition Records</strong></h1>
                                <p>Contains waste composition information.</p>
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
            
            <div class="col-md-12 col-lg-12">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card" data-aos="fade-up" data-aos-delay="800">
                            <div class="flex-wrap card-header d-flex justify-content-between align-items-center">
                                <div class="header-title">
                                    <h4 class="card-title">Waste Composition List</h4>
                                    {{-- <p class="mb-0">Sub Title Here</p>           --}}
                                </div>
                                
                                <div>
                                    <a href="" class="btn btn-link btn-primary" data-bs-toggle="offcanvas" data-bs-target="#offcanvasAddWC" aria-controls="offcanvasAddWC">
                                        <img src="data:image/svg+xml,%3Csvg width='20' viewBox='0 0 20 20' fill='none' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink'%3E%3Crect width='20' height='20' fill='url(%23pattern0_23_2601)'/%3E%3Cdefs%3E%3Cpattern id='pattern0_23_2601' patternContentUnits='objectBoundingBox' width='1' height='1'%3E%3Cuse xlink:href='%23image0_23_2601' transform='scale(0.0333333)'/%3E%3C/pattern%3E%3Cimage id='image0_23_2601' width='30' height='30' xlink:href='data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAYAAAA7MK6iAAAACXBIWXMAAAsTAAALEwEAmpwYAAAAdklEQVR4nO3UQQrCMBBA0RzPuBDvv2hA60Iv8boRtF2I0E6oOA+yzYdJmFLSnuGMB+449QzfvIw9wzMZDmMhrrSQ4fKzo8YRzfYa6qfwRZxxl+GKISA64LDFX5hZfeG3Mlx6kW/8D6Nu78uhZ7ji+jzrN1IqgSYK2LXvCFcYxQAAAABJRU5ErkJggg=='/%3E%3C/defs%3E%3C/svg%3E%0A" alt="img">
                                        Add New
                                    </a>
                                </div>
                            </div>
                            <div class="card-body px-0">

                                {{-- <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 60vh; text-align: center;">
                                    <img src="{{ asset('assets/images/no-data.svg')}}" alt="No Data Found" class="img-fluid mb-4 no-data-image">
                                    <h1 class="text-muted font-weight-bold mb-3 no-data-heading">No Data Found</h1>
                                    <span class="text-muted no-data-subtext mb-4">Add users by clicking the “Add New User” button.</span>

                                    <div>
                                        <a href="" class="btn btn-link btn-primary" data-bs-toggle="offcanvas" data-bs-target="#offcanvasAddWC" aria-controls="offcanvasAddWC">
                                            <img src="data:image/svg+xml,%3Csvg width='20' viewBox='0 0 20 20' fill='none' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink'%3E%3Crect width='20' height='20' fill='url(%23pattern0_23_2601)'/%3E%3Cdefs%3E%3Cpattern id='pattern0_23_2601' patternContentUnits='objectBoundingBox' width='1' height='1'%3E%3Cuse xlink:href='%23image0_23_2601' transform='scale(0.0333333)'/%3E%3C/pattern%3E%3Cimage id='image0_23_2601' width='30' height='30' xlink:href='data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAYAAAA7MK6iAAAACXBIWXMAAAsTAAALEwEAmpwYAAAAdklEQVR4nO3UQQrCMBBA0RzPuBDvv2hA60Iv8boRtF2I0E6oOA+yzYdJmFLSnuGMB+449QzfvIw9wzMZDmMhrrSQ4fKzo8YRzfYa6qfwRZxxl+GKISA64LDFX5hZfeG3Mlx6kW/8D6Nu78uhZ7ji+jzrN1IqgSYK2LXvCFcYxQAAAABJRU5ErkJggg=='/%3E%3C/defs%3E%3C/svg%3E%0A" alt="img">
                                            Add New
                                        </a>
                                    </div>
                                </div> --}}
                                
                                <div class="table-responsive">
                                    <table id="wc-tbl" class="table" role="grid" data-bs-toggle="data-table">
                                        <thead>
                                            <tr class="ligth" style="background-color: #01A94D; color: white;">
                                                <th>Waste Type</th>
                                                <th>Collection Date</th>
                                                <th>Metrics</th>
                                                <th>Location</th>
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
    
    <!-- Offcanvas for Adding New Waste Composition -->
    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasAddWC" aria-labelledby="offcanvasRightLabel">
        <div class="offcanvas-header" style="padding-bottom: 0;">
            <div>
                <h5 id="offcanvasRightLabel">Add New Waste Composition</h5>
                <p style="font-size: 15px;">Please fill all the required fields <span style="color: red;">*</span></p>
            </div>
            {{-- <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button> --}}
        </div>
        <div class="offcanvas-body">
            <form id="addWCForm" action="{{ route('wc.store') }}" method="POST">
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
                    <label for="add_metrics" id="add_metrics_label" class="form-label">Weight <span style="color: red;">*</span></label>
                    <input type="text" class="form-control" id="add_metrics" name="metrics" required>
                </div>
                <div class="mb-3">
                    <div class="form-group">
                        <label for="add_cd" class="form-label">Collection Date <span style="color: red;">*</span></label>
                        <input type="datetime-local" class="form-control" id="add_cd" name="cd" required>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="add_brgy" class="form-label">Barangay <span style="color: red;">*</span></label>
                    <select class="form-control" id="add_brgy" name="brgy" required>
                        <option></option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary mb-3">Create</button>
                <button type="button" class="btn btn-light text-reset mb-3" data-bs-dismiss="offcanvas" aria-label="Close">Cancel</button>
            </form>
        </div>
    </div>

    <!-- Offcanvas for Edit Waste Composition -->
    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasEditWC" aria-labelledby="offcanvasRightLabel">
        <div class="offcanvas-header" style="padding-bottom: 0;">
            <div>
                <h5 id="offcanvasRightLabel">Edit Waste Composition</h5>
                <p style="font-size: 15px;">Please fill all the required fields <span style="color: red;">*</span></p>
            </div>
            {{-- <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button> --}}
        </div>
        <div class="offcanvas-body">
            <form id="editWCForm" method="POST">
                @csrf
                <input type="hidden" id="edit_wc_id" name="wcov_id">

                <div class="mb-3">
                    <label for="edit_wt" class="form-label">Waste Type <span style="color: red;">*</span></label>
                    <select class="form-control" id="edit_wt" name="wt" required>
                        <option></option>
                        <option value="Biodegradable">Biodegradable</option>
                        <option value="Residual">Residual</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="edit_metrics" id="edit_metrics_label" class="form-label">Weight <span style="color: red;">*</span></label>
                    <input type="text" class="form-control" id="edit_metrics" name="metrics" required>
                </div>
                <div class="mb-3">
                    <div class="form-group">
                        <label for="edit_cd" class="form-label">Collection Date <span style="color: red;">*</span></label>
                        <input type="datetime-local" class="form-control" id="edit_cd" name="cd" value="2019-12-19T13:45:00">
                    </div>
                </div>
                <div class="mb-3">
                    <label for="edit_brgy" class="form-label">Barangay <span style="color: red;">*</span></label>
                    <select class="form-control" id="edit_brgy" name="brgy" required>
                        <option></option>
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
        function updateMetricsLabel(selectId, labelId) {
            const wasteTypeSelect = document.getElementById(selectId);
            const metricsLabel = document.getElementById(labelId);

            wasteTypeSelect.addEventListener('change', function() {
                if (this.value === 'Biodegradable') {
                    metricsLabel.innerHTML = 'Weight (kilogram/s) <span style="color: red;">*</span>';
                } else if (this.value === 'Residual') {
                    metricsLabel.innerHTML = 'Number of Sack/s <span style="color: red;">*</span>';
                } else {
                    metricsLabel.innerHTML = 'Weight <span style="color: red;">*</span>';
                }
            });
        }

        updateMetricsLabel('add_wt', 'add_metrics_label');
        updateMetricsLabel('edit_wt', 'edit_metrics_label');

        function updateMetricsLabelEdit(selectId, labelId) {
            const wasteTypeSelect = document.getElementById(selectId);
            const metricsLabel = document.getElementById(labelId);

            // Use wasteTypeSelect.value instead of this.value
            if (wasteTypeSelect.value === 'Biodegradable') {
                metricsLabel.innerHTML = 'Weight (kilogram/s) <span style="color: red;">*</span>';
            } else if (wasteTypeSelect.value === 'Residual') {
                metricsLabel.innerHTML = 'Number of Sack/s <span style="color: red;">*</span>';
            } else {
                metricsLabel.innerHTML = 'Weight <span style="color: red;">*</span>';
            }
        }

        // Fetch barangays and display in the table
        function fetchBrgy() {
            $.ajax({
                url: "{{ route('wc.getBrgy') }}", // Your route for fetching drivers
                type: "GET",
                success: function (response) {
                    let driverSelect1 = $('#add_brgy'); // First driver select
                    let driverSelect2 = $('#edit_brgy'); // Second driver select (new)

                    // Clear the select options for both select elements
                    driverSelect1.empty();
                    driverSelect2.empty();

                    // Add default options for both selects
                    driverSelect1.append('<option></option>');
                    driverSelect2.append('<option></option>');

                    // Populate both selects with the drivers
                    $.each(response.barangays, function (key, barangay) {
                        driverSelect1.append(`<option value="${barangay.id}">${barangay.name} | ${barangay.area}</option>`);
                        driverSelect2.append(`<option value="${barangay.id}">${barangay.name} | ${barangay.area}</option>`);
                    });
                },
                error: function (error) {
                    console.log("Error fetching barangay: ", error);
                }
            });
        }

        // Call the fetch function when the page loads
        fetchBrgy();

        function fetchWC() {
            $.ajax({
                url: "{{ route('wc.index') }}", // Your route for fetching barangays
                type: "GET",
                success: function (response) {
                    let rows = '';
                    let counter = 1;
                    $.each(response.wasteCompositions, function (key, wasteComposition) {
                        if (wasteComposition.isDeleted == '0') { 

                            let collectionDate = new Date(wasteComposition.collection_date);

                            // Format the date to a more readable format
                            let options = {
                                year: 'numeric',
                                month: 'long',  // e.g., September
                                day: 'numeric',
                                hour: 'numeric',
                                minute: 'numeric',
                                hour12: true    // For AM/PM format
                            };

                            // Convert the date to the desired format
                            let formattedDate = collectionDate.toLocaleString('en-US', options);

                            rows += `
                                <tr>
                                    <td>${wasteComposition.waste_type}</td>
                                    <td>${formattedDate}</td>
                                    <td>${wasteComposition.metrics}</td>
                                    <td>${wasteComposition.brgy.name}</td>
                                    <td>
                                        <div class="flex align-items-center list-user-action">
                                            <a class="btn btn-sm btn-icon btn-warning edit-wc-btn" data-id="${wasteComposition.id}">Edit</a>
                                            <a class="btn btn-sm btn-icon btn-danger delete-wc-btn" data-id="${wasteComposition.id}">Delete</a>
                                        </div>
                                    </td>
                                </tr>`;
                            counter++;
                        }
                    });

                    let dataTable = $('#wc-tbl').DataTable();
                    dataTable.clear(); // Clear the existing table data
                    dataTable.destroy();

                    $('#wc-tbl tbody').html(rows);

                    $('#wc-tbl').DataTable({
                        retrieve: true, // Retrieve the existing table instead of initializing it again
                        paging: true, // Enable pagination
                        searching: true, // Enable search functionality
                        info: true, // Show the number of entries info
                        responsive: true, // Ensure responsiveness
                    });
                },
                error: function (error) {
                    console.log("Error fetching data: ", error);
                    alert("Failed to fetch waste compositions. Please try again.");
                }
            });
        }

        fetchWC();

        // Add Dump Truck
        $('#addWCForm').on('submit', function (e) {
            e.preventDefault();

            let formData = {
                _token: "{{ csrf_token() }}", // Laravel CSRF token
                waste_type: $('#add_wt').val(),
                metrics: $('#add_metrics').val(),
                collection_date: $('#add_cd').val(),
                brgy_id: $('#add_brgy').val(),
            };

            $.ajax({
                url: "{{ route('wc.store') }}", // Route for storing barangay
                type: "POST",
                data: formData,
                success: function (response) {
                    fetchWC();

                    Swal.fire({
                        icon: 'success',
                        title: 'Waste Composition Added!',
                        text: response.message,
                        confirmButtonText: 'OK',
                        confirmButtonColor: "#01A94D"
                    }).then(() => {
                        $('#addWCForm')[0].reset();
                        
                        $('#offcanvasAddWC').offcanvas('hide');
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
        $('#wc-tbl').on('click', '.edit-wc-btn', function () {
            let id = $(this).data('id');

            $.ajax({
                url: `/driver/waste-composition/${id}/edit`,
                type: "GET",
                success: function (response) {
                    let wc = response.wasteComposition;
                    $('#edit_wt').val(wc.waste_type);
                    $('#edit_metrics').val(wc.metrics);
                    $('#edit_cd').val(wc.collection_date);
                    $('#edit_brgy').val(wc.brgy_id);
                    $('#edit_wc_id').val(wc.id);
                    updateMetricsLabelEdit('edit_wt', 'edit_metrics_label');

                    $('#offcanvasEditWC').offcanvas('show');
                },
                error: function (error) {
                    console.log("Error fetching waste composition: ", error);
                }
            });
        });
        
        // Update Dump Truck
        // Store original values when the form is loaded
        let originalValues = {};

        function storeOriginalValues() {
            originalValues = {
                waste_type: $('#edit_wt').val(),
                metrics: $('#edit_metrics').val(),
                collection_date: $('#edit_cd').val(),
                brgy_id: $('#edit_brgy').val(),
            };
        }

        // Call this function when the form is displayed
        $('#offcanvasEditWC').on('shown.bs.offcanvas', function () {
            storeOriginalValues(); // Store values when the offcanvas is shown
        });

        $('#editWCForm').on('submit', function (e) {
            e.preventDefault();
            let id = $('#edit_wc_id').val();

            // Check for changes
            const currentValues = {
                waste_type: $('#edit_wt').val(),
                metrics: $('#edit_metrics').val(),
                collection_date: $('#edit_cd').val(),
                brgy_id: $('#edit_brgy').val(),
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
                metrics: $('#edit_metrics').val(),
                collection_date: $('#edit_cd').val(),
                brgy_id: $('#edit_brgy').val(),
            };

            $.ajax({
                url: `/driver/waste-composition/${id}/update`,
                type: "PUT",
                data: formData,
                success: function (response) {
                    fetchWC();

                    Swal.fire({
                        icon: 'success',
                        title: 'Waste Composition Updated!',
                        text: response.message,
                        confirmButtonText: 'OK',
                        confirmButtonColor: "#01A94D"
                    }).then(() => {
                        $('#offcanvasEditWC').offcanvas('hide');
                    });
                },
                error: function (error) {
                    console.log("Error updating waste composition: ", error);
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

        $(document).on('click', '.delete-wc-btn', function () {
            let id = $(this).data('id');

            Swal.fire({
                title: 'Delete Waste Composition?',
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
                        url: `/driver/waste-composition/${id}/delete`,
                        type: "PUT",
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function (response) {
                            fetchWC();

                            Swal.fire({
                                icon: 'success',
                                title: 'Waste Composition Deleted!',
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