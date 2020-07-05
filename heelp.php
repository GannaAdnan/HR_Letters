<html lang="en">

<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-latest.js"></script>
<link rel="shortcut icon" href="Photos/hrlogo.png" />

					   

				
	

	<style>
	 body {
  background: url("Photos/sidedesign.png") right  no-repeat,url("Photos/background.png") left  no-repeat ; 
  background-size: 25%, 6000px;  
 
}
	</style>
<style type="text/css">
input.text{
        height: 90px;
		width: 50%;
		background-color:#333333;
		margin-right: 25%;
		margin-left: 25%;
		border:5px solid #66cccc;
		opacity:40px;
		color:white;
		padding:5px;
		text-align:center;
		font-size:20px;
		font-family:'Raleway';
}

input.button{
	    height: 55px;
		width: 20%;
		background-color: #333333;
		margin-left: 30%;
		opacity:40px;
		color:white;
		padding:5px;
		text-align:center;
		font-color:white;
		font-size:20px;
		font-family:'Raleway';
}
input.button1{
	    height: 55px;
		width: 20%;
		background-color: #333333;
		margin-right: 25%;
		opacity:40px;
		color:white;
		padding:5px;
		text-align:center;
		font-color:white;
		font-size:20px;
		font-family:'Raleway';
}

.button{
	background-color: black;
	float: right;
	text-align:center;
	color:white;
	font-size:20px;
	font-family:'Raleway';
	
}

.button1{
	background-color: black;
	margin:0px 50px 0px 860px ;
	text-align:center;
	color:white;
	font-size:20px;
	font-family:'Raleway';
	
}

.rect{
		height: 75px;
		width: 50%;
		//background-color: #2060ac;
		//background-color: #333333;
		background-color:#66cccc;
		margin-right: 25%;
		margin-left: 25%;
		border:5px solid black;
		opacity:40px;
		color:black;
		padding:5px;
		text-align:center;
		font-size:20px;
		font-family:'Raleway';
		
	}

</style>
</head>

<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
</body>

<br><br><br><br><br><br>
<h1 style="text-align:center; font-size:60px">Help page</h1>
<br>
<p style="font-size:40px; text-align:center;">Here are the questions the employees wondered about !!</p><br><br>
<body>
<button id="variable" value='1' style="opacity: 0;"></button>
<?php 
session_start();
include_once "config.php";

$result = mysqli_query($conn, "SELECT QuesID,Questions,Answers FROM help");
while($row = mysqli_fetch_array($result)){ ?>

	        <div class= 'rect' id = 'rect1' method='post'>
	        <p method='post' id="row<?php echo $row['QuesID'];?>" value="<?php echo $row['QuesID']; ?>"> <?php echo $row['Questions'] ?> </p> 
		    <button method='post' class="button" id="delete_button<?php echo $row['QuesID']; ?>"  value="<?php echo $row['QuesID']; ?>" onclick="delete_row('<?php echo $row['QuesID']; ?>')">Delete</button>
			<button method='post' class='button' id="edit_button<?php echo $row['QuesID']; ?>" value="<?php echo $row['QuesID']; ?>" onclick="edit_row('<?php echo $row['QuesID']; ?>')" >Edit</button> 
			<button method='post' class='button' id="answer<?php echo $row['QuesID']; ?>" value="<?php echo $row['QuesID']; ?>" onclick="answer('<?php echo $row['QuesID']; ?>')">Answer </button>
			
	     </div>
		  <br> <input type="text" method='post' class="text" id="edit_text<?php echo $row['QuesID']; ?>" style="display: none;" >
		  <button class="button1" id="close<?php echo $row['QuesID']; ?>" style="display: none;">Save</button>
		  
		  <input type="text" method='post' class="text" id="answer_text<?php echo $row['QuesID']; ?>" style="display: none;" value="<?php echo $row['Answers']; ?>" >
		  <button class="button1" id="save<?php echo $row['QuesID']; ?>" style="display: none;">Save</button>
		  <br>
	  
<?php
 } 
  include_once "basehome.php";
?>



</body>
<head>
<script type='text/javascript'>
	  function delete_row(id)
                 {
               var db=document.getElementById("delete_button"+id);

            $.ajax
                ({
                    type: "post",
                    url: "helpediting.php",
                    data: {
						delid_id: id
                    },
                    success: function (response) {
                        if (response == "success")
                        {   
                            var row = document.getElementById("row" + id);
						  row.parentNode.style.display="none";
						  
							alert('success');
                        }
                    }
                });
          }
		  
		  function edit_row(id)
                 {
					 var del=document.getElementById("delete_button" + id);
					 var edit=document.getElementById("edit_button" + id);
					 var edittext=document.getElementById("edit_text"+id);
					 var answer=document.getElementById("answer" + id);
					 var close=document.getElementById("close" + id);
					 
					
					
					 
					 $(del).css("display", "none");
			         $(edit).css("display", "none");
					 $(answer).css("display", "none");
					 $(close).css("display", "block");
					 $(edittext).css("display", "block");
					 
					 //close=save
			$(close).click(function(){	
			    var e=$("#edit_text"+id).val();
				$(del).css("display", "block");
			    $(edit).css("display", "block");
			    $(answer).css("display", "block");
				$(close).css("display", "none");
				$(edittext).css("display", "none");
				 if(e!=""){
				 $.ajax
                       ({
                    type: "post",
                    url: "helpediting.php",
                    data: {
						newedit :e,
						editid_id: id
                    },
                    success: function (response) {
                        if (response == "success")
                        {   
							alert('success');
                        }
                    }
                });
				}
					 });
			

          }
		  function answer(id){
			    var del=document.getElementById("delete_button" + id);
			    var edit=document.getElementById("edit_button" + id);
				var answertext=document.getElementById("answer_text"+id);
			    var answer=document.getElementById("answer" + id);
				var save=document.getElementById("save" + id);
					
				$(del).css("display", "none");
			    $(edit).css("display", "none");
				$(answer).css("display", "none");
				$(save).css("display", "block");
				$(answertext).css("display", "block");
			$(save).click(function(){	
			      var ans=$("#answer_text"+id).val();
				  $(del).css("display", "block");
			      $(edit).css("display", "block");
			      $(answer).css("display", "block");
				  $(save).css("display", "none");
				  $(answertext).css("display", "none");
				 if(ans!=""){
				 $.ajax
                       ({
                    type: "post",
                    url: "helpediting.php",
                    data: {
						newanswer :ans,
						answerid_id: id
                    },
                    success: function (response) {
                        
							alert('success');
							$("#answer_text"+id).val(response);
                        
                    }
                });
				 }
					 });
			
				
		  }
                       </script>
						
				
</head>
</html>