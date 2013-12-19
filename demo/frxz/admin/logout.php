<?php
header("Content-Type: text/html;charset=utf-8");
include("config.php");
unset($_SESSION['is_login']);
unset($_SESSION['name']);
unset($_SESSION['is_admin']);
session_destroy();
echo "<script>window.location.href='index.html';</script>";
?>