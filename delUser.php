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

//删除学生信息
function delStuInfo($user) {
    if (mysql_query("DELETE FROM student WHERE studentID = '{$user}'")) {
        return true;
    }
    else return false;
}

//删除校内专家信息
function delOnTeaInfo($user) {
    if (mysql_query("DELETE FROM teacheronside WHERE teacherID = '{$user}'")) {
        return true;
    }
    else return false;
}

if (!isset($_POST['type'])) echo "no type!";
else if ($_POST['type'] == 1) { //系统管理员删除网络管理员账号
    if (isset($_POST['user'])) {
        if (delUser($_POST['user'])) {
            echo "ok";
        }
        else echo "database error!";
    }
    else echo "post error!";
}
//网络管理员部分
else if ($_POST['type'] == 'web-admin') {
    if (isset($_POST['user'])) {
        $user = $_POST['user'];
        $uType = getUserType($user);
        if ($uType == 'stu') {
            if (!delStuInfo($user)) echo "delete student info error!";
            else if (!delUser($user)) echo "delete user error!";
            else echo "ok";
        }
        else if ($uType == 'onTea') {
            if (!delOnTeaInfo($user)) echo "delete onTeacher info error!";
            else if (!delUser($user)) echo "delete user error!";
            else echo "ok";
        }
    }
    //删除全部学生用户
    else if (isset($_POST['object']) && $_POST['object'] == 'allStu') {
        $flag = true;
        $allStuUser = getAllUser('stu');
        foreach ($allStuUser as $user) {
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
    //删除全部校内专家账户
    else if (isset($_POST['object']) && $_POST['object'] == 'allOnTea') {
        $flag = true;
        $allOnTeaUser = getAllUser('onTea');
        foreach ($allOnTeaUser as $user) {
            if (!delOnTeaInfo($user)) {
                echo $user . "delete on teacher info error! <br/>";
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
