<?php 

if(isset($_POST['cname']) &&
   isset($_POST['email']) &&
   isset($_POST['usern']) &&  
   isset($_POST['pword'])){

    include "../db_conn.php";

    $cname = $_POST['cname'];
    $email = $_POST['email'];
    $usern = $_POST['usern'];
    $pword = $_POST['pword'];

    $data = "cname=".$cname."&email=".$email."&usern=".$usern;
    
    if (empty($cname)) {
    	$em = "company name is required";
    	header("Location: ../indexc.php?error=$em&$data");
	    exit;
    }else if (empty($email)) {
      $em = "email is required";
      header("Location: ../indexc.php?error=$em&$data");
      exit;
    }else if(empty($usern)){
    	$em = "username is required";
    	header("Location: ../indexc.php?error=$em&$data");
	    exit;
    }
    {
      // hashing the password
      $pword = password_hash($pword, PASSWORD_DEFAULT);

      if (isset($_FILES['logo']['name']) AND !empty($_FILES['logo']['name'])) {
         
         
         $logo_name = $_FILES['logo']['name'];
         $tmp_name = $_FILES['logo']['tmp_name'];
         $error = $_FILES['logo']['error'];
         
         if($error === 0){
            $logo_ex = pathinfo($logo_name, PATHINFO_EXTENSION);
            $logo_ex_to_lc = strtolower($logo_ex);

            $allowed_exs = array('jpg', 'jpeg', 'png');
            if(in_array($logo_ex_to_lc, $allowed_exs)){
               $new_logo_name = uniqid($usern, true).'.'.$logo_ex_to_lc;
               $logo_upload_path = '../cc/'.$new_logo_name;
               move_uploaded_file($tmp_name, $logo_upload_path);

               // Insert into Database
               $sql = "INSERT INTO companies(cname, email, username, password, logo) 
                 VALUES(?,?,?,?,?)";
               $stmt = $conn->prepare($sql);
               $stmt->execute([$cname, $email, $usern, $pword, $new_logo_name]);

               header("Location: ../indexc.php?success=Your account has been created successfully");
                exit;
            }else {
               $em = "You can't upload files of this type";
               header("Location: ../indexc.php?error=$em&$data");
               exit;
            }
         }else {
            $em = "unknown error occurred!";
            header("Location: ../indexc.php?error=$em&$data");
            exit;
         }

        
      }else {
       	$sql = "INSERT INTO companies(cname, email, username, password) 
       	        VALUES(?,?,?,?)";
       	$stmt = $conn->prepare($sql);
       	$stmt->execute([$cname, $email, $username, $password]);

       	header("Location: ../indexc.php?success=Your account has been created successfully");
   	    exit;
      }
    }


}else {
	header("Location: ../indexc.php?error=error");
	exit;
}
