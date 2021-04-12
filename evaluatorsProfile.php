<?php 
    session_start();
    //include 'connection.php';
    
    if (!isset($_SESSION['username'])) {
        $_SESSION['msg'] = "You must log in first";
        header('location: ./registration/login.php');
    }

    if (isset($_GET['logout'])) {
        session_destroy();
        unset($_SESSION['username']);
        unset($_SESSION['eval_id']);
        // header("location: ./registration/login.php");
    }
     include './templates/headerEvaluator.php';
?>

    <main class="stats" style="position: relative; margin-bottom: 20vh;">  
       
        </div>
        <div class="container" style="position: relative">
            <div class="panel">
                <button class="statsButton" >Statistics </button>
                <button class="penAssButton">Pending Assignments </button>
                <button class="compAssButton">Complete Assignments </button>
            </div>
            <?php include "./templates/dashButtonsEvaluator.php"; ?>
        </div>
    </main>
    <div class="viewDetails hidden">
        <?php require './templates/viewDetailsTemplate.php';?>
    </div>
    <script src="./js/showHideAdmin.js"></script>

</body>
<?php include './templates/footer.php';?>
</html>