<?php
include("config.php");
include("myFunction.php");
judgeUser(array('web'));

function download($file_dir, $file_name) {
    $file = $file_dir . $file_name;
    $filename = basename($file);
    //处理中文文件名
    $ua = $_SERVER["HTTP_USER_AGENT"];
    $encoded_filename = rawurlencode($filename);
    if (preg_match("/MSIE/", $ua)) {
        header('Content-Disposition: attachment; filename="' . $encoded_filename . '"');
    }
    else if (preg_match("/Firefox/", $ua)) {
        header("Content-Disposition: attachment; filename*=\"utf8''" . $filename . '"');
    }
    else {
        header('Content-Disposition: attachment; filename="' . $filename . '"');
    }
    //让Xsendfile发送文件
    header("Content-type: application/octet-stream");
    header('Content-Disposition: attachment; filename="' . $file_name . '"');
    header("Content-Length: " . filesize($file));
    readfile($file);
}

if (!empty($_GET['type'])) {
    if ($_GET['type'] == 'paper' || $_GET['type'] == 'report')
        download('download\\', $_GET['type'] . ".zip");
    else  if ($_GET['type'] == 'backup') {
        download('backups\\', 'last.zip');
    }
}
?>
