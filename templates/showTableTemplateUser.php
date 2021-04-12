<?php
   
    $phone = strip_tags($_SESSION['phone']);
   
    include 'connection.php';
    $id = $_SESSION['id'];
    $sql = "SELECT * FROM nursery NATURAL JOIN nursery_details NATURAL JOIN applications
    WHERE nursery_details.nursery_id = applications.application_id
    AND nursery_details.phone = $phone";
    $result = $conn->query($sql);
  
    if ($result->num_rows > 0) {
        echo "<table>
        <tr>
            <th style='background: transparent; color: green;' colspan='9'> <h2>Previous Applications</h2></th>
        </tr> 
        <tr>
        <th>KFS Reg. No</th>
        <th>KEFRI Reg. No</th>
        <th>Nursery Name</th>
        <th>Manager</th>
        <th>County</th>
        <th>Status</th>
        <th></th>
        <th></th>
        <th></th>

        </tr>";
        while ($row = $result->fetch_assoc()) {
            $id = $row['kfsreg_num'];
            $row_id = $row['application_id'];
            $link = "./registration/nurseryReapplication.php?id=$row_id";
            //$link = "nurseryRenew"
             
                echo "<tr id='$row_id'>";
                echo "<td>" . $row['kfsreg_num'] . "</td>";
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
                echo "<td class='hdn'>" . $row['evaluator_id'] . "</td>";
                echo  "<td class='borderless'><button class='view' id='$row_id'>View Details</button></td>";
                if ($row['status'] == 'rejected') {
                    echo  "<td class='borderless'><a href='$link' style='text-decoration: none; color: #eee'><button id='$row_id' >Reapply</button></a></td>";
                } elseif ($row['status'] == 'certified') {
                    echo  "<td class='borderless'><a href='$link' style='text-decoration: none; color: #eee'><button id='$row_id' >Renew</button></a></td>";
                } else {
                    echo  "<td class='borderless'><button class='view' id='$row_id' style='width: 100%; height: 30px; background: transparent'></button></td>";
                }
               
                echo "<td class='borderless'>"."<button class='inspect'>Comments</button></td>";
                echo "</tr>";
            
        } 
        echo "</table>";
    } else {
        echo "<div class='no_result shade'></div><h3 class='no_result'>No data found!</h3>";
    }
    $conn -> close();
?>

