<?php
    session_start();
// form submission
    include '../connection.php';
    
    // get array containing rows for nurseries(unassigned)
    $sql = "SELECT * FROM applications 
            WHERE applications.status = 'pending'
            AND applications.evaluator_id = 0";
            
    
    if (isset($_POST['assign'])) {
        // $vlad = strip_tags($_POST['assign']);
        $evalSelection = $_POST['eval'];
       // $arr=array();
        $result = $conn->query($sql);
        $result_rows = $result->num_rows;

       
       for ($i = 0; $i < $result_rows; $i++) {
            $arr=$result->fetch_assoc();
            $application_id = $arr['application_id'];   
                if ($_POST['status'][$i]) {
                    if ($_POST['eval'][$i] == 'unassigned') {
                        if (end($_POST['eval'])) {
                            header('location:../adminPanel.php');
                        } else {
                            continue;
                        } 
                    } else {
                        $update = "UPDATE applications SET evaluator_id='$evalSelection[$i]' WHERE application_id='$application_id'";
                        if ($conn->query($update)) {
                            header('location:../adminPanel.php');
                        } else {
                            header('location:../errorPageSql.php');
                        }
                    }
                } else {
                    $update = "UPDATE applications SET status='rejected' WHERE application_id='$application_id'";
                    if ($conn->query($update)) {
                        if ($result->num_rows == 2) {
                            header('location:../adminPanel.php');
                            break;
                        } elseif (end($_POST['status'])){
                            header('location:../adminPanel.php');
                        } else {
                                continue;
                            }

                    } else {

                        header('location:../errorPage.php');
                    }
                    
                    header('location:../adminPanel.php');

                } 
        // // print_r($_POST['eval']);
        }
        // $_SESSION['numrows'] = $result_rows;
        // header('location:../errorPage.php');
        
    }


   
?>