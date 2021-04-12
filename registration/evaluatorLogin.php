<?php include 'serverEvaluator.php'; ?>

<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Registration system</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <div class="header">
            <h2>Evaluator Login</h2>
        </div>

        <form method="post" action="evaluatorLogin.php">
            <?php include('errors.php'); ?>
            <div class="input-group">
                <label>username</label>
                <input type="text" name="username" placeholder="username" required>
            </div>
            <div class="input-group">
                <label>Password</label>
                <input type="password" name="password" placeholder="type password"required>
            </div>
            <div class="input-group">
                <button type="submit" name="login_eval" class="btn">Login</button>
            </div>
            <p class="sec">
                 <a href="adminLogin.php">Admin</a> 
                 <a href="login.php">User</a> 
            </p>
          
        </form>
    </body>
    <script src="../js/app.js"></script>
</html>