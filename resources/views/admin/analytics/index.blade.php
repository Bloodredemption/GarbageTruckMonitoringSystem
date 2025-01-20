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
            <div class="col-lg-6">
                <div class="card flex-fill">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h5 class="card-title" id="wgbreak"><strong>Overall Waste Generation Forecasting</strong></h5>            
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
                            <h5 class="card-title" id="wgbreakBrgy"><strong>Waste Generation Each Barangay</strong></h5>            
                        </div>
                        
                    </div>
                    <div class="card-body">
                        <canvas id="wastePredictionChartBrgy" width="400" height="200"></canvas>
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
        // Convert start_date to a Date object
        const startDate = new Date(data.start_date);

        // Extract month and year from start_date
        const startMonth = startDate.toLocaleDateString('en-US', { month: 'long' });
        const startYear = startDate.getFullYear();

        // Set labels to show the prediction period in month and year format
        wastePredictionChart.data.labels = [`${startMonth} ${startYear}`];
        
        // Update the dataset values
        wastePredictionChart.data.datasets[0].data = [data.biodegradable];
        wastePredictionChart.data.datasets[1].data = [data.residual];
        wastePredictionChart.data.datasets[2].data = [data.recyclable]; // Update recyclable dataset
        
        // Refresh the chart to display updated data
        wastePredictionChart.update();
    }

    // Fetch data from FastAPI when the page loads
    window.onload = fetchPredictionData;
</script>
@endsection