<?php
//SQL注入未防护
include("config.php");
include("myFunction.php");
if (!isset($_POST['type'])) echo "no type!";
else if ($_POST['type'] == 1) { //记得加session判断，防止post伪造
    if (isset($_POST['user']) && isset($_POST['passwd'])) {
        if (mysql_query("UPDATE user SET passwd = '{$_POST['passwd']}' WHERE user = '{$_POST['user']}'")) {
            echo "ok";
        }
        else echo "database error!";
    }
    else echo "post error!";
}
else if ($_POST['type'] == 2) {
    if (isset($_POST['user']) && isset($_POST['oldPasswd']) && isset($_POST['newPasswd'])) {
        if (loginCheck($_POST['user'], $_POST['oldPasswd'])) {
            if (mysql_query("UPDATE user SET passwd = '{$_POST['newPasswd']}' WHERE user = '{$_POST['user']}'")) {
                echo "ok";
            }
            else echo "database error!";
        }
        else {
            echo "原密码错误.";
        }
    }
    else echo "post error!";
}
?>