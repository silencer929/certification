<?php 

session_start();

//initializing variables

$username = "";
$errors = array();

//connect to the database

$db = new mysqli('localhost', 'root', '', 'Nurseries');

//login admin
if (isset($_POST['login_admin'])) {
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $password = mysqli_real_escape_string($db, $_POST['password']);

    if(count($errors) == 0) {
        $password = md5($password);
        $query = "SELECT * FROM admin WHERE username='$username' AND pass='$password'";
        $results = $db->query($query);
        
        if (mysqli_num_rows($results) == 1) {
            $_SESSION['username'] = $username;
          
            header('location:../adminPanel.php');
        } else {
            array_push($errors, "wrong username/password combination");
        }
    }
}
mysqli_close($db);
?>