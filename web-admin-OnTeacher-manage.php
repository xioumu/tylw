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
    <?php include('script.php'); ?>
    <?php include('myFunction.php'); ?>
</head>

<body class="">
<!-- topbar starts -->
<?php
include('header.php');
?>
<!-- topbar ends -->
<div class="container-fluid">
    <div class="row-fluid">
        <!-- left menu starts -->
        <?php include('web-admin-left.php'); ?>
        <!-- left menu ends -->
        <div id="content" class="span10">
            <!-- road -->
            <div>
                <ul class = "breadcrumb">
                    <li>
                        <a href = "web-admin-student-manage.php">网站管理员</a> <span class = "divider">/</span>
                    </li>
                    <li>
                        <a href = "web-admin-student-manage.php">管理校内专家账户</a>
                    </li>
                </ul>
            </div>
            <!-- content starts -->
            <div class="row-fluid sortable">
                <div class="box span12">
                    <div class="box-header well" data-original-title>
                        <h2>管理校内专家账号</h2>
                        <div class="box-icon">
                            <a href = "web-admin-add-OnTeachear.php" class = "btn btn-success">导入校内专家账户</a>
                            <a href = "leadOutPasswd.php?type=onTea" class = "btn btn-primary left" target = "view_window">导出校内专家账户密码</a>
                            <button type = "submit" class = "btn btn-danger left" onclick="delAllOnTeaUser()">删除全部校内专家账户</button>
                        </div>
                    </div>
                    <div class="box-content">
                        <form class="form-horizontal">
                            <table class="table table-striped table-bordered bootstrap-datatable datatable">
                                <thead>
                                <th>姓名</th>
                                <th>工号</th>
                                <th>校内专业</th>
                                <th>研究方向</th>
                                <th>评审截止日期</th>
                                <th>状态</th>
                                <th>操作</th>
                                </thead>
                                <tr>
                                    <td>张三</td>
                                    <td>123455678</td>
                                    <td>竞技体育</td>
                                    <td>体育教育训练学</td>
                                    <td>2013/12/27</td>
                                    <td><span class="label label-important">还未评测完毕</span></td>
                                    <td>
                                        <a href="#myBox1" class="btn btn-info btn-setting" data-toggle="modal">修改信息</a>
                                        <a href="" class="btn btn-info btn-danger">删除</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>王五</td>
                                    <td>12455678</td>
                                    <td>运动学</td>
                                    <td>高级运动学</td>
                                    <td>2013/12/29</td>
                                    <td><span class="label label-success">已经全部评测完毕</span></td>
                                    <td>
                                        <a href="#myBox1" class="btn btn-info btn-setting" data-toggle="modal">修改信息</a>
                                        <a href="" class="btn btn-info btn-danger">删除</a>
                                    </td>
                                </tr>
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
</div>

</div><!--/.fluid-container-->

<!-- modal -->
<div class="modal hide" id="myBox1">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">×</button>
        <h3>修改校内专家信息</h3>
    </div>
    <div class="modal-body table-striped form-horizontal">
        <div class="">
            <fieldset>
                <div class="control-group">
                    <label class="control-label">姓名</label>

                    <div class="controls">
                        <input class="input-medium disabled" id="name" type="text" value="张三" disabled="">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">工号</label>

                    <div class="controls">
                        <input class="input-medium disabled" id="stdentID" type="text" value="12345678" disabled="">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label  " for="sex">性别</label>

                    <div class="controls">
                        <select id="sex" class="input-medium">
                            <option>男</option>
                            <option>女</option>
                            <option>未知</option>
                        </select>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="grade">校内专业</label>

                    <div class="controls">
                        <input class="input-medium" type="text" id="grade" value="竞技体育">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="grade">研究方向</label>

                    <div class="controls">
                        <input class="input-medium" type="text" id="grade" value="体育教育训练学">
                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label" for="date01">评审截止日期</label>

                    <div class="controls">
                        <input type="text" class="input-medium datepicker" id="date01" value="12/27/13">
                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label  " for="state">状态</label>

                    <div class="controls">
                        <select id="state" class="input-medium" disabled>
                            <option>已经全部评测完毕</option>
                            <option selected>还未评测完毕</option>
                        </select>
                    </div>
                </div>
            </fieldset>
        </div>
    </div>
    <div class="modal-footer">
        <a href="#" class="btn" data-dismiss="modal">关闭</a>
        <button type="submit" class="btn btn-primary">保存</button>
    </div>
</div>
</body>
</html>
