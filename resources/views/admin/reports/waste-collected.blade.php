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
                                <h1><strong>Waste Collected Reports</strong></h1>
                                <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="{{ route('dashboard')}}">Dashboard</a></li>
                                        <li class="breadcrumb-item  text-white" aria-current="page">Reports</li>
                                        <li class="breadcrumb-item active text-white" aria-current="page">Waste Collected</li>
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
                        <div class="card">
                            <div class="flex-wrap card-header d-flex justify-content-between">
                                <div class="header-title">
                                    <h5 class="card-title">Waste Collected</h5>            
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
                                    <table id="wasteCollectedtbl" class="table cell-border" role="grid" data-bs-toggle="data-table">
                                        <thead>
                                            <tr class="ligth" style="background-color: #01A94D; color: white;">
                                                <th>Area</th>
                                                <th>Biodegradable</th>
                                                <th>Residual</th>
                                                <th>Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($wasteData as $data)
                                                <tr>
                                                    <td>{{ $data->area_name }}</td>
                                                    <td>{{ $data->biodegradable }} kg</td>
                                                    <td>{{ $data->residual }} kg</td>
                                                    <td>{{ $data->total }} kg</td>
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
        handleTimeframeChange();

        // Function to handle the change in timeframe and update the table
        function handleTimeframeChange() {
            $('#timeframeSelect').on('change', function() {
                const timeframe = $(this).val(); // Get the selected timeframe

                fetchWasteCollectedData(timeframe); // Call the function to fetch data
            });
        }

        // Function to fetch waste collected data based on selected timeframe
        function fetchWasteCollectedData(timeframe) {
            $.ajax({
                url: '{{ route('fetchWcol') }}', // Ensure this route is correct
                method: 'GET',
                data: {
                    timeframe: timeframe,
                },
                success: function(response) {
                    // Reinitialize the DataTable after clearing existing data
                    var table = $('#wasteCollectedtbl').DataTable();

                    // Clear the current data in the table
                    table.clear();

                    // Process the response data and populate the table
                    response.forEach(function(data) {
                        // Add each row of data to the table
                        table.row.add([
                            data.area_name,
                            data.biodegradable,
                            data.residual,
                            data.total 
                        ]);
                    });

                    // Redraw the table with the new data
                    table.draw();
                },
                error: function(xhr, status, error) {
                    console.error("Error fetching data:", error);
                }
            });
        }

        // fetchWasteCollectedData('day');

        // Function to update the table with the fetched data
        function updateTable(data) {
            const tableBody = $('#wasteCollectedtbl tbody');
            tableBody.empty(); // Clear existing rows

            data.forEach(function(row) {
                tableBody.append(`
                    <tr>
                        <td>${row.area_name}</td>
                        <td>${row.biodegradable} kg</td>
                        <td>${row.residual} kg</td>
                        <td>${row.total} kg</td>
                    </tr>
                `);
            });
        }
        
        const adminName = "{{ Auth::user()->fullname }}";
        const adminRole = "{{ Auth::user()->user_type }}";
        const logoUrl = "{{ asset('assets/images/gtms_logofull.png') }}"; // Path to the logo

        let table = $('#wasteCollectedtbl').DataTable({
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
                    title: 'Waste Composition Report',
                },
                { 
                    extend: 'excel', 
                    text: 'Excel',
                    title: 'Waste Composition Report',
                },
                {
                    extend: 'pdf',
                    text: 'PDF',
                    title: 'Waste Composition Report',
                    customize: function (doc) {
                        // Set the title and add header with left text and right-aligned logo
                        doc.content.unshift({
                            columns: [
                                {
                                    text: 'Municipal Environment and Natural Resources Office\nBalingasag, Misamis Oriental',
                                    alignment: 'left',
                                    margin: [0, 0, 0, 10] // Add margin below
                                },
                                {
                                    image: logoUrl,
                                    width: 50, // Set logo size
                                    alignment: 'right'
                                }
                            ]
                        });

                        // Add a footer with the admin details at the bottom
                        doc.content.push({
                            text: `Prepared by:\n${adminName}\n${adminRole}`,
                            margin: [0, 20, 0, 0],
                            alignment: 'left'
                        });

                        // Add a divider below the header (just a simple line)
                        doc.content.push({
                            text: '',
                            decoration: 'underline',
                            margin: [0, 10, 0, 10]
                        });
                    }
                },
                { 
                    extend: 'print', 
                    text: 'Print',
                    title: '',
                    customize: function (win) {
                        // Add a title above the table grid
                        $(win.document.body).prepend(`
                            <h2 style="text-align: center; margin-bottom: 20px; margin-top: 20px;">Waste Composition Report</h2>
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