<?php

    include 'connection.php';
    session_start();
    $admin_id = $_SESSION['user_name'];

    if (!isset($admin_id)) {
        header('location:login.php');
    }


    if (isset($_POST['logout'])) {
        session_destroy();
        header('location:login.php');
    }
?>

<style type="text/css">
    <?php
    include 'main.css';
    ?>
</style>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--bootstrap icon link---->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="main.css">
    
</head>
<body>
    <?php include 'header.php';?>
    <div class="banner">
        <div class="detail">
            <h1>about us</h1>
            <p>Welcome to Pure Peanut, your go-to destination for exquisite peanut butter experiences!.</p>
            <a href="index.php">home</a><span>/ about us</span>
        </div>
    </div>
    <div class="line"></div>
        <!----ABOUT US---->
    <?php include 'header.php';?>
    <div class="about-us">
        <div class="row">
            <div class="box">
                <div class="title">
                    <span>About our online store</span>
                    <h1>Hello, With 25 years of experience</h1>
                    <p>Our journey started with a genuine passion for celebrating the natural simplicity of peanuts. Sourced directly from trusted farmers, our peanuts are a testament to our commitment to providing you with a wholesome and unadulterated experience. We believe in letting the pure, authentic flavor of peanuts shine, whether you enjoy them as a snack, part of a recipe, or in their various forms.</p>
</div>
<div class="img-box">
    <img src="img/about3.png">
</div>
</div>
</div>
<div class="line3"></div>
<!----------------features------------->
<div class="line4"></div>
<div class="features">
    
    <div class="title">
        <h1>Complete Customer Ideas</h1>
        <span>best features</span>
</div>
<div class="support">
<div class="box icon-box">
    <img src="img/icon2.png">
    <h4>24X7</h4>
    <p>Online Support</p>
</div>
<div class="box icon-box">
    <img src="img/icon1.png">
    <h4>Money Back Gurantee</h4>
    <p>100% secure payment</p>
</div>
<div class="box icon-box">
    <img src="img/icon0.png">
    <h4>Special Gift Card</h4>
    <p>Give The perfect gift</p>
</div>
<div class="box icon-box">
    <img src="img/icon.png">
    <h4>WorldWide Shipping</h4>
    <p>On order over $99</p>
</div>
</div>
</div>
</div>
<div class="line"></div>

<div class="title">
    <h1>Our Workable Team</h1>
    <span>best team</span>
</div>
<div class="row work-team">
<div class="box">

<div class="detail">
    <span>Director</span>
    <h4>Abhishek Aggarwal</h4>
    <div class="icons">
            <i class="bi bi-instagram"></i>
            <i class="bi bi-youtube"></i> <i class="bi bi-twitter"></i>
            <i class="bi bi-behance"></i>
            <i class="bi bi-whatsapp"></i>
        </div>
</div>
</div>
<div class="box">

<div class="detail">
    <span>CEO</span>
    <h4>Sakshit Sharma</h4>
    <div class="icons">
            <i class="bi bi-instagram"></i>
            <i class="bi bi-youtube"></i> <i class="bi bi-twitter"></i>
            <i class="bi bi-behance"></i>
            <i class="bi bi-whatsapp"></i>
        </div>
</div>
</div>
<div class="box">

<div class="detail">
    <span>CFO</span>
    <h4>Ayush Kapoor</h4>
    <div class="icons">
            <i class="bi bi-instagram"></i>
            <i class="bi bi-youtube"></i> <i class="bi bi-twitter"></i>
            <i class="bi bi-behance"></i>
            <i class="bi bi-whatsapp"></i>
        </div>
</div>
</div>
<div class="box">

<div class="detail">
    <span>General Manager</span>
    <h4>Jeel Tandel</h4>
    <div class="icons">
            <i class="bi bi-instagram"></i>
            <i class="bi bi-youtube"></i> <i class="bi bi-twitter"></i>
            <i class="bi bi-behance"></i>
            <i class="bi bi-whatsapp"></i>
</div>
</div>
</div>
<div class="box">

<div class="detail">
    <span>Finance Manager</span>
    <h4>Miguel Rodrigez</h4>
    <div class="icons">
            <i class="bi bi-instagram"></i>
            <i class="bi bi-youtube"></i> <i class="bi bi-twitter"></i>
            <i class="bi bi-behance"></i>
            <i class="bi bi-whatsapp"></i>
</div>
</div>
</div>
</div>
</div>
<div class="line3"></div>
<div class="line4"></div>
<div class="project">

</div>
<div class="line"></div>
<div class="ideas">
    <div class="title">
        <h1>We and our clients are Happy to cooperate with our company</h1>
        <span>our features</span>
        <div class="row">
            <div class="box">
                <i class="bi bi-stack"></i>
                    <div class="detail">
                        <h2>What we really do</h2>
                        <p>In essence, what we really do is strive for excellence in every facet of our business. We are not just selling products; we are building relationships, fostering innovation, improving lives, embracing sustainability, and upholding the highest standards of integrity.
                            Welcome to a journey where our actions speak louder than words, and our impact goes beyond the ordinary.</p>
                    </div>
            </div>
            <div class="box">
                <i class="bi bi-grid-1x2-fill"></i>
                    <div class="detail">
                        <h2>History of Beginning</h2>
                        <p>The history of our beginning is a narrative of growth, adaptation, and a relentless pursuit of our vision.
                            It is a story that involves the contributions of every member of our team, the support of our customers, and the evolving landscape</p>
                    </div>
            </div>
            <div class="box">
                <i class="bi bi-tropical-storm"></i>
                    <div class="detail">
                        <h2>Our Vision</h2>
                        <p>As we pursue our vision, we understand that it is a journey, not a destination.
                            It requires dedication, collaboration, and a continuous pursuit of improvement.
                            Our vision serves as a compass, guiding us through the challenges and triumphs, and inspiring us to create a future </p>
                    </div>
            </div>
        </div>
    </div>

</div>

<?php include 'footer.php';?>
    <script type="text/javascript"></script>  
</body>
</html>
