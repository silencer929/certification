<?php
        // $conn = mysqli_connect("localhost", "root", "", "Nurseries");
    $result = mysqli_query($conn, $sql);
    $rowcount=mysqli_num_rows($result);
    echo ($rowcount); 
?>
   

