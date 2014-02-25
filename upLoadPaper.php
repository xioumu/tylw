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
function updataStuFile($user, $file, $type) {
    $judgeYear = getJudgeYear();
    $fileType = substr(strrchr($file['name'],"."),1);
    $fileName = myEncode($user) . "." . $fileType;
    $address = 'upFile/' . $type . "/" . $judgeYear . "/" . $fileName;
    //echo $address . "<br/>";
    $moveInfo = move_uploaded_file($file['tmp_name'], $address);
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

if (isset($_SESSION['is_login'])) {
    $user = $_SESSION['is_login'];
    judgeUser(array('stu'));
    $userTyper = getUserType($user);
    if ($userTyper != 'stu') {
        errorUser();
    }
    else {
        if (isset($_GET['type']) && isset($_FILES['paperFile'])) {
            if ($_FILES["paperFile"]["size"] < 100 * 1024 * 1024) { //记得限制文件格式, (大小最大100M)
                if ($_FILES["paperFile"]["error"] > 0) {
                    echo "Error: " . $_FILES["paperFile"]["error"] . "<br />";
                    if ($_FILES["paperFile"]["error"] == 4) {
                        header("Location: student-submit.php?status=error4");
                    }
                }
                else {
                    if ($_GET['type'] == "paper")  {
                        updataPaperName($user, $_POST['paperName']);
                    }
                    if (updataStuFile($user, $_FILES['paperFile'], $_GET['type'])) {
                        echo "ok!";
                        header("Location: student-submit.php?status=ture");
                    }
                    else echo 'error';
                }
            }
            else {
                if ($_FILES["exlFile"]["size"] >= 100 * 1024 * 1024) echo "文件超过大小限制!<br/>";
            }
        }
    }
}
else {
    errorUser();
}
?>