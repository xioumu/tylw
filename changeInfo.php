<?php
include("config.php");
include("myFunction.php");

if (isset($_POST['role']) && isset($_POST['type'])) {
    if ($_POST['role'] == 'web-admin') {
        $judgeYear = getJudgeYear();
        $deadLine = changeData($_POST['deadLine']);
        if ($_POST['type'] == 'stu') { //修改学生信息
            $typeID = $_POST['sType'];
            if (mysql_query("UPDATE student SET sName='{$_POST['sName']}', grade='{$_POST['grade']}',
                              sex='{$_POST['sex']}', typeID='{$typeID}', subject='{$_POST['subject']}',
                              tutor='{$_POST['tutor']}', IDcard='{$_POST['IDcard']}', SdeadLine='{$deadLine}',
                               status='{$_POST['status']}'
                               WHERE studentID = '{$_POST['studentID']}'")) {
                if ($deadLine == 'null') {
                    mysql_query("UPDATE student SET  SdeadLine={$deadLine} WHERE studentID = '{$_POST['studentID']}'");
                }
                echo "ok";
            }
            else echo "database error!";
        }
        else if ($_POST['type'] == 'onTea') { //修改校内专家信息
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
    }
}
?>