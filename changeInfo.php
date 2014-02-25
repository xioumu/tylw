<?php
include("config.php");
include("myFunction.php");
if (isset($_POST['role']) && isset($_POST['type'])) {
    if ($_POST['role'] == 'web-admin') {
        judgeUser(array('web'));
        if ($_POST['type'] == 'stu') { //修改学生信息
            $judgeYear = getJudgeYear();
            $deadLine = changeData($_POST['deadLine']);
            $typeID = $_POST['sType'];
            if (mysql_query("UPDATE student SET sName='{$_POST['sName']}', grade='{$_POST['grade']}',
                              sex='{$_POST['sex']}', typeID='{$typeID}', subject='{$_POST['subject']}',
                              tutor='{$_POST['tutor']}', IDcard='{$_POST['IDcard']}', SdeadLine='{$deadLine}',
                               repeatRate='{$_POST['repeatRate']}'
                               WHERE studentID = '{$_POST['studentID']}'")) {
                if ($deadLine == 'null') {
                    mysql_query("UPDATE student SET  SdeadLine={$deadLine} WHERE studentID = '{$_POST['studentID']}'");
                }
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
            if (mysql_query("UPDATE teacheronside SET tName='{$_POST['tName']}',
                              sex='{$_POST['sex']}',subject='{$_POST['subject']}',
                              research='{$_POST['research']}', TdeadLine='{$deadLine}'
                               WHERE teacherID = '{$_POST['teacherID']}'")) {
                if ($deadLine == 'null') {
                    mysql_query("UPDATE student SET  TdeadLine={$deadLine} WHERE teacherID = '{$_POST['teacherID']}'");
                }
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