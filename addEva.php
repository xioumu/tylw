<?php
include("config.php");
include("myFunction.php");

//添加校外专家账号信息
function addOUtTeaUser($user) {
    filter($user);
    if (mysql_query("INSERT INTO teacheroutside (userID) VALUES ('{$user}')")) {
        return true;
    }
    else return false;
}
//添加校外专家
function addOutTea() {
    $que = mysql_query("SELECT lastOutTea FROM other");
    if ($res = mysql_fetch_array($que)) {
        $lastOutTea = $res['lastOutTea'];
    }
    $lastOutTea++;
    $username = 't' . $lastOutTea;
    if (!mysql_query("UPDATE other SET lastOutTea = {$lastOutTea}")) {
        echo "update lastOutTea error!";
    }
    $passwd = getRand();
    addUser($username, $passwd, 'outTea');
    addOutTeaUser($username);
    return $username;
}
//添加指定学生和专家的审评
function addEva($stu, $tea) {
    filter($stu);
    fllter($tea);
    if (mysql_query("INSERT INTO evaluating (studentID, teacherID) VALUES ('{$stu}', '{$tea}')")) {
        return true;
    }
    else return false;
}
//指定学生添加对应类别的审评
function addStuEva($user) {
    $info = getStuInfo($user);
    for ($i = 0; $i < 2; $i++) {
        $outTeaUser = addOutTea();
        addEva($user, $outTeaUser);
    }
    if ($info['degree'] == 'doc') {
        $outTeaUser = addOutTea();
        addEva($user, $outTeaUser);
    }
    return true;
}
header("Content-Type: text/html;charset=utf-8");
echo '<html><body>';
judgeUser(array('web'));
if (isset($_GET['type']) && $_GET['type'] == 'mul') {
    if (isset($_GET['needNum'])) {
        $sum = intval($_GET['needNum']);
        //分配指定人选
        if (isset($_POST['choiceStu'])) {
            $choiceStu = $_POST['choiceStu'];
            if (count($choiceStu) > $sum) {
                goBack("失败:选取人数比参加评选人数大", "web-admin-add-eva.php");
            }
            foreach ($choiceStu as $user) {
                addStuEva($user);
            }
            $sum -= count($choiceStu);
        }
        $allUser = getAllFreeUser("stu");
        for ($i = 0; $i < $sum; $i++) {
            addStuEva($allUser[$i]);
        }
        goBack("成功分配评审学生", "web-admin-eva-manage.php");
    }
}
else if (isset($_GET['type']) && $_GET['type'] == 'one') {
    if ($_POST['studentID'] == "")  goHis("学生不能为空");
    if ($_POST['teacherID'] == "newOutTea") {
        $outTea = addOutTea();
        addEva($_POST['studentID'], $outTea);
    }
    else {
        addEva($_POST['studentID'], $_POST['teacherID']);
    }
    goBack("成功添加审评", "web-admin-eva-manage.php");
}
echo '</body></html>';
?>