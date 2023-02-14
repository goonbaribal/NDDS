<?php 
session_start();

if(isset($_POST['usern']) && 
   isset($_POST['pword'])){

    include "../db_conn.php";

    $usern = $_POST['usern'];
    $pword = $_POST['pword'];

    $data = "usern=".$usern;
    
    if(empty($usern)){
    	$em = "Username is required";
    	header("Location: ../loginc.php?error=$em&$data");
	    exit;
    }else if(empty($pword)){
    	$em = "Password is required";
    	header("Location: ../loginc.php?error=$em&$data");
	    exit;
    }else {

    	$sql = "SELECT * FROM companies WHERE username = ?";
    	$stmt = $conn->prepare($sql);
    	$stmt->execute([$usern]);

      if($stmt->rowCount() == 1){
          $user = $stmt->fetch();

          $username =  $user['username'];
          $password =  $user['password'];
          $cname =  $user['cname'];
          $id =  $user['id'];
          $logo =  $user['logo'];

          if($username === $usern){
             if(password_verify($pword, $password)){
                 $_SESSION['id'] = $id;
                 $_SESSION['cname'] = $cname;
                 $_SESSION['logo'] = $logo;

                 header("Location: ../homec.php");
                 exit;
             }else {
               $em = "Incorect Username or password";
               header("Location: ../loginc.php?error=$em&$data");
               exit;
            }

          }else {
            $em = "Incorect Username or password";
            header("Location: ../loginc.php?error=$em&$data");
            exit;
         }

      }else {
         $em = "Incorect Username or password";
         header("Location: ../loginc.php?error=$em&$data");
         exit;
      }
    }


}else {
	header("Location: ../loginc.php?error=error");
	exit;
}
