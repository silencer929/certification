<?php include 'serverAdmin.php'; ?>

<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Registration system</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <div class="header">
            <h2>Admin Login</h2>
        </div>

        <form method="post" action="adminlogin.php">
            <?php include('errors.php'); ?>
            <div class="input-group">
                <label>username</label>
                <input type="text" name="username" placeholder="username" required>
            </div>
            <div class="input-group">
                <label>Password</label>
                <input type="password" name="password" placeholder="password" required>
            </div>
            <div class="input-group">
                <button type="submit" name="login_admin" class="btn">Login</button>
            </div>
            <p class="sec" style="position: relative; width: 100%;display: flex; align-items: center;justify-content: flex-end;">
                 <i style="padding: 0 10px;font-size: .9rem; color: #c25929 ">log in as</i> 
                 <a href="evaluatorLogin.php" style="color: #fff;background: #64ab5e; padding: 2px 10px; border-radius: 4px" id="eval">Evaluator</a>  
            </p>
        </form>
    </body>
    <script src="../js/app.js"></script>
</html>