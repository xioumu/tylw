<?php
//header("Content-Type: text/html;charset=utf-8");
include("config.php");
?>
<html>
<body>
<div class="navbar MainHead">
    <div class="navbar-inner">
        <div class="container-fluid">
            <span class="brand title">武汉体育学院学位管理系统</span>
            <!-- user dropdown starts -->
            <div class="btn-group pull-right">
                <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
                    <i class="icon-user"></i><span class="hidden-phone">
                            <?php if (isset($_SESSION['is_login'])) {
                                echo $_SESSION['is_login'];
                            }
                            else echo "no user!";
                            ?>
                        </span>
                    <span class="caret"></span>
                </a>
                <ul class="dropdown-menu">
                    <li><a href="logout.php">注销</a></li>
                    <li><a href="#myChangePasswd-modal" data-toggle="modal" >修改密码</a></li>
                </ul>
            </div>
            <!-- user dropdown ends -->
        </div>
    </div>
</div>

<div class="modal hide" id="myChangePasswd-modal">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">×</button>
        <h3>修改密码</h3>
    </div>
    <div class="modal-body table-striped form-horizontal">
        <fieldset>
            <div class="control-group">
                <label class="control-label">用户名</label>
                <div class="controls">
                    <input class="input-medium disabled" id="name" type="text" value=
                    "<?php if (isset($_SESSION['is_login'])) {
                        echo $_SESSION['is_login'];
                    }
                    else echo "no user!";
                    ?>" disabled="">
                </div>
            </div>
        </fieldset>
        <div class="control-group">
            <label class="control-label" for="newpasswd">原始密码</label>
            <div class="controls">
                <input class="input-medium" type="password" id="oldpasswd" value="">
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="newpasswd">新密码</label>
            <div class="controls">
                <input class="input-medium" type="password" id="newpasswd1" value="">
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="newpasswd2">新密码确认</label>
            <div class="controls">
                <input class="input-medium" type="password" id="newpasswd2" value="">
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <a href="#" class="btn" data-dismiss="modal">关闭</a>
        <button type="submit" class="btn btn-primary" id="myChangePasswd-modal-sub">提交</button>
    </div>
    <script>
        $("#myChangePasswd-modal").find("#myChangePasswd-modal-sub").click(function () {
            var user = $('#myChangePasswd-modal').find('#name').val();
            var newpasswd1 = $('#myChangePasswd-modal').find('#newpasswd1').val();
            var newpasswd2 = $('#myChangePasswd-modal').find('#newpasswd2').val();
            var oldpasswd = $('#myChangePasswd-modal').find('#oldpasswd').val();
            if (newpasswd1 != newpasswd2) {
                $('.index').noty({"text": "两次输入的密码不同，请重新输入!", "layout": "topLeft", "type": "error"});
                $('#myChangePasswd-modal').find('#newpasswd1').val("");
                $('#myChangePasswd-modal').find('#newpasswd2').val("");
            }
            else if (newpasswd1 === "") {
                $('.index').noty({"text": "密码不能为空", "layout": "topLeft", "type": "error"});
            }
            else {
                $.post("changePasswd.php",
                    {
                        type: 2,
                        user: user,
                        oldPasswd: oldpasswd,
                        newPasswd: newpasswd1
                    },
                    function (data, status) {
                        if (status == 'success') {
                            if (data == 'ok') {
                                $('.index').noty({"text": "成功修改密码", "layout": "topLeft", "type": "success"});
                                $('#myChangePasswd-modal').modal('hide');
                            }
                            else {
                                $('.index').noty({"text": "error:" + data, "layout": "topLeft", "type": "error"});
                            }
                        }
                        else {
                            $('.index').noty({"text": "js post error0!", "layout": "topLeft", "type": "error"});
                        }
                    }
                )
            }
        });
    </script>
</div>
</body>
</html>
