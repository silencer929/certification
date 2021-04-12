<div class="newApp">
    <h2 class="heading">Complete Assignments</h2>
    <div class="app-table">
        <?php 
            include "connection.php";
            $id = $_SESSION['eval_id'];
            $sql = "SELECT * FROM nursery NATURAL JOIN nursery_details NATURAL JOIN applications WHERE applications.evaluator_id = '$id' 
                    AND applications.application_id = nursery_details.nursery_id 
                    AND applications.status != 'pending'";

            include "showTableTemplateAssigned.php";  
         ?>
         
        <!-- <img src="./img/sample.jpg"/> -->
    </div>
</div>



