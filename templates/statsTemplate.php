<?php 
    require "connection.php";
    $id = $_SESSION['eval_id'];
?>
<style>
   div.content {
      width: 20%!important;
      height: 25vh!important;
      padding: 15px!important;
   }

   @media only screen
        and (max-width: 320px) {
            div.content {
                width: 50%!important;
                margin-top: 30px!important;
            }
            .home .tops {
                float: none;
                width: 100%;
                display: flex; 
                flex-direction: column;
                justify-content: center;
                align-items: center;
                min-height: 40vh!important;
                overflow: scroll;
            }

            .tops {
                font-size: 14px;
                font-weight: bold;
            }
        }
   
</style>
<div class="home" style="max-height: 40vh;">
    <div class="tops">
        <div class="content rejected">
            <h3>Pending <br> Assignments</h3>
            <span>
                <?php 
                   $sql = "SELECT * FROM nursery NATURAL JOIN nursery_details NATURAL JOIN applications 
                            WHERE applications.evaluator_id = '$id' 
                            AND applications.application_id = nursery_details.nursery_id 
                            AND applications.status = 'pending'";
                   
                    require "getCountTemplate.php";  
                ?> 
            </span>
        </div>
        <div class="content certified">
            <h3>Complete <br>Assignments</h3>
            <span>
                <?php 
                   $sql = "SELECT * FROM nursery NATURAL JOIN nursery_details NATURAL JOIN applications 
                        WHERE applications.evaluator_id = '$id' 
                        AND applications.application_id = nursery_details.nursery_id 
                        AND applications.status != 'pending'";
                    
                    require "getCountTemplate.php";  
                ?> 
            </span>
        </div>
        <div class="content previous">
            <h3>Total <br>Assignments</h3>
            <span>
                <?php 
                    $sql = "SELECT * FROM nursery NATURAL JOIN nursery_details NATURAL JOIN applications 
                            WHERE applications.evaluator_id = '$id' 
                            AND applications.application_id = nursery_details.nursery_id";
                    
                    require "getCountTemplate.php";  
                ?> 
            </span>
        </div>
    </div>
    
</div>
<?php $conn->close();?>