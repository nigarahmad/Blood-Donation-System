<?php
date_default_timezone_set("asia/karachi");
// Include database connection and mail configuration
include("connect.php");
include("smtp/PHPMailerAutoload.php");

// Get the current date and time
$current_date = date('Y-m-d');

// Calculate the date 5 days ago
$target_date = date('Y-m-d', strtotime('-60 days', strtotime($current_date)));

// Query to find users who registered exactly 5 days ago
$query = "SELECT id,name, registration_date,email,bgroup,mno,city FROM donor_registration WHERE DATE(registration_date) = DATE('$target_date')";
$result = $conn->query($query);
echo $result->num_rows;
if ($result->num_rows > 0) {
    // Prepare email message
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

    while ($row = $result->fetch_assoc()) {
        $message .= "
                        <tr>
                          
                            <td>" . htmlspecialchars($row['name']) . "</td>
							 <td>" . htmlspecialchars($row['bgroup']) . "</td>
                            <td>" . htmlspecialchars($row['mno']) . "</td>
                            <td>" . htmlspecialchars($row['email']) . "</td>
                            <td>" . htmlspecialchars($row['city']) . "</td>
                            
                        </tr>";
    }

    $message .= "
                    </table>
                </div>
                <p>Thank you for using the Blood Donation Management System to manage your donors.</p>
            </div>
            <div class='footer'>
                &copy; 2024 Blood Donation Management System
            </div>
        </div>
    </body>
    </html>";





    // Send the email to the admin
    $admin_email = "ahmadnigar491@gmail.com"; // 
    if (smtp_mailer($admin_email, "Eligible Blood Donors", $message)) {
        echo "Email sent successfully.";
    } else {
        echo "Failed to send email.";
    }
} else {
    echo "No users eligible for donation today.";
}

// SMTP Mailer Function (update as needed)
function smtp_mailer($to, $subject, $msg)
{
    $mail = new PHPMailer();
    $mail->IsSMTP();
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = 'tls';
    $mail->Host = "smtp.gmail.com";
    $mail->Port = 587;
    $mail->IsHTML(true);
    $mail->Username = "nigarahmad491@gmail.com"; // Use your email mahrukh@...
    $mail->Password = "xxwluueqdzqjkbzq"; // Use your app password for security
    $mail->SetFrom("nigarahmad491@gmail.com"); //use your email mahrukh@...
    $mail->Subject = $subject;
    $mail->Body = $msg;
    $mail->AddAddress($to);

    return $mail->Send();
}