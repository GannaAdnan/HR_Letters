<?php
session_start();
include_once "config.php";
?>
<html>
<head>

<script>

 function edit_row(Lettertypename)
    {
     var lt=document.getElementById("lettertype"+Lettertypename).innerHTML;
     var p=document.getElementById("priority"+Lettertypename).innerHTML;
     var s=document.getElementById("salary"+Lettertypename).innerHTML;

	   document.getElementById("lettertype"+Lettertypename).innerHTML="<select id='Ltypenew"+Lettertypename+ "' name='Ltype' > <option value="+lt+">"+lt+"</option> <option value='Embassy'>Embassy</option> <option value='Hospital'>Hospital</option> <option value='Bank'>Bank</option> <option value='General'>General</option></select>";
       document.getElementById("priority"+Lettertypename).innerHTML="<select id='prioritynew"+Lettertypename+ "' name='priority' > <option value="+p+">"+p+"</option> <option value='Urgent'>Urgent</option> <option value='Non-Urgent'>Non-Urgent</option> </select>";
       document.getElementById("salary"+Lettertypename).innerHTML="<select id='salarynew"+Lettertypename+"' name='salary' > <option value="+s+">"+s+"</option> <option value='With Salary'>With Salary</option> <option value='Without Salary'>Without Salary</option></select>";


                document.getElementById("edit_button" + Lettertypename).style.display = "none";
                document.getElementById("save_button" + Lettertypename).style.display = "block";
            }

    function save_row(Lettertypename,pri)
    {
       
        var LetterType = document.getElementById("Ltypenew" + Lettertypename).value;
        var Priority = document.getElementById("prioritynew" + Lettertypename).value;
		var Salary = document.getElementById("salarynew" + Lettertypename).value;


        $.ajax
                ({
                    type: 'post',
                    url: 'MyRequestsClientAJAX.php',
                    data: {
                        edit_row: 'edit_row',
                        ltid: Lettertypename,
						priid:pri,
						lt:LetterType,
						p : Priority,
                        s : Salary,
						
						
                    },
                    success: function (response) {
                        if (response == "success")
                        {
                            document.getElementById("lettertype" + Lettertypename).innerHTML = LetterType;
                            document.getElementById("priority" + Lettertypename).innerHTML = Priority;
						    document.getElementById("salary" + Lettertypename).innerHTML = Salary;

                            document.getElementById("edit_button" + Lettertypename).style.display = "block";
                            document.getElementById("save_button" + Lettertypename).style.display = "none";
                        }
                    }
                });
    }



  function delete_row(id,lt,pri)
    {  
	
	          $.ajax
                ({
                    type: 'post',
                    url: 'MyRequestsClientAJAX.php',
                    data: {
                        delete_row: 'delete_row',
						row_id:id,
                        priid: pri,
						lt:lt
                    },
                    success: function (response) {
                        if (response == "success")
                        {
                            var row = document.getElementById("row" + lt);
                            row.parentNode.removeChild(row);
                        }
                    }
                });
   
		

    }
	 
</script>


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


</head>
<body>
<div id='reqhr'>
			<h3 style="font-size: 35px;font-family:'Raleway';font-style:bold; padding:20px;  float:center; margin: 150px 0px 0px 150px;">My Requests</h3>
<div id="bootclass" class='alert alert-info' style='position:absolute; display:block; left:500px; top:150px; padding:20px 70px;'>
                 If you cannot find your request, it means it has been <strong>rejected </strong>
                   </div>
<?php

$select = mysqli_query($conn, "SELECT * FROM letters where UserID = '".$_SESSION['ID']."' ") ;

include "DatabaseErrorHandler.php";

if(!$select){
	trigger_error("Error in Database ",E_USER_WARNING);
} 

?>
<table  style="width:95%; margin-left:30px;  "   class="table table-hover table table-bordered table table-stripe">
    <tr>
        
		<th>Letter Type</th>
			<th>Priority</th>
			<th>Salary</th>
			<th>The Letter</th>
			
			
       
    </tr>
    <?php
    while ($row = mysqli_fetch_assoc($select)) 
    {
    ?>
        <tr id="row<?php echo $row['LetterType']; ?>">
	    <td id="lettertype<?php echo $row['LetterType']; ?>"><?php echo $row['LetterType']; ?></td>
		<td id="priority<?php echo $row['LetterType']; ?>"><?php echo $row['Priority']; ?></td>
	    <td id="salary<?php echo $row['LetterType']; ?>"><?php echo $row['Salary']; ?></td>
	
    	<?php if ($row['Status'] =="") { ?>
	    <td id="status"> No Response Yet </td>
           
		<td>  <input type='button' class="delete_button" id="dl"	value="Delete" onclick="delete_row('<?php echo $row['UserID']; ?>','<?php echo $row['LetterType']; ?>','<?php echo $row['Priority']; ?>');">
              <input type='button' class="edit_button" id="edit_button<?php echo $row['LetterType']; ?>" value="edit" onclick="edit_row('<?php echo $row['LetterType']; ?>');">
              <input type='button' style="display:none;" class="save_button" id="save_button<?php echo $row['LetterType']; ?>" value="save" onclick="save_row('<?php echo $row['LetterType']; ?>','<?php echo $row['Priority']; ?>');">
                
        </td>

       <?php
		} else if(($row['Status'] =="Approved")) {
		?>
		
		<td id="status"> Approved and will be Uploaded Soon </td>
		
        <?php } else if (($row['Status'] =="Written")){ ?>
		  <td><a href="<?php echo "Files/".$row['HRLetter']; ?>" onclick="window.open(this.href); return false;">View Document</a></td>
		  

		<?php } ?>
        </tr>
    <?php
    }
	include'basehome.php';
    ?>
   
</table>
</div>







</body>
</html>