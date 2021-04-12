<div class="newApp">
    <h2 class="heading">Assigned but Pending</h2>
    <div class="app-table">
        <?php 
            require "connection.php";
            $sql = "SELECT * FROM nursery NATURAL JOIN nursery_details NATURAL JOIN applications 
                    WHERE applications.application_id = nursery_details.nursery_id
                    AND applications.evaluator_id != 0
                    AND applications.status='pending'";
        
            include "showTableTemplateAssigned.php";  
         ?>
    </div>
</div>



