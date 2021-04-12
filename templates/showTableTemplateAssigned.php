<?php
    $result = $conn->query($sql);
  
    //echo '<h4>Pending & Assigned Nurseries</h4>';
    
    if ($result->num_rows > 0) {
        echo "<table>
        <tr>
       <!--<th>KFS Reg. No</th>-->
        <th>KEFRI Reg. No</th>
        <th>Nursery Name</th>
        <th>Manager</th>
        
        <th>County</th>
        <th>Status</th>
        <th>Evaluator</th>
        <th></th>
        <th></th>
        </tr>";
        while ($row = $result->fetch_assoc()) {
             $id = $row['application_id'];
            $row_id = $row['application_id'];
            $eval_id = $row['evaluator_id'];
            $link="process.php?app_id=$id";

            $sql_eval = "SELECT * FROM evaluators WHERE evaluators.evaluator_id = '$eval_id'";
            $result_eval = $conn->query($sql_eval);
            $eval_data = $result_eval->fetch_assoc();
            $row_name = "";

             if (!$eval_id) {
                $row_name = 'Unassigned';
            } else {
                $row_name = $eval_data['f_name'] . " " . $eval_data['l_name'];
            }
            
        

           

                echo "<tr id='$row_id'>";
                echo "<td class='hdn'>" . $row['kfsreg_num'] . "</td>";
                echo "<td>" . $row['kefri_num'] . "</td>"; 
                echo "<td>" . $row['nursery_name'] . "</td>";
                echo "<td>" . $row['manager'] . "</td>";
                echo "<td class='hdn'>" . $row['address'] . "</td>";
                echo "<td class='hdn'>" . $row['email'] . "</td>";
                echo "<td class='hdn'>" . $row['phone'] . "</td>";
                echo "<td class='hdn'>" . $row['established'] . "</td>";
                echo "<td>" . $row['county'] . "</td>";
                echo "<td class='hdn'>" . $row['subcounty'] . "</td>";
                echo "<td class='hdn'>" . $row['ward'] . "</td>";
                echo "<td class='hdn'>" . $row['seedsource'] . "</td>";
                echo "<td class='hdn'>" . $row['category'] . "</td>";
                echo "<td class='hdn'>" . $row['capacity'] . "</td>";
                echo "<td>" . $row['status'] . "</td>";
                echo "<td>" . $row_name . "</td>";
                echo  "<td class='borderless'><button type='button' class='view' id='$row_id'>View Details</button></td>";
               echo "<td class='borderless'>"."<a style='text-decoration: none; color:white' href='$link'><button class='inspect'>Inspect</button></a></td>";
                echo "</tr>";
            
        }
        echo "</table>";
    } else {
        echo "<div class='no_result'></div><h3 class='no_result'>No data found!</h3>";
    }
    $conn -> close();
?>

