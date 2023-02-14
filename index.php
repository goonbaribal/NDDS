<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Registration</title>
	<link rel="icon" type="image/jpeg" href="NAM LOGO.jpeg"/>
</head>
<style>
    * {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}
body{
  width: 100%;
  height: 175vh;
}
.container {
  width: 100%;
  height: 170vh;
  display: flex;
  align-items: center;
  justify-content: center;
  background-color: rgb(200, 228, 247);
  position: relative;
}
.container form {
  width: 60vh;
  height: 157vh;
  padding: 3rem 2rem;
  background-color: white;
  box-shadow: 10px 10px 20px rgba(0, 0, 0, 0.241),
    -5px -5px 10px rgba(153, 153, 153, 0.387);
  border-radius: 35px;
  text-align: center;
  position: relative;
  z-index: 2;
}
.input-fields {
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  margin-top: 30px;
}
.logo {
  width: 80px;
  position: absolute;
  top: 0;
  left: 50%;
  transform: translate(-50%, -50%);
  border: 3px solid white;
  border-radius: 50%;
  box-shadow: 5px 5px 10px rgba(116, 116, 116, 0.352),
  -5px -5px 10px rgba(168, 168, 168, 0.352);
}
form h1{
    font-family: sans-serif;
    color: darkblue;
    margin: 6px;
    font-family: 'Roboto', sans-serif;
    font-size: 26px;
}
input{
    width: 30vh;
    margin: 10px 0;
    border: 1px solid blue;
    padding: 8px 20px;
    outline: none;
    font-size: 12px;
    border-radius: 20px;
    background-color: whitesmoke;
}
.label{
    font-weight: bolder;
    text-align: left;
    display: block;
}
input[type="submit"]{
    background-color: lightgray;
    color:white;
    font-size: 20px;
    font-weight: 600;
    text-transform: uppercase;
    cursor: pointer;
}
input[type="submit"]:hover{
    background-color: darkblue;
}
input[type="reset"]{
    background-color: lightgray;
    color: white;
    font-size: 20px;
    font-weight: 600;
    text-transform: uppercase;
    cursor: pointer;
}
input[type="reset"]:hover{
    background-color: gray;
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
.danger{
  color: black;
  width: 45%;
  border-radius: 20px;
  background-color: rgb(250, 167, 167);
  margin-left: 25%;
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
    margin: 6px;
    font-family:'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
    font-size: 20px;
    background-color:lightgray;
    border-radius: 30px;
    padding-left: 510px;
    display:flex;

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
    	
    	<form action="php/signup.php" 
    	      method="post"
    	      enctype="multipart/form-data">

    		<h1>Registration</h1><br>
        <h3><a href="login.php">login</a></h3>

    		<?php if(isset($_GET['error'])){ ?>
    		<div class="danger" role="alert">
			  <?php echo $_GET['error']; ?>
			</div>
		    <?php } ?>

		    <?php if(isset($_GET['success'])){ ?>
    		<div class="success" role="alert">
			  <?php echo $_GET['success']; ?>
			</div>
		    <?php } ?>
			
			<div class="input-fields">

      <div class="div">
      <label class="label">CV</label>
		    <input type="file" 
		           class="form-control"
		           name="cv">
		  </div>
		
		  <div class="div">
		    <label class="label">ID No</label>
		    <input type="text" 
		           class="form-control"
		           name="idno"
				   placeholder="national ID number"
		           value="<?php echo (isset($_GET['idno']))?$_GET['idno']:"" ?>">
		  </div>

		  <div class="div">
		    <label class="label">Full Name</label>
		    <input type="text" 
		           class="form-control"
		           name="fname"
		           value="<?php echo (isset($_GET['fname']))?$_GET['fname']:"" ?>">
		  </div>

		  <div class="div">
		    <label class="label">Surname</label>
		    <input type="text" 
		           class="form-control"
		           name="sname"
		           value="<?php echo (isset($_GET['sname']))?$_GET['sname']:"" ?>">
		  </div>

		  <div class="div">
		    <label class="label">Cellphone</label>
		    <input type="text" 
		           class="form-control"
		           name="cellno"
				   placeholder="+264 81 000 0000"
		           value="<?php echo (isset($_GET['cellno']))?$_GET['cellno']:"" ?>">
		  </div>

		  <div class="div">
		    <label class="label">Email</label>
		    <input type="text" 
		           class="form-control"
		           name="email"
				   placeholder="e.g smith@iway.com"
		           value="<?php echo (isset($_GET['email']))?$_GET['email']:"" ?>">
		  </div>

		  <div class="div">
		    <label class="label">Town</label>
		    <input type="text" 
		           class="form-control"
		           name="town"
				   placeholder="name of your Town"
		           value="<?php echo (isset($_GET['town']))?$_GET['town']:"" ?>">
		  </div>

		  <div class="div">
		    <label class="label">Username</label>
		    <input type="text" 
		           class="form-control"
		           name="uname"
		           value="<?php echo (isset($_GET['uname']))?$_GET['uname']:"" ?>">
		  </div>

		  <div class="div">
		    <label class="label">Password</label>
		    <input type="password" 
		           class="form-control"
		           name="pass">
		  </div>

		  <div class="div">
		    <label class="label">Profile Picture</label>
		    <input type="file" 
		           class="form-control"
		           name="pp">
		  </div>
		  
		  <input type="submit" value="Submit" />

        </div>
        <a href="home.html">
          <img  src="NAM LOGO.jpeg" alt="nam logo" class="logo" />
        </a>
		</form>
    </div>
	<footer>
      <img src="NAM LOGO.jpeg" alt="ndds logo">
      <h6> ~ N-D-D-S is hosted by <a href="https://mict.gov.na/">MICT</a> &copy; all rights reserved.</h6>
	</footer>
</body>
</html>