<!DOCTYPE html>
<?php header("Content-Type: text/html;charset=utf-8"); ?>
<?php include("config.php"); ?>
<html lang = "en">
<head>
    <meta charset = "utf-8">
    <title>武汉体育学院学位管理系统</title>
    <?php include('css.php'); ?>
    <?php include('script.php'); ?>
    <?php include('myFunction.php'); ?>
</head>

<body class = "index">
<!-- topbar starts -->
<?php include('header.php'); ?>
<!-- topbar ends -->
<div class = "container-fluid">
    <div class = "row-fluid">
        <!-- left menu starts -->
        <?php include('web-admin-left.php'); ?>
        <!-- left menu ends -->
        <div id = "content" class = "span10">
            <!-- content starts -->
            <div class = "row-fluid sortable">
                <div class = "box span12">
                    <div class = "box-header well" data-original-title>
                        <h2>修改密码</h2>
                    </div>
                    <div class = "box-content">
                        <form class = "form-horizontal">
                            <fieldset>
                                <fieldset>
                                    <div class="control-group">
                                        <label class="control-label">用户名</label>
                                        <div class="controls">
                                            <input class="input-medium disabled" id="web-change-name" type="text">
                                        </div>
                                    </div>
                                </fieldset>
                                <div class="control-group">
                                    <label class="control-label" for="newpasswd">新密码</label>
                                    <div class="controls">
                                        <input class="input-medium" type="password" id="web-change-newpasswd1" value="">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="newpasswd2">新密码确认</label>
                                    <div class="controls">
                                        <input class="input-medium" type="password" id="web-change-newpasswd2" value="">
                                    </div>
                                </div>
                                <div class = "form-actions">
                                    <a href="#" type = "submit" class = "btn btn-primary" onclick="webChangePasswd()">提交</a>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                </div>
                <!--/span-->

            </div>
            <!--/row-->

            <!-- content ends -->
        </div>
        <!--/#content.span10-->
    </div>
    <!--/fluid-row-->
</div>
<script>
    function webChangePasswd() {
        var user = $('#web-change-name').val();
        var newpasswd1 = $('#web-change-newpasswd1').val();
        var newpasswd2 = $('#web-change-newpasswd2').val();
        if (newpasswd1 != newpasswd2) {
            $('.index').noty({"text": "两次输入的密码不同，请重新输入!", "layout": "topLeft", "type": "error"});
        }
        else if (newpasswd1 === "") {
            $('.index').noty({"text": "密码不能为空", "layout": "topLeft", "type": "error"});
        }
        else {
            $.post("changePasswd.php",
                {
                    type: 1,
                    user: user,
                    passwd: newpasswd1
                },
                function (data, status) {
                    if (status == 'success') {
                        if (data == 'ok') {
                            $('.index').noty({"text": "成功修改密码", "layout": "topLeft", "type": "success"});
                            $('#changePasswd-modal').modal('hide');
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
    }
</script>
<!--/.fluid-container-->
</body>
</html>
