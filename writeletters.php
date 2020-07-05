<?php
include_once "config.php";
include "DatabaseErrorHandler.php";

if (isset($_POST['write_row'])) {
    $row_no = $_POST['row_id'];
	$type=$_POST['LT'];
	$sql= "Select Fname,Lname from user where ID=$row_no ";
	$select=mysqli_query($conn,$sql);
	if (!$select){
		trigger_error("Error in Database ",E_USER_WARNING);
	}
	
	$myfile = fopen("Files/$type.txt", "a+") or die("Unable to open file!");
	copy("Files/$type.txt", "Files/$type$row_no.txt");
		$myfile2 = fopen("Files/$type$row_no.txt", "a+") or die("Unable to open file!");

	while($row = mysqli_fetch_assoc($select)){
		$txt=$row['Fname'] ;
		$txt2= $txt." ".$row['Lname'] ;
	    
	 $data = file_get_contents("Files/$type$row_no.txt");
     $newdata = str_replace('Name', $txt2, $data);
     file_put_contents("Files/$type$row_no.txt", $newdata);
   // fwrite($myfile2, $txt);
	 
	}
	
	


	
	$result2=mysqli_query($conn,"Update  letters set HRLetter='$type$row_no.txt' where UserID='$row_no' AND LetterType='$type';");
        if (!$result2){
		trigger_error("Error in Database ",E_USER_WARNING);
	}
  	
	

    $sql="Update letters SET Status='Written' where UserID='$row_no' AND LetterType='$type';";
	$result=mysqli_query($conn,$sql);
	if (!$result){
		trigger_error("Error in Database ",E_USER_WARNING);
	}
    echo "success";
    exit();


}

?>