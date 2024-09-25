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
                                <h1><strong>Barangay Records</strong></h1>
                                <p>Contains barangay information.</p>
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
                                    <h4 class="card-title">Barangay List</h4>
                                </div>
                                
                                <div>
                                    <a href="#" class=" text-center btn btn-primary btn-icon mt-lg-0 mt-md-0 mt-3" data-bs-toggle="offcanvas" data-bs-target="#offcanvasAddBarangay" aria-controls="offcanvasAddBarangay">
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
                                    <table id="user-list-table" class="table" role="grid" data-bs-toggle="data-table">
                                        <thead>
                                            <tr class="ligth" style="background-color: #01A94D; color: white;">
                                                <th>No.</th>
                                                <th>Address</th>
                                                <th>Area</th>
                                                <th>Zip Code</th>
                                                <th>Captain</th>
                                                <th>Date Created</th>
                                                <th style="min-width: 100px">Operation</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <!-- Data will be fetched here using AJAX -->
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
    
    <!-- Offcanvas for Adding New Barangay -->
    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasAddBarangay" aria-labelledby="offcanvasRightLabel">
        <div class="offcanvas-header" style="padding-bottom: 0;">
            <div>
                <h5 id="offcanvasRightLabel">Add New Barangay</h5>
                <p style="font-size: 15px;">Please fill all the required fields <span style="color: red;">*</span></p>
            </div>
            {{-- <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button> --}}
        </div>
        <div class="offcanvas-body">
            <form id="addBarangayForm" action="{{ route('barangays.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="add_name" class="form-label">Name <span style="color: red;">*</span></label>
                    <input type="text" class="form-control" id="add_name" name="name" required>
                </div>
                <div class="mb-3">
                    <label for="add_area" class="form-label">Area <span style="color: red;">*</span></label>
                    <input type="text" class="form-control" id="add_area" name="area" required>
                </div>
                <div class="mb-3">
                    <label for="add_zipcode" class="form-label">Zip Code <span style="color: red;">*</span></label>
                    <input type="number" class="form-control" id="add_zipcode" name="zipcode" required>
                </div>
                <div class="mb-3">
                    <label for="add_captain" class="form-label">Captain <span style="color: red;">*</span></label>
                    <input type="text" class="form-control" id="add_captain" name="captain" required>
                </div>
                <button type="submit" class="btn btn-primary mb-3">Create</button>
                <button type="button" class="btn btn-light text-reset mb-3" data-bs-dismiss="offcanvas" aria-label="Close">Cancel</button>
            </form>
        </div>
    </div>

    <!-- Offcanvas for Edit Barangay -->
    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasEditBrgy" aria-labelledby="offcanvasEditBrgyLabel">
        <div class="offcanvas-header" style="padding-bottom: 0;">
            <div>
                <h5 id="offcanvasEditBrgyLabel">Edit Barangay</h5>
                <p style="font-size: 15px;">Please fill all the required fields <span style="color: red;">*</span></p>
            </div>
            {{-- <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button> --}}
        </div>
        <div class="offcanvas-body">
            <form id="editBrgyForm" method="POST">
                @csrf
                <!-- Hidden input for barangay ID -->
                <input type="hidden" id="edit_brgy_id" name="brgy_id">

                <div class="mb-3">
                    <label for="edit_name" class="form-label">Name <span style="color: red;">*</span></label>
                    <input type="text" class="form-control" id="edit_name" name="name" required>
                </div>
                <div class="mb-3">
                    <label for="edit_area" class="form-label">Area <span style="color: red;">*</span></label>
                    <input type="text" class="form-control" id="edit_area" name="area" required>
                </div>
                <div class="mb-3">
                    <label for="edit_zipcode" class="form-label">Zip Code <span style="color: red;">*</span></label>
                    <input type="number" class="form-control" id="edit_zipcode" name="zipcode" required>
                </div>
                <div class="mb-3">
                    <label for="edit_captain" class="form-label">Captain <span style="color: red;">*</span></label>
                    <input type="text" class="form-control" id="edit_captain" name="captain" required>
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
        function fetchBarangays() {
            $.ajax({
                url: "{{ route('barangays.index') }}", // Your route for fetching barangays
                type: "GET",
                success: function (response) {
                    let rows = '';
                    let counter = 1;
                    $.each(response.barangays, function (key, barangay) {
                        if (barangay.isDeleted == '0') { // Skip users with 'deleted' status
                            // Format the created_at date
                            const createdAt = new Date(barangay.created_at);
                            const formattedCreatedAt = createdAt.toLocaleString('en-US', {
                                month: 'long', // 'January', 'February', etc.
                                day: '2-digit', // '01', '02', etc.
                                year: 'numeric', // '2024'
                                hour: '2-digit', // '01', '02', etc.
                                minute: '2-digit', // '00', '01', etc.
                                hour12: true // 'AM'/'PM'
                            });

                            rows += `
                                <tr>
                                    <td>${counter}</td>
                                    <td>${barangay.name}</td>
                                    <td>${barangay.area}</td>
                                    <td>${barangay.zipcode}</td>
                                    <td>${barangay.captain}</td>
                                    <td>${formattedCreatedAt}</td>
                                    <td>
                                        <div class="flex align-items-center list-user-action">
                                            <a class="btn btn-sm btn-icon btn-warning edit-barangay-btn" data-id="${barangay.id}">Edit</a>
                                            <a class="btn btn-sm btn-icon btn-danger delete-barangay-btn" data-id="${barangay.id}">Delete</a>
                                        </div>
                                    </td>
                                </tr>`;
                            counter++;
                        }
                        
                    });

                    let dataTable = $('#user-list-table').DataTable();
                    dataTable.clear(); // Clear the existing table data
                    dataTable.destroy();

                    $('#user-list-table tbody').html(rows);

                    $('#user-list-table').DataTable({
                        retrieve: true, // Retrieve the existing table instead of initializing it again
                        paging: true, // Enable pagination
                        searching: true, // Enable search functionality
                        info: true, // Show the number of entries info
                        responsive: true, // Ensure responsiveness
                    });
                },
                error: function (error) {
                    console.log("Error fetching data: ", error);
                    alert("Failed to fetch barangays. Please try again.");
                }
            });
        }

        fetchBarangays();

        // Add Barangay
        $('#addBarangayForm').on('submit', function (e) {
            e.preventDefault();

            let formData = {
                _token: "{{ csrf_token() }}", // Laravel CSRF token
                name: $('#add_name').val(),
                area: $('#add_area').val(),
                zipcode: $('#add_zipcode').val(),
                captain: $('#add_captain').val(),
            };

            $.ajax({
                url: "{{ route('barangays.store') }}", // Route for storing barangay
                type: "POST",
                data: formData,
                success: function (response) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Barangay Added!',
                        text: response.message,
                        confirmButtonText: 'OK',
                        confirmButtonColor: "#01A94D"
                    }).then(() => {
                        $('#addBarangayForm')[0].reset();
                        fetchBarangays();
                        
                        $('#offcanvasAddBarangay').offcanvas('hide');
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

        // Edit Barangay
        $(document).on('click', '.edit-barangay-btn', function () {
            let barangayId = $(this).data('id');
            
            $.ajax({
                url: `/admin/barangay/${barangayId}/edit`,
                type: "GET",
                success: function (response) {
                    $('#edit_brgy_id').val(response.barangay.id);
                    $('#edit_name').val(response.barangay.name);
                    $('#edit_area').val(response.barangay.area);
                    $('#edit_zipcode').val(response.barangay.zipcode);
                    $('#edit_captain').val(response.barangay.captain);
                    $('#offcanvasEditBrgy').offcanvas('show');
                },
                error: function (error) {
                    console.log("Error fetching barangay data: ", error);
                }
            });
        });

        // Update Barangay
        // Store original values when the form is loaded
        let originalValues = {};

        function storeOriginalValues() {
            originalValues = {
                name: $('#edit_name').val(), // Adjust the selector to match your input fields
                area: $('#edit_area').val(),
                zipcode: $('#edit_zipcode').val(),
                captain: $('#edit_captain').val(),
            };
        }

        // Call this function when the form is displayed
        $('#offcanvasEditBrgy').on('shown.bs.offcanvas', function () {
            storeOriginalValues(); // Store values when the offcanvas is shown
        });

        $('#editBrgyForm').on('submit', function (e) {
            e.preventDefault();
            let barangayId = $('#edit_brgy_id').val();

            // Check for changes
            const currentValues = {
                name: $('#edit_name').val(),
                area: $('#edit_area').val(),
                zipcode: $('#edit_zipcode').val(),
                captain: $('#edit_captain').val(),
            };

            const hasChanges = Object.keys(originalValues).some(key => originalValues[key] !== currentValues[key]);

            if (!hasChanges) {
                // No changes made
                Swal.fire({
                    icon: 'info',
                    title: 'No Changes Made!',
                    text: 'You have not made any changes to the barangay details.',
                    confirmButtonText: 'OK',
                    confirmButtonColor: '#007bff'
                });
                return; // Exit the function
            }

            $.ajax({
                url: `/admin/barangay/${barangayId}/update`,
                type: "PUT",
                data: $(this).serialize(),
                success: function (response) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Barangay Updated!',
                        text: response.message,
                        confirmButtonText: 'OK',
                        confirmButtonColor: "#01A94D"
                    }).then(() => {
                        fetchBarangays();
                        $('#offcanvasEditBrgy').offcanvas('hide');
                    });
                },
                error: function (error) {
                    console.log("Error updating barangay: ", error);
                    Swal.fire({
                        icon: 'error',
                        title: 'Update Failed!',
                        text: 'An error occurred while updating the barangay. Please try again.',
                        confirmButtonText: 'OK',
                        confirmButtonColor: '#d33'
                    });
                }
            });
        });


        // Delete Barangay
        $(document).on('click', '.delete-barangay-btn', function () {
            let barangayId = $(this).data('id');

            Swal.fire({
                title: 'Delete Barangay?',
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
                        url: `/admin/barangay/${barangayId}/delete`,
                        type: "DELETE",
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function (response) {
                            fetchBarangays();

                            Swal.fire({
                                icon: 'success',
                                title: 'Barangay Deleted!',
                                text: response.message,
                                confirmButtonText: 'OK',
                                confirmButtonColor: "#01A94D"
                            }).then(() => {
                                // fetchBarangays();
                            });
                        },
                        error: function (error) {
                            console.log("Error deleting barangay: ", error);
                        }
                    });
                }
            });
        });
    });
</script>
@endsection