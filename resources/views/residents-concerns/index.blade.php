<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="{{ asset('assets/images/bali_logo.png') }}" />
    <title>Waste Collection Complaint Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

    <style>
        /* Set the background image */
        body {
            background-image: url('background-image.jpg'); /* Replace with your background image path */
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
        }

        /* Dark overlay for better readability */
        .overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.6); /* Adjust the opacity as needed */
        }

        /* Style for the form card */
        .card {
            background-color: rgba(255, 255, 255, 0.9); /* Slightly transparent white */
            border-radius: 10px;
            padding: 20px;
            max-width: 600px;
            margin: auto;
            position: relative;
            z-index: 1;
        }

        .select2-container .select2-selection--single {
            height: calc(1.5em + 0.75rem + 2px); /* Match form-control height */
            padding: 0.375rem 0.75rem; /* Match form-control padding */
            font-size: 1rem; /* Match form-control font size */
            line-height: 1.5; /* Match form-control line height */
            color: #495057; /* Match form-control text color */
            background-color: #fff; /* Match form-control background */
            border: 1px solid #ced4da; /* Match form-control border */
            border-radius: 0.375rem; /* Match form-control border radius */
        }
        
        .select2-container--default .select2-selection--single .select2-selection__rendered {
            color: #495057; /* Match form-control text color */
            line-height: 1.5; /* Match form-control line height */
        }

        .select2-container--default .select2-selection--single .select2-selection__arrow {
            height: 100%; /* Align arrow vertically */
        }

        .select2-container .select2-selection--single .select2-selection__rendered {
            padding-left: 0; /* Match placeholder position */
        }

        .logo-image {
            width: 20%; /* Default width */
        }

        /* Responsive adjustments */
        @media (max-width: 768px) { /* Tablet and mobile */
            .logo-image {
                width: 40%; /* Adjust for smaller screens */
            }
        }

        @media (max-width: 480px) { /* Small mobile screens */
            .logo-image {
                width: 60%; /* Further adjust for extra small screens */
            }
        }
        
    </style>
</head>
<body>

    <div class="container my-5">
        <!-- Centered Logo -->
        <div class="text-center mb-4">
            <img src="{{ asset('assets/images/newlogo.png') }}" alt="System Logo" class="img-fluid logo-image" width="20%">
        </div>

        <!-- Form Card -->
        <div class="card shadow">
            <h3 class="text-center">Waste Collection Complaint Form</h3>
            <div class="text-center mb-2">
                <p class="text-muted">Please fill all the required fields.</p>
            </div>
            <form id="complaintForm" method="POST">
                {{-- @csrf --}}
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="mb-3">
                    <label for="complaint_type" class="form-label">Complaint Type</label>
                    <select class="form-select" id="complaint_type" name="complaint_type" required>
                        <option value="" disabled selected>Select a complaint type</option>
                        <option value="Missed Collection">Missed Collection</option>
                        <option value="Improper Disposal">Improper Disposal</option>
                        <option value="Damaged Collection Bins">Damaged Collection Bins</option>
                        <option value="Odor Issues">Odor Issues</option>
                        <option value="Uncollected Waste Overflow">Uncollected Waste Overflow</option>
                        <option value="Other">Other</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="fullname" class="form-label">Full Name</label>
                    <input type="text" class="form-control" id="fullname" name="fullname" placeholder="Juan dela Cruz" required>
                </div>
                <div class="mb-3">
                    <label for="contact_num" class="form-label">Contact Number</label>
                    <div class="input-group">
                        <span class="input-group-text">
                            <img src="{{ asset('assets/images/Flag/ph-flag.png') }}" alt="Philippine Flag" style="width: 20px; height: 15px;">
                            &nbsp;+63
                        </span>
                        <input type="tel" class="form-control" id="contact_num" name="contact_num" placeholder="9123456789" required>
                    </div>
                    <div class="form-text">To receive auto-generated message from the system.</div>
                </div>
                <div class="mb-3">
                    <label for="brgy_location" class="form-label">Barangay</label>
                    <select class="form-select" id="brgy_location" name="brgy_location" required>
                        <option value="" selected>Select</option>
                        <option value="Brgy. 1">Brgy. 1</option>
                        <option value="Brgy. 2">Brgy. 2</option>
                        <option value="Brgy. 3">Brgy. 3</option>
                        <option value="Brgy. 4">Brgy. 4</option>
                        <option value="Brgy. 5">Brgy. 5</option>
                        <option value="Brgy. 6">Brgy. 6</option>
                        <option value="Brgy. Waterfall">Brgy. Waterfall</option>
                        <option value="Brgy. Linggangao">Brgy. Linggangao</option>
                        <option value="Brgy. San Isidro">Brgy. San Isidro</option>
                        <option value="Brgy. Cala-Cala">Brgy. Cala-Cala</option>
                        <option value="Brgy. Talusan">Brgy. Talusan</option>
                        <option value="Brgy. Baliwagan">Brgy. Baliwagan</option>
                        <option value="Brgy. Binitinan">Brgy. Binitinan</option>
                        <option value="Brgy. Hermano">Brgy. Hermano</option>
                        <option value="Brgy. Cogon">Brgy. Cogon</option>
                        <option value="Brgy. Mandangoa">Brgy. Mandangoa</option>
                        <option value="Brgy. Mambayaan">Brgy. Mambayaan</option>
                        <option value="Brgy. Napaliran">Brgy. Napaliran</option>
                        <option value="Brgy. Balagnan">Brgy Balagnan</option>
                        <option value="Brgy. San Francisco">Brgy. San Francisco</option>
                        <option value="Brgy. Blanco">Brgy. Blanco</option>
                        <option value="Brgy. Calawag">Brgy. Calawag</option>
                        <option value="Brgy. Camuayan">Brgy. Camuayan</option>
                        <option value="Brgy. Dansuli">Brgy. Dansuli</option>
                        <option value="Brgy. Dumarait">Brgy. Dumarait</option>
                        <option value="Brgy. Kibanban">Brgy. Kibanban</option>
                        <option value="Brgy. Linabu">Brgy. Linabu</option>
                        <option value="Brgy. Quezon">Brgy. Quezon</option>
                        <option value="Brgy. Rosario">Brgy. Rosario</option>
                        <option value="Brgy. Samay">Brgy. Samay</option>
                        <option value="Brgy. San Juan">Brgy. San Juan</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="complaint_details" class="form-label">Description</label>
                    <textarea class="form-control" id="complaint_details" name="complaint_details" rows="4" placeholder="Describe the complaint in detail" required></textarea>
                </div>
                <div class="mb-3">
                    <label for="dateOfIncident" class="form-label">Date of Incident</label>
                    <input type="text" class="form-control" id="dateOfIncident" name="dateOfIncident" placeholder="Select date" required>
                </div>
                
                <div class="mb-3">
                    <label for="attachments" class="form-label">
                        Attachments
                    </label>
                    <span data-bs-toggle="tooltip" title="Maximum of 3 images only.">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="currentColor" class="icon icon-tabler icons-tabler-filled icon-tabler-info-circle">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                            <path d="M12 2c5.523 0 10 4.477 10 10a10 10 0 0 1 -19.995 .324l-.005 -.324l.004 -.28c.148 -5.393 4.566 -9.72 9.996 -9.72zm0 9h-1l-.117 .007a1 1 0 0 0 0 1.986l.117 .007v3l.007 .117a1 1 0 0 0 .876 .876l.117 .007h1l.117 -.007a1 1 0 0 0 .876 -.876l.007 -.117l-.007 -.117a1 1 0 0 0 -.764 -.857l-.112 -.02l-.117 -.006v-3l-.007 -.117a1 1 0 0 0 -.876 -.876l-.117 -.007zm.01 -3l-.127 .007a1 1 0 0 0 0 1.986l.117 .007l.127 -.007a1 1 0 0 0 0 -1.986l-.117 -.007z" />
                        </svg>
                    </span>
                    <input class="form-control" type="file" id="attachments" name="attachments" accept=".jpeg, .jpg, .png" multiple required>
                    <div class="form-text">Only .jpeg, .jpg, and .png file formats are allowed.</div>
                </div>

                <div class="g-recaptcha mb-3 w-100" data-sitekey="6LeL1nwqAAAAALl8VggnhX2jMr1pYeNeCowNag_z"></div>

                <button type="submit" class="btn btn-primary w-100" id="submitComplaint">
                    <div class="spinner-border spinner-border-sm text-white d-none" role="status" id="submitComplaintSpinner">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                    Submit Complaint
                </button>
            </form>
        </div>

        <div class="modal fade" id="importantMessageModal" tabindex="-1" aria-labelledby="importantMessageLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="importantMessageLabel">Notice to the Public</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>This form is only for the people residing balingasag municipality.</p>
                        {{-- <p>Please be aware that collection times may vary due to unforeseen circumstances. We appreciate your patience and cooperation.</p> --}}
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Got it</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script>
        const input = document.getElementById('contact_num');

        input.addEventListener('input', function (e) {
            let value = e.target.value.replace(/\D/g, ''); // Remove non-numeric characters
            if (value.length > 10) value = value.slice(0, 10); // Limit to 10 digits
            e.target.value = value.replace(/(\d{4})(\d{3})(\d{3})/, '$1 $2 $3'); // Format as 4-3-3
        });

        // Show the modal when the page loads
        document.addEventListener('DOMContentLoaded', function () {
            flatpickr("#dateOfIncident", {
                dateFormat: "Y-m-d", // Set the format to match your requirements
            });
            
            var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
            var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
                return new bootstrap.Tooltip(tooltipTriggerEl)
            })
            
            $('#attachments').on('change', function() {
                const maxFiles = 3; // Set maximum file limit
                const selectedFiles = this.files;

                if (selectedFiles.length > maxFiles) {
                    // Show SweetAlert warning if the limit is exceeded
                    Swal.fire({
                        icon: 'warning',
                        title: 'Too many files selected',
                        text: `Please select up to ${maxFiles} images only.`,
                        confirmButtonText: 'OK',
                        confirmButtonColor: "#01A94D"
                    });

                    // Clear the input
                    this.value = '';
                }
            });

            $('#brgy_location').select2({
                placeholder: "Select barangay",
                allowClear: true
            });

            var importantMessageModal = new bootstrap.Modal(document.getElementById('importantMessageModal'));
            importantMessageModal.show();

            const form = document.getElementById('complaintForm');
            const submitButton = document.getElementById('submitComplaint');

            // Disable the submit button initially
            submitButton.disabled = true;

            // Add an event listener to enable the submit button when a form field changes
            form.addEventListener('input', function () {
                submitButton.disabled = false;
            });

            $('#complaintForm').on('submit', function (e) {
                e.preventDefault();

                const recaptchaResponse = grecaptcha.getResponse();
                if (!recaptchaResponse) {
                    Swal.fire({
                        icon: 'warning',
                        title: 'Please Complete the reCAPTCHA',
                        text: 'You must verify you are not a robot before submitting.',
                        confirmButtonText: 'OK',
                        confirmButtonColor: "#01A94D"
                    });
                    return; // Stop form submission if reCAPTCHA is not completed
                }
                
                const attachments = $('#attachments')[0].files;
                const maxFileSize = 5 * 1024 * 1024; // 5MB in bytes
                const renamedFiles = []; // Array to store renamed filenames for database storage

                // Check file size and rename each attachment
                for (let i = 0; i < attachments.length; i++) {
                    const file = attachments[i];

                    // Check if file size exceeds the limit
                    if (file.size > maxFileSize) {
                        Swal.fire({
                            icon: 'warning',
                            title: 'File Too Large',
                            text: `Each image must be less than 5MB. File "${file.name}" is too large.`,
                            confirmButtonText: 'OK',
                            confirmButtonColor: "#01A94D"
                        });
                        return;
                    }

                    // Rename file: current timestamp + original file extension
                    const fileExtension = file.name.split('.').pop();
                    const newFileName = Date.now() + '_' + (i + 1) + '.' + fileExtension;

                    renamedFiles.push(newFileName);

                    // Create a new file object with the renamed file name
                    const renamedFile = new File([file], newFileName, { type: file.type });
                    attachments[i] = renamedFile; // Replace the file in the attachments array
                }

                // Disable submit button and show spinner if validation passes
                $('#submitComplaint').attr('disabled', true);
                $('#submitComplaintSpinner').removeClass('d-none');

                // Prepare form data
                let formData = new FormData(this);

                // Append the renamed files to the form data
                for (let i = 0; i < attachments.length; i++) {
                    formData.append('attachments[]', attachments[i]);
                }

                let contact_num = $('#contact_num').val();
                contact_num = '+63' + contact_num.replace(/\s+/g, '');

                // Append renamed filenames as a JSON string for database storage
                formData.append('renamed_filenames', JSON.stringify(renamedFiles));
                formData.append('contact_num', contact_num);

                // AJAX request to submit form data
                $.ajax({
                    url: "{{ route('rc.store') }}",
                    type: "POST",
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function (response) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Complaint Submitted',
                            text: response.message,
                            confirmButtonText: 'OK',
                            confirmButtonColor: "#01A94D"
                        });
                        $('#complaintForm')[0].reset();
                        // grecaptcha.reset();
                    },
                    error: function (error) {
                        let errors = error.responseJSON.errors;
                        let errorMessage = '';
                        for (let field in errors) {
                            errorMessage += errors[field][0] + '<br>';
                        }
                        Swal.fire({
                            icon: 'error',
                            title: 'Error!',
                            html: errorMessage,
                            confirmButtonText: 'OK',
                            confirmButtonColor: "#01A94D"
                        });
                    },
                    complete: function() {
                        $('#submitComplaint').attr('disabled', false);
                        $('#submitComplaintSpinner').addClass('d-none'); // Hide spinner
                    }
                });
            });
            
        });

        
    </script>
</body>
</html>
