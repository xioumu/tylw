<?php
//SQL注入未防护
include("config.php");
include("myFunction.php");
if (!isset($_POST['type'])) echo "no type!";
else if ($_POST['type'] == 1) {
    if (isset($_POST['user']) && isset($_POST['passwd'])) {
        if (addUser($_POST['user'],$_POST['passwd'],"web")){
            echo "ok";
        }
        else echo "database error!";
    }
    else echo "post error!";
}
?>
