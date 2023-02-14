<?php  
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['fname'])) {



if(isset($_POST['cellno']) && 
   isset($_POST['email'])){

    include "../db_conn.php";

    $cellno = $_POST['cellno'];
    $email = $_POST['email'];
    $town = $_POST['town'];
    $old_pp = $_POST['old_pp'];
    $id = $_SESSION['id'];

    if (empty($cellno)) {
    	$em = "new/old # is required";
    	header("Location: ../edit.php?error=$em");
	    exit;
    }else if(empty($email)){
    	$em = "old/new email is required";
    	header("Location: ../edit.php?error=$em");
	    exit;
    }else if(empty($town)){
         $em = "old/new Town is required";
         header("Location: ../edit.php?error=$em");
         exit;
    }else {

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
               // Delete old profile pic
               $old_pp_des = "../upload/$old_pp";
               if(unlink($old_pp_des)){
               	  // just deleted
               	  move_uploaded_file($tmp_name, $img_upload_path);
               }else {
                  // error or already deleted
               	  move_uploaded_file($tmp_name, $img_upload_path);
               }
               

               // update the Database
               $sql = "UPDATE users 
                       SET cellno=?, email=?, town=?, pp=?
                       WHERE id=?";
               $stmt = $conn->prepare($sql);
               $stmt->execute([$cellno, $email, $town, $new_img_name, $id]);
               $_SESSION['cellno'] = $cellno;
               header("Location: ../edit.php?success=Your account has been updated successfully");
                exit;
            }else {
               $em = "You can't upload files of this type";
               header("Location: ../edit.php?error=$em&$data");
               exit;
            }
         }else {
            $em = "unknown error occurred!";
            header("Location: ../edit.php?error=$em&$data");
            exit;
         }

        
      }else {
       	$sql = "UPDATE users 
       	        SET cellno=?, email=?, town=?
                WHERE id=?";
       	$stmt = $conn->prepare($sql);
       	$stmt->execute([$cellno, $email, $town, $id]);

       	header("Location: ../edit.php?success=Your account has been updated successfully");
   	    exit;
      }
    }


}else {
	header("Location: ../edit.php?error=error");
	exit;
}


}else {
	header("Location: edit.php");
	exit;
} 

