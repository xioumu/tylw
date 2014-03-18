<?php
include('config.php');
include('myFunction.php');

//更新论文名称
function updataPaperName($user, $paperName) {
    if (!mysql_query("UPDATE student SET paperName = '{$paperName}' WHERE studentID = '{$user}'")) {
        echo "updata paper name error!<br>";
        return false;
    }
    $info = getStuInfo($user);
    if ($info['paperNum'] == "") {
        $lastNum = getOtherInfo()['lastPaperNum'];
        $lastNum++;
        if (!mysql_query("UPDATE student SET paperNum = '{$lastNum}' WHERE studentID = '{$user}'")) {
            echo "updata paper name error!<br>";
            return false;
        }
        mysql_query("UPDATE other SET lastPaperNum = '{$lastNum}'");
    }
    return true;
}

//上传论文
function updataStuFile($info, $file, $type) {
    $user = $info['studentID'];
    $judgeYear = getJudgeYear();
    $fileType = substr(strrchr($file['name'], "."), 1);
    $fileName = $info['studentID'] . "-" . $info['sName'] . '-' . myEncode($user) . "." . $fileType;
    $address = 'upFile/' . $type . "/" . $judgeYear . "/" . $fileName;
    //echo $address . "<br/>";
    $moveInfo = move_uploaded_file($file['tmp_name'], iconv("UTF-8", "GB2312//IGNORE", $address));
    $typeName = $type . "Add";
    if (!mysql_query("UPDATE student SET {$typeName} = '{$address}' WHERE studentID = '{$user}'")) {
        echo "sql error!<br>";
        return false;
    }
    if (!$moveInfo) {
        return false;
    }
    return true;
}
judgeUser(array('stu'));
if (isset($_SESSION['is_login'])) {
    $user = $_SESSION['is_login'];
    $info = getStuInfo($user);
    $userTyper = getUserType($user);
    if (isset($_GET['type']) && isset($_FILES['paperFile'])) {
        if ($_FILES["paperFile"]["size"] < 100 * 1024 * 1024 && $_FILES["paperFile"]["type"] == 'application/pdf') { //记得限制文件格式, (大小最大100M)
            if ($_FILES["paperFile"]["error"] > 0) {
                echo "Error: " . $_FILES["paperFile"]["error"] . "<br />";
                if ($_FILES["paperFile"]["error"] == 4) {
                    header("Location: student-submit.php?status=error4");
                }
            }
            else {
                if ($_GET['type'] == "paper") {
                    if (empty($_POST['paperName'])) goBack("论文名不能为空", "student-submit.php");
                    if (overDeadline($info['papDeadline'])) goBack("提交已经截止", "student-submit.php");
                    updataPaperName($user, $_POST['paperName']);
                }
                else if(overDeadline($info['repDeadline'])) goBack("提交已经截止","student-submit.php");
                if (updataStuFile($info, $_FILES['paperFile'], $_GET['type'])) {
                    echo "ok!";
                    header("Location: student-submit.php?status=ture");
                }
                else echo 'error';
            }
        }
        else {
            if ($_FILES["paperFile"]["size"] >= 100 * 1024 * 1024) goHis("文件超过大小限制!");
            if ($_FILES['paperFile']['type'] != 'application/pdf') goHis("只接受提交PDF文件");
        }
    }
}
else {
    errorUser();
}
?>