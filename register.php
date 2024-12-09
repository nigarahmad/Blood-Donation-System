<?php
// Include the database connection file
include("connect.php");

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $cpassword = mysqli_real_escape_string($conn, $_POST['cpassword']);
    $mobile_number = mysqli_real_escape_string($conn, $_POST['mobile_number']);

    // Validate password and confirm password match
    if ($password != $cpassword) {
        echo '  <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Error:</strong> Passwords do not match!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
    } else {
        // Hash the password before storing it
        // $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Insert data into the database
        $sql = "INSERT INTO admins (name, email, password, mobile_number) 
                VALUES ('$name', '$email', '$password', '$mobile_number')";

        if ($conn->query($sql) === TRUE) {
            echo "<script>
                alert('You are registered successfully!');
                window.location.href = 'login.php';
              </script>";
        } else {
            echo "<script>
               alert('Registration failed. Please try again!');
              </script>";
        }
    }
    // Close the connection
    $conn->close();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0">
    <title>Admin Registration</title>
    <!-- Bootstrap CSS link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css"
        rel="stylesheet">
    <style>
        /* Background and text color */
        body {
            background-color: #dc3545;
            color: white;
        }

        .form-container {
            max-width: 600px;
            margin: 50px auto;
            padding: 30px;
            border-radius: 8px;
            background-color: #ffffff;
            color: #000000;
        }

        /* Custom button color */
        .btn-custom {
            background-color: #dc3545;
            color: white;
        }

        .btn-custom:hover {
            background-color: #c82333;
            color: white;
        }

        /* Red color for labels */
        .form-label {
            color: #dc3545;
        }

        .footer {
            background-color: #900c3f;
            color: white;
            padding: 10px;
            text-align: center;
        }
    </style>
</head>

<body>

    <?php
    include('header.php');
    ?>

    <div class="form-container shadow-lg p-3 mb-5 bg-white rounded">
        <h2 class="text-center text-danger mb-4">Admin Registration</h2>
        <form method="POST"
            action="register.php">
            <div class="mb-3">
                <label for="name"
                    class="form-label">Full Name</label>
                <input type="text"
                    class="form-control"
                    id="name"
                    name="name"
                    required
                    placeholder="Enter Full Name">
            </div>

            <div class="mb-3">
                <label for="email"
                    class="form-label">Email Address</label>
                <input type="email"
                    class="form-control"
                    id="email"
                    name="email"
                    required
                    placeholder="Enter Email Address">
            </div>

            <div class="mb-3">
                <label for="password"
                    class="form-label">Password</label>
                <input type="password"
                    class="form-control"
                    id="password"
                    name="password"
                    required
                    placeholder="Enter Password">
            </div>

            <div class="mb-3">
                <label for="cpassword"
                    class="form-label">Confirm Password</label>
                <input type="password"
                    class="form-control"
                    id="cpassword"
                    name="cpassword"
                    required
                    placeholder="Enter Password">
            </div>

            <div class="mb-3">
                <label for="mobile_number"
                    class="form-label">Mobile Number</label>
                <input type="text"
                    class="form-control"
                    id="mobile_number"
                    name="mobile_number"
                    required
                    placeholder="Enter Mobile Number">
            </div>

            <button type="submit"
                class="btn btn-custom btn-block w-100">Register</button>
        </form>
        <div class="text-center mt-3">
            <p>Already have an account? <a href="login.php"
                    class="text-danger">Log in here</a>.</p>
        </div>
    </div>
    </div>

    <?php
    include('footer.php');
    ?>



    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>

</body>

</html>