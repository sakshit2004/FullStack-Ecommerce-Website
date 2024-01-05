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
        $product_id = $_POST['$product_id'];
        $product_name = $_POST['$product_name'];
        $product_price = $_POST['$product_price'];
        $product_image = $_POST['$product_image'];
        $product_quantity = $_POST['product_quantity'];
        $cart_num = mysqli_query($conn, "SELECT * FROM `cart` WHERE name = '$product_name'AND user_id = '$user_id' ") or die('query failed');
        if (mysqli_num_rows($cart_num)>0) {
            $message[] = 'product already exist in cart';
        } else {
            mysqli_query($conn, "INSERT INTO `cart` ('user_id', 'pid', 'name', 'price','quantity' , 'image') VALUES ('$user_id', '$product_id', '$product_name', '$product_price','$product_quantity','$product_image') ");
            $message[] = 'product successfuly added in your cart';
        }
    }

         // adding products in cart
         if(isset($_POST['add_to_wishlist'])){
            $product_id = $_POST['$product_id'];
            $product_name = $_POST['$product_name'];
            $product_price = $_POST['$product_price'];
            $product_image = $_POST['$product_image'];
    
            $wishlist_number = mysqli_query($conn, "SELECT * FROM `wishlist` WHERE name = '$product_name'AND user_id = '$user_id' ") or die('query failed');
            $cart_num = mysqli_query($conn, "SELECT * FROM `cart` WHERE name = '$product_name'AND user_id = '$user_id' ") or die('query failed');
            
            if(mysqli_num_rows($wishlist_number)>0) {
                $message[] = 'product already exist in wishlist';
            } elseif (mysqli_num_rows($cart_num)>0) {
                $message[] = 'product already exist in cart';
            } else {
                mysqli_query($conn, "INSERT INTO `wishlist` ('user_id', 'pid', 'name', 'price', 'image') VALUES ('$user_id', '$product_id', '$product_name', '$product_price', '$product_image') ");
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
<link rel="stylesheet" href="main.css">

</head>
<body>
<?php include 'header.php';?>
<div class="banner">
    <div class="detail">
        <h1>product detail</h1>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
        <a href="index.php">Home </a><span>/<a href="about.php"> About </a></span><span>/<a href="shop.php"> Shop</a></span>
    </div>
</div>
<div class="line"></div>
<section class="view_page">
        <h1 class="title">Shop best sellers</h1>
        <?php
        if(isset($_GET['pid'])){
            $pid = $_GET['pid'];
            $select_products = mysqli_query($conn, "SELECT * FROM `products` WHERE id = '$pid'") or
            die('query failed');
            if(mysqli_num_rows($select_products)>0){
                while($fetch_products = mysqli_fetch_assoc($select_products)){
        ?>
        <form method="post">
            <img src="img/<?php echo $fetch_products['image'];?>">
            <div class="detail">
            <div class="price">$<?php   echo $fetch_products['price'];?>/-</div>
            <div class="name"><?php echo $fetch_products['name'];?></div>
            <div class="detail"><?php echo $fetch_products['product_detail'];?></div>

            <input type="hidden" name="product_id" value="<?php echo $fetch_products['id'] ?>">
            <input type="hidden" name="product_name" value="<?php echo $fetch_products['name'] ?>">
            <input type="hidden" name="product_price" value="<?php echo $fetch_products['price'] ?>">
            <input type="hidden" name="product_image" value="<?php echo $fetch_products['image'] ?>">
            <div class="icon">
                <button type="submit" name="add_to_wishlist" class="bi bi-heart"></button>
                <input type="number" name="product_quantity" value="1" min="0" class="quantity">
                <button type="submit" name="add_to_cart" class="bi bi-cart"></button>
            </div>
                </div>
        </form>
        
        <?php 
                    }
                }
            }
        ?>
    </section>


<?php include 'footer.php';?>
<script type="text/javascript" src='script.js'></script>  
</body>
</html>