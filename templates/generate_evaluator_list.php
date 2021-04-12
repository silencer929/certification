<?php
    function generate_eval() {
                $conn = new mysqli('localhost', 'root', '', 'nurseries');
                $sql = "SELECT * FROM evaluators";
                $eval = $conn->query($sql); //all rows

                echo "<td></td><select name='eval'>";
                echo "<option value='' selected hidden disabled>--assign--</option>";
                while ($row = $eval->fetch_assoc()) {
                    $eval_id = $row['evaluator_id'];
                    $eval_name = $row['f_name'] . " " . $row['l_name'];
                    echo "<optgroup label='$eval_name'><option value='$eval_id'>$eval_id</option></optgroup>";
                }
                echo "</select></td>";
    }
?>