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
                                <h1><strong>Analytics</strong></h1>
                                <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="{{ route('dashboard')}}">Dashboard</a></li>
                                        <li class="breadcrumb-item active text-white" aria-current="page">Analytics</li>
                                    </ol>
                                </nav>
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
            <div class="col-lg-12">
                <div class="card flex-fill">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h5 class="card-title" id="wgbreakBrgy"><strong>Projected Waste Generation per Barangay for the Upcoming Month</strong></h5>            
                        </div>
                    </div>
                    <div class="card-body">
                        <canvas id="wastePredictionChartBrgy" width="400" height="200"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-6">
                <div class="card flex-fill">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h5 class="card-title" id="wgbreak"><strong>Comprehensive Waste Generation Forecast</strong></h5>            
                        </div>
                    </div>
                    <div class="card-body">
                        <canvas id="wastePredictionChart" width="400" height="200"></canvas>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="card flex-fill">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h5 class="card-title" id="bpbreak"><strong>Anticipated Byproduct Outputs for the Upcoming Month</strong></h5>            
                        </div>
                    </div>
                    <div class="card-body">
                        <canvas id="byProductsChart" width="400" height="200"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Footer Section Start -->
    @include('partials.footer')
    <!-- Footer Section End -->    
</main>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    // async function fetchPredictionData() {
    //     try {
    //         const response = await fetch("https://a8f2-139-135-241-49.ngrok-free.app/predict-next-month", {
    //             headers: {
    //                 'ngrok-skip-browser-warning': 'true'
    //             }
    //         });
    //         if (!response.ok) {
    //             throw new Error("Network response was not ok");
    //         }
    //         const data = await response.json();
    //         updateChart(data); // Call function to update chart with fetched data
    //         // updateMetricsTable(data.performance_metrics); // Pass only the performance_metrics part
    //     } catch (error) {
    //         console.error("Error fetching prediction data:", error);
    //     }
    // }

    // const ctx = document.getElementById('wastePredictionChart').getContext('2d');
    // const wastePredictionChart = new Chart(ctx, {
    //     type: 'bar',
    //     data: {
    //         labels: [], // Will be updated with fetched data
    //         datasets: [
    //             {
    //                 label: 'Biodegradable',
    //                 data: [],
    //                 backgroundColor: 'rgba(75, 192, 192, 0.6)',
    //             },
    //             {
    //                 label: 'Residual',
    //                 data: [],
    //                 backgroundColor: 'rgba(255, 99, 132, 0.6)',
    //             },
    //             {
    //                 label: 'Recyclable', // New dataset for recyclable waste
    //                 data: [],
    //                 backgroundColor: 'rgba(54, 162, 235, 0.6)',
    //             },
    //         ],
    //     },
    //     options: {
    //         responsive: true,
    //         scales: {
    //             y: {
    //                 beginAtZero: true,
    //                 title: { display: true, text: 'Metrics (kg)' }
    //             },
    //             x: {
    //                 title: { display: true, text: 'Prediction Period' }
    //             }
    //         }
    //     }
    // });

    // Function to update the chart with data from FastAPI
    // function updateChart(data) {
    //     // Convert start_date to a Date object
    //     const startDate = new Date(data.start_date);

    //     // Extract month and year from start_date
    //     const startMonth = startDate.toLocaleDateString('en-US', { month: 'long' });
    //     const startYear = startDate.getFullYear();

    //     // Set labels to show the prediction period in month and year format
    //     wastePredictionChart.data.labels = [`${startMonth} ${startYear}`];
        
    //     // Update the dataset values
    //     wastePredictionChart.data.datasets[0].data = [data.biodegradable];
    //     wastePredictionChart.data.datasets[1].data = [data.residual];
    //     wastePredictionChart.data.datasets[2].data = [data.recyclable]; // Update recyclable dataset
        
    //     // Refresh the chart to display updated data
    //     wastePredictionChart.update();
    // }

    // // Fetch data from FastAPI when the page loads
    // window.onload = fetchPredictionData;

    document.addEventListener('DOMContentLoaded', function() {
        fetch('{{ route("brgyWastePrediction") }}')
            .then(response => response.json())
            .then(data => {
                // console.log('Fetched data:', data); // Log the fetched data for debugging

                // Check if data is an array
                if (!Array.isArray(data)) {
                    console.error('Expected an array but got:', data);
                    return;
                }

                const labels = [];
                const predictedWaste = [];

                data.forEach(item => {
                    labels.push(item.barangay);
                    predictedWaste.push(item.predicted_waste);
                    predictionDate = item.prediction_date;
                });

                const ctx3 = document.getElementById('wastePredictionChartBrgy').getContext('2d');
                const wastePredictionChartBrgy = new Chart(ctx3, {
                    type: 'bar',
                    data: {
                        labels: labels,
                        datasets: [{
                            label: 'Predicted Waste (kg)',
                            data: predictedWaste,
                            backgroundColor: 'rgba(75, 192, 192, 0.2)',
                            borderColor: 'rgba(75, 192, 192, 1)',
                            borderWidth: 1
                        }]
                    },
                    options: {
                        scales: {
                            y: {
                                beginAtZero: true,
                                title: {
                                    display: true,
                                    text: 'Waste (kg)'
                                }
                            },
                            x: {
                                title: {
                                    display: true,
                                    text: `Barangay (Prediction Date: ${predictionDate})`
                                }
                            }
                        }
                    }
                });
            })
            .catch(error => console.error('Error fetching data:', error));

        fetch('{{ route("byProductsPrediction") }}')
            .then(response => response.json())
            .then(data => {
                // console.log('Fetched data:', data); // Log the fetched data for debugging

                const labels = [];
                const organicFertilizerData = [];
                const hollowBlocksData = [];
                const bricksData = [];

                const groupedData = {};

                data.forEach(item => {
                    if (!groupedData[item.prediction_date]) {
                        groupedData[item.prediction_date] = {
                            'Organic Fertilizer': 0,
                            'Hollow Blocks': 0,
                            'Bricks': 0
                        };
                    }
                    groupedData[item.prediction_date][item.conversion_method] = Math.round(item.predicted_metrics);
                });

                Object.keys(groupedData).forEach(date => {
                    labels.push(date);
                    organicFertilizerData.push(groupedData[date]['Organic Fertilizer']);
                    hollowBlocksData.push(groupedData[date]['Hollow Blocks']);
                    bricksData.push(groupedData[date]['Bricks']);
                });

                const ctx2 = document.getElementById('byProductsChart').getContext('2d');
                const byProductsPredictionChart = new Chart(ctx2, {
                    type: 'bar',
                    data: {
                        labels: labels,
                        datasets: [
                            {
                                label: 'Organic Fertilizer',
                                data: organicFertilizerData,
                                backgroundColor: 'rgba(75, 192, 192, 0.6)',
                            },
                            {
                                label: 'Hollow Blocks',
                                data: hollowBlocksData,
                                backgroundColor: 'rgba(255, 99, 132, 0.6)',
                            },
                            {
                                label: 'Bricks',
                                data: bricksData,
                                backgroundColor: 'rgba(54, 162, 235, 0.6)',
                            },
                        ],
                    },
                    options: {
                        responsive: true,
                        scales: {
                            y: {
                                beginAtZero: true,
                                title: { display: true, text: 'Metrics (kg)' }
                            },
                            x: {
                                title: { display: true, text: 'Prediction Period' }
                            }
                        },
                        plugins: {
                            tooltip: {
                                callbacks: {
                                    label: function(context) {
                                        let label = context.dataset.label || '';
                                        if (label) {
                                            label += ': ';
                                        }
                                        if (context.parsed.y !== null) {
                                            label += context.parsed.y + ' kg';
                                        }
                                        return label;
                                    }
                                }
                            }
                        }
                    }
                });
            })
            .catch(error => console.error('Error fetching data:', error));

        fetch('{{ route("wastePrediction") }}')
            .then(response => response.json())
            .then(data => {
                // console.log('Fetched data:', data); // Log the fetched data for debugging

                const labels = [];
                const biodegradableData = [];
                const residualData = [];
                const recyclableData = [];

                const groupedData = {};

                data.forEach(item => {
                    if (!groupedData[item.prediction_date]) {
                        groupedData[item.prediction_date] = {
                            'Biodegradable': 0,
                            'Residual': 0,
                            'Recyclable': 0
                        };
                    }
                    groupedData[item.prediction_date][item.waste_type] = item.predicted_metrics;
                });

                Object.keys(groupedData).forEach(date => {
                    labels.push(date);
                    biodegradableData.push(groupedData[date]['Biodegradable']);
                    residualData.push(groupedData[date]['Residual']);
                    recyclableData.push(groupedData[date]['Recyclable']);
                });

                const ctx = document.getElementById('wastePredictionChart').getContext('2d');
                const wastePredictionChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: labels,
                        datasets: [
                            {
                                label: 'Biodegradable',
                                data: biodegradableData,
                                backgroundColor: 'rgba(75, 192, 192, 0.6)',
                            },
                            {
                                label: 'Residual',
                                data: residualData,
                                backgroundColor: 'rgba(255, 99, 132, 0.6)',
                            },
                            {
                                label: 'Recyclable',
                                data: recyclableData,
                                backgroundColor: 'rgba(54, 162, 235, 0.6)',
                            },
                        ],
                    },
                    options: {
                        responsive: true,
                        scales: {
                            y: {
                                beginAtZero: true,
                                title: { display: true, text: 'Metrics (kg)' }
                            },
                            x: {
                                title: { display: true, text: 'Prediction Period' }
                            }
                        }
                    }
                });
            })
            .catch(error => console.error('Error fetching data:', error));
    });
</script>

@endsection