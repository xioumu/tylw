<?php
header("Content-Type: text/html;charset=utf-8");
include("config.php");
include("Snoopy.class.php");
$data['status'] = false;
function get_status($studentnumber)
{
	for ($i = 1; $i < 8; $i++)
		$arr[$i] = -1;
	$result = mysql_query("SELECT type,pid FROM frxz_vote WHERE studentnumber = '$studentnumber'");
	while ($row = mysql_fetch_array($result)){
		$arr[$row['type']] = $row['pid'];
	}
	$str = '';
	for($i = 1; $i < 8; $i++)
		$str .= $arr[$i] . ",";
	return $str;
}
if (isset($_GET['studentnumber'])){
	// echo"1";
	$studentnumber = filter($_GET['studentnumber']);
	$password = filter($_GET['password']);
	$result = mysql_query("SELECT * FROM frxz_user WHERE studentnumber = '$studentnumber'");
	if ($row = mysql_fetch_array($result)){
		if ($row['password'] == $password){
			$data['status'] = true;
			$data['studentnumber'] = $studentnumber;
			$data['name'] = $row['name'];
			$_SESSION['is_login'] = $studentnumber;
			$_SESSION['name'] = $row['name'];
			
			// echo $str;
			$data['vote'] = get_status($studentnumber);
		}
	}
	else {//数据库中没有这条数据，那么去抓取
	// echo"2";
	$url = "http://my.whu.edu.cn/userPasswordValidate.portal?Login.Token1=$studentnumber&Login.Token2=$password";
	$snoopy = new Snoopy;
	$snoopy -> fetch($url); //获取所有内容
	$snoopy -> setcookies();  
	$print = $snoopy->results;
	// echo $studentnumber." ".$password;
	if (strpos($print, 'LoginSuccessed')) {
		// echo "3";
		$url = "http://my.whu.edu.cn/";
		$snoopy -> fetch($url);
		$print = $snoopy->results;
		$print = substr($print, strpos($print, '<div class="composer">'));
		// echo $print;
		preg_match("/<li>([\s\S]*?)<script>/", $print,$match );
		$name = trim($match[1]);
		$time = date("Y-m-d H:i:s");
		mysql_query("INSERT INTO frxz_user (studentnumber, password, name, time) VALUES ('$studentnumber', '$password', '$name', '$time')");
		$data['status'] = true;
		$data['studentnumber'] = $studentnumber;
		$data['name'] = $name;
		$_SESSION['is_login'] = $studentnumber;
		$data['vote'] = get_status($studentnumber);
		}
	}
}

echo json_encode($data);
?>