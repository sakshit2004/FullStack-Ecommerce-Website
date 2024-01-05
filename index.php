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
     // adding products in wishlist
    if(isset($_POST['add_to_cart'])){
        $product_id = $_post['$product_id'];
        $product_name = $_post['$product_name'];
        $product_price = $_post['$product_price'];
        $product_image = $_post['$product_image'];
        $product_quantity = $_POST['product_quantity'];
        $cart_num = mysqli_query($conn, "SELECT * FROM 'cart' WHERE name = '$product_name'AND user_id = '$user_id' ") or die('query failed');
        if (mysqli_num_rows($cart_num)>0) {
            $message[] = 'product already exist in cart';
        } else {
            mysqli_query($conn, "INSERT INTO 'cart' ('user_id', 'pid', 'name', 'price','quantity' , 'image') VALUES ('$user_id', '$product_id', '$product_name', '$product_price','$product_quantity','$product_image') ");
            $message[] = 'product successfuly added in your cart';
        }
    }

         // adding products in cart
         if(isset($_POST['add_to_wishlist'])){
            $product_id = $_post['$product_id'];
            $product_name = $_post['$product_name'];
            $product_price = $_post['$product_price'];
            $product_image = $_post['$product_image'];
    
            $wishlist_number = mysqli_query($conn, "SELECT * FROM 'wishlist' WHERE name = '$product_name'AND user_id = '$user_id' ") or die('query failed');
            $cart_num = mysqli_query($conn, "SELECT * FROM 'cart' WHERE name = '$product_name'AND user_id = '$user_id' ") or die('query failed');
            
            if(mysqli_num_rows($wishlist_number)>0) {
                $message[] = 'product already exist in wishlist';
            } elseif (mysqli_num_rows($cart_num)>0) {
                $message[] = 'product already exist in cart';
            } else {
                mysqli_query($conn, "INSERT INTO 'wishlist' ('user_id', 'pid', 'name', 'price', 'iamge') VALUES ('$user_id', '$product_id', '$product_name', '$product_price', '$product_image') ");
                $message[] = 'product successfuly added in your wishlist';
            }
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
    <!--bootstrap css link---->
    <!------slick slider link---->
    <link rel="stylesheet" type="text/css" href="slick.css" />
    <!---default css link---->
    <link rel="stylesheet" href="main.css">
</head>
<body>
    <?php include 'header.php';?>

    <!-------------home slider---------->
    <div class="container-fluid">
        <div class="hero-slder">
            <div class="slider-item">
                <img src="img/slider.jpg">
                <div class="slider-caption">
                    <span>Test the Quality</span>
                    <h1>Organic premium <br>Peanuts</h1>
                    <p>Introducing our Organic Premium Peanuts, a wholesome and nutritious delight for the discerning palate. Sourced from the finest organic farms, these premium peanuts are cultivated with care, ensuring a product that is free from synthetic pesticides and additives. Bursting with natural flavor, these peanuts are a guilt-free indulgence, rich in protein, fiber, and essential nutrients. Whether enjoyed as a snack on their own, added to salads, or incorporated into your favorite recipes, our Organic Premium Peanuts offer a deliciously wholesome experience that aligns with your commitment to a healthier lifestyle. Elevate your snacking experience with the pure goodness of organically grown, premium-quality peanuts.</p>
                    <a href="shop.php" class="btn">shop now</a>
                </div>
            </div>

    <div class="line"></div>
    <div class ="services">
        <div class="row">
            <div class="box">
            <img src="img/0.png">
            <div>
                <h1>Free shipping fast</h1>
                <p>Experience the convenience of swift and cost-free shipping with our commitment to delivering your orders promptly and efficiently.<p>
            </div>
            </div>

            <div class="box">
            <img src="img/1.png">
            <div>
                <h1>Money back guarantee</h1>
                <p>We stand behind the quality of our products, and to ensure your confidence and satisfaction in every purchase, we offer a money-back guarantee. <p>
            </div>
            </div>
            <div class="box">
            <img src="img/2.png">
            <div>
                <h1>Online support 24/7</h1>
                <p>Our commitment to customer satisfaction is unwavering, which is why we are proud to offer online support 24/7.<p>
            </div>
            </div>
        </div>
    </div>
<div class="line2"></div>
<div class="story">
    <div class="row">
        <div class="box">
            <span>Our Story</span>  
            <h1>Production of natural hone since 1990</h1>
            <p>Pioneering the production of natural honey since 1990, our commitment to quality and authenticity has been the hallmark of our brand. With a legacy rooted in beekeeping expertise, we have meticulously crafted a range of pure and unadulterated honey products. Our journey began with a passion for preserving the natural goodness of honey, and over the decades, we have maintained our dedication to sustainable beekeeping practices and ethical honey production.</p>
            <a href="shop.php" class="btn">shop now</a>
</div>
<div class="box">
    <img src="img/8.png">
</div>
</div>
</div>
</div>       
</div>
        
<!--Discover Scetion--> 
<div class="line2"></div>   
<div class="discover">
    <div class="detail">
        <h1 class="title">Organic Peanuts Be Healthy</h1>
        <span>Buy Now And Save 30% off!</span>
        <p>
           This limited-time promotion is our way of showing appreciation for your support. Don't miss the chance to get your favorite products at a fantastic discounted price.
        </p>
        <a href="shop.php" class="btn">discover now</a>
    </div>
    <div class="img-box">
        <img src="img/13.png">
    </div>
</div>
<div class="line3"></div>   
<?php include 'homeshop.php';?>
<div class="line"></div>

<div class="newslatter">
    <h1 class="title" >Join Our To newslatter</h1>
    <p>Get 15% off your next order. Be the first to learn about promotions special events, new arrivals and more.</p>
    <input type="text" name="" placeholder="your Email Address...">
    <button> Subscribe now</button>
</div>
<div class="line3"></div>
<div class="client">
</div>
<?php include 'footer.php';?>
<script type="text/javascript" src="script.js"></script>  
</body>
</html>
