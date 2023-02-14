<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login as Canditate</title>
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
  height: 95vh;
}
.container {
  width: 100%;
  height: 100%;
  display: flex;
  align-items: center;
  justify-content: center;
  background-color: rgb(200, 228, 247);
  position: relative;
}
.container form {
  width: 380px;
  height: 70vh;
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
.input-fields input{
    width: 95%;
    margin: 10px 0;
    border: 1px solid rgba(137, 137, 137, 0.222);
    padding: 8px 20px;
    outline: none;
    font-size: 17px;
    border-radius: 20px;
    background-color: whitesmoke;
}
.input-fields .div{
    width: 100%;
    position: relative;
    margin-bottom: 15px;
}
input:focus{
    border-color: #21d4fd;
}
.input-fields input::placeholder{
    font-family: 'Poppins', sans-serif;
    font-size: 15px;
}

label{
    font-family: 'Roboto', sans-serif;
    color:black;
    position: absolute;
    top: -10px;
    left: 5px;
    font-size: 15px;
}
input[type="submit"]{
    background-color: gray;
    color: white;
    font-size: 20px;
    font-weight: 600;
    text-transform: uppercase;
    cursor: pointer;
}
input[type="submit"]:hover{
    background-color:darkblue;
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
.danger{
  color: black;
  width: 60%;
  border-radius: 20px;
  background-color: rgb(250, 167, 167);
  margin-left: 20%;
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
    	
    	<form action="php/login.php" method="post">

		<h1>Candidate</h1><br>
    		<?php if(isset($_GET['error'])){ ?>
    		<div class="danger" role="alert">
			  <?php echo $_GET['error']; ?>
			</div>
		    <?php } ?>
		<div class="input-fields">
		  <div class="div">
		    <label class="form-label">Username</label>
		    <input type="text" 
		           class="form-control"
		           name="uname"
		           value="<?php echo (isset($_GET['uname']))?$_GET['uname']:"" ?>">
		  </div>

		  <div class="div">
		    <label class="form-label">Password</label>
		    <input type="password" 
		           class="form-control"
		           name="pass">
		  </div>
		  
		  <input type="submit" value="Login" />
          </div>
          <div class="links">
            <a href="loginc.php">Login as a Company</a>
            <a href="#">Forgot password?</a>
          </div>
            <a href="home.html">
              <img  src="NAM LOGO.jpeg" alt="" class="logo" />
            </a>
		</form>
    </div>
	<footer>
      <img src="NAM LOGO.jpeg" alt="ndds logo">
      <h6> ~ N-D-D-S is hosted by <a href="https://mict.gov.na/">MICT</a> &copy; all rights reserved.</h6>
    </footer>
</body>
</html>