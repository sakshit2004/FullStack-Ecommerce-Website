<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--bootstrap icon link-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <!---default css link----->
    <link rel="stylesheet" href="main.css">
    <title>veggen - home page</title>
</head>
<body>
    <section class="popular-brands"> 
        <section class="shop">
        <h1 class="title">Shop best sellers</h1>
    <div class="box-container">
        <?php
        $select_products = mysqli_query($conn, "SELECT * FROM `products` ") or die('query failed') ;
        if(mysqli_num_rows($select_products)>0) {
            while($fetch_products = mysqli_fetch_assoc($select_products)) {



        ?>
        <form method="post" class="box">
            <img src="img/<?php echo $fetch_products['image'];?>">
            <div class="price">$<?php   echo $fetch_products['price'];?>/-</div>
            <div class="name"><?php echo $fetch_products['name'];?></div>
            <input type="hidden" name="product_id" value="<?php echo $fetch_products['id'] ?>">
            <input type="hidden" name="product_name" value="<?php echo $fetch_products['name'] ?>">
            <input type="hidden" name="product_price" value="<?php echo $fetch_products['price'] ?>">
            <input type="hidden" name="product_quantity" value="1" min="1">
            <input type="hidden" name="product_image" value="<?php echo $fetch_products['image'] ?>">
            <div class="icon">
                <a href="view_page.php?pid=<?php echo $fetch_products['id']; ?>" class="bi bi-eye-fill"></a>
                <button type="submit" name="add_to_wishlist" class="bi bi-heart"></button>
                <button type="submit" name="add_to_cart" class="bi bi-cart"></button>
            </div>
        </form>
        
        <?php 
                }
            } else {
                echo '<p class="empty">no products added yet!</p>';
            }
        ?>
    </div>
    </section>
    <script type="text/javascript" src="script.js"></script>
</body>
</html>