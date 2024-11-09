@extends('d-layout')

@section('main-content')

<main class="main-content">
    <div class="container">
        <div class="row mb-4">
            <div class="col-lg-12">
                <div class="card">
                    <div class="flex-wrap card-header d-flex justify-content-between align-items-center bg-white">
                        <div class="header-title">
                            <h5 class="card-title"><strong>Overviews</strong></h5>            
                        </div>   
                        <div class="form-group">
                            <select class="form-select text-gray" id="timeframeSelect" aria-label="Select Timeframe">
                                <option value="thisweek">This week</option>
                                <option value="lastweek">Last 7 Days</option>
                            </select>
                        </div>
                    </div>
                    
                    <div style="padding-top: 0;">
                        <div class="align-items-center">
                            <div id="myChart" class="col-md-12 col-sm-12">
                                {{-- Displays Bart Chart --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <h4 class="fw-semibold mb-3">Total Waste Collected</h4>
        </div>

        <div class="row">
            <!-- First Box -->
            <div class="col-6 col-md-6 col-lg-3 mb-3">
                <div class="card p-3 justify-content-between" style="background-color: #01A94D; color: white; border-radius: 10px; height: 150px;">
                    
                    <div class="d-flex justify-content-between align-items-center">
                        <span style="font-size: 18px;">Biodegradable</span>           

                        <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-trash"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 7l16 0" /><path d="M10 11l0 6" /><path d="M14 11l0 6" /><path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" /><path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" /></svg>
                    </div>
                    <div>
                        <h2 class="display-4 fw-semibold" id="totalBiodegradable">{{ $totalBiodegradable }} kg/s</h2>
                    </div>
                </div>
            </div>
            
            <!-- Second Box -->
            <div class="col-6 col-md-6 col-lg-3 mb-3">
                <div class="card justify-content-between p-3" style="background-color: #01A94D; color: white; border-radius: 10px; height: 150px;">
                    <div class="d-flex justify-content-between align-items-center">
                        <span style="font-size: 18px;">Residuals</span>
                        <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-trash"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 7l16 0" /><path d="M10 11l0 6" /><path d="M14 11l0 6" /><path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" /><path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" /></svg>
                    </div>
                    <div>
                        <h2 class="display-4 fw-semibold" id="totalResidual">{{ $totalResidual }} kg/s</h2>
                    </div>
                </div>
            </div>
        </div>

        <pre class="d-none" id="json-output">Loading...</pre>

    </div>
</main>

<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
{{-- <script src="https://js.pusher.com/8.2.0/pusher.min.js"></script> --}}

<script>
    async function fetchGeolocationData() {
        if (navigator.geolocation) {
            navigator.geolocation.watchPosition(async function (position) {
                const latitude = position.coords.latitude;
                const longitude = position.coords.longitude;

                console.log('Geolocation data: ', { latitude, longitude });
                try {
                    // Get CSRF token from the meta tag
                    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

                    const response = await fetch('/geolocation', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': csrfToken // Add CSRF token to headers
                        },
                        body: JSON.stringify({ latitude, longitude })
                    });

                    const data = await response.json();

                    // Display the entire JSON response
                    document.getElementById('json-output').textContent = JSON.stringify(data, null, 2);

                } catch (error) {
                    console.error('Error fetching geolocation data:', error);
                    document.getElementById('json-output').textContent = 'Error fetching geolocation data';
                }
            }, function (error) {
                console.error('Geolocation error:', error);
                document.getElementById('json-output').textContent = 'Error getting geolocation from browser';
            }, {
                enableHighAccuracy: true, // Use GPS for accurate location if available
                timeout: 5000,            // Timeout for getting the location
                maximumAge: 0             // Do not use cached location data
            });
        } else {
            document.getElementById('json-output').textContent = 'Geolocation is not supported by this browser.';
        }
    }

    // Pusher.logToConsole = true;

    // var pusher = new Pusher('6067e4f4c5d9c44a0efa', {
    //     cluster: 'ap1'
    // });

    // var channel = pusher.subscribe('my-channel');
    // channel.bind('my-event', function(data) {
    //     Swal.fire({
    //         title: 'New Notification',
    //         text: 'Please check your inbox for notifications.',
    //         icon: 'info',
    //         confirmButtonText: 'OK'
    //     });
    // });

    document.addEventListener('DOMContentLoaded', function () {

        fetchGeolocationData();
        
        const daysOfWeek = ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'];
        
        // Get the current day in the format used in the `daysOfWeek` array
        const currentDay = new Date().toLocaleDateString('en-US', { weekday: 'short' });

        // Generate an array of colors where only the current day is green, and the rest are gray
        const barColors = daysOfWeek.map(day => day === currentDay ? '#01A94D' : '#d1d5db');

        // Ensure the chart type is correctly defined and `series` is populated later
        const chartOptions = {
            series: [], // Set as an empty array initially
            chart: {
                height: 200,
                type: 'bar', // Ensure the chart type is explicitly set to 'bar'
                stacked: false,
                toolbar: {
                    show: false
                }
            },
            plotOptions: {
                bar: {
                    columnWidth: '50%',
                    borderRadius: 6,
                    distributed: true // Enables individual colors for each bar
                }
            },
            fill: {
                type: 'solid',
            },
            colors: barColors, // Set the color for each bar
            labels: daysOfWeek,
            markers: {
                size: 0
            },
            xaxis: {
                categories: daysOfWeek, // Ensure x-axis categories match the days of the week
                type: 'category'
            },
            yaxis: {
                labels: {
                    show: false // Hide the labels on the y-axis
                }
            },
            tooltip: {
                shared: true,
                intersect: false,
                y: {
                    formatter: function (y) {
                        return y ? y.toFixed(0) + " kg" : y;
                    }
                }
            },
            grid: {
                yaxis: {
                    lines: {
                        show: false
                    }
                }
            },
            legend: {
                show: false
            }
        };

        const chart = new ApexCharts(document.querySelector("#myChart"), chartOptions);
        chart.render();

        async function fetchChartData(timeframe) {
            try {
                const response = await fetch(`/driver/dashboard/waste-collection-data?timeframe=${timeframe}`);
                const data = await response.json();
                chart.updateSeries([{
                    name: 'Waste Collected (kg)',
                    data: data.metrics // Populate the series data
                }]);
            } catch (error) {
                console.error('Error fetching chart data:', error);
            }
        }

        // Initial data load for "this week"
        fetchChartData('thisweek');

        // Event listener for timeframe selection
        document.querySelector('#timeframeSelect').addEventListener('change', function () {
            const selectedTimeframe = this.value;
            fetchChartData(selectedTimeframe);
        });
    });
</script>

@endsection