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
                                <h1><strong>Waste Composition</strong></h1>
                                <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="{{ route('dashboard')}}">Dashboard</a></li>
                                        <li class="breadcrumb-item active text-white" aria-current="page">Waste Composition</li>
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
                                    <h4 class="card-title">Waste Composition List</h4>
                                    {{-- <p class="mb-0">Sub Title Here</p>           --}}
                                </div>
                                
                            </div>
                            <div class="card-body px-0">
                                <div class="table-responsive">
                                    <table id="wc-tbl" class="table" role="grid" data-bs-toggle="data-table">
                                        <thead>
                                            <tr class="ligth" style="background-color: #01A94D; color: white;">
                                                <th>No.</th>
                                                <th>Waste Type</th>
                                                <th>Collection Date</th>
                                                <th>Metrics</th>
                                                <th>Location</th>
                                                <th>Added by</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($wasteCompositions as $wc)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $wc->waste_type }}</td>
                                                <td>{{ \Carbon\Carbon::parse($wc->collection_date)->format('F d, Y h:i A') }}</td>
                                                <td>{{ $wc->metrics }} kg/s</td>
                                                <td>{{ $wc->brgy->brgy_name }}</td>
                                                <td>{{ $wc->user->fullname }} | {{ $wc->user->user_type }}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    
                </div>

                <div class="row">

                    <div class="col-md-6">
                        <div class="card aos-init aos-animate" data-aos="fade-up" data-aos-delay="900">
                            <div class="flex-wrap card-header d-flex justify-content-between">
                                <div class="header-title">
                                    <h4 class="card-title">Waste Collected Count</h4>            
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
                            <div class="card-body">
                                <div class="flex-wrap d-flex align-items-center justify-content-between">
                                    <div id="myChart" class="col-md-9 col-sm-9 myChart" style="min-height: 208.7px;">
                                            
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="card aos-init aos-animate" data-aos="fade-up" data-aos-delay="900">
                            <div class="flex-wrap card-header d-flex justify-content-between">
                                <div class="header-title">
                                    <h4 class="card-title">Waste Generation Histogram</h4>            
                                </div>   
                                
                            </div>
                            <div class="card-body">
                                <div class="flex-wrap d-flex align-items-center justify-content-between">
                                    <div id="otherChart" class="col-md-12 col-sm-12" style="min-height: 208.7px;">
                                            
                                    </div>
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
    document.querySelector('#timeframeSelect').addEventListener('change', function() {
        const selectedTimeframe = this.value; // Get selected value
        updateChart(selectedTimeframe); // Call your updateChart function with the selected timeframe
    });

    // Initial chart load for 'This Day'
    updateChart('day');

    $(document).ready(function () {
        let table = $('#wc-tbl').DataTable({
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
                    title: 'Waste Composition List',
                },
                { 
                    extend: 'excel', 
                    text: 'Excel',
                    title: 'Waste Composition List',
                },
                { 
                    extend: 'pdf', 
                    text: 'PDF',
                    title: 'Waste Composition List',
                },
                { 
                    extend: 'print', 
                    text: 'Print',
                    title: 'Waste Composition List',
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
        
        function fetchWC() {
            $.ajax({
                url: "{{ route('awc.index') }}", // Your route for fetching barangays
                type: "GET",
                success: function (response) {
                    let rows = '';
                    let counter = 1;
                    $.each(response.wasteCompositions, function (key, wasteComposition) {
                        if (wasteComposition.isDeleted == '0') { 

                            let collectionDate = new Date(wasteComposition.collection_date);
                            let collectionDate2 = new Date(wasteComposition.created_at);

                            // Format the date to a more readable format
                            let options = {
                                year: 'numeric',
                                month: 'long',  // e.g., September
                                day: 'numeric',
                                hour: 'numeric',
                                minute: 'numeric',
                                hour12: true    // For AM/PM format
                            };

                            // Convert the date to the desired format
                            let formattedDate = collectionDate.toLocaleString('en-US', options);
                            let formattedDate2 = collectionDate2.toLocaleString('en-US', options);

                            rows += `
                                <tr>
                                    <td>${counter}</td>
                                    <td>${wasteComposition.waste_type}</td>
                                    <td>${formattedDate}</td>
                                    <td>${wasteComposition.metrics} kg/s</td>
                                    <td>${wasteComposition.brgy.brgy_name}</td>
                                    <td>${formattedDate2}</td>
                                    <td>${wasteComposition.user.user_type}</td>
                                </tr>`;
                            counter++;
                        }
                    });

                    let dataTable = $('#wc-tbl').DataTable();
                    dataTable.clear(); // Clear the existing table data
                    dataTable.destroy();

                    $('#wc-tbl tbody').html(rows);

                    let table = $('#wc-tbl').DataTable({
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
                                title: 'Waste Composition List',
                            },
                            { 
                                extend: 'excel', 
                                text: 'Excel',
                                title: 'Waste Composition List',
                            },
                            { 
                                extend: 'pdf', 
                                text: 'PDF',
                                title: 'Waste Composition List',
                            },
                            { 
                                extend: 'print', 
                                text: 'Print',
                                title: 'Waste Composition List',
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
                    alert("Failed to fetch waste compositions. Please try again.");
                }
            });
        }
    });

    // Function to fetch and update chart based on timeframe
    // Initialize a chart variable to keep track of the chart instance
    let chart;

    function updateChart(timeframe) {
        fetch(`/admin/waste-composition/chartsData?timeframe=${timeframe}`)
            .then(response => response.json())
            .then(data => {
                // Chart options with the new data
                var options = {
                    series: [data.residual, data.biodegradable],
                    chart: {
                        type: 'donut',
                        
                    },
                    labels: ['Residual', 'Biodegradable'],
                    legend: {
                        formatter: function(val, opts) {
                            return val + " - " + opts.w.globals.series[opts.seriesIndex];
                        }
                    },
                    responsive: [{
                        breakpoint: 480,
                        options: {
                            chart: {
                                width: 200
                            },
                            legend: {
                                position: 'bottom'
                            }
                        }
                    }]
                };

                // Clear previous chart instance
                if (chart) {
                    chart.destroy();  // Destroy the existing chart before creating a new one
                }

                // Render the donut chart with updated data
                chart = new ApexCharts(document.querySelector("#myChart"), options);
                chart.render();
            })
            .catch(error => console.error('Error fetching waste composition data:', error));
    }

    function updateBarChart() {
        fetch('/admin/waste-composition/barData')
            .then(response => response.json())
            .then(data => {
                // Prepare the options for the bar chart
                var options2 = {
                    series: [{
                        name: 'Residual (sacks)', // Labeling the series
                        data: data.residual // Data from the controller
                    }, {
                        name: 'Biodegradable (kg)', // Labeling the series
                        data: data.biodegradable // Data from the controller
                    }],
                    chart: {
                        type: 'bar',
                        height: 350
                    },
                    plotOptions: {
                        bar: {
                            horizontal: false,
                            columnWidth: '55%',
                            endingShape: 'rounded'
                        },
                    },
                    dataLabels: {
                        enabled: false
                    },
                    stroke: {
                        show: true,
                        width: 2,
                        colors: ['transparent']
                    },
                    xaxis: {
                        categories: data.months, // Dynamically set the months
                    },
                    yaxis: {
                        title: {
                            text: 'Metrics'
                        }
                    },
                    fill: {
                        opacity: 1
                    },
                    tooltip: {
                        y: {
                            formatter: function(val, { seriesIndex }) {
                                // Dynamic label based on the series
                                return seriesIndex === 0 ? val + " sacks" : val + " kg";
                            }
                        }
                    }
                };

                // Destroy the previous chart instance if necessary
                if (window.chart2) {
                    window.chart2.destroy();
                }

                // Render the new chart
                window.chart2 = new ApexCharts(document.querySelector("#otherChart"), options2);
                window.chart2.render();
            })
            .catch(error => console.error('Error fetching bar chart data:', error));
    }

    // Call the function to load the chart on page load
    updateBarChart();

</script>
@endsection