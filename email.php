<?php
date_default_timezone_set("Asia/Karachi");
include("connect.php");
include("smtp/PHPMailerAutoload.php");

// Get the current date
$current_date = date('Y-m-d');

// Calculate the target date (60 days ago)
$target_date = date('Y-m-d', strtotime('-60 days', strtotime($current_date)));

// Fetch eligible donors (who completed 60 or more days)
$query_donors = "SELECT id, name, registration_date, email, bgroup, mno, city FROM donor_registration WHERE DATE(registration_date) = DATE('$target_date')";
$result_donors = $conn->query($query_donors);

// Fetch logged-in admin details (assuming `is_logged_in` indicates if admin is currently logged in)
$query_admin = "SELECT email FROM admins WHERE is_logged_in = 1";
$result_admin = $conn->query($query_admin);

// Check if there are eligible donors and a logged-in admin
if ($result_donors->num_rows > 0 && $result_admin->num_rows > 0) {
    // Prepare the email content for the admin
    $message = "
    <html>
    <head>
        <style>
            body {
                font-family: Arial, sans-serif;
                color: #333;
                line-height: 1.6;
                margin: 0;
                padding: 0;
                background-color: #f9f9f9;
            }
            .container {
                width: 100%;
                max-width: 600px;
                margin: auto;
                padding: 20px;
                background-color: #ffffff;
                border-radius: 8px;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            }
            .header {
                background-color: #dc3545;
                color: #ffffff;
                padding: 10px;
                text-align: center;
                border-radius: 8px 8px 0 0;
                font-size: 18px;
            }
            .content {
                padding: 20px;
            }
            .content p {
                font-size: 16px;
                margin: 0 0 10px;
            }
            /* Horizontal scroll container for the table */
            .table-container {
                overflow-x: auto;  /* Enable horizontal scroll */
                -webkit-overflow-scrolling: touch; /* Smooth scrolling on iOS */
            }
            .data-table {
                width: 100%;
                border-collapse: collapse;
                margin-top: 20px;
                min-width: 600px; /* Set minimum width for scroll */
            }
            .data-table th, .data-table td {
                border: 1px solid #ddd;
                padding: 8px;
                text-align: left;
            }
            .data-table th {
                background-color: #dc3545;
                color: white;
            }
            .footer {
                text-align: center;
                font-size: 14px;
                color: #777;
                padding: 10px;
                border-top: 1px solid #ddd;
                margin-top: 20px;
            }
        </style>
    </head>
    <body>
        <div class='container'>
            <div class='header'>
                Eligible Blood Donors Notification
            </div>
            <div class='content'>
                <p>Dear Admin,</p>
                <p>The following users are eligible to donate blood again:</p>
                <div class='table-container'>
                    <table class='data-table'>
                        <tr>
                            
                            <th>Name</th>
							<th>Blood Group</th>
                            <th>Contact</th>
                            <th>Email</th>
                            <th>City</th>
                           
                        </tr>";

    // Add donor rows to admin's email message
    while ($row = $result_donors->fetch_assoc()) {
        $message .= "<tr><td>" . htmlspecialchars($row['name']) . "</td>
                     <td>" . htmlspecialchars($row['bgroup']) . "</td>
                     <td>" . htmlspecialchars($row['mno']) . "</td>
                     <td>" . htmlspecialchars($row['email']) . "</td>
                     <td>" . htmlspecialchars($row['city']) . "</td></tr>";
    }

    $message .= "</table></div><p>Thank you for using the Blood Donation Management System.</p></div></div></body></html>";

    // Send email to each logged-in admin
    while ($admin_row = $result_admin->fetch_assoc()) {
        $admin_email = $admin_row['email'];
        smtp_mailer($admin_email, "Eligible Blood Donors Notification", $message);
    }

    // Send individual emails to eligible donors
    $result_donors->data_seek(0); // Reset pointer to reuse $result_donors
    while ($donor = $result_donors->fetch_assoc()) {
        $donor_message = '
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Blood Donation Eligibility</title>
        <style>
            body {
                font-family: Arial, sans-serif;
                line-height: 1.6;
                background-color: #f8f9fa;
                margin: 0;
                padding: 0;
            }
            .email-container {
                max-width: 600px;
                margin: 20px auto;
                background-color: #ffffff;
                border: 1px solid #e3e3e3;
                border-radius: 8px;
                overflow: hidden;
                box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            }
            .email-header {
                background-color: #dc3545;
                color: #ffffff;
                text-align: center;
                padding: 15px;
            }
            .email-header h1 {
                margin: 0;
                font-size: 20px;
            }
            .email-body {
                padding: 20px;
                color: #333333;
            }
            .email-body p {
                margin: 0 0 15px;
            }
            .email-footer {
                background-color: #f8f9fa;
                color: #6c757d;
                text-align: center;
                padding: 10px;
                font-size: 12px;
                border-top: 1px solid #e3e3e3;
            }
            .btn {
                display: inline-block;
                background-color: #dc3545;
                color: #ffffff;
                text-decoration: none;
                padding: 10px 20px;
                border-radius: 5px;
                margin-top: 15px;
                font-weight: bold;
            }
            .btn:hover {
                background-color: #c82333;
                text-decoration: none;
                color: #ffffff;
            }
        </style>
    </head>
    <body>
        <div class="email-container">
            <div class="email-header">
                <h1>You are Eligible to Donate Blood Again!</h1>
            </div>
            <div class="email-body">
                <p>Dear ' . htmlspecialchars($donor['name']) . ',</p>
                <p>We are thrilled to inform you that you are now eligible to donate blood again. Your contributions have been invaluable in saving lives, and we look forward to your continued support.</p>
                <p>To schedule your next donation or for further details, please visit our center or contact us using the link below:</p>
                <a href="https://your-blood-center.com/schedule" class="btn">Schedule Your Donation</a>
            </div>
            <div class="email-footer">
                <p>Thank you for being a hero!</p>
                <p>&copy; ' . date('Y') . ' Blood Donation Management System</p>
            </div>
        </div>
    </body>
    </html>';

        smtp_mailer($donor['email'], "You're Eligible to Donate Blood Again", $donor_message);
    }
    echo "Emails sent to admin and eligible donors.";
} else {
    echo "No eligible donors or no logged-in admin found.";
}

// SMTP Mailer function
function smtp_mailer($to, $subject, $msg)
{
    $mail = new PHPMailer();
    $mail->IsSMTP();
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = 'tls';
    $mail->Host = "smtp.gmail.com";
    $mail->Port = 587;
    $mail->IsHTML(true);
    $mail->Username = "nigarahmad491@gmail.com"; // Use the email for the logged-in admin if possible
    $mail->Password = "xxwluueqdzqjkbzq"; // Use an app password for security
    $mail->SetFrom("nigarahmad491@gmail.com");
    $mail->Subject = $subject;
    $mail->Body = $msg;
    $mail->AddAddress($to);
    return $mail->Send();
}
