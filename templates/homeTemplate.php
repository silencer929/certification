<?php require "connection.php";?>

<div class="home">
    <div class="tops">
        <div class="content new">
            <h3>New Unassigned <br>Nurseries</h3>
            <span>
                <?php 
                   $sql = "SELECT * FROM nursery NATURAL JOIN nursery_details NATURAL JOIN applications 
                   WHERE applications.application_id = nursery_details.nursery_id
                   AND applications.evaluator_id = 0
                   AND applications.status = 'pending'";
                    require "getCountTemplate.php";  
                ?> 
            </span>
        </div>
        <div class="content previous">
            <h3>New Assigned <br>Nurseries</h3>
            <span>
                <?php 
                    $sql = "SELECT * FROM nursery NATURAL JOIN nursery_details NATURAL JOIN applications 
                    WHERE applications.application_id = nursery_details.nursery_id
                    AND applications.evaluator_id != 0
                    AND applications.status = 'pending'";
                    require "getCountTemplate.php";  
                ?> 
            </span>
        </div>
        <div class="content previous">
            <h3>Previous <br>Applications</h3>
            <span>
                <?php 
                   $sql = "SELECT * FROM nursery NATURAL JOIN nursery_details NATURAL JOIN applications 
                   WHERE applications.application_id = nursery_details.nursery_id
                   AND applications.status != 'pending'";
                    require "getCountTemplate.php";  
                ?> 
            </span>
        </div>
    </div>
    <div class="bottoms">
        <div class="content certified">
            <h3>Certified <br>Nurseries</h3>
            <span>
                <?php 
                    $sql = "SELECT * FROM nursery NATURAL JOIN nursery_details NATURAL JOIN applications 
                    WHERE applications.application_id = nursery_details.nursery_id
                    AND applications.status = 'certified'";
                    require "getCountTemplate.php";  
                ?> 
            </span>
        </div>
        <div class="content rejected ">
            <h3>Rejected <br>Nurseries</h3>
            <span>
                <?php 
                     $sql = "SELECT * FROM nursery NATURAL JOIN nursery_details NATURAL JOIN applications 
                     WHERE applications.application_id = nursery_details.nursery_id
                     AND applications.status = 'rejected'";
                    require "getCountTemplate.php";  
                ?> 
            </span>
        </div>
        <div class="content previous ">
            <h3>Total <br>Applications</h3>
            <span>
                <?php 
                    $sql = "SELECT * FROM nursery NATURAL JOIN nursery_details NATURAL JOIN applications 
                    WHERE applications.application_id = nursery_details.nursery_id";
                    require "getCountTemplate.php";  
                ?> 
            </span>
        </div>
    </div>
</div>
<?php $conn->close();?>