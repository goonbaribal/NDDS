<?php 
session_start();

if(isset($_POST['idno'])){

    include "../db_conn.php";

    $idno = $_POST['idno'];

    $data = "idno=".$idno;
    
    if(empty($idno)){
    	$em = "ID number is required";
    	header("Location: ../homec.php?error=$em&$data");
	    exit;
    }
    {
    	$sql = "SELECT * FROM users WHERE idno = ?";
    	$stmt = $conn->prepare($sql);
    	$stmt->execute([$idno]);

      if($stmt->rowCount() == 1){
          $user = $stmt->fetch();

          $username =  $user['username'];
          $password =  $user['password'];
          $fname =  $user['fname'];
          $id =  $user['id'];
          $pp =  $user['pp'];

          if($idno === $idno){
                 $_SESSION['id'] = $id;
                 $_SESSION['fname'] = $fname;
                 $_SESSION['pp'] = $pp;

                 header("Location: ../homee.php");
                 exit;
                }else {
                  $em = "ID number not found";
                  header("Location: ../homec.php?error=$em&$data");
                  exit;
               }
   
             }else {
               $em = "ID number not found";
               header("Location: ../homec.php?error=$em&$data");
               exit;
            }
   
         }
          

        }else {
	          header("Location: ../homec.php?error=error");
	          exit;
}
