<div class="prevApp">
<h2 class="heading">Previous Applications</h2>
    <div class="app-table">
        <?php 
            require "connection.php";
            
            $sql = "SELECT * FROM nursery NATURAL JOIN nursery_details NATURAL JOIN applications
                    WHERE applications.application_id = nursery_details.nursery_id
                    AND applications.status != 'pending'";
        
            require "./templates/showTableTemplateAssigned.php";
         ?>
        <!-- <img src="./img/sample.jpg"/> -->
    </div>
</div>
