<?php
function customerror($errno,$errstr){
	$date = date('m/d/Y h:i:s a', time());
	echo "<b>Error:</b> [$errno] $errstr <br>";
	echo "Ending Script";
	error_log("Error at $date in '".$_SERVER['PHP_SELF']."' [$errno] $errstr \n",3,"errorlog.txt");

	die();
}

	set_error_handler("customerror",E_USER_WARNING);

?>