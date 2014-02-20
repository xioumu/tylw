<?php
//SQL注入未防护
include("config.php");
include("myFunction.php");
function delUser($user) {
    if (mysql_query("DELETE FROM user WHERE user = '{$user}'")) {
        return true;
    }
    else return false;
}
function delStuInfo($user) {
    $year = getJudgeYear();
    if (mysql_query("DELETE FROM student WHERE studentID = '{$user}' AND judgeDate = '{$year}'")) {
        return true;
    }
    else return false;
}
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
else if ($_POST['type'] == 'web-admin') {
    if (isset($_POST['user'])) {
        $user = $_POST['user'];
        $uType = getUserType($user);
        if (!delStuInfo($user)) echo "delete student info error!";
        else if (!delUser($user)) echo "delete user error!";
        else echo "ok";
    }
    else if (isset($_POST['object']) && $_POST['object'] == 'allStu') {
        $flag = true;
        $allStuUser = getAllUser('stu');
        foreach($allStuUser as $user) {
            if (!delStuInfo($user)) {
                echo $user . "delete student info error! <br/>";
                $flag = false;
            }
            else if (!delUser($user)) {
                echo $user . "delete user error! <br/>";
                $flag = false;
            }
        }
        if ($flag) echo "ok";
        else echo "error1";
    }
}
?>
