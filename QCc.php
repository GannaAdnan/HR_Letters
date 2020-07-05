<html>
	<head>
	
	

	<script type="text/javascript" > 

	
	
	
			   function insert_comment(id,lt)
    {
        var comments = document.getElementById("comments"+id+lt ).value;
        

        $.ajax
                ({
                    type: 'post',
                    url: 'QCajax.php',
                    data: {
                        insert_comment: 'insert_comment',
                        row_id: id,
                        comments: comments,
						lt:lt
                       
                    },
                    success: function (response) {
                        if (response == "success")
                        {
                           alert("saved");
							
                        }
                    }
                });
    }
	</script>
		<style>
			
			input[type=submit]
			    {
						  width: 20%;
						  background-color: #66cccc;
						  color: white;
						  padding: 14px 20px;
						  margin: 20px 0px 0px 450px;
						  border: none;
						  border-radius: 4px;
						  cursor: pointer;
						  font-family:'Raleway';
				}

			input[type=submit]:hover
			    {
					      background-color: #DDA0DD;
				}
		</style>
		<link rel="shortcut icon" href="Photos/hrlogo.png" />
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
		<script src="https://code.jquery.com/jquery-latest.js"></script>
		<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
		<?php
    	include"config.php";
session_start();


?>
	</head>
	<body>
		<div id='reqhr'>
		<h3 style="font-size: 35px;font-family:'Raleway';font-style:bold;  float:center; margin: 200px 0px 50px 150px;"><b>Seen Letters</b></h3>
		<?php
		include"basehome.php";
		include "DatabaseErrorHandler.php";
		$sql=" Select letters.UserID,letters.LetterType,letters.Priority,letters.Salary,letters.Status,letters.QCcomments , user.Fname ,user.Lname
		from letters inner join user 
		on letters.UserID = user.ID
		";	  
		$result=mysqli_query($conn,$sql);
		if(!$result){
			
			trigger_error("Error in Database ",E_USER_WARNING);
		}
		?>
		<table align="center" style="width:75%;  "   class="table table-hover table table-bordered table table-stripe">
			<tr>
			<th>Employee Name</th>
			<th>ID</th>
			<th>Letter Type</th>
			<th>Priority</th>
			<th> Salary</th>
			<th> Status</th>
			<th> Comments</th>
		  </tr>
		  

		  
		 <?php
		 
    while ($row = mysqli_fetch_assoc($result)) 
    {
    ?> 		<form action="" method="post">

        <tr id="row">
            <td id="name"><?php echo $row['Fname'].'&nbsp'.$row['Lname']; ?></td>
	       
		   <td id="ID"><?php echo $row['UserID']; ?></td>

            <td id="type"><?php echo $row['LetterType']; ?></td>
			<td id="pri"> <?php echo $row['Priority']; ?> </td>
			<td id="Salary"><?php echo $row['Salary']; ?></td>
			<td id="Status"><?php echo $row['Status']; ?></td>
			
           	<td><input type='text' id='comments<?php echo $row['UserID']; ?><?php echo $row['LetterType']; ?>' name='comments' value="<?php echo $row['QCcomments']; ?>"/></td>
		   <td> 
		    
		   
	              <input type='button' class="save_button" id="save<?php echo $row['UserID']; ?>" value="save" onclick="insert_comment('<?php echo $row['UserID']; ?>','<?php echo $row['LetterType']; ?>');">

		   </td> 

        </form>
             
             


        
    <?php
		    }
    ?>

	    </tr>
		</table>
	      

		
		</div>
	</body>
</html>