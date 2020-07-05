<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-latest.js"></script>
<link rel="shortcut icon" href="Photos/hrlogo.png" />


<style type="text/css">
#search{ 
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
		
font-family: 'Raleway';}

input.text{
        height: 75px;
		width: 50%;
		background-color: #333333;
		border:5px solid #66cccc;
		margin-right: 25%;
		margin-left: 25%;
		opacity:40px;
		color:white;
		padding:5px;
		text-align:center;
		font-color:white;
		font-size:20px;
		font-family:'Raleway';
}

input.button{
	    height: 55px;
		width: 20%;
		//background-color: #333333;
		background-color:#66cccc;
		border:5px solid black;
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
		//background-color: #333333;
		background-color:#66cccc;
		border:5px solid black;
		margin-right: 25%;
		opacity:40px;
		color:white;
		padding:5px;
		text-align:center;
		font-color:white;
		font-size:20px;
		font-family:'Raleway';
}
.rect{
		height: 75px;
		width: 50%;
		//background-color: #2060ac;
		background-color:#66cccc;
		border:5px solid black;
		margin-right: 25%;
		margin-left: 25%;
		opacity:40px;
		color:white;
		padding:5px;
		text-align:center;
		font-size:20px;
		font-family:'Raleway';
		
	}
	
	.rect2{
		height: 170px;
		width: 50%;
		background-color: #333333;
		//background-color:#66cccc;
		border:5px solid #66cccc;
		margin-right: 25%;
		margin-left: 25%;
		opacity:40px;
		color:white;
		padding:5px;
		text-align:center;
		font-size:20px;
		font-family:'Raleway';
		
	}

	.button3{
	background-color: black;
	margin:0px 100px 0px 300px ;
	text-align:center;
	color:white;
	font-size:20px;
	font-family:'Raleway';
	
}
	
	.button2{
	width:0;
	height: 0;
	border-left: 7px solid #66cccc;
	border-right: 7px solid #66cccc;
	border-top: 10px solid white;
	border-bottom:0	px solid #66cccc;
	float: right;
	//border-radius:10%;
	}
	
.triangle-down{
    width: 0;
	height: 0;
	border-left: 10px solid transparent;
	border-right: 10px solid transparent;
	border-top: 10px solid white;
	float: right;
}
</style>
</head>
<body>
<?php
session_start();

include_once "config.php"; 
$sql="Select * from help ";
$result=mysqli_query($conn,$sql);
?>

<?php
if(isset ($_POST['Submit'])){
	$question=$_POST['question'];
	if(!empty($question)){
//$quesid="Select Count(user.qid) from user ";
$quesid=mysqli_num_rows($result)+1;
$sql="insert into help(QuesID,Questions) values('$quesid','$question')";

$result=mysqli_query($conn,$sql);
	}
}
?>
<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
<br><br><br><br><br><br><h1 style="color:#333333">Confused ? We've got you.</h1>
</body>
<h1 style="text-align:center; font-size:50px;">Help page</h1>
<br>
<p style="font-size:30px; text-align:center;">Here are some questions that might help you!!</p><br>
<body>


<?php 


$sql= "SELECT Questions,QuesID,Answers FROM help WHERE Answers!=''"; 
$result=mysqli_query($conn,$sql);
while($row = mysqli_fetch_array($result)){?>
	 <div class= 'rect' id = "rect1<?php echo $row['QuesID'];?>" >
	<p><?php echo $row['Questions']; ?></p>
	<button class='button2' method='post' id="answer_display<?php echo $row['QuesID']; ?>"  value="<?php echo $row['QuesID']; ?>" onclick="answer_down ('<?php echo $row['QuesID']; ?> ')" <div class='triangle-down'></div></button>
	<div class='rect2' id = "rect<?php echo $row['QuesID']; ?>" style="display: none;">
	</div><button class="button3" id="close <?php echo $row['QuesID'];?>" style="display: none;">Close</button><br>
	</div>
	<br> 
	
	  
<?php
}
include_once "basehome.php";
?>


</body>
<head>
<script type='text/javascript'>
 function answer_down(id){
	     $('#rect' + id).css("display", "block");
	//$('#answer_display' + id).css("display", "none");
	$.ajax
                ({
                    type: "post",
                    url: "helpediting.php",
                    data: {
						qid_id: id,
                    },
                    success: function (response) {
						
							//alert(response);
							//$("#rect1"+id).append(response);

                           $('#rect' + id).html(response);
                    }
	});	
	
				$('#answer_display' + id).click(function(){
					$('#rect' + id).toggle();
				});

}
</script>
</head>

<body>
<form action="" method="post">
  <p style="font-size:40px; text-align:center;">Add your question:</p><br>
  <input type="text" class="text" name="question" id="question"><br> <br>
  <input type="submit" class="button" value="Submit" name="Submit" id="Submit">
  <input type="reset" class="button1" id="Reset">
  <a id='search' href="index.php"> Search</a>
</form>
</body>
</html>