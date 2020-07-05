<?php 

include "config.php";

if (isset($_POST['delid_id'])) {
    $row_del = $_POST['delid_id'];
	$sql="delete from help where QuesID='$row_del'";
	$result=mysqli_query($conn,$sql); 
	
    echo "success";
    exit();
}

if (isset($_POST['editid_id'])) {
    $row_edit = $_POST['editid_id'];
	$new_edit= $_POST['newedit'];
	$sql="UPDATE help SET Questions='$new_edit' where QuesID='$row_edit'";
	$result=mysqli_query($conn,$sql); 
    echo "success";
    exit();
}

if (isset($_POST['answerid_id'])) {
    $row_answer = $_POST['answerid_id'];
	$new_answer= $_POST['newanswer'];
	$sql="UPDATE help SET Answers='$new_answer' where QuesID='$row_answer'";
	$result=mysqli_query($conn,$sql); 
    while($row = mysqli_fetch_assoc($result)){
		echo $row['Answers'];
    
}
exit();
}
if(isset($_POST['qid_id'])){
	$qqid=$_POST['qid_id'];
	$sql="Select QuesID,Answers from help where QuesID='$qqid'";
	$result=mysqli_query($conn,$sql);
    //echo "success";
	//echo $sql;
	while($row = mysqli_fetch_assoc($result)){
	  /*echo "<div class='rect'>
	<p>". $row['answer']."</p>
	</div>";*/
		
	echo $row['Answers'];
	}
    exit();
}


?>