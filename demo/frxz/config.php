<?php
 session_start();
 $server='localhost';
 $username='root';
 $password='';
 $database='app_frxz';
 $conn=mysql_connect($server,$username,$password)
 or die("无法连接mysql");
 mysql_select_db($database)
 or die("无法打开mysql");
 mysql_query("SET NAMES 'UTF8'"); 
 mysql_query("SET CHARACTER SET UTF8"); 
 mysql_query("SET CHARACTER_SET_RESULTS=UTF8'");
 function filter($url) {
	return filter_var($url,FILTER_SANITIZE_SPECIAL_CHARS);
 }

?>
<?php
//exit;
//session_start();
//$server = SAE_MYSQL_HOST_M;
//$port = SAE_MYSQL_PORT;
//$username = SAE_MYSQL_USER;
//$password = SAE_MYSQL_PASS;
//$database = SAE_MYSQL_DB;
//$conn = mysql_connect($server.':'.$port, $username, $password)
//or die("无法连接mysql");
//mysql_select_db($database)
//or die("无法打开mysql");
//mysql_query("SET NAMES 'UTF8'"); 
//mysql_query("SET CHARACTER SET UTF8"); 
//mysql_query("SET CHARACTER_SET_RESULTS=UTF8'");
//function filter($url)
//{
	//return filter_var($url,FILTER_SANITIZE_SPECIAL_CHARS);
//}

?>
