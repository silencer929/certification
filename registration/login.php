<?php include 'server.php'; ?>

<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Nursery Certification Login</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <div class="header">
            <h2>Login</h2>
        </div>

        <form method="post" action="login.php">
            <?php include('errors.php'); ?>
            <div class="input-group">
                <label>Phone Contact</label>
                <input type="number" name="phone" placeholder="phone number" required>
            </div>
            <div class="input-group">
                <label>Password</label>
                <input type="password" name="password" placeholder="password" required>
            </div>
            <div class="input-group">
                <button type="submit" name="login_user" class="btn">Login</button>
            </div>
            <p>
                Not yet a member? <a href="register.php">Sign up</a>    
            </p>
            <p class="sec">
                 <a href="adminLogin.php">admin</a>  
                 <a href="../index.php" style="margin-left: 70%">home</a>
            </p>
        </form>
    </body>
    <script src="../js/app.js"></script>
</html>