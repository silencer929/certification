<?php
    session_start();

    if (!isset($_SESSION['phone'])) {
        $_SESSION['msg'] = "You must log in first";
        header('location: ./registration/login.php');
    }

    if (isset($_GET['logout'])) {
        
        session_destroy();
         unset($_SESSION['phone']);
           // unset($_SESSION['id']);
            unset($_SESSION['username']);
            unset($_SESSION['email']);
        header("location: ./registration/login.php");
    }

    include './templates/headerUser.php';
?>
    <!-- <style>
        @media only screen 
            and (min-width : 320px) {
            
               

            div.container1, .prevApps, main {
                width: 100%!important;
            }
            body {
                width: 100%;
                overflow-X: hidden;
            }
            main {
                overflow: hidden;
            }
            div.apply {
                float: none;
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: center;
                width: 100%;
            }


            }
    </style> -->


    <main style="min-height:70vh; max-height: 70vh;">  
        <div class="container1">
        <div class="prevApps">
            <div class="apply uProfile" style="float: left;">
                <a href="./registration/nurseryRegistration.php">New Application</a>
            </div>
            <div class="side1" style="float:right; background: rgba(0, 200, 50, .1); min-height: 50vh; max-height: 60vh; overflow: scroll">
                  <div class="prevApplications app-table">
                        <?php 
                            require './templates/showTableTemplateUser.php';
                        ?>
                  </div>
            </div>
         </div>
    </main>
    <div class="viewDetails hidden">
        <?php require 'templates/viewDetailsTemplate.php';?>
    </div>
    <div class="viewComments hidden">
        <?php require 'templates/viewCommentsTemplate.php';?>
    </div>
</body>
<?php
    include './templates/footer.php';
?>
<script src="./js/showHideUser.js"></script>
</html>