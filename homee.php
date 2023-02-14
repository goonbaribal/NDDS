<?php 
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['fname'])) {

include "db_conn.php";
include 'php/User.php';
$user = getUserById($_SESSION['id'], $conn);


 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Candidate info...</title>
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
.div img{
	width: 150px;
	height: 150px;
	border-radius: 15%;
	}
.container {
  width: 100%;
  height: 130vh;
  display: flex;
  align-items: center;
  justify-content: center;
  background-color: rgb(200, 228, 247);
  position: relative;
}
.div{
  text-align: center;
  margin-bottom: 13px;
  margin-top: 13px;
  text-transform: uppercase;
}
.con_table  {
  width: 38%;
  height: 115vh;
  padding: 3rem 2rem;
  background-color: white;
  box-shadow: 10px 10px 20px rgba(0, 0, 0, 0.241),
    -5px -5px 10px rgba(153, 153, 153, 0.387);
  border-radius: 35px;
  text-align: left;
  position: relative;
  z-index: 2;
  font-size: 18px;
}
table{
    width: 400px;
	  padding-left: 40px;
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
.back{
  margin-left: 2vh;
}
h1{
    color:darkblue;
}
input{
    width: 40%;
    margin: 10px 0;
    border: 1px solid blue;
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
    width:100px;
}
input[type="button"]:hover{
    background-color:darkblue;
}
.con_table input::placeholder{
    font-family: 'Poppins', sans-serif;
    font-size: 14px;
    color: rgb(199, 197, 197);

}
.danger{
  color: black;
  width: 60%;
  border-radius: 20px;
  background-color: rgb(250, 167, 167);
  text-align: center;
}
.success{
  color: black;
  width: 40%;
  border-radius:20px;
  background-color: green;
  margin-left: 30%;
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

    <form action="php/search.php" method="post">
        
		<div class="div">
		    <input type="search" 
		           class="form-control"
		           name="idno"
                   placeholder="enter candidate ID number"
		        value="<?php echo (isset($_GET['idno']))?$_GET['idno']:"" ?>">
		</div>
	</form>

        <h1>Candidate info...</h1>

<?php if ($user) { ?>
    <div class="div" >
        <img src="upload/<?=$user['pp']?>"class="rounded-circle"><h3><?=$user['sname']?></h3>
    </div>
<table>
        <tr>
            <td>ID No</td>
            <td><h4><?=$user['idno']?></h4></td>
        </tr>
        <tr>
            <td>First Name</td>
            <td><h4><?=$user['fname']?></h4></td>
        </tr>
        <tr>
            <td>Cell No</td>
            <td><h4><?=$user['cellno']?></h4></td>
        </tr>
        <tr>
            <td>Email</td>
            <td><h4><?=$user['email']?></h4></td>
        </tr>
		<tr>
            <td>Town</td>
            <td><h4><?=$user['town']?></h4></td>
        </tr>
		<tr>
            <td>CV</td>
            <td><h4><a href="docs/<?=$user['cv'];?>"width="150" height="30">click to view</a></h4></td>
        </tr>
		<tr>
            <td>Driving L</td>
            <td><h4><?=$user['drivingl']?></h4></td>
        </tr>
		    <tr>
            <td><?php if(isset($_GET['error'])){ ?>
    		          <div class="danger">
			              <?php echo $_GET['error']; ?>
			            </div>
		            <?php } ?>
              </td>
            <td><h5></h5></td>
        </tr>
        <tr>
            <td><a href="ubc.php">
          <input type="button" value="Update" her />
        </a></td>
            <td>
            <a href="card.php">
          <input type="button" value="Id Card" her />
        </a>
            </td>
        </tr>
    </table>

    <a style="margin-left: 20vh" href="homec.php">Go Back</a>
		
    <?php }else { 
     header("Location: homee.php");
     exit;
    } ?>

	<a href="home.html">
          <img  src="NAM LOGO.jpeg" alt="ndds logo" class="logo" />
        </a>
		</div>
	</div>
	
	<footer>
      <img src="NAM LOGO.jpeg" alt="ndds logo">
      <h6> ~ N-D-D-S is hosted by <a class="f" href="https://mict.gov.na/">MICT</a> &copy; all rights reserved.</h6>
    </footer>
</body>
</html>

<?php }else {
	header("Location: homee.php");
	exit;
} ?>