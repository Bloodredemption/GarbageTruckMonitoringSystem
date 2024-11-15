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
                                <h1><strong>Vehicle Tracking</strong></h1>
                                <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="{{ route('dashboard')}}">Dashboard</a></li>
                                        <li class="breadcrumb-item active text-white" aria-current="page">Vehicle Tracking</li>
                                    </ol>
                                </nav>
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
            
            <div class="col-md-12 col-lg-12">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card" data-aos="fade-up" data-aos-delay="800">
                            <div class="flex-wrap card-header d-flex justify-content-between align-items-center">
                                {{-- <div class="header-title">
                                    <h4 class="card-title">Some Text Here</h4>
                                    <p class="mb-0">Sub Title Here</p>          
                                </div> --}}
                                
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-8">
                                        <button id="satelliteView">Satellite View</button>
                                        <button id="defaultView">Default View</button>
                                        <div id="map" style="height: 500px;"></div>
                                    </div>
                                    <div class="col-md-4" style="padding-left: 0; padding-right: 0;">
                                        <div class="border-1 mt-0">
                                            <div class="card-header" style="padding-top: 0;">
                                                <div class="flex-wrap d-flex justify-content-between align-items-center bg-white" style="padding-top: 0;">
                                                    <div class="header-title">
                                                        <h5 class="card-title"><strong>Today's Schedule <span id="currentDay">({{ $currentDayName }})</span></strong></h5>            
                                                    </div>   
                                                    <a href="{{ route('cs.index') }}">See All</a>
                                                </div>
                                                <p class="mb-0" id="currentDate">{{ $currentDateFormatted }}</p>
                                            </div>
                                            <div style="padding-top: 0;">
                                                <div class="border-1">
                                                    <div class="card-body">
                                                        <div class="table-responsive">
                                                            <table class="table table-borderless">
                                                                <thead>
                                                                    <tr>
                                                                        <th class="ps-0 pb-2 border-bottom">Area</th>
                                                                        <th class="border-bottom pb-2">Time</th>
                                                                        <th class="border-bottom pb-2">Status</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    @forelse ($schedules as $schedule)
                                                                        <tr>
                                                                            <td class="ps-0">{{ $schedule->barangay->area_name ?? 'N/A' }}</td>
                                                                            <td>
                                                                                <p class="mb-0"><span class="font-weight-bold me-2">{{ \Carbon\Carbon::parse($schedule->scheduled_time)->format('h:i A') }}</span></p>
                                                                            </td>
                                                                            <td class="text-muted">
                                                                                <span class="badge rounded-pill 
                                                                                    {{ $schedule->status == 'Pending' ? 'bg-warning' : ($schedule->status == 'Finished' ? 'bg-success' : 'bg-secondary') }}">
                                                                                    {{ $schedule->status }}
                                                                                </span>
                                                                            </td>
                                                                        </tr>
                                                                    @empty
                                                                        <tr>
                                                                            <td colspan="3" class="text-center">No schedules found for today</td>
                                                                        </tr>
                                                                    @endforelse
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
    document.addEventListener("DOMContentLoaded", function () {
    // Coordinates of Balingasag, Misamis Oriental, Philippines
    const balingasagLat = 8.7387667;
    const balingasagLon = 124.7837565;

    // Initialize the map centered on Balingasag with an appropriate zoom level
    var map = L.map('map').setView([balingasagLat, balingasagLon], 13); // Zoom level set to 13 for a good view of Balingasag

    // Add OpenStreetMap tile layer (Default view)
    var osmLayer = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);

    // Add Satellite tile layer (Using Esri Satellite)
    var satelliteLayer = L.tileLayer('https://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}', {
        maxZoom: 19,
        attribution: '&copy; <a href="https://www.esri.com/en-us/arcgis/products/arcgis-online">Esri</a>'
    });

    // Create a custom map pane for Balingasag
    var balingasagPane = map.createPane('balingasagPane');
    balingasagPane.style.zIndex = 500; // Set z-index to ensure it's on top of other panes

    // Set the map view to focus on Balingasag, Misamis Oriental (specific to this location)
    map.setView([balingasagLat, balingasagLon], 13);

    // Marker placeholder (this will be updated with the truck's location)
    var marker;

    // Function to update marker position
    function updateMarker(latitude, longitude) {
        if (marker) {
            marker.setLatLng([latitude, longitude]);
        } else {
            marker = L.marker([latitude, longitude], { pane: 'balingasagPane' }).addTo(map)
                .bindPopup('Truck is here!')
                .openPopup();
            map.setView([latitude, longitude], 18); // Center map on first load
        }
    }

    // Fetch truck location from the backend and update the marker
    async function fetchTruckLocation() {
        try {
            const response = await fetch('/admin/vehicle-tracking/fetchCoords');
            const data = await response.json();

            if (data.latitude && data.longitude) {
                updateMarker(data.latitude, data.longitude);
            } else {
                console.error('No location data found.');
            }
        } catch (error) {
            console.error('Error fetching truck location:', error);
        }
    }

    // Initial load of truck location
    fetchTruckLocation();

    // Set an interval to fetch and update location periodically
    setInterval(fetchTruckLocation, 10000); // Update every 10 seconds

    // Add buttons to switch between map layers
    const satelliteBtn = document.getElementById('satelliteView');
    const defaultBtn = document.getElementById('defaultView');

    satelliteBtn.addEventListener('click', function () {
        map.removeLayer(osmLayer); // Remove default layer
        satelliteLayer.addTo(map); // Add satellite layer
    });

    defaultBtn.addEventListener('click', function () {
        map.removeLayer(satelliteLayer); // Remove satellite layer
        osmLayer.addTo(map); // Add default layer
    });
});

</script>

@endsection