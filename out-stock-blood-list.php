<?php
include('connection.php');
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0">
    <title>Out Stock Blood List</title>
    <link rel="stylesheet"
        type="text/css"
        href="css/s1.css">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        rel="stylesheet">
    <style>
        /* General body styling */
        body {
            background-color: #dc3545;
            color: white;
            font-family: Arial, sans-serif;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        /* Header styling */
        .header {
            background-color: #c82333;
            padding: 15px 20px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .header h2 {
            margin: 0;
            color: white;
            text-align: center;
        }

        .btn-logout {
            background-color: #dc3545;
            border: none;
            padding: 5px 15px;
            border-radius: 5px;
            font-size: 16px;
        }

        .btn-logout a {
            text-decoration: none;
            color: white;
            font-weight: bold;
        }

        .btn-logout:hover {
            background-color: #bd2130;
        }

        .btn-logout:hover a {
            color: white;
        }

        /* Main container */
        .container-box {
            background-color: rgba(255, 255, 255, 0.9);
            /* Semi-transparent white */
            color: #dc3545;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
            margin: auto;

            width: 30%;
            backdrop-filter: blur(10px);
            /* Blur effect */
        }

        /* Table styling */
        table {
            width: 100%;
            border-collapse: collapse;
            background-color: transparent;
            /* Transparent background */
        }

        th,
        td {
            padding: 12px;
            text-align: center;
            border: 1px solid #ddd;
            color: white;
        }

        th {
            background-color: #dc3545;
            color: white;
        }



        tr:hover {
            background-color: rgba(220, 53, 69, 0.2);
            /* Hover effect */
        }

        /* Footer styling */
        .footer {
            background-color: #c82333;
            color: white;
            padding: 10px;
            text-align: center;
            margin-top: auto;
            width: 100%;
        }

        .custom-header {
            background-color: #dc3545;
            /* Red background */
            color: white;
            /* White text */
            padding: 10px;
            /* Padding for better appearance */
            border-radius: 5px;
            /* Optional: adds rounded corners */
        }
    </style>
</head>

<body>
    <!-- Header -->
    <?php
    include('header.php');
    ?>

    <!-- Main container -->
    <div class="container-box">
        <?php
        if (!isset($_SESSION['admin_email'])) {
            echo '<script>alert("You are not logged in. Redirecting to login page."); window.location.href="index.php";</script>';
            exit();
        }
        ?>
        <h3 class="mb-4 text-center custom-header">Out Stock Blood List</h3>

        <table>
            <tr>
                <th>S.No</th>
                <th>Blood Group</th>
            </tr>
            <?php
            $counter = 1; // Initialize counter for serial number
            $q = $db->query("SELECT group_name FROM out_of_stock WHERE group_name NOT IN (SELECT bgroup FROM donor_registration)");
            while ($r1 = $q->fetch(PDO::FETCH_OBJ)) {
            ?>
                <tr>
                    <td><?= $counter++; ?></td> <!-- Display and increment the counter -->
                    <td><?= htmlspecialchars($r1->group_name); ?></td>
                </tr>
            <?php
            }
            ?>
        </table>

    </div>

    <!-- Footer -->
    <?php
    include('footer.php');
    ?>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>