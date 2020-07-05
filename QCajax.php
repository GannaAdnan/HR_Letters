<?php
include_once "config.php";
include "DatabaseErrorHandler.php";

if (isset($_POST['insert_comment'])) {
    $row_no = $_POST['row_id'];
	$comment=$_POST['comments'];
    $lt=$_POST['lt'];

	$sql="UPDATE letters
   SET QCcomments = '$comment'
   WHERE UserID = $row_no AND LetterType='$lt';";

   $select= mysqli_query($conn,$sql);
   if(!$select){
	   
	   trigger_error("Error in Database ",E_USER_WARNING);
   }
   
    echo "success";
    exit();
}




?>