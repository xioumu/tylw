<!DOCTYPE html>
<?php
header("Content-Type: text/html;charset=utf-8");
include("config.php");
?>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>武汉体育学院学位管理系统</title>
    <?php include('css.php'); ?>

</head>
<body class="index">
<!-- topbar starts -->
<?php include('header.php'); ?>
<!-- topbar ends -->
<div class="container-fluid">
    <div class="row-fluid">
        <!-- left menu starts -->
        <?php include('sys-admin-left.php'); ?>
        <!-- left menu ends -->
        <div id="content" class="span10">
            <!-- content starts -->
            <div class="row-fluid sortable">
                <div class="box span12">
                    <div class="box-header well" data-original-title>
                        <h2>管理网站管理员</h2>

                        <div class="box-icon">
                            <button type="submit" class="btn btn-success left">添加网站管理员</button>
                        </div>
                    </div>
                    <div class="box-content">
                        <form class="form-horizontal">
                            <table class="table table-striped table-bordered bootstrap-datatable datatable">
                                <thead>
                                <th>用户名</th>
                                <th>操作</th>
                                </thead>
                                <?php
                                $result = mysql_query("SELECT * FROM user WHERE uType = 'web' ");
                                while ($row = mysql_fetch_array($result)) {
                                    echo '<tr>';
                                    echo '<td>' . $row['user'] . '</td>';
                                    echo '<td><a href="#changePasswd-modal" class="btn btn-info" data-toggle="modal" onclick=changePasswd("' . $row['user'] . '") id="' . $row['user'] . '" data-toggle="modal">修改密码</a>' . "\n";
                                    echo '<a href="" class="btn btn-danger" data-toggle="modal" onclick = delWebUser(' . $row['user'] . ') id="' . $row['user'] . '">删除账号</a></td>';
                                    echo '</tr>';
                                }
                                ?>
                            </table>
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
<!-- modal -->
<div class="modal hide" id="changePasswd-modal">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">×</button>
        <h3>修改密码</h3>
    </div>
    <div class="modal-body table-striped form-horizontal">
        <fieldset>
            <div class="control-group">
                <label class="control-label">用户名</label>

                <div class="controls">
                    <input class="input-medium disabled" id="name" type="text" value="test1" disabled="">
                </div>
            </div>
        </fieldset>
        <div class="control-group">
            <label class="control-label" for="newpasswd">新密码</label>

            <div class="controls">
                <input class="input-xlarge" type="password" id="newpasswd1" value="">
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="newpasswd2">新密码确认</label>

            <div class="controls">
                <input class="input-xlarge" type="password" id="newpasswd2" value="">
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <a href="#" class="btn" data-dismiss="modal">关闭</a>
        <button type="submit" class="btn btn-primary" id="modal-sub">保存</button>
    </div>
</div>
<!--/.fluid-container-->
<!-- external javascript
================================================== -->
<?php include('script.php'); ?>
<script>
    function changePasswd(user) {
        $('#changePasswd-modal').find('#name').val(user);
    }
    $("#modal-sub").click(function () {
        var user = $('#changePasswd-modal').find('#name').val();
        var newpasswd1 = $('#changePasswd-modal').find('#newpasswd1').val();
        var newpasswd2 = $('#changePasswd-modal').find('#newpasswd2').val();
        if (newpasswd1 != newpasswd2) {
            alert("两次输入的密码不同，请重新输入!");
            $('#changePasswd-modal').find('#newpasswd1').val("");
            $('#changePasswd-modal').find('#newpasswd2').val("");
        }
        else if (newpasswd1 === "") {
            alert("密码不能为空！");
        }
        else {
            $.post("changePasswd,",
                {
                    user: user,
                    passwd: newpasswd1
                },
                function (data, status) {
                    alert(data + ":test:" + status);
                }
            )
        }
    });
</script>
<!-- Placed at the end of the document so the pages load faster -->

</body>
</html>
