<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/form.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <title>Login</title>
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
            <form class="register-form" action="" method="post">
                <input type="text" placeholder="First Name" name="f_name" required />
                <input type="text" placeholder="Last Name" name="l_name" required />
                <input type="text" placeholder="Username" name="u_name" pattern="^\S+$" title="Username cannot contain spaces" required />
                <input type="email" placeholder="Email" name="email" required />
                <input type="password" placeholder="Password" name="password" required />
                <div class="error-message alert alert-danger" style="display: none;" id="password-error"></div>
                <div class="success-message alert alert-success" style="display: none;" id="password-success"></div>
                <button type="submit" name="signup">Sign Up</button>
                <p class="message">Already registered? <a href="#">Sign In</a></p>
            </form>
            <form class="login-form" action="" method="post">
                <input type="text" placeholder="Username" name="login_u_name" pattern="^\S+$" title="Username cannot contain spaces" required />
                <input type="password" placeholder="Password" name="login_password" required />
                <button type="submit" name="login">Login</button>
                <p class="message">Not registered? <a href="#">Sign Up</a></p>
            </form>
        </div>
    </div>

    <?php
     session_start();
    if (isset($_POST['login'])) {
        require "config.php";

        $loginUserName = $_POST["login_u_name"];
        $loginPassword = $_POST["login_password"];

        // Query the database to check if the user exists with the provided username
        $loginQuery = "SELECT * FROM `user` WHERE `username` = '$loginUserName'";
        $loginResult = mysqli_query($conn, $loginQuery);

        if ($loginResult && mysqli_num_rows($loginResult) > 0) {
            $userData = mysqli_fetch_assoc($loginResult);
            $hashedPassword = $userData['password'];

            if (password_verify($loginPassword, $hashedPassword)) {
                // User login is successful
                $_SESSION['username'] = $loginUserName;
                header("Location: index.php");
                exit();
            } else {
                // User login failed
                echo "<script>alert('Login Failed')</script>";
            }
        } else {
            // User login failed
            echo "<script>alert('Login Failed')</script>";
        }
    }

    if (isset($_POST['signup'])) {
        require "config.php";

        $firstName = $_POST["f_name"];
        $lastName = $_POST["l_name"];
        $userName = $_POST["u_name"];
        $email = $_POST["email"];
        $password = $_POST["password"];

        // Check if the username already exists in the database
        $checkUsernameQuery = "SELECT * FROM `user` WHERE `username` = '$userName'";
        $checkUsernameResult = mysqli_query($conn, $checkUsernameQuery);

        if ($checkUsernameResult && mysqli_num_rows($checkUsernameResult) > 0) {
            // Username already exists, display an alert message
            echo "<script>alert('Username already exists!')</script>";
        } else {
            // Username does not exist, proceed with the signup process
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT); // Create an encrypted password

            $signupQuery = "INSERT INTO `user` (`first_name`, `last_name`, `username`, `email`, `password`) VALUES ('$firstName', '$lastName', '$userName', '$email', '$hashedPassword')";

            if (mysqli_query($conn, $signupQuery)) {
                header("Location: index.php");
                exit();
            }
        }
    }
    ?>

    <script src="script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        $(".message a").click(function() {
            $("form").animate({
                height: "toggle",
                opacity: "toggle"
            }, "slow");
        });
    </script>
</body>

</html>