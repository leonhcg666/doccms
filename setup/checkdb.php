<?php
$dbhost = $_REQUEST['dbhost'];
$uname  = $_REQUEST['uname'];
$pwd	= $_REQUEST['pwd'];
$dbname	= $_REQUEST['dbname'];
if($_GET['action']=="chkdb"){
	$con = @mysqli_connect($dbhost,$uname,$pwd);
	if (!$con){
		die('-1');
	}
	$rs = mysqli_query($con,'show databases;');
	while($row = mysqli_fetch_assoc($rs)){
		$data[] = $row['Database'];
	}
	unset($rs, $row);
	mysqli_close($con);
	if (in_array(strtolower($dbname), $data)){
		echo '1';
	}else{
	   echo '0';
	}
}elseif($_GET['action']=="creatdb"){
	if(!$dbname){
		die('0');
	}
	$con = @mysqli_connect($dbhost,$uname,$pwd);
	if (!$con){
		die('-1');
	}
	if (mysqli_query($con,"CREATE DATABASE {$dbname} DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci")){
	  echo "1";
	}else{
	  echo mysqli_error($con);
	}
	mysqli_close($con);
}
exit;
?>