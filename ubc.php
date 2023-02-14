<?php 

    if ($cname['cname'] = 'NaTis') {
    	header("Location: natis.php");
	    exit;
	}

else {
	header("Location: homee.php?error=error");
	exit;
}


?>