<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="{{ asset('assets/images/bali_logo.png') }}" />
    <title>Waste Collection Complaint Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
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
    </style>
</head>
<body>

    <div class="container my-5">
        <!-- Centered Logo -->
        <div class="text-center mb-4">
            <img src="{{ asset('assets/images/logo.png') }}" alt="System Logo" class="img-fluid" width="20%">
        </div>

        <!-- Form Card -->
        <div class="card shadow">
            <h3 class="text-center mb-4">Waste Collection Complaint Form</h3>
            <form id="complaintForm" method="POST">
                {{-- @csrf --}}
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="mb-3">
                    <label for="add_complaintType" class="form-label">Complaint Type</label>
                    <select class="form-select" id="add_complaintType" name="complaintType" required>
                        <option value="" disabled selected>Select a complaint type</option>
                        <option value="Missed Collection">Missed Collection</option>
                        <option value="Improper Disposal">Improper Disposal</option>
                        <option value="Damaged Collection Bins">Damaged Collection Bins</option>
                        <option value="dor Issues">Odor Issues</option>
                        <option value="Uncollected Waste Overflow">Uncollected Waste Overflow</option>
                        <option value="Other">Other</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="add_fullname" class="form-label">Full Name</label>
                    <input type="text" class="form-control" id="add_fullname" name="name" placeholder="Enter your full name" required>
                </div>
                <div class="mb-3">
                    <label for="add_contactnum" class="form-label">Contact Number</label>
                    <input type="number" class="form-control" id="add_contactnum" name="phone" placeholder="Enter your contact number">
                </div>
                <div class="mb-3">
                    <label for="add_brgy" class="form-label">Barangay</label>
                    <select class="form-select" id="add_brgy" name="add_brgy" required>
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
                    <label for="add_subject" class="form-label">Subject of Complaint</label>
                    <input type="text" class="form-control" id="add_subject" name="subject" placeholder="Briefly describe the complaint" required>
                </div>
                <div class="mb-3">
                    <label for="add_description" class="form-label">Detailed Description</label>
                    <textarea class="form-control" id="add_description" name="description" rows="4" placeholder="Describe the complaint in detail" required></textarea>
                </div>
                <div class="mb-3">
                    <label for="add_incidentDate" class="form-label">Date of Incident</label>
                    <input type="date" class="form-control" id="add_incidentDate" name="incidentDate" required>
                </div>
                <div class="mb-3">
                    <label for="add_attachments" class="form-label">Attachments</label>
                    <input class="form-control" type="file" id="add_attachments" name="attachments" multiple required>
                </div>
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        // Show the modal when the page loads
        document.addEventListener('DOMContentLoaded', function () {
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

                $('#submitComplaint').attr('disabled', true); 
                $('#submitComplaintSpinner').removeClass('d-none');

                let formData = {
                    _token: "{{ csrf_token() }}",
                    complaint_type: $('#add_complaintType').val(),
                    fullname: $('#add_fullname').val(),
                    contact_num: $('#add_contactnum').val(),
                    brgy_location: $('#add_brgy').val(),
                    complaint_subject: $('#add_subject').val(),
                    complaint_details: $('#add_description').val(),
                    dateOfIncident: $('#add_incidentDate').val(),
                };

                $.ajax({
                    url: "{{ route('rc.store') }}",
                    type: "POST",
                    data: formData,
                    success: function (response) {
                        
                        Swal.fire({
                            icon: 'success',
                            title: 'Complaint Submitted',
                            text: response.message,
                            confirmButtonText: 'OK',
                            confirmButtonColor: "#01A94D"
                        });

                        $('#complaintForm')[0].reset();
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
