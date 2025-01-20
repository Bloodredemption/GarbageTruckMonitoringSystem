@extends('dd-layout')

<header class="sticky-header d-flex justify-content-between align-items-center p-3 position-relative">
    <!-- Back Button -->
    <a href="javascript:void(0);" onclick="goBack()" class="text-decoration-none position-absolute" style="left: 1rem;">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#01A94D" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-arrow-left">
            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
            <path d="M5 12l14 0"/>
            <path d="M5 12l6 6"/>
            <path d="M5 12l6 -6"/>
        </svg>
    </a>

    <!-- Title -->
    <span class="fw-bold flex-grow-1 text-center" style="font-size: 1.2rem;">Notifications</span>

    {{-- <div class="position-absolute" style="right: 1rem;">
        <a class="text-decoration-none text-primary" style="font-size: 0.9rem;" href="#" id="markAllAsRead">
            Mark all as Read
        </a>
    </div> --}}
</header>

@section('main-content')

<main class="main-content">

    <div class="container" style="padding-top: 5px;">
        <!-- Tabs Navigation -->
        <ul class="nav nav-tabs mb-3" id="notificationTabs" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="all-tab" data-bs-toggle="tab" data-bs-target="#all" type="button" role="tab" aria-controls="all" aria-selected="true">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="currentColor" class="icon icon-tabler icons-tabler-filled icon-tabler-layout-list">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M18 3a3 3 0 0 1 3 3v2a3 3 0 0 1 -3 3h-12a3 3 0 0 1 -3 -3v-2a3 3 0 0 1 3 -3z" />
                        <path d="M18 13a3 3 0 0 1 3 3v2a3 3 0 0 1 -3 3h-12a3 3 0 0 1 -3 -3v-2a3 3 0 0 1 3 -3z" />
                    </svg>
                    All
                </button>
            </li>
            {{-- <li class="nav-item" role="presentation">
                <button class="nav-link" id="unread-tab" data-bs-toggle="tab" data-bs-target="#unread" type="button" role="tab" aria-controls="unread" aria-selected="false">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="currentColor" class="icon icon-tabler icons-tabler-filled icon-tabler-mail">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M22 7.535v9.465a3 3 0 0 1 -2.824 2.995l-.176 .005h-14a3 3 0 0 1 -2.995 -2.824l-.005 -.176v-9.465l9.445 6.297l.116 .066a1 1 0 0 0 .878 0l.116 -.066l9.445 -6.297z" />
                        <path d="M19 4c1.08 0 2.027 .57 2.555 1.427l-9.555 6.37l-9.555 -6.37a2.999 2.999 0 0 1 2.354 -1.42l.201 -.007h14z" />
                    </svg>
                    Pending
                </button>
            </li> --}}
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="completed-tab" data-bs-toggle="tab" data-bs-target="#completed" type="button" role="tab" aria-controls="completed" aria-selected="false">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="currentColor" class="icon icon-tabler icons-tabler-filled icon-tabler-circle-check">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M17 3.34a10 10 0 1 1 -14.995 8.984l-.005 -.324l.005 -.324a10 10 0 0 1 14.995 -8.336zm-1.293 5.953a1 1 0 0 0 -1.32 -.083l-.094 .083l-3.293 3.292l-1.293 -1.292l-.094 -.083a1 1 0 0 0 -1.403 1.403l.083 .094l2 2l.094 .083a1 1 0 0 0 1.226 0l.094 -.083l4 -4l.083 -.094a1 1 0 0 0 -.083 -1.32z" />
                    </svg>
                    Completed
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="rejected-tab" data-bs-toggle="tab" data-bs-target="#rejected" type="button" role="tab" aria-controls="rejected" aria-selected="false">
                    <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="currentColor"  class="icon icon-tabler icons-tabler-filled icon-tabler-circle-x">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                        <path d="M17 3.34a10 10 0 1 1 -14.995 8.984l-.005 -.324l.005 -.324a10 10 0 0 1 14.995 -8.336zm-6.489 5.8a1 1 0 0 0 -1.218 1.567l1.292 1.293l-1.292 1.293l-.083 .094a1 1 0 0 0 1.497 1.32l1.293 -1.292l1.293 1.292l.094 .083a1 1 0 0 0 1.32 -1.497l-1.292 -1.293l1.292 -1.293l.083 -.094a1 1 0 0 0 -1.497 -1.32l-1.293 1.292l-1.293 -1.292l-.094 -.083z" />
                    </svg>
                    Rejected
                </button>
            </li>
            
        </ul>
    
        <!-- Tabs Content -->
        <div class="tab-content mt-3" id="notificationTabsContent">
            <!-- Unread Tab -->
            {{-- <div class="tab-pane fade" id="unread" role="tabpanel" aria-labelledby="unread-tab">
                <div class="container mt-3">
                    <h1>Unread</h1>
                </div>
            </div> --}}

            <!-- All Tab -->
            <div class="tab-pane fade show active" id="all" role="tabpanel" aria-labelledby="all-tab">
                <div class="container mt-3">
                    @forelse ($notifications as $notif)
                        <div class="card shadow-sm border-1 mb-3" style="border-radius: 10px;">
                            <div class="card-body justify-content-between">
                                <div class="d-flex gap-3">
                                    <div class="mt-1">
                                        <img src="{{ asset('assets/images/bali_logo.png')}}" alt="Notification Image" class="rounded-circle mb-3" style="width: 40px;">
                                    </div>
                                    <div class="w-100">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <h6 class="mb-0 fw-bold">
                                                System Message
                                            </h6>
                                            <div class="align-items-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-clock">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                                    <path d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0" />
                                                    <path d="M12 7v5l3 3" />
                                                </svg>
                                                <span class="text-muted small">
                                                    {{ $notif->time_ago }}
                                                </span>
                                                {{-- @if($notif->status == 'sent')
                                                    <span class="notification-status" data-id="{{ $notif->notification_msg }}">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="#01A94D" class="icon icon-tabler icons-tabler-filled icon-tabler-point">
                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                                            <path d="M12 7a5 5 0 1 1 -4.995 5.217l-.005 -.217l.005 -.217a5 5 0 0 1 4.995 -4.783z"/>
                                                        </svg>
                                                    </span>
                                                @endif --}}
                                            </div>
                                        </div>
                                        <div>
                                            <p class="mt-2 mb-0">
                                                Complaint forwarded by {{ $notif->user->fullname }}.
                                            </p>
            
                                            <span class="fw-bold">Status:</span> 
                                            <span class="fw-semibold 
                                                @if($notif->residents_concern_status == 'Rejected') text-danger 
                                                @elseif($notif->residents_concern_status == 'Completed') text-primary 
                                                @elseif($notif->residents_concern_status == 'Pending') text-warning 
                                                @endif">
                                                {{ $notif->residents_concern_status }}
                                            </span>
                                        </div>
                                        <div class="mt-3 mb-1 d-flex justify-content-between align-items-center gap-2">
                                            <button class="btn btn-secondary btn-sm w-100 showDetails" data-id="{{ $notif->notification_msg }}">View Details</button>
                                            @if($notif->residents_concern_status == 'Pending')
                                                <button class="btn btn-danger btn-sm w-100 rejectComplaint" data-id="{{ $notif->notification_msg }}" data-bs-toggle="modal" data-bs-target="#rejectModal">Reject</button>
                                                <button class="btn btn-primary btn-sm w-100 completeComplaint" data-id="{{ $notif->notification_msg }}">Complete</button>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="d-flex flex-column align-items-center justify-content-center" style="height: 80vh;">
                            <div class="d-flex flex-column align-items-center justify-content-center p-4" style="height: 80vh;">
                                <img src="{{ asset('assets/images/no-data.svg')}}" class="img-fluid mb-4" width="75%" alt="No Data Found">
                                <h3 class="fw-bold">No notifications found</h3>
                                <p style="color: #525356; font-size: 15px;">All of your notifications will be displayed here</p>
                            </div>
                        </div>
                    @endforelse
                </div>
            </div>
            
            <!-- Completed Tab -->
            <div class="tab-pane fade" id="completed" role="tabpanel" aria-labelledby="completed-tab">
                <div class="container mt-3">
                    @forelse ($notifications->where('residents_concern_status', 'Completed') as $notif)
                        <div class="card shadow-sm border-1 mb-3" style="border-radius: 10px;">
                            <div class="card-body justify-content-between">
                                <div class="d-flex gap-3">
                                    <div class="mt-1">
                                        <img src="{{ asset('assets/images/bali_logo.png')}}" alt="Notification Image" class="rounded-circle mb-3" style="width: 40px;">
                                    </div>
                                    <div class="w-100">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <h6 class="mb-0 fw-bold">
                                                System Message
                                            </h6>
                                            <div class="align-items-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-clock">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                                    <path d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0" />
                                                    <path d="M12 7v5l3 3" />
                                                </svg>
                                                <span class="text-muted small">
                                                    {{ $notif->time_ago }}
                                                </span>
                                            </div>
                                        </div>
                                        <div>
                                            <p class="mt-2 mb-0">
                                                Complaint forwarded by {{ $notif->user->fullname }}.
                                            </p>
            
                                            <b>Status:</b> 
                                            <span class="fw-bold text-primary">
                                                {{ $notif->residents_concern_status }}
                                            </span>
                                        </div>
                                        <div class="mt-3 mb-1 d-flex justify-content-between align-items-center gap-2">
                                            <button class="btn btn-secondary btn-sm w-100 showDetails" data-id="{{ $notif->notification_msg }}">View Details</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="d-flex flex-column align-items-center justify-content-center" style="height: 80vh;">
                            <div class="d-flex flex-column align-items-center justify-content-center p-4" style="height: 80vh;">
                                <img src="{{ asset('assets/images/no-data.svg')}}" class="img-fluid mb-4" width="75%" alt="No Data Found">
                                <h3 class="fw-bold">No notifications found</h3>
                                <p style="color: #525356; font-size: 15px;">All of your notifications will be displayed here</p>
                            </div>
                        </div>
                    @endforelse
                </div>
            </div>
            
            <!-- Rejected Tab -->
            <div class="tab-pane fade" id="rejected" role="tabpanel" aria-labelledby="rejected-tab">
                <div class="container mt-3">
                    @forelse ($notifications->where('residents_concern_status', 'Rejected') as $notif)
                        <div class="card shadow-sm border-1 mb-3" style="border-radius: 10px;">
                            <div class="card-body justify-content-between">
                                <div class="d-flex gap-3">
                                    <div class="mt-1">
                                        <img src="{{ asset('assets/images/bali_logo.png')}}" alt="Notification Image" class="rounded-circle mb-3" style="width: 40px;">
                                    </div>
                                    <div class="w-100">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <h6 class="mb-0 fw-bold">
                                                System Message
                                            </h6>
                                            <div class="align-items-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-clock">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                                    <path d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0" />
                                                    <path d="M12 7v5l3 3" />
                                                </svg>
                                                <span class="text-muted small">
                                                    {{ $notif->time_ago }}
                                                </span>
                                            </div>
                                        </div>
                                        <div>
                                            <p class="mt-2 mb-0">
                                                Complaint forwarded by {{ $notif->user->fullname }}.
                                            </p>
            
                                            <b>Status:</b> 
                                            <span class="fw-bold text-danger">
                                                {{ $notif->residents_concern_status }}
                                            </span>
                                        </div>
                                        <div class="mt-3 mb-1 d-flex justify-content-between align-items-center gap-2">
                                            <button class="btn btn-secondary btn-sm w-100 showDetails" data-id="{{ $notif->notification_msg }}">View Details</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="d-flex flex-column align-items-center justify-content-center" style="height: 80vh;">
                            <div class="d-flex flex-column align-items-center justify-content-center p-4" style="height: 80vh;">
                                <img src="{{ asset('assets/images/no-data.svg')}}" class="img-fluid mb-4" width="75%" alt="No Data Found">
                                <h3 class="fw-bold">No notifications found</h3>
                                <p style="color: #525356; font-size: 15px;">All of your notifications will be displayed here</p>
                            </div>
                        </div>
                    @endforelse
                </div>
            </div>

        </div>
    </div>
    
</main>

<div class="modal fade" id="viewDetailsModal" tabindex="-1" aria-labelledby="viewDetailsModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="viewDetailsModalLabel">Complaint No. <span id="complaintNum"></span></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Content for the details goes here -->
                <b>Address:</b> <span id="addressValue"></span><br>
                <b>Description:</b> <span id="descValue"></span><br>
                <b>Date Reported:</b> <span id="dateValue"></span><br>
                {{-- <b>Status:</b> <span class="fw-bold text-warning" id="statusValue"></span><br> --}}
                <b>Remarks:</b> <span class="text-muted" id="remarksValue"></span>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="rejectModal" tabindex="-1" aria-labelledby="rejectModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="rejectModalLabel">Reject Complaint</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="rejectComplaintForm" method="post">
                    <div class="mb-3">
                        <label for="reasonInput" class="form-label">Reason</label>
                        <input type="text" class="form-control" id="reasonInput" placeholder="Enter reason" required>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" form="rejectComplaintForm" id="saveChanges">
                    <div class="spinner-border spinner-border-sm text-white d-none" role="status" id="saveChangesSpinner">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                    Submit
                </button>
            </div>
        </div>
    </div>
</div>

<div class="toast-container bottom-0 start-50 translate-middle-x p-3" style="width: 220px;">
    <div id="userSuccessToast" class="toast align-items-center text-bg-success border-0" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="text-center">
            <div id="toastMessage" class="toast-body">
                <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="currentColor"  class="icon icon-tabler icons-tabler-filled icon-tabler-circle-check">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                    <path d="M17 3.34a10 10 0 1 1 -14.995 8.984l-.005 -.324l.005 -.324a10 10 0 0 1 14.995 -8.336zm-1.293 5.953a1 1 0 0 0 -1.32 -.083l-.094 .083l-3.293 3.292l-1.293 -1.292l-.094 -.083a1 1 0 0 0 -1.403 1.403l.083 .094l2 2l.094 .083a1 1 0 0 0 1.226 0l.094 -.083l4 -4l.083 -.094a1 1 0 0 0 -.083 -1.32z" />
                </svg>
                
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        // $('#markAllAsRead').click(function() {
        //     $.ajax({
        //         url: '{{ route("notifications.markAllAsRead") }}',
        //         method: 'POST',
        //         data: {
        //             _token: '{{ csrf_token() }}'
        //         },
        //         success: function(response) {
        //             if (response.success) {
        //                 $('.notification-status').each(function() {
        //                     $(this).find('svg').addClass('d-none'); // Hide icons for unread notifications
        //                 });
        //             }
                    
        //             // Set the toast message based on the response
        //             $('#toastMessage').text(response.message);

        //             // Trigger Bootstrap toast instead of SweetAlert
        //             var toastEl = new bootstrap.Toast(document.getElementById('userSuccessToast'));
        //             toastEl.show();
        //         },
        //         error: function(xhr) {
        //             console.error(xhr.responseText);
        //         }
        //     });
        // });
        
        function markAsRead(id) {
            $.ajax({
                url: '/driver/notifications/' + id + '/markedAsRead', // Use the correct dynamic URL
                method: 'POST',
                data: {
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    if (response.success) {
                        // Hide the icons for unread notifications
                        $('.notification-status[data-id="' + id + '"]').find('svg').addClass('d-none');
                    }
                    
                    // Set the toast message based on the response
                    $('#toastMessage').text(response.message);

                    // Trigger Bootstrap toast instead of SweetAlert
                    var toastEl = new bootstrap.Toast(document.getElementById('userSuccessToast'));
                    toastEl.show();
                },
                error: function(xhr) {
                    console.error(xhr.responseText);
                }
            });
        }
        
        $(document).on('click', '.showDetails', function (e) {
            e.preventDefault();
            
            let concernId = $(this).data('id');

            // console.log(concernId);

            $.ajax({
                url: `/admin/residents-concerns/${concernId}/show`, // Adjust route as needed
                type: "GET",
                success: function (response) {
                    // Populate modal with user data
                    $('#complaintNum').text(response.concern.id);
                    $('#addressValue').text(response.concern.address);
                    $('#descValue').text(response.concern.complaint_details);
                    $('#dateValue').text(response.concern.dateOfIncident);
                    $('#statusValue').text(response.concern.status);
                    $('#remarksValue').text(response.concern.remarks ? response.concern.remarks : '(None)');

                    // Show the modal
                    $('#viewDetailsModal').modal('show');

                    // if (response.concern.status == 'sent') {
                    //     markAsRead(concernId);
                    // }

                    // markAsRead(concernId);

                },
                error: function (error) {
                    console.log("Error fetching concern data: ", error);
                    alert("Failed to fetch concern details.");
                }
            });
        });

        $(document).on('click', '.rejectComplaint', function() {
            let concernId = $(this).data('id');
            $('#rejectComplaintForm').data('id', concernId); // Set the data-id on the form
        });
        
        $('#rejectComplaintForm').submit(function(e) {
            e.preventDefault();

            $('#saveChanges').attr('disabled', true); 
            $('#saveChangesSpinner').removeClass('d-none');

            let reason = $('#reasonInput').val();
            let concernId = $(this).data('id');

            // console.log(concernId);

            $.ajax({
                url: `/driver/notifications/${concernId}/reject`, // Adjust route as needed
                type: "POST",
                data: {
                    _token: '{{ csrf_token() }}',
                    reason: reason
                },
                success: function (response) {
                    if (response.success) {
                        $('#rejectModal').modal('hide');

                        $('#toastMessage').text('Complaint rejected successfully.');

                        // Trigger Bootstrap toast instead of SweetAlert
                        var toastEl = new bootstrap.Toast(document.getElementById('userSuccessToast'));
                        toastEl.show();

                        location.reload();
                    }
                },
                error: function (error) {
                    console.log("Error rejecting concern: ", error);
                    alert("Failed to reject concern.");
                },
                complete: function() {
                    // Re-enable the button and hide spinner after the request is complete
                    $('#saveChanges').attr('disabled', false);
                    $('#saveChangesSpinner').addClass('d-none'); // Hide spinner
                }
            });
        });

        $(document).on('click', '.completeComplaint', function (e) {
            e.preventDefault();
            
            let concernId = $(this).data('id');

            // console.log(concernId);

            // Show SweetAlert confirmation
            Swal.fire({
                title: 'Are you sure?',
                text: "Do you want to mark this complaint as completed?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#01A94D',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Confirm'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Execute AJAX request if confirmed
                    $.ajax({
                        url: `/driver/notifications/${concernId}/complete`, // Adjust route as needed
                        type: "POST",
                        data: {
                            _token: '{{ csrf_token() }}'
                        },
                        success: function (response) {
                            if (response.success) {
                                $('#toastMessage').text('Complaint completed successfully.');

                                // Trigger Bootstrap toast instead of SweetAlert
                                var toastEl = new bootstrap.Toast(document.getElementById('userSuccessToast'));
                                toastEl.show();

                                location.reload();
                            }
                        },
                        error: function (error) {
                            console.log("Error fetching data: ", error);
                            alert("Failed.");
                        }
                    });
                }
            });
        });
    });
    
</script>

@endsection