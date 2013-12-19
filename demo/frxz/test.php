<meta charset="utf-8">
<?php
include("config.php");
include("Snoopy.class.php");
$studentnumber = "2011302580311";
$password = "123456";
	$url = "http://my.whu.edu.cn/userPasswordValidate.portal?Login.Token1=$studentnumber&Login.Token2=$password";
	$snoopy = new Snoopy;
	$snoopy -> fetch($url); //获取所有内容
	$snoopy -> setcookies();  
	$print = $snoopy->results;
	$url = "http://my.whu.edu.cn/";
	$snoopy -> fetch($url);
	$print = $snoopy->results;
	$print = substr($print, strpos($print, '<div class="composer">'));
	// echo $print;
	 preg_match("/<li>([\s\S]*?)<script>/", $print,$match );
	print_r ($match);
	echo "=".trim($match[1])."=";
	// if (strpos($print, 'LoginSuccessed')) {
		//保存登录状态
		// $_SESSION['XH']=$XH;
		// echo "<script>alert('登陆成功')</script>";
		// }
	

?>