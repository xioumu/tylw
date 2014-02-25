<?php
header("Content-Type: text/html;charset=utf-8");
include("config.php");
include("myFunction.php");
//这里session是OnTeau和OutTea都行
judgeUser(array('onTea', 'outTea'));
$self = $_SESSION['is_login'];
$utype = getUserType($self);
$haveAll = true;
for ($i = 1; $i <=11; $i++) {
    if (!empty($_POST['C'.$i])) {
        $haveAll = false;
    }
}
for ($i = 1; $i <= 5; $i++){
    if (!empty($_POST['T' . $i])) {
        $haveAll = false;
    }
}
if (!empty($_POST['time']) || !empty($_POST['summary']) || !empty($_GET['id'])) {
    $haveAll = false;
}
if (!$haveAll) {
    goHis("所有表格都必须填写或选择");
}

$eid = $_GET['id'];
$evaInfo = getEvaInfo($eid);
if ($evaInfo['teacherID'] != $sel) {
    jumpTo('login.php');
}
for ($i = 1; $i <= 11; $i++){
    updateEvaInfo($eid, 'C'.$i, $_POST['C'.$i]);
    if ($i <= 5) updateEvaInfo($eid, 'T'.$i, $_POST['T'.$i]);
}
updateEvaInfo($eid, 'time', changeData($_POST['time']));
updateEvaInfo($eid, 'summary', changeData($_POST['summary']));
if ($utype == 'onTea') goBack("审评成功", 'on-teacher-check.php');
else if ($utype == 'outTea') goBack("审评成功", 'out-teacher-check.php');
?>
