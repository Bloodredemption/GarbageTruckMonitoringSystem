@extends('d-layout')

@section('main-content')

<main class="main-content">
    <div class="container">
        
        <h4 class="fw-bold mb-3">Waste Composition</h4>

        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">
                <svg  xmlns="http://www.w3.org/2000/svg"  width="20"  height="20"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-search">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                    <path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0" />
                    <path d="M21 21l-6 -6" />
                </svg>
            </span>
            <input type="text" id="searchInput" class="form-control custom-border" placeholder="Search Barangay" aria-label="Search" aria-describedby="basic-addon1">
        </div>

        <div class="d-flex justify-content-between align-items-center mb-4 mt-4">
            <ul class="nav nav-pills-d">
                <li class="nav-item-d">
                    <a class="nav-link-d custom-active fw-semibold" href="#" onclick="filterCards('all')">All</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link-d fw-semibold" href="#" onclick="filterCards('Biodegradable')">Biodegradables</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link-d fw-semibold" href="#" onclick="filterCards('Residual')">Residuals</a>
                </li>
            </ul>

            <div>
                <a href="#" class="viewBtn active" id="gridViewBtn" data-bs-toggle="tooltip" data-bs-placement="top" title="Grid View">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M4 11h6a1 1 0 0 0 1-1V4a1 1 0 0 0-1-1H4a1 1 0 0 0-1 1v6a1 1 0 0 0 1 1zm10 0h6a1 1 0 0 0 1-1V4a1 1 0 0 0-1-1h-6a1 1 0 0 0-1 1v6a1 1 0 0 0 1 1zM4 21h6a1 1 0 0 0 1-1v-6a1 1 0 0 0-1-1H4a1 1 0 0 0-1 1v6a1 1 0 0 0 1 1zm10 0h6a1 1 0 0 0 1-1v-6a1 1 0 0 0-1-1h-6a1 1 0 0 0-1 1v6a1 1 0 0 0 1 1z"></path>
                    </svg>
                </a>
                <a href="#" class="viewBtn" id="listViewBtn" data-bs-toggle="tooltip" data-bs-placement="top" title="List View">
                    <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="currentColor"  class="icon icon-tabler icons-tabler-filled icon-tabler-layout-list">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                        <path d="M18 3a3 3 0 0 1 3 3v2a3 3 0 0 1 -3 3h-12a3 3 0 0 1 -3 -3v-2a3 3 0 0 1 3 -3z" />
                        <path d="M18 13a3 3 0 0 1 3 3v2a3 3 0 0 1 -3 3h-12a3 3 0 0 1 -3 -3v-2a3 3 0 0 1 3 -3z" />
                    </svg>
                </a>
            </div>
        </div>

        <div class="waste-container mb-4" id="viewContainer">
            {{-- Grid View --}}
            <div class="row grid-view">
                @forelse ($wasteCompositions as $wc)
                    <div class="col-6 card-container" data-waste-type="{{ $wc->waste_type }}">
                        <div class="card mb-4">
                            <div class="card-body">
                                <div class="card-title">
                                    <div class="d-flex justify-content-between align-items-center mb-2">
                                        <span class="fs-4 fw-bold" style="color: #01A94D;">{{ $wc->brgy->area_name }}</span>
                                        <div class="dropdown">
                                            <a href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-dots-vertical">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                                    <path d="M12 12m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" />
                                                    <path d="M12 19m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" />
                                                    <path d="M12 5m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" />
                                                </svg>
                                            </a>
                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                <li>
                                                    <a class="dropdown-item update-btn" data-id="{{ $wc->id }}">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24">
                                                            <path d="m18.988 2.012 3 3L19.701 7.3l-3-3zM8 16h3l7.287-7.287-3-3L8 13z"></path>
                                                            <path d="M19 19H8.158c-.026 0-.053.01-.079.01-.033 0-.066-.009-.1-.01H5V5h6.847l2-2H5c-1.103 0-2 .896-2 2v14c0 1.104.897 2 2 2h14a2 2 0 0 0 2-2v-8.668l-2 2V19z"></path>
                                                        </svg>
                                                        Edit
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-between mb-2">
                                    <div class="col-12">
                                        <p class="text-muted mb-1">Type</p>
                                        <p class="fw-bold mb-0">{{ $wc->waste_type }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                Weight: <span class="fw-bold">{{ $wc->metrics }} kg/s</span>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="container text-center">
                        <div class="d-flex flex-column align-items-center justify-content-center" style="height: 50vh;">
                            <img src="/assets/images/no-waste.svg" class="img-fluid mb-4" width="75%" alt="No Data Found">
                            <h3 class="fw-bold">No waste collected today</h3>
                            <p style="color: #525356; font-size: 15px;">All waste collected will be displayed here</p>
                        </div>
                    </div>
                @endforelse
            </div>
        
            {{-- List View --}}
            <div class="row list-view d-none">
                @forelse ($wasteCompositions as $wc)
                    <div class="col-12 card-container" data-waste-type="{{ $wc->waste_type }}">
                        <div class="card mb-4">
                            <div class="card-body">
                                <div class="card-title mb-0">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <span class="fs-4 fw-bold" style="color: #01A94D;">{{ $wc->brgy->area_name }}</span>
                                        <div class="dropdown">
                                            <a href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-dots-vertical">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                                    <path d="M12 12m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" />
                                                    <path d="M12 19m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" />
                                                    <path d="M12 5m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" />
                                                </svg>
                                            </a>
                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                <li>
                                                    <a class="dropdown-item update-btn" data-id="{{ $wc->id }}">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24">
                                                            <path d="m18.988 2.012 3 3L19.701 7.3l-3-3zM8 16h3l7.287-7.287-3-3L8 13z"></path>
                                                            <path d="M19 19H8.158c-.026 0-.053.01-.079.01-.033 0-.066-.009-.1-.01H5V5h6.847l2-2H5c-1.103 0-2 .896-2 2v14c0 1.104.897 2 2 2h14a2 2 0 0 0 2-2v-8.668l-2 2V19z"></path>
                                                        </svg>
                                                        Edit
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <div class="col-12">
                                        <span class="fw-semibold text-muted mb-0">{{ $wc->waste_type }} | {{ $wc->metrics }} kg/s</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="container text-center">
                        <div class="d-flex flex-column align-items-center justify-content-center" style="height: 50vh;">
                            <img src="/assets/images/no-waste.svg" class="img-fluid mb-4" width="75%" alt="No Data Found">
                            <h3 class="fw-bold">No waste collected today</h3>
                            <p style="color: #525356; font-size: 15px;">All waste collected will be displayed here</p>
                        </div>
                    </div>
                @endforelse
            </div>
        </div>
        

        {{-- <div class="table-responsive mb-5">
            <h6><strong>Waste Composition Records</strong></h6>
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
                            <a class="btn btn-icon btn-sm btn-success d-actions update-btn" data-id="{{ $wc->id }}" title="Edit User">
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
        </div> --}}

        {{-- Add Waste Modal --}}
        <div class="modal fade z-100" id="addWasteModal" tabindex="-1" aria-labelledby="addWasteLabel" aria-hidden="true">
            <div class="modal-dialog modal-sm modal-dialog-centered">
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
                                    <option value="Recyclable">Recyclable</option>
                                    <option value="Industrial Waste">Industrial Waste</option>
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
                                <label for="add_brgy" class="form-label">Barangay <span style="color: red;">*</span></label>
                                <select class="form-control" id="add_brgy" name="brgy" required>
                                    <option></option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="add_event" class="form-label">Event <span class="text-muted" style="font-size: 15px;">(Optional)</span></label>
                                <select class="form-control" id="add_event" name="event" required>
                                    <option></option>
                                </select>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" form="addWCForm" class="btn btn-primary" id="saveChanges" style="background-color: #01A94D; color: white;">
                            <div class="spinner-border spinner-border-sm text-white d-none" role="status" id="saveChangesSpinner">
                                <span class="visually-hidden">Loading...</span>
                            </div>
                            Submit
                        </button>
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
                                    <option value="Recyclable">Recyclable</option>
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
                                <label for="edit_brgy" class="form-label">Barangay <span style="color: red;">*</span></label>
                                <select class="form-control" id="edit_brgy" name="brgy" required>
                                    <option></option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="edit_event" class="form-label">Event <span class="text-muted" style="font-size: 15px;">(Optional)</span></label>
                                <select class="form-control" id="edit_event" name="event" required>
                                    <option></option>
                                </select>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" form="editWCForm" class="btn btn-primary" id="editsaveChanges" style="background-color: #01A94D; color: white;">
                            <div class="spinner-border spinner-border-sm text-white d-none" role="status" id="editsaveChangesSpinner">
                                <span class="visually-hidden">Loading...</span>
                            </div>
                            Save changes
                        </button>
                    </div>
                </div>
            </div>
        </div>

    </div>
</main>

{{-- <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasBottom" aria-controls="offcanvasBottom">Toggle bottom offcanvas</button>

<div class="offcanvas offcanvas-bottom rounded-top" style="height: 50vh;" tabindex="-1" id="offcanvasBottom" aria-labelledby="offcanvasBottomLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasBottomLabel">Add New Record</h5>
        <button type="submit" form="addWCForm" class="btn btn-primary">Save changes</button>
    </div>
    <div class="offcanvas-body small">
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
            <label for="add_metrics" id="add_metrics_label" class="form-label">Weight <span style="color: red;">*</span></label>
            <div class="input-group mb-3">
                <input type="number" class="form-control" id="add_metrics" name="metrics" required aria-label="Recipient's username" aria-describedby="basic-addon2">
                <div class="input-group-append">
                    <span class="input-group-text" id="basic-addon2">kg/s</span>
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
</div> --}}

<a href="#" class="floating-btn" data-bs-toggle="modal" data-bs-target="#addWasteModal">
    <i class='bx bx-plus'></i>
</a>

<div class="toast-container bottom-0 start-50 translate-middle-x p-3" style="margin-bottom: 85px; width: 180px;">
    <div id="userSuccessToast" class="toast align-items-center text-bg-success border-0" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="text-center">
            <div id="toastMessage" class="toast-body">
                <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="currentColor"  class="icon icon-tabler icons-tabler-filled icon-tabler-circle-check"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M17 3.34a10 10 0 1 1 -14.995 8.984l-.005 -.324l.005 -.324a10 10 0 0 1 14.995 -8.336zm-1.293 5.953a1 1 0 0 0 -1.32 -.083l-.094 .083l-3.293 3.292l-1.293 -1.292l-.094 -.083a1 1 0 0 0 -1.403 1.403l.083 .094l2 2l.094 .083a1 1 0 0 0 1.226 0l.094 -.083l4 -4l.083 -.094a1 1 0 0 0 -.083 -1.32z" /></svg>
                Waste Added
                <!-- Success message will be dynamically inserted here -->
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.7.1.js"></script>

<script>
    function filterCards(type) {
        // Remove 'active' class from all nav links
        document.querySelectorAll('.nav-link-d').forEach(link => link.classList.remove('custom-active'));

        // Add 'active' class to the clicked nav link
        event.target.classList.add('custom-active');

        // Show or hide cards based on the selected type
        document.querySelectorAll('.card-container').forEach(card => {
            const wasteType = card.getAttribute('data-waste-type');
            
            if (type === 'all' || wasteType === type) {
                card.style.display = 'block'; // Ensure the card displays
            } else {
                card.style.display = 'none'; // Hide the card
            }
        });
    }

    $(document).ready(function () {
        const gridViewBtn = document.getElementById("gridViewBtn");
        const listViewBtn = document.getElementById("listViewBtn");
        const viewContainer = document.getElementById("viewContainer");
        const viewBtns = document.querySelectorAll(".viewBtn");

        function setActiveView(button) {
            viewBtns.forEach(btn => btn.classList.remove("active"));
            button.classList.add("active");
        }
        
        gridViewBtn.addEventListener("click", function (e) {
            e.preventDefault();
            setActiveView(gridViewBtn);
            document.querySelector(".grid-view").classList.remove("d-none");
            document.querySelector(".list-view").classList.add("d-none");
        });

        listViewBtn.addEventListener("click", function (e) {
            e.preventDefault();
            setActiveView(listViewBtn);
            document.querySelector(".list-view").classList.remove("d-none");
            document.querySelector(".grid-view").classList.add("d-none");
        });

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
                        driverSelect1.append(`<option value="${barangay.id}">${barangay.area_name}</option>`);
                        driverSelect2.append(`<option value="${barangay.id}">${barangay.area_name}</option>`);
                    });
                },
                error: function (error) {
                    console.log("Error fetching barangay: ", error);
                }
            });
        }

        // Call the fetch function when the page loads
        fetchBrgy();

        function fetchEvent() {
            $.ajax({
                url: "{{ route('wc.getEvent') }}", // Your route for fetching drivers
                type: "GET",
                success: function (response) {
                    let driverSelect1 = $('#add_event'); // First driver select
                    let driverSelect2 = $('#edit_event'); // Second driver select (new)

                    // Clear the select options for both select elements
                    driverSelect1.empty();
                    driverSelect2.empty();

                    // Add default options for both selects
                    driverSelect1.append('<option></option>');
                    driverSelect2.append('<option></option>');

                    // Populate both selects with the drivers
                    $.each(response.events, function (key, event) {
                        driverSelect1.append(`<option value="${event.id}">${event.name}</option>`);
                        driverSelect2.append(`<option value="${event.id}">${event.name}</option>`);
                    });
                },
                error: function (error) {
                    console.log("Error fetching event: ", error);
                }
            });
        }

        // Call the fetch function when the page loads
        fetchEvent();

        function fetchGridnListData() {
            $.ajax({
                url: "{{ route('wc.index') }}",
                type: "GET",
                success: function (response) {
                    // Replace only the content inside viewContainer
                    $('#viewContainer').html(response.html);
                },
                error: function (error) {
                    console.error("Error fetching data:", error);
                }
            });
        }

        $('#searchInput').on('input', function () {
            let searchTerm = $(this).val();

            $.ajax({
                url: "{{ route('wc.search') }}",
                type: "GET",
                data: { query: searchTerm },
                success: function (response) {
                    setActiveView(gridViewBtn);

                    $('#viewContainer .grid-view, #viewContainer .list-view').empty();
                    $('#viewContainer').html(response.html);
                },
                error: function (error) {
                    console.error("Error fetching search results:", error);
                }
            });
        });

        // Add Dump Truck
        $('#addWCForm').on('submit', function (e) {
            e.preventDefault();

            $('#saveChanges').attr('disabled', true); 
            $('#saveChangesSpinner').removeClass('d-none');

            let formData = {
                _token: "{{ csrf_token() }}", // Laravel CSRF token
                waste_type: $('#add_wt').val(),
                metrics: $('#add_metrics').val(),
                brgy_id: $('#add_brgy').val(),
                event_id: $('#add_event').val(),
            };

            $.ajax({
                url: "{{ route('wc.store') }}", // Route for storing barangay
                type: "POST",
                data: formData,
                success: function (response) {
                    fetchGridnListData();
                    $('#addWCForm')[0].reset();
                    $('#addWasteModal').modal('hide');
                    // $('#toastMessage').text(response.message);

                    // Trigger Bootstrap toast instead of SweetAlert
                    var toastEl = new bootstrap.Toast(document.getElementById('userSuccessToast'));
                    toastEl.show();
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
                    $('#saveChanges').attr('disabled', false);
                    $('#saveChangesSpinner').addClass('d-none'); // Hide spinner
                }
            });
        });

        // Edit Waste Composition
        $(document).on('click', '.update-btn', function (e) {
            e.preventDefault(); // Prevent default action, if any
            
            let id = $(this).data('id'); // Get the wasteComposition id

            $.ajax({
                url: `/driver/waste-composition/${id}/edit`,
                type: "GET",
                success: function (response) {
                    let wc = response.wasteComposition;
                    $('#edit_wt').val(wc.waste_type);
                    $('#edit_metrics').val(wc.metrics);
                    $('#edit_cd').val(wc.collection_date);
                    $('#edit_brgy').val(wc.brgy_id);
                    $('#edit_event').val(wc.event_id);
                    $('#edit_wc_id').val(wc.id);

                    $('#editWasteModal').modal('show'); // Display the modal after populating the form
                },
                error: function (error) {
                    console.error("Error fetching waste composition:", error);
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
                brgy_id: $('#edit_brgy').val(),
                event_id: $('#edit_event').val(),
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
                brgy_id: $('#edit_brgy').val(),
                event_id: $('#edit_event').val(),
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
                brgy_id: $('#edit_brgy').val(),
                event_id: $('#edit_event').val(),
            };

            $('#editsaveChanges').attr('disabled', true); 
            $('#editsaveChangesSpinner').removeClass('d-none');

            $.ajax({
                url: `/driver/waste-composition/${id}/update`,
                type: "PUT",
                data: formData,
                success: function (response) {
                    fetchGridnListData();
                    $('#editWCForm')[0].reset();
                    $('#editWasteModal').modal('hide');

                    var toastEl = new bootstrap.Toast(document.getElementById('userSuccessToast'));
                    toastEl.show();
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
                },
                complete: function() {
                    // Re-enable the button and hide spinner after the request is complete
                    $('#editsaveChanges').attr('disabled', false);
                    $('#editsaveChangesSpinner').addClass('d-none'); // Hide spinner
                }
            });
        });

    });
</script>

@endsection