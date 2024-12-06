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
        
            <div class="col-lg-6">
                <div class="col-lg-12">
                    <!-- Total Waste Converted and Total Waste -->
                    <div class="card mb-3 flex-fill">
                        <div class="card-body">
                            <h5><strong>Total waste converted (kg/day)</strong></h5>
                            <h1 class="mt-2 mb-3 display-2 fw-bold" id="totalThisDay">0 kg</h1>
                            <div class="d-flex justify-content-between align-items-center">
                                <span id="wasteDiff">0 vs last week</span>
                                <div id="percentageContainer" class="text-success rounded-pill p-1 border border-success">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: currentColor;transform: ;msFilter:;">
                                        <path d="m18.707 12.707-1.414-1.414L13 15.586V6h-2v9.586l-4.293-4.293-1.414 1.414L12 19.414z"></path>
                                    </svg>
                                    <span>0%</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
    
                <div class="col-lg-12">
                    <div class="card flex-fill">
                        <div class="card-body">
                            <h5><strong>Total waste collected (kg/week)</strong></h5>
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
        </div>

        <div class="row mb-3">
            <div class="col-lg-12">
                <div class="card mb-3 flex-fill">
                    <div class="flex-wrap card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h5 class="card-title"><strong>Highest Waste Zone Diagnostic Analytics</strong></h5>            
                        </div>
                        
                    </div>
                    <div class="card-body" style="padding-top: 0;">
                        <div class="flex-wrap d-flex align-items-center justify-content-between">
                            <div id="diagnosticChart" class="col-md-6 col-sm-6 diagnosticChart p-2" style="min-height: 208.7px;">
                                {{-- Chart will render here --}}
                            </div>
                            <div class="col-md-6 p-2 ml-6">
                                <div class="table-responsive" style="max-height: 400px; overflow-y: auto;">
                                    <table class="table" id="diagnosticTable">
                                        <thead>
                                            <tr>
                                                <th scope="col">Barangay</th>
                                                <th scope="col">Factors</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            {{-- Table data will render here --}}
                                        </tbody>
                                    </table>
                                </div>
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
                                <p class="mb-1 d-flex justify-content-between">
                                    <span>Recyclables</span> 
                                    <span id="recyclableCount"></span> <!-- Dynamic residual count -->
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    
            <div class="col-lg-6">
                <div class="card flex-fill">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h5 class="card-title" id="wgbreak"><strong>Waste Generation Forecasting</strong></h5>            
                        </div>
                        <div>
                            <a href="#" data-bs-toggle="modal" data-bs-target="#performanceReportModal">View Performance Report</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <canvas id="wastePredictionChart" width="400" height="200"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <!-- Calendar -->
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <!-- Insert calendar here -->
                        <div id="calendar"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="modal fade" id="performanceReportModal" tabindex="-1" aria-labelledby="performanceReportModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="performanceReportModalLabel">Performance Report</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Content for the performance report goes here -->
                    <div class="table-responsive">
                        <table id="performanceMetricstbl" class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Metric</th>
                                    <th scope="col">Value</th>
                                    <th scope="col">Description</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr id="mseRow">
                                    <td>MSE</td>
                                    <td id="mseValue"></td>
                                    <td id="mseDescription"></td>
                                </tr>
                                <tr id="maeRow">
                                    <td>MAE</td>
                                    <td id="maeValue"></td>
                                    <td id="maeDescription"></td>
                                </tr>
                                <tr id="smapeRow">
                                    <td>sMAPE</td>
                                    <td id="smapeValue"></td>
                                    <td id="smapeDescription"></td>
                                </tr>
                                <tr id="accuracyRow">
                                    <td>Accuracy</td>
                                    <td id="accuracyValue"></td>
                                    <td id="accuracyDescription"></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer Section Start -->
    @include('partials.footer')
    <!-- Footer Section End -->    
</main>

<script src='https://cdn.jsdelivr.net/npm/fullcalendar/index.global.min.js'></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    async function fetchPredictionData() {
        try {
            const response = await fetch("http://127.0.0.1:8000/predict-next-month");
            if (!response.ok) {
                throw new Error("Network response was not ok");
            }
            const data = await response.json();
            updateChart(data); // Call function to update chart with fetched data
            updateMetricsTable(data.performance_metrics); // Pass only the performance_metrics part
        } catch (error) {
            console.error("Error fetching prediction data:", error);
        }
    }

    // Function to update the performance metrics table
    function updateMetricsTable(metrics) {
        // Update MSE row
        const mseValue = metrics.mse; 
        document.getElementById('mseValue').textContent = mseValue.toFixed(2); // Format to two decimal places
        document.getElementById('mseDescription').innerHTML = getMseDescription(mseValue);

        // Update MAE row
        const maeValue = metrics.mae;
        document.getElementById('maeValue').textContent = maeValue.toFixed(2); // Format to two decimal places
        document.getElementById('maeDescription').innerHTML = getMaeDescription(maeValue);

        // Update sMAPE row
        const smapeValue = metrics.mape;
        document.getElementById('smapeValue').textContent = smapeValue.toFixed(2) + '%'; // Format to two decimal places
        document.getElementById('smapeDescription').innerHTML = getSmapeDescription(smapeValue);

        // Update Accuracy row
        const accuracyValue = metrics.accuracy;
        document.getElementById('accuracyValue').textContent = accuracyValue.toFixed(2); // Format to two decimal places
        document.getElementById('accuracyDescription').innerHTML = getAccuracyDescription(accuracyValue);
    }

    // Functions to generate dynamic descriptions based on metric values

    function getMseDescription(value) {
        if (value < 1000) {
            return "A lower value indicates better model accuracy. In this case, the MSE is quite low, suggesting good model performance.";
        } else if (value < 2000) {
            return "A moderate value for MSE, indicating a reasonable level of prediction error.";
        } else {
            return "A higher MSE suggests significant prediction error. This could indicate room for model improvement.";
        }
    }

    function getMaeDescription(value) {
        if (value < 10) {
            return "A lower value means the predictions are closer to the actual values. This suggests highly accurate predictions.";
        } else if (value < 50) {
            return "An average MAE, indicating moderate prediction accuracy with room for improvement.";
        } else {
            return "A higher MAE value suggests that, on average, the model’s predictions are off by a significant margin.";
        }
    }

    function getSmapeDescription(value) {
        if (value < 10) {
            return "A very low sMAPE indicates highly accurate predictions, with the model being close to actual values.";
        } else if (value < 30) {
            return "A reasonable sMAPE indicating moderate prediction error, but still acceptable in many cases.";
        } else {
            return "A higher sMAPE suggests a significant discrepancy between predicted and actual values, indicating a need for improvement.";
        }
    }

    function getAccuracyDescription(value) {
        if (value >= 0.9) {
            return "An R² value close to 1 indicates that the model explains almost all of the variance in the data, suggesting excellent model performance.";
        } else if (value >= 0.7) {
            return "An R² value above 0.7 indicates good model performance, explaining a large portion of the variance.";
        } else if (value >= 0.5) {
            return "An R² value of 0.5 suggests moderate performance, with significant room for improvement.";
        } else {
            return "An R² value below 0.5 indicates that the model is only explaining a small portion of the variance, suggesting poor model performance.";
        }
    }

    const ctx = document.getElementById('wastePredictionChart').getContext('2d');
    const wastePredictionChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: [], // Will be updated with fetched data
            datasets: [
                {
                    label: 'Biodegradable Waste',
                    data: [],
                    backgroundColor: 'rgba(75, 192, 192, 0.6)',
                },
                {
                    label: 'Residual Waste',
                    data: [],
                    backgroundColor: 'rgba(255, 99, 132, 0.6)',
                },
                {
                    label: 'Recyclable Waste', // New dataset for recyclable waste
                    data: [],
                    backgroundColor: 'rgba(54, 162, 235, 0.6)',
                },
            ],
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true,
                    title: { display: true, text: 'Waste Metrics (kg)' }
                },
                x: {
                    title: { display: true, text: 'Prediction Period' }
                }
            }
        }
    });

    // Function to update the chart with data from FastAPI
    function updateChart(data) {
        // Set labels to show the prediction period
        wastePredictionChart.data.labels = [`${data.start_date} - ${data.end_date}`];
        
        // Update the dataset values
        wastePredictionChart.data.datasets[0].data = [data.biodegradable];
        wastePredictionChart.data.datasets[1].data = [data.residual];
        wastePredictionChart.data.datasets[2].data = [data.recyclable]; // Update recyclable dataset
        
        // Refresh the chart to display updated data
        wastePredictionChart.update();
    }

    // Fetch data from FastAPI when the page loads
    window.onload = fetchPredictionData;


    function fetchTodayWasteConverted() {
        $.ajax({
            url: "{{ route('getTodayWasteConverted') }}",
            method: 'GET',
            success: function(response) {
                // Update total waste converted today
                $('#totalThisDay').text(response.totalWasteToday + ' kg');

                // Update waste difference compared to last week
                let diffText = response.wasteDifference + ' kg vs last week';
                $('#wasteDiff').text(diffText);

                // Update percentage difference
                let percentageText = response.percentageDifference + '%';
                $('#percentageContainer span').text(percentageText);

                // Apply a class based on whether the difference is positive or negative
                if (response.percentageDifference >= 0) {
                    $('#percentageContainer').removeClass('text-danger').addClass('text-success');
                } else {
                    $('#percentageContainer').removeClass('text-success').addClass('text-danger');
                }
            },
            error: function() {
                $('#totalThisDay').text('Error loading data');
                $('#wasteDiff').text('Error');
                $('#percentageContainer span').text('Error');
            }
        });
    }

    $(document).ready(function() {
        fetchTodayWasteConverted();

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
        let currentYear = new Date().getFullYear();

        var calendar = new FullCalendar.Calendar(calendarEl, {
            dayMaxEvents: 3,
            contentHeight: "auto",
            initialView: 'dayGridMonth', // Month view
            headerToolbar: {
                left: 'prev',
                center: 'title',
                right: 'next'
            },
            events: function(fetchInfo, successCallback, failureCallback) {
                // Fetch both user events and holidays
                $.ajax({
                    url: "{{ route('cs.events') }}",
                    method: 'GET',
                    success: function(userEvents) {
                        // Make an API call to get the holidays
                        $.ajax({
                            url: "https://calendarific.com/api/v2/holidays",
                            method: 'GET',
                            data: {
                                api_key: '4CaWSd2hOXKX8hLx9Q6yCFeFj7jHt5Wf',
                                country: 'PH',
                                year: currentYear
                            },
                            success: function(response) {
                                // Extract holidays and format them for FullCalendar
                                let holidayEvents = response.response.holidays.map(holiday => {
                                    return {
                                        title: holiday.name,
                                        start: holiday.date.iso,
                                        color: 'red', // Set a color for holidays
                                        rendering: 'background' // Optionally render holidays in the background
                                    };
                                });

                                // Combine user events and holiday events
                                successCallback([...userEvents, ...holidayEvents]);
                            },
                            error: function() {
                                alert('There was an error while fetching holidays!');
                                failureCallback();
                            }
                        });
                    },
                    error: function() {
                        alert('There was an error while fetching events!');
                        failureCallback();
                    }
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
                                    ${item.area_name} | ${item.total_metrics} kg/s
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

        var colors = ['#01A94D', '#3B8AFF', '#FFC107'];

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
                categories: ['Biodegradables', 'Residuals', 'Recyclables'],
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
                    $('#recyclableCount').text(response.recyclable + ' kg/s');

                    // Update the chart with new data
                    chart2.updateSeries([{
                        data: [response.biodegradable, response.residual, response.recyclable]
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

        $.ajax({
            url: '/admin/dashboard/getDiagnosticData',
            type: 'GET',
            success: function (response) {
                const diagnosticData = response.diagnosticData;

                // Render chart
                renderChart(diagnosticData);

                // Render table
                renderTable(diagnosticData);
            },
            error: function (xhr, status, error) {
                console.error("Error fetching data:", error);
            }
        });

        function renderChart(data) {
            const categories = data.map(item => item.area_name || "Unknown");
            const series = data.map(item => item.total_metrics);

            const options = {
                series: [{
                    data: series
                }],
                chart: {
                    height: 350,
                    type: 'bar',
                },
                colors: ['#ff0d0c', '#f95800', '#ffcc00', '#5b8201'], // Adjust as needed
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
                    categories: categories,
                    labels: {
                        style: {
                            fontSize: '12px'
                        }
                    }
                }
            };

            const chart = new ApexCharts(document.querySelector("#diagnosticChart"), options);
            chart.render();
        }

        function renderTable(data) {
            const tableBody = $('#diagnosticTable tbody');
            tableBody.empty(); // Clear existing table data

            data.forEach(item => {
                tableBody.append(`
                    <tr>
                        <td>${item.area_name || "Unknown"}</td>
                        <td>${item.event_name || "N/A"}</td>
                    </tr>
                `);
            });
        }
    });
    
</script>
@endsection