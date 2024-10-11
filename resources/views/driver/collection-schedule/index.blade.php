@extends('d-layout')

@section('main-content')

<main class="main-content">
    <div class="container">
        

        <div class="container">
            <!-- Schedule Header -->
        
            <div class="row">
                <!-- Schedule Cards -->
                <div class="col-12">
                    <div class="text-center flex-wrap d-flex justify-content-between align-items-center mb-3">
                        <div>
                            <h6><strong>Today's Schedule</strong></h6>
                        </div>
                    </div>
                    <!-- First Schedule -->
                    <div class="card card-custom schedule-card mb-3">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-8">
                                    <h5 class="card-title">Physics</h5>
                                    <p class="schedule-time">12:00 PM - 02:00 PM</p>
                                </div>
                                    <div class="col-4 text-end">
                                    <span class="badge bg-primary">Class</span>
                                </div>
                            </div>
                            <div class="row align-items-center schedule-info">
                                <div class="col">
                                    <img src="https://via.placeholder.com/30" alt="Member">
                                    <img src="https://via.placeholder.com/30" alt="Member">
                                    <img src="https://via.placeholder.com/30" alt="Member">
                                    <span>+ 5 members</span>
                                </div>
                            </div>
                        </div>
                    </div>
            
                    <!-- Second Schedule -->
                    <div class="card card-custom schedule-card mb-3">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-8">
                                    <h5 class="card-title">Geometry</h5>
                                    <p class="schedule-time">02:00 PM - 04:00 PM</p>
                                </div>
                                <div class="col-4 text-end">
                                    <span class="badge bg-success">Consultation</span>
                                </div>
                            </div>
                            <div class="row align-items-center schedule-info">
                                <div class="col">
                                    <img src="https://via.placeholder.com/30" alt="Member">
                                    <img src="https://via.placeholder.com/30" alt="Member">
                                    <span>+ 7 members</span>
                                </div>
                            </div>
                        </div>
                    </div>
            
                    <!-- Third Schedule -->
                    <div class="card card-custom schedule-card mb-3">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-8">
                                    <h5 class="card-title">Chemistry</h5>
                                    <p class="schedule-time">04:00 PM - 06:00 PM</p>
                                </div>
                                <div class="col-4 text-end">
                                    <span class="badge bg-primary">Class</span>
                                </div>
                            </div>
                            <div class="row align-items-center schedule-info">
                                <div class="col">
                                <img src="https://via.placeholder.com/30" alt="Member">
                                <img src="https://via.placeholder.com/30" alt="Member">
                                <img src="https://via.placeholder.com/30" alt="Member">
                                <span>+ 4 members</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection