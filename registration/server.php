<?php 

session_start();

//initializing variables

$errors = array();

//connect to the database

include '../connection.php';
//Register user

if (isset($_POST['reg_user'])) {
    //receive all input values from the form
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $user_name = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pass1 = mysqli_real_escape_string($conn, $_POST['password_1']);
    $pass2 = mysqli_real_escape_string($conn, $_POST['password_2']);

    if ($pass1 != $pass2) {
        array_push($errors, "The two passwords do not match!");
    }

    //first check the database to make sure
    //a user does not already exist with the same phone and/or email
    $user_check_query = "SELECT * FROM users WHERE phone='$phone' or email='$email' LIMIT 1";
    $result = $conn->query($user_check_query);
    $user = $result->fetch_assoc();

    if ($user) { //if user exists
        if ($user['phone'] === $phone) {
            array_push($errors, "phone already exists");
        }

        if (strtoupper($user['username']) === strtoupper($user_name)) {
            array_push($errors, 'username already taken. Please use a different username');
        }

        if ($user['email'] === $email) {
            array_push($errors, "email already exists");
        }
    }

    //finally, register user if there are no errors in the form
    if (count($errors) == 0) {
         $password = md5($pass1); //encrypt the password before saving in the database
         $query = "INSERT INTO users (username, phone, email, password) VALUES ('$user_name','$phone', '$email', '$password')";
         $conn->query($query);
        
            $_SESSION['phone'] = $phone;
            //$_SESSION['id'] = $user['id'];
            $_SESSION['username'] = $user_name;
            $_SESSION['email'] = $email;
        header('location:../userProfileV2.php');
    }
    
}
// ...

//login user
if (isset($_POST['login_user'])) {
    $p = mysqli_real_escape_string($conn, $_POST['phone']);
    $phone = substr($p,1);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    if (empty($phone)) {
        array_push($errors, "phone is required");
    }
    if (empty($phone)) {
        array_push($errors, "Password is required");
    }

    if(count($errors) == 0) {
        $password = md5($password);
        $query = "SELECT * FROM users WHERE phone='$phone' AND password='$password'";
       
        $results = $conn->query($query);
        
        $user = $results->fetch_assoc();
        
        if (mysqli_num_rows($results) == 1) {
            $_SESSION = array();
            $_SESSION['phone'] = $phone;
            $_SESSION['id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['email'] = $user['email'];
            header('location:../userProfileV2.php');
        } else {
            array_push($errors, "wrong phone/password combination");
        }
    }
}

mysqli_close($conn);
?>