<?php
include('config.php');
include('myFunction.php');
function isBackupDate($localTime) {
    if ($localTime['mon'] == 7 || $localTime['mon'] == 2) {
        return true;
    }
    return false;
}

function backupDataBase($oldAdr, $newAdr) {
    if (file_exists($newAdr)) {
        if (!unlink($newAdr)) {
            echo "can't delete old dataBase backup!";
        }
    }
    if (!copy($oldAdr, $newAdr) ){
        echo "can't copy new backup!";
    }
}

function backupAll() {
    $adr = 'backups\last.zip';
    $dataBaseAdr = 'upFile\tylw.sql';
    if (file_exists($adr)) {
        if (!unlink($adr)) {
            echo "can't delete old backup!";
            return false;
        }
    }
    exec("zip -r -9 {$adr} upFile", $s);
    $localTime = getdate();
    $newAdr = 'backups\\' . $localTime['year'] . '-' . $localTime['mon'] . ".zip";
    $newdataBaseAdr = 'backups\\dataBase\\' . $localTime['year'] . '-' . $localTime['mon'] . '-' . $localTime['mday'] . '.sql';
    if (isBackupDate($localTime) && !file_exists($newAdr)) {
        if (!copy($adr, $newAdr)) {
            echo "can't copy new backup!";
            return false;
        }
    }
    backupDataBase($dataBaseAdr, $newdataBaseAdr);
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
    exec("zip -r -9 {$adr} {$fileAdr}", $s);
}

function updataBackupTime() {
    mysql_query("UPDATE other SET lastBackupTime = CURDATE()") or die(mysql_error());
}

backupAll();
backupNowDoc('paper');
backupNowDoc('report');
updataBackupTime();
?>