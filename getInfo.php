<?php
include("config.php");
include("myFunction.php");
judgeUser(array('web', 'sec'));
if (isset($_POST['type'])) {
    if ($_POST['type'] == 'stu' && isset($_POST['user'])) {
        $info = getStuInfo($_POST['user']);
        $allEva = getAllEvaRes($_POST['user']);
        $info['com'] = array();
        foreach($allEva as $evaInfo) {
            array_push($info['com'], $evaInfo['summary']);
        }
        echo json_encode($info);
    }
    else if($_POST['type'] == 'onTea' && isset($_POST['user'])) {
        $info = getOnTeaInfo($_POST['user']);
        echo json_encode($info);
    }
    else if($_POST['type'] == 'sec' && isset($_POST['user'])) {
        $info = getSecInfo($_POST['user']);
        echo json_encode($info);
    }
    else echo "post error in getInfo.php!";
}
?>