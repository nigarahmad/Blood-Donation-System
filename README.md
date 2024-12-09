# Blood Donation Management System

## Overview

The **Blood Donation Management System** is a web-based application developed using core PHP, Bootstrap, and MySQL. The system allows users to manage blood donor registrations, check the availability of blood groups, and administer donor-related tasks efficiently. It includes an admin panel for system management.

### Admin Login Credentials:

- **Email**: `test@gmail.com`
- **Password**: `1234`

## Features

- **Admin Panel**: Manage donors and monitor out-of-stock blood groups.
- **Blood Group Tracking**: Identifies blood groups that are out of stock.
- **Email Notifications**: Sends notifications to admins and donors regarding eligibility and updates.
- **Secure Login System**: Admin access is restricted via secure login.

## Installation

### Prerequisites

Ensure the following are installed on your system:

1. **PHP** (version 7.4 or higher)
2. **MySQL**
3. **Apache or any web server**
4. **Git** (optional, for cloning the repository)

### Steps

1. **Clone the Repository**:

   ```bash
   git clone <repository_url>
   ```

   Replace `<repository_url>` with the actual URL of your GitHub repository.

2. **Upload the Project**:

   - Place the cloned project folder in your web server's root directory (e.g., `htdocs` for XAMPP, `www` for WAMP).

3. **Database Setup**:

   - Open **phpMyAdmin** (or any MySQL client).
   - Create a new database, e.g., `blood_donation`.
   - Import the provided SQL file:
     - Navigate to `Database > Import`.
     - Select the SQL file located in the project folder (e.g., `blood_donation.sql`).

4. **Update Database Configuration**:

   - Open the `connect.php` file.
   - Update the database credentials as per your environment:
     ```php
     $servername = "localhost";
     $username = "root"; // Replace with your database username
     $password = "";    // Replace with your database password
     $dbname = "mypro_bdms"; // Ensure this matches the database you created
     ```

5. **Run the Application**:
   - Start your web server (e.g., XAMPP, WAMP).
   - Access the project via a browser:
     ```
     http://localhost/<project-folder-name>
     ```

## Usage

### Admin Panel

1. Navigate to the login page: `http://localhost/<project-folder-name>/login.php`.
2. Enter the admin credentials to log in.
3. Use the panel to:
   - View and manage donor details.
   - Check out-of-stock blood groups.
   - Send email notifications to donors and admins.

### User Features

- Donors can register through the registration form.
- View available blood groups and their status.
