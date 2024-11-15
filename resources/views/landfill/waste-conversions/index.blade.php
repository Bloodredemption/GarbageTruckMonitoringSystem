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
                                <h1><strong>Waste Conversions Records</strong></h1>
                                <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="{{ route('lf.dashboard')}}">Dashboard</a></li>
                                        <li class="breadcrumb-item active text-white" aria-current="page">Waste Conversion</li>
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
    <div class="conatiner-fluid content-inner mt-n5 py-0">
        <div class="row">
            
            <div class="col-md-12 col-lg-12">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card" data-aos="fade-up" data-aos-delay="800">
                            <div class="flex-wrap card-header d-flex justify-content-between align-items-center">
                                <div class="header-title">
                                    {{-- <h4 class="card-title">Waste Conversions List</h4> --}}
                                    {{-- <p class="mb-0">Sub Title Here</p>           --}}
                                    <ul class="nav custom-tabs" id="myTab" role="tablist">
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link active" id="table-view-tab" data-bs-toggle="tab" data-bs-target="#table-view" type="button" role="tab" aria-controls="table-view" aria-selected="true">
                                                Waste Conversions List
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
                                    <a href="#" class=" text-center btn btn-outline-secondary btn-icon mt-lg-0 mt-md-0 mt-3 " data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        <i class="btn-inner">
                                            <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-adjustments-horizontal"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M14 6m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" /><path d="M4 6l8 0" /><path d="M16 6l4 0" /><path d="M8 12m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" /><path d="M4 12l2 0" /><path d="M10 12l10 0" /><path d="M17 18m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" /><path d="M4 18l11 0" /><path d="M19 18l1 0" /></svg>
                                        </i>
                                        <span>Filter</span>
                                    </a>
                                    <a href="#" class=" text-center btn btn-primary btn-icon mt-lg-0 mt-md-0 mt-3" data-bs-toggle="modal" data-bs-target="#addWasteCModal">
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

                                <div class="tab-content" id="myTabContent">
                                    <!-- Table View Tab Pane -->
                                    <div class="tab-pane fade show active" id="table-view" role="tabpanel" aria-labelledby="table-view-tab">
                                        <div class="pl-3 pr-3" style="padding-left: 1.5rem; padding-right: 1.5rem; padding-top: 1rem;">
                                            <div class="accordion" id="accordionExample">
                                                <div class="accordion-item">
                                                    
                                                    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                                        <div class="accordion-body">
                                                            <div class="text-end">
                                                                <a href="#" class="text-center btn-icon mt-lg-0 mt-md-0 mt-5" id="clear-filters">
                                                                    <i class="btn-inner">
                                                                        <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-x"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M18 6l-12 12" /><path d="M6 6l12 12" /></svg>
                                                                    </i>
                                                                    <span>Clear Filter</span>
                                                                </a>
                                                            </div>
                                                            
                                                            <div class="row">
                                                                <div class="col-md-4 mb-3">
                                                                    <label for="date" class="form-label">Date Created</label>
                                                                    <input type="text" id="created-date" name="start" class="form-control flatpickr_humandate flatpickr-input active" placeholder="Select Date" readonly>
                                                                </div>
                                                                <div class="col-md-4 mb-3">
                                                                    <label for="wt" class="form-label">Waste Type</label>
                                                                    <select class="form-control" id="wt-filter" name="wt">
                                                                        <option value="">Select</option>
                                                                        <option value="Biodegradable">Biodegradable</option>
                                                                        <option value="Residual">Residual</option>
                                                                        <option value="Recyclable">Recyclable</option>
                                                                        <option value="Hazard">Hazard</option>
                                                                    </select>
                                                                </div>
                                                                <div class="col-md-4 mb-3">
                                                                    <label for="status" class="form-label">Status</label>
                                                                    <select class="form-control" id="status-filter" name="status">
                                                                        <option value="">Select</option>
                                                                        <option value="Pending">Pending</option>
                                                                        <option value="Ongoing">Ongoing</option>
                                                                        <option value="Finished">Finished</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                        </div>

                                        <div class="table-responsive mt-3">
                                            <table id="wcov-tbl" class="table" role="grid" data-bs-toggle="data-table">
                                                <thead>
                                                    <tr class="ligth" style="background-color: #01A94D; color: white;">
                                                        <th>No.</th>
                                                        <th>Waste Type</th>
                                                        <th>Conversion Method</th>
                                                        <th>Metrics</th>
                                                        <th>Total Converted</th>
                                                        <th>Conversion Date</th>
                                                        <th>Status</th>
                                                        <th>Date Created</th>
                                                        <th style="min-width: 100px">Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($wasteConversions as $wc)
                                                        <tr>
                                                            <th scope="row">{{ $loop->iteration }}</th>
                                                            <td>{{ $wc->waste_type }}</td>
                                                            <td>{{ $wc->conversion_method }}</td>
                                                            <td>{{ $wc->metrics }} kg/s</td>
                                                            <td>{{ $wc->total_converted }} pcs</td>
                                                            <td>
                                                                {!! $wc->start_date !!}{!! $wc->end_date ? ' to ' . $wc->end_date : ' to <span style="color: red;">[End date not set]</span>' !!}
                                                            </td>
                                                            <td>
                                                                @if ($wc->status == 'Finished')
                                                                    <span class="badge text-success">
                                                                        <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="currentColor"  class="icon icon-tabler icons-tabler-filled icon-tabler-circle-check"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M17 3.34a10 10 0 1 1 -14.995 8.984l-.005 -.324l.005 -.324a10 10 0 0 1 14.995 -8.336zm-1.293 5.953a1 1 0 0 0 -1.32 -.083l-.094 .083l-3.293 3.292l-1.293 -1.292l-.094 -.083a1 1 0 0 0 -1.403 1.403l.083 .094l2 2l.094 .083a1 1 0 0 0 1.226 0l.094 -.083l4 -4l.083 -.094a1 1 0 0 0 -.083 -1.32z" /></svg>
                                                                        Finished
                                                                    </span>
                                                                @elseif ($wc->status == 'Ongoing')
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
                                                            <td>{{ \Carbon\Carbon::parse($wc->created_at)->format('Y-m-d') }}</td>
                                                            <td>
                                                                <div class="flex align-items-center list-user-action">
                                                                    <a class="btn btn-sm btn-icon btn-primary edit-wcov-btn" style="cursor: pointer;" data-id="{{ $wc->id }}">
                                                                        <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-edit">
                                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                                                            <path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1" />
                                                                            <path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z" />
                                                                            <path d="M16 5l3 3" />
                                                                        </svg>
                                                                        Edit
                                                                    </a>
                                                                    <a class="btn btn-sm btn-icon btn-secondary archive-wcov-btn" style="cursor: pointer;" data-id="{{ $wc->id }}">
                                                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-restore">
                                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                                                            <path d="M3.06 13a9 9 0 1 0 .49 -4.087" />
                                                                            <path d="M3 4.001v5h5" />
                                                                            <path d="M12 12m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" />
                                                                        </svg>
                                                                        Archive
                                                                    </a>
                                                                    @if ($wc->status !== 'Finished')
                                                                    <a class="btn btn-sm btn-icon btn-primary finish-wc-btn" style="cursor: pointer;" data-id="{{ $wc->id }}">
                                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-square-check">
                                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                                                            <path d="M3 3m0 2a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v14a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2z" />
                                                                            <path d="M9 12l2 2l4 -4" />
                                                                        </svg>
                                                                        Finish
                                                                    </a>
                                                                    @endif
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                            
                                    <!-- Archive Tab Pane -->
                                    <div class="tab-pane fade" id="archive" role="tabpanel" aria-labelledby="archive-tab">
                                        
                                        <div class="table-responsive mt-3">
                                            <table id="arch-wcov-tbl" class="table" role="grid">
                                                <thead>
                                                    <tr class="ligth" style="background-color: #01A94D; color: white;">
                                                        <th>No.</th>
                                                        <th>Waste Type</th>
                                                        <th>Conversion Method</th>
                                                        <th>Metrics</th>
                                                        <th>Total Converted</th>
                                                        <th>Conversion Date</th>
                                                        <th style="min-width: 100px">Action</th>
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
    
    <!-- Offcanvas for Adding New Waste Conversion -->
    <div class="modal fade z-100" id="addWasteCModal" tabindex="-1" aria-labelledby="addWasteCLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="addWasteCLabel">Create Waste Conversion</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="addWCOVForm" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="add_wt" class="form-label">Waste Type <span style="color: red;">*</span></label>
                            <select class="form-control" id="add_wt" name="wt" required>
                                <option></option>
                                <option value="Recyclable">Recyclable</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="add_cm" class="form-label">Conversion Method <span style="color: red;">*</span></label>
                            <input type="text" class="form-control" id="add_cm" name="cm" required>
                        </div>
                        <label for="add_metrics" id="add_metrics_label" class="form-label">Weight <span style="color: red;">*</span></label>
                        <div class="input-group mb-3">
                            <input type="number" class="form-control" id="add_metrics" name="metrics">
                            <div class="input-group-append">
                                <span class="input-group-text" id="basic-addon2">kg/s</span>
                            </div>
                        </div>
                        <label for="add_ttlconv" id="add_ttlconv_label" class="form-label">Total Converted <span style="color: red;">*</span></label>
                        <div class="input-group mb-3">
                            <input type="number" class="form-control" id="add_ttlconv" name="ttlconv">
                            <div class="input-group-append">
                                <span class="input-group-text" id="basic-addon2">pcs</span>
                            </div>
                        </div>
                        <div class="d-flex mb-3">
                            <div class="form-check me-2">
                                <input type="radio" name="selectRadiobtn" class="form-check-input" id="selectSingleDate">
                                <label class="form-check-label" for="selectSingleDate">Single Date</label>
                            </div>
                            <div class="form-check me-2">
                                <input type="radio" name="selectRadiobtn" class="form-check-input" id="selectCompleteDate">
                                <label class="form-check-label" for="selectCompleteDate">Complete Date</label>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="form-group d-none" id="completeInput">
                                <label for="add_completeDate" class="form-label">Conversion Date <span style="color: red;">*</span></label>
                                <input type="text" id="add_completeDate" name="completeDate" class="form-control range_flatpicker">
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="form-group d-none" id="singleInput">
                                <label for="add_startDate" class="form-label">Conversion Date <span style="color: red;">*</span></label>
                                <input type="text" id="add_startDate" name="startDate" class="form-control date_flatpicker">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button  form="addWCOVForm" class="btn btn-primary" id="saveChangesBtn">
                        <div class="spinner-border spinner-border-sm text-white d-none" role="status" id="saveChangesSpinner">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                        Save changes
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Offcanvas for Edit Waste Composition -->
    <div class="modal fade z-100" id="editWasteCModal" tabindex="-1" aria-labelledby="editWasteCLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="editWasteCLabel">Update Waste Collection</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="editWCOVForm" method="POST">
                        @csrf
                        <input type="hidden" id="edit_wcov_id" name="wcov_id">
        
                        <div class="mb-3">
                            <label for="edit_wt" class="form-label">Waste Type <span style="color: red;">*</span></label>
                            <select class="form-control" id="edit_wt" name="wt" required>
                                <option></option>
                                <option value="Recyclable">Recyclable</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="edit_cm" class="form-label">Conversion Method <span style="color: red;">*</span></label>
                            <input type="text" class="form-control" id="edit_cm" name="cm" required>
                        </div>
                        <label for="edit_metrics" id="edit_metrics_label" class="form-label">Weight <span style="color: red;">*</span></label>
                        <div class="input-group mb-3">
                            <input type="number" class="form-control" id="edit_metrics" name="metrics" required aria-label="" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <span class="input-group-text" id="editbasic-addon2">kg/s</span>
                            </div>
                        </div>
                        <label for="edit_ttlconv" id="edit_ttlconv_label" class="form-label">Total Converted <span style="color: red;">*</span></label>
                        <div class="input-group mb-3">
                            <input type="number" class="form-control" id="edit_ttlconv" name="ttlconv">
                            <div class="input-group-append">
                                <span class="input-group-text" id="basic-addon2">pcs</span>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="submit" form="editWCOVForm" class="btn btn-primary" id="editsaveChangesBtn">
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

<script>
    $(document).ready(function () {
        

        // Get references to elements
        const singleDateRadio = document.getElementById('selectSingleDate');
        const completeDateRadio = document.getElementById('selectCompleteDate');
        const addCompleteDate = document.getElementById('completeInput');
        const addStartDate = document.getElementById('singleInput');

        // Function to toggle visibility based on radio button selection
        function toggleDateInputs() {
            addStartDate.classList.toggle('d-none', !singleDateRadio.checked);
            addCompleteDate.classList.toggle('d-none', !completeDateRadio.checked);
        }

        // Attach event listeners to the radio buttons
        singleDateRadio.addEventListener('change', toggleDateInputs);
        completeDateRadio.addEventListener('change', toggleDateInputs);

        // Initialize by setting default visibility
        toggleDateInputs();
        
        let table = $('#wcov-tbl').DataTable({
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
                    title: 'Waste Conversion List',
                    exportOptions: {
                        columns: ':not(:last-child)'
                    }
                },
                { 
                    extend: 'excel', 
                    text: 'Excel',
                    title: 'Waste Conversion List',
                    exportOptions: {
                        columns: ':not(:last-child)'
                    }
                },
                { 
                    extend: 'pdf', 
                    text: 'PDF',
                    title: 'Waste Conversion List',
                    exportOptions: {
                        columns: ':not(:last-child)'
                    }
                },
                { 
                    extend: 'print', 
                    text: 'Print',
                    title: 'Waste Conversion List',
                    exportOptions: {
                        columns: ':not(:last-child)'
                    }
                }
            ]
        });

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
        
        $('#clear-filters').on('click', function(e) {
            e.preventDefault(); // Prevent the default anchor click behavior
            
            // Reset all select elements and inputs
            $('#status-filter').val('');
            $('#wt-filter').val('');
            let calendarInstance = document.querySelector('#created-date')._flatpickr;
            if (calendarInstance) {
                calendarInstance.clear();  // Clear the Flatpickr instance
            }
            
            // Fetch users again to update the table without filters
            fetchWCOV();
        });

        function fetchWCOV() {
            let status = $('#status-filter').val();
            let wt = $('#wt-filter').val();
            let created_date = $('#created-date').val();

            let calendarDate = new Date(created_date).toLocaleDateString('en-CA');

            $.ajax({
                url: "{{ route('wcov.index') }}", // Your route for fetching barangays
                type: "GET",
                data: {
                    wt: wt,          // Pass the status filter
                    status: status,          // Pass the status filter
                    created_date: calendarDate // Pass the created date filter
                },
                success: function (response) {
                    let rows = '';
                    let counter = 1;
                    $.each(response.wasteConversions, function (key, wasteConversions) {
                        let tableDate = new Date(wasteConversions.created_at).toLocaleDateString('en-CA');

                        if ((status === '' || wasteConversions.status === status) &&
                            (wt === '' || wasteConversions.waste_type === wt) &&
                            (created_date === '' || tableDate === created_date)) { 

                            let status = wasteConversions.status;

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

                            let formatteddate = tableDate;

                            rows += `
                                <tr>
                                    <td>${counter}</td>
                                    <td>${wasteConversions.waste_type}</td>
                                    <td>${wasteConversions.conversion_method}</td>
                                    <td>${wasteConversions.metrics} kg/s</td>
                                    <td>${wasteConversions.total_converted} pcs</td>
                                    <td>
                                        ${wasteConversions.end_date ? `${wasteConversions.start_date} to ${wasteConversions.end_date}` : `${wasteConversions.start_date} <span style="color: red;">[End date not set]</span>`}
                                    </td>
                                    <td>${status}</td>
                                    <td>${formatteddate}</td>
                                    <td>
                                        <div class="flex align-items-center list-user-action">
                                            <a class="btn btn-sm btn-icon btn-primary edit-wcov-btn" data-id="${wasteConversions.id}">
                                                <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-edit">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                                    <path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1" />
                                                    <path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z" />
                                                    <path d="M16 5l3 3" />
                                                </svg>
                                                Edit
                                            </a>
                                            <a class="btn btn-sm btn-icon btn-secondary archive-wcov-btn" data-id="${wasteConversions.id}">
                                                <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-restore"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M3.06 13a9 9 0 1 0 .49 -4.087" /><path d="M3 4.001v5h5" /><path d="M12 12m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" /></svg>
                                                Archive
                                            </a>
                                            ${wasteConversions.status !== 'Finished' ? `
                                                <a class="btn btn-sm btn-icon btn-primary finish-wc-btn" data-id="${wasteConversions.id}" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Finish" data-bs-original-title="Finish">
                                                    <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-square-check"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M3 3m0 2a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v14a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2z" /><path d="M9 12l2 2l4 -4" /></svg>
                                                    Finish
                                                </a>
                                            ` : ''}
                                        </div>

                                    </td>
                                </tr>`;
                            counter++;

                        }
                    });

                    let dataTable = $('#wcov-tbl').DataTable();
                    dataTable.clear(); // Clear the existing table data
                    dataTable.destroy();

                    $('#wcov-tbl tbody').html(rows);

                    let table = $('#wcov-tbl').DataTable({
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
                                title: 'Waste Conversion List',
                                exportOptions: {
                                    columns: ':not(:last-child)'
                                }
                            },
                            { 
                                extend: 'excel', 
                                text: 'Excel',
                                title: 'Waste Conversion List',
                                exportOptions: {
                                    columns: ':not(:last-child)'
                                }
                            },
                            { 
                                extend: 'pdf', 
                                text: 'PDF',
                                title: 'Waste Conversion List',
                                exportOptions: {
                                    columns: ':not(:last-child)'
                                }
                            },
                            { 
                                extend: 'print', 
                                text: 'Print',
                                title: 'Waste Conversion List',
                                exportOptions: {
                                    columns: ':not(:last-child)'
                                }
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

        $('#status-filter, #wt-filter, #created-date').on('change', function () {
            fetchWCOV();
        });

        // fetchWCOV();

        function fetcharchWCOV() {
            $.ajax({
                url: "{{ route('wcov.getArchive') }}", // Your route for fetching barangays
                type: "GET",
                success: function (response) {
                    let rows = '';
                    let counter = 1;
                    $.each(response.archWCov, function (key, archWCov) {
                        if (archWCov.isDeleted == '0') { 

                            rows += `
                                <tr>
                                    <td>${counter}</td>
                                    <td>${archWCov.waste_type}</td>
                                    <td>${archWCov.conversion_method}</td>
                                    <td>${archWCov.metrics} kg/s</td>
                                    <td>${archWCov.total_converted} pcs</td>
                                    <td>${archWCov.start_date} to ${archWCov.end_date}</td>
                                    <td>
                                        <div class="flex align-items-center list-user-action">
                                            <a class="btn btn-sm btn-icon btn-secondary restore-wcov-btn" data-id="${archWCov.id}">
                                                <svg  xmlns="http://www.w3.org/2000/svg"  width="20"  height="20"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-restore"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M3.06 13a9 9 0 1 0 .49 -4.087" /><path d="M3 4.001v5h5" /><path d="M12 12m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" /></svg>
                                                Restore
                                            </a>
                                            <a class="btn btn-sm btn-icon btn-danger delete-wcov-btn" data-id="${archWCov.id}">
                                                <svg  xmlns="http://www.w3.org/2000/svg"  width="20"  height="20"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-trash"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 7l16 0" /><path d="M10 11l0 6" /><path d="M14 11l0 6" /><path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" /><path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" /></svg>
                                                Delete
                                            </a>
                                        </div>
                                    </td>
                                </tr>`;
                            counter++;

                        }
                    });

                    let dataTable = $('#arch-wcov-tbl').DataTable();
                    dataTable.clear(); // Clear the existing table data
                    dataTable.destroy();

                    $('#arch-wcov-tbl tbody').html(rows);

                    $('#arch-wcov-tbl').DataTable({
                        bSort: true,
                        fixedHeader: true, // Enable fixed header
                        retrieve: true, // Retrieve the existing table instead of initializing it again
                        paging: true, // Enable pagination
                        searching: true, // Enable search functionality
                        info: true, // Show the number of entries info
                        responsive: true
                    });

                },
                error: function (error) {
                    console.log("Error fetching data: ", error);
                    alert("Failed to fetch waste conversion. Please try again.");
                }
            });
        }

        fetcharchWCOV();

        // Add Waste Conversion
        $('#addWCOVForm').on('submit', function (e) {
            e.preventDefault();

            $('#saveChangesBtn').attr('disabled', true); 
            $('#saveChangesSpinner').removeClass('d-none');

            // Determine which input to use based on the selected radio button
            let startDate, endDate;

            if ($('#selectSingleDate').is(':checked')) {
                // Single Date selected
                startDate = $('#add_startDate').val();
                endDate = ""; // Set end_date to empty
            } else if ($('#selectCompleteDate').is(':checked')) {
                // Complete Date selected
                let completeDateValue = $('#add_completeDate').val();
                if (completeDateValue.includes(" to ")) {
                    let dates = completeDateValue.split(" to ");
                    startDate = dates[0]; // First date is the start_date
                    endDate = dates[1];   // Last date is the end_date
                } else {
                    startDate = ""; // Default values if parsing fails
                    endDate = "";
                }
            }

            // Prepare form data with conditionally assigned start_date and end_date
            let formData = {
                _token: "{{ csrf_token() }}", // Laravel CSRF token
                waste_type: $('#add_wt').val(),
                conversion_method: $('#add_cm').val(),
                metrics: $('#add_metrics').val(),
                total_converted: $('#add_ttlconv').val(),
                start_date: startDate,
                end_date: endDate,
            };

            $.ajax({
                url: "{{ route('wcov.store') }}", // Route for storing waste conversion data
                type: "POST",
                data: formData,
                success: function (response) {
                    fetchWCOV();

                    $('#toastMessage').text(response.message);

                    // Trigger Bootstrap toast instead of SweetAlert
                    var toastEl = new bootstrap.Toast(document.getElementById('userSuccessToast'));
                    toastEl.show();

                    $('#addWCOVForm')[0].reset();
                    toggleDateInputs();
                    $('#addWasteCModal').modal('hide'); // Hide modal
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

        // Edit Dump Truck
        $('#wcov-tbl').on('click', '.edit-wcov-btn', function () {
            let id = $(this).data('id');

            $.ajax({
                url: `/landfill/waste-conversions/${id}/edit`,
                type: "GET",
                success: function (response) {
                    let wcov = response.wasteConversion;
                    $('#edit_wt').val(wcov.waste_type);
                    $('#edit_cm').val(wcov.conversion_method);
                    $('#edit_metrics').val(wcov.metrics.match(/\d+/)[0]);
                    $('#edit_wcov_id').val(wcov.id);
                    $('#edit_ttlconv').val(wcov.total_converted);
                    $('#edit_sd').val(wcov.start_date);
                    $('#edit_ed').val(wcov.end_date);

                    $('#editWasteCModal').modal('show');
                },
                error: function (error) {
                    console.log("Error fetching waste conversion: ", error);
                }
            });
        });
        
        // Update Waste Conversions
        let originalValues = {};

        function storeOriginalValues() {
            originalValues = {
                waste_type: $('#edit_wt').val(),
                conversion_method: $('#edit_cm').val(),
                metrics: $('#edit_metrics').val(),
                total_converted: $('#edit_ttlconv').val(),
                start_date: $('#edit_sd').val(),
                end_date: $('#edit_ed').val(),
            };
        }

        // Call this function when the form is displayed
        $('#editWasteCModal').on('shown.bs.modal', function () {
            storeOriginalValues(); // Store values when the offcanvas is shown
        });

        $('#editWCOVForm').on('submit', function (e) {
            e.preventDefault();
            let id = $('#edit_wcov_id').val();

            // Check for changes
            const currentValues = {
                waste_type: $('#edit_wt').val(),
                conversion_method: $('#edit_cm').val(),
                metrics: $('#edit_metrics').val(),
                total_converted: $('#edit_ttlconv').val(),
                start_date: $('#edit_sd').val(),
                end_date: $('#edit_ed').val(),
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
                conversion_method: $('#edit_cm').val(),
                metrics: $('#edit_metrics').val(),
                total_converted: $('#edit_ttlconv').val(),
                start_date: $('#edit_sd').val(),
                end_date: $('#edit_ed').val(),
            };

            $('#editsaveChangesBtn').attr('disabled', true); 
            $('#editsaveChangesSpinner').removeClass('d-none');

            $.ajax({
                url: `/landfill/waste-conversions/${id}/update`,
                type: "PUT",
                data: formData,
                success: function (response) {
                    fetchWCOV();

                    $('#toastMessage').text(response.message);

                    // Trigger Bootstrap toast instead of SweetAlert
                    var toastEl = new bootstrap.Toast(document.getElementById('userSuccessToast'));
                    toastEl.show();

                    $('#editWasteCModal').modal('hide');
                },
                error: function (error) {
                    console.log("Error updating waste conversion: ", error);
                    Swal.fire({
                        icon: 'error',
                        title: 'Update Failed!',
                        text: 'An error occurred while updating the waste conversion. Please try again.',
                        confirmButtonText: 'OK',
                        confirmButtonColor: '#d33'
                    });
                },
                complete: function() {
                    // Re-enable the button and hide spinner after the request is complete
                    $('#editsaveChangesBtn').attr('disabled', false);
                    $('#editsaveChangesSpinner').addClass('d-none'); // Hide spinner
                }
            });
        });

        $(document).on('click', '.delete-wcov-btn', function () {
            let id = $(this).data('id');

            Swal.fire({
                title: 'Delete Waste Conversion?',
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
                        url: `/landfill/waste-conversions/${id}/delete`,
                        type: "PUT",
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function (response) {
                            fetchWCOV();
                            fetcharchWCOV();

                            $('#toastMessage').text(response.message);

                            // Trigger Bootstrap toast instead of SweetAlert
                            var toastEl = new bootstrap.Toast(document.getElementById('userSuccessToast'));
                            toastEl.show();
                        },
                        error: function (error) {
                            console.log("Error deleting data: ", error);
                        }
                    });
                }
            });
        });

        $(document).on('click', '.finish-wc-btn', function () {
            let id = $(this).data('id');

            Swal.fire({
                title: 'Confirm Action?',
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
                        url: `/landfill/waste-conversions/${id}/finish`,
                        type: "PUT",
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function (response) {
                            fetchWCOV();
                            

                            $('#toastMessage').text(response.message);

                            // Trigger Bootstrap toast instead of SweetAlert
                            var toastEl = new bootstrap.Toast(document.getElementById('userSuccessToast'));
                            toastEl.show();
                        },
                        error: function (error) {
                            console.log("Error deleting data: ", error);
                        }
                    });
                }
            });
        });

        $(document).on('click', '.restore-wcov-btn', function () {
            let userId = $(this).data('id');

            // Use SweetAlert2 for the confirmation dialog
            Swal.fire({
                title: 'Restore data?',
                text: "Are you sure you want to restore this data?",
                icon: 'info',
                showCancelButton: true,
                confirmButtonText: 'Confirm',
                cancelButtonText: 'Cancel',
                confirmButtonColor: '#01A94D',
                cancelButtonColor: '#6c757d',
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: `/landfill/waste-conversions/${userId}/restore`,
                        type: "PUT",
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // Add CSRF token header
                        },
                        success: function (response) {
                            fetchWCOV();
                            fetcharchWCOV();
                            
                            $('#toastMessage').text(response.message);

                            // Trigger Bootstrap toast instead of SweetAlert
                            var toastEl = new bootstrap.Toast(document.getElementById('userSuccessToast'));
                            toastEl.show();
                        },
                        error: function (error) {
                            console.log("Error restoring data: ", error);

                            // Show error message
                            Swal.fire({
                                icon: 'error',
                                title: 'Restore Failed!',
                                text: 'An error occurred while deleting the data. Please try again.',
                                confirmButtonText: 'OK',
                                confirmButtonColor: '#d33'
                            });
                        }
                    });
                }
            });
        });

        $(document).on('click', '.archive-wcov-btn', function () {
            let userId = $(this).data('id');

            // Use SweetAlert2 for the confirmation dialog
            Swal.fire({
                title: 'Move to Archive?',
                text: "Are you sure you want to archive this data?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Confirm',
                cancelButtonText: 'Cancel',
                confirmButtonColor: '#c03221',
                cancelButtonColor: '#6c757d',
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: `/landfill/waste-conversions/${userId}/archive`,
                        type: "PUT",
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // Add CSRF token header
                        },
                        success: function (response) {
                            fetchWCOV();
                            fetcharchWCOV();
                            
                            $('#toastMessage').text(response.message);

                            // Trigger Bootstrap toast instead of SweetAlert
                            var toastEl = new bootstrap.Toast(document.getElementById('userSuccessToast'));
                            toastEl.show();
                            
                        },
                        error: function (error) {
                            console.log("Error archiving data: ", error);

                            // Show error message
                            Swal.fire({
                                icon: 'error',
                                title: 'Archive Failed!',
                                text: 'An error occurred while archiving the data. Please try again.',
                                confirmButtonText: 'OK',
                                confirmButtonColor: '#d33'
                            });
                        }
                    });
                }
            });
        });
    });
</script>

@endsection