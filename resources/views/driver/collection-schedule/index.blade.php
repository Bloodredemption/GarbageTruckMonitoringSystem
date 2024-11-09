@extends('d-layout')

@section('main-content')

<main class="main-content">
    <div class="container">
        <!-- Schedule Header -->
        <div class="calendar-navigation mb-4">
        
            <!-- Calendar Container -->
            <div id="calendar-container" class="calendar"></div>
            
        </div>
        
        
        <div class="row">
            <!-- Schedule Cards -->
            <div class="col-12">
                <div class="flex-wrap d-flex justify-content-between align-items-center mb-3">
                    <div>
                        <h3 class="fw-bold" id="date"></h3>
                        <p style="font-size: 0.9rem;" class="card-text">Waste Collection Schedule</p>
                    </div>
                    {{-- <span class="badge" style="color: #01A94D; background-color: #19875417;">Completed</span> --}}
                    {{-- <span class="badge" style="color: #0d6efd; background-color: #0d6dfd21;">Ongoing</span> --}}
                    {{-- <span class="badge" style="color: #ffc107; background-color: #ffc10727;">Incomplete</span> --}}

                </div>
                    
                <!-- First Schedule -->
                <div id="schedule-container">
                    <!-- Schedule cards will be injected here -->
                </div>
        
            </div>
        </div>
    </div>
</main>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const calendarEl = document.getElementById('calendar-container');
        const leftChevron = document.querySelector('.chevron-left');
        const rightChevron = document.querySelector('.chevron-right');
        const today = new Date();
        const dateDisplay = document.getElementById('date');
        const scheduleContainer = document.getElementById('schedule-container');

        function formatDateDisplay(date) {
            return date.toLocaleDateString('en-us', {
                month: 'short',
                day: 'numeric',
                year: 'numeric'
            });
        }

        function formatDateForDatabase(date) {
            const year = date.getFullYear();
            const month = String(date.getMonth() + 1).padStart(2, '0'); // Months are 0-indexed, so add 1
            const day = String(date.getDate()).padStart(2, '0');
            return `${year}-${month}-${day}`; // Format as YYYY-MM-DD
        }

        function initializeDateDisplay(date, dayDiv) {
            dateDisplay.textContent = "Today";
            dayDiv.classList.add('current');
            dayDiv.setAttribute('id', 'current-day');
            fetchSchedules(formatDateForDatabase(date));

            // console.log('Today:', date);
        }

        function updateDateDisplay(date, dayDiv) {
            const selectedDateStr = formatDateForDatabase(date);

            // Update the date display with "Today" or formatted date
            if (date.getDate() === today.getDate() &&
                date.getMonth() === today.getMonth() &&
                date.getFullYear() === today.getFullYear()) {
                dateDisplay.textContent = "Today";
            } else {
                dateDisplay.textContent = formatDateDisplay(date);
            }

            const previouslySelected = calendarEl.querySelector('.selected');
            if (previouslySelected) {
                previouslySelected.classList.remove('selected');
            }

            if (dayDiv !== calendarEl.querySelector('.current')) {
                dayDiv.classList.add('selected');
            }

            // Fetch schedules for the selected date
            fetchSchedules(selectedDateStr);
        }

        function generateDaysOfMonth() {
            const currentYear = today.getFullYear();
            const currentMonth = today.getMonth();
            const daysInMonth = new Date(currentYear, currentMonth + 1, 0).getDate();

            for (let day = 1; day <= daysInMonth; day++) {
                const date = new Date(currentYear, currentMonth, day);
                const dayName = date.toLocaleString('en-us', { weekday: 'short' });

                const dayDiv = document.createElement('div');
                dayDiv.classList.add('day');
                dayDiv.setAttribute('data-date', formatDateForDatabase(date));

                if (day === today.getDate()) {
                    initializeDateDisplay(date, dayDiv);
                }

                dayDiv.innerHTML = `<span class="day-name">${dayName}</span><span class="date">${day}</span>`;

                dayDiv.addEventListener('click', function () {
                    updateDateDisplay(date, dayDiv);
                });

                calendarEl.appendChild(dayDiv);
            }
        }

        function scrollToCurrentDay() {
            const currentDayElement = document.getElementById('current-day');
            if (currentDayElement) {
                currentDayElement.scrollIntoView({ inline: 'center', block: 'nearest' });
            }
        }

        function formatTimeTo12Hour(time) {
            const [hour, minute] = time.split(':'); // Split the time into hour and minute
            const isPM = hour >= 12; // Check if the time is PM
            const formattedHour = hour % 12 || 12; // Convert hour to 12-hour format
            return `${formattedHour}:${minute} ${isPM ? 'PM' : 'AM'}`; // Return formatted time
        }

        function fetchSchedules(date) {
            fetch(`/driver/collection-schedule/fetch?date=${date}`)
                .then(response => response.json())
                .then(data => {
                    scheduleContainer.innerHTML = '';

                    if (data.schedules && data.schedules.length > 0) {
                        data.schedules.forEach(schedule => {
                            const formattedTime = formatTimeTo12Hour(schedule.scheduled_time);

                            let statusDisplay = "";
                            if (schedule.status === 'Ongoing') {
                                statusDisplay = `<span class="badge" style="color: #0d6efd; background-color: #0d6dfd21; font-size: 12px;">Ongoing</span>`;
                            } else if (schedule.status === 'Finished') {
                                statusDisplay = `<span class="badge" style="color: #01A94D; background-color: #19875417; font-size: 12px;">Finished</span>`;
                            } else {
                                statusDisplay = `<span class="badge" style="color: #ffc107; background-color: #ffc10727; font-size: 12px;">Pending</span>`;
                            }

                            const scheduleDiv = document.createElement('div');
                            scheduleDiv.classList.add('card', 'card-custom', 'schedule-card', 'mb-3');
                            scheduleDiv.innerHTML = `
                                <div class="card-body" style="padding-bottom: 0;">
                                    <div class="row align-items-center">
                                        <div class="col-8">
                                            <h5 class="card-title">
                                                ${schedule.barangay.area_name}
                                                
                                            </h5>
                                            <p style="font-size: 0.9rem;">${formattedTime}</p>
                                        </div>
                                        <div class="col-4 align-items-center text-end">
                                            ${statusDisplay}
                                        </div>
                                    </div>
                                </div>`;
                            scheduleContainer.appendChild(scheduleDiv);
                        });
                    } else {
                        scheduleContainer.innerHTML = `
                            <div class="container text-center">
                                <div class="d-flex flex-column align-items-center justify-content-center" style="height: 50vh;">
                                    <img src="/assets/images/no-schedule.svg" class="img-fluid mb-4" width="75%" alt="No Data Found">
                                    <h3 class="fw-bold">No schedule found</h3>
                                    <p style="color: #525356; font-size: 15px;">All of your assigned schedules will be displayed here</p>
                                </div>
                            </div>`;
                    }
                })
                .catch(error => console.error('Error fetching schedules:', error));
        }

        generateDaysOfMonth();
        scrollToCurrentDay();

    });
</script>

@endsection