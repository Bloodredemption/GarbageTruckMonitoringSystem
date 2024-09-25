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
                                <h1><strong>Notification Records</strong></h1>
                                <p>Contains notification information that you want to disseminate.</p>
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
                                    <h4 class="card-title">Notifications List</h4>
                                    {{-- <p class="mb-0">Sub Title Here</p>           --}}
                                </div>
                                
                                <div>
                                    <a href="#" class=" text-center btn btn-primary btn-icon mt-lg-0 mt-md-0 mt-3" data-bs-toggle="offcanvas" data-bs-target="#offcanvasAddNotif" aria-controls="offcanvasAddNotif">
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
                                    <table id="notification-tbl" class="table" role="grid" data-bs-toggle="data-table">
                                        <thead>
                                            <tr class="ligth" style="background-color: #01A94D; color: white;">
                                                <th>No.</th>
                                                <th>Message</th>
                                                <th>Recipient</th>
                                                <th>Status</th>
                                                <th style="min-width: 100px">Operation</th>
                                                <th style="min-width: 100px">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            {{-- Data will be displayed Here --}}
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
    
    <!-- Offcanvas for Adding New Notification -->
    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasAddNotif" aria-labelledby="offcanvasRightLabel">
        <div class="offcanvas-header" style="padding-bottom: 0;">
            <div>
                <h5 id="offcanvasRightLabel">Add New Notification</h5>
                <p style="font-size: 15px;">Please fill all the required fields <span style="color: red;">*</span></p>
            </div>
            {{-- <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button> --}}
        </div>
        <div class="offcanvas-body">
            <form id="addNotifForm" action="{{ route('barangays.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="add_msg" class="form-label">Message <span style="color: red;">*</span></label>
                    <textarea class="form-control" id="add_msg" name="msg" rows="4" cols="50" required></textarea>
                </div>
                <div class="mb-3">
                    <label for="add_recipient" class="form-label">Recipient <span style="color: red;">*</span></label>
                    <select class="form-control" id="add_recipient" name="recipient" required>
                        <option></option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary mb-3">Create</button>
                <button type="button" class="btn btn-light text-reset mb-3" data-bs-dismiss="offcanvas" aria-label="Close">Cancel</button>
            </form>
        </div>
    </div>

    <!-- Offcanvas for Editing Notification -->
    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasEditNotif" aria-labelledby="offcanvasEditLabel">
        <div class="offcanvas-header" style="padding-bottom: 0;">
            <div>
                <h5 id="offcanvasEditLabel">Edit Notification</h5>
                <p style="font-size: 15px;">Please fill all the required fields <span style="color: red;">*</span></p>
            </div>
            {{-- <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button> --}}
        </div>
        <div class="offcanvas-body">
            <form id="editNotifForm" method="POST">
                @csrf
                <input type="hidden" id="edit_notif_id" name="notif_id">

                <div class="mb-3">
                    <label for="edit_msg" class="form-label">Message <span style="color: red;">*</span></label>
                    <textarea class="form-control" id="edit_msg" name="msg" rows="4" cols="50" required></textarea>
                </div>
                <div class="mb-3">
                    <label for="edit_recipient" class="form-label">Recipient <span style="color: red;">*</span></label>
                    <select class="form-control" id="edit_recipient" name="recipient" required>
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
        function fetchDrivers() {
            $.ajax({
                url: "{{ route('notifications.getDrivers') }}", // Your route for fetching drivers
                type: "GET",
                success: function (response) {
                    let driverSelect1 = $('#add_recipient'); // First driver select
                    let driverSelect2 = $('#edit_recipient'); // Second driver select (new)

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
        
        // Fetch barangays and display in the table
        function fetchNotifications() {
            $.ajax({
                url: "{{ route('notifications.index') }}", // Your route for fetching barangays
                type: "GET",
                success: function (response) {
                    let rows = '';
                    let counter = 1;
                    $.each(response.notifications, function (key, notification) {
                        if (notification.status !== 'deleted') {
                            let fullname = notification.user.fullname.trim().split(" ");
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
                                    <td>${notification.notification_msg}</td>
                                    <td>${firstname} ${lastname}</td>
                                    <td>
                                        ${notification.status == 'pending' ? '<span class="badge bg-warning">Pending</span>' : 
                                        notification.status == 'sent' ? '<span class="badge bg-primary">Sent</span>' : 
                                        notification.status == 'read' ? '<span class="badge bg-success">Read</span>' : 
                                        '<span class="badge bg-secondary">Unknown</span>'}
                                    </td>
                                    <td>
                                        <div class="flex align-items-center list-user-action">
                                            <a class="btn btn-sm btn-icon btn-warning edit-notif-btn" data-id="${notification.id}">Edit</a>
                                            <a class="btn btn-sm btn-icon btn-danger delete-notif-btn" data-id="${notification.id}">Delete</a>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="flex align-items-center list-user-action">
                                            <a class="send-notif-btn text-center btn btn-primary btn-icon mt-lg-0 mt-md-0 mt-3" data-id="${notification.id}">
                                                <span>Send</span>
                                            </a>
                                        </div>
                                    </td>
                                </tr>`;
                            counter++;
                        }
                    });

                    let dataTable = $('#notification-tbl').DataTable();
                    dataTable.clear(); // Clear the existing table data
                    dataTable.destroy();

                    $('#notification-tbl tbody').html(rows);

                    $('#notification-tbl').DataTable({
                        retrieve: true, // Retrieve the existing table instead of initializing it again
                        paging: true, // Enable pagination
                        searching: true, // Enable search functionality
                        info: true, // Show the number of entries info
                        responsive: true, // Ensure responsiveness
                    });
                },
                error: function (error) {
                    console.log("Error fetching data: ", error);
                }
            });
        }

        fetchNotifications();

        // Add Notification
        $('#addNotifForm').on('submit', function (e) {
            e.preventDefault();

            let formData = {
                _token: "{{ csrf_token() }}", // Laravel CSRF token
                notification_msg: $('#add_msg').val(),
                user_id: $('#add_recipient').val(),
            };

            $.ajax({
                url: "{{ route('notifications.store') }}", // Route for storing barangay
                type: "POST",
                data: formData,
                success: function (response) {
                    fetchNotifications();

                    Swal.fire({
                        icon: 'success',
                        title: 'Notifications Added!',
                        text: response.message,
                        confirmButtonText: 'OK',
                        confirmButtonColor: "#01A94D"
                    }).then(() => {
                        $('#addNotifForm')[0].reset();
                        
                        $('#offcanvasAddNotif').offcanvas('hide');
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

        // Edit Notification
        $('#notification-tbl').on('click', '.edit-notif-btn', function () {
            let id = $(this).data('id');

            $.ajax({
                url: `/admin/notifications/${id}/edit`,
                type: "GET",
                success: function (response) {
                    let notification = response.notification;
                    $('#edit_msg').val(notification.notification_msg);
                    $('#edit_recipient').val(notification.user_id);
                    $('#edit_notif_id').val(notification.id);

                    $('#offcanvasEditNotif').offcanvas('show');
                },
                error: function (error) {
                    console.log("Error fetching notification: ", error);
                }
            });
        });
        
        let originalValues = {};

        function storeOriginalValues() {
            originalValues = {
                notification_msg: $('#edit_msg').val(),
                user_id: $('#edit_recipient').val(),
            };
        }

        // Call this function when the form is displayed
        $('#offcanvasEditNotif').on('shown.bs.offcanvas', function () {
            storeOriginalValues(); // Store values when the offcanvas is shown
        });

        $('#editNotifForm').on('submit', function (e) {
            e.preventDefault();
            let id = $('#edit_notif_id').val();

            // Check for changes
            const currentValues = {
                notification_msg: $('#edit_msg').val(),
                user_id: $('#edit_recipient').val(),
            };

            const hasChanges = Object.keys(originalValues).some(key => originalValues[key] !== currentValues[key]);

            if (!hasChanges) {
                // No changes made
                Swal.fire({
                    icon: 'info',
                    title: 'No Changes Made!',
                    text: 'You have not made any changes to the nofication details.',
                    confirmButtonText: 'OK',
                    confirmButtonColor: '#007bff'
                });
                return; // Exit the function
            }

            let formData = {
                _token: "{{ csrf_token() }}", // Laravel CSRF token
                notification_msg: $('#edit_msg').val(),
                user_id: $('#edit_recipient').val(),
            };

            $.ajax({
                url: `/admin/notifications/${id}/update`,
                type: "PUT",
                data: formData,
                success: function (response) {
                    fetchNotifications();

                    Swal.fire({
                        icon: 'success',
                        title: 'Notification Updated!',
                        text: response.message,
                        confirmButtonText: 'OK',
                        confirmButtonColor: "#01A94D"
                    }).then(() => {
                        $('#offcanvasEditNotif').offcanvas('hide');
                    });
                },
                error: function (error) {
                    console.log("Error updating notification: ", error);
                    Swal.fire({
                        icon: 'error',
                        title: 'Update Failed!',
                        text: 'An error occurred while updating the notification. Please try again.',
                        confirmButtonText: 'OK',
                        confirmButtonColor: '#d33'
                    });
                }
            });
        });

        // Delete Notification
        $(document).on('click', '.delete-notif-btn', function () {
            let id = $(this).data('id');

            Swal.fire({
                title: 'Delete Notification?',
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
                        url: `/admin/notifications/${id}/delete`,
                        type: "DELETE",
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function (response) {
                            fetchNotifications();

                            Swal.fire({
                                icon: 'success',
                                title: 'Notification Deleted!',
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

        // Send Notification
        $(document).on('click', '.send-notif-btn', function () {
            let id = $(this).data('id');

            Swal.fire({
                title: 'Send Notification?',
                text: "This action is irreversible.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Confirm',
                cancelButtonText: 'Cancel',
                confirmButtonColor: '#01A94D',
                cancelButtonColor: '#6c757d',
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: `/admin/notifications/${id}/send`,  // Updated to match your route
                        type: "GET",  // Changed to GET to match your route
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function (response) {
                            // Refresh notifications or perform any UI updates
                            fetchNotifications();  // Assuming this refreshes notifications

                            Swal.fire({
                                icon: 'success',
                                title: 'Notification Sent!',
                                text: response.message,
                                confirmButtonText: 'OK',
                                confirmButtonColor: "#01A94D"
                            }).then(() => {
                                // Any additional logic after success
                                // fetchDumpTrucks();  // Uncomment if needed
                            });
                        },
                        error: function (error) {
                            Swal.fire({
                                icon: 'error',
                                title: 'Error!',
                                text: 'Failed to send notification.',
                                confirmButtonText: 'OK',
                                confirmButtonColor: "#d33"
                            });
                            console.log("Error sending data: ", error);
                        }
                    });
                }
            });
        });

    });
</script>

@endsection