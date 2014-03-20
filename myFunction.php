<?php
filter_input_array(INPUT_POST, FILTER_SANITIZE_SPECIAL_CHARS);
filter_input_array(INPUT_GET, FILTER_SANITIZE_SPECIAL_CHARS);
if (!get_magic_quotes_gpc()) {
    function addslashesDeep($var) {
        return is_array($var) ? array_map('addslashesDeep', $var) : addslashes($var);
    }
    $_GET = addslashesDeep($_GET);
    $_POST = addslashesDeep($_POST);
    $_COOKIE = addslashesDeep($_COOKIE);
    $_REQUEST = addslashesDeep($_REQUEST);
}
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
function mySerialize($obj) {
    return base64_encode(gzcompress(serialize($obj)));
}

//反序列化
function myUnserialize($txt) {
    return unserialize(gzuncompress(base64_decode($txt)));
}

//上传EXL文件，返回文件名
function uploadExl($tmpFilePath) {
    $filePath = 'upFile/exl/';
    $filename = date("y-m-d-H-i-s") . ".xls"; //去当前上传的时间
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
function getExl($filePath, $ex = '2003') {
    $res = array();
    require_once 'PHPExcel\PHPExcel.php';
    require_once 'PHPExcel\PHPExcel\IOFactory.php';
    require_once 'PHPExcel\PHPExcel\Reader\Excel5.php';//excel 2003
    require_once 'PHPExcel\PHPExcel\Reader\Excel2007.php'; //excel 2007
    $objReader = "";
    if ($ex = '2007') {
        $objReader = PHPExcel_IOFactory::createReader('Excel2007');
    }
    else {
        $objReader = PHPExcel_IOFactory::createReader('Excel5');
    }
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

//获取学生状态
function getStuStatus($user) {
    $info = array();
    $cnt = 0;
    $result = mysql_query("SELECT * FROM student WHERE studentID = '{$user}'");
    $otherInfo = getOtherInfo();
    if ($row = mysql_fetch_array($result)) {
        $info = $row;
        if ($row['paperAdd'] == null) return "未上传论文";
    }
    if ($info['repeatRate'] == "") return "未填写论文重复率";
    $stuType = getStuType($user);
    if ($stuType == 'mas') $rateType = 'masRepeatRate';
    else $rateType = 'docRepeatRate';

    if ($info['repeatRate'] == "") return "未填写论文重复率";
    else if ($info['repeatRate'] > $otherInfo[$rateType]) return "论文重复率不合格";

    $allEva = getAllUserEva($user, "studentID");
    if (count($allEva) == 0) return "未参与审评";
    else {
        foreach ($allEva as $evaID) {
            $evaStatus = getEvaStatusID($evaID);
            if ($evaStatus == 3) return "正在评审";
            else if ($evaStatus == 1) $cnt++;
        }
        if ($cnt >= 2) return "通过评审";
        else if (count($allEva) == 2 ){
            if ($cnt == 1) return "需要添加审评";
            else return "未通过审评";
        }
        else return "未通过审评";
    }
}

//获取学生所有信息
function getStuInfo($user) {
    $res = array();
    $result = mysql_query("SELECT * FROM student WHERE studentID = '{$user}'");
    if ($row = mysql_fetch_array($result)) {
        $res = $row;
    }
    $typeInfo = getStuType($res['typeID']);
    $res['type'] = $typeInfo['typeName'];
    $res['degree'] = $typeInfo['degree'];
    $res['status'] = getStuStatus($user);
    return $res;
}

//得到学生的类型
function getStuType($id) {
    $res['typeName'] = "错误";
    $result = mysql_query("SELECT * FROM studenttype WHERE sid = '{$id}'");
    if ($row = mysql_fetch_array($result)) {
        $res = $row;
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
        $key < $strCount && $strArr[$key] .= $value;
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

function changeData($old) { //转换日期的格式
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

//获取评审状态
function getEvaStatus($eid) {
    $id = getEvaStatusID($eid);
    if ($id == 1) return "通过审评";
    else if ($id == 2) return "未通过审评";
    else return "还未审评";
}

//获取审评状态ID
function getEvaStatusID($eid) {
    $info = array();
    $result = mysql_query("SELECT * FROM evaluating WHERE eid = '{$eid}'");
    if ($row = mysql_fetch_array($result)) {
        $info = $row;
    }
    if ($info['c10'] == null) return 3; //未审评
    else if ($info['c10'] <= 2) return 1; //通过
    else return 2; //未通过
}

//获取老师状态
function getTeaStatus($user) {
    $allEva = getAllUserEva($user, "teacherID");
    $flag = true;
    foreach ($allEva as $evaID) {
        $status = getEvaStatusID($evaID);
        if ($status == 3) {
            $flag = false;
            break;
        }
    }
    if (!$flag) return "还未评审完毕";
    else return "评审完毕";
}

//获取校外专家信息
function getOutTeaInfo($user) {
    $res = array();
    $status = getTeaStatus($user);
    $result = mysql_query("SELECT * FROM teacheroutside WHERE userID = '{$user}'");
    if ($row = mysql_fetch_array($result)) {
        $res = $row;
    }
    $res['status'] = $status;
    return $res;
}

//获取校内专家信息
function getOnTeaInfo($user) {
    $res = array();
    $status = getTeaStatus($user);
    $result = mysql_query("SELECT * FROM teacheronside WHERE teacherID = '{$user}'");
    if ($row = mysql_fetch_array($result)) {
        $res = $row;
    }
    $res['status'] = $status;
    return $res;
}

//生成随机密码
function getRand() {
    $res = "";
    for ($i = 0; $i < 8; $i++) {
        $res .= rand(0, 9);
    }
    return $res;
}

//得到所有未参加评审的学生的ID
function getAllFreeUser($type, $major = 'all') {
    if ($type == 'stu') {
        $res = array();
        $query = "SELECT studentID
                            FROM student
                            WHERE studentID NOT  IN (
                                SELECT DISTINCT studentID
                                FROM evaluating)";
        if ($major != 'all') {
            $query .=  "AND major = '{$major}'" ;
        }
        $query .= "Order By Rand()";
        $que = mysql_query($query) or die(mysql_error());
        while ($user = mysql_fetch_array($que)) {
            array_push($res, $user['studentID']);
        }
        return $res;
    }
}

//弹出信息，并跳转地址
function goBack($info, $add) {
    echo "<script>alert(\"{$info}\"); self.location='{$add}';</script>";
    exit;
}

//获取全部审评ID
function getAllEva() {
    $res = array();
    $result = mysql_query("SELECT * FROM evaluating");
    while ($row = mysql_fetch_array($result)) {
        array_push($res, $row['eid']);
    }
    return $res;
}

//获取指定审评信息
function getEvaInfo($eid) {
    $res = array();
    $result = mysql_query("SELECT * FROM evaluating WHERE eid = '{$eid}'");
    if ($row = mysql_fetch_array($result)) {
        $res = $row;
    }
    $stuInfo = getStuInfo($res['studentID']);
    $res['sName'] = $stuInfo['sName'];
    $res['Ssubject'] = $stuInfo['subject'];
    $res['Smajor'] = $stuInfo['major'];
    $res['Stype'] = $stuInfo['type'];
    $tType = getUserType($res['teacherID']);
    if ($tType == 'onTea') {
        $teaInfo = getOnTeaInfo($res['teacherID']);
        $res['tName'] = $teaInfo['tName'];
    }
    else $res['tName'] = '';
    $res['status'] = getEvaStatus($eid);
    return $res;
}

//删除审评
function delEva($user, $type) {
    if (mysql_query("DELETE FROM evaluating WHERE {$type} = '{$user}'")) {
        return true;
    }
    else return false;
}

//通过老师或学生ID获取所有审评
function getAllUserEva($user, $type) {
    $res = array();
    $que = mysql_query("SELECT * FROM evaluating WHERE {$type} = '{$user}'");
    while ($row = mysql_fetch_array($que)) {
        array_push($res, $row['eid']);
    }
    return $res;
}

//输出状态
function getLabel($info, $type) {
    return "<td><span class = \"label label-{$type}\">{$info}</span></td>";
}

//弹出信息返回上一层
function goHis($info) {
    echo "<script>alert(\"{$info}\"); history.go(-1);</script>";
    exit;
}

//更新审批信息
function updateEvaInfo($eid, $lineName, $val) {
    if (mysql_query("UPDATE evaluating SET {$lineName} = '{$val}' WHERE eid = '{$eid}'")) {
        return true;
    }
    else return false;
}

//判断是否超过期限，true=超过
function overDeadline($time) {
    $time .= "23:59:59";
    if (strtotime($time) < strtotime("now")) {
        return true;
    }
    else return false;
}

//遇到错误用户，跳转
function errorUser() {
    echo "<script>alert(\"权限不足\"); self.location='login.php';</script>";
    exit;
}

//得到other表所有信息
function getOtherInfo() {
    $res = array();
    $que = mysql_query("SELECT * FROM other");
    if ($row = mysql_fetch_array($que)) {
        $res = $row;
    }
    return $res;
}

//删除全部学生
function delAllStu() {
    $flag = true;
    $allStuUser = getAllUser('stu');
    foreach ($allStuUser as $user) {
        if (!delEva($user, 'studentID')) {
            echo 'delete evaluating error!';
            $flag = false;
        }
        if (!delStuInfo($user)) {
            echo $user . "delete student info error! <br/>";
            $flag = false;
        }
        else if (!delUser($user)) {
            echo $user . "delete user error! <br/>";
            $flag = false;
        }
    }
    return $flag;
}

//删除全部审评
function delAllEva() {
    $allEva = getAllEva();
    foreach ($allEva as $eid) {
        if (!delEva($eid, 'eid')) {
            echo "delete evaluating error!";
            return false;
        }
    }
    return true;
}

//删除用户
function delUser($user) {
    if (mysql_query("DELETE FROM user WHERE user = '{$user}'")) {
        return true;
    }
    else return false;
}

//删除学生信息
function delStuInfo($user) {
    if (mysql_query("DELETE FROM student WHERE studentID = '{$user}'")) {
        return true;
    }
    else return false;
}

//删除校内专家信息
function delOnTeaInfo($user) {
    if (mysql_query("DELETE FROM teacheronside WHERE teacherID = '{$user}'")) {
        return true;
    }
    else return false;
}

//删除校外专家信息
function delOutTeaInfo($user) {
    if (mysql_query("DELETE FROM teacheroutside WHERE userID = '{$user}'")) {
        return true;
    }
    else return false;
}

function delSec($user) {
    if (mysql_query("DELETE FROM secretary WHERE userID = '{$user}'")) {
        return true;
    }
    else return false;
}

//跳转页面
function jumpTo($url, $flag = true) {
    echo "<script>alert(\"权限不足.\"); self.location='{$url}';</script>";
    if ($flag) exit;
}

//判断非法用户
function judgeUser($allow) {
    $flag = false;
    if (isset($_SESSION['is_login'])) {
        $uType = getUserType($_SESSION['is_login']);
        foreach ($allow as $allowType) {
            if ($uType == $allowType) {
                $flag = true;
            }
        }
    }
    if (!$flag) jumpTo("login.php");
}

//过滤
function filter(&$url) {
    $url = filter_var($url, FILTER_SANITIZE_SPECIAL_CHARS);
}

//获取所有类别
function getAllStuType() {
    $res = array();
    $result = mysql_query("SELECT * FROM studenttype");
    while ($row = mysql_fetch_array($result)) {
        array_push($res, $row);
    }
    return $res;
}

//获取审评表里的内容
function getEvaInfoC($val) {
    if ($val == 1) return '优秀';
    else if ($val == 2) return '良好';
    else if ($val == 3) return '合格';
    else if ($val == 4) return '不合格';
    else return "未审";
}

//获取审评表里C9的内容
function getEvaInfoC9($val) {
    if ($val == 1) return "有抄袭现象";
    else if ($val == 2) return "无抄袭现象";
}

//获取审评表里C10的内容
function getEvaInfoC10($val) {
    if ($val == 1) return '同意答辩';
    else if ($val == 2) return '同意答辩但稍作修改';
    else if ($val == 3) return '不同意答辩';
}

//获取指定归档学生信息
function getRecStuInfo($user, $judgeInfo) {
    $que = mysql_query("SELECT * FROM record_student WHERE studentID = '{$user}' AND judgeYear = '{$judgeInfo}'") or die("Error in query:  " . mysql_error());
    if ($row = mysql_fetch_array($que)) {
        return $row;
    }
    else return array();
}

//获取所有归档审评信息
function getAllRecEvaInfo($judgeInfo) {
    $que = "SELECT * FROM record_evaluating";
    if ($judgeInfo != 'all') $que .= " WHERE judgeYear = '{$judgeInfo}'";
    $res = array();
    $result = mysql_query($que) or die("Error in query:  " . mysql_error());;
    while ($row = mysql_fetch_array($result)) {
        $stuInfo = getRecStuInfo($row['studentID'], $row['judgeYear']);
        $row['studentID'] = $stuInfo['studentID'];
        $row['sName'] = $stuInfo['sName'];
        $row['major'] = $stuInfo['major'];
        $row['subject'] = $stuInfo['subject'];
        $row['type'] = $stuInfo['type'];
        $row['tutor'] = $stuInfo['tutor'];
        array_push($res, $row);
    }
    return $res;
}
//获取指定归档审评信息
function getRecEvaInfo($eid, $judgeInfo) {
    $que = "SELECT * FROM record_evaluating WHERE judgeYear = '{$judgeInfo}' AND eid = '{$eid}'";
    $res = array();
    $result = mysql_query($que) or die("Error in query:  " . mysql_error());;
    if ($row = mysql_fetch_array($result)) {
        $stuInfo = getRecStuInfo($row['studentID'], $row['judgeYear']);
        $row['studentID'] = $stuInfo['studentID'];
        $row['sName'] = $stuInfo['sName'];
        $row['major'] = $stuInfo['major'];
        $row['subject'] = $stuInfo['subject'];
        $row['type'] = $stuInfo['type'];
        $row['tutor'] = $stuInfo['tutor'];
        $row['paperName'] = $stuInfo['paperName'];
        $row['paperNum'] = $stuInfo['paperNum'];
        return $row;
    }
    return $res;
}
//删除全部校外专家
function delAllOutTea() {
    $flag = true;
    $allOnTeaUser = getAllUser('outTea');
    foreach ($allOnTeaUser as $user) {
        if (!delEva($user, 'teacherID')) {
            echo 'delete evaluating error!';
            $flag = false;
        }
        else if (!delOutTeaInfo($user)) {
            echo $user . "delete out teacher info error! <br/>";
            $flag = false;
        }
        else if (!delUser($user)) {
            echo $user . "delete user error! <br/>";
            $flag = false;
        }
    }
    return $flag;
}
//获取教学秘书信息
function getSecInfo($user) {
    $res = array();
    $result = mysql_query("SELECT * FROM secretary WHERE userID = '{$user}'");
    if ($row = mysql_fetch_array($result)) {
        $res = $row;
    }
    return $res;
}

//获取指定学生所有审评信息
function getAllEvaRes($user) {
    $res = array();
    $que = mysql_query("SELECT * FROM evaluating WHERE  studentID = '{$user}'") or die("databease error: " . mysql_errno());
    while ($row = mysql_fetch_array($que)) {
        array_push($res, $row);
    }
    return $res;
}
//获取所有专业
function getAllMajor($type) {
    $res = array();
    $que = "";
    if ($type == 'stu') {
        $que = mysql_query("SELECT DISTINCT major FROM student") or die(mysql_error());
    }
    else if ($type == 'onTea') {
        $que = mysql_query("SELECT DISTINCT subject FROM teacheronside") or die(mysql_error());
    }
    while ($row = mysql_fetch_array($que)) {
        if ($type == 'stu')   array_push($res, $row['major']);
        else if ($type == 'onTea') array_push($res, $row['subject']);
    }
    return $res;
}
//获取所有指定专业的用户名
function getAllMajorUser($type, $major) {
    $res = array();
    $allUser = getAllUser($type);
    foreach ($allUser as $user) {
        if ($type == 'stu') {
            $info = getStuInfo($user);
            if ($info['major'] == $major) {
                array_push($res, $user);
            }
        }
        else if ($type == 'onTea') {
            $info = getOnTeaInfo($user);
            if ($info['subject'] == $major){
                array_push($res, $user);
            }
        }
    }
    shuffle($res);
    return $res;
}
?>
