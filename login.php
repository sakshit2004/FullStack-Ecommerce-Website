<?php
    include 'connection.php';
    session_start();

    if (isset($_POST['submit-btn'])) {
        $filter_email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
        $email = mysqli_real_escape_string($conn, $filter_email);

        $filter_password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);
        $password = mysqli_real_escape_string($conn, $filter_password);

        $select_user = mysqli_query($conn, "SELECT * FROM `users` WHERE LOWER(email) = LOWER('$email')") or die('query failed');

        if (mysqli_num_rows($select_user) > 0) {
            $row = mysqli_fetch_assoc($select_user);
            if (password_verify($password, $row['password'])){
                if($row['user_type'] == 'admin'){
                    $_SESSION['admin_name'] = $row['name'];
                    $_SESSION['admin_email'] = $row['email'];
                    $_SESSION['admin_id'] = $row['id'];
                    header('location:admin_pannel.php');
                }
                else if($row['user_type'] == 'user'){
                    $_SESSION['user_name'] = $row['name'];
                    $_SESSION['user_email'] = $row['email'];
                    $_SESSION['user_id'] = $row['id'];
                    header('location:index.php');
                }
            }
            else{
                $message[]= 'incorrect password';
            }
        }    
        else if(mysqli_num_rows($select_user) == 0) {
            $message[]= 'incorrect email';
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

    <title>Login Page</title>
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
            <h1> Login </h1>
            <div class="input-field">
                <label>Email</label><br>
                <input type="email" name="email" id="email" placeholder="Enter your Email" required>
            </div><br>
            <div class="input-field">
                <label>Password</label><br>
                <input type="password" name="password" id="password" placeholder="Enter password" required>
            </div>
           <input type="submit" name="submit-btn" value="Login Now" class="btn">
            <p>
                Do not have an account ? <a href="register.php">Register</a>
            </p>
        </form>
    </section>
</body>
</html>
