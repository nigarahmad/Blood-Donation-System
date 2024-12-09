<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">
    <title>Donor Registration</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
          rel="stylesheet">
    <style>
    body {
        background: linear-gradient(135deg, #dc3545, #900c3f);
        color: white;
        font-family: Arial, sans-serif;
    }

    .header {
        text-align: center;
        padding: 20px 0;
        background-color: #c82333;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .container-box {
        background-color: white;
        color: #dc3545;
        border-radius: 15px;
        padding: 40px;
        box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
        width: 70%;
        margin: 40px auto;
    }

    .form-group label {
        font-weight: bold;
        color: #900c3f;
    }

    .form-control {
        border-radius: 10px;
        border: 1px solid #900c3f;
    }

    .form-control:focus {
        border-color: #dc3545;
        box-shadow: 0 0 5px rgba(220, 53, 69, 0.5);
    }

    .btn-submit {
        background-color: #dc3545;
        color: white;
        border-radius: 10px;
        padding: 10px 20px;
        border: none;
        transition: background-color 0.3s ease;
    }

    .btn-submit:hover {
        background-color: #bd2130;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    }

    .footer {
        background-color: #900c3f;
        color: white;
        padding: 10px;
        text-align: center;
    }

    a {
        color: white;
        text-decoration: none;
    }

    a:hover {
        text-decoration: underline;
    }

    @media (max-width: 768px) {
        .container-box {
            width: 90%;
        }
    }
    </style>
</head>

<body>
    <!-- Header Section -->
    <?php
    include('header.php');
    ?>

    <!-- Main Content -->
    <div class="container-box">
        <h3 class="text-center mb-4">Donor Registration</h3>
        <form action=""
              method="post">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="name">Name</label>
                    <input type="text"
                           class="form-control"
                           id="name"
                           name="name"
                           placeholder="Enter Name"
                           required>
                </div>
                <div class="form-group col-md-6">
                    <label for="fname">Father's Name</label>
                    <input type="text"
                           class="form-control"
                           id="fname"
                           name="fname"
                           placeholder="Enter Father's Name"
                           required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="address">Address</label>
                    <textarea class="form-control"
                              id="address"
                              name="address"
                              placeholder="Enter Address"
                              rows="3"
                              required></textarea>
                </div>
                <div class="form-group col-md-6">
                    <label for="city">City</label>
                    <input type="text"
                           class="form-control"
                           id="city"
                           name="city"
                           placeholder="Enter City"
                           required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="age">Age</label>
                    <input type="text"
                           class="form-control"
                           id="age"
                           name="age"
                           placeholder="Enter Age"
                           required>
                </div>
                <div class="form-group col-md-6">
                    <label for="bgroup">Blood Group</label>
                    <select class="form-control"
                            id="bgroup"
                            name="bgroup"
                            required>
                        <option value="A+">A+</option>
                        <option value="A-">A-</option>
                        <option value="B+">B+</option>
                        <option value="B-">B-</option>
                        <option value="O+">O+</option>
                        <option value="O-">O-</option>
                        <option value="AB+">AB+</option>
                        <option value="AB-">AB-</option>
                    </select>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="email">Email</label>
                    <input type="email"
                           class="form-control"
                           id="email"
                           name="email"
                           placeholder="Enter Email"
                           required>
                </div>
                <div class="form-group col-md-6">
                    <label for="mno">Mobile Number</label>
                    <input type="text"
                           class="form-control"
                           id="mno"
                           name="mno"
                           placeholder="Enter Mobile Number"
                           required>
                </div>
            </div>
            <div class="text-center">
                <button type="submit"
                        name="sub"
                        class="btn btn-submit">Save Record </button>
            </div>
        </form>
        <?php
        include("connection.php");
        if (isset($_POST['sub'])) {
            $name = $_POST['name'];
            $fname = $_POST['fname'];
            $address = $_POST['address'];
            $city = $_POST['city'];
            $age = $_POST['age'];
            $bgroup = $_POST['bgroup'];
            $email = $_POST['email'];
            $mno = $_POST['mno'];

            $q = $db->prepare("INSERT INTO donor_registration(name, fname, address, city, age, bgroup, email, mno) VALUES (:name, :fname, :address, :city, :age, :bgroup, :email, :mno)");
            $q->bindValue('name', $name);
            $q->bindValue('fname', $fname);
            $q->bindValue('address', $address);
            $q->bindValue('city', $city);
            $q->bindValue('age', $age);
            $q->bindValue('bgroup', $bgroup);
            $q->bindValue('email', $email);
            $q->bindValue('mno', $mno);

            if ($q->execute()) {
                echo "<script>alert('Donor Registered Successfully');</script>";
            } else {
                echo "<script>alert('Donor Registration Failed');</script>";
            }
        }
        ?>
    </div>

    <!-- Footer Section -->
    <?php
    include('footer.php');
    ?>

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>