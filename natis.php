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
	<title>Update</title>
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
  height: vh;
  background-color: rgb(200, 228, 247);
}
.div img{
	width: 150px;
	height: 100px;
	border-radius: 15%;
	}
.container {
  width: 100%;
  height: 94vh;
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
.container form  {
  width: 40%;
  height: 55vh;
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
.log a{
  margin-left: 5vh;
}
.input-fields a{
  margin-left: 5vh;
}
h1{
    color:darkblue;
}
select{
    width: 20%;
    margin: 10px 0;
    border: 1px solid blue;
    padding: 8px 20px;
    outline: none;
    font-size: 17px;
    border-radius: 20px;
    background-color: whitesmoke;
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
input[type="submit"]{
    background-color: gray;
    color: white;
    font-size: 12px;
    font-weight: 600;
    text-transform: uppercase;
    cursor: pointer;
    width:100px;
}
input[type="submit"]:hover{
    background-color:darkblue;
}
.danger{
  color: black;
  width: 45%;
  border-radius: 20px;
  background-color: rgb(250, 167, 167);
  margin-left: 30%;
  text-align: center;
}
.success{
  color: black;
  width: 58%;
  border-radius: 20px;
  background-color: rgb(167, 247, 167);
  margin-left: 25%;
  text-align: center;
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

    <?php if ($user) { ?>

    <form action="php/ubc.php" 
          method="post"
          enctype="multipart/form-data">
              
      <div class="input-fields">

        <h1>Update Profile</h1><br>

            <!-- error -->
          <?php if(isset($_GET['error'])){ ?>
            <div class="danger" role="alert">
              <?php echo $_GET['error']; ?>
            </div>
          <?php } ?>
            
            <!-- success -->
          <?php if(isset($_GET['success'])){ ?>
            <div class="success" role="alert">
              <?php echo $_GET['success']; ?>
            </div>
          <?php } ?>

          <div class="div">

          <h3><?php echo $user['sname']?></h3>
            
            <label>Driving L</label>

            <select id="drivingl" name="drivingl">
              <option value="<?php echo $user['drivingl']?>" selected><?php echo $user['drivingl']?></option>
              <option value="A">A</option>
              <option value="BE">BE</option>
              <option value="C1">C1</option>
              <option value="C1E">C1E</option>
              <option value="C">C</option>
              <option value="CE">CE</option>
            </select>
          </div>
          
          <input type="submit" value="Update">
          <a href="homee.php">home</a>
      </div>

      <a href="home.html">
          <img  src="NAM LOGO.jpeg" alt="ndds logo" class="logo" />
        </a>

    </form>
  </div>

    <?php }else{ 
        header("Location: edit.php");
        exit;
    } ?>

  <footer>
      <img src="NAM LOGO.jpeg" alt="ndds logo">
      <h6> ~ N-D-D-S is hosted by <a class="f" href="https://mict.gov.na/">MICT</a> &copy; all rights reserved.</h6>
  </footer>
</body>
</html>

<?php }else {
	header("Location: login.php");
	exit;
} ?>