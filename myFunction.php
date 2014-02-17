<?php
function loginCheck($username, $passwd) {
    $result = mysql_query("SELECT * FROM user WHERE user = '{$username}' ");
    if ($row = mysql_fetch_array($result)) {
        if ($row['passwd'] === $passwd) {
            return true;
        }
        else return false;
    }
    else return false;
}

function getUserType($username) {
    $result = mysql_query("SELECT * FROM user WHERE user = '{$username}' ");
    if ($row = mysql_fetch_array($result)) {
        return $row['uType'];
    }
    else  echo "错误的用户名";
}

function mySerialize( $obj ) { //格式化数组，便于传输
    return base64_encode(gzcompress(serialize($obj)));
}

function myUnserialize($txt) {
    return unserialize(gzuncompress(base64_decode($txt)));
}

function getExl($filePath) { //获取EXL信息
    $res = array();
    require_once 'PHPExcel\PHPExcel.php';
    require_once 'PHPExcel\PHPExcel\IOFactory.php';
    //require_once 'PHPExcel\PHPExcel\Reader\Excel5.php';//excel 2003
    require_once 'PHPExcel\PHPExcel\Reader\Excel2007.php'; //excel 2007
    $objReader = PHPExcel_IOFactory::createReader('Excel2007');
    $objPHPExcel = PHPExcel_IOFactory::load($filePath);
    $sheet = $objPHPExcel->getSheet(0);
    $highestRow = $sheet->getHighestRow(); // 取得总行数
    $highestColumn = $sheet->getHighestColumn(); // 取得总列数
    for ($i = 2; $i <= $highestRow; $i++) {
        for ($j = 'A'; $j <= $highestColumn; $j++) {
            $res[$i][$j] = $objPHPExcel->getActiveSheet()->getCell("$j$i")->getValue();
        }
    }
    return $res;
}

function addUser($name, $passwd, $type) {
    if (mysql_query("INSERT INTO user (user, passwd, uType) VALUES ('{$name}', '{$passwd}', '{$type}')")) {
        return true;
    }
    else return false;
}
?>