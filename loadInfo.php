<?php
//SQL注入未防护
include("config.php");
include("myFunction.php");

function getRand() {
    $res = "";
    for ($i = 0; $i < 8; $i++) {
        $res .= rand(0, 9);
    }
    return $res;
}

function getTypeId($type) {
    str_replace($type, ' ', '');
    $res = 0;
    $query = mysql_query("SELECT * FROM studenttype WHERE typeName = '{$type}'");
    if ($row = mysql_fetch_array($query)) {
        $res = $row['sid'];
    }
    else echo "get TypeId error!<br/>";
    return $res;
}

function getJudgeYear() {
    $res = -1;
    $query = mysql_query("SELECT * FROM other");
    if ($row = mysql_fetch_array($query)) {
        $res = $row['NowJudgeYear'];
    }
    else echo "get judgeYear error!<br/>";
    return $res;
}

function addStuInfo($row) {
    $typeId = getTypeId($row['F']);
    $nowJudgeYear = getJudgeYear();
    if (mysql_query("INSERT INTO student (grade, studentID, sName, sex, subject, typeID, IDcard,tutor, judgeDate, status)
                      VALUES ('{$row['A']}', '{$row['B']}', '{$row['C']}', '{$row['D']}', '{$row['E']}', '{$typeId}', '{$row['G']}','{$row['H']}', '{$nowJudgeYear}', '未提交论文')")
    ) {
        return true;
    }
    else return false;
}

if (isset($_POST['type']) && isset($_POST['file'])) {
    if ($_POST['type'] == 'stu') {
        $filePath = 'upFile/exl/' . $_POST['file'];
        $data = getExl($filePath);
        foreach ($data as $row) {
            $passwd = getRand();
            if (!addUser($row['B'], $passwd, "stu")) {
                echo "add user error!";
            }
            if (!addStuInfo($row)) {
                echo "add student error!";
            }
            //记得删除临时EXL文件
            echo "ok!";
        }
    }
}
else echo "no post!";
?>