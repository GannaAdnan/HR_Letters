<html>
<head>
<title> Login </title>
<link rel="shortcut icon" href="Photos/hrlogo.png" />

<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
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
.login{
  border-radius: 5px;
  background-color: black;
  padding: 20px;
  width:40%;
  margin :250px 0px 0px 400px;
  font-family:'Raleway';

}




.checkmark {
  position: absolute;
  top: 0;
  left: 0;
  height: 25px;
  width: 25px;
  background-color: #eee;
}

h2{
  font-family:'Raleway';
  color:white;
  text-align:center;
}
</style>

</head>
<body>
<?php
session_start();

include_once "config.php";
include "DatabaseErrorHandler.php";
$errmessage="";
$errmsg="";
if(isset ($_POST["Submit"])){
	$sql="Select * from user
	where Email='" .$_POST["email"]."' and Password='".$_POST["password"]."'";
	$result = mysqli_query($conn,$sql);
	if(!$result){
		
		trigger_error("Error in Database",E_USER_WARNING);
	}
	if($row=mysqli_fetch_array($result))
	{
        if($row["Status"]==""){

			$errmsg="Not Approved Yet ";
		}
		else{
			
        $_SESSION["Fname"]=$row[0];
		$_SESSION["Lname"]=$row[1];
		$_SESSION["ID"]=$row[2];
		$_SESSION["Email"]=$row[3];
		$_SESSION["Address"]=$row[4];
		$_SESSION["Sex"]=$row[5];
		$_SESSION["Password"]=$row[6];
		$_SESSION["PhoneNO"]=$row[7];
		$_SESSION["DepName"]=$row[8];
		$_SESSION["Status"]=$row[9];
		
		
		 if(isset($_POST['checked'])){ 
        $cookie_name = "email";
		$cookie_value = $_POST["email"];
		setcookie($cookie_name, $cookie_value,time() +(86400 * 30), "/"); // one month

		$cookie_name1 = "password";
		$cookie_value1 = $_POST["password"];
		setcookie($cookie_name1, $cookie_value1, time() +(86400 * 30), "/"); 

		 if(!isset($_COOKIE[$cookie_name]) && !isset($_COOKIE[$cookie_name1])) {
			 echo "Cookie named '" . $cookie_name . "' is not set!";
				  echo "Cookie named '" . $cookie_name1 . "' is not set!";

		} else {
			 echo "Cookie '" . $cookie_name . "' is set!<br>";
			
				  echo "Cookie '" . $cookie_name1 . "' is set!<br>";

	
}
 }
 header("Location:home.php"); 
		}


	}

	else
	{
		$errmessage="Invalid Email or Password";
	}
}
 


 include"basehome.php";

?>



<div class='login' id='login'>
	<h2>Login</h2>
  <form method="post" action="">

	<label for="email" style='color:white;'>E-Mail</label>
    <input type="text" id="email" name="email" placeholder="Your email address.." value=<?php if(isset($_COOKIE["email"])) { echo $_COOKIE["email"]; } ?>>


	<label for="password"style='color:white;'>Password</label>
    <input type="password" id="password" name="password" placeholder="Your Password.."  value="<?php if(isset($_COOKIE["password"])) { echo $_COOKIE["password"]; } ?>" >
	 <?php  echo "<font color='red'>".$errmessage."</font>"; ?><br>
     <?php  echo "<font color='red'>".$errmsg."</font>"; ?><br>

       <input type="checkbox" name="checked"  >

     <label style='color:white;'> remember me  </label>

    <input type="submit" value="Login" name="Submit">
  </form>
</div>

</body>
</html>
