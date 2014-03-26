<?php
include("config.php");
include("myFunction.php");

function delRecEva($evaId, $judgeInfo) {
    mysql_query("DELETE FROM record_evaluating WHERE eid = '{$evaId}' AND judgeYear = '{$judgeInfo}'") or die(mysql_error());
    return true;
}

function delRecStuEva($user, $judgeInfo) {
    mysql_query("DELETE FROM record_evaluating WHERE studentID = '{$user}' AND judgeYear = '{$judgeInfo}'") or die(mysql_error());
    return true;
}

function delRecStu($user, $judgeInfo) {
    mysql_query("DELETE FROM record_student WHERE studentID = '{$user}' AND judgeYear = '{$judgeInfo}'") or die(mysql_error());
    return true;
}


if (!isset($_POST['type'])) echo "no type!";
if ($_POST['type'] == 'web-admin') {
    judgeUser(array("web"));
    //删除全部学生记录
    if (!empty($_POST['object'])) {
        $flag = true;
        $judgeInfo = $_POST['object'];
        $allStuInfo = getAllRecStuInfo($judgeInfo);
        foreach ($allStuInfo as $stuInfo) {
            if (!delRecStuEva($stuInfo['studentID'], $stuInfo['judgeYear'])) $flag = false;
            else delRecStu($stuInfo['studentID'], $stuInfo['judgeYear']);
        }
        if ($flag) echo "ok";
        else echo "error1";
    }
}
?>
