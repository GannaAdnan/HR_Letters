<?php
  
include_once('config.php');
include "DatabaseErrorHandler.php";
session_start();
$msg="";
$errmsg="";

  if (isset($_POST['Submit'])) {

	  $sqlnew="SELECT COUNT(*) as count FROM letters
               WHERE UserID='".$_SESSION['ID']."' AND Status='' ;";

$select=mysqli_query($conn,$sqlnew) ;
if(!$select){
		trigger_error("Error in Database ",E_USER_WARNING);

}
$row = mysqli_fetch_assoc($select);

if($row['count']>=3){
	
	echo "
			<div class='alert alert-warning' style='position:absolute; left:300px; top:180px; padding:20px 70px;'>
                  You Reached Your Maximum Number of Requests Please Wait For a Reply. 
				  Check <strong> My Requests </strong> Page for reply
                   </div>
				   
				 ";	 
}
	  else{
		  //image name
  	$image = $_FILES['image']['name'];

  	$path = "Photos/".basename($image);
	
    $sql1="INSERT into letters(LetterType,Salary,Priority,UserID)
	values ('".$_POST['Ltype']."' , '".$_POST['salary']."' , '".$_POST['priority']."', '".$_SESSION['ID']."');";	

	$sql="INSERT into documents (LetterType,Document,UserID)
		values ('".$_POST['Ltype']."' , '$image', '".$_SESSION['ID']."');";  	
	
	
         

  	if (move_uploaded_file($_FILES['image']['tmp_name'], $path)) {
  		$msg="Image uploaded successfully";
		$result=mysqli_query($conn,$sql) ;

		if (!$result){
				trigger_error("Error in Database ",E_USER_WARNING);

		}
		
		if($errmsg != "Please upload a copy from your National ID or Passport"){
	   $result2=mysqli_query($conn,$sql1) ;
        if($result2){
	  
	  		echo "
			<div class='alert alert-success' style='position:absolute; left:400px; top:180px; padding:20px 70px;'>
                  <strong>Success!</strong>Your Request is Successfully Submitted.
                   </div>
				   
				 ";	 
              	header("refresh:2;url=home.php");
		 
  }
  else {trigger_error("Error in Database ",E_USER_WARNING);}
  
  }
  	}
	else{
  		$errmsg ="Please upload a copy from your National ID or Passport";
  	}
  }

  }
  
  
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
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

			.req{
			  border-radius: 5px;
			  background-color: black;
			  padding: 20px;
			  width:40%;
			  margin :250px 0px 0px 400px;
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
<?php
	include "basehome.php";
	?>


<div class="req" id="req">

  <form id=reqform  action="" method="post" enctype="multipart/form-data">
<h2> Request Form </h2>
    <label for="Ltype"style='color:white;'> Letter Type</label>
    <select id="Ltype" name="Ltype">
      <option value="Embassy">Embassy</option>
      <option value="Hospital">Hospital</option>
	  <option value="Bank">Bank</option>
	  <option value="General">General</option>


      
    </select>
	
	<label for="priority"style='color:white;'>Priority</label>
    <select id="priority" name="priority">
      <option value="Urgent">Urgent</option>
      <option value="Non-Urgent">Non-Urgent</option>
	  
      
    </select>
	
	<label for="salary"style='color:white;'>Salary</label>
    <select id="salary" name="salary">
      <option value="With Salary">With Salary</option>
      <option value="Without Salary">Without Salary</option>
	
      
    </select>


    <input type="file" name="image" >
	<div id="msg" style="color:green;" >  <?php echo $msg; ?> </div>
		<div id="msg" style="color:red;" >  <?php echo $errmsg; ?> </div>


  
    <input type="submit" value="Submit" name="Submit">
  </form>
</div>



</body>
</html>