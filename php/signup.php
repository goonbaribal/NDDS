<?php 
if (isset($_FILES['cv']['name']) AND !empty($_FILES['cv']['name'])) {
         
         
      $cv_name = $_FILES['cv']['name'];
      $tmp_name = $_FILES['cv']['tmp_name'];
      $error = $_FILES['cv']['error'];
      
      if($error === 0){
         $cv_ex = pathinfo($cv_name, PATHINFO_EXTENSION);
         $cv_ex_to_lc = strtolower($cv_ex);
   
         $allowed_exs = array('pdf');
         if(in_array($cv_ex_to_lc, $allowed_exs)){
            $new_cv_name = uniqid($uname, true).'.'.$cv_ex_to_lc;
            $cv_upload_path = '../docs/'.$new_cv_name;
            move_uploaded_file($tmp_name, $cv_upload_path);
         }
         }
      }
if(isset($_POST['idno']) &&
   isset($_POST['fname']) &&
   isset($_POST['sname']) &&
   isset($_POST['cellno']) &&
   isset($_POST['email']) &&
   isset($_POST['town']) && 
   isset($_POST['uname']) &&  
   isset($_POST['pass'])){

    include "../db_conn.php";

    $idno = $_POST['idno'];
    $fname = $_POST['fname'];
    $sname = $_POST['sname'];
    $cellno = $_POST['cellno'];
    $email = $_POST['email'];
    $town = $_POST['town'];
    $uname = $_POST['uname'];
    $pass = $_POST['pass'];

    $data = "idno=".$idno."&fname=".$fname."&sname=".$sname."&cellno=".$cellno."&email=".$email."&town=".$town."&uname=".$uname;
    
    if (empty($idno)) {
    	$em = "ID number is required";
    	header("Location: ../index.php?error=$em&$data");
	    exit;
    }else if (empty($fname)) {
      $em = "Full name is required";
      header("Location: ../index.php?error=$em&$data");
      exit;
    }else if(empty($sname)){
    	$em = "Surname is required";
    	header("Location: ../index.php?error=$em&$data");
	    exit;
    }else if (empty($cellno)) {
      $em = "Cellphone number is required";
      header("Location: ../index.php?error=$em&$data");
      exit;
    }else if (empty($email)) {
      $em = "Email is required";
      header("Location: ../index.php?error=$em&$data");
      exit;
    }else if(empty($town)){
      $em = "Name of town is required";
      header("Location: ../index.php?error=$em&$data");
      exit;
     }else if(empty($uname)){
    	$em = "User name is required";
    	header("Location: ../index.php?error=$em&$data");
	    exit;
    }else if(empty($pass)){
    	$em = "Password is required";
    	header("Location: ../index.php?error=$em&$data");
	    exit;
    }else {
      // hashing the password
      $pass = password_hash($pass, PASSWORD_DEFAULT);

      if (isset($_FILES['pp']['name']) AND !empty($_FILES['pp']['name'])) {
         
         
         $img_name = $_FILES['pp']['name'];
         $tmp_name = $_FILES['pp']['tmp_name'];
         $error = $_FILES['pp']['error'];
         
         if($error === 0){
            $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
            $img_ex_to_lc = strtolower($img_ex);

            $allowed_exs = array('jpg', 'jpeg', 'png');
            if(in_array($img_ex_to_lc, $allowed_exs)){
               $new_img_name = uniqid($uname, true).'.'.$img_ex_to_lc;
               $img_upload_path = '../upload/'.$new_img_name;
               move_uploaded_file($tmp_name, $img_upload_path);

               // Insert into Database
               $sql = "INSERT INTO users(idno, fname, sname, cellno, email, town, cv, username, password, pp) 
                 VALUES(?,?,?,?,?,?,?,?,?,?)";
               $stmt = $conn->prepare($sql);
               $stmt->execute([$idno, $fname, $sname, $cellno, $email, $town, $new_cv_name, $uname, $pass, $new_img_name]);

               header("Location: ../index.php?success=Your account has been created successfully");
                exit;
            }else {
               $em = "You can't upload files of this type";
               header("Location: ../index.php?error=$em&$data");
               exit;
            }
         }else {
            $em = "unknown error occurred!";
            header("Location: ../index.php?error=$em&$data");
            exit;
         }

        
      }else {
       	$sql = "INSERT INTO users(idno, fname, sname, cellno, email, town, username, password) 
       	        VALUES(?,?,?,?,?,?,?,?)";
       	$stmt = $conn->prepare($sql);
       	$stmt->execute([$idno, $fname, $sname, $cellno, $email, $town, $uname, $pass]);

       	header("Location: ../index.php?success=Your account has been created successfully");
   	    exit;
      }
    }


}else {
	header("Location: ../index.php?error=error");
	exit;
}
