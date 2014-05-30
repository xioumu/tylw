<!DOCTYPE html>
<?php include("config.php"); ?>
<html lang = "zh">
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
<?php include('on-teacher-left.php'); ?>
<!-- left menu ends -->
<div id = "content" class = "span10">
<!--    road -->
<div>
    <ul class = "breadcrumb">
        <li><a href = "on-teacher-info.php">校内专家</a> <span class = "divider">/</span></li>
        <li><a href = "on-teacher-check.php">查看个人信息</a><span class = "divider">/</span></li>
        <li><a href = "on-teacher-check-info.php">审评论文</a>
    </ul>
</div>
<?php
if (!isset($_GET['id'])) {
    exit;
}
$self = $_SESSION['is_login'];
$eid = $_GET['id'];
$evaInfo = getEvaInfo($eid);
$stuInfo = getStuInfo($evaInfo['studentID']);
$teaInfo = getOnTeaInfo($self);
if ($evaInfo['teacherID'] != $self) {
    errorUser();
}
if (overDeadline($teaInfo['TdeadLine'])) {
    goHis("已经超过截止日期");
}
?>
<!-- content starts -->
<div class = "row-fluid sortable">
<div class = "box span12">
<div class = "box-header well" data-original-title>
    <h2>评审论文</h2><h3>(所有表格都必须填写或选择，否则将提交失败)</h3>
</div>
<div class = "box-content">
<form class = "form-horizontal" action = "submitEvaInfo.php?id=<?php echo $eid; ?>" method = "post">
<table class = "table table-bordered">
<tr>
    <th class = "boxContent title" colspan = "1">论文编号</th>
    <td class = "boxContent " colspan = "2"><?php echo $stuInfo['paperNum']; ?></td>
    <th class = "boxContent title" colspan = "1">论文题目</th>
    <td class = "boxContent" colspan = "2"><?php echo $stuInfo['paperName']; ?></td>
</tr>
<tr>
    <th class = "boxContent">论文下载</th>
    <?php
    if ($stuInfo['paperAdd'] != "") echo "<td colspan = \"5\"><a href = \"{$stuInfo['paperAdd']}\" class = \"btn btn-primary\" target=\"view_window\">下载</a></td>";
    else if ($stuInfo['paperAdd'] != "") echo "<td colspan = \"5\"><a href = \"#\" class = \"btn btn-danger\">还未上传</a></td>";
    ?>
</tr>
<tr>
    <th class = "boxContent">评价要素
    </th class="boxContent">
    <th colspan = "4" class = "boxContent">参考内容</th>
    <th colspan = "1" class = "boxContent">评分</th>
</tr>
<tr>
    <th class = "boxContent"><p>论文选题</p></th>
    <th colspan = "4">接触学科前沿，理论或实际意义</th>
    <th colspan = "1">
        <label class = "radio">
            优秀<input type = "radio" name = "C1" id = "A" value = "1">
        </label>
        <label class = "radio">
            良好<input type = "radio" name = "C1" id = "B" value = "2">
        </label>
        <label class = "radio">
            合格<input type = "radio" name = "C1" id = "C" value = "3">
        </label>
        <label class = "radio">
            不合格<input type = "radio" name = "C1" id = "D" value = "4">
        </label>
    </th>
</tr>
<tr>
    <th class = "boxContent"><p>文献综述</p></th>
    <th colspan = "4">阅读量、综合分析能力，了解本学科专业学术动态程度义</th>
    <th colspan = "1">
        <label class = "radio">
            优秀<input type = "radio" name = "C2" id = "A" value = "1">
        </label>
        <label class = "radio">
            良好<input type = "radio" name = "C2" id = "B" value = "2">
        </label>
        <label class = "radio">
            合格<input type = "radio" name = "C2" id = "C" value = "3">
        </label>
        <label class = "radio">
            不合格<input type = "radio" name = "C2" id = "D" value = "4">
        </label>
    </th>
</tr>
<tr>
    <th class = "boxContent"><p>成果与创新</p></th>
    <th colspan = "4">论文成果与新见解</th>
    <th colspan = "1">
        <label class = "radio">
            优秀<input type = "radio" name = "C3" id = "A" value = "1">
        </label>
        <label class = "radio">
            良好<input type = "radio" name = "C3" id = "B" value = "2">
        </label>
        <label class = "radio">
            合格<input type = "radio" name = "C3" id = "C" value = "3">
        </label>
        <label class = "radio">
            不合格<input type = "radio" name = "C3" id = "D" value = "4">
        </label>
    </th>
</tr>
<tr>
    <th class = "boxContent"><p>论基础理论与专门知识 </p></th>
    <th colspan = "4">基础理论的坚实度、专门知识的系统性</th>
    <th colspan = "1">
        <label class = "radio">
            优秀<input type = "radio" name = "C4" id = "A" value = "1">
        </label>
        <label class = "radio">
            良好<input type = "radio" name = "C4" id = "B" value = "2">
        </label>
        <label class = "radio">
            合格<input type = "radio" name = "C4" id = "C" value = "3">
        </label>
        <label class = "radio">
            不合格<input type = "radio" name = "C4" id = "D" value = "4">
        </label>
    </th>
</tr>
<tr>
    <th class = "boxContent"><p>研究手段或设计能力</p></th>
    <th colspan = "4">研究方法是否恰当并加以严格论证，独立进行分析问题，解决问题的能力如何</th>
    <th colspan = "1">
        <label class = "radio">
            优秀<input type = "radio" name = "C5" id = "A" value = "1">
        </label>
        <label class = "radio">
            良好<input type = "radio" name = "C5" id = "B" value = "2">
        </label>
        <label class = "radio">
            合格<input type = "radio" name = "C5" id = "C" value = "3">
        </label>
        <label class = "radio">
            不合格<input type = "radio" name = "C5" id = "D" value = "4">
        </label>
    </th>
</tr>
<tr>
    <th class = "boxContent"><p>写作能力与学风</p></th>
    <th colspan = "4">条理性、逻辑性、文笔等各方面，书写格式、图表是否规范</th>
    <th colspan = "1">
        <label class = "radio">
            优秀<input type = "radio" name = "C6" id = "A" value = "1">
        </label>
        <label class = "radio">
            良好<input type = "radio" name = "C6" id = "B" value = "2">
        </label>
        <label class = "radio">
            合格<input type = "radio" name = "C6" id = "C" value = "3">
        </label>
        <label class = "radio">
            不合格<input type = "radio" name = "C6" id = "D" value = "4">
        </label>
    </th>
</tr>
<tr>
    <th class = "boxContent"><p>工作量</p></th>
    <th colspan = "4">工作量及难度</th>
    <th colspan = "1">
        <label class = "radio">
            优秀<input type = "radio" name = "C7" id = "A" value = "1">
        </label>
        <label class = "radio">
            良好<input type = "radio" name = "C7" id = "B" value = "2">
        </label>
        <label class = "radio">
            合格<input type = "radio" name = "C7" id = "C" value = "3">
        </label>
        <label class = "radio">
            不合格<input type = "radio" name = "C7" id = "D" value = "4">
        </label>
    </th>
</tr>
<tr>
    <th class = "boxContent"><p>参考文献</p></th>
    <th colspan = "4">参考文献的总量；外文文献的数量；参考文献的质量等。</th>
    <th colspan = "1">
        <label class = "radio">
            优秀<input type = "radio" name = "C8" id = "A" value = "1">
        </label>
        <label class = "radio">
            良好<input type = "radio" name = "C8" id = "B" value = "2">
        </label>
        <label class = "radio">
            合格<input type = "radio" name = "C8" id = "C" value = "3">
        </label>
        <label class = "radio">
            不合格<input type = "radio" name = "C8" id = "D" value = "4">
        </label>
    </th>
</tr>
<tr>
    <th class = "boxContent"><p>是否抄袭</p></th>
    <th colspan = "5">
        <div class = "control-group">
            <div class = "controls">
                <label class = "radio">
                    有抄袭现象<input type = "radio" name = "C9" id = "A" value = "1">
                </label>
                <label class = "radio">
                    无抄袭现象<input type = "radio" name = "C9" id = "B" value = "2">
                </label>
            </div>
        </div>
    </th>
</tr>
<tr>
    <th class = "boxContent"><p>论文能否答辩</p></th>
    <th colspan = "5">
        <div class = "control-group">
            <div class = "controls">
                <label class = "radio">
                    同意答辩<input type = "radio" name = "C10" id = "A" value = "1">
                </label>
                <label class = "radio">
                    同意答辩但稍作修改<input type = "radio" name = "C10" id = "B" value = "2">
                </label>
                <label class = "radio">
                    不同意答辩<input type = "radio" name = "C10" id = "C" value = "3">
                </label>
            </div>
        </div>
    </th>
</tr>
<tr>
    <th class = "boxContent"><p>对论文水平的总体评价</p></th>
    <th colspan = "5">
        <div class = "control-group">
            <div class = "controls">
                <label class = "radio">
                    优秀<input type = "radio" name = "C11" id = "A" value = "1">
                </label>
                <label class = "radio">
                    良好<input type = "radio" name = "C11" id = "B" value = "2">
                </label>
                <label class = "radio">
                    合格<input type = "radio" name = "C11" id = "C" value = "3">
                </label>
                <label class = "radio">
                    不合格<input type = "radio" name = "C11" id = "D" value = "4">
                </label>
            </div>
        </div>
    </th>
</tr>
<tr>
    <th colspan = "6">
        <div class = "control-group">
            <label> 论文的不足之处及对论文工作的意见或建议: </label>
            <textarea rows = "10" cols = "10" name = "summary" class = "myWitch970" id = "summary"> </textarea>
        </div>
    </th>
</tr>
<tr>
    <th colspan = "3">
        <div class = "control-group">
            <label class = "control-label">评阅人:</label>
            <div class = "controls">
                <input class = "" type = "text" name = "T1">
            </div>
        </div>
    </th>
    <th colspan = "3">
        <div class = "control-group">
            <label class = "control-label">学科专业:</label>
            <div class = "controls">
                <input class = "" type = "text" name = "T2">
            </div>
        </div>
    </th>
</tr>
<tr>
    <th colspan = "3">
        <div class = "control-group">
            <label class = "control-label">专业技术职称:</label>
            <div class = "controls">
                <input class = "" type = "text" name = "T3">
            </div>
        </div>
    </th>
    <th colspan = "3">
        <div class = "control-group">
            <label class = "control-label" for = "report">工作单位:</label>
            <div class = "controls">
                <input class = "" type = "text" name = "T4">
            </div>
        </div>
    </th>
</tr>
<tr>
    <th colspan = "3">
        <div class = "control-group">
            <label class = "control-label">联系方式:</label>
            <div class = "controls">
                <input class = "" type = "text" name = "T5">
            </div>
        </div>
    </th>
    <th colspan = "3">
        <div class = "control-group">
            <label class = "control-label">评审日期:</label>
            <div class = "controls">
                <input class = "datepicker" type = "text" name = "time">
            </div>
        </div>
    </th>
</tr>
</table>
<button type = "submit" class = "btn btn-primary myInvisible" id = "form_submit">提交</button>
</form>
<div class = "form-actions">
    <span href = "#" class = "btn btn-primary btn-large" onclick = "submit()">提交</span>
</div>
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

</div>
<script>
    function checkEmpty() {
        if ($('#summary').val() =="")
            return false;

        for (var i = 1; i <= 11; i++) {
            if (!$(':radio[name=C' + i + ']:checked'))
                return false;
        }
        for (var i = 1; i <= 5; i++) {
            if ($(':input[name=T' + i + ']').val() == '')
                return false;
        }
        if ($(':input[name=time]').val() == '')
            return false;
        return true;
    }
    function submit() {
        if (checkEmpty()) {
            $('form').submit();
        }
        else {
            alert("提交失败，有表格都未填写或选择!");
        }
    }
</script>
</body>
</html>
