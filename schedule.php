<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">
    <title>Blood Donation System - Schedule Donation</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
          rel="stylesheet">
    <style>
    body {
        background-color: #f8f9fa;
        display: flex;
        flex-direction: column;
        min-height: 100vh;
    }


    .header {
        background-color: #dc3545;
        color: white;
        padding: 10px 0;
    }

    .footer {
        background-color: #dc3545;
        color: white;
        text-align: center;
        padding: 10px 0;
        margin-top: auto;
    }

    a {
        text-decoration: none;
        color: inherit;
    }

    a:hover {
        color: #f1c40f;
    }

    .card {
        margin-top: 10%;
        margin-bottom: 50px;
        margin-left: auto;
        margin-right: auto;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        background-color: aquamarine;
    }

    .btn-success {
        background-color: #28a745;
        border: none;
    }

    .btn-success:hover {
        background-color: #218838;
    }
    </style>
</head>

<body>
    <!-- Header -->
    <?php
    include('header.php');
    ?>


    <!-- Body Content -->
    <div class="card">
        <div class="card-body">
            <h5 class="card-title text-center">Schedule a Donation</h5>
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>"
                  method="post"
                  class="needs-validation"
                  novalidate>
                <div class="mb-3">
                    <label for="donorName"
                           class="form-label">Donor Name</label>
                    <input type="text"
                           class="form-control"
                           id="donorName"
                           name="donorName"
                           required>
                    <div class="invalid-feedback">Please enter the donor's name.</div>
                </div>
                <div class="mb-3">
                    <label for="donationDate"
                           class="form-label">Preferred Date</label>
                    <input type="date"
                           class="form-control"
                           id="donationDate"
                           name="donationDate"
                           required>
                    <div class="invalid-feedback">Please select a valid date.</div>
                </div>
                <div class="d-grid">
                    <button type="submit"
                            class="btn btn-success">Schedule Donation</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Footer -->
    <?php
    include('footer.php');
    ?>


    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Form Validation -->
    <script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function() {
        'use strict'

        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        const forms = document.querySelectorAll('.needs-validation')

        // Loop over them and prevent submission
        Array.from(forms).forEach(form => {
            form.addEventListener('submit', event => {
                if (!form.checkValidity()) {
                    event.preventDefault()
                    event.stopPropagation()
                }

                form.classList.add('was-validated')
            }, false)
        })
    })()
    </script>

    <!-- Success Alert -->
    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Include database connection
        include 'connect.php';

        $donorName = $_POST['donorName'];
        $donationDate = $_POST['donationDate'];

        // Your logic for scheduling donation

        // Example: Assuming scheduling is successful
        echo "<script>
            alert('Donation scheduled successfully!');
        </script>";
    }
    ?>
</body>

</html>