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
                                <h1><strong>Welcome, Landfill!</strong></h1>
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
                            <h5 class="card-title"><strong>Waste Converted Histogram</strong></h5>            
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
        
            <div class="col-lg-6 d-flex flex-column justify-content-between">
                <div class="card flex-fill">
                    <div class="flex-wrap card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h5 class="card-title"><strong>Waste Converted Composition <span id="totalConverted">(Total: 0 kg /Weekly)</span></strong></h5>            
                        </div>   
                        
                    </div>
                    <div class="card-body" style="padding-top: 0;">
                        <div class="row d-flex align-items-center">
                            <div id="wccChart" class="wccChart pt-4" style="padding-left: 0;">
                                <!-- Chart will be inserted here -->
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
                            <h5 class="card-title"><strong>Waste Conversion <span id="wgbreak">Daily</span> Breakdown</strong></h5>            
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
                                <p id="displayDate" class="text-start mb-0">October 25, 2024</p> <!-- This will be updated dynamically -->
                                <hr>
                                <p class="mb-1 d-flex justify-content-between">
                                    <span>Biodegradables</span> 
                                    <span id="biodegradableCount">0 kg/s</span> <!-- Dynamic biodegradable count -->
                                </p>
                                <p class="mb-1 d-flex justify-content-between">
                                    <span>Residuals</span> 
                                    <span id="residualCount">0 kg/s</span> <!-- Dynamic residual count -->
                                </p>
                                <p class="mb-1 d-flex justify-content-between">
                                    <span>Recyclables</span> 
                                    <span id="recyclableCount">0 kg/s</span> <!-- Dynamic residual count -->
                                </p>
                                <p class="mb-1 d-flex justify-content-between">
                                    <span>Hazards</span> 
                                    <span id="hazardCount">0 kg/s</span> <!-- Dynamic residual count -->
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
    $(document).ready(function(){
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

        // Data: series and labels
        function fetchWasteData() {
            fetch(`/landfill/dashboard/weeklyConvertedWaste`)
                .then(response => response.json())
                .then(data => {
                    let series = [];
                    let labels = [];
                    let metrics = [];
                    let totalMetrics = 0;

                    data.forEach(item => {
                        series.push(item.metrics);
                        labels.push(`${item.percentage}% ${item.waste_type}`);
                        metrics.push(item.metrics);
                        totalMetrics += item.metrics;
                    });

                    document.getElementById('totalConverted').innerText = `(Total: ${totalMetrics} kg / Weekly)`;

                    // Render the chart with the fetched data
                    renderChart(series, labels);
                })
                .catch(error => console.error('Error fetching waste data:', error));
        }

        // Function to render chart
        function renderChart(series, labels) {
            var options = {
                series: series,
                chart: {
                    width: '100%',
                    height: 300,
                    type: 'pie',
                },
                labels: labels,
                theme: {
                    monochrome: {
                        enabled: true,
                        color: '#28a745',
                    },
                },
                plotOptions: {
                    pie: {
                        dataLabels: {
                            offset: -5,
                        },
                    },
                },
                grid: {
                    padding: {
                        top: 0,
                        bottom: 0,
                        left: 0,
                        right: 0,
                    },
                },
                dataLabels: {
                    formatter(val, opts) {
                        return val.toFixed(1) + '%';
                    },
                },
                tooltip: {
                    y: {
                        formatter: function (value, { seriesIndex }) {
                            // Tooltip with kg value on hover
                            return `${value} kg`;
                        },
                    },
                },
                legend: {
                    show: true,
                },
            };

            var chart = new ApexCharts(document.querySelector("#wccChart"), options);
            chart.render();
        }

        // Call the function to fetch and display data
        fetchWasteData();
      
        var colors = ['#01A94D', '#3B8AFF', '#FFC107', '#FF5722'];
        
        var options2 = {
            series: [{
                data: []
            }],
            chart: {
                height: 350,
                type: 'bar',
                events: {
                    click: function(chart, w, e) {
                    // console.log(chart, w, e)
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
            categories: [
                'Biodegradable',
                'Residuals',
                'Recyclables',
                'Hazards',
            ],
            labels: {
                style: {
                colors: colors,
                fontSize: '12px'
                }
            }
            }
        };

        var chart2 = new ApexCharts(document.querySelector("#smyChart"), options2);
        chart2.render();

        document.getElementById('timeframeSelect2').addEventListener('change', function() {
            const timeframe = this.value;
            fetchWasteData2(timeframe);
        });

        fetchWasteData2('day');

        // Fetch and update data based on timeframe
        function fetchWasteData2(timeframe) {
            fetch(`/landfill/dashboard/fetchWasteData?timeframe=${timeframe}`)
                .then(response => response.json())
                .then(data => {
                    // Update title, date display, and counts
                    document.getElementById('wgbreak').textContent = data.breakdown;
                    document.getElementById('displayDate').textContent = data.displayDate;

                    document.getElementById('biodegradableCount').textContent = `${data.data.biodegradable} kg/s`;
                    document.getElementById('residualCount').textContent = `${data.data.residual} kg/s`;
                    document.getElementById('recyclableCount').textContent = `${data.data.recyclable} kg/s`;
                    document.getElementById('hazardCount').textContent = `${data.data.hazard} kg/s`;

                    // Update chart with new data
                    chart2.updateSeries([{
                        data: [
                            data.data.biodegradable,
                            data.data.residual,
                            data.data.recyclable,
                            data.data.hazard
                        ]
                    }]);
                })
                .catch(error => console.error('Error fetching data:', error));
        }

        var options3 = {
            series: [{
                name: "Desktops",
                data: []
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
                    colors: ['#f3f3f3', 'transparent'], // takes an array which will be repeated on columns
                    opacity: 0.5
                },
            },
            xaxis: {
                categories: [],
            }
        };

        var chart3 = new ApexCharts(document.querySelector("#myChart"), options3);
        chart3.render();

        document.getElementById('timeframeSelect').addEventListener('change', function() {
            const timeframe = this.value;
            fetchWasteSummary(timeframe);
        });

        fetchWasteSummary('week');

        function fetchWasteSummary(timeframe) {
            fetch(`/landfill/dashboard/fetchWasteSummary?timeframe=${timeframe}`)
                .then(response => response.json())
                .then(data => {
                    // Update the chart with fetched data
                    chart3.updateOptions({
                        xaxis: {
                            categories: data.categories
                        },
                        series: [{
                            name: "Waste Converted (kg)",
                            data: data.series
                        }]
                    });
                })
                .catch(error => console.error('Error fetching data:', error));
        }


    });
</script>

@endsection