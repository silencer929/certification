<?php
    session_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>error</title>
    <style>
        body {
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
    </style>
</head>
<body>
    <center><h1>Error With Query</h1></center>
    <h2>
        <?php 

            echo $_SESSION['numrows']."<br>";
            // echo $_SESSION['user']."<br>";
            // echo $_SESSION['phone']."<br>";
            // echo $_SESSION['email']."<br>";
            // echo $_SESSION['password']."<br>";
        ?>
        
    </h2>
</body>
</html>