<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no, user-scalable=no,minimum-scale=1.0,maximum-scale=1.0">
	<link rel="stylesheet" type="text/css" href="css/corrective-action.css">
	<link rel="stylesheet" type="text/css" href="icons/css/all.css">
	<title>corrective action</title>
</head>
<body>
<?php
if(isset($_GET["app_id"])){
    session_start();
}else{
    header("location:inspect.php");
}
?>
<div class="header">
	<div class="logo"><img src="img/logo.png" class="image"></div>
	<hr style="">
	<div class="nursery-details">
		<div class="nursery-name" style="font-size: 30px; color: darkgreen;text-transform: capitalize;"><?php echo $_SESSION["details"]["nursery_name"]?></div>
		<div class="rating"><img src="img/<?php echo $_SESSION['inspection_details']["rate"];?>_star.png" class="image"></div>
		<div class="score">score: <span style="color: #fff; font-size: 25px"><?php echo $_SESSION['inspection_details']['score']?></span> </div>
	</div>
</div>
<div class="body">
	<div class="info"><p>please make the proper observations and recommendations to help the forester improve the nursery to preserve top seat in our portal </p></div>
	<a href="#upload"><button class="upload-link btn">upload photo<i class="fas fa-upload"></i></button></a>
	<section class="corrective-action">
	<table id="myTable">
		<thead>
			<tr>
				<th>No.</th>
				<th>Observation</th>
				<th>Recommendation</th>
				<th>Edit</th>
				<th>Delete</th>
			</tr>
		</thead>
		<tbody>
			
		</tbody>
	</table>
	<form class="obs-rec-form" action="process.php" method="POST">
		<p class="directive">Please fill in all fields! </p>
		<textarea class="observation" placeholder="please enter the observation made?" name="rec" value="" required=""></textarea>
		<textarea class="recommendation" placeholder="please enter the recommendation that will help the farmer improve his/her nursery?"name='obs' value="" required=""></textarea>
        <input type="hidden" name="app_id" value="<?php echo $_SESSION['details']['application_id']?>">
        <input type="hidden" name="kefri_num" value="<?php echo $_SESSION['details']['kefri_num']?>">
		<input class="btn" type="submit" name="submit"value="add Corrective Action">
	</form>
	</section>
</div>
<section id="upload">
	<div class="images-upload-form">
		<form action="" method="POST" enctype="multipart/form-data">
			<div><p>upload pictures of the nursery here</p></div>
			<input type="file" name="image[]" multiple>
            <input type="hidden" name="app_id" value="<?php echo $_SESSION['details']['application_id'];?>">
            <input type="hidden" name="kefri_num" value="<?php echo $_SESSION['details']['kefri_num'];?>">
		</form>
	</div>
</section>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/main.js"></script>
<script type="text/javascript" src="js/ajax.js"></script>
</body>
</html>