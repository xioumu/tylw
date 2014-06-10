<?php
include("config.php");
include("myFunction.php");

function dealDataline($val) {
    if ($val != 'null') return '\'' . $val . '\'';
    else return $val;
}

if (isset($_POST['role']) && isset($_POST['type'])) {
    if ($_POST['role'] == 'web-admin') {
        judgeUser(array('web'));
        if ($_POST['type'] == 'stu') { //修改学生信息
            $judgeYear = getJudgeYear();
            $papDeadline = changeData($_POST['papDeadline']);
            $repDeadline = changeData($_POST['repDeadline']);
            $papDeadline = dealDataline($papDeadline);
            $repDeadline = dealDataline($repDeadline);
            $typeID = $_POST['sType'];
            if (!empty($_POST['repeatRate']) || $_POST['repeatRate'] == '0') {
                $repeatRate = '\'' . $_POST['repeatRate'] . '\'';
            }
            else $repeatRate = 'null';
            if (mysql_query("UPDATE student SET sName='{$_POST['sName']}', grade='{$_POST['grade']}',
                              sex='{$_POST['sex']}', typeID='{$typeID}', subject='{$_POST['subject']}',
                              tutor='{$_POST['tutor']}', IDcard='{$_POST['IDcard']}', repDeadline={$repDeadline},
                              papDeadline={$papDeadline}, repeatRate={$repeatRate}, major='{$_POST['major']}'
                               WHERE studentID = '{$_POST['studentID']}'")) {
                echo "ok";
            }
            else {
             //   echo "UPDATE student SET sName='{$_POST['sName']}', grade='{$_POST['grade']}',
             //                sex='{$_POST['sex']}', typeID='{$typeID}', subject='{$_POST['subject']}',
             //               tutor='{$_POST['tutor']}', IDcard='{$_POST['IDcard']}', SdeadLine='{$deadLine}',
             //               repeatRate={$_POST['repeatRate']}
             //              WHERE studentID = '{$_POST['studentID']}'";
                echo "database error!";
            }
        }
        else if ($_POST['type'] == 'onTea') { //修改校内专家信息
            $judgeYear = getJudgeYear();
            $deadLine = changeData($_POST['deadLine']);
            $deadLine = dealDataline($deadLine);
            if (mysql_query("UPDATE teacheronside SET tName='{$_POST['tName']}',
                              sex='{$_POST['sex']}',subject='{$_POST['subject']}',
                              research='{$_POST['research']}', TdeadLine={$deadLine}
                               WHERE teacherID = '{$_POST['teacherID']}'")) {
                echo "ok";
            }
            else echo "database error!";
        }
        else if ($_POST['type'] == 'sec') { //修改教学秘书信息
            if (mysql_query("UPDATE secretary SET major='{$_POST['major']}'
                               WHERE  userID ='{$_POST['user']}'")) {
                echo "ok";
            }
            else echo "database error!";
        }
        else if ($_POST['type'] == 'eva' && isset($_POST['teacherID']) && isset($_POST['eid']) && isset($_POST['studentID'])) {
            if (mysql_query("UPDATE evaluating SET teacherID='{$_POST['teacherID']}', studentID='{$_POST['studentID']}' WHERE eid='{$_POST['eid']}'")) {
                goBack("修改成功","web-admin-eva-manage.php");
            }
            else echo "database error!";
        }
    }
}
?>