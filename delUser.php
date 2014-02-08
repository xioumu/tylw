<?php
//SQL注入未防护
include("config.php");
if (!isset($_POST['type'])) echo "no type!";
else if ($_POST['type'] == 1) {
    if (isset($_POST['user'])) {
        if (mysql_query("DELETE FROM user WHERE user = '{$_POST['user']}'")) {
            echo "ok";
        }
        else echo "database error!";
    }
    else echo "post error!";
}
?>
