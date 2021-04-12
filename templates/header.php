<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Hammersmith+One&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Dosis:wght@200;300&display=swap" rel="stylesheet">
<style>

hr {
  border: 1px solid green; 
  border-radius: 5px;
}

/* Header/Blog Title */
.header {
  padding: 10px;
  text-align: center;
  background: #64ab5e;
  width: 100%;
}
.header h1 {
  font-size: 30px;
}
/* Style the top navigation bar */
.topnav {
  overflow: hidden;
  background-color: #83bb7e;
}

/* Style the topnav links */
.topnav a {
  float:left;
  display: block;
  color: #fff;
  text-align: center;
  padding: 20px 50px;
  text-decoration: none;
  font-size: 20px;
  transition: .3s;
}
/* Change color on hover */
.topnav a:hover {
  background-color: black;
  color: black;
  background-color: #c25929;
}
button {
  background-color: #64ab5e; 
  color: black; 
  font-weight: bold;
  font-size: 16px;
  padding: 20px;
  border-color: #64ab5e;
  transition: 1s;
}
button:hover {
  background-color: #c25929;
  color: white;
  border-color: #c25929; 
}
a {
  color: black;
}
a:hover {
  color: white;
}
/* Create two unequal columns that floats next to each other */
/* Left column */
.leftcolumn {   
  float: left;
  width: 75%;
}

/* Right column */
.rightcolumn {
  float: left;
  width: 25%;
  background-color: #f1f1f1;
  padding-left: 20px;
}

/* Fake image */
.fakeimg {
  background-color: #aaa;
  width: 100%;
  padding: 20px;
}

/* Add a card effect for articles */
.card {
  background-color: white;
  padding: 20px;
  margin-top: 20px;
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}
p {
  text-align: justify;
  padding: 5px 20px;
  line-height: 25px;
}

/* Footer */
.footer {
  margin-top: 20px;
  padding: 10px;
  height: 30vh;
  text-align: center;
  background: #c25929;
}
.vl {
  border-left: 2px solid #64ab5e;
  height: 300px;
  position: absolute;
  left: 70%;
  margin-top: 10px;
}
/*Columns*/

.column {
  float: left;
}

/* Left and right column */
.column.side {
  width: 70%;
  border-color: #64ab5e;
}

/* Middle column */
.column.middle {
  width: 30%;
  padding: 20px;
  border-radius: solid 5px;
  border-color: #c25929;
}
.column.side-2 {
  width: 50%;
  border-color: #64ab5e;
}

/* Middle column */
.column.middle-2{
  width: 50%;
  border-color: #c25929;
}

/* Responsive layout - makes the three columns stack on top of each other instead of next to each other */
@media screen and (max-width: 600px) {
  .column.side, .column.middle {
    width: 100%;
  }
}
/* Responsive layout - makes the three columns stack on top of each other instead of next to each other */
@media screen and (max-width: 600px) {
  .column.side-2, .column.middle-2{
    width: 100%;
  }
}
/* Responsive layout - when the screen is less than 800px wide, make the two columns stack on top of each other instead of next to each other */
@media screen and (max-width: 800px) {
  .leftcolumn, .rightcolumn {   
    width: 100%;
    padding: 0;
  }
}

/* Responsive layout - when the screen is less than 400px wide, make the navigation links stack on top of each other instead of next to each other */
@media screen and (max-width: 400px) {
  .topnav a {
    float: none;
    width: 100%;
  }



}
</style>
</head>
<body>
<div class="header">
  <img src="img/logo.png"style="width:70px;">
  <h1 style="margin-top: 5px;">Kenya Forestry Research Institute</h1>
  <h2 style="margin-top: 17px; color: white; font-style: italic;">Nursery Certification Portal</h2>
</div>

<div class="topnav">
  <div class="nav topnav" style="float: right;">
      <a href="home.php">Home</a>
      <a href="aboutus.php">About Us</a>
      <a href="Nurseries.php">Nurseries</a>
      <a href="downloads.php">Downloads</a>
      <a href="contactus.php">Contact Us</a>
  </div>
  <div class="loginDetails"><?php if (isset($_SESSION['username'])) : ?>
                <h1>Welcome, <?php echo ucwords($_SESSION['username']);?></h1>
                <div class="userDetails">
                  <h2 style ="color: #eee; text-shadow: 0px 0px 3px #333;"><div class="user"></div><span></span><?php echo ucwords($_SESSION['username']);?></h2>
                  <h3 ><a class="logout" href="index.php?logout='1'"><p>logout</p></a></h3>
                </div>
                
            <?php endif ?>
      </div>
</div>