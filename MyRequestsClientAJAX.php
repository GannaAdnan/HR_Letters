<?php
include_once "config.php";

include "DatabaseErrorHandler.php";




if (isset($_POST['delete_row'])) {
    $priid = $_POST['priid'];
	$lt=$_POST['lt'];
	$row=$_POST['row_id'];
	
	$sql="delete from letters where UserID='$row' AND LetterType='$lt'";
	$sql2="delete from documents where UserID='$row' AND LetterType='$lt'";

  $select=  mysqli_query($conn,$sql) ;
	$select2=mysqli_query($conn,$sql2) ;

if(!$select){
	trigger_error("Error in Database ",E_USER_WARNING);
} 
if(!$select2){
	trigger_error("Error in Database ",E_USER_WARNING);
} 
    echo "success";
    exit();
}
if (isset($_POST['edit_row'])) {
        $lt = $_POST['lt'];
	    $s = $_POST['s'];
	    $p = $_POST['p'];
		$priid = $_POST['priid'];

    $ltid = $_POST['ltid'];


   $select= mysqli_query($conn,"update letters set LetterType='$lt' , Salary ='$s', Priority='$p' where LetterType='$ltid' AND Priority='$priid'");
    if(!$select){
	trigger_error("Error in Database ",E_USER_WARNING);
} 
	
	echo "success";
    exit();
}



?>