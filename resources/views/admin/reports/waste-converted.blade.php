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
                                <h1><strong>Waste Converted Reports</strong></h1>
                                <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="{{ route('dashboard')}}">Dashboard</a></li>
                                        <li class="breadcrumb-item  text-white" aria-current="page">Reports</li>
                                        <li class="breadcrumb-item active text-white" aria-current="page">Waste Converted</li>
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
                            <div class="flex-wrap card-header d-flex justify-content-between">
                                <div class="header-title">
                                    <h5 class="card-title">Waste Converted</h5>            
                                </div>   
                                <div class="form-group">
                                    <select class="form-select text-gray" id="timeframeSelect" aria-label="Select Timeframe">
                                        <option value="day">Daily</option>
                                        <option value="week">Weekly</option>
                                        <option value="month">Monthly</option>
                                        <option value="year">Yearly</option>
                                    </select>
                                </div>
                            </div>
                            <div class="card-body" style="padding-top: 0;">
                                <div class="table-responsive">
                                    <table id="wasteConvertedtbl" class="table cell-border" role="grid" data-bs-toggle="data-table">
                                        <thead>
                                            <tr class="ligth" style="background-color: #01A94D; color: white;">
                                                <th>Conversion Method</th>
                                                <th>Recyclable</th>
                                                <th>Total Converted</th>
                                                <th>Start Date</th>
                                                <th>End Date</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($wasteData as $item)
                                                <tr>
                                                    <td>{{ $item->conversion_method }}</td>
                                                    <td>{{ $item->metrics_sum }} kg/s</td>
                                                    <td>{{ $item->total_converted }} pcs</td>
                                                    <td>{{ $item->start_date }}</td>
                                                    <td>{{ $item->end_date }}</td>
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
    
    <!-- Footer Section Start -->
    @include('partials.footer')
    <!-- Footer Section End -->    
</main>

<script>
    $(document).ready(function() {
        $('#timeframeSelect').on('change', function() {
            var selectedTimeframe = $(this).val(); // Get selected timeframe

            $.ajax({
                url: "{{ route('wasteDataByTimeframe') }}", // Controller route for fetching data
                type: "GET",
                data: { timeframe: selectedTimeframe },
                success: function(response) {
                    // Process response and update your table or UI with the fetched data
                    console.log(response);

                    // Reinitialize the DataTable after clearing existing data
                    var table = $('#wasteConvertedtbl').DataTable();

                    // Clear existing rows in DataTable
                    table.clear();

                    // Add new rows from the response data
                    response.forEach(function(data) {
                        table.row.add([
                            data.conversion_method,               // Conversion Method
                            data.metrics_sum + ' kg/s',           // Metrics
                            data.total_converted + ' pcs',        // Total Converted
                            data.start_date,                      // Start Date
                            data.end_date                         // End Date
                        ]);
                    });

                    // Draw the table with the newly added data
                    table.draw();
                },
                error: function() {
                    alert('Error fetching data');
                }
            });
        });

        const adminName = "{{ Auth::user()->fullname }}";
        const adminRole = "{{ Auth::user()->user_type }}";
        const logoUrl = "{{ asset('assets/images/gtms_logofull.png') }}";

        let table = $('#wasteConvertedtbl').DataTable({
            bSort: false,
            fixedHeader: true,
            retrieve: true,
            paging: true,
            searching: true,
            info: true,
            responsive: true,
            buttons: [
                { 
                    extend: 'csv', 
                    text: 'CSV',
                    title: 'Waste Converted Report',
                },
                { 
                    extend: 'excel', 
                    text: 'Excel',
                    title: 'Waste Converted Report',
                },
                { 
                    extend: 'pdf', 
                    text: 'PDF',
                    title: 'Waste Converted Report',
                },
                { 
                    extend: 'print', 
                    text: 'Print',
                    title: '',
                    customize: function (win) {
                        // Add a title above the table grid
                        $(win.document.body).prepend(`
                            <h2 style="text-align: center; margin-bottom: 20px; margin-top: 20px;">Waste Conversion Report</h2>
                        `);

                        // Add header with left text and right-aligned logo
                        $(win.document.body).prepend(`
                            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
                                <div style="text-align: left;">
                                    <p><strong>Municipal Environment and Natural Resources Office</strong><br>Balingasag, Misamis Oriental</p>
                                </div>
                                <div style="text-align: right;">
                                    <img src="${logoUrl}" width="150" alt="Logo">
                                </div>
                            </div>
                            <hr style="border: 1px solid #000; margin: 10px 0;" /> <!-- Divider added here -->
                        `);

                        // Apply grid-style border to each table cell in the print view
                        $(win.document.body).find('table').css({
                            'border-collapse': 'collapse',
                            'width': '100%',
                        });
                        $(win.document.body).find('table td, table th').css({
                            'border': '1px solid black',
                            'padding': '8px',
                            'text-align': 'center',
                        });

                        // Add footer to the print document
                        $(win.document.body).append(`
                            <div style="margin-top: 30px; text-align: left;">
                                <p>Prepared by:</p>
                                <div class="mt-4">
                                    <span class="fw-bold text-uppercase">${adminName}</span><br>
                                    <span>${adminRole}</span>
                                </div>
                            </div>
                        `);
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
    });
    
</script>
@endsection