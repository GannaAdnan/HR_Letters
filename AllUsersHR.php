<html>
<head>
<style>
<style>


		            table { 
					      padding: 25px 90px 800px 250px;
						  width:60%;
						  margin: 50px 0px 0px 100px;
						  font-family: 'Raleway';
						  border-collapse: collapse;
					      border-radius: 5px;
						  font-color:white;
						  
						}

						td, th {
							font-color:white;
						
						  border: 3px solid black;
						  text-align: left;
						  padding: 10px;
						}
					
					tr:hover {background-color: #66cccc ;}
					

					input[type=button] {
			  width: 45%;
			  background-color: #66cccc;
			  color: white;
			  padding: 10px 20px;
			  margin: 20px 55px ;
			  border: none;
			  border-radius: 4px;
			  cursor: pointer;
			  font-family:'Raleway';
			  
			}

					input[type=button]:hover {
					  background-color: #DDA0DD;
					}

</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-latest.js"></script>


<link rel="shortcut icon" href="Photos/hrlogo.png" />
</head>
<body>
<div id='reqhr'>
		<h3 style="font-size: 35px;font-family:'Raleway';font-style:bold;  float:center; margin: 200px 0px 50px 150px;"><b>Users</b></h3>

<?php
session_start();
include_once "config.php";
include "DatabaseErrorHandler.php";

$select = mysqli_query($conn, "SELECT * FROM user where Status='Approved' and DepName <> 'QC' and DepName <> 'HR' ") ;



if(!$select){
	trigger_error("Error in Database ",E_USER_WARNING);
} 

?>
<table align="center" style="width:95%; margin-left:30px;  "   class="table table-hover table table-bordered table table-stripe">
    <tr>
        
		<th>First Name</th>
			<th>Last Name</th>
			<th>ID</th>
			<th>Email</th>
			<th>Address</th>
			<th>Sex</th>
			<th>Phone Number</th>
			<th>Department</th>
       
    </tr>
    <?php
    while ($row = mysqli_fetch_assoc($select)) 
    {
    ?>
        <tr id="row<?php echo $row['ID']; ?>">
            <td id="name"><?php echo $row['Fname']; ?></td>
	        <td id="lname"><?php echo $row['Lname']; ?></td>
		   <td id="id"><?php echo $row['ID']; ?></td>

            <td id="email"><?php echo $row['Email']; ?></td>
			<td id="address"><?php echo $row['Address']; ?></td>
			<td id="sex"><?php echo $row['Sex']; ?></td>
			<td id="phone"><?php echo $row['PhoneNO']; ?></td>
           	<td id="dep"><?php echo $row['DepName']; ?></td>


        </tr>
    <?php
    }
	include'basehome.php';
    ?>
   
</table>
</div>


</body>
</html>