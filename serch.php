<html>
<head>
</head>
<body>
<?php 

include_once 'config.php';
include 'basehome.php';
session_start();

$sql = "SELECT help.Questions, help.Answers FROM help ";
if(isset($_POST['term'])){
$term = $_POST['term'];
if (!empty($term)) {
	$sql = $sql . " WHERE Questions LIKE '%$term%' OR Answers LIKE '%$term%'";
}?>
<table align="center" style="width:95%; margin-left:30px;  "   class="table table-hover table table-bordered table table-stripe">
		<tr><th>Question</th>
		<th>Answer</th></tr>
		<?php
		
if ($result = mysqli_query($conn,$sql)) {
	if (mysqli_num_rows($result) > 0) {
		while ($row = mysqli_fetch_array($result)) {
			echo "<tr><td>" . $row[0] . "</td><td>" . $row[1] . "</td></tr>" ;
		}
	}
	else {
		echo "<tr><td>No results found.</td></tr>";
	}
}
else {
	echo "<tr><td>Error could not execute $sql." . mysqli_error($conn). "</td></tr>";
}
echo "</table>";		
}
?>
</body>
</html>