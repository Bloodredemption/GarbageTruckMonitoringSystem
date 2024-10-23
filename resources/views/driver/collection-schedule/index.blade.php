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
                            <h5><strong>Today's Schedule</strong></h5>
                        </div>
                    </div>
                        
                    <!-- First Schedule -->
                    @forelse($schedules as $schedule)
                        <div class="card card-custom schedule-card mb-3">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-8">
                                        <h5 class="card-title">{{ $schedule->barangay->name }}</h5> <!-- Dynamically display title -->
                                        <p class="schedule-time">{{ \Carbon\Carbon::parse($schedule->scheduled_time)->format('h:i A') }}</p> <!-- Display time -->
                                    </div>
                                    <div class="col-4 text-end">
                                        <span class="badge bg-primary">{{ $schedule->status }}</span> <!-- Display status -->
                                    </div>
                                </div>
                                <div class="row align-items-center schedule-info">
                                    <div class="col">
                                        <span>{{ \Carbon\Carbon::parse($schedule->scheduled_date)->format('F d, Y') }}</span> <!-- Display date -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="card card-custom schedule-card mb-3">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-8">
                                        <h5 class="card-title">No schedule for today</h5> <!-- Display title -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforelse
            
                </div>
            </div>
        </div>
    </div>
</main>

@endsection