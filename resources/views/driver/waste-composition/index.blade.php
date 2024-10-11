@extends('d-layout')

@section('main-content')

<main class="main-content">
    <div class="container">
        <div class="text-center flex-wrap d-flex justify-content-between align-items-center">
            <div>
                <h1><strong>Waste Composition Records</strong></h1>
                <p>Contains waste composition information.</p>
            </div>
        </div>

        <div class="table-responsive mb-5">
            <table id="wc-tbl" class="table" role="grid" data-bs-toggle="data-table">
                <thead>
                    <tr class="ligth" style="background-color: #01A94D; color: white;">
                        <th>Location</th>
                        <th>Type</th>
                        <th>Metrics</th>
                    </tr>
                </thead>
                <tbody>
                    
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
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" form="addWCForm" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>

        {{-- Edit Waste Modal --}}
        <div class="modal fade z-100" id="editWasteModal" tabindex="-1" aria-labelledby="editWasteLabel" aria-hidden="true">
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
                                <tr class="wc-row" data-id="${wasteComposition.id}">
                                    <td>${wasteComposition.brgy.name}</td>
                                    <td>${wasteComposition.waste_type}</td>
                                    <td>${wasteComposition.metrics}</td>
                                </tr>`;
                            counter++;
                        }
                    });

                    let dataTable = $('#wc-tbl').DataTable();
                    dataTable.clear(); // Clear the existing table data
                    dataTable.destroy();

                    $('#wc-tbl tbody').html(rows);

                    $('#wc-tbl').DataTable({
                        pageLength: 5,
                        bSort: false,
                        retrieve: true, // Retrieve the existing table instead of initializing it again
                        paging: true, // Enable pagination
                        searching: true, // Enable search functionality
                        info: false, // Show the number of entries info
                        responsive: true, // Ensure responsiveness
                        lengthChange: false, // Disable entries per page
                        fixedHeader: true,
                        scroller: true,
                        language: {
                            searchPlaceholder: 'Search records'
                        },
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
        $('#wc-tbl').on('click', 'tr.wc-row', function () {
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
                    updateMetricsLabelEdit('edit_wt', 'edit_metrics_label');

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