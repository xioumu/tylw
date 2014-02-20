<?php
include('config.php');
include('myFunction.php');
function updataStuFile($user, $file, $type) {
    $fileType = substr(strrchr($file['name'],"."),1);
    $fileName = myEncode($user) . "." . $fileType;
    $address = 'upFile/' . $type . "/" . $fileName;
    //echo $address . "<br/>";
    $moveInfo = move_uploaded_file($file['tmp_name'], $address);
    $typeName = $type . "Add";
    $judgeYear = getJudgeYear();
    if (!mysql_query("UPDATE student SET {$typeName} = '{$address}' WHERE studentID = '{$user}' AND judgeDate = '{$judgeYear}'")) {
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
    $userTyper = getUserType($user);
    if ($userTyper != 'stu') {
        errorUser();
    }
    else {
        if (isset($_GET['type']) && isset($_FILES['paperFile'])) {
            if ($_FILES["paperFile"]["size"] < 1024 * 1024 * 1024) { //记得限制文件格式
                if ($_FILES["paperFile"]["error"] > 0) {
                    echo "Error: " . $_FILES["paperFile"]["error"] . "<br />";
                    if ($_FILES["paperFile"]["error"] == 4) {
                        header("Location: student-submit.php?status=error4");
                    }
                }
                else {
                    if (updataStuFile($user, $_FILES['paperFile'], $_GET['type'])) {
                        echo "ok!";
                        header("Location: student-submit.php?status=ture");
                    }
                    else echo 'error';
                }
            }
            else {
                if ($_FILES["exlFile"]["size"] >= 1024 * 1024 * 1024) echo "文件超过大小限制!<br/>";
            }
        }
    }
}
else {
    errorUser();
}
?>