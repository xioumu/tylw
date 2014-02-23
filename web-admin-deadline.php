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
            <?php
            if (isset($_POST['studentDate']) && $_POST['studentDate'] != "") {
                $deadLine = changeData($_POST['studentDate']);
                if (!mysql_query("UPDATE student SET SdeadLine = '{$deadLine}'")) {
                    echo ' <script>$(\'.index\').noty({"text": "设置学生截止日期错误", "layout": "topLeft", "type": "error"});</script>';
                }
                else {
                    echo '<script>$(\'.index\').noty({"text": "设置学生截止日期成功", "layout": "topLeft", "type": "success"});</script>';
                }
            }
            if (isset($_POST['teacherDate']) && $_POST['teacherDate'] != ""){
                $deadLine = changeData($_POST['teacherDate']);
                if (!mysql_query("UPDATE teacheronside SET TdeadLine = '{$deadLine}'")) {
                    echo ' <script>$(\'.index\').noty({"text": "设置校内专家截止日期错误", "layout": "topLeft", "type": "error"});</script>';
                }
                else {
                    echo '<script>$(\'.index\').noty({"text": "设置校内专家截止日期成功", "layout": "topLeft", "type": "success"});</script>';
                }
                if (!mysql_query("UPDATE teacheroutside SET TdeadLine = '{$deadLine}'")) {
                    echo ' <script>$(\'.index\').noty({"text": "设置校外专家截止日期错误", "layout": "topLeft", "type": "error"});</script>';
                }
                else {
                    echo '<script>$(\'.index\').noty({"text": "设置校外专家截止日期成功", "layout": "topLeft", "type": "success"});</script>';
                }
            }
            ?>
            <!-- content starts -->
            <div class = "row-fluid sortable">
                <div class = "box span12">
                    <div class = "box-header well" data-original-title>
                        <h2>设置截止日期</h2>
                    </div>

                    <div class = "box-content">
                        <form class = "form-horizontal" action = "web-admin-deadline.php" method = "post">
                            <fieldset>
                                <div class = "control-group">
                                    <label class = "control-label" for = "date01">学生提交论文截止日期</label>
                                    <div class = "controls">
                                        <input type = "text" class = "input-medium datepicker" id = "date01"
                                               name = "studentDate" value = "">
                                    </div>
                                </div>
                                <div class = "control-group">
                                    <label class = "control-label" for = "date02">专家评审截止日期</label>
                                    <div class = "controls">
                                        <input type = "text" class = "input-medium datepicker" id = "date02"
                                               name = "teacherDate" value = "">
                                    </div>
                                </div>
                                <div class = "form-actions">
                                    <button type = "submit" class = "btn btn-primary ">保存</button>
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
<!--/.fluid-container-->

<!-- external javascript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->

<!-- jQuery -->
<script src = "js/jquery-1.7.2.min.js"></script>
<!-- jQuery UI -->
<script src = "js/jquery-ui-1.8.21.custom.min.js"></script>
<!-- transition / effect library -->
<script src = "js/bootstrap-transition.js"></script>
<!-- alert enhancer library -->
<script src = "js/bootstrap-alert.js"></script>
<!-- modal / dialog library -->
<script src = "js/bootstrap-modal.js"></script>
<!-- custom dropdown library -->
<script src = "js/bootstrap-dropdown.js"></script>
<!-- scrolspy library -->
<script src = "js/bootstrap-scrollspy.js"></script>
<!-- library for creating tabs -->
<script src = "js/bootstrap-tab.js"></script>
<!-- library for advanced tooltip -->
<script src = "js/bootstrap-tooltip.js"></script>
<!-- popover effect library -->
<script src = "js/bootstrap-popover.js"></script>
<!-- button enhancer library -->
<script src = "js/bootstrap-button.js"></script>
<!-- accordion library (optional, not used in demo) -->
<script src = "js/bootstrap-collapse.js"></script>
<!-- carousel slideshow library (optional, not used in demo) -->
<script src = "js/bootstrap-carousel.js"></script>
<!-- autocomplete library -->
<script src = "js/bootstrap-typeahead.js"></script>
<!-- tour library -->
<script src = "js/bootstrap-tour.js"></script>
<!-- library for cookie management -->
<script src = "js/jquery.cookie.js"></script>
<!-- calander plugin -->
<script src = 'js/fullcalendar.min.js'></script>
<!-- data table plugin -->
<script src = 'js/jquery.dataTables.min.js'></script>

<!-- chart libraries start -->
<script src = "js/excanvas.js"></script>
<script src = "js/jquery.flot.min.js"></script>
<script src = "js/jquery.flot.pie.min.js"></script>
<script src = "js/jquery.flot.stack.js"></script>
<script src = "js/jquery.flot.resize.min.js"></script>
<!-- chart libraries end -->

<!-- select or dropdown enhancer -->
<script src = "js/jquery.chosen.min.js"></script>
<!-- checkbox, radio, and file input styler -->
<script src = "js/jquery.uniform.min.js"></script>
<!-- plugin for gallery image view -->
<script src = "js/jquery.colorbox.min.js"></script>
<!-- rich text editor library -->
<script src = "js/jquery.cleditor.min.js"></script>
<!-- notification plugin -->
<script src = "js/jquery.noty.js"></script>
<!-- file manager library -->
<script src = "js/jquery.elfinder.min.js"></script>
<!-- star rating plugin -->
<script src = "js/jquery.raty.min.js"></script>
<!-- for iOS style toggle switch -->
<script src = "js/jquery.iphone.toggle.js"></script>
<!-- autogrowing textarea plugin -->
<script src = "js/jquery.autogrow-textarea.js"></script>
<!-- multiple file upload plugin -->
<script src = "js/jquery.uploadify-3.1.min.js"></script>
<!-- history.js for cross-browser state change on ajax -->
<script src = "js/jquery.history.js"></script>
<!-- application script for Charisma demo -->
<script src = "js/charisma.js"></script>


</body>
</html>
