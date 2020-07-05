<?php
include_once "config.php";

if (isset($_POST['delete_row'])) {
    $row_no = $_POST['row_id'];
	$sql="delete from edit where ID='$row_no'";
    mysqli_query($conn,$sql) or die( mysqli_error($conn));
    echo "success";
    exit();
}
if (isset($_POST['insert_row'])) {
    $row_no = $_POST['row_id'];
	$fn = $_POST['fn'];
	$ln = $_POST['ln'];
	$em = $_POST['em'];
	$ad = $_POST['ad'];
	$ph = $_POST['ph'];
	$s = $_POST['s'];
	$dep = $_POST['dep'];
	$p = $_POST['p'];
	
	$sql="UPDATE user
   SET Status = 'Approved',Fname='$fn',Lname='$ln',Email='$em',Address='$ad',PhoneNO='$ph',Sex='$s',DepName='$dep',Password='$p'
   WHERE ID = $row_no;";
   $sql1 =" DELETE from edit  WHERE ID = $row_no;  ";
    mysqli_query($conn,$sql)or die( mysqli_error($conn));
	mysqli_query($conn,$sql1)or die( mysqli_error($conn));
    echo "success";
    exit();
}



?>