<html>
<body>
<?php
$server = 'localhost';
$username = 'root';
$password = '11';
$database = 'homework';
$conn = mysql_connect($server, $username, $password) or die("Cann't open mysql");
mysql_query("SET NAMES 'UTF8';");
mysql_select_db($database, $conn) or die("Cann't open database");
header("Content-Type: text/html;charset=utf-8");

    mysql_query("UPDATE  se_member SET name = '测试11' ")  or die(mysql_error());
    $que = mysql_query("SELECT name FROM se_member");
    while($row = mysql_fetch_array($que) ) {
        print_r($row);
    }
?>
</body>
</html>
