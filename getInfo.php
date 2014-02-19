<?php
include("config.php");
include("myFunction.php");
if (isset($_POST['type'])) {
    if (isset($_POST['type']) == 'stu' && isset($_POST['user'])) {
        $info = getStuInfo($_POST['user']);
        echo json_encode($info);
    }
    else echo "post error in getInfo.php!";
}
?>