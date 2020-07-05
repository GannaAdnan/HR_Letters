<html>
<head>
<style>
<style>
		            

					
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
<script>
	function write_row(id , lettertype)
    {
        $.ajax
                ({
                    type: 'post',
                    url: 'writeletters.php',
                    data: {
                        write_row: 'write_row',
                        row_id: id,
						LT:lettertype
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

<script src="https://code.jquery.com/jquery-latest.js"></script>
<link rel="shortcut icon" href="Photos/hrlogo.png" />

</head>
<body>
<div id='reqhr'>
				<h3 style="font-size: 35px;font-family:'Raleway';font-style:bold;  float:center; margin: 200px 0px 50px 150px;"><b>Approved Letters</b></h3>


<?php
session_start();
include_once "config.php";
include "DatabaseErrorHandler.php";

	$sql=" Select letters.UserID,letters.LetterType,letters.Priority,letters.Status,documents.Document,letters.Salary,letters.Status, user.Fname ,user.Lname
		from letters 
		inner join user 
		on letters.UserID = user.ID
	    inner join documents
		on letters.UserID=documents.UserID
		Where letters.Status='Approved'
		group by UserID,LetterType
		
		";
		
$select = mysqli_query($conn, $sql) ;
if (!$select){
		trigger_error("Error in Database ",E_USER_WARNING);

}
?>
<table  style="width:95%; margin-left:30px;  "   class="table table-hover table table-bordered table table-stripe">
    <tr>
	    <th>First Name</th>
	    <th>Last Name</th>
        <th>User ID</th>
		<th>Letter Type</th>
		<th>Priority</th>
		<th>Salary</th>
		<th>Document</th>

			
			<th>Status</th>
       
    </tr>
    <?php
    while ($row = mysqli_fetch_assoc($select)) 
    { 
    ?>
	
        <tr id="row<?php echo $row['UserID']; ?>">
		    <td id="First Name"><?php echo $row['Fname']; ?></td>
		    <td id="Last Name"><?php echo $row['Lname']; ?></td>
            <td id="userid"><?php echo $row['UserID']; ?></td>
            <td id="letter"><?php echo $row['LetterType']; ?></td>
	        <td id="priority"><?php echo $row['Priority']; ?></td>
		   <td id="salary"><?php echo $row['Salary']; ?></td>

            <td><a href="<?php echo "Photos/".$row['Document']; ?>" onclick="window.open(this.href); return false;">View Document</a></td>

		




            <td>
                <input type='button' class="write_button" id="insert_button" value="Write" onclick="write_row('<?php echo $row['UserID']; ?>' ,'<?php echo $row['LetterType']; ?>');">
				</td>
			
        </tr>
    <?php
    }
	include'basehome.php';
    ?>
   
</table>



</div>

<div id="bootclass" class='alert alert-success' style='position:absolute; display:none; left:500px; top:150px; padding:20px 70px;'>
                  <strong>Success!</strong> Approved
                   </div>
</body>
</html>