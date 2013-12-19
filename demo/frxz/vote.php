<?php
header("Content-Type: text/html;charset=utf-8");
include("config.php");
$data['status'] = false;
$result = mysql_query("SELECT content FROM frxz_other WHERE type = 'vote'");
if ($row = mysql_fetch_array($result)){
	if ($row['content'] == 'off'){
		$data['error'] = 5;//投票关闭
		echo json_encode($data);
		exit;
	}
}
if(! isset($_SESSION['is_login'])){
	$data['error'] = 2;//您还没有登录
	echo json_encode($data);
	exit;
}
if (isset($_GET['id'])){
	$data['status'] = true;
	$id = filter($_GET['id']);
	$studentnumber = $_SESSION['is_login'];
	$result = mysql_query("SELECT * FROM frxz_player WHERE id = '$id'");
	if ($row = mysql_fetch_array($result)){
		$type = $row['type'];
		$pname = $row['name'];
		$votesum = $row['votesum'];
	}
	else{
		$data['error'] = 3;//不存在的id
		echo json_encode($data);
		exit;
	}
	
	$result = mysql_query("SELECT * FROM frxz_user WHERE studentnumber = '$studentnumber'");
	if ($row = mysql_fetch_array($result)){
		$uname = $row['name'];
	}
	else{
		$data['error'] = 1;//不存在的学号
		echo json_encode($data);
		exit;
	}
	
	$result = mysql_query("SELECT * FROM frxz_vote WHERE type = '$type' AND studentnumber = '$studentnumber'");
	if ($row = mysql_fetch_array($result)){
		$data['error'] = 4;//已经为该类别投过票
		echo json_encode($data);
		exit;
	}
	else{
		$ip = $_SERVER["REMOTE_ADDR"];
		$time = date("Y-m-d H:i:s");
		mysql_query("INSERT INTO frxz_vote (studentnumber, uname, pid, pname, type, ip, time) VALUES ('$studentnumber', '$uname', '$id', '$pname', '$type', '$ip', '$time')");
		$votesum++;
		mysql_query("UPDATE frxz_player SET votesum = '$votesum' WHERE id = '$id'");
		$data['error'] = 0;
		$data['votesum'] = $votesum;
		$data['type'] = $type;
	}
}
echo json_encode($data);
?>