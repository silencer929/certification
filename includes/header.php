<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="./slick/slick.css">
  <link rel="stylesheet" type="text/css" href="./slick/slick-theme.css">
<style>
* {
  box-sizing: border-box;
}

body {
  font-family: Arial;
  background: #fff;
}
hr {
  border: 1px solid green; 
  border-radius: 5px;
}
/* Header/Blog Title */
.header {
  padding: 10px;
  text-align: center;
  background: #64ab5e;
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
  padding: 15px 30px;
  text-decoration: none;
  font-size: 20px;
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

/*************************** Slider style*/
.slider {
        width: 90%;
        margin-top: 5px;
        margin-left: 40px;
        margin-right: 20px;
    }

    .slick-slide {
      margin: 0px 10px;
    }

    .slick-slide img {
      width: 380px;
      height: 330px;
    }

    .slick-prev:before,
    .slick-next:before {
      color: #c25929;
    }
    .slick-slide {
      transition: all ease-in-out .3s;
      opacity: 1;
    }
    
    .slick-active {
      opacity: 1;
    }

    .slick-current {
      opacity: 1;
    }
    /*************************** Slider style*/
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
  padding: 10px;
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
  <img src="images/Logo.png"style="width:70px;">
  <h1 style="margin-top: 5px;">Kenya Forestry Research Institute</h1>
  <h2 style="margin-top: -17px; color: white; font-style: italic;">Nursery Certification Portal</h2>
</div>

<div class="topnav">
  <div class="nav topnav" style="float: right;">
      <a href="index.php">Home</a>
      <a href="aboutus.php">About Us</a>
      <a href="registration/login.php">Apply for certification</a>
      <a href="Nurseries.php">Nurseries</a>
      <a href="downloads.php">Downloads</a>
      <a href="registration/adminLogin.php">Admin Login</a>
      <a href="contactus.php">Contact Us</a>
      

  </div>
</div>