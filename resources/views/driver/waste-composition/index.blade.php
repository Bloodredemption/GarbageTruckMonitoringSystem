@extends('d-layout')

@section('main-content')

<main class="main-content">
    <div class="container">
        

        <div class="table-responsive mb-5">
            <h6><strong>Waste Composition Records</strong></h6>
            <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                <ol class="breadcrumb" style="font-size: 13px;">
                    <li class="breadcrumb-item"><a href="{{ route('d.dashboard')}}">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Waste Composition</li>
                </ol>
            </nav>
            <table id="wc-tbl" class="table" role="grid" data-bs-toggle="data-table">
                <thead>
                    <tr class="ligth" style="background-color: #01A94D; color: white;">
                        <th>Location</th>
                        <th>Type</th>
                        <th>Metrics</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($wasteCompositions as $wc)
                    <tr>
                        <td>{{ $wc->brgy->name }}</td>
                        <td>{{ $wc->waste_type }}</td>
                        <td>{{ $wc->metrics }} kg/s</td>
                        <td>
                            <a class="btn btn-icon btn-success d-actions update-btn" data-id="{{ $wc->id }}" title="Edit User">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" style="fill: rgba(255, 255, 255, 1); transform: ; msFilter:;">
                                    <path d="m18.988 2.012 3 3L19.701 7.3l-3-3zM8 16h3l7.287-7.287-3-3L8 13z"></path>
                                    <path d="M19 19H8.158c-.026 0-.053.01-.079.01-.033 0-.066-.009-.1-.01H5V5h6.847l2-2H5c-1.103 0-2 .896-2 2v14c0 1.104.897 2 2 2h14a2 2 0 0 0 2-2v-8.668l-2 2V19z"></path>
                                </svg>
                                Edit
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        {{-- Add Waste Modal --}}
        <div class="modal fade z-100" id="addWasteModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="addWasteLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="addWasteLabel">Add Waste</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="addWCForm" action="{{ route('wc.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="add_wt" class="form-label">Waste Type <span style="color: red;">*</span></label>
                                <select class="form-control" id="add_wt" name="wt" required>
                                    <option></option>
                                    <option value="Biodegradable">Biodegradable</option>
                                    <option value="Residual">Residual</option>
                                    {{-- <option value="Recyclables">Recyclables</option>
                                    <option value="Hazards">Hazards</option> --}}
                                </select>
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
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" form="addWCForm" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>

        {{-- Edit Waste Modal --}}
        <div class="modal fade z-100" id="editWasteModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="editWasteLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="editWasteLabel">Update Waste</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="editWCForm" method="POST">
                            @csrf
                            <input type="hidden" id="edit_wc_id" name="wcov_id">
            
                            <div class="mb-3">
                                <label for="edit_wt" class="form-label">Waste Type <span style="color: red;">*</span></label>
                                <select class="form-control" id="edit_wt" name="wt" required>
                                    <option></option>
                                    <option value="Biodegradable">Biodegradable</option>
                                    <option value="Residual">Residual</option>
                                    {{-- <option value="Recyclables">Recyclables</option>
                                    <option value="Hazards">Hazards</option> --}}
                                </select>
                            </div>
                            <label for="edit_metrics" id="edit_metrics_label" class="form-label">Weight <span style="color: red;">*</span></label>
                            <div class="input-group mb-3">
                                <input type="number" class="form-control" id="edit_metrics" name="metrics" required aria-label="Recipient's username" aria-describedby="basic-addon2">
                                <div class="input-group-append">
                                    <span class="input-group-text" id="editbasic-addon2">kg/s</span>
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="form-group">
                                    <label for="edit_cd" class="form-label">Collection Date <span style="color: red;">*</span></label>
                                    <input type="datetime-local" class="form-control" id="edit_cd" name="cd" value="2019-12-19T13:45:00" readonly>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="edit_brgy" class="form-label">Barangay <span style="color: red;">*</span></label>
                                <select class="form-control" id="edit_brgy" name="brgy" required>
                                    <option></option>
                                </select>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" form="editWCForm" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>

    </div>
</main>

<a href="#" class="floating-btn" data-bs-toggle="modal" data-bs-target="#addWasteModal">
    <i class='bx bx-plus'></i>
</a>

<script>
    $(document).ready(function () {
        $('#wc-tbl').DataTable({
            pageLength: 5,
            bSort: false,
            retrieve: true, // Retrieve the existing table instead of initializing it again
            paging: true, // Enable pagination
            searching: true, // Enable search functionality
            info: true, // Show the number of entries info
            responsive: true, // Ensure responsiveness
            lengthChange: false, // Disable entries per page
            fixedHeader: true,
            scroller: true,
            language: {
                searchPlaceholder: 'Search records', // Placeholder for the search input
                search: "", // Remove the default "Search" label
            },
            dom: '<"top"f>rt<"bottom"lp><"clear">', // Modify the DOM structure to control search label placement
            initComplete: function() {
                // Remove default search input label and replace with custom icon
                let searchContainer = $('#wc-tbl_filter');
                searchContainer.html(`
                    <div class="custom-search-wrapper">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(0, 0, 0, 1);transform: ;msFilter:;"><path d="M19.023 16.977a35.13 35.13 0 0 1-1.367-1.384c-.372-.378-.596-.653-.596-.653l-2.8-1.337A6.962 6.962 0 0 0 16 9c0-3.859-3.14-7-7-7S2 5.141 2 9s3.14 7 7 7c1.763 0 3.37-.66 4.603-1.739l1.337 2.8s.275.224.653.596c.387.363.896.854 1.384 1.367l1.358 1.392.604.646 2.121-2.121-.646-.604c-.379-.372-.885-.866-1.391-1.36zM9 14c-2.757 0-5-2.243-5-5s2.243-5 5-5 5 2.243 5 5-2.243 5-5 5z"></path></svg>
                        <input type="text" id="customSearchBox" placeholder="Search..." class="form-control"/>
                    </div>
                `);

                // Bind search box input to DataTables search function
                $('#customSearchBox').on('keyup', function() {
                    dataTable.search(this.value).draw();
                });
            }
        });
        
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
                                    <td>${wasteComposition.brgy.name}</td>
                                    <td>${wasteComposition.waste_type}</td>
                                    <td>${wasteComposition.metrics} kg/s</td>
                                    <td>
                                        <a class="btn btn-icon btn-success d-actions update-btn" data-id="${wasteComposition.id}" title="Edit User">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" style="fill: rgba(255, 255, 255, 1); transform: ; msFilter:;">
                                                <path d="m18.988 2.012 3 3L19.701 7.3l-3-3zM8 16h3l7.287-7.287-3-3L8 13z"></path>
                                                <path d="M19 19H8.158c-.026 0-.053.01-.079.01-.033 0-.066-.009-.1-.01H5V5h6.847l2-2H5c-1.103 0-2 .896-2 2v14c0 1.104.897 2 2 2h14a2 2 0 0 0 2-2v-8.668l-2 2V19z"></path>
                                            </svg>
                                            Edit
                                        </a>
                                    </td>
                                </tr>`;
                            counter++;
                        }
                    });

                    let dataTable = $('#wc-tbl').DataTable();
                    dataTable.clear(); // Clear the existing table data
                    dataTable.destroy();

                    $('#wc-tbl tbody').html(rows);

                    // Initialize DataTable with custom search icon
                    $('#wc-tbl').DataTable({
                        pageLength: 5,
                        bSort: false,
                        retrieve: true, // Retrieve the existing table instead of initializing it again
                        paging: true, // Enable pagination
                        searching: true, // Enable search functionality
                        info: true, // Show the number of entries info
                        responsive: true, // Ensure responsiveness
                        lengthChange: false, // Disable entries per page
                        fixedHeader: true,
                        scroller: true,
                        language: {
                            searchPlaceholder: 'Search records', // Placeholder for the search input
                            search: "", // Remove the default "Search" label
                        },
                        dom: '<"top"f>rt<"bottom"lp><"clear">', // Modify the DOM structure to control search label placement
                        initComplete: function() {
                            // Remove default search input label and replace with custom icon
                            let searchContainer = $('#wc-tbl_filter');
                            searchContainer.html(`
                                <div class="custom-search-wrapper">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(0, 0, 0, 1);transform: ;msFilter:;"><path d="M19.023 16.977a35.13 35.13 0 0 1-1.367-1.384c-.372-.378-.596-.653-.596-.653l-2.8-1.337A6.962 6.962 0 0 0 16 9c0-3.859-3.14-7-7-7S2 5.141 2 9s3.14 7 7 7c1.763 0 3.37-.66 4.603-1.739l1.337 2.8s.275.224.653.596c.387.363.896.854 1.384 1.367l1.358 1.392.604.646 2.121-2.121-.646-.604c-.379-.372-.885-.866-1.391-1.36zM9 14c-2.757 0-5-2.243-5-5s2.243-5 5-5 5 2.243 5 5-2.243 5-5 5z"></path></svg>
                                    <input type="text" id="customSearchBox" placeholder="Search..." class="form-control"/>
                                </div>
                            `);

                            // Bind search box input to DataTables search function
                            $('#customSearchBox').on('keyup', function() {
                                dataTable.search(this.value).draw();
                            });
                        }
                    });
                },
                error: function (error) {
                    console.log("Error fetching data: ", error);
                    alert("Failed to fetch waste compositions. Please try again.");
                }
            });
        }

        // fetchWC();

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
                        
                        $('#addWasteModal').modal('hide');
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

        // Edit Waste Composition
        $('#wc-tbl').on('click', '.update-btn', function () {
            let id = $(this).data('id'); // Get the wasteComposition id from the row

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

                    $('#editWasteModal').modal('show'); // Display the modal after populating the form
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
        $('#editWasteModal').on('shown.bs.modal', function () {
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
                    text: 'You have not made any changes.',
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
                        $('#editWasteModal').modal('hide');
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

    });
</script>

@endsection