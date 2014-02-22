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
//删除校内专家信息
function delOutTeaInfo($user){
    if (mysql_query("DELETE FROM teacheroutside WHERE userID = '{$user}'")) {
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
else if ($_POST['type'] == 'web-admin') { //网络管理员部分
    if (isset($_POST['user'])) {
        $user = $_POST['user'];
        $uType = getUserType($user);
        if ($uType == 'stu') {
            if (!delEva($user, 'studentID')) echo 'delete evaluating error!';
            else if (!delStuInfo($user)) echo "delete student info error!";
            else if (!delUser($user)) echo "delete user error!";
            else echo "ok";
        }
        else if ($uType == 'onTea') {
            if (!delEva($user, 'teacherID')) echo 'delete evaluating error!';
            else if (!delOnTeaInfo($user)) echo "delete onTeacher info error!";
            else if (!delUser($user)) echo "delete user error!";
            else echo "ok";
        }
        else if ($uType == 'outTea') {
            if (!delEva($user, 'teacherID')) echo 'delete evaluating error!';
            else if (!delOutTeaInfo($user)) echo $user . "delete out teacher info error! <br/>";
            else if (!delUser($user)) echo "delete user error!";
            else echo "ok";
        }
    }
    //删除全部学生用户
    else if (isset($_POST['object']) && $_POST['object'] == 'allStu') {
        $flag = true;
        $allStuUser = getAllUser('stu');
        foreach ($allStuUser as $user) {
            if (!delEva($user, 'studentID')) {
                echo 'delete evaluating error!';
                $flag = false;
            }
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
            if (!delEva($user, 'teacherID')) {
                echo 'delete evaluating error!';
                $flag = false;
            }
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
    else if (isset($_POST['object']) && $_POST['object'] == 'allOutTea') {
        $flag = true;
        $allOnTeaUser = getAllUser('outTea');
        foreach ($allOnTeaUser as $user) {
            if (!delEva($user, 'teacherID')) {
                echo 'delete evaluating error!';
                $flag = false;
            }
            else if (!delOutTeaInfo($user)) {
                echo $user . "delete out teacher info error! <br/>";
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
