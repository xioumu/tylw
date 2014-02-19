<?php
include("config.php");
include("myFunction.php");

function changeData($old){ //转换日期的格式
    if ($old == null) return 'null';
    $res = explode("/", $old);
    if (count($res) == 1) return $old;
    $month = $res[0];
    $day = $res[1];
    $year = $res[2];
    return $year . "-" . $month . "-" . $day;
}

if (isset($_POST['role']) && isset($_POST['type'])) {
    if ($_POST['role'] == 'web-admin') {
        $judgeYear = getJudgeYear();
        $typeID = $_POST['sType'];
        $deadLine = changeData($_POST['deadLine']);
        if ($_POST['type'] == 'stu') {
            if (mysql_query("UPDATE student SET sName='{$_POST['sName']}', grade='{$_POST['grade']}',
                              sex='{$_POST['sex']}', typeID='{$typeID}', subject='{$_POST['subject']}',
                              tutor='{$_POST['tutor']}', IDcard='{$_POST['IDcard']}', SdeadLine='{$deadLine}',
                               status='{$_POST['status']}'
                               WHERE studentID = '{$_POST['studentID']}' AND judgeDate='{$judgeYear}'")) {
                echo "ok";
            }
            else echo "database error!";
        }
    }
}
?>