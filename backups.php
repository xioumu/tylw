<?php
include('config.php');
include('myFunction.php');
function isBackupDate($localTime) {
    if ($localTime['mon'] == 5 || $localTime['mon'] == '2') {
        return true;
    }
    return false;
}

function backupAll() {
    $adr = 'backups\last.zip';
    if (file_exists($adr)) {
        if (!unlink($adr)) {
            echo "can't delete old backup!";
            return false;
        }
    }
    exec("zip -r {$adr} upFile", $s);
    $localTime = getdate();
    $newAdr = 'backups\\' . $localTime['year'] . '-' . $localTime['mon'] . ".zip";
    if (isBackupDate($localTime) && !file_exists($newAdr)) {
        if (!copy($adr, $newAdr)) {
            echo "can't copy new backup!";
            return false;
        }
    }
    return true;
}

function backupNowDoc($type) {
    $judgeInfo = getJudgeYear();
    $adr = 'download\\' . $type . ".zip";
    $fileAdr = "upFile\\{$type}\\{$judgeInfo}";
    if (file_exists($adr)) {
        if (!unlink($adr)) {
            echo "can't delete old {$type}!";
            return false;
        }
    }
    exec("zip -r {$adr} {$fileAdr}", $s);
}

function updataBackupTime() {
    mysql_query("UPDATE other SET lastBackupTime = CURDATE()") or die(mysql_error());
}

backupAll();
backupNowDoc('paper');
backupNowDoc('report');
updataBackupTime();
?>