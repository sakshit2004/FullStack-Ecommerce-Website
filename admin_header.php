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
            <a href="admin_pannel.php">home</a>
            <a href="admin_product.php">products</a>
            <a href="admin_order.php">orders</a>
            <a href="admin_user.php">users</a>
            <a href="admin_message.php">messages</a>
            </nav>
            <div class="icons">
                <i class="bi bi-person" id="user-btn"></i>
                <i class="bi bi-list" id="menu-btn"></i> 
            </div>
            <div class="user-box">
                <p>username: <span><?php echo $_SESSION['admin_name']; ?></span></p>
                <p>Email: <span><?php echo $_SESSION['admin_email']; ?></span></p>
                <form method="post">
                    <button type="submit" class="logout-btn" name="logout">log out</button>
                </form>
            </div>        
        </div>
    </header>
    <div class="banner">
        <div class="detail">
            <h1>admin dashboard</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
        </div>
    </div>
    <div class="line"></div>
    <script src="script.js"></script>
</body>
</html>