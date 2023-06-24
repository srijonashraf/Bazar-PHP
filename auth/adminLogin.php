<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/form.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <title>Admin Login</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .login-page {
            display: flex;
            justify-content: center;
            flex-direction: column;
            align-items: center;
            height: 100vh;
        }

        .form {
            position: relative;
        }

        .message {
            position: absolute;
            bottom: -40px;
            left: 50%;
            transform: translateX(-50%);
        }

        .login-failed {
            margin-top: 2rem;
            display: none;
            text-align: center;
            color: red;
        }
    </style>
</head>

<body>
    <div class="login-page">
        <div class="form">
            <h2 class="mb-4" style="font-family: Poppins;">Admin Panel</h2>
            <form class="login-form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                <input type="text" placeholder="Username" name="login_u_name" required />
                <input type="password" placeholder="Password" name="login_password" required />
                <button type="submit" name="login">Login</button>
            </form>
        </div>
    </div>

    <?php

    session_start();

    if (isset($_POST['login'])) {
        require "../database/config.php";

        $loginUserName = $_POST["login_u_name"];
        $loginPassword = $_POST["login_password"];

        // Query the database to check if the user exists with the provided username and password
        $loginQuery = "SELECT * FROM `admin` WHERE `admin_username` = '$loginUserName' AND `admin_password` = '$loginPassword'";
        $loginResult = mysqli_query($conn, $loginQuery);

        if ($loginResult && mysqli_num_rows($loginResult) > 0) {
            // User login is successful
            $_SESSION['adminloginUserName'] = $loginUserName;
            header("Location: ../admin/adminPanel.php");
            exit();
        } else {
            // User login failed
            echo "<script>alert('Login Failed')</script>";
        }
    }


    ?>

    <script src="./js/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</body>

</html>