<?php
include("config.php");
include("myFunction.php");
judgeUser(array('web'));
//添加学生描述
function addStuInfo($row) {
    $typeId = getStuTypeId($row['G']);
    if (mysql_query("INSERT INTO student (grade, studentID, sName, sex, major, subject, typeID, IDcard,tutor)
                      VALUES ('{$row['A']}', '{$row['B']}', '{$row['C']}', '{$row['D']}', '{$row['E']}', '{$row['F']}', '{$typeId}', '{$row['H']}','{$row['I']}')")
    ) {
        return true;
    }
    else {
        //echo "INSERT INTO student (grade, studentID, sName, sex, major, subject, typeID, IDcard,tutor)
        //              VALUES ('{$row['A']}', '{$row['B']}', '{$row['C']}', '{$row['D']}', '{$row['E']}', '{$row['F']}', '{$typeId}', '{$row['G']}','{$row['H']}', '{$row['I']}')";
        return false;
    }
}

//添加校内专家描述
function addOnTeaInfo($row) {
    if (mysql_query("INSERT INTO teacheronside (teacherID, tName, sex, subject, research)
                      VALUES ('{$row['A']}', '{$row['B']}', '{$row['C']}', '{$row['D']}', '{$row['E']}')")
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
            $passwd = $row['B'];//getRand();
            if (!addUser($row['B'], $passwd, "stu")) {
                echo "add user error!";
            }
            if (!addStuInfo($row)) {
                echo "add student error!";
            }
        }
        echo "<script>alert('导入成功!'); self.location='web-admin-student-manage.php';</script>";
        //记得删除临时EXL文件
        unlink($filePath);
    }
    else if ($_POST['type'] == 'onTea') {
        $filePath = 'upFile/exl/' . $_POST['file'];
        $data = getExl($filePath);
        foreach ($data as $row) {
            $passwd = getRand();
            if (!addUser($row['A'], $passwd, "onTea")) {
                echo "add user error!";
            }
            if (!addOnTeaInfo($row)) {
                echo "add OnTeacher error!";
            }
        }
        unlink($filePath);
        //记得删除临时EXL文件
        echo "<script>alert('导入成功!'); self.location='web-admin-OnTeacher-manage.php';</script>";
    }
}
else echo "no post!";
?>