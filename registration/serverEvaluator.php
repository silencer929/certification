<?php 

session_start();

//initializing variables

$username = "";
$errors = array();

//connect to the database

$db = new mysqli('localhost', 'root', '', 'Nurseries');

//login admin
if (isset($_POST['login_eval'])) {
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $password = mysqli_real_escape_string($db, $_POST['password']);

    if(count($errors) == 0) {
        $password = md5($password);
        $query = "SELECT * FROM evaluators WHERE username='$username' AND password='$password'";
        $results = $db->query($query);
        $rowData = $results->fetch_assoc();
        
        if (mysqli_num_rows($results) == 1) {
            $_SESSION['username'] = $username;
            $_SESSION['eval_id'] = $rowData['evaluator_id'];
            header('location:../evaluatorsProfile.php');
        } else {
            array_push($errors, "wrong username/password combination");
        }
    }
}
mysqli_close($db);
?>