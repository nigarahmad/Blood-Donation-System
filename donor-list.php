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
    <title>Donor List</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
          rel="stylesheet">
    <style>
    body {
        background-color: #dc3545;
        /* Red background */
        color: white;
        /* White text for better contrast */
        font-family: Arial, sans-serif;
        display: flex;
        flex-direction: column;
        min-height: 100vh;
    }

    #header {
        background-color: #b02a37;
        color: white;
        padding: 15px;
        text-align: center;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
    }

    #header h2 {
        margin: 0;
        font-size: 1.8rem;
    }

    #header a {
        text-decoration: none;
        color: white;
        font-weight: bold;
    }

    h1 {
        font-size: 2.5rem;
        font-weight: bold;
        text-align: center;
        color: white;
        text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.5);
        margin-bottom: 20px;
    }

    #search-bar {
        margin: 20px 0;
        text-align: center;
    }

    #search-bar input {
        width: 60%;
        padding: 12px 15px;
        font-size: 1.1rem;
        border: 2px solid #b02a37;
        border-radius: 50px;
        outline: none;
        transition: all 0.3s ease;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
    }

    #search-bar input:focus {
        border-color: #dc3545;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.4);
    }

    #search-bar button {
        padding: 12px 25px;
        font-size: 1.1rem;
        color: white;
        background-color: #b02a37;
        border: none;
        border-radius: 50px;
        cursor: pointer;
        transition: all 0.3s ease;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
    }

    #search-bar button:hover {
        background-color: #dc3545;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.4);
    }

    #table-container {
        margin: 20px auto;
        width: 95%;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        border-radius: 10px;
        overflow: hidden;
        background: rgba(255, 255, 255, 0.2);
        /* Transparent table background */
        backdrop-filter: blur(5px);
        /* Adds a glass-like effect */
    }

    table {
        width: 100%;
        border-collapse: collapse;
        background: transparent;
        /* Fully transparent */
    }

    th,
    td {
        padding: 15px;
        text-align: center;
        border: 1px solid rgba(255, 255, 255, 0.3);
        /* Light border for contrast */
        color: white;
    }

    th {
        background-color: rgba(220, 53, 69, 0.8);
        /* Semi-transparent red header */
        color: white;
        font-size: 1.1rem;
        font-weight: bold;
    }

    tr {
        background-color: rgba(255, 255, 255, 0.1);
        /* Transparent rows */
        transition: all 0.3s ease;
    }

    tr:nth-child(even) {
        background-color: rgba(255, 255, 255, 0.15);
        /* Slightly darker for alternate rows */
    }

    tr:hover {
        background-color: rgba(220, 53, 69, 0.8);
        /* Bright red hover effect */
        color: white;
        transform: scale(1.02);
        /* Slight zoom-in effect */
    }

    #footer {
        background-color: #b02a37;
        color: white;
        padding: 10px;
        margin-top: auto;
        /* Ensures footer is pushed to the bottom */
    }

    #footer a {
        color: white;
        text-decoration: none;
    }
    </style>
</head>

<body>
    <?php
    include('header.php');
    ?>

    <div class="container my-4">

        <div id="search-bar">
            <form action=""
                  method="get">
                <input type="text"
                       name="search"
                       placeholder="Search by Blood Group"
                       value="<?= isset($_GET['search']) ? $_GET['search'] : ''; ?>">
                <button type="submit">Search</button>
            </form>
        </div>
        <div id="table-container">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Father Name</th>
                        <th>Address</th>
                        <th>City</th>
                        <th>Age</th>
                        <th>Blood Group</th>
                        <th>E-Mail</th>
                        <th>Mobile Number</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $searchQuery = isset($_GET['search']) ? trim($_GET['search']) : '';
                    $sql = "SELECT * FROM donor_registration";
                    if (!empty($searchQuery)) {
                        $sql .= " WHERE bgroup LIKE :search";
                    }
                    $stmt = $db->prepare($sql);
                    if (!empty($searchQuery)) {
                        $stmt->bindValue(':search', "%$searchQuery%", PDO::PARAM_STR);
                    }
                    $stmt->execute();
                    if ($stmt->rowCount() > 0) {
                        while ($r1 = $stmt->fetch(PDO::FETCH_OBJ)) {
                    ?>
                    <tr>
                        <td><?= $r1->name; ?></td>
                        <td><?= $r1->fname; ?></td>
                        <td><?= $r1->address; ?></td>
                        <td><?= $r1->city; ?></td>
                        <td><?= $r1->age; ?></td>
                        <td><?= $r1->bgroup; ?></td>
                        <td><?= $r1->email; ?></td>
                        <td><?= $r1->mno; ?></td>
                    </tr>
                    <?php
                        }
                    } else {
                        echo "<tr><td colspan='8'>No results found.</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <?php
    include('footer.php');
    ?>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>