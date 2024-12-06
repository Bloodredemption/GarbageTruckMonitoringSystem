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
                                <h1><strong>Residents Concerns Records</strong></h1>
                                <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="{{ route('dashboard')}}">Dashboard</a></li>
                                        <li class="breadcrumb-item active text-white" aria-current="page">Residents Concerns</li>
                                    </ol>
                                </nav>
                            </div>
                            <div class="d-flex">
                                {{-- <div>
                                    <a target="_blank" href="{{ route('rc.index') }}" class="btn btn-soft-light text-white me-2" type="button">
                                        <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-external-link">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                            <path d="M12 6h-6a2 2 0 0 0 -2 2v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-6" />
                                            <path d="M11 13l9 -9" />
                                            <path d="M15 4h5v5" />
                                        </svg>
                                        Complaint Form
                                    </a>
                                </div> --}}
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
    <div class="conatiner-fluid content-inner mt-n5 py-0">
        <div class="row">
            
            <div class="col-md-12 col-lg-12">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card" data-aos="fade-up" data-aos-delay="800">
                            <div class="flex-wrap card-header d-flex justify-content-between align-items-center">
                                <div class="header-title">
                                    <h4 class="card-title">Residents Concerns List</h4>
                                    {{-- <p class="mb-0">Sub Title Here</p>           --}}
                                </div>
                                
                            </div>
                            <div class="card-body px-0">
                                <div class="table-responsive">
                                    <table id="concerns-table" class="table" role="grid" data-bs-toggle="data-table">
                                        <thead>
                                            <tr class="ligth" style="background-color: #01A94D; color: white;">
                                                <th>No.</th>
                                                <th>Complainant</th>
                                                <th>Address</th>
                                                <th>Status</th>
                                                <th>Date of Incident</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($concerns as $concerns)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $concerns->fullname }}</td>
                                                <td>{{ $concerns->address }}</td>
                                                <td>{{ $concerns->status }}</td>
                                                <td>{{ $concerns->dateOfIncident }}</td>
                                                <td>
                                                    <div class="flex align-items-center list-user-action">
                                                        <!-- Archive Button with Tooltip -->
                                                        <a class="btn btn-sm btn-icon btn-secondary view-concerns btn-hover" data-id="{{ $concerns->id }}" data-bs-toggle="tooltip" title="Show">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-eye">
                                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                                                <path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
                                                                <path d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6" />
                                                            </svg>
                                                            Show
                                                        </a>
                                                        <a class="btn btn-sm btn-icon btn-primary finish-concerns btn-hover" data-id="{{ $concerns->id }}" data-bs-toggle="tooltip" title="Finish">
                                                            <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-checkbox">
                                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                                                <path d="M9 11l3 3l8 -8" />
                                                                <path d="M20 12v6a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2h9" />
                                                            </svg>
                                                            Finish
                                                        </a>
                                                        <a class="btn btn-sm btn-icon btn-warning view-concerns btn-hover" data-id="{{ $concerns->id }}" data-bs-toggle="tooltip" title="Show">
                                                            <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-checkbox">
                                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                                                <path d="M9 11l3 3l8 -8" />
                                                                <path d="M20 12v6a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2h9" />
                                                            </svg>
                                                            Finish
                                                        </a>
                                                    </div>
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
    
    <div class="modal fade" id="viewConcernModal" tabindex="-1" aria-labelledby="viewConcernModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="viewConcernModalLabel">Resident Concern Information</h1>
                </div>
                <div class="modal-body">
                    <ul class="list-unstyled">
                        <li><strong>Complainant Details:</strong>
                            <ul>
                                <li>Name - <span id="fullname"></span></li>
                                <li>Contact No. - <span id="contact_num"></span></li>
                            </ul>
                        </li>
                        <li><strong>Description:</strong>
                            <ul>
                                <li><span id="complaint_details"></span></li>
                            </ul>
                        </li>
                        <li><strong>Location - </strong> <span id="brgy_location"></span></li>
                    </ul>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-soft-light" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer Section Start -->
    @include('partials.footer')
    <!-- Footer Section End -->    
</main>

<script>
    $(document).ready(function() {
        var table = $('#concerns-table').DataTable({
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
                    title: 'Residents Concerns',
                    // exportOptions: {
                    //     columns: ':not(:last-child)' // Exclude action column
                    // }
                },
                { 
                    extend: 'excel', 
                    text: 'Excel',
                    title: 'Residents Concerns',
                    // exportOptions: {
                    //     columns: ':not(:last-child)' // Exclude action column
                    // }
                },
                { 
                    extend: 'pdf', 
                    text: 'PDF',
                    title: 'Residents Concerns',
                    // exportOptions: {
                    //     columns: ':not(:last-child)' // Exclude action column
                    // }
                },
                { 
                    extend: 'print', 
                    text: 'Print',
                    title: 'Residents Concerns',
                    // exportOptions: {
                    //     columns: ':not(:last-child)' // Exclude action column
                    // }
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

        $(document).on('click', '.view-concerns', function (e) {
            e.preventDefault();
            
            let concernId = $(this).data('id');

            $.ajax({
                url: `/admin/residents-concerns/${concernId}/show`, // Adjust route as needed
                type: "GET",
                success: function (response) {
                    // Populate modal with user data
                    $('#fullname').text(response.concern.fullname);
                    $('#contact_num').text(response.concern.contact_num);
                    $('#complaint_details').text(response.concern.complaint_details);
                    $('#brgy_location').text(response.concern.address);


                    // Show the modal
                    $('#viewConcernModal').modal('show');
                },
                error: function (error) {
                    console.log("Error fetching concern data: ", error);
                    alert("Failed to fetch concern details.");
                }
            });
        });

    });
</script>

@endsection