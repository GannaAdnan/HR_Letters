<html>
<head>
<style>

			 #edited{ 
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
		  
			input[type=button] 
			{
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

			input[type=button]:hover 
			{
				   background-color: #DDA0DD;
			}

</style>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-latest.js"></script>

<script>

  function delete_row(id)
    {
		
        $.ajax
                ({
                    type: 'post',
                    url: 'editHR.php',
                    data: {
                        delete_row: 'delete_row',
                        row_id: id,
                    },
                    success: function (response) {
                        if (response == "success")
                        {
                            var row = document.getElementById("row" + id);
                            row.parentNode.removeChild(row);
                        }
                    }
                });
    }
	  function insert_row(id,fn,ln,em,ad,ph,s,dep,p)
    {
        $.ajax
                ({
                    type: 'post',
                    url: 'editHR.php',
                    data: {
                        insert_row: 'insert_row',
                        row_id: id,
						fn:fn,
						ln:ln,
						em:em,
						ad:ad,
						ph:ph,
						s:s,
						dep:dep,
						p:p
						
                    },
                    success: function (response) {
                        if (response == "success")
                        {
                            var row = document.getElementById("row" + id);
							row.parentNode.removeChild(row);
							setTimeout(function(){ $("#bootclass").show(); });
							setTimeout(function(){ $("#bootclass").hide(1500); },1000);


								
                        }
                    }
                });
    }
 
</script>
</head>
<body>
<div id='reqhr'>
					<h3 style="font-size: 35px;font-family:'Raleway';font-style:bold;  float:center; margin: 200px 0px 50px 150px;"><b>Users</b></h3>


<?php
session_start();
include_once "config.php";

$select = mysqli_query($conn, "SELECT * FROM edit where Status='edited'  ") or die( mysqli_error($conn));
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
			
			<th colspan=2 style="text-align:center;"> Status</th>
       
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




            <td>
                <input type='button' class="insert_button" id="insert_button" value="Approve" onclick="insert_row('<?php echo $row['ID']; ?>','<?php echo $row['Fname']; ?>','<?php echo $row['Lname']; ?>','<?php echo $row['Email']; ?>','<?php echo $row['Address']; ?>','<?php echo $row['PhoneNO']; ?>','<?php echo $row['Sex']; ?>','<?php echo $row['DepName']; ?>','<?php echo $row['Password']; ?>',);">
				</td>
			<td>  <input type='button' class="delete_button" id="delete_button<?php echo $row['ID']; ?>" value="Reject" onclick="delete_row('<?php echo $row['ID']; ?>');">
            </td>
        </tr>
    <?php
    }
	include'basehome.php';
    ?>
   
</table>
</div>

<div id="bootclass" class='alert alert-success' style='position:absolute; display:none; left:500px; top:120px; padding:20px 70px;'>
                  <strong>Success!</strong> Approved
                   </div>
</body>
</html>