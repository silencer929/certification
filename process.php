<?php
require_once "database.php";
require_once "certify.php";
require_once 'comments.php';
Database::get_instance();
$db= Database::$instance; 
if(isset($_POST["total"])){
    $certify= new Certify();
    $certify->set_score($_POST["total"]);
    $certify->set_nurseryType($_POST['nurseryType']);
    $certify->set_kefri_num($_POST['kefri_num']);
    $certify->set_application_id($_POST['application_id']);
    $result=$certify->evaluate();
    $certify->insert_into_database($db,$result);
    echo json_encode($result);
    die();
}
if(isset($_POST["obs"]) AND isset($_POST['rec'])){
    if(empty($_POST['obs'])){
        die();
    }
    if(empty($_POST['rec'])){
        die();
    }
    $comment= new Comments();
    $comment->insert_into_database($db,$_POST);
    echo json_encode($_POST);
}
if( isset($_GET['app_id'])){
    $id=$_GET['app_id'];
    $query= " SELECT * FROM nursery NATURAL JOIN applications NATURAL JOIN nursery_details where applications.application_id=(select applications.application_id from applications where applications.application_id=" . $id . ") limit 1";
    $query2= "SELECT * from nursery";
    $db->execQuery($query,[]);
    $db->load_data();
    session_start();
    $_SESSION['details']=$db->data[0];
    header("location:inspect.php?app_id=$id");
}
if (isset($_GET["inspect_id"])){
// select from inspection table the score and the image
    session_start();
    $id=$_GET["inspect_id"];
    $query="SELECT * FROM inspection where inspection.app_id=$id limit 1";
    $db->execQuery($query,[]);
    $data=$db->load_data();
    $_SESSION["inspection_details"]=$data[0];
    header("location:corrective-action.php?app_id=$id");
}
if(isset($_GET['id'])){
    session_destroy();
    unset($_SESSION['details']);
    unset($_SESSION["inspection_details"]);
    header("location:evaluatorsProfile.php");
}
if(isset($_POST['submit'])){
//i want to clean the data;
    $allowed=["jpeg",'png',"jpg"];
    $errors=array();
    $uploaded= array();
    define("ds", DIRECTORY_SEPARATOR);
    $dir=__dir__.ds."upload".ds;
    if(!empty($_files['images']["name"][0])){
        foreach($_files['images'] as $key=>$value){
            $$key=$value;
        }
        foreach ($type as $key=>$value){
            if(in_array(pathinfo($name[$key],PATHINFO_EXTENSION),$allowed)){
                $arr=[
                    "kefri_num"=>$_POST['kefri_num'],
                    "app_id"=>$_POST['app_id'],
                    "image_name"=>$_POST["image"]
                ];
                move_uploaded_file($tmp_name[$key],$dir.$name[$key]);
                $query="INSERT INTO images(img_name,kefri_num,app_id) values (:image_name,:kefri_num,:app_id)";
                $db->execQuery($query,[]);
            }
        }
    }
    //    i want to post to the database

}
?>