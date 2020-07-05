<html>
<head>
	<title></title>
	<?php  
	include "basehome.php";
	session_start();
	?>
	<style>  
 input[type=text], select {
  width: 60%;
  padding: 12px 20px;
  margin: 150px 0px 0px 200px;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
  font-family:'Raleway';
  
  
}</style>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script type="text/javascript">
		function getResult(){
			jQuery.ajax({
				url: "serch.php",
				data: "term="+$("#term").val(),
				type: "POST",
				success: function(data2){
					$("#result").html(data2);
				}
			});
		}
	</script>
</head>
<body>
<input type="text" onkeyup="getResult();" name="term" id="term" placeholder="Search.."><br><br><br>
<div id="result"></div>
</body>
</html>
