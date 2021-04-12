<?php 
    session_start();
    if (!isset($_SESSION['username'])) {
        $_SESSION['msg'] = "You must log in first";
        header('location: ./registration/login.php');
    }

    if (isset($_GET['logout'])) {
        session_destroy();
        unset($_SESSION['username']);
        header("location: login.php");
    }
    include "./templates/headerAdmin.php";
?>
    <main>  
       
        </div>
        <div class="container">
            <div class="panel">
                <button class="homeButton" >Dashboard </button>
                <button class="penUnassigned">Pending & Unassigned </button>
                <button class="penAssigned">Pending & Assigned </button>
                <button class="certAppButton">Certified Nurseries</button>
                <button class="rejButton">Rejected Nurseries </button>
                <button class="prevAppButton">Previous Applications</button>
                <button class="allAppButton">All Applications </button>
            </div>
            <?php include "./templates/dashButtons.php"; ?>
        </div>
    </main>
    <div class="viewDetails hidden">
        <?php require './templates/viewDetailsTemplate.php';?>
    </div>
    <script src="./js/showHideAdmin.js"></script>

</body>
<?php
    include "./templates/footer.php";
?>
</html>