<?php
header("Content-Type: text/html;charset=utf-8");
include("config.php");
include("myFunction.php");
//这里session是OnStu和OutStu都行
if (!isset($_SESSION['is_login'])) {
    errorUser();
}
$self = $_SESSION['is_login'];
$utype = getUserType($self);
if ($utype != "onTea" && $utype != "outTea") {
    errorUser();
}

$haveAll = true;
for ($i = 1; $i <=11; $i++) {
    if (!isset($_POST['C'.$i])) {
        $haveAll = false;
    }
}
for ($i = 1; $i <= 5; $i++){
    if (!isset($_POST['T' . $i])) {
        $haveAll = false;
    }
}
if (!isset($_POST['time']) || !isset($_POST['summary']) || !isset($_GET['id'])) {
    $haveAll = false;
}
if (!$haveAll) {
    goHis("所有表格都必须填写或选择");
}

$eid = $_GET['id'];
for ($i = 1; $i <= 11; $i++){
    updateEvaInfo($eid, 'C'.$i, $_POST['C'.$i]);
    if ($i <= 5) updateEvaInfo($eid, 'T'.$i, $_POST['T'.$i]);
}
updateEvaInfo($eid, 'time', changeData($_POST['time']));
updateEvaInfo($eid, 'summary', changeData($_POST['summary']));

if ($utype == 'onTea') goBack("审评成功", 'on-teacher-check.php');
else if ($utype == 'outTea') goBack("审评成功", 'out-teacher-check.php');
?>
