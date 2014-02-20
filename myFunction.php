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
//根据名字得到学生类型的ID
function getStuTypeId($type) {
    str_replace($type, ' ', '');
    $res = 0;
    $query = mysql_query("SELECT * FROM studenttype WHERE typeName = '{$type}'");
    if ($row = mysql_fetch_array($query)) {
        $res = $row['sid'];
    }
    else echo "get TypeId error!<br/>";
    return $res;
}
//得到用户的类型名
function getUserType($username) {
    $result = mysql_query("SELECT * FROM user WHERE user = '{$username}' ");
    if ($row = mysql_fetch_array($result)) {
        return $row['uType'];
    }
    else  echo "错误的用户名";
}
//序列化数组，便于传输
function mySerialize( $obj ) {
    return base64_encode(gzcompress(serialize($obj)));
}
//反序列化
function myUnserialize($txt) {
    return unserialize(gzuncompress(base64_decode($txt)));
}
//上传EXL文件，返回文件名
function uploadExl($tmpFilePath) {
    $filePath = 'upFile/exl/';
    $filename = date("y-m-d-H-i-s") . ".xlsx"; //去当前上传的时间
    $uploadfile = $filePath . $filename; //上传后的文件名地址
    $result = move_uploaded_file($tmpFilePath, $uploadfile);
    if (!$result) {
        echo "move file error!<br>";
    }
    $res['name'] = $filename;
    $res['path'] = $uploadfile;
    return $res;
}
//获取EXL信息
function getExl($filePath) {
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
//添加用户账户密码
function addUser($name, $passwd, $type) {
    if (mysql_query("INSERT INTO user (user, passwd, uType) VALUES ('{$name}', '{$passwd}', '{$type}')")) {
        return true;
    }
    else return false;
}
//获取指定类型所有用户
function getAllUser($uType) {
    $res = array();
    $result = mysql_query("SELECT user FROM user WHERE uType = '{$uType}' ");
    while ($row = mysql_fetch_array($result)) {
        array_push($res, $row['user']);
    }
    return $res;
}
//获取指定类型所有用户密码
function getAllUserPasswd($uType) {
    $res = array();
    $result = mysql_query("SELECT * FROM user WHERE uType = '{$uType}' ");
    while ($row = mysql_fetch_array($result)) {
        array_push($res, $row);
    }
    return $res;
}
//获取学生所有信息
function getStuInfo($user) {
    $res = array();
    $result = mysql_query("SELECT * FROM student WHERE studentID = '{$user}'");
    if ($row = mysql_fetch_array($result)) {
        $res = $row;
    }
    $res['type'] = getStuType($res['typeID']);
    return $res;
}
//得到学生的信息
function getStuType($id) {
    $res = "错误";
    $result = mysql_query("SELECT * FROM studenttype WHERE sid = '{$id}'");
    if ($row = mysql_fetch_array($result)) {
        $res = $row['typeName'];
    }
    return $res;
}

/**
 * 简单对称加密算法之加密
 * @param String $string 需要加密的字串
 * @param String $skey 加密EKY
 * @author Anyon Zou <cxphp@qq.com>
 * @date 2013-08-13 19:30
 * @update 2014-01-21 28:28
 * @return String
 */
function myEncode($string = '', $skey = 'whtylw') {
    $skey = str_split(base64_encode($skey));
    $strArr = str_split(base64_encode($string));
    $strCount = count($strArr);
    foreach ($skey as $key => $value) {
        $key < $strCount && $strArr[$key].=$value;
    }
    return str_replace('=', 'O0O0O', join('', $strArr));
}
/**
 * 简单对称加密算法之解密
 * @param String $string 需要解密的字串
 * @param String $skey 解密KEY
 * @author Anyon Zou <cxphp@qq.com>
 * @date 2013-08-13 19:30
 * @update 2014-01-21 28:28
 * @return String
 */
function myDecode($string = '', $skey = 'whtylw') {
    $skey = str_split(base64_encode($skey));
    $strArr = str_split(str_replace('O0O0O', '=', $string), 2);
    $strCount = count($strArr);
    foreach ($skey as $key => $value) {
        $key < $strCount && $strArr[$key][1] === $value && $strArr[$key] = $strArr[$key][0];
    }
    return base64_decode(join('', $strArr));
}

function getJudgeYear() { //获取当前学年
    $res = -1;
    $query = mysql_query("SELECT * FROM other");
    if ($row = mysql_fetch_array($query)) {
        $res = $row['NowJudgeYear'];
    }
    else echo "get judgeYear error!<br/>";
    return $res;
}

function changeData($old){ //转换日期的格式
    if ($old == null) {
        return 'null';
    }
    $res = explode("/", $old);
    if (count($res) == 1) return $old;
    $month = $res[0];
    $day = $res[1];
    $year = $res[2];
    return $year . "-" . $month . "-" . $day;
}

function getOnTeaStatus($user) {
    return "还未评审完毕";
}

function getOnTeaInfo($user) {
    $res = array();
    $status = getOnTeaStatus($user);
    $result = mysql_query("SELECT * FROM teacheronside WHERE teacherID = '{$user}'");
    if ($row = mysql_fetch_array($result)) {
        $res = $row;
    }
    $res['status'] = $status;
    return $res;
}
?>