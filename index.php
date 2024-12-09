<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport"
        content="width=device-width, initial-scale=1">
    <title>Admin Dashboard - Blood Donation Management System</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        rel="stylesheet">
    <style>
        /* General Body Styling */
        body {
            background-color: #dc3545;
            color: white;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            font-family: Arial, sans-serif;
        }

        /* Header */
        .header {
            display: flex;
            align-items: center;
            padding: 15px 20px;
            background-color: #c82333;
            position: relative;
        }

        .header h2 {
            flex-grow: 1;
            text-align: center;
            margin: 0;
            color: white;
        }

        .btn-danger {
            background-color: #dc3545;
            border: none;
            padding: 5px 15px;
            border-radius: 5px;
            font-size: 16px;
        }

        .btn-danger a {
            text-decoration: none;
            color: white;
            font-weight: bold;
        }

        .btn-danger:hover {
            background-color: #bd2130;
        }

        .btn-danger:hover a {
            color: white;
        }

        /* Main Container Styling */
        .container-box {
            background-color: white;
            color: #dc3545;
            border-radius: 8px;
            padding: 30px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
            text-align: center;
            width: 60%;
            margin: auto;
            margin-top: 50px;
        }

        .quote {
            background-color: #dc3545;
            color: white;
            padding: 15px;
            border-radius: 5px;
            margin-bottom: 20px;
        }

        .quote {
            width: 100%;
            height: 100%;
            background-color: #dc3545;
            /* Initial background color */
            animation: background-blink 2s infinite;
            /* Blinking effect */
            margin-bottom: 10px;
        }

        /* Keyframes for the blinking background color */
        @keyframes background-blink {

            0%,
            100% {
                background-color: #dc3545;
                /* Matches "Save Lives, One Drop at a Time." */
            }

            50% {
                background-color: #f8f9fa;
                /* Light color for contrast */
            }
        }


        /* Link and Button Styling */
        .dashboard-links a {
            color: #dc3545;
            font-weight: bold;
            text-decoration: none;
            display: block;
            padding: 10px;
            border-radius: 5px;
            background-color: #f8f9fa;
            box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.1);
            margin: 10px 0;
            transition: background-color 0.3s ease, transform 0.3s ease;
        }

        .dashboard-links a:hover {
            background-color: #dc3545;
            color: white;
            transform: translateY(-3px);
        }

        .btn-email {
            background-color: #dc3545;
            color: white;
            border-radius: 5px;
            padding: 10px 20px;
            margin-top: 20px;
        }

        .btn-email:hover {
            background-color: #bd2130;
            color: white;
        }

        /* Footer Styling */
        .footer {
            background-color: #c82333;
            color: white;
            padding: 10px;
            text-align: center;
            margin-top: auto;
            width: 100%;
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .container-box {
                width: 90%;
                padding: 20px;
            }
        }
    </style>
</head>

<body>
    <!-- Header Section -->
    <div class="header d-flex justify-content-between align-items-center px-3">
        <!-- Header Title -->
        <h2 class="text-center flex-grow-1 m-0"
            style="color: white;">
            Blood Donation Management System
        </h2>

        <!-- Buttons for Log In and Sign Up -->
        <div class="header-buttons ms-auto">
            <button class="btn btn-outline-light btn-sm mx-1">
                <a href="login.php"
                    style="text-decoration: none; color: white; font-weight: bold;">Log In</a>
            </button>
            <button class="btn btn-outline-light btn-sm mx-1">
                <a href="register.php"
                    style="text-decoration: none; color: white; font-weight: bold;">Sign Up</a>
            </button>
        </div>
    </div>



    <br>
    <br>
    <br>
    <!--
        Main
        Container
        for
        Dashboard
        Links
        -->
    <div class="container mt-4 container-box">
        <p class="quote">
            <b> "Save Lives,
                One
                Drop
                at
                a
                Time."</b>
            <br>Join our blood donation network and become a hero for
            those in need.
        </p>

        <!-- Dashboard Links Centered and Organized -->
        <div class="row justify-content-center dashboard-links">
            <div class="col-6 col-md-4">
                <a href="donor-reg.php">Donor Registration</a>
            </div>
            <div class="col-6 col-md-4">
                <a href="donor-list.php"> Available Donor List</a>
            </div>

        </div>
    </div>

    <!-- Footer Section -->
    <div class="footer">
        <h6>&copy; 2024 Blood Donation Management System</h6>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>