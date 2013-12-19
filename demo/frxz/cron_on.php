<?php
header("Content-Type: text/html;charset=utf-8");
include("config.php");
mysql_query("UPDATE frxz_other SET content = 'on' WHERE type = 'vote'");
?>