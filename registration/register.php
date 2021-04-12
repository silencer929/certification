
<?php include('server.php')?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User Registration</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="header">
        <h2>Register</h2>
    </div>
    
    <form method="post" action="register.php">
        <?php include('errors.php'); ?>
        <div class="input-group">
            <label>Username</label>
            <input type="text" name="username" placeholder="name" required>
        </div>
        <div class="input-group">
            <label>Phone Contact</label>
            <input type="number" name="phone" placeholder="0700123456" required>
        </div>
        <div class="input-group">
            <label>Email</label>
            <input type="email" name="email" placeholder="email" required>
        </div>
        <div class="input-group">
            <label>Password</label>
            <input type="password" name="password_1" required placeholder="password">
        </div>
        <div class="input-group">
            <label>Confirm Password</label>
            <input type="password" name="password_2" placeholder="confirm password" required>
        </div>
        <div class="input-group">
            <button class="btn" type="submit" name="reg_user">Register</button>
        </div>
        <p>
            Already a member? <a href="login.php">Sign in</a>
        </p>
    </form>
</body>
<script src="../js/app.js"></script>
</html>