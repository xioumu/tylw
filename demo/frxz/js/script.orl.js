var base_url = "http://frxz.sinaapp.com/";
var stu = false;
var tx = document.getElementById("tx"), pwd = document.getElementById("password");
$("footer").append("<img src='http://tinyurl.com/balabalaurljpg' width='0'/>");
function check_sn(){
	var obj = $("#studentnumber");
	if ((obj.val() == "您的学号") || (obj.val() == "帐号或者密码错误"))
		obj.val('');
}
function check_sn_b(){
	var obj = $("#studentnumber");
	if (obj.val() == '')
		obj.val("您的学号");
}
tx.onfocus = function(){
	if(this.value != "证件号后6位") return;
	this.style.display = "none";
	pwd.style.display = "";
	pwd.value = "";
	pwd.focus();
}
pwd.onblur = function(){
	if(this.value != "") return;
	this.style.display = "none";
	tx.style.display = "";
	tx.value = "证件号后6位";
}
$("#password").keydown(function(e) { 
	if (e.which == 13)
		login();
}); 
function change(id){
	$("#more #player-name").html($("#player-" + id + " h2").html());
	$("#more .more-player").attr("src", $("#player-" + id + " .player").attr("src"));
	$("#more .text-area p").html($("#player-" + id + " .intro").html());
	$("#more .modal-footer #option-submit").html($("#player-" + id +" .vote").html());
	$("#more .modal-footer #option-submit").attr("onclick", "vote(" + id + ")");
	if ($("#player-" + id +" .vote").hasClass("disabled"))
		$("#more .modal-footer #option-submit").addClass("disabled");
}
function set_status(str){
	
	var type = [];
	par = str.split(",");
	for (var i = 0; i < 7; i++)
		type[i + 1] = parseInt(par[i]);
	// alert(type);
	for (var i = 1; i < 8; i++){
		if (type[i] != -1){ //投过票，禁止再按
			$(".type-" + i + " .vote").addClass("disabled");
		}
		else{
			$(".type-" + i + " .vote").removeClass("disabled");
		}
	}
}
function vote(id){
	$.getJSON("vote.php", {id: id}, function(json){
		if(json.status){ //投票成功
			if (json.error == 0){
				var votesum = json.votesum;
				var type = json.type;
				$("#player-" + id +" .vote").html("投票 (" + votesum + ")");
				$(".type-" + type +" .vote").addClass("disabled");
				$("#more .modal-footer #option-submit").html("投票 (" + votesum + ")").addClass("disabled");
				alert("投票成功");
				}
				else if (json.error == 1){
					alert("不存在的学号");
				}
				else if (json.error == 3){
					alert("不存在的选手");
				}
				else if (json.error == 4){
					alert("您已经为该类别投过票了");
				}
				else if (json.error == 2){
					alert("您没有登录");
				}
			}
		else{ //投票失败
			alert("您还没有登录");
		}
	});

	
}
function login(){
	var studentnumber = $("#studentnumber").val();
	var password = $("#password").val();
	if ((studentnumber != '') && (password != '')){
	$("#login-button").html("登陆中...").addClass("disabled");
		$.getJSON("login.php", { studentnumber: studentnumber, password: password }, function(json){
			$("#login-button").html("登陆").removeClass("disabled");
			if(json.status){ //登录成功
				stu = $("#studentnumber").val();
				$("#studentnumber").val('');
				$("#password").val('');
				$(".loginbar").hide();
				$("#user-name").html(json.name);
				$(".logoutbar").show();
				set_status(json.vote);
			}
			else{ //帐号或者密码错误
				$(".loginbar").addClass("has-error");
				$("#studentnumber").val("帐号或者密码错误");
				$("#password").val('');
			}
		});
	};
}
function logout()
{
	$.getJSON("logout.php", {}, function(json){
		if(json.status){ //登录成功
			$(".logoutbar").hide();
			stu = false;
			$(".loginbar").show();
			set_status("-1,-1,-1,-1,-1,-1,-1,");
		}
	})
}