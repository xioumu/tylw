<?php
$server = 'localhost';
$username = 'root';
$password = '11';
$database = 'tylw';
$conn = mysql_connect($server, $username, $password) or die("Cann't open mysql");
mysql_query("SET NAMES 'utf8'");
mysql_select_db($database, $conn) or die("Cann't open database");
header("Content-Type: text/html;charset=utf-8");

//error_reporting(0);
if (!isset($_SESSION)) {
    session_start();
}

?>
