<?php 
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['cname'])) {

include "db_conn.php";
include 'php/Userc.php';
$user = getUserById($_SESSION['id'], $conn);


 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Company db</title>
	<link rel="icon" type="image/jpeg" href="NAM LOGO.jpeg"/>
</head>
<style>
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
}
body{
  width: 100%;
  height: 100vh;
  background-color: rgb(200, 228, 247);
}
img{
	width: 340px;
	height: 90px;
	border-radius: 15px;
	}
h3{
    color: darkblue;
    text-transform: uppercase;
}
a{
  color: grey;
  font-weight: 600;
  cursor: pointer;
  border-radius: 10px;
  text-decoration: none;
}
a:hover{
  color: darkblue;
}
.container {
  width: 100%;
  height: 95vh;
  display: flex;
  align-items: center;
  justify-content: center;
  background-color: rgb(200, 228, 247);
  position: relative;
}

.con_table  {
  width: 50%;
  height: 58vh;
  padding: 4rem 1rem;
  background-color: white;
  box-shadow: 10px 10px 20px rgba(0, 0, 0, 0.241),
    -5px -5px 10px rgba(153, 153, 153, 0.387);
  border-radius: 35px;
  text-align: center;
  position: relative;
  z-index: 2;
}
.div{
  text-align: center;
  margin-bottom: 13px;
  margin-top: 13px;
}
.logo {
  width: 90px;
  position: absolute;
  top: 0;
  left: 50%;
  transform: translate(-50%, -50%);
  border: 3px solid white;
  border-radius: 50%;
  box-shadow: 5px 5px 10px rgba(116, 116, 116, 0.352),
  -5px -5px 10px rgba(168, 168, 168, 0.352);
}
.links{
    width: 100%;
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-top: 10px;
}
.links a{
    font-size: 15px;
    color: blue;
    text-decoration: none;
}
input{
    width: 40%;
    margin: 10px 0;
    border: 1px solid darkblue;
    padding: 8px 20px;
    outline: none;
    font-size: 17px;
    border-radius: 20px;
    background-color: whitesmoke;
}
input[type="button"]{
    background-color: gray;
    color: white;
    font-size: 12px;
    font-weight: 600;
    text-transform: uppercase;
    cursor: pointer;
}
input[type="button"]:hover{
    background-color:darkblue;
}
footer{
    color: black;
    margin: 2px;
    font-family:'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
    font-size: 20px;
    background-color:lightgray;
    border-radius: 30px;
    padding-left: 510px;
    display:flex;
	height: 29px;
}
.danger{
  color: black;
  width: 30%;
  border-radius: 20px;
  background-color: rgb(250, 167, 167);
  margin-left: 35%;
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
	<div class="container">
		<div class="con_table">

<h3><?=$user['cname']?></h3>

<?php if ($user) { ?>

    <div class="div">
        <img src="cc/<?=$user['logo']?>"class="rounded-circle"><h2></h2>
    </div>
  
    <form action="php/search.php" method="post">
    <?php if(isset($_GET['error'])){ ?>
    		<div class="danger">
			  <?php echo $_GET['error']; ?>
			</div>
		    <?php } ?>
		  <div class="div">
		    <input type="search" 
		           class="form-control"
		           name="idno"
               placeholder="enter candidate ID number"
		           value="<?php echo (isset($_GET['idno']))?$_GET['idno']:"" ?>">
		  </div>
		</form>
        
        <a href="add.php">Add Candidate</a><br>
        <a href="logoutc.php">logout</a>
		
    <?php }else { 
     header("Location: homec.php");
     exit;
    } ?>
	<a href="home.html">
          <img  src="NAM LOGO.jpeg" alt="ndds logo" class="logo" />
        </a>
		</div>
	</div>
	
	<footer>
      <img src="NAM LOGO.jpeg" alt="ndds logo">
      <h6> ~ N-D-D-S is hosted by <a href="https://mict.gov.na/">MICT</a> &copy; all rights reserved.</h6>
    </footer>
</body>
</html>

<?php }else {
	header("Location: loginc.php");
	exit;
} ?>