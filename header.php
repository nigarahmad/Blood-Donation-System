<style>
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
</style>
<?php
// Start the session
?>

<div class="header d-flex justify-content-between align-items-center"
    style="background-color: #c82333 ; padding: 10px;">
    <h2 style="margin: 0; color: white; text-align:center">Blood Donation Management System</h2>

    <?php if (isset($_SESSION['admin_email'])): ?>
        <!-- Show the logout button if admin is logged in -->
        <button class="btn btn-danger"
            style="border-radius: 5px; padding: 5px 15px;">
            <a href="logout.php"
                style="text-decoration: none; color: white; font-weight: bold;">Logout</a>
        </button>
    <?php endif; ?>
</div>