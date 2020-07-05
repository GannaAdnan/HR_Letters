<html>
<head>
<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
<link rel="shortcut icon" href="Photos/hrlogo.png" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<?php
include_once "config.php";


$emailError="";
$PasswordError="";
$CPasswordError="";
$IDError="";
$fnameError ="";
$lnameError ="";
$moberror="";
$adderror="";
$sql="";
if(isset($_POST['Submit'])){
	$select = mysqli_query($conn, "SELECT * FROM user where ID = '".$_POST['natID']."' ") or die( mysqli_error($conn));
	$select2 = mysqli_query($conn, "SELECT * FROM user where Email = '".$_POST['email']."' ") or die( mysqli_error($conn));
	$select3 = mysqli_query($conn, "SELECT * FROM user where PhoneNO = '".$_POST['mobile']."' ") or die( mysqli_error($conn));

$row = mysqli_fetch_assoc($select);
$row2 = mysqli_fetch_assoc($select2);
$row3 = mysqli_fetch_assoc($select3);




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
	else if($row3['PhoneNO']!=""){
	
	$moberror = " Mobile Number already exists.";



}

/*------------------------------------------------------------------
 National ID
--------------------------------------------------------------------*/

if (empty($_POST['natID'])){
	$IDError="National ID is Required";
	
}
 else if (!preg_match('/^\d{14}$/', $_POST['natID'])){
$IDError = " Invalid National ID ";

}

else if($row['ID']!=""){
	
	$IDError = " National ID already exists.";

}

/*------------------------------------------------------------------
 Email 
--------------------------------------------------------------------*/
if(empty($_POST['email'])){

$emailError = " Email is Required.";
}
else if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
$emailError = "  Please enter a valid email.";
}
  else if($row2['Email']!=""){
	
	$emailError = " Email already exists.";

}


else if ( empty($emailError) &&  empty($IDError) && empty($moberror) && empty($PasswordError) && empty($fnameError) && empty($lnameError) && empty( $CPasswordError)) 
{      
	$sql="INSERT into user (Fname,Lname,Email,Address,ID, Password,PhoneNO,Sex,DepName)
		values ('".$_POST['firstname']."' , '".$_POST['lastname']."' , '".$_POST['email']."' , '".$_POST['address']."' , '".$_POST['natID']."' , '".$_POST['password']."' , '".$_POST['mobile']."', '".$_POST['sex']."', '".$_POST['department']."');";
		$result=mysqli_query($conn,$sql) or die(mysqli_error($conn));
		if($result)
		{
			header("Location:home.php");
		}
		else
		{
			echo $sql;
		}
} 






}


?>


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
.reg {
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
 <?php include "basehome.php"; ?> 


<div class="reg" id="reg">
<h2> Registration </h2>
  <form id=regform  action="" method="post">
    <label for="fname" style='color:white;'  >First Name</label>
    <input type="text" id="fname" name="firstname" placeholder="Your name.." value=<?php if(isset($_POST["Submit"])) { echo $_POST["firstname"]; } ?>>
	 	 <?php  echo "<font color='red'>".$fnameError."</font>"; ?><br>

    <label for="lname" style='color:white;' >Last Name</label>
    <input type="text" id="lname" name="lastname" placeholder="Your last name.." value=<?php if(isset($_POST["Submit"])) { echo $_POST["lastname"]; } ?>>
		 	 <?php  echo "<font color='red'>".$lnameError."</font>"; ?><br>

	<label for="email" style='color:white;'>E-Mail</label>
    <input type="text"  id="email" name="email" placeholder="Your email address.." value=<?php if(isset($_POST["Submit"])) { echo $_POST["email"]; } ?>>
      <?php  echo "<font color='red'>".$emailError."</font>"; ?><br>
    
	<label for="password"style='color:white;'>Password</label>
      <input type="password" id="password" name="password" placeholder="Your Password.." value=<?php if(isset($_POST["Submit"])) { echo $_POST["password"]; } ?>>
	 <?php  echo "<font color='red'>".$PasswordError."</font>"; ?><br>


	<label for="conpassword"style='color:white;'>Confirm Password</label>
    <input type="password" id="conpassword" name="conpassword" placeholder="Confirm your Password.." value=<?php if(isset($_POST["Submit"])) { echo $_POST["conpassword"]; } ?>>
	 <?php  echo "<font color='red'>".$CPasswordError."</font>"; ?><br>

	<label for="id"style='color:white;'>National ID</label>
    <input type="text" id="id" name="natID" placeholder="Your National ID.." value=<?php if(isset($_POST["Submit"])) { echo $_POST["natID"]; } ?>>
	 <?php  echo "<font color='red'>".$IDError."</font>"; ?><br>

	<label for="address"style='color:white;'>Address</label>
    <input type="text" id="address" name="address" placeholder="Your current Address.." value=<?php if(isset($_POST["Submit"])) { echo $_POST["address"]; } ?>>
		 <?php  echo "<font color='red'>".$adderror."</font>"; ?><br>

	<label for="mobile"style='color:white;'>Mobile Number</label>
    <input type="text" id="mobile" name="mobile" placeholder="Your mobile number.." value=<?php if(isset($_POST["Submit"])) { echo $_POST["mobile"]; } ?>>
	 <?php  echo "<font color='red'>".$moberror."</font>"; ?><br>

    <label for="sex"style='color:white;' >Sex</label>
    <select id="sex" name="sex" value=<?php if(isset($_POST["Submit"])) { echo $_POST["sex"]; } ?>>
      <option value="female">Female</option>
      <option value="male">Male</option>
      
    </select>
	
	<label for="department"style='color:white;'>Department</label>
    <select id="department" name="department" value=<?php if(isset($_POST["Submit"])) { echo $_POST["department"]; } ?>>
      <option value="it">IT</option>
      <option value="sales">Sales</option>
	  <option value="marketing">Marketing</option>
      
    </select>
	
	
	
  
    <input type="submit" value="Submit" name="Submit">
  </form>
</div>

</body>
</html>
