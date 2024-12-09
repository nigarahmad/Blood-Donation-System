<?php


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">
    <title>Blood Donation Management System - Login</title>
    <!-- Bootstrap CSS link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css"
          rel="stylesheet">
    <style>
    body {
        background-color: #dc3545;
        /* Red background */
        color: white;
    }

    .form-container {
        max-width: 500px;
        margin: 100px auto;
        padding: 30px;
        border-radius: 8px;
        background-color: #ffffff;
        color: #000000;
    }

    .btn-custom {
        background-color: #dc3545;
        color: white;
    }

    .btn-custom:hover {
        background-color: #c82333;
        color: white;
    }

    .form-label {
        color: #dc3545;
    }
    </style>
</head>
<?php
include('header.php');
?>

<div class="form-container shadow-lg p-3 mb-5 bg-white rounded">
    <h2 class="text-center text-danger mb-4">Admin Login</h2>
    <form action="login.php"
          method="POST">
        <div class="mb-3">
            <label for="email"
                   class="form-label">Email</label>
            <input type="text"
                   class="form-control"
                   id="email"
                   name="email"
                   required
                   placeholder="Enter Email">
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
        <button type="submit"
                name="submit"
                class="btn btn-custom btn-block w-100">Login</button>
        <div class="text-center mt-3">
            <p>Don't have an account? <a href="register.php"
                   class="text-danger">Register here</a>.</p>
        </div>
    </form>
</div>

</div><br><br>
<?php
include('footer.php');
?>

</body>

<!-- Bootstrap JS and dependencies -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>

<?php
session_start();
include("connect.php"); // Database connection

// Assuming you have form submission with `email` and `password` fields
if (isset($_POST['email']) && isset($_POST['password'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    // Query to check if the credentials are correct
    $query = "SELECT * FROM admins WHERE email = ? AND password = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ss", $email, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        // Admin is found; set session variable
        $_SESSION['admin_email'] = $email;

        // Update the is_logged_in status
        $update_query = "UPDATE admins SET is_logged_in = 1 WHERE email = ?";
        $update_stmt = $conn->prepare($update_query);
        $update_stmt->bind_param("s", $email);
        $update_stmt->execute();
        $name = "SELECT name from admins WHERE email = '$email' AND password = '$password'";
        $result_name = mysqli_query($conn, $name);
        if (mysqli_num_rows($result_name) == 0) {
            echo "Invalid login credentials.";
        } else {
            $row = mysqli_fetch_assoc($result_name);
            $_SESSION['admin_name'] = $row['name'];
            // $_SESSION['admin_email'] = $email;
            // header("Location: index.php");
            // exit();
        }


        // Redirect to dashboard or another page
        header("Location: admin.php");
        echo "<script>alert('Login successful!');</script>";
        exit();
    } else {
        echo "<script>alert('Invalid login credentials.');</script>";
    }
}
?>