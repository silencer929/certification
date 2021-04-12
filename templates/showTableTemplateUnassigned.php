<form action='./registration/nurseryEvaluatorUpdate.php' method='post'><center>
<?php

    $result = $conn->query($sql);

    $eval_sql = "SELECT * FROM evaluators";

        if ($result->num_rows > 0) {
            echo "<table>
            <tr>
           
            <th>KEFRIS Reg. No</th>
            <th>Name</th>
            <th>Manager</th>
           
            <th>County</th>
            
            <th>Status</th>
            <th>Assign</th>
            <th></th>
            <th></th>
            </tr>";
            
            while ($row = $result->fetch_assoc()) {
                $id = $row['kfsreg_num'];
                $row_id = $row['application_id'];
             
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
                echo "<td class='hdn'>" . $row['status'] . "</td>";
                echo "<td class='hdn'>" . $row['evaluator_id'] . "</td>";
                echo "<td><select name='status[]' style='width: 100%'>
                            <option value=1 selected>Assign</option>
                            <option value=0>Reject</option>
                           </select></td>"; 
                    //evaluator start
                   
                    $eval = $conn->query($eval_sql); //all rows
                  
                    echo "<td id='skipped'><select name='eval[]'>";
                    echo "<option value='unassigned' selected>unassigned</option>";
                    while ($eval_row = $eval->fetch_assoc()) {
                        $eval_id = $eval_row['evaluator_id'];
                        $eval_name = $eval_row['f_name'] . " " . $eval_row['l_name'];
                        echo "<option value='$eval_id'>$eval_name</option>";
                    }
                    echo "</select></td>";
                    //evaluator end;
                   
                    
                    echo  "<td class ='borderless'><button type='button' class='view' id='$row_id'>View Details</button></td>";
                    echo "<td class ='borderless'>"."<button class='inspect'>Comments</button></td>";
                    echo "</tr>";
            }
            
            echo "</table><button style='font-size: 1.2rem;padding: 10px 15px;width: 250px;margin-top: 10px;' type='submit' name='assign'>Process Assignment</button>";
          
        } else {
            echo "<div class='no_result'></div><h3 class='no_result'>No data found!</h3>";
        }
    $conn -> close();
?>
</center></form>
