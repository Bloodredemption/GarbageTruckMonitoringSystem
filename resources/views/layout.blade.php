<!doctype html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>GTMS</title>
        
        <!-- Favicon -->
        <link rel="shortcut icon" href="{{ asset('assets/images/bali_logo.png') }}" />

        <!-- Library / Plugin Css Build -->
        <link rel="stylesheet" href="{{ asset('assets/css/core/libs.min.css') }}" />

        <!-- Hope Ui Design System Css -->
        <link rel="stylesheet" href="{{ asset('assets/css/hope-ui.min.css?v=2.0.0') }}" />

        <!-- Custom Css -->
        <link rel="stylesheet" href="{{ asset('assets/css/custom.min.css?v=2.0.0') }}" />

        <!-- Dark Css -->
        <link rel="stylesheet" href="{{ asset('assets/css/dark.min.css') }}" />

        <!-- Customizer Css -->
        <link rel="stylesheet" href="{{ asset('assets/css/customizer.min.css') }}" />
        
        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
        <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
        
        <link rel="stylesheet" href="{{ asset('assets/vendor/flatpickr/dist/flatpickr.min.css') }}" />
        <script src="{{ asset('assets/vendor/flatpickr/dist/flatpickr.min.js')}}"></script>
        <script src="{{ asset('assets/js/plugins/flatpickr.js')}}" defer></script>
    
        <!-- Library Bundle Script -->
        <script src="{{ asset('assets/js/core/libs.min.js') }}"></script>

        <!-- External Library Bundle Script -->
        <script src="{{ asset('assets/js/core/external.min.js') }}"></script>

        <!-- Widgetchart Script -->
        <script src="{{ asset('assets/js/charts/widgetcharts.js') }}"></script>

        <!-- Mapchart Script -->
        <script src="{{ asset('assets/js/charts/vectore-chart.js') }}"></script>
        <script src="{{ asset('assets/js/charts/dashboard.js') }}"></script>

        <!-- fslightbox Script -->
        <script src="{{ asset('assets/js/plugins/fslightbox.js') }}"></script>

        <!-- Settings Script -->
        <script src="{{ asset('assets/js/plugins/setting.js') }}"></script>

        <!-- Slider-tab Script -->
        <script src="{{ asset('assets/js/plugins/slider-tabs.js') }}"></script>

        <!-- Form Wizard Script -->
        <script src="{{ asset('assets/js/plugins/form-wizard.js') }}"></script>

        <!-- AOS Animation Plugin-->
        <script src="{{ asset('assets/vendor/aos/dist/aos.js') }}"></script>

        <!-- App Script -->
        <script src="{{ asset('assets/js/hope-ui.js') }}" defer></script>
        
        <script src="{{ asset('assets/js/sweetalert.js') }}"></script>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.min.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js"></script>
        
        <!-- Fullcalender CSS -->
        <link rel='stylesheet' href='{{ asset('assets/vendor/fullcalendar/core/main.css')}}' />
        <link rel='stylesheet' href='{{ asset('assets/vendor/fullcalendar/daygrid/main.css')}}' />
        <link rel='stylesheet' href='{{ asset('assets/vendor/fullcalendar/timegrid/main.css')}}' />
        <link rel='stylesheet' href='{{ asset('assets/vendor/fullcalendar/list/main.css')}}' />
        <script src="https://cdn.jsdelivr.net/npm/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>

        <script src="https://cdn.datatables.net/buttons/2.3.6/js/dataTables.buttons.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.html5.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.print.min.js"></script>


        <style>
            .custom-scrollbar {
                scrollbar-width: thin; /* For Firefox */
            }

            .custom-scrollbar::-webkit-scrollbar {
                height: 6px; /* Set the height of the horizontal scrollbar */
            }

            .custom-scrollbar::-webkit-scrollbar-thumb {
                background: #ccc; /* Color of the scrollbar thumb */
                border-radius: 10px; /* Rounded corners for the scrollbar thumb */
            }

            .custom-scrollbar::-webkit-scrollbar-track {
                background: #f1f1f1; /* Color of the scrollbar track */
            }
            
            :root {
                --bs-primary: #01A94D;
                --bs-primary-tint-40: #01A94D;
                --bs-primary-shade-20: #01A94D;
            }

            body {
                --sidebar-width: 18rem;
            }
            .no-data-image {
                max-width: 300px;
            }
            .no-data-heading {
                font-size: 2rem;
            }
            .no-data-subtext {
                font-size: 1.25rem;
            }

            /* Media query for mobile screens (max-width: 576px is for small devices) */
            @media (max-width: 576px) {
                .no-data-image {
                    max-width: 200px;
                }
                .no-data-heading {
                    font-size: 1.5rem;
                }
                .no-data-subtext {
                    font-size: 1rem;
                }
            }

            .breadcrumb-item+.breadcrumb-item::before {
                color: #fff;
            }

            .nav-link {
                color: #000;
            }

            .nav {
                --bs-nav-link-hover-color: #01A94D;
            }

            .accordion-item {
                color: #000;
                background-color: var(--bs-accordion-bg);
                border: var(--bs-accordion-border-width) solid rgb(255 255 255 / 13%);
            }

            .custom-tabs .nav-link {
                color: #000; /* Adjust the color you want for the text */
                border: none;
                padding-bottom: 10px; /* Add padding for spacing between text and border */
                background-color: #fff;
            }

            .custom-tabs .nav-link.active {
                color: var(--bs-primary); /* Same color as the text */
                border-bottom: 3px solid var(--bs-primary); /* Create the bottom colored line */
            }

            .custom-tabs .nav-link:hover {
                color: #087539; /* Optional: color change on hover */
            }

            .custom-tabs .nav-link:focus {
                box-shadow: none; /* Remove default Bootstrap focus outline */
            }

            .bootstrap-tagsinput {
                background-color: #fff;
                border: 1px solid #eee;
                box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
                display: inline-block;
                padding: 4px 6px;
                color: #555;
                vertical-align: middle;
                border-radius: 4px;
                width: 100%;
                line-height: 25px;
                cursor: text;
            }
            .bootstrap-tagsinput input {
                border: none;
                box-shadow: none;
                outline: none;
                background-color: transparent;
                padding: .5rem 1rem;
                margin: 0;
                width: auto;
            }
            .bootstrap-tagsinput.form-control input::-moz-placeholder {
                color: #777;
                opacity: 1;
            }
            .bootstrap-tagsinput.form-control input:-ms-input-placeholder {
                color: #777;
            }
            .bootstrap-tagsinput.form-control input::-webkit-input-placeholder {
                color: #777;
            }
            .bootstrap-tagsinput input:focus {
                border: none;
                box-shadow: none;
            }
            .bootstrap-tagsinput .tag {
                position: relative;
                display: inline-block;
                font-size: .875rem;
                color: #77838f;
                background-color: rgba(119, 131, 143, 0.1);
                border-radius: 0.3125rem;
                padding: .25rem 0.8rem .25rem;
                margin-bottom: .25rem;
                margin-right: 0;
            }
            .bootstrap-tagsinput .tag [data-role="remove"] {
                margin-left: 8px;
                cursor: pointer;
            }
            .bootstrap-tagsinput .tag [data-role="remove"]:after {
                content: "x";
                padding: 0px 2px;
            }
            .bootstrap-tagsinput .tag [data-role="remove"]:hover {
                box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.2), 0 1px 2px rgba(0, 0, 0, 0.05);
            }
            .bootstrap-tagsinput .tag [data-role="remove"]:hover:active {
                box-shadow: inset 0 3px 5px rgba(0, 0, 0, 0.125);
            }

            .list-group-item-action:hover {
                background-color: #f0f0f0; /* Light gray background */
            }

            .message-time {
                display: block;
                margin-top: 5px;
                font-size: 0.9em;
                color: #888;
            }

        </style>
    </head>
    <body class="">
        <!-- loader Start -->
        {{-- <div id="loading">
            <div class="loader simple-loader">
                <div class="loader-body"></div>
            </div>    
        </div> --}}
        <!-- loader END -->
    
        @include('partials.sidebar')

        @yield('main-content')

        <!-- Wrapper End-->

        <!-- Fullcalender Javascript -->
        <script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>
        <script>
            Pusher.logToConsole = true;

            var pusher = new Pusher('6067e4f4c5d9c44a0efa', {
                cluster: 'ap1'
            });

            var channel = pusher.subscribe('my-channel');
            channel.bind('complaint-submitted', function(data) {
                Swal.fire({
                    title: 'New Complaint Submitted',
                    text: `A new complaint has been submitted.`,
                    icon: 'info',
                    confirmButtonText: 'OK'
                });
            });

            document.addEventListener('DOMContentLoaded', function () {
                const newMessageButton = document.getElementById('newMessageButton');
                const backToMessages = document.getElementById('backToMessages');
                const mainBlock = document.getElementById('mainBlock');
                const newMessageBlock = document.getElementById('newMessageBlock');
                const chatContainer = document.getElementById('chatContainer');
                const backToMessagesFromChat = document.getElementById('backToMessagesFromChat');
                const messageConversations = document.querySelectorAll('.list-group-item');

                // Show the new message block and hide the main block
                if (newMessageButton) {
                    newMessageButton.addEventListener('click', function (e) {
                        e.preventDefault();
                        mainBlock.classList.add('d-none');
                        newMessageBlock.classList.remove('d-none');
                    });
                }

                // Back to the main block and hide the new message block
                if (backToMessages) {
                    backToMessages.addEventListener('click', function (e) {
                        e.preventDefault();
                        newMessageBlock.classList.add('d-none');
                        mainBlock.classList.remove('d-none');
                    });
                }

                // Show chatContainer when clicking a message conversation
                messageConversations.forEach(function (conversation) {
                    conversation.addEventListener('click', function (e) {
                        e.preventDefault();
                        mainBlock.classList.add('d-none');
                        chatContainer.classList.remove('d-none');
                    });
                });

                // Back to main block from chatContainer
                if (backToMessagesFromChat) {
                    backToMessagesFromChat.addEventListener('click', function (e) {
                        e.preventDefault();
                        chatContainer.classList.add('d-none');
                        mainBlock.classList.remove('d-none');
                    });
                }

                var receiverId;
                $('.message-item').on('click', function(event) {
                    event.preventDefault();
                    
                    // Get receiver details from the data attributes
                    receiverId = $(this).data('receiver-id');
                    var receiverName = $(this).data('receiver-name');

                    // Update the chat header with receiver's information
                    $('#chatContainer .bg-white h5').text(receiverName);
                    
                    // Show the chat container
                    $('#chatContainer').removeClass('d-none');

                    // Example: Fetch conversation history based on the receiver ID (you can adjust this as needed)
                    $.ajax({
                        url: '/get-conversation/' + receiverId,  // Add your endpoint here
                        method: 'GET',
                        success: function(data) {
                            // Clear previous messages
                            $('#chatContainer .overflow-auto').html('');
                            
                            // Append new messages to the chat container
                            data.messages.forEach(function(message) {
                                var messageHtml = '';
                                
                                if (message.user_id === receiverId) {
                                    messageHtml = `
                                        <div class="d-flex mb-3 align-items-start">
                                            <img src="../assets/images/avatars/01.png" class="rounded-circle me-2" alt="User" style="width: 30px; height: 30px;">
                                            <div class="bg-light text-dark p-2 rounded">
                                                <p class="mb-1">${message.message}</p>
                                            </div>
                                        </div>
                                    `;
                                } else {
                                    messageHtml = `
                                        <div class="d-flex flex-row-reverse mb-3 align-items-start">
                                            <img src="../assets/images/avatars/01.png" class="rounded-circle ms-2" alt="You" style="width: 30px; height: 30px;">
                                            <div class="bg-primary text-white p-2 rounded">
                                                <p class="mb-0">${message.message}</p>
                                            </div>
                                        </div>
                                    `;
                                }

                                // Append the message to the chat container
                                $('#chatContainer .overflow-auto').append(messageHtml);
                            });
                        },
                        error: function() {
                            alert('Failed to load conversation.');
                        }
                    });
                });

                $('#sendMessageBtn').on('click', function() {
                    // Get the message from the input field
                    var message = $('#messageBox').val().trim();

                    // Check if message is not empty
                    if (message !== '') {
                        // Check if receiverId exists (make sure it's properly set)
                        if (!receiverId) {
                            alert('Receiver ID is missing');
                            return;
                        }

                        // Send message via AJAX
                        $.ajax({
                            url: '/send-message',  // Your backend endpoint for sending message
                            method: 'POST',
                            data: {
                                message: message,
                                receiver_id: receiverId,  // Ensure receiver_id is included in the data
                                _token: $('meta[name="csrf-token"]').attr('content')  // Include CSRF token for security
                            },
                            success: function(response) {
                                // If message is successfully sent, append it to the conversation
                                var messageHtml = `
                                    <div class="d-flex flex-row-reverse mb-3 align-items-start">
                                        <img src="../assets/images/avatars/01.png" class="rounded-circle ms-2" alt="You" style="width: 30px; height: 30px;">
                                        <div class="bg-primary text-white p-2 rounded">
                                            <p class="mb-0">${message}</p>
                                        </div>
                                    </div>
                                `;
                                $('#chatContainer .overflow-auto').append(messageHtml);

                                // Clear the input field
                                $('#messageBox').val('');

                                // Scroll to the latest message
                                $('#chatContainer .overflow-auto').scrollTop($('#chatContainer .overflow-auto')[0].scrollHeight);
                            },
                            error: function() {
                                alert('Failed to send message');
                            }
                        });
                    } else {
                        alert('Please enter a message');
                    }
                });

                // Optional: Allow pressing Enter to send the message
                $('#messageBox').on('keypress', function(event) {
                    if (event.which === 13) {  // Enter key
                        $('#sendMessageBtn').click();
                    }
                });

                function refreshMessages() {
                    $.ajax({
                        url: '{{ route('messages.get') }}',  // Use Laravel's route helper to dynamically get the URL
                        type: 'GET',
                        success: function(response) {
                            if(response.messages.length > 0) {
                                let messagesHtml = '';
                                $.each(response.messages, function(index, message) {
                                    messagesHtml += `
                                        <div id="messagesBlock" class="list-group">
                                            <a href="#" class="list-group-item list-group-item-action d-flex align-items-start border-0 message-item" data-receiver-id="${message.receiver_id}" data-receiver-name="${message.receiver.fullname}">
                                                <img src="../assets/images/avatars/01.png" 
                                                    alt="User" 
                                                    class="rounded-circle me-3" 
                                                    style="width: 50px; height: 50px;">
                                                <div class="flex-grow-1">
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <span>${message.receiver.fullname}</span>
                                                    </div>
                                                    <p class="text-muted mb-0">
                                                        ${message.message}
                                                    </p>
                                                    <span class="message-time">${message.formatted_time}</span>
                                                </div>
                                            </a>
                                        </div>
                                    `;
                                });
                                $('#messagesContainer').html(messagesHtml);

                                rebindMessageClickHandler();
                            } else {
                                $('#messagesContainer').html(`
                                    <div id="noMessages" class="d-flex flex-column align-items-center justify-content-center" style="height: 80vh;">
                                        <img src="../assets/images/messages.svg" class="img-fluid mb-4" width="75%" alt="No Data Found">
                                        <h3 class="fw-bold">No messages found</h3>
                                        <p style="color: #525356; font-size: 15px;">All of your messages will be displayed here</p>
                                    </div>
                                `);
                            }
                        },
                        error: function() {
                            alert('An error occurred while refreshing messages.');
                        }
                    });
                }

                // setInterval(refreshMessages, 5000);

                function rebindMessageClickHandler() {
                    const mainBlock = document.getElementById('mainBlock');
                    const chatContainer = document.getElementById('chatContainer');

                    // Unbind previous click events and bind new ones
                    $('.message-item').off('click').on('click', function(event) {
                        event.preventDefault();

                        // Get receiver details from the data attributes
                        const receiverName = $(this).data('receiver-name');
                        receiverId = $(this).data('receiver-id');

                        // Update the chat header with receiver's information
                        $('#chatContainer .bg-white h5').text(receiverName);

                        // Hide main block and show chat container
                        mainBlock.classList.add('d-none');
                        chatContainer.classList.remove('d-none');

                        // Fetch conversation history based on the receiver ID
                        $.ajax({
                            url: '/get-conversation/' + receiverId, // Add your endpoint here
                            method: 'GET',
                            success: function(data) {
                                // Clear previous messages
                                $('#chatContainer .overflow-auto').html('');

                                // Append new messages to the chat container
                                data.messages.forEach(function(message) {
                                    let messageHtml = '';

                                    // Determine whether the message is from the receiver or the sender
                                    if (message.user_id === receiverId) {
                                        messageHtml = `
                                            <div class="d-flex mb-3 align-items-start">
                                                <img src="../assets/images/avatars/01.png" class="rounded-circle me-2" alt="User" style="width: 30px; height: 30px;">
                                                <div class="bg-light text-dark p-2 rounded">
                                                    <p class="mb-1">${message.message}</p>
                                                </div>
                                            </div>
                                        `;
                                    } else {
                                        messageHtml = `
                                            <div class="d-flex flex-row-reverse mb-3 align-items-start">
                                                <img src="../assets/images/avatars/01.png" class="rounded-circle ms-2" alt="You" style="width: 30px; height: 30px;">
                                                <div class="bg-primary text-white p-2 rounded">
                                                    <p class="mb-0">${message.message}</p>
                                                </div>
                                            </div>
                                        `;
                                    }

                                    // Append the message to the chat container
                                    $('#chatContainer .overflow-auto').append(messageHtml);
                                });
                            },
                            error: function() {
                                alert('Failed to load conversation.');
                            }
                        });
                    });
                }

            });
        </script>
    </body>
</html> 