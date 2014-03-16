<?php
include("config.php");
include("myFunction.php");
judgeUser(array('web'));

function haveUser($user, $type) {
    $que = "SELECT * FROM ";
    if ($type == 'stu') $que .= 'student ';
    else if ($type == 'onTea') $que .= 'teacheronside ';
    $que .= "WHERE ";
    if ($type == 'stu') $que .= 'studentID ';
    else if ($type == 'onTea') $que .= 'teacherID ';
    $que .= "= {$user}";
    $res = mysql_query($que) or die(mysql_error());
    if (mysql_fetch_array($res)) {
        return true;
    }
    else return false;
}

//添加学生描述
function addStuInfo($row) {
    $typeId = getStuTypeId($row['G']);
    $user = $row['B'];
    if (!haveUser($user, 'stu')) {
        if (mysql_query("INSERT INTO student (grade, studentID, sName, sex, major, subject, typeID, IDcard,tutor)
                     VALUES ('{$row['A']}', '{$row['B']}', '{$row['C']}', '{$row['D']}', '{$row['E']}', '{$row['F']}', '{$typeId}', '{$row['H']}','{$row['I']}')") or die(mysql_error())
        ) {
            return true;
        }
    }
    else if (mysql_query("UPDATE student SET grade = '{$row['A']}', sName = '{$row['C']}', sex = '{$row['D']}', major = '{$row['E']}', subject = '{$row['F']}',
                                typeID = '{$typeId}', IDcard = '{$row['H']}',tutor = '{$row['I']}' WHERE studentID = '{$row['B']}'") or die(mysql_error())
    ) {
        return true;
    }
}

//添加校内专家描述
function addOnTeaInfo($row) {
    $user = $row['A'];
    if (!haveUser($user, 'onTea')) {
        if (mysql_query("INSERT INTO teacheronside (teacherID, tName, sex, subject, research)
                      VALUES ('{$row['A']}', '{$row['B']}', '{$row['C']}', '{$row['D']}', '{$row['E']}')") or die(mysql_error())
        ) {
            return true;
        }
    }
    else {
        if (mysql_query("UPDATE teacheronside SET tName = '{$row['B']}', sex = '{$row['C']}', subject = '{$row['D']}', research = '{$row['E']}' WHERE teacherID = '{$row['A']}'") or die(mysql_error())) {
            //echo "UPDATE teacheronside SET tName = '{$row['B']}', sex = '{$row['C']}', subject = '{$row['D']}', research = '{$row['E']}' WHERE teacherID = '{$row['A']}'";
            return true;
        }
    }
}

if (isset($_POST['type']) && isset($_POST['file'])) {
    if ($_POST['type'] == 'stu') {
        $filePath = 'upFile/exl/' . $_POST['file'];
        $data = getExl($filePath);
        foreach ($data as $row) {
            $passwd = $row['B']; //getRand();
            if (!addUser($row['B'], $passwd, "stu")) {
                //echo "add user error!";
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
                //echo "add user error!";
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