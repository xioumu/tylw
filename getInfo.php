<?php
include("config.php");
include("myFunction.php");
judgeUser(array('web'));
if (isset($_POST['type'])) {
    if ($_POST['type'] == 'stu' && isset($_POST['user'])) {
        $info = getStuInfo($_POST['user']);
        echo json_encode($info);
    }
    else if($_POST['type'] == 'onTea' && isset($_POST['user'])) {
        $info = getOnTeaInfo($_POST['user']);
        echo json_encode($info);
    }
    else echo "post error in getInfo.php!";
}
?>