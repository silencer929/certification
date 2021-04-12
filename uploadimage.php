<!DOCTYPE html>
<html>
<head>
	<title>upload image</title>
	<style type="text/css">
		*{
			padding: 0px;
			margin: 0px;
			box-sizing: border-box;
		}
		.uploader{
			width: 400px;
			height: 400px;
			border: 1px solid green;
			background-color: transparent;
			margin: 200px auto;
		}
		.banner{
			height: 50px;
			width: 50px;
			overflow: hidden;
			z-index: 3;
			margin: 10px auto;
		}
		img{
			width: 100%;
			height: 100%;
		}
		hr{
			border: 1px solid orange;
			margin: 10px 0px;
		}
	</style>
</head>
<body>
	<?php
	define("DS", DIRECTORY_SEPARATOR);
	$dir=__DIR__.DS."trial".DS;
	if(isset($_POST['submit'])){
		$allowed=["jpeg",'png',"jpg"];
		$errors=array();
		$uploaded= array();
		if(!empty($_FILES["image"]["name"][0])){
			foreach ($_FILES['image'] as $key => $value) {
				$$key=$value;
			}
		}
		foreach ($type as $key => $value) {
			if(in_array(pathinfo($name[$key],PATHINFO_EXTENSION), $allowed)){
				move_uploaded_file($tmp_name[$key],$dir.$name[$key]);
				$uploaded=$name[$key]."upload was successful </br>";
				print_r($uploaded);
			}
			if(!in_array(pathinfo($name[$key],PATHINFO_EXTENSION), $allowed)){
				$errors=$name[$key]." -- wrong file format. Please upload an image<br>";
				echo $errors;
			}
		}
	}
	?>
<form class="uploader" method="POST" action="" enctype="multipart/form-data">
	<div class="banner">
		<img src="img/logo.png">
	</div>
	<hr>
	<input type="file" name="image[]" multiple>
	<input type="submit" name="submit">
</form>
</body>
</html>