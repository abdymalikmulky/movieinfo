<?php
	ini_set('memory_limit', '-1');
	ini_set('max_execution_time', 0); 
	ini_set('memory_limit','128M');
	
	$dir = $_GET['location'];
	$dh  = opendir($dir);
	$object = new stdClass();
	
	$array = array();
	while (false !== ($filename = readdir($dh))) {
		if($filename!='.' && $filename!='..' && $filename!='desktop.ini'	){
			$array[] =  array("title"=>str_replace(array(chr(145), chr(146), chr(147), chr(148)), "'", $filename));
		}
	}
	echo json_encode($array);
	
	

?>
