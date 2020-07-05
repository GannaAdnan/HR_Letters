<?php
include_once "config.php";
include "DatabaseErrorHandler.php";
if (isset($_POST['delete_row'])) {
    $row_no = $_POST['row_id'];
	$lt = $_POST['lt'];

	$sql="delete from letters where UserID='$row_no' AND LetterType='$lt'";
	$sql2="delete from documents where UserID='$row_no' AND LetterType='$lt'";

   $result= mysqli_query($conn,$sql) ;
   $result2=mysqli_query($conn,$sql2) ;
if(!$result){
	
	trigger_error("Error in Database ",E_USER_WARNING);
}
if(!$result2){
	
	trigger_error("Error in Database ",E_USER_WARNING);
}
   
    echo "success";
    exit();
}
if (isset($_POST['insert_row'])) {
    $row_no = $_POST['row_id'];
	    $lt = $_POST['lt'];

	$sql="UPDATE letters
   SET Status = 'Approved'
   WHERE UserID = $row_no AND LetterType='$lt'";

   $result= mysqli_query($conn,$sql);
   if(!$result){
	   trigger_error("Error in Database ",E_USER_WARNING);
	   
   }
    echo "success";
    exit();
}



?>