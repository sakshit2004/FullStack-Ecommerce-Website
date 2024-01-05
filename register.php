<?php
include 'connection.php';

if (isset($_POST['submit-btn'])) {
    $filter_name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
    $name = mysqli_real_escape_string($conn, $filter_name);

    $filter_email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
    $email = mysqli_real_escape_string($conn, $filter_email);

    $filter_password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);
    $password = mysqli_real_escape_string($conn, $filter_password);

    $filter_cpassword = filter_var($_POST['cpassword'], FILTER_SANITIZE_STRING);
    $cpassword = mysqli_real_escape_string($conn, $filter_cpassword);

    $select_user = mysqli_query($conn, "SELECT * FROM `users` WHERE email = '$email'") or die('query failed');

    function checkPasswordStrength($password) {
        // Define password strength requirements using regular expressions
        $uppercase = preg_match('@[A-Z]@', $password);
        $lowercase = preg_match('@[a-z]@', $password);
        $number = preg_match('@[0-9]@', $password);
        $specialChar = preg_match('@[^\w]@', $password);

        // Define minimum length for the password
        $minLength = 8;

        // Check if the password meets all the requirements
        if ($uppercase && $lowercase && $number && $specialChar && strlen($password) >= $minLength) {
            return true;
        } else {
            return false;
        }
    }

    if (mysqli_num_rows($select_user) > 0) {
        $message[] = 'user already exists';
    } else {
        if ($password != $cpassword) {
            $message[] = 'passwords do not match';
        } elseif (!checkPasswordStrength($password)) {
            $message[] = 'password does not meet strength requirements: Password must contain An uppercase letter, a lowercase letter, a number, a special character with a minimum length of 8 characters';
        } else {
            // Hash the password before storing it
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            mysqli_query($conn, "INSERT INTO `users` (`name`, `email`, `password`) VALUES ('$name', '$email', '$hashed_password')") or die('query failed');
            $message[] = 'registered successfully';
            header('location:login.php');
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--box icon link-->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="style.css">

    <title>Register Page</title>
</head>
<body>
    <?php
    if (isset($message)) {
        foreach ($message as $msg) {
            echo '
            <div class="message">
                <span>' . $msg . '</span>
                <i class="bi bi-x-circle" onclick="this.parentElement.remove()"></i>
            </div>';
        }
    }
    ?>

    <section class="form-container">
        <form method="post">
            <h1> Register Now </h1>
            <input type="text" name="name" id="name" placeholder="Enter your Name" required>
            <input type="email" name="email" id="email" placeholder="Enter your Email" required>
            <input type="password" name="password" id="password" placeholder="Enter password" required>
            <input type="password" name="cpassword" id="cpassword" placeholder="Confirm password" required>
            <input type="submit" name="submit-btn" value="Register Now" class="btn">
            <p>
                already have an account ? <a href="login.php">Login Now</a>
            </p>
        </form>
    </section>
</body>
</html>
