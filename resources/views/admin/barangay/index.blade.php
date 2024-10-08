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
                                <nav style="--bs-breadcrumb-divider: '/';" aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="{{ route('dashboard')}}">Home</a></li>
                                        <li class="breadcrumb-item active text-white" aria-current="page">Barangay Records</li>
                                    </ol>
                                </nav>
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
                                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link active" id="table-view-tab" data-bs-toggle="tab" data-bs-target="#table-view" type="button" role="tab" aria-controls="table-view" aria-selected="true">
                                                Barangay List
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
                                    <a href="#" class=" text-center btn btn-primary btn-icon mt-lg-0 mt-md-0 mt-3" data-bs-toggle="modal" data-bs-target="#addBarangayModal">
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
                                <!-- Bootstrap Tabs -->
                                
                            
                                <!-- Tab Content -->
                                <div class="tab-content" id="myTabContent">
                                    <!-- Table View Tab Pane -->
                                    <div class="tab-pane fade show active" id="table-view" role="tabpanel" aria-labelledby="table-view-tab">
                                        <div class="table-responsive mt-3">
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
                            
                                    <!-- Archive Tab Pane -->
                                    <div class="tab-pane fade" id="archive" role="tabpanel" aria-labelledby="archive-tab">
                                        <div class="table-responsive mt-3">
                                            <table id="archive-list-table" class="table" role="grid">
                                                <thead>
                                                    <tr class="ligth" style="background-color: #01A94D; color: white;">
                                                        <th>No.</th>
                                                        <th>Address</th>
                                                        <th>Area</th>
                                                        <th>Zip Code</th>
                                                        <th>Captain</th>
                                                        <th>Date Archived</th>
                                                        <th style="min-width: 100px">Operation</th>
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
    
    {{-- Add Barangay Modal --}}
    <div class="modal fade" id="addBarangayModal" tabindex="-1" aria-labelledby="addBarangayLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="addBarangayLabel">Create Schedule</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="addBarangayForm" action="{{ route('barangays.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="add_name" class="form-label">Barangay <span style="color: red;">*</span></label>
                            <select class="form-control" id="add_name" name="name" required>
                                <option value=""></option>
                                <option value="Brgy. 1">Brgy 1</option>
                                <option value="Brgy. 2">Brgy 2</option>
                                <option value="Brgy. 3">Brgy 3</option>
                                <option value="Brgy. 4">Brgy 4</option>
                                <option value="Brgy. 5">Brgy 5</option>
                                <option value="Brgy. 6">Brgy 6</option>
                                <option value="Brgy. Linggangao">Brgy Linggangao</option>
                                <option value="Brgy. San Isidro">Brgy San Isidro</option>
                                <option value="Brgy. Cala-Cala">Brgy Cala-Cala</option>
                                <option value="Brgy. Talusan">Brgy Talusan</option>
                                <option value="Brgy. Baliwagan">Brgy Baliwagan</option>
                                <option value="Brgy. Binitinan">Brgy Binitinan</option>
                                <option value="Brgy. Hermano">Brgy Hermano</option>
                                <option value="Brgy. Cogon">Brgy Cogon</option>
                                <option value="Brgy. Mandangoa">Brgy Mandangoa</option>
                                <option value="Brgy. Mambayaan">Brgy Mambayaan</option>
                                <option value="Brgy. Napaliran">Brgy Napaliran</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="add_muni" class="form-label">Municipality <span style="color: red;">*</span></label>
                            <select class="form-control" id="add_muni" name="muni" >
                                <option value="Balingasag">Balingasag</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="add_prov" class="form-label">Province <span style="color: red;">*</span></label>
                            <select class="form-control" id="add_prov" name="prov" >
                                <option value="Misamis Oriental">Misamis Oriental</option>
                            </select>
                        </div>
        
                        <div class="mb-3">
                            <label for="add_area" class="form-label">Collection Area <span style="color: red;">*</span></label>
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
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-soft-light" data-bs-dismiss="modal">Close</button>
                    <button type="submit" form="addBarangayForm" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Offcanvas for Edit Barangay -->
    <div class="modal fade" id="editBarangayModal" tabindex="-1" aria-labelledby="editBarangayModal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="editBarangayModal">Update Schedule</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="editBrgyForm" method="POST">
                        @csrf
                        <!-- Hidden input for barangay ID -->
                        <input type="hidden" id="edit_brgy_id" name="brgy_id">
        
                        <div class="mb-3">
                            <label for="edit_name" class="form-label">Barangay <span style="color: red;">*</span></label>
                            <select class="form-control" id="edit_name" name="name" required>
                                <option value=""></option>
                                <option value="Brgy. 1">Brgy 1</option>
                                <option value="Brgy. 2">Brgy 2</option>
                                <option value="Brgy. 3">Brgy 3</option>
                                <option value="Brgy. 4">Brgy 4</option>
                                <option value="Brgy. 5">Brgy 5</option>
                                <option value="Brgy. 6">Brgy 6</option>
                                <option value="Brgy. Linggangao">Brgy Linggangao</option>
                                <option value="Brgy. San Isidro">Brgy San Isidro</option>
                                <option value="Brgy. Cala-Cala">Brgy Cala-Cala</option>
                                <option value="Brgy. Talusan">Brgy Talusan</option>
                                <option value="Brgy. Baliwagan">Brgy Baliwagan</option>
                                <option value="Brgy. Binitinan">Brgy Binitinan</option>
                                <option value="Brgy. Hermano">Brgy Hermano</option>
                                <option value="Brgy. Cogon">Brgy Cogon</option>
                                <option value="Brgy. Mandangoa">Brgy Mandangoa</option>
                                <option value="Brgy. Mambayaan">Brgy Mambayaan</option>
                                <option value="Brgy. Napaliran">Brgy Napaliran</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="edit_muni" class="form-label">Municipality <span style="color: red;">*</span></label>
                            <select class="form-control" id="edit_muni" name="muni" >
                                <option value="Balingasag">Balingasag</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="edit_prov" class="form-label">Province <span style="color: red;">*</span></label>
                            <select class="form-control" id="edit_prov" name="prov" >
                                <option value="Misamis Oriental">Misamis Oriental</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="edit_area" class="form-label">Collection Area <span style="color: red;">*</span></label>
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
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-soft-light" data-bs-dismiss="modal">Close</button>
                    <button type="submit" form="editBrgyForm" class="btn btn-primary">Save changes</button>
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
                                    <td>${barangay.name}, ${barangay.municipality}, ${barangay.province}</td>
                                    <td>${barangay.area}</td>
                                    <td>${barangay.zipcode}</td>
                                    <td>${barangay.captain}</td>
                                    <td>${formattedCreatedAt}</td>
                                    <td>
                                        <div class="flex align-items-center list-user-action">
                                            <!-- Edit Button with Tooltip -->
                                            <a class="btn btn-sm btn-icon btn-warning edit-barangay-btn" data-id="${barangay.id}" data-bs-toggle="tooltip" title="Edit Barangay">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(255, 255, 255, 1); transform: ; msFilter:;">
                                                    <path d="m18.988 2.012 3 3L19.701 7.3l-3-3zM8 16h3l7.287-7.287-3-3L8 13z"></path>
                                                    <path d="M19 19H8.158c-.026 0-.053.01-.079.01-.033 0-.066-.009-.1-.01H5V5h6.847l2-2H5c-1.103 0-2 .896-2 2v14c0 1.104.897 2 2 2h14a2 2 0 0 0 2-2v-8.668l-2 2V19z"></path>
                                                </svg>
                                            </a>

                                            <!-- Archive Button with Tooltip -->
                                            <a class="btn btn-sm btn-icon btn-secondary archive-barangay-btn" data-id="${barangay.id}" data-bs-toggle="tooltip" title="Archive Barangay">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-archive">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                                    <path d="M3 4m0 2a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v0a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2z"/>
                                                    <path d="M5 8v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-10"/>
                                                    <path d="M10 12l4 0"/>
                                                </svg>
                                            </a>
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

        function fetchABarangays() {
            $.ajax({
                url: "{{ route('barangays.getArchive') }}", // Your route for fetching barangays
                type: "GET",
                success: function (response) {
                    let rows = '';
                    let counter = 1;
                    $.each(response.abarangays, function (key, abarangay) {
                        if (abarangay.isDeleted == '2') { // Skip users with 'deleted' status
                            // Format the created_at date
                            const updatedAt = new Date(abarangay.updated_at);
                            const formattedupdatedAt = updatedAt.toLocaleString('en-US', {
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
                                    <td>${abarangay.name}, ${abarangay.municipality}, ${abarangay.province}</td>
                                    <td>${abarangay.area}</td>
                                    <td>${abarangay.zipcode}</td>
                                    <td>${abarangay.captain}</td>
                                    <td>${formattedupdatedAt}</td>
                                    <td>
                                        <div class="flex align-items-center list-user-action">
                                            <a class="btn btn-sm btn-icon btn-secondary restore-barangay-btn" data-id="${abarangay.id}">
                                                <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-restore"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M3.06 13a9 9 0 1 0 .49 -4.087" /><path d="M3 4.001v5h5" /><path d="M12 12m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" /></svg>
                                            </a>
                                            <a class="btn btn-sm btn-icon btn-danger delete-barangay-btn" data-id="${abarangay.id}">
                                                <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-trash"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 7l16 0" /><path d="M10 11l0 6" /><path d="M14 11l0 6" /><path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" /><path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" /></svg>
                                            </a>
                                        </div>
                                    </td>
                                </tr>`;
                            counter++;
                        }
                        
                    });

                    let dataTable = $('#archive-list-table').DataTable();
                    dataTable.clear(); // Clear the existing table data
                    dataTable.destroy();

                    $('#archive-list-table tbody').html(rows);

                    $('#archive-list-table').DataTable({
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

        fetchABarangays();

        // Add Barangay
        $('#addBarangayForm').on('submit', function (e) {
            e.preventDefault();

            let formData = {
                _token: "{{ csrf_token() }}", // Laravel CSRF token
                name: $('#add_name').val(),
                municipality: $('#add_muni').val(),
                province: $('#add_prov').val(),
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
                        
                        var addBrgyModalEl = document.getElementById('addBarangayModal');
                        var addBarangayModal = bootstrap.Modal.getInstance(addBrgyModalEl);
                        addBarangayModal.hide();
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
                    $('#edit_muni').val(response.barangay.municipality);
                    $('#edit_prov').val(response.barangay.province);
                    $('#edit_area').val(response.barangay.area);
                    $('#edit_zipcode').val(response.barangay.zipcode);
                    $('#edit_captain').val(response.barangay.captain);


                    $('#editBarangayModal').modal('show');

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
                name: $('#edit_name').val(),
                municipality: $('#edit_muni').val(),
                province: $('#edit_prov').val(),
                area: $('#edit_area').val(),
                zipcode: $('#edit_zipcode').val(),
                captain: $('#edit_captain').val(),
            };
        }

        // Call this function when the form is displayed
        $('#editBarangayModal').on('shown.bs.modal', function () {
            storeOriginalValues(); // Store values when the offcanvas is shown
        });

        $('#editBrgyForm').on('submit', function (e) {
            e.preventDefault();
            let barangayId = $('#edit_brgy_id').val();

            // Check for changes
            const currentValues = {
                name: $('#edit_name').val(),
                municipality: $('#edit_muni').val(),
                province: $('#edit_prov').val(),
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

            let formData = {
                _token: "{{ csrf_token() }}", // Laravel CSRF token
                name: $('#edit_name').val(),
                municipality: $('#edit_muni').val(),
                province: $('#edit_prov').val(),
                area: $('#edit_area').val(),
                zipcode: $('#edit_zipcode').val(),
                captain: $('#edit_captain').val(),
            };

            $.ajax({
                url: `/admin/barangay/${barangayId}/update`,
                type: "PUT",
                data: formData,
                success: function (response) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Barangay Updated!',
                        text: response.message,
                        confirmButtonText: 'OK',
                        confirmButtonColor: "#01A94D"
                    }).then(() => {
                        fetchBarangays();
                        $('#editBarangayModal').modal('hide');

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
                title: 'Move to Trash?',
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
                                // 
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