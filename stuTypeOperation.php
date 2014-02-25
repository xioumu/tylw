<?php
include("config.php");
include('myFunction.php');
judgeUser(array('web'));
if (!empty($_POST['type'])) {
    if ($_POST['type'] == 'add') {
        if (!empty($_POST['name']) && !empty($_POST['degree'])) {
            if (mysql_query("INSERT INTO studenttype (typeName, degree) VALUES ('{$_POST['name']}', '{$_POST['degree']}')")) {
                echo "ok";
            }
            else {
                echo "database error";
            }
        }
        else {
            echo $_POST['name'] . " " .  $_POST['degree'];
            echo   "类别名不能为空";
        }
    }
}
?>