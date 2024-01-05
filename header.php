<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--box icon link-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <title>Document</title>
</head>
<body>
    <header class="header">
        <div class="flex">
           <a href="admin_pannel.php" class="logo"><img src="img/logo.png"></a>
           <nav class="navbar">
            <a href="index.php">home</a>
            <a href="about.php">about us</a>
            <a href="shop.php">shop</a>
            <a href="order.php">order</a>
            <a href="contact.php">contact</a>
            </nav>
            <div class="icons">
                <i class="bi bi-person" id="user-btn"></i>
                <a href="wishlist.php"><i class="bi bi-heart"></i></a>
                <a href="cart.php"><i class="bi bi-cart"></i></a>
                <i class="bi bi-list" id="menu-btn"></i> 
            </div>
            <div class="user-box">
                <p>username: <span><?php echo $_SESSION['user_name']; ?></span></p>
                <p>Email: <span><?php echo $_SESSION['user_email']; ?></span></p>
                <form method="post">
                    <button type="submit" class="logout-btn" name="logout">log out</button>
                </form>
            </div>        
        </div>
    </header>
</header>
<script type="text/javascript" src="script.js"></script>
</body>
</html> 