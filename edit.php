<?php 


include_once "config.php";

session_start();


	
	
$CPasswordError="";
$PasswordError="";
$moberror="";
if(isset($_POST['Submit'])){
		$select = mysqli_query($conn, "SELECT * FROM user where PhoneNO = '".$_POST['mobile']."'  AND PhoneNO <> '".$_SESSION['PhoneNO']."' ") or die( mysqli_error($conn));

$row = mysqli_fetch_assoc($select);
	
  
/*--------------------------------------------------------------
First Name
--------------------------------------------------------------*/
if(empty($_POST['firstname'])){
$fnameError = "First Name is Required.";
}
else if ( !filter_var($_POST['firstname'], FILTER_SANITIZE_STRING)){
$fnameError = "Please enter a valid name.";
}
/*------------------------------------------------------------------
 Last Name
--------------------------------------------------------------------*/
if($_POST['lastname'] == ""){
$lnameError = "Last Name is Required.";
}
else if ( !filter_var($_POST['lastname'], FILTER_SANITIZE_STRING)){
$lnameError = "Please enter a valid name.";
}


/*------------------------------------------------------------------
 Password 
--------------------------------------------------------------------*/


 if(empty($_POST['password'])) {	
  $PasswordError="Password is required";
  }
 

	 else if(strlen($_POST['password'])<8)
    {
		$PasswordError="The Password is Too Short";	
    }
    else if(!preg_match("#[0-9]+#",$_POST['password']) || !preg_match("#[A-Z]+#",$_POST['password']) || !preg_match("#[a-z]+#",$_POST['password'])) {
      $PasswordError = "Your Password Must Contain At Least 1 Number! <br> And 1 Upper Case Letter <br> And 1 Lower Case Letter ";
    }
   else  if($_POST['conpassword'] != $_POST['password'])
     {	
        $CPasswordError="Passwords don't Match";
      }
	




/*------------------------------------------------------------------
 Mobile
--------------------------------------------------------------------*/

if(empty($_POST['mobile'])){
$moberror="Mobile Number is Required";	
	
}
 else if (!preg_match("/^[0][0-9]{10}$/", $_POST['mobile'])){
$moberror = "Invalid Mobile Number";

}
	else if($row['PhoneNO']!=""){
	
	$moberror = " Mobile Number already exists.";



}
	
	
	
	
	
	else if (empty($moberror) && empty($CPasswordError) &&  empty($PasswordError) &&  empty($lnameError) &&  empty($fname))  {
	
$sql="INSERT into edit (Fname,Lname,Email,Address,ID, Password,PhoneNO,Sex,DepName,Status)
		values ('".$_POST['firstname']."' , '".$_POST['lastname']."' , '".$_SESSION['Email']."' , '".$_POST['address']."' , '".$_SESSION['ID']."' , '".$_POST['password']."' , '".$_POST['mobile']."', '".$_POST['sex']."', '".$_POST['department']."','edited');";
		$result=mysqli_query($conn,$sql) or die(mysqli_error($conn));

 
        
	header("Location:MyProfile.php");
	}
	

}
if(isset($_POST['Cancel'])){
		header("Location:MyProfile.php");

}
?>
<html>
	<head>
		<link href='https://fonts.googleapis.com/css?family=Raleway' rel='stylesheet'>
		<link rel='shortcut icon' href='Photos/hrlogo.png' />
		<script src='https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js'></script>

		<style>
			input[type=text], select {
			  width: 100%;
			  padding: 12px 20px;
			  margin: 8px 0;
			  display: inline-block;
			  border: 1px solid #ccc;
			  border-radius: 4px;
			  box-sizing: border-box;
			  font-family:'Raleway';
			  
			  
			}

			input[type=submit] {
			  width: 100%;
			  background-color: #66cccc;
			  color: white;
			  padding: 14px 20px;
			  margin: 8px 0;
			  border: none;
			  border-radius: 4px;
			  cursor: pointer;
			  font-family:'Raleway';
			}

			input[type=submit]:hover {
			  background-color: #DDA0DD;
			}
			input[type=password]{
				 width: 100%;
			  padding: 12px 20px;
			  margin: 8px 0;
			  display: inline-block;
			  border: 1px solid #ccc;
			  border-radius: 4px;
			  box-sizing: border-box;
			  font-family:'Raleway';
			}
			.edit {
			  border-radius: 5px;
			  background-color: black;
			  padding: 20px;
			  width:40%;
			  margin: 200px 0px 0px 400px;
			  font-family:'Raleway';
			  
			} 
			h2{
				  font-family:'Raleway';
				  color:white;
				  text-align:center;
				}
			</style>
</head>
<body>
 <?php include 'basehome.php'; ?>


<div class='edit' id='edit'>

 <?php echo" <h2>Edit</h2>
 <form action='' method='post'>
    <label for='fname' style='color:white;'  >First Name</label>
    <input type='text' id='fname' name='firstname'  value='".$_SESSION['Fname']."'>

    <label for='lname' style='color:white;' >Last Name</label>
    <input type='text' id='lname' name='lastname' value='".$_SESSION['Lname']."'>
	
	<label for='password'style='color:white;'>Password</label>
    <input type='password' id='password' name='password' value='".$_SESSION['Password']."'>
	<font color='red'>$PasswordError</font>
	<br>

	<label for='conpassword' style='color:white;'>Confirm Password</label>
    <input type='password' id='conpassword' name='conpassword' value='".$_SESSION['Password']."' >
	  <font color='red'>$CPasswordError</font>
	  <br>

	<label for='address'style='color:white;'>Address</label>
    <input type='text' id='address' name='address'  value='".$_SESSION['Address']."'>
	
	<label for='mobile'style='color:white;'>Mobile Number</label>
    <input type='text' id='mobile' name='mobile'  value='".$_SESSION['PhoneNO']."'>
	<font color='red'>$moberror</font>
	  <br>

    <label for='sex'style='color:white;'>Sex</label>
    <select id='sex' name='sex'  value='".$_SESSION['Sex']."'>
      <option value='female'>Female</option>
      <option value='male'>Male</option>
      
    </select>
	
	<label for='department'style='color:white;'>Department</label>
    <select id='department' name='department' value='".$_SESSION['DepName']."'>
      <option value='it'>IT</option>
      <option value='sales'>Sales</option>
	  <option value='marketing'>Marketing</option>
      
    </select>
	
	
	
  
    <input type='submit' value='Submit' name='Submit'>
    <input type='submit' value='Cancel' name='Cancel'>

  </form>;"?>
</div>

</body>

</html>

