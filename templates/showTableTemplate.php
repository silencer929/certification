<?php

    $result = $conn->query($sql);
   
        if ($result->num_rows > 0) {
            echo "<table>
            <tr>
            <th>KFS Reg. No</th>
            <th>KEFRIS Reg. No</th>
            <th>Nursery Name</th>
            <th>Manager</th>
            <th>County</th>
            <th>Status</th>
            <th></th>
            <th></th>
            </tr>";
            while ($row = $result->fetch_assoc()) {
                $id = $row['kfsreg_num'];
                $row_id = $row['nursery_id'];
                 
                    echo "<tr id='$row_id'>";
                    echo "<td>" . $row['kfsreg_num'] . "</td>";
                    echo "<td>" . $row['kefri_num'] . "</td>"; 
                    echo "<td>" . $row['nurseryname'] . "</td>";
                    echo "<td>" . $row['manager'] . "</td>";
                    echo "<td class='hdn'>" . $row['address'] . "</td>";
                    echo "<td class='hdn'>" . $row['email'] . "</td>";
                    echo "<td class='hdn'>" . $row['phone'] . "</td>";
                    echo "<td class='hdn'>" . $row['established'] . "</td>";
                    echo "<td>" . $row['county'] . "</td>";
                    echo "<td class='hdn'>" . $row['subcounty'] . "</td>";
                    echo "<td class='hdn'>" . $row['ward'] . "</td>";
                    echo "<td class='hdn'>" . $row['gps'] . "</td>";
                    echo "<td class='hdn'>" . $row['seedsource'] . "</td>";
                    echo "<td class='hdn'>" . $row['category'] . "</td>";
                    echo "<td class='hdn'>" . $row['capacity'] . "</td>";
                    echo "<td>" . $row['status'] . "</td>";
                    echo "<td class='hdn'>" . $row['evaluator_id'] . "</td>";
                    echo  "<td class='borderless'><button class='view' id='$row_id' onclick='blowUp()'>View Details</button></td>";
                    echo "<td class='borderless'>"."<button class='inspect'>Comments</button></td>";
                    echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "<div class='no_result'></div><h3 class='no_result'>No data found!</h3>";
        }
    $conn -> close();
?>

