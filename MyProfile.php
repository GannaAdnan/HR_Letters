<html>
<head>
<title> MyProfile </title>
<link rel="shortcut icon" href="Photos/hrlogo.png" />

<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">

 <style>
   
	  #request{ 
	    background-color: #66cccc;
        border: 4px;
        float : left;
    	margin: 40px 0px 0px 50px;

        display: block;
        text-align: center;
        padding: 20px 24px;
		text-decoration: none;
		color: white;
		font-size: 20px;
		display: block;
		
		font-family: 'Raleway';
		  
			  
		  
	  
	  }
	   #edit{ 
	    background-color: #66cccc;
        border: 4px;
        float : left;
		margin: 40px 0px 0px 30px;
        display: block;
        text-align: center;
        padding: 20px 34px;
		text-decoration: none;
		color: white;
		font-size: 20px;
		display: block;
		
		font-family: 'Raleway';
		  
			  
		  
	  
	  }
	   #request:hover
		{
		  background-color:black;
		  color:white;

		}
		#edit:hover
		{
		  background-color:black;
		  color:white;

		}
	  #info {
		  padding-bottom:100px;
	  }
    </style>

</head>
<body>

	

 <div id="info">
 <p style="font-size: 30px;font-family:'Raleway';font-style:bold;  margin: 200px 0px 0px 35px;"> 
      
 <?php
 
 include_once "config.php";
include "DatabaseErrorHandler.php";
session_start();


$errmessage="";

	$sql="Select * from user
	where ID='" .$_SESSION["ID"]."' ";	
	$result = mysqli_query($conn,$sql) ;
if(!$result){
trigger_error("Error in Database",E_USER_WARNING);

}	
	if($row=mysqli_fetch_array($result))	
	{
	
		echo "<b>Welcome!  </b>".$_SESSION["Fname"] ." ". $_SESSION["Lname"];
        echo "<br>";
		echo "<br>";
        echo "National ID &nbsp&nbsp&nbsp&nbsp:&nbsp".$_SESSION["ID"];
        echo "<br>";
	    echo "Email &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp:&nbsp  ".$_SESSION["Email"];
		echo "<br>";
		 echo "Mobile &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp:&nbsp".$_SESSION["PhoneNO"];
		echo "<br>";
	    echo "Address &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp:&nbsp".$_SESSION["Address"];
		echo "<br>";
		echo "Department &nbsp&nbsp:&nbsp".$_SESSION["DepName"];
		echo "<br>";
	}
	else	
	{
		echo "ERROR";
	}

 include"basehome.php";

?>
	</p>
</div>
<a id='request' href="RequestClient.php"> Request</a>
<a id='edit' href="edit.php"> Edit</a>

</body>
</html>
