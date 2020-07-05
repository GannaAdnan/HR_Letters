<html>



<head>
		<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
			






<style>
body {
  background: url("Photos/sidedesign.png") right  no-repeat,url("Photos/background.png") left  no-repeat ; 
  background-size: 25%, 6000px;  
 
}



.botnav {
	margin: 1200px 0px 0px 0px;
	padding:100px;
    overflow: hidden;
    background-color: black;
    position: absolute;
    width: 100%;
	left:0;
	color:white;
	
	
} 

.topnav
{
	
  position:fixed; TOP:10px;  WIDTH:80%; LEFT:230px; 
  background-color:black;
  overflow:hidden;
  
 
}

.topnav a
{
 
  float:left;
  display:block;
  text-align:center;
  padding:20px 24px;
  text-decoration: none;
  color: white;
  font-size:20px;
  display:block;
  font-family:'Raleway';
}
.topnav #reg,#log,#prof,#signout,#qc
{
  background-color: #66cccc ;
  border: 4px ; 
  float:right;
  display:block;
  text-align:center;
  padding:20px 24px;
  text-decoration:none;
  color: white;
  font-size:20px;
  display:block;
  font-family:'Raleway';
}
.topnav a:hover
{
  background-color:#66cccc;
  color:white;

}

.topnav #reg:hover ,#log:hover,#prof:hover,#signout:hover,#qc:hover
{
  background-color:black;
  color:white;

}
.container {
  display: block;
  position: relative;
  padding-left: 35px;
  margin-bottom: 12px;
  cursor: pointer;
  font-size: 22px;
  /* -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none; */
}









</style>

<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
<link rel="shortcut icon" href="Photos/hrlogo.png" />

<title>HR</title>
</head>









<body>

<IMG STYLE="position:absolute; TOP:10px; LEFT:40px; WIDTH:150px; HEIGHT:130px" SRC="Photos/hrlogo.png">





<div class="topnav" id="myTopnav">
<?php
          
	
          
				if(!empty($_SESSION['ID']) ) 
				{    
			if($_SESSION['DepName']=="HR" ){
					echo"<a href='Home.php'>Home</a>";
					echo"<a href='heelp.php'>Help</a>";

					echo"<a id=users href='MyProfile.php' >My Profile</a>";
			    	echo"<a id=prof href='ajaxRequestLetterHR.php' >Letters Requests</a>";
					echo"<a id=signout href='AllUsersHR.php' >Users</a>";
					echo"<a id=prof href='approvedletters.php' >Approved Letters</a>";
					echo"<a id=prof href='ajaxRequestHR.php' >Users Requests</a>";
					echo"<a id=users href='SignOut.php' >SignOut</a>";
					
					}
			else if ($_SESSION['DepName']=="QC"){
				
				
				echo"<a href='Home.php'>Home</a>";
					echo"<a id=qc href='QCc.php' >Letter Requests</a>";
					echo"<a id=prof href='MyProfile.php' >My Profile</a>";
					echo"<a id=signout href='SignOut.php' >SignOut</a>";
					echo"<a id=users href='AllUsersHR.php' >Users</a>";

				
			}
				else{
				
				
				echo"<a href='Home.php'>Home</a>";
				echo"<a href='helpempp.php'>Help</a>";

				echo "<a href='MyRequestsClient.php'>My Requests</a>";
				echo"<a id=prof href='MyProfile.php' >My Profile</a>";
				echo"<a id=prof href='RequestClient.php' >Request</a>";
					
				echo"<a id=signout href='SignOut.php' >SignOut</a>";
				
			}
				}
				else
				{
					echo"<a href='Home.php'>Home</a>";
					echo"<a id=log href='Login.php'>Login</a>";
					echo"<a id=reg href='register.php'>SignUp</a>";
				}
				?>

</div>





</div>






<div class="botnav" id="myBotnav">

<div class="container">
 <div class="row justify-content-center">

    <div class="col-sm-4" >
    <b>  Content</b>
    </div>
    <div class="col-sm-4">
    <b> Contact us</b>
    </div>
     <div class="col-sm-4" >
    <b> Client support</b>
    </div>
  </div>


 <div class="row justify-content-center">
	    <div class="col-sm-4" >
	 <a href="Home.php">Home</a>
	    </div>
	   <div class="col-sm-4" >
	   Nasr city,Cairo
	    </div>
	   <div class="col-sm-4" >
	   Help
	    </div>
	  </div>

 <div class="row justify-content-center">
				<div class="col-sm-4" >
		<a href="register.php">sign up</a>
				</div>
				<div class="col-sm-4" >
		land line: 45378086
				</div>
<div class="col-sm-4" >
			suggestions
				</div>
			</div>

			<div class="row justify-content-center">
		 			<div class="col-sm-4" >
		 	<a href="Login.php">log in</a>
		 				</div>
		 			<div class="col-sm-4" >
		 email: HR2019@gmail.com
		 				</div>
		 			<div class="col-sm-4" >
		 	.........
		 				</div>
		 			</div>
</div>
</div>









</body>
</html>