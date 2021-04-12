<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>inspection</title>
    <link rel="icon" href="img/logo.png" type="image" sizes="">
   <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport'>
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <link rel="stylesheet" type="text/css" href="css/main.css">
</head>

<body>
   <?php
    session_start();
    if(isset($_SESSION['username'])){
        if(isset($_GET['app_id'])){
        }
        else{
            header("location:evaluatorsProfile.php");
        }
    }
    else{
        header("location:registration/loginEvaluator.php");
    }
    ?>
   <noscript>
       "<h1> Please Enable javascript to use this application</h1>";
   </noscript>
    <form action="process.php" id="NCF-003" onsubmit="return false">
        <div class="form-label">
            NURSERY AUDIT FORM
        </div>
       <div class="form-header">
           <div class="nursery-info">
               <div class="nursery-id">Nursery ID: <input type="text" readonly value="<?php echo $_SESSION['details']['kefri_num']?>" name="kefri_num"></div>
               <div class="nursery-name"><label>Nursery Name:</label><input type="text" readonly value="<?php echo $_SESSION['details']['nursery_name']?>"></div>
               <input type="text" name="nurseryType"  value="private" hidden>
               <input type="text" name="application_id"  value="<?php echo $_SESSION['details']['application_id']?>"hidden>
           </div>
           <div class="score-progress">
               <div id="score">
                   <label>Score:</label><input id="total-score" type="number" value="0" name="score" readonly><label>    /100</label>
               </div>
               <progress id="progress-bar" value="0" max="100">50</progress>
           </div>
           <div class="tab"> label</div>
       </div>
        
       <div class="form-body" style="display: flex; justify-content: space-around;">
           <fieldset class="nursery-audit-score">
               <legend style="margin-bottom: 20px">Nursery Audit Score</legend>
               <div class="display">
                   <button class="prev"><<</button>

                   <section class="test">


                   </section>
                   <button class="next"> >></button>
               </div>

               <div class='submit-btn'>
                   <input type="submit" name="submit" id="submit-btn" value="submit" class="btn"
               </div>
           </fieldset>
           <div class="side-bar">
               <button class="hide-side-bar">+</button>
           </div>
       </div>
    </form>
    <div class="modal">
        <div class="pop-modal">
            <div class="rating div">
                <img src="" class="image">
            </div>
            <div class="score div">
            <label>score:</label> <span></span>
        </div>
            <div class="message div">
        </div>
        <a href="process.php?inspect_id=<?php echo $_SESSION['details']['application_id']?>"><button id="collective-action-btn">click to continue to collective action</button></a>
        </div>
    </div>
    <footer class="footer"> Designed and coded by Peter Mbugua &copy All Right Reserved 2021, Kenya Forest Research Institute</footer>
    <script type="text/javascript" src="js/min.js"></script>
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/adt.js"></script>
    <script type="text/javascript" src="js/store.js"></script>
    <script type="text/javascript" src="js/ajax.js"></script>
<script>
    $
    (document).ready(function(){
       $("#NCF-003").on("scroll",function(){
           if( $("#NCF-003").scrollTop()>200){
               $('.form-header').addClass("fixed-form-header");
               $(".prev").addClass("fixed-navs");
               $(".next").addClass("fixed-navs");
           }
           else{
               $(".form-header").removeClass("fixed-form-header");
               $(".prev").removeClass("fixed-navs");
               $(".next").removeClass("fixed-navs");
           }
       })
       })
</script>
</body></html>