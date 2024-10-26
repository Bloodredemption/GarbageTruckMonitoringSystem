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
                                <h1><strong>Welcome, Admin!</strong></h1>
                                <p>Important data's are displayed here in the dashboard. Start managing garbage truck collection now.</p>
                            </div>
                            {{-- <div>
                                <a href="" class="btn btn-link btn-soft-light">
                                    <svg class="icon-20" width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M11.8251 15.2171H12.1748C14.0987 15.2171 15.731 13.985 16.3054 12.2764C16.3887 12.0276 16.1979 11.7713 15.9334 11.7713H14.8562C14.5133 11.7713 14.2362 11.4977 14.2362 11.16C14.2362 10.8213 14.5133 10.5467 14.8562 10.5467H15.9005C16.2463 10.5467 16.5263 10.2703 16.5263 9.92875C16.5263 9.58722 16.2463 9.31075 15.9005 9.31075H14.8562C14.5133 9.31075 14.2362 9.03619 14.2362 8.69849C14.2362 8.35984 14.5133 8.08528 14.8562 8.08528H15.9005C16.2463 8.08528 16.5263 7.8088 16.5263 7.46728C16.5263 7.12575 16.2463 6.84928 15.9005 6.84928H14.8562C14.5133 6.84928 14.2362 6.57472 14.2362 6.23606C14.2362 5.89837 14.5133 5.62381 14.8562 5.62381H15.9886C16.2483 5.62381 16.4343 5.3789 16.3645 5.13113C15.8501 3.32401 14.1694 2 12.1748 2H11.8251C9.42172 2 7.47363 3.92287 7.47363 6.29729V10.9198C7.47363 13.2933 9.42172 15.2171 11.8251 15.2171Z" fill="currentColor"></path>
                                        <path opacity="0.4" d="M19.5313 9.82568C18.9966 9.82568 18.5626 10.2533 18.5626 10.7823C18.5626 14.3554 15.6186 17.2627 12.0005 17.2627C8.38136 17.2627 5.43743 14.3554 5.43743 10.7823C5.43743 10.2533 5.00345 9.82568 4.46872 9.82568C3.93398 9.82568 3.5 10.2533 3.5 10.7823C3.5 15.0873 6.79945 18.6413 11.0318 19.1186V21.0434C11.0318 21.5715 11.4648 22.0001 12.0005 22.0001C12.5352 22.0001 12.9692 21.5715 12.9692 21.0434V19.1186C17.2006 18.6413 20.5 15.0873 20.5 10.7823C20.5 10.2533 20.066 9.82568 19.5313 9.82568Z" fill="currentColor"></path>
                                    </svg>
                                    Announcements
                                </a>
                            </div> --}}
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
            <!-- Waste Generated Histogram -->
            <div class="col-lg-6">
                <div class="card aos-init aos-animate" data-aos="fade-up" data-aos-delay="900">
                    <div class="flex-wrap card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h5 class="card-title"><strong>Waste Generated Histogram</strong></h5>            
                        </div>   
                        <div class="form-group">
                            <select class="form-select text-gray" id="timeframeSelect" aria-label="Select Timeframe">
                                <option value="week">Weekly</option>
                                <option value="month">Monthly</option>
                                <option value="year">Yearly</option>
                            </select>
                        </div>
                    </div>
                    <div class="card-body" style="padding-top: 0;">
                        <div class="flex-wrap d-flex align-items-center justify-content-between">
                            <div id="myChart" class="col-md-12 col-sm-12 myChart" style="min-height: 208.7px;">
                                    
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        
            <!-- Highest Waste Generated Area and Total waste info -->
            <div class="col-lg-3 d-flex flex-column justify-content-between">
                <!-- Highest Waste Generated Area -->
                <div class="card flex-fill">
                    <div class="card-body">
                        <h5 class="card-title mb-4"><strong>Highest Waste Generated Area (wkly)</strong></h5>
                
                        <!-- Scrollable wrapper -->
                        <div class="scrollable-list" style="max-height: 320px; overflow-y: auto;">
                            <ul class="list-group text-start">
                                <!-- The list will be dynamically inserted here -->
                            </ul>
                        </div>
                        <!-- End of scrollable wrapper -->
                
                    </div>
                </div>
            </div>
        
            <div class="col-lg-3 d-flex flex-column justify-content-between">
                <!-- Total Waste Converted and Total Waste -->
                <div class="card mb-3 flex-fill">
                    <div class="card-body">
                        <h5><strong>Total waste converted (kg/day)</strong></h5>
                        <h1 class="mt-2 mb-3 display-2 fw-bold">0 kg</h1>
                        <div class="d-flex justify-content-between align-items-center">
                            <span>0 vs last week</span>
                            <div class="text-success rounded-pill p-1 border border-success">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: currentColor;transform: ;msFilter:;"><path d="m18.707 12.707-1.414-1.414L13 15.586V6h-2v9.586l-4.293-4.293-1.414 1.414L12 19.414z"></path></svg>
                                0%
                            </div>
                        </div>
                        
                    </div>
                </div>
        
                <div class="card flex-fill">
                    <div class="card-body">
                        <h5><strong>Total waste (kg/week)</strong></h5>
                        <h1 class="mt-2 mb-3 display-2 fw-bold" id="currentTotal">0 kg</h1>
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="waste-difference">0 vs last week</span>
                            <div class="percentage-container text-success rounded-pill p-1 border border-success">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: currentColor;">
                                    <path d="M18.707 12.707l-1.414-1.414L13 15.586V6h-2v9.586l-4.293-4.293-1.414 1.414L12 19.414z"></path>
                                </svg>
                                <span>0%</span>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>

        <div class="row">
            <!-- Waste Generation Weekly Breakdown -->
            <div class="col-lg-6">
                <div class="card">
                    <div class="flex-wrap card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h5 class="card-title" id="wgbreak"><strong>Waste Generation Daily Breakdown</strong></h5>            
                        </div>   
                        <div class="form-group">
                            <select class="form-select text-gray" id="timeframeSelect2" aria-label="Select Timeframe">
                                <option value="day">Daily</option>
                                <option value="week">Weekly</option>
                                <option value="month">Monthly</option>
                                <option value="year">Yearly</option>
                            </select>
                        </div>
                    </div>
                    <div class="card-body" style="padding-top: 0;">
                        <div class="row d-flex align-items-center">
                            <!-- Chart Section -->
                            <div id="smyChart" class="col-md-8 col-sm-8 smyChart" style="min-height: 208.7px; padding-left: 0;">
                                <!-- Chart will be inserted here -->
                            </div>
                            
                            <!-- Text Section -->
                            <div class="col-md-4 col-sm-4 text-black" style="padding-left: 0;">
                                <p id="displayDate" class="text-start mb-0"></p> <!-- This will be updated dynamically -->
                                <hr>
                                <p class="mb-1 d-flex justify-content-between">
                                    <span>Biodegradable</span> 
                                    <span id="biodegradableCount"></span> <!-- Dynamic biodegradable count -->
                                </p>
                                <p class="mb-1 d-flex justify-content-between">
                                    <span>Residuals</span> 
                                    <span id="residualCount"></span> <!-- Dynamic residual count -->
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    
            <!-- Calendar -->
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <!-- Insert calendar here -->
                        <div id="calendar"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Footer Section Start -->
    @include('partials.footer')
    <!-- Footer Section End -->    
</main>

<script src='https://cdn.jsdelivr.net/npm/fullcalendar/index.global.min.js'></script>

<script>
    $(document).ready(function() {

        function fetchWasteDataForInfo() {
            $.ajax({
                url: '/admin/dashboard/fetchWasteDataForInfo',
                type: 'GET',
                success: function(response) {
                    // Update the total waste count
                    $('#currentTotal').text(response.currentWeekTotal + ' kg');
                    
                    // Update the difference vs last week
                    let differenceText = response.difference >= 0 
                        ? '+' + response.difference + ' vs last week' 
                        : response.difference + ' vs last week';
                    $('.waste-difference').text(differenceText);
                    
                    // Update the percentage and icon
                    let percentageText = Math.abs(response.percentageChange).toFixed(2) + '%';
                    let percentageContainer = $('.percentage-container');
                    percentageContainer.find('span').text(percentageText);

                    // Update icon and color based on positive/negative change
                    if (response.percentageChange >= 0) {
                        // Remove negative styles, add positive styles
                        percentageContainer.removeClass('text-danger border-danger')
                            .addClass('text-success border-success');
                        
                        // Update icon to show upward arrow
                        percentageContainer.find('svg path').attr('d', 'M11 8.414V18h2V8.414l4.293 4.293 1.414-1.414L12 4.586l-6.707 6.707 1.414 1.414z');
                        
                        // Update percentage text (no positive sign)
                        percentageContainer.find('span').text(response.percentageChange.toFixed(2) + '%');

                    } else {
                        // Remove positive styles, add negative styles
                        percentageContainer.removeClass('text-success border-success')
                            .addClass('text-danger border-danger');
                        
                        // Update icon to show downward arrow
                        percentageContainer.find('svg path').attr('d', 'M18.707 12.707l-1.414-1.414L13 15.586V6h-2v9.586l-4.293-4.293-1.414 1.414L12 19.414z');
                        
                        // Update percentage text (show negative sign)
                        percentageContainer.find('span').text(response.percentageChange.toFixed(2) + '%');
                    }

                },
                error: function(xhr) {
                    console.error(xhr.responseText);
                }
            });
        }

        // Call the function when the page loads
        fetchWasteDataForInfo();


        var calendarEl = document.getElementById('calendar');

        var calendar = new FullCalendar.Calendar(calendarEl, {
            dayMaxEvents: 3,
            contentHeight: "auto",
            initialView: 'dayGridMonth', // Month view
            headerToolbar: {
                left: 'prev',
                center: 'title',
                right: 'next'
            },
            events: {
                url: "{{ route('cs.events') }}",
                method: 'GET',
                failure: function() {
                    alert('There was an error while fetching events!');
                }
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
                    placement: 'top', // Tooltip will appear above the event
                    trigger: 'hover', // Show tooltip on hover
                    container: 'body' // Append tooltip to the body to avoid CSS issues
                });
            },
            
        });

        calendar.render();

        fetchData('week');

        fetchHighestWasteGenerated();

        function fetchHighestWasteGenerated() {
            $.ajax({
                url: '/admin/dashboard/highest-weekly',
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    let list = '';

                    if (data.length === 0) {
                        // If there is no data, show a message
                        list = `<li class="list-group-item text-center">No data found</li>`;
                    } else {
                        data.forEach(function(item, index) {
                            const rankBadge = index === 0 ? 'bg-danger' : 'bg-warning'; // First is red, others are yellow
                            const rankBadge2 = index === 0 ? 'danger' : 'warning'; // First is red, others are yellow
                            
                            // Display name with total metrics (e.g., Brgy 3 | 30 kg/s)
                            list += `
                                <li class="rounded-pill mb-4 border border-${rankBadge2} list-group-item d-flex justify-content-between align-items-center">
                                    <span class="fs-5 badge ${rankBadge} rounded-pill">${index + 1}</span>
                                    ${item.name} | ${item.total_metrics} kg/s
                                </li>`;
                        });
                    }
                    $('.scrollable-list ul').html(list);
                },
                error: function(xhr, status, error) {
                    console.error('Failed to fetch data:', error);
                    // Optionally display a message for errors
                    $('.scrollable-list ul').html(`<li class="list-group-item text-center">Error fetching data</li>`);
                }
            });
        }


        let chart;  // Declare the chart variable globally

        // Handle timeframe selection change
        $('#timeframeSelect').on('change', function() {
            var timeframe = $(this).val();
            fetchData(timeframe);
        });

        // Fetch data initially for the default 'daily' timeframe
        function fetchData(timeframe) {
            $.ajax({
                url: '/admin/dashboard/waste-composition-data',
                method: 'GET',
                data: { timeframe: timeframe },
                success: function(response) {
                    // Update the chart with the new data
                    updateChart(response.categories, response.series);
                }
            });
        }

        var options = {
            series: [{
                name: "Waste Generated"
            }],
            chart: {
                height: 350,
                type: 'line',
                zoom: {
                    enabled: true
                }
            },
            dataLabels: {
                enabled: false
            },
            stroke: {
                curve: 'straight'
            },
            grid: {
                row: {
                    colors: ['#f3f3f3', 'transparent'],
                    opacity: 0.5
                },
            }
        };

        // Create the new chart instance
        chart = new ApexCharts(document.querySelector("#myChart"), options);
        chart.render();

        function updateChart(categories, data) {
            // If chart exists, destroy it before creating a new one
            if (chart) {
                chart.destroy();
            }

            var options = {
                series: [{
                    name: "Waste Generated",
                    data: data
                }],
                chart: {
                    height: 350,
                    type: 'line',
                    zoom: {
                        enabled: true
                    }
                },
                dataLabels: {
                    enabled: false
                },
                stroke: {
                    curve: 'straight'
                },
                grid: {
                    row: {
                        colors: ['#f3f3f3', 'transparent'],
                        opacity: 0.5
                    },
                },
                xaxis: {
                    categories: categories
                }
            };

            // Create the new chart instance
            chart = new ApexCharts(document.querySelector("#myChart"), options);
            chart.render();
        }

        var colors = ['#01A94D', '#3B8AFF'];

        // Initial chart options
        var options2 = {
            series: [{
                name: "Waste Generated",
                data: [0, 0] // Placeholder values, will be updated via AJAX
            }],
            chart: {
                height: 350,
                type: 'bar',
                events: {
                    click: function(chart, w, e) {
                        // Click events if needed
                    }
                }
            },
            colors: colors,
            plotOptions: {
                bar: {
                    columnWidth: '45%',
                    distributed: true,
                }
            },
            dataLabels: {
                enabled: false
            },
            legend: {
                show: false
            },
            xaxis: {
                categories: ['Biodegradables', 'Residuals'],
                labels: {
                    style: {
                        colors: colors,
                        fontSize: '12px',
                        fontWeight: 'bold'
                    }
                }
            }
        };

        // Create the chart with initial configuration
        var chart2 = new ApexCharts(document.querySelector("#smyChart"), options2);
        chart2.render();

        // Function to fetch data based on the selected timeframe and update the chart
        function fetchWasteData(timeframe) {
            $.ajax({
                url: '/admin/dashboard/getWasteData',
                type: 'GET',
                data: { timeframe: timeframe },
                success: function(response) {
                    // Update the displayed date and waste data
                    $('#displayDate').text(response.dateLabel); // Update the date display
                    $('#biodegradableCount').text(response.biodegradable + ' kg/s');
                    $('#residualCount').text(response.residual + ' kg/s');

                    // Update the chart with new data
                    chart2.updateSeries([{
                        data: [response.biodegradable, response.residual]
                    }]);

                    // Update the card-title based on the selected timeframe
                    let timeframeText = '';
                    switch (timeframe) {
                        case 'day':
                            timeframeText = 'Waste Generation Daily Breakdown';
                            break;
                        case 'week':
                            timeframeText = 'Waste Generation Weekly Breakdown';
                            break;
                        case 'month':
                            timeframeText = 'Waste Generation Monthly Breakdown';
                            break;
                        case 'year':
                            timeframeText = 'Waste Generation Yearly Breakdown';
                            break;
                        default:
                            timeframeText = 'Waste Generation Breakdown'; // Default fallback
                    }
                    $('#wgbreak').text(timeframeText); // Update the card-title text
                    $('#wgbreak').addClass('fw-bold');
                },
                error: function(xhr) {
                    console.error(xhr.responseText);
                }
            });
        }

        // Fetch the data when the page loads with default timeframe 'day'
        fetchWasteData('day');

        // Fetch the data when the user changes the timeframe and update the card-title
        $('#timeframeSelect2').change(function() {
            var selectedTimeframe = $(this).val();
            fetchWasteData(selectedTimeframe);
        });

    });
    
</script>
@endsection