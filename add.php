<?php 
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['cname'])) {
include "db_conn.php";
include 'php/Userc.php';

$user = getUserById($_SESSION['id'], $conn);

 ?>

<?php 
if ($user['cname'] = 'mha')
header("location: index.php");
else {
    $em = "only MHA can add candidate";
    header("Location: ../homee.php?error=$em&$data");
    exit;
}
?>  

<?php }else {
	header("Location: homec.php");
	exit;
} ?>