<?php
//SQL注入未防护
include("config.php");
if (!isset($_POST['type'])) echo "no type!";
else if ($_POST['type'] == 1) {
    if (isset($_POST['user']) && isset($_POST['passwd'])) {
        if (mysql_query("UPDATE user SET passwd = '{$_POST['passwd']}' WHERE user = '{$_POST['user']}'")) {
            echo "ok";
        }
        else echo "database error!";
    }
    else echo "post error!";
}
?>