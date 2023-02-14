<?php 
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['fname'])) {

include "db_conn.php";
include 'php/User.php';
$user = getUserById($_SESSION['id'], $conn);


 ?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="icon" type="image/png" href="images/favicon.png"/>
    <link rel="stylesheet" href="css/dashboard.css">
    
    <link rel="icon" type="image/png" href="images/favicon.png"/>

    <title>Card Generation</title>
    <link rel="icon" type="image/jpeg" href="NAM LOGO.jpeg"/>
       <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Orbitron&display=swap" rel="stylesheet">
<style>
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
}
body{
   font-family:'arial';
   background-color: whitesmoke;
   align-items: center;
   margin-top: 10vh;
   }

span{

    font-family: 'Orbitron', sans-serif;
    font-size:16px;
}
hr.new2 {
  border-top: 1px dashed black;
  width:350px;
  text-align:left;
  align-items:left;
}
 /* second id card  */
 p{
     font-size: 13px;
     margin-top: -5px;
 }
 .container {
    width: 80vh;
    height: 45vh;
    margin: auto;
    background-color: white;
    box-shadow: 0 1px 10px rgb(146 161 176 / 50%);
    overflow: hidden;
    border-radius: 10px;
}

.header {
    width: 73vh;
    height: 15vh;
    margin: 20px auto;
    background-color: ;
    box-shadow: 0 1px 10px rgb(146 161 176 / 50%); */
    border-radius: 10px;
    background: linear-gradient(
            to right, darkblue,
            rgb(209, 195, 195),
            red,
            rgb(209, 195, 195),
            green); 
    overflow: hidden;
    text-align: right;
    font-family: 'Poppins', sans-serif;
    border-radius: 8px;
}
.header img{
    width: 8vh;
    height: 8vh;
    margin-top: -1vh;
    margin-right: 4vh;
    border-radius: 50%;
}

.header h1 {
    color: rgb(27, 27, 49);
    text-align: right;
    margin-right: 20px;
    margin-top: 15px;
}
.header h3{
    text-align: center;
    font-weight: bolder;
    margin-top: -7vh;
}
.header h6{
    text-align: center;
    text-transform: uppercase;
    font-weight: bolder;
}
.header p {
    color: rgb(157, 51, 0);
    text-align: right;
    margin-right: 22px;
    margin-top: -10px;
}

.container-2 {
    /* border: 2px solid red; */
    width: 73vh;
    height: 10vh;
    margin: 0px auto;
    margin-top: -20px;
    display: flex;
}

.box-1 {
    border: 4px solid black;
    width: 90px;
    height: 95px;
    margin: -40px 25px;
    border-radius: 3px;
    background-image: url();
}

.box-1 img {
    width: 82px;
    height: 87px;
}

.box-2 {
    /* border: 2px solid purple; */
    width: 33vh;
    height: 8vh;
    margin: 7px 0px;
    padding: 5px 7px 0px 0px;
    text-align: left;
    font-family: 'Poppins', sans-serif;
    font-weight: bolder;
}

.box-2 h2 {
    font-size: 1rem;
    margin-top: -5px;
    color: rgb(27, 27, 49);
    text-transform: uppercase;
}

.box-2 p {
    font-size: 0.7rem;
    margin-top: -5px;
    color: rgb(179, 116, 0);
}

.box-3 {
    /* border: 2px solid rgb(21, 255, 0); */
    width: 8vh;
    height: 8vh;
    margin: 8px 0px 8px 30px;
}

.box-3 img {
    width: 10vh;
    height:10vh;
    margin-top:4vh;
}

.container-3 {
    /* border: 2px solid rgb(111, 2, 161); */
    width: 73vh;
    height: 12vh;
    margin: 0px auto;
    margin-top: 10px;
    display: flex;
    font-family: 'Shippori Antique B1', sans-serif;
    font-size: 0.7rem;
}

.info-1 {
    /* border: 1px solid rgb(255, 38, 0); */
    width: 17vh;
    height: 12vh;
}

.id {
    /* border: 1px solid rgb(2, 92, 17); */
    width: 17vh;
    height: 5vh;
}

.id h4 {
    color: darkblue;
    font-weight: bolder;
    font-size:15px;
}

.dob {
    /* border: 1px solid rgb(0, 46, 105); */
    width: 17vh;
    height: 5vh;
    margin: 8px 0px 0px 0px;
}

.dob h4 {
    color: darkblue;
    font-weight: bolder;
    font-size:15px;
}

.info-2 {
    /* border: 1px solid rgb(4, 0, 59); */
    width: 17vh;
    height: 12vh;
}

.dl {
    width: 17vh;
    height: 5vh;
}

.dl h4 {
    color: darkblue;
    font-weight: bolder;
    font-size:15px;
}

.info-3 {
    /* border: 1px solid rgb(255, 38, 0); */
    width: 17vh;
    height: 12vh;
}

.town {
    width: 22vh;
    height: 5vh;
}

.town h4 {
    color: darkblue;
    font-weight: bolder;
    font-size:15px;
}

.phone {
    /* border: 1px solid rgb(0, 46, 105); */
    width: 17vh;
    height: 5vh;
    margin: 8px 0px 0px 0px;
}

.info-4 {
    /* border: 2px solid rgb(255, 38, 0); */
    width: 22vh;
    height: 12vh;
    margin: 0px 0px 0px 0px;
    font-size:15px;
}

.phone h4 {
    color: darkblue;
    font-weight: bolder;
    font-size:15px;
}

.sign {
    width: 17vh;
    height: 5vh;
    margin: 41px 0px 0px 20px;
    text-align: center;
    font-style: italic;
    color:green;
    font-weight: bolder;
}
footer{
    color: black;
    margin: 2px;
    font-family:'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
    font-size: 20px;
    background-color:lightgray;
    border-radius: 30px;
    padding-left: 510px;
    margin-top: 40vh;
    display:flex;
	height: 29px;
}
footer img{
    width: 25px;
    height: 25px;
    border-radius: 50%;
}
footer h6{
    margin-top: 6px;
}
footer a{
    color: blue;
    text-decoration: none;
}
</style>
<body>

<?php if ($user) { ?>

<div class="row" style="margin: 0px 20px 5px 20px">
  <div class="col-sm-6">
    <div class="card jumbotron">
      <div class="card-body">
        <form class="form">.
        <h1>Generated Card</h1>
        <a style="margin-left: 20vh" href="homee.php">Go Back</a>
        </form>
      </div>
    </div>
  </div>

    <div class="col-sm-6">
      <div class="card">
          <div class="card-header" >
              Here is the Id Card
          </div>
        <div class="card-body" id="mycard" style="">
    
    
    <div class='container' style='text-align:left; background-color:#e9ebec; border:2px dotted black;'>
                                              <div class='header'>
                                                <h6>Rebublic of Namibia</h6>                                                
                                                <img src="NAM LOGO.jpeg">
                                                <h3>N-D-D-S</h3>
                                                <h6>+264 81 336 9619</h6>
                                                
                                              </div>
                                  
                                              <div class='container-2'>
                                                  <div class='box-1'>
                                                  <img src="upload/<?=$user['pp']?>"class="">
                                                  </div>
                                                  <div class='box-2'>
                                                      <h2><?=$user['sname']?></h2>
                                                      <h6><?=$user['fname']?></h6>
                                                  </div>
                                                  <div class='box-3'>
                                                  
                                                  <?php
                                                    require_once 'phpqrcode/qrlib.php';
                                                    $path = 'images/';
                                                    $qrcode = $path.time().".png";

                                                    QRcode::png("Id Card", $qrcode);
                                                    echo "<img src='".$qrcode."'>";
                                                    ?>

                                                  </div>
                                                </div>
                                  
                                              <div class='container-3'>
                                                  <div class='info-1'>
                                                      <div class='id'>
                                                          <h4>ID No</h4>
                                                          <p><?=$user['idno']?></p>
                                                      </div>
                                  
                                                      <div class='dob'>
                                                          <h4>Phone</h4>
                                                          <p><?=$user['cellno']?></p>
                                                      </div>
                                  
                                                  </div>
                                                  <div class='info-2'>
                                                      <div class='dl'>
                                                          <h4>Driving L</h4>
                                                          <p><?=$user['drivingl']?></p>
                                                      </div>
                                                      
                                                  </div>
                                                  <div class='info-3'>
                                                      <div class='town'>
                                                          <h4>Town</h4>
                                                          <p><?=$user['town']?></p>
                                                      </div>
                                                      
                                                  </div>
                                                  <div class='info-4'>
                                                      <div class='sign'>
                                                          <br>
                                                          <p style='font-size:15px;'>signature</p>
                                                      </div>
                                                  </div>
                                                  </div>
        <br>
        
     </div>
  </div> 
  <hr>
<button id="demo" class="downloadtable btn btn-primary" onclick="downloadtable()"> Print Id Card</button> 
		
    <?php }else { 
     header("Location: login.php");
     exit;
    } ?>
	
</body>
</html>

<?php }else {
	header("Location: login.php");
	exit;
} ?>