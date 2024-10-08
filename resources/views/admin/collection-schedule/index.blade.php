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
                                <p>Contains collection schedule.</p>
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
                                    <h4 class="card-title">Collection Schedule</h4>
                                </div>
                                
                                <div>
                                    <a href="#" class=" text-center btn btn-primary btn-icon mt-lg-0 mt-md-0 mt-3" data-bs-toggle="modal" data-bs-target="#addScheduleModal">
                                        <i class="btn-inner">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                            </svg>
                                        </i>
                                        <span>Add New</span>
                                    </a>
                                </div>
                            </div>

                            <div class="card-body">
                                <div id="calendar" class="calendar-s"></div>
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
                            <label for="add_brgy" class="form-label">Location <span style="color: red;">*</span></label>
                            <select class="form-control" id="add_brgy" name="brgy" required>
                                <option value="">Select Barangay</option>
                                <!-- Options will be populated via AJAX -->
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="add_dt" class="form-label">Dump Truck <span style="color: red;">*</span></label>
                            <select class="form-control" id="add_dt" name="dt" required>
                                <option value="">Select Dump Truck</option>
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
                    <button type="submit" form="scheduleForm" class="btn btn-primary">Save changes</button>
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
                                <option value=""></option>
                                <!-- Options will be populated via AJAX -->
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="edit_dt" class="form-label">Dump Truck <span style="color: red;">*</span></label>
                            <select class="form-control" id="edit_dt" name="dt" required>
                                <option value=""></option>
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
                    <button type="submit" form="editscheduleForm" class="btn btn-primary">Save changes</button>
                </div>
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
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            }
        });
        
        function fetchBrgy() {
            $.ajax({
                url: "{{ route('cs.getBrgy') }}", // Your route for fetching drivers
                type: "GET",
                success: function (response) {
                    let brgySelect1 = $('#add_brgy'); // First driver select
                    let brgySelect2 = $('#edit_brgy'); // First driver select
                    // let driverSelect2 = $('#edit_driver'); // Second driver select (new)

                    // Clear the select options for both select elements
                    brgySelect1.empty();
                    brgySelect2.empty();
                    // driverSelect2.empty();

                    // Add default options for both selects
                    brgySelect1.append('<option></option>');
                    brgySelect2.append('<option></option>');
                    // driverSelect2.append('<option></option>');

                    // Populate both selects with the drivers
                    $.each(response.brgy, function (key, brgy) {
                        brgySelect1.append(`<option value="${brgy.id}">${brgy.name} | ${brgy.area}</option>`);
                        brgySelect2.append(`<option value="${brgy.id}">${brgy.name} | ${brgy.area}</option>`);
                        // driverSelect2.append(`<option value="${driver.id}">${driver.fullname}</option>`);
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
                    // let driverSelect2 = $('#edit_driver'); // Second driver select (new)

                    // Clear the select options for both select elements
                    dtSelect1.empty();
                    dtSelect2.empty();
                    // driverSelect2.empty();

                    // Add default options for both selects
                    dtSelect1.append('<option></option>');
                    dtSelect2.append('<option></option>');
                    // driverSelect2.append('<option></option>');

                    // Populate both selects with the drivers
                    $.each(response.dt, function (key, dt) {
                        dtSelect1.append(`<option value="${dt.id}">${dt.brand} ${dt.model} | ${dt.user.fullname}</option>`);
                        dtSelect2.append(`<option value="${dt.id}">${dt.brand} ${dt.model} | ${dt.user.fullname}</option>`);
                        // driverSelect2.append(`<option value="${driver.id}">${driver.fullname}</option>`);
                    });
                },
                error: function (error) {
                    console.log("Error fetching dt: ", error);
                }
            });
        }

        // Call the fetch function when the page loads
        fetchDumptruck();

        // Get the calendar element using jQuery
        var calendarEl = document.getElementById('calendar');

        // Initialize the FullCalendar with AJAX
        var calendar = new FullCalendar.Calendar(calendarEl, {
            themeSystem: 'bootstrap5',
            initialView: 'dayGridMonth', // Set the default view to Month

            dayMaxEvents: 3,
            contentHeight: "auto",

            headerToolbar: {
                left: 'prev,next today',
                center: 'title',
                right: 'dayGridMonth,timeGridWeek,timeGridDay,listMonth' // Show Month, Week, Day, and List view
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
                // For week and day views, capture both date and time
                if (info.view.type === 'timeGridWeek' || info.view.type === 'timeGridDay') {
                    // Extract date and time from info.start
                    const date = info.startStr.split('T')[0]; // Extract date part
                    const time = info.startStr.split('T')[1].substring(0, 5); // Extract time part (HH:MM)

                    // Set the date and time in the modal input fields using jQuery
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
                                    ', Dump Truck: ' + info.event.extendedProps.dumptruck +
                                    ', Driver: ' + info.event.extendedProps.driver_name;

                // Set tooltip attributes
                $(info.el).attr('title', tooltipContent);
                $(info.el).tooltip({
                    placement: 'top', // Tooltip will appear above the event
                    trigger: 'hover', // Show tooltip on hover
                    container: 'body' // Append tooltip to the body to avoid CSS issues
                });
            },
            dayCellDidMount: function(info) {
                // Add pointer style when hovering over calendar days
                info.el.style.cursor = 'pointer';
            }

        });

        calendar.render();

        $('#scheduleForm').on('submit', function (e) {
            e.preventDefault();

            let formData = {
                brgy_id: $('#add_brgy').val(),
                dumptruck_id: $('#add_dt').val(),
                scheduled_date: $('#add_date').val(),
                scheduled_time: $('#add_time').val(),
            };

            $.ajax({
                url: "{{ route('cs.store') }}", // Route for storing barangay
                type: "POST",
                data: formData,
                success: function (response) {

                    Swal.fire({
                        icon: 'success',
                        title: 'Collection Schedule Added!',
                        text: response.message,
                        confirmButtonText: 'OK',
                        confirmButtonColor: "#01A94D"
                    }).then(() => {
                        $('#scheduleForm')[0].reset();

                        var addScheduleModalEl = document.getElementById('addScheduleModal');
                        var addScheduleModal = bootstrap.Modal.getInstance(addScheduleModalEl);
                        addScheduleModal.hide();

                        calendar.refetchEvents();
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

        let originalValues = {};

        function storeOriginalValues() {
            originalValues = {
                brgy_id: $('#edit_brgy').val(),
                dumptruck_id: $('#edit_dt').val(),
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
                scheduled_date: $('#edit_date').val(),
                scheduled_time: $('#edit_time').val(),
            };

            $.ajax({
                url: `/admin/collection-schedule/${id}/update`,
                type: "PUT",
                data: formData,
                success: function (response) {

                    Swal.fire({
                        icon: 'success',
                        title: 'Collection Schedule Updated!',
                        text: response.message,
                        confirmButtonText: 'OK',
                        confirmButtonColor: "#01A94D"
                    }).then(() => {

                        $('#editscheduleForm')[0].reset();

                        var editScheduleModalEl = document.getElementById('editScheduleModal');
                        var editScheduleModal = bootstrap.Modal.getInstance(editScheduleModalEl);
                        editScheduleModal.hide();

                        calendar.refetchEvents();

                    });
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