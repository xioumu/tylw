<?php
//SQL注入未防护
include("config.php");
include("myFunction.php");
if (!isset($_POST['type'])) echo "no type!";
else if ($_POST['type'] == 'web-admin') { //网络管理员部分
    judgeUser(array('web'));
    if (isset($_POST['user'])) { //删除一个审评
        if (!delEva($_POST['user'], 'eid')) echo "delete evaluating error!";
        else echo "ok";
    }
    else if(isset($_POST['object']) && $_POST['object'] == 'allEva') {
        if (delAllEva())  echo "ok";
        else echo "delAllEva error";
    }
}
?>
