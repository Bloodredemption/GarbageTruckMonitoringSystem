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
                                <h1><strong>Collection Schedule</strong></h1>
                                <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="{{ route('dashboard')}}">Dashboard</a></li>
                                        <li class="breadcrumb-item active text-white" aria-current="page">Collection Schedule</li>
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
    <div class="container-fluid content-inner mt-n5 py-0">
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
                                                Calendar View
                                            </button>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link" id="archive-tab" data-bs-toggle="tab" data-bs-target="#archive" type="button" role="tab" aria-controls="archive" aria-selected="false">
                                                Table View
                                            </button>
                                        </li>
                                    </ul>
                                </div>
                                
                                <div>
                                    <a href="#" class=" text-center btn btn-primary btn-icon mt-lg-0 mt-md-0 mt-3" data-bs-toggle="modal" data-bs-target="#addScheduleModal">
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
                                <!-- Bootstrap Tabs -->
                            
                                <!-- Tab Content -->
                                <div class="tab-content" id="myTabContent">
                                    <!-- Table View Tab Pane -->
                                    <div class="tab-pane fade show active" id="table-view" role="tabpanel" aria-labelledby="table-view-tab">
                                        <div class="table-responsive mt-3">
                                            <div class="card-body">
                                                <div id="calendar" class="calendar-s"></div>
                                            </div>
                                        </div>
                                    </div>
                            
                                    <!-- Archive Tab Pane -->
                                    <div class="tab-pane fade" id="archive" role="tabpanel" aria-labelledby="archive-tab">
                                        <div class="table-responsive mt-3">
                                            <table id="col-sched-tbl" class="table" role="grid" data-bs-toggle="data-table">
                                                <thead>
                                                    <tr class="ligth" style="background-color: #01A94D; color: white;">
                                                        <th>No.</th>
                                                        <th>Barangay</th>
                                                        <th>Dump Truck</th>
                                                        <th>Driver</th>
                                                        <th>Schedule</th>
                                                        <th>Status</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($collectionSchedules as $cs)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $cs->barangay->name }}</td>
                                                        <td>{{ $cs->dumpTruck->brand }} {{ $cs->dumpTruck->model }}</td>
                                                        <td>{{ $cs->driver->fullname }}</td>
                                                        <td>{{ $cs->scheduled_date }} {{ $cs->scheduled_time }}</td>
                                                        <td>
                                                            @if ($cs->status == 'Finished')
                                                                <span class="badge text-success">
                                                                    <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="currentColor"  class="icon icon-tabler icons-tabler-filled icon-tabler-circle-check"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M17 3.34a10 10 0 1 1 -14.995 8.984l-.005 -.324l.005 -.324a10 10 0 0 1 14.995 -8.336zm-1.293 5.953a1 1 0 0 0 -1.32 -.083l-.094 .083l-3.293 3.292l-1.293 -1.292l-.094 -.083a1 1 0 0 0 -1.403 1.403l.083 .094l2 2l.094 .083a1 1 0 0 0 1.226 0l.094 -.083l4 -4l.083 -.094a1 1 0 0 0 -.083 -1.32z" /></svg>
                                                                    Finished
                                                                </span>
                                                            @elseif ($cs->status == 'Ongoing')
                                                                <span class="badge text-secondary">
                                                                    <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-refresh"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M20 11a8.1 8.1 0 0 0 -15.5 -2m-.5 -4v4h4" /><path d="M4 13a8.1 8.1 0 0 0 15.5 2m.5 4v-4h-4" /></svg>
                                                                    Ongoing
                                                                </span>
                                                            @else
                                                                <span class="badge text-warning">
                                                                    <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="currentColor"  class="icon icon-tabler icons-tabler-filled icon-tabler-square-rounded-minus"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 2l.324 .001l.318 .004l.616 .017l.299 .013l.579 .034l.553 .046c4.785 .464 6.732 2.411 7.196 7.196l.046 .553l.034 .579c.005 .098 .01 .198 .013 .299l.017 .616l.005 .642l-.005 .642l-.017 .616l-.013 .299l-.034 .579l-.046 .553c-.464 4.785 -2.411 6.732 -7.196 7.196l-.553 .046l-.579 .034c-.098 .005 -.198 .01 -.299 .013l-.616 .017l-.642 .005l-.642 -.005l-.616 -.017l-.299 -.013l-.579 -.034l-.553 -.046c-4.785 -.464 -6.732 -2.411 -7.196 -7.196l-.046 -.553l-.034 -.579a28.058 28.058 0 0 1 -.013 -.299l-.017 -.616c-.003 -.21 -.005 -.424 -.005 -.642l.001 -.324l.004 -.318l.017 -.616l.013 -.299l.034 -.579l.046 -.553c.464 -4.785 2.411 -6.732 7.196 -7.196l.553 -.046l.579 -.034c.098 -.005 .198 -.01 .299 -.013l.616 -.017c.21 -.003 .424 -.005 .642 -.005zm3 9h-6l-.117 .007a1 1 0 0 0 .117 1.993h6l.117 -.007a1 1 0 0 0 -.117 -1.993z" /></svg>
                                                                    Pending
                                                                </span>
                                                            @endif
                                                            
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
            
        </div>
    </div>
    
    {{-- Add Schedule Modal --}}
    <div class="modal fade" id="addScheduleModal" tabindex="-1" aria-labelledby="addScheduleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="addScheduleModalLabel">Create Schedule</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="scheduleForm" method="POST">
                        @csrf
                        <div class="mb-3">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <label for="add_brgy" class="form-label mb-0">Barangay <span style="color: red;">*</span></label>
                                <a id="addbrgybtn" class="text-end" style="font-size: 15px" href="{{ route('barangays.index') }}">
                                    <i class="btn-inner">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="15" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                        </svg>
                                    </i>
                                    Add
                                </a>
                            </div>
                            <select class="form-control" id="add_brgy" name="brgy" required>
                                <!-- Options will be populated via AJAX -->
                            </select>
                        </div>
                        
                        <div class="mb-3">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <label for="add_dt" class="form-label">Dump Truck <span style="color: red;">*</span></label>
                                <a id="adddtbtn" class="text-end" style="font-size: 15px" href="{{ route('dump-trucks.index') }}">
                                    <i class="btn-inner">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="15" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                        </svg>
                                    </i>
                                    Add
                                </a>
                            </div>
                            <select class="form-control" id="add_dt" name="dt" required>
                                <!-- Options will be populated via AJAX -->
                            </select>
                        </div>
                        <div class="mb-3">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <label for="add_driver" class="form-label">Driver <span style="color: red;">*</span></label>
                                <a id="adddrvbtn" class="text-end" style="font-size: 15px" href="{{ route('users.index') }}">
                                    <i class="btn-inner">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="15" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                        </svg>
                                    </i>
                                    Add
                                </a>
                            </div>
                            <select class="form-control" id="add_driver" name="driver" required>
                                <!-- Options will be populated via AJAX -->
                            </select>
                        </div>
                        <div class="row g-3 mb-3">
                            <div class="col">
                                <label for="add_date" class="form-label">Date <span style="color: red;">*</span></label>
                                <input type="date" id="add_date" name="date" class="form-control" required>
                            </div>
                            <div class="col">
                                <label for="add_time" class="form-label">Time <span style="color: red;">*</span></label>
                                <input type="time" class="form-control" id="add_time" name="time" required>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-soft-light" data-bs-dismiss="modal">Close</button>
                    <button type="submit" form="scheduleForm" class="btn btn-primary" id="saveChangesBtn">
                        <div class="spinner-border spinner-border-sm text-white d-none" role="status" id="saveChangesSpinner">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                        Save changes
                    </button>
                </div>
            </div>
        </div>
    </div>
    
    {{-- Edit Modal --}}
    <div class="modal fade" id="editScheduleModal" tabindex="-1" aria-labelledby="editScheduleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="addScheduleModalLabel">Edit Schedule</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="editscheduleForm" method="POST">
                        @csrf
                        <input type="hidden" id="edit_sched_id" name="sched_id">

                        <div class="mb-3">
                            <label for="edit_brgy" class="form-label">Location <span style="color: red;">*</span></label>
                            <select class="form-control" id="edit_brgy" name="brgy" required>
                                <!-- Options will be populated via AJAX -->
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="edit_dt" class="form-label">Dump Truck <span style="color: red;">*</span></label>
                            <select class="form-control" id="edit_dt" name="dt" required>
                                <!-- Options will be populated via AJAX -->
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="edit_driver" class="form-label">Driver <span style="color: red;">*</span></label>
                            <select class="form-control" id="edit_driver" name="driver" required>
                                <!-- Options will be populated via AJAX -->
                            </select>
                        </div>
                        <div class="row g-3 mb-3">
                            <div class="col">
                                <label for="edit_date" class="form-label">Date <span style="color: red;">*</span></label>
                                <input type="date" id="edit_date" name="date" class="form-control" required>
                            </div>
                            <div class="col">
                                <label for="edit_time" class="form-label">Time <span style="color: red;">*</span></label>
                                <input type="time" class="form-control" id="edit_time" name="time" required>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-soft-light" data-bs-dismiss="modal">Close</button>
                    <button type="submit" form="editscheduleForm" class="btn btn-primary" id="editsaveChangesBtn">
                        <div class="spinner-border spinner-border-sm text-white d-none" role="status" id="editsaveChangesSpinner">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                        Save changes
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div class="toast-container position-fixed bottom-0 end-0 p-3">
        <div id="userSuccessToast" class="toast align-items-center text-bg-success border-0" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="d-flex">
                <div id="toastMessage" class="toast-body">
                    <!-- Success message will be dynamically inserted here -->
                </div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
        </div>
    </div>

    <!-- Footer Section Start -->
    @include('partials.footer')
    <!-- Footer Section End -->    
</main>

<!-- Fullcalender Javascript -->
<script src='https://cdn.jsdelivr.net/npm/fullcalendar/index.global.min.js'></script>

<script>
    $(document).ready(function() {
        table = $('#col-sched-tbl').DataTable({
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
                    title: 'Collection Schedule List',
                },
                { 
                    extend: 'excel', 
                    text: 'Excel',
                    title: 'Collection Schedule List',
                },
                { 
                    extend: 'pdf', 
                    text: 'PDF',
                    title: 'Collection Schedule List',
                },
                { 
                    extend: 'print', 
                    text: 'Print',
                    title: 'Collection Schedule List',
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
        
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            }
        });
        
        function fetchBrgy() {
            $.ajax({
                url: "{{ route('cs.getBrgy') }}", // Your route for fetching barangays
                type: "GET",
                success: function (response) {
                    let brgySelect1 = $('#add_brgy'); // First barangay select
                    let brgySelect2 = $('#edit_brgy'); // Second barangay select
                    let addBrgyBtn = $('#addbrgybtn'); // Add Barangay button

                    // Clear the select options for both select elements
                    brgySelect1.empty();
                    brgySelect2.empty();

                    // Check if the response contains barangays
                    if (!response.brgy || response.brgy.length === 0) {
                        addBrgyBtn.removeClass('d-none');
                    } else {
                        addBrgyBtn.addClass('d-none');
                    }

                    // Add default options for both selects
                    brgySelect1.append('<option></option>');
                    brgySelect2.append('<option></option>');

                    // Populate both selects with the barangays
                    $.each(response.brgy, function (key, brgy) {
                        brgySelect1.append(`<option value="${brgy.id}">${brgy.name} - ${brgy.area}</option>`);
                        brgySelect2.append(`<option value="${brgy.id}">${brgy.name} - ${brgy.area}</option>`);
                    });
                },
                error: function (error) {
                    console.log("Error fetching brgy: ", error);
                }
            });
        }

        // Call the fetch function when the page loads
        fetchBrgy();

        function fetchDumptruck() {
            $.ajax({
                url: "{{ route('cs.getDumptruck') }}", // Your route for fetching drivers
                type: "GET",
                success: function (response) {
                    let dtSelect1 = $('#add_dt'); // First driver select
                    let dtSelect2 = $('#edit_dt'); // First driver select
                    let addBtn = $('#adddtbtn'); // Add Barangay button

                    // Clear the select options for both select elements
                    dtSelect1.empty();
                    dtSelect2.empty();
                    // driverSelect2.empty();

                    if (!response.dt || response.dt.length === 0) {
                        addBtn.removeClass('d-none');
                    } else {
                        addBtn.addClass('d-none');
                    }

                    // Add default options for both selects
                    dtSelect1.append('<option></option>');
                    dtSelect2.append('<option></option>');
                    // driverSelect2.append('<option></option>');

                    // Populate both selects with the drivers
                    $.each(response.dt, function (key, dt) {
                        dtSelect1.append(`<option value="${dt.id}">${dt.brand} ${dt.model}</option>`);
                        dtSelect2.append(`<option value="${dt.id}">${dt.brand} ${dt.model}</option>`);
                    });
                },
                error: function (error) {
                    console.log("Error fetching dt: ", error);
                }
            });
        }

        // Call the fetch function when the page loads
        fetchDumptruck();

        function fetchDriver() {
            $.ajax({
                url: "{{ route('cs.getDriver') }}", // Your route for fetching drivers
                type: "GET",
                success: function (response) {
                    let dtSelect1 = $('#add_driver'); // First driver select
                    let dtSelect2 = $('#edit_driver'); // First driver select
                    let addBtn = $('#adddrvbtn'); // Add Barangay button

                    // Clear the select options for both select elements
                    dtSelect1.empty();
                    dtSelect2.empty();

                    if (!response.driver || response.driver.length === 0) {
                        addBtn.removeClass('d-none');
                    } else {
                        addBtn.addClass('d-none');
                    }

                    // Add default options for both selects
                    dtSelect1.append('<option></option>');
                    dtSelect2.append('<option></option>');

                    // Populate both selects with the drivers
                    $.each(response.driver, function (key, driver) {
                        dtSelect1.append(`<option value="${driver.id}">${driver.fullname}</option>`);
                        dtSelect2.append(`<option value="${driver.id}">${driver.fullname}</option>`);
                    });
                },
                error: function (error) {
                    console.log("Error fetching driver: ", error);
                }
            });
        }

        // Call the fetch function when the page loads
        fetchDriver();

        var calendarEl = document.getElementById('calendar');

        // Get today's date in YYYY-MM-DD format
        var today = new Date().toISOString().split('T')[0];

        // Initialize the FullCalendar with AJAX
        var calendar = new FullCalendar.Calendar(calendarEl, {
            themeSystem: 'bootstrap5',
            initialView: 'dayGridMonth', // Set the default view to Month

            dayMaxEvents: 3,

            headerToolbar: {
                left: 'prev,next today',
                center: 'title',
                right: 'dayGridMonth,timeGridWeek,timeGridDay' // Show Month, Week, Day, and List view
            },
            navLinks: true, // Clickable day/week names to navigate views
            selectable: true,
            events: {
                url: "{{ route('cs.events') }}",
                method: 'GET',
                failure: function() {
                    alert('There was an error while fetching events!');
                }
            },
            select: function(info) {
                var selectedDate = new Date(info.startStr); // Get the selected date
                var today = new Date(); // Get today's date
                today.setHours(0, 0, 0, 0); // Clear the time part (set to midnight)

                // Check if the selected date is before today
                if (selectedDate < today) {
                    return; // Exit without performing any action
                }

                // For week and day views, capture both date and time
                if (info.view.type === 'timeGridWeek' || info.view.type === 'timeGridDay') {
                    const date = info.startStr.split('T')[0]; // Extract date part
                    const time = info.startStr.split('T')[1].substring(0, 5); // Extract time part (HH:MM)
                    $('#add_date').val(date);
                    $('#add_time').val(time);
                } else {
                    // In month view, only set the date
                    $('#add_date').val(info.startStr);
                    $('#add_time').val(''); // Clear time in month view
                }

                // Show the modal using Bootstrap modal and jQuery
                var addScheduleModal = new bootstrap.Modal($('#addScheduleModal')[0], {
                    keyboard: false
                });
                addScheduleModal.show();
            },
            eventClick: function(info) {
                // Set the event data in the modal input fields using jQuery
                $('#edit_sched_id').val(info.event.extendedProps.sched_id);
                $('#edit_brgy').val(info.event.extendedProps.brgy_id);
                $('#edit_dt').val(info.event.extendedProps.dumptruck_id);
                $('#edit_driver').val(info.event.extendedProps.driver_id);
                $('#edit_date').val(info.event.startStr.split('T')[0]);
                $('#edit_time').val(info.event.startStr.split('T')[1].substring(0, 5));

                // Show the edit modal
                var editScheduleModal = new bootstrap.Modal($('#editScheduleModal')[0], {
                    keyboard: false
                });
                editScheduleModal.show();
            },
            eventDidMount: function(info) {
                // Add pointer style when hovering over events
                info.el.style.cursor = 'pointer';

                // Set the tooltip content using the event title or other extended properties
                var tooltipContent = 'Barangay: ' + info.event.extendedProps.brgy_name + 
                                    ', Dump Truck: ' + info.event.extendedProps.dumptruck;

                // Set tooltip attributes
                $(info.el).attr('title', tooltipContent);
                $(info.el).tooltip({
                    placement: 'right', // Tooltip will appear above the event
                    trigger: 'hover', // Show tooltip on hover
                    container: 'body' // Append tooltip to the body to avoid CSS issues
                });
            },
            dayCellDidMount: function(info) {
                // Add pointer style when hovering over calendar days
                info.el.style.cursor = 'pointer';

                // Create a new date object without time for comparison
                var calendarDate = new Date(info.date);
                calendarDate.setHours(0, 0, 0, 0); // Clear the time part (set to midnight)

                var currentDate = new Date();
                currentDate.setHours(0, 0, 0, 0); // Clear the time part (set to midnight)

                // Check if the day is before today (past date)
                if (calendarDate < currentDate) {
                    // Add a tooltip for past dates
                    $(info.el).attr('title', 'This date is cannot be selected. Please select another date.');
                    $(info.el).tooltip({
                        placement: 'top', // Tooltip will appear above the day cell
                        trigger: 'hover', // Show tooltip on hover
                        container: 'body' // Append tooltip to the body
                    });

                    // Optionally, add a visual indication (e.g., grayed-out past dates)
                    info.el.style.backgroundColor = '#f0f0f0'; // Light gray background
                    info.el.style.color = '#01A94D'; // Gray text for past dates
                }
            }
        });

        calendar.render();

        function fetchColsched() {
            $.ajax({
                url: "{{ route('cs.index') }}", // Your route for fetching barangays
                type: "GET",
                success: function (response) {
                    let rows = '';
                    let counter = 1;
                    $.each(response.collectionSchedules, function (key, colsched) {

                        if (colsched.status == 'pending' || 'finished' || 'ongoing') { 

                            let status = colsched.status;

                            if (status == 'Finished') {
                                status = `<span class="badge text-success">
                                    <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="currentColor"  class="icon icon-tabler icons-tabler-filled icon-tabler-circle-check"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M17 3.34a10 10 0 1 1 -14.995 8.984l-.005 -.324l.005 -.324a10 10 0 0 1 14.995 -8.336zm-1.293 5.953a1 1 0 0 0 -1.32 -.083l-.094 .083l-3.293 3.292l-1.293 -1.292l-.094 -.083a1 1 0 0 0 -1.403 1.403l.083 .094l2 2l.094 .083a1 1 0 0 0 1.226 0l.094 -.083l4 -4l.083 -.094a1 1 0 0 0 -.083 -1.32z" /></svg>
                                    Finished
                                </span>`;
                            } else if (status == 'Ongoing') {
                                status = `<span class="badge text-secondary">
                                            <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-refresh"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M20 11a8.1 8.1 0 0 0 -15.5 -2m-.5 -4v4h4" /><path d="M4 13a8.1 8.1 0 0 0 15.5 2m.5 4v-4h-4" /></svg>
                                            Ongoing
                                        </span>`
                            } else {
                                status = `<span class="badge text-warning">
                                            <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="currentColor"  class="icon icon-tabler icons-tabler-filled icon-tabler-square-rounded-minus"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 2l.324 .001l.318 .004l.616 .017l.299 .013l.579 .034l.553 .046c4.785 .464 6.732 2.411 7.196 7.196l.046 .553l.034 .579c.005 .098 .01 .198 .013 .299l.017 .616l.005 .642l-.005 .642l-.017 .616l-.013 .299l-.034 .579l-.046 .553c-.464 4.785 -2.411 6.732 -7.196 7.196l-.553 .046l-.579 .034c-.098 .005 -.198 .01 -.299 .013l-.616 .017l-.642 .005l-.642 -.005l-.616 -.017l-.299 -.013l-.579 -.034l-.553 -.046c-4.785 -.464 -6.732 -2.411 -7.196 -7.196l-.046 -.553l-.034 -.579a28.058 28.058 0 0 1 -.013 -.299l-.017 -.616c-.003 -.21 -.005 -.424 -.005 -.642l.001 -.324l.004 -.318l.017 -.616l.013 -.299l.034 -.579l.046 -.553c.464 -4.785 2.411 -6.732 7.196 -7.196l.553 -.046l.579 -.034c.098 -.005 .198 -.01 .299 -.013l.616 -.017c.21 -.003 .424 -.005 .642 -.005zm3 9h-6l-.117 .007a1 1 0 0 0 .117 1.993h6l.117 -.007a1 1 0 0 0 -.117 -1.993z" /></svg>
                                            Pending
                                        </span>`
                            }

                            rows += `
                                <tr>
                                    <td>${counter}</td>
                                    <td>${colsched.barangay.name}</td>
                                    <td>${colsched.dumptruck.brand} ${colsched.dumptruck.model}</td>
                                    <td>${colsched.driver.fullname}</td>
                                    <td>${colsched.scheduled_date} ${colsched.scheduled_time}</td>
                                    <td>${status}</td>
                                </tr>`;
                            counter++;
                        }
                    });

                    let dataTable = $('#col-sched-tbl').DataTable();
                    dataTable.clear(); // Clear the existing table data
                    dataTable.destroy();

                    $('#col-sched-tbl tbody').html(rows);

                    let table = $('#col-sched-tbl').DataTable({
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
                                title: 'Collection Schedule List',
                            },
                            { 
                                extend: 'excel', 
                                text: 'Excel',
                                title: 'Collection Schedule List',
                            },
                            { 
                                extend: 'pdf', 
                                text: 'PDF',
                                title: 'Collection Schedule List',
                            },
                            { 
                                extend: 'print', 
                                text: 'Print',
                                title: 'Collection Schedule List',
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

        // fetchColsched();

        $('#scheduleForm').on('submit', function (e) {
            e.preventDefault();

            $('#saveChangesBtn').attr('disabled', true); 
            $('#saveChangesSpinner').removeClass('d-none');

            let formData = {
                brgy_id: $('#add_brgy').val(),
                dumptruck_id: $('#add_dt').val(),
                user_id: $('#add_driver').val(),
                scheduled_date: $('#add_date').val(),
                scheduled_time: $('#add_time').val(),
            };

            $.ajax({
                url: "{{ route('cs.store') }}", // Route for storing barangay
                type: "POST",
                data: formData,
                success: function (response) {
                    calendar.refetchEvents();
                    fetchColsched();

                    $('#toastMessage').text(response.message);

                    // Trigger Bootstrap toast instead of SweetAlert
                    var toastEl = new bootstrap.Toast(document.getElementById('userSuccessToast'));
                    toastEl.show(); // Show the toast

                    $('#scheduleForm')[0].reset();
                    $('#addScheduleModal').modal('hide');
                    
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
                    $('#saveChangesBtn').attr('disabled', false);
                    $('#saveChangesSpinner').addClass('d-none'); // Hide spinner
                }
            });
        });

        let originalValues = {};
 
        function storeOriginalValues() {
            originalValues = {
                brgy_id: $('#edit_brgy').val(),
                dumptruck_id: $('#edit_dt').val(),
                user_id: $('#edit_driver').val(),
                scheduled_date: $('#edit_date').val(),
                scheduled_time: $('#edit_time').val(),
            };
        }

        $('#editScheduleModal').on('shown.bs.modal', function () {
            storeOriginalValues(); // Store values when the modal is shown
        });
        
        $('#editscheduleForm').on('submit', function (e) {
            e.preventDefault();
            let id = $('#edit_sched_id').val();

            // Check for changes
            const currentValues = {
                brgy_id: $('#edit_brgy').val(),
                dumptruck_id: $('#edit_dt').val(),
                user_id: $('#edit_driver').val(),
                scheduled_date: $('#edit_date').val(),
                scheduled_time: $('#edit_time').val(),
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
                brgy_id: $('#edit_brgy').val(),
                dumptruck_id: $('#edit_dt').val(),
                user_id: $('#edit_driver').val(),
                scheduled_date: $('#edit_date').val(),
                scheduled_time: $('#edit_time').val(),
            };

            $('#editsaveChangesBtn').attr('disabled', true); 
            $('#editsaveChangesSpinner').removeClass('d-none');

            $.ajax({
                url: `/admin/collection-schedule/${id}/update`,
                type: "PUT",
                data: formData,
                success: function (response) {
                    calendar.refetchEvents();
                    fetchColsched();

                    $('#toastMessage').text(response.message);

                    // Trigger Bootstrap toast instead of SweetAlert
                    var toastEl = new bootstrap.Toast(document.getElementById('userSuccessToast'));
                    toastEl.show();

                    $('#editscheduleForm')[0].reset();
                    $('#editScheduleModal').modal('hide'); // Hide modal

                },
                error: function (error) {
                    console.log("Error updating schedule: ", error);
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