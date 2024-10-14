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
                                                <th>Date Created</th>
                                                <th>Added by</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <!-- Rows will be dynamically added here -->
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12 col-xl-6">
                        <div class="card aos-init aos-animate" data-aos="fade-up" data-aos-delay="900">
                            <div class="flex-wrap card-header d-flex justify-content-between">
                                <div class="header-title">
                                    <h4 class="card-title">Waste Collected</h4>            
                                </div>   
                                <div class="dropdown">
                                    <a href="#" class="text-gray dropdown-toggle" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                    This Week
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton1" style="">
                                    <li><a class="dropdown-item" href="#">This Week</a></li>
                                    <li><a class="dropdown-item" href="#">This Month</a></li>
                                    <li><a class="dropdown-item" href="#">This Year</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="flex-wrap d-flex align-items-center justify-content-between">
                                    <div id="myChart" class="col-md-8 col-lg-8 myChart" style="min-height: 208.7px;"><div id="apexcharts0wtmytk3" class="apexcharts-canvas apexcharts0wtmytk3 apexcharts-theme-light" style="width: 404px; height: 208.7px;"><svg id="SvgjsSvg1269" width="404" height="208.70000000000002" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.dev" class="apexcharts-svg" xmlns:data="ApexChartsNS" transform="translate(0, 0)" style="background: transparent;"><g id="SvgjsG1271" class="apexcharts-inner apexcharts-graphical" transform="translate(100, 0)"><defs id="SvgjsDefs1270"><clipPath id="gridRectMask0wtmytk3"><rect id="SvgjsRect1273" width="212" height="230" x="-3" y="-1" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect></clipPath><clipPath id="forecastMask0wtmytk3"></clipPath><clipPath id="nonForecastMask0wtmytk3"></clipPath><clipPath id="gridRectMarkerMask0wtmytk3"><rect id="SvgjsRect1274" width="210" height="232" x="-2" y="-2" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect></clipPath></defs><g id="SvgjsG1275" class="apexcharts-radialbar"><g id="SvgjsG1276"><g id="SvgjsG1277" class="apexcharts-tracks"><g id="SvgjsG1278" class="apexcharts-radialbar-track apexcharts-track" rel="1"><path id="apexcharts-radialbarTrack-0" d="M 103 27.134146341463406 A 75.8658536585366 75.8658536585366 0 1 1 102.98675891070543 27.134147496966435" fill="none" fill-opacity="1" stroke="rgba(242,242,242,0.85)" stroke-opacity="1" stroke-linecap="butt" stroke-width="2.8739837398373993" stroke-dasharray="0" class="apexcharts-radialbar-area" data:pathOrig="M 103 27.134146341463406 A 75.8658536585366 75.8658536585366 0 1 1 102.98675891070543 27.134147496966435"></path></g><g id="SvgjsG1280" class="apexcharts-radialbar-track apexcharts-track" rel="2"><path id="apexcharts-radialbarTrack-1" d="M 103 42.882113821138205 A 60.117886178861795 60.117886178861795 0 1 1 102.98950744952165 42.882114736785965" fill="none" fill-opacity="1" stroke="rgba(242,242,242,0.85)" stroke-opacity="1" stroke-linecap="butt" stroke-width="2.8739837398373993" stroke-dasharray="0" class="apexcharts-radialbar-area" data:pathOrig="M 103 42.882113821138205 A 60.117886178861795 60.117886178861795 0 1 1 102.98950744952165 42.882114736785965"></path></g></g><g id="SvgjsG1282"><g id="SvgjsG1284" class="apexcharts-series apexcharts-radial-series" seriesName="Apples" rel="1" data:realIndex="0"><path id="SvgjsPath1285" d="M 103 27.134146341463406 A 75.8658536585366 75.8658536585366 0 1 1 79.55616192674941 175.15271448624577" fill="none" fill-opacity="0.85" stroke="rgba(75,199,210,0.85)" stroke-opacity="1" stroke-linecap="butt" stroke-width="5.747967479674799" stroke-dasharray="0" class="apexcharts-radialbar-area apexcharts-radialbar-slice-0" data:angle="198" data:value="55" index="0" j="0" data:pathOrig="M 103 27.134146341463406 A 75.8658536585366 75.8658536585366 0 1 1 79.55616192674941 175.15271448624577"></path></g><g id="SvgjsG1286" class="apexcharts-series apexcharts-radial-series" seriesName="Oranges" rel="2" data:realIndex="1"><path id="SvgjsPath1287" d="M 103 42.882113821138205 A 60.117886178861795 60.117886178861795 0 1 1 42.882113821138205 103.00000000000001" fill="none" fill-opacity="0.85" stroke="rgba(58,87,232,0.85)" stroke-opacity="1" stroke-linecap="butt" stroke-width="5.747967479674799" stroke-dasharray="0" class="apexcharts-radialbar-area apexcharts-radialbar-slice-1" data:angle="270" data:value="75" index="0" j="1" data:pathOrig="M 103 42.882113821138205 A 60.117886178861795 60.117886178861795 0 1 1 42.882113821138205 103.00000000000001"></path></g><circle id="SvgjsCircle1283" r="48.680894308943095" cx="103" cy="103" class="apexcharts-radialbar-hollow" fill="transparent"></circle></g></g></g><line id="SvgjsLine1288" x1="0" y1="0" x2="206" y2="0" stroke="#b6b6b6" stroke-dasharray="0" stroke-width="1" stroke-linecap="butt" class="apexcharts-ycrosshairs"></line><line id="SvgjsLine1289" x1="0" y1="0" x2="206" y2="0" stroke-dasharray="0" stroke-width="0" stroke-linecap="butt" class="apexcharts-ycrosshairs-hidden"></line></g><g id="SvgjsG1272" class="apexcharts-annotations"></g></svg><div class="apexcharts-legend"></div></div></div>
                                        
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
    $(document).ready(function () {
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
                                    <td>${wasteComposition.metrics}</td>
                                    <td>${wasteComposition.brgy.name}</td>
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
                        bSort: false,
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

        fetchWC();
    });
</script>

<script>
    var options = {
          series: [44, 55, 41, 17, 15],
          chart: {
          type: 'donut',
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

    var chart = new ApexCharts(document.querySelector("#myChart"), options);
    chart.render();

</script>
@endsection