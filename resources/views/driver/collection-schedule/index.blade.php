@extends('d-layout')

@section('main-content')

<main class="main-content">
    <div class="container">
        

        <div class="container">
            <!-- Schedule Header -->
            <div class="calendar mb-4" id="calendar-container"></div>
            
            <div class="row">
                <!-- Schedule Cards -->
                <div class="col-12">
                    <div class="flex-wrap d-flex justify-content-between align-items-center mb-3">
                        <div>
                            <h3 class="fw-bold" id="date"></h3>
                            <p style="font-size: 0.9rem;" class="card-text">Waste Collection Schedule</p>
                        </div>
                        {{-- <span class="badge" style="color: #01A94D; background-color: #19875417;">Completed</span> --}}
                        <span class="badge" style="color: #0d6efd; background-color: #0d6dfd21;">Ongoing</span>
                        {{-- <span class="badge" style="color: #ffc107; background-color: #ffc10727;">Incomplete</span> --}}

                    </div>
                        
                    <!-- First Schedule -->
                    @forelse($schedules as $schedule)
                        <div class="card card-custom schedule-card mb-3">
                            <div class="card-body" style="padding-bottom: 0;">
                                <div class="row align-items-center">
                                    <div class="col-8">
                                        <h5 class="card-title">{{ $schedule->barangay->name }}</h5> <!-- Dynamically display title -->
                                        <p style="font-size: 0.9rem;">{{ \Carbon\Carbon::parse($schedule->scheduled_time)->format('h:i A') }}</p> <!-- Display time -->
                                    </div>
                                    <div class="col-4 text-end">
                                        <a href="#" style="border-radius: 15px; font-size: 12px;" class="btn btn-sm btn-primary fw-bold mb-3">
                                            Done
                                        </a>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    @empty
                        <div class="container text-center">
                            <div class="d-flex flex-column align-items-center justify-content-center" style="height: 50vh;">
                                <div class="d-flex flex-column align-items-center justify-content-center" style="height: 50vh;">
                                    <img src="{{ asset('assets/images/no-data.svg')}}" class="img-fluid mb-4" width="75%" alt="No Data Found">
                                    <h3 class="fw-bold">No schedule for today.</h3>
                                    <p style="color: #525356; font-size: 15px;">All of your assigned schedules will be displayed here</p>
                                </div>
                            </div>
                        </div>
                    @endforelse
            
                </div>
            </div>
        </div>
    </div>
</main>

<script>
    document.addEventListener('DOMContentLoaded', function () {
    const calendarEl = document.getElementById('calendar-container');
    const today = new Date(); // Get today's date
    const dateDisplay = document.getElementById('date'); // Element to display the selected date

    function formatDate(date) {
        return date.toLocaleDateString('en-us', {
            month: 'short',
            day: 'numeric',
            year: 'numeric'
        });
    }

    function updateDateDisplay(date, dayDiv) {
        // Update the date display with the selected date or "Today"
        if (date.getDate() === today.getDate() &&
            date.getMonth() === today.getMonth() &&
            date.getFullYear() === today.getFullYear()) {
            dateDisplay.textContent = "Today";
        } else {
            dateDisplay.textContent = formatDate(date);
        }

        // Remove 'selected' and 'current' class from all days
        const previouslySelected = calendarEl.querySelector('.selected');
        const currentDay = calendarEl.querySelector('.current');
        if (previouslySelected) {
            previouslySelected.classList.remove('selected');
        }
        if (currentDay) {
            currentDay.classList.remove('current');
        }

        // Add 'selected' class to the specified day
        dayDiv.classList.add('selected');
    }

    function generateDaysOfMonth() {
        const currentYear = today.getFullYear();
        const currentMonth = today.getMonth();
        const daysInMonth = new Date(currentYear, currentMonth + 1, 0).getDate(); // Get total days in the current month

        // Loop through all days of the month and generate the layout
        for (let day = 1; day <= daysInMonth; day++) {
            const date = new Date(currentYear, currentMonth, day);
            const dayName = date.toLocaleString('en-us', { weekday: 'short' });

            // Create a div for each day
            const dayDiv = document.createElement('div');
            dayDiv.classList.add('day');
            dayDiv.setAttribute('data-date', date); // Set data attribute for easy access to the date

            // Add 'current' class if it's the current day
            if (day === today.getDate()) {
                dayDiv.classList.add('current');
                dayDiv.setAttribute('id', 'current-day'); // Add an ID to easily find the current day
                // Call updateDateDisplay for today's date on page load
                updateDateDisplay(date, dayDiv);
            }

            // Add day name and day number
            dayDiv.innerHTML = `<span class="day-name">${dayName}</span><span class="date">${day}</span>`;

            // Add click event to update the date display
            dayDiv.addEventListener('click', function () {
                updateDateDisplay(date, dayDiv);
            });

            // Append the day to the calendar container
            calendarEl.appendChild(dayDiv);
        }
    }

    // Generate the calendar days dynamically
    generateDaysOfMonth();

    // Scroll to the current day automatically
    function scrollToCurrentDay() {
        const currentDayElement = document.getElementById('current-day');
        if (currentDayElement) {
            // Scroll the calendar container so the current day is visible
            currentDayElement.scrollIntoView({ inline: 'center', block: 'nearest' });
        }
    }

    // Call scrollToCurrentDay after generating the days
    scrollToCurrentDay();
});

</script>

@endsection