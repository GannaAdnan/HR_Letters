<?php
include_once "config.php";

include "DatabaseErrorHandler.php";


if (isset($_POST['delete_row'])) {
    $row_no = $_POST['row_id'];
	$sql="delete from user where ID='$row_no'";
   $select= mysqli_query($conn,$sql) ;
	if(!$select){
	trigger_error("Error in Database ",E_USER_WARNING);
} 
    echo "success";
    exit();
}
if (isset($_POST['insert_row'])) {
    $row_no = $_POST['row_id'];
	$sql="UPDATE user
   SET Status = 'Approved'
   WHERE ID = $row_no;";

    $select=mysqli_query($conn,$sql);
	if(!$select){
	trigger_error("Error in Database ",E_USER_WARNING);
} 
    echo "success";
    exit();
}



?>