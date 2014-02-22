<?php
include("config.php");
include("myFunction.php");

//添加校外专家账号信息
function addOUtTeaUser($user) {
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

function addEva($stu, $tea) {
    if (mysql_query("INSERT INTO evaluating (studentID, teacherID) VALUES ('{$stu}', '{$tea}')")) {
        return true;
    }
    else return false;
}

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

echo '<html><body>';
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
echo '</body></html>';
?>