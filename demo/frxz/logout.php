<?php
header("Content-Type: text/html;charset=utf-8");
include("config.php");
$data['status'] = true;
unset($_SESSION['is_login']);
unset($_SESSION['name']);
session_destroy();
echo json_encode($data);
?>