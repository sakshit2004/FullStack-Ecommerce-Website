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
                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ea, vero?</p>
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
                <p>Lorem ipsum dolor sit.<p>
            </div>
            </div>

            <div class="box">
            <img src="img/1.png">
            <div>
                <h1>Money back guarantee</h1>
                <p>Lorem ipsum dolor sit.<p>
            </div>
            </div>
            <div class="box">
            <img src="img/2.png">
            <div>
                <h1>Online support 24/7</h1>
                <p>Lorem ipsum dolor sit.<p>
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
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quaerat, 
                adipisci aut tempore facere aspernatur, ullam ab repellendus 
                quibusdam vel culpa deserunt quisquam.</p>
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
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatem animi tempora asperiores excepturi explicabo ad obcaecati, delectus fugiat omnis dicta illum magnam culpa neque sunt, molestias veritatis quae odio numquam.
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