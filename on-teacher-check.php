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
        <?php include('on-teacher-left.php'); ?>
        <!-- left menu ends -->
        <div id = "content" class = "span10">
            <!--    road -->
            <div>
                <ul class = "breadcrumb">
                    <li><a href = "on-teacher-info.php">校内专家</a> <span class = "divider">/</span></li>
                    <li><a href = "on-teacher-check.php">查看个人信息</a></li>
                </ul>
            </div>
            <?php
            function getAllUserEva($user, $type) {
                $res = array();
                $que = mysql_query("SELECT * FROM evaluating WHERE {$type} = '{$user}'");
                while ($row = mysql_fetch_array($que)) {
                    array_push($res, $row['eid']);
                }
                return $res;
            }

            $self = $_SESSION['is_login'];
            $teaInfo = getOnTeaInfo($self);
            $allEva = getAllUserEva($self, "teacherID")
            ?>
            <!-- content starts -->
            <div class = "row-fluid sortable">
                <div class = "box span12">
                    <div class = "box-header well" data-original-title>
                        <h2>查看论文</h2>
                        <div class = "box-icon">
                            <h3>评审截止时间：<?php echo $teaInfo['TdeadLine']; ?></h3>
                        </div>
                    </div>
                    <div class = "box-content">
                        <form class = "form-horizontal">
                            <table class = "table table-striped table-bordered bootstrap-datatable datatable">
                                <thead>
                                <th>论文名称</th>
                                <th>论文编号</th>
                                <th>学生校内方向</th>
                                <th>是否已评</th>
                                <th>操作</th>
                                </thead>
                                <?php
                                foreach ($allEva as $evaID) {
                                    $evaInfo = getEvaInfo($evaID);
                                    $stuInfo = getStuInfo($evaInfo['studentID']);
                                    $status = getEvaStatus($evaID);
                                    echo "<tr>";
                                    echo "<td>{$stuInfo['paperName']}</td>";
                                    echo "<td>{$stuInfo['paperNum']}</td>";
                                    echo "<td>{$stuInfo['subject']}</td>";
                                    echo "<td>{$status}</td>";
                                    echo "<td><a href=\"on-teacher-check-info.php?id={$evaID}\" class=\"btn btn-info\" >审评</a></td>";
                                    echo "</tr>";
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
<!--/.fluid-container-->

<!-- box -->
<div class = "mybox modal hide" id = "myBox1">
<div class = "modal-header">
    <button type = "button" class = "close" data-dismiss = "modal">×</button>
    <h3>评审</h3>
</div>
<form>
<div class = "modal-body table-striped">
<table class = "table table-bordered">
<tr>
    <th class = "boxContent title">学号</th>
    <td class = "boxContent">105222010bs010</td>
    <th class = "boxContent">姓名</th>
    <td class = "boxContent">张四三二</td>
    <th class = "boxContent">专业</th>
    <td class = "boxContent">体育教育训练学</td>
</tr>
<tr>
    <th class = "boxContent">论文下载</th>
    <td colspan = "5"><a class = "btn btn-success">下载</a></td>
</tr>
<tr>
    <th class = "boxContent">评价指标
        <p>（权重）</p>
    </th class="boxContent">
    <th colspan = "3" class = "boxContent">评价内容</th>
    <th colspan = "2" class = "boxContent">评分</th>
</tr>
<tr>
    <th class = "boxContent"><p>论文选题与综述</p>
        <p>（15%）</p>
    </th class="boxContent">
    <th colspan = "3">接触学科前沿，理论或实际意义；<br>阅读量、综合分析能力，了解本专业学术动态程度</th>
    <th colspan = "2">
        <div class = "control-group">
            <div class = "controls">
                <label class = "radio">
                    <input type = "radio" name = "box11" id = "A" value = "A">优秀
                </label>
                <label class = "radio">
                    <input type = "radio" name = "box11" id = "B" value = "B">良好
                </label>
                <label class = "radio">
                    <input type = "radio" name = "box11" id = "C" value = "C">合格
                </label>
                <label class = "radio">
                    <input type = "radio" name = "box11" id = "D" value = "D">不合格
                </label>
            </div>
        </div>
    </th>
</tr>
<tr>
    <th class = "boxContent"><p>研究思路与方法</p>
        <p>（30%）</p>
    </th class="boxContent">
    <th colspan = "3">研究思路清晰，调查研究与分析方法（如测量工具、统计分析方法）先进、科学，结论正确</th>
    <th colspan = "2">
        <div class = "control-group">
            <div class = "controls">
                <label class = "radio">
                    <input type = "radio" name = "box12" id = "A" value = "A">优秀
                </label>
                <label class = "radio">
                    <input type = "radio" name = "box12" id = "B" value = "B">良好
                </label>
                <label class = "radio">
                    <input type = "radio" name = "box12" id = "C" value = "C">合格
                </label>
                <label class = "radio">
                    <input type = "radio" name = "box12" id = "D" value = "D">不合格
                </label>
            </div>
        </div>
    </th>
</tr>
<tr>
    <th class = "boxContent"><p>研究结果与结论</p>
        <p>（25%）</p>
    </th class="boxContent">
    <th colspan = "3">结果准确、真实；结论恰当，有一定的社会效益或学术贡献</th>
    <th colspan = "2">
        <div class = "control-group">
            <div class = "controls">
                <label class = "radio">
                    <input type = "radio" name = "box13" id = "A" value = "A">优秀
                </label>
                <label class = "radio">
                    <input type = "radio" name = "box13" id = "B" value = "B">良好
                </label>
                <label class = "radio">
                    <input type = "radio" name = "box13" id = "C" value = "C">合格
                </label>
                <label class = "radio">
                    <input type = "radio" name = "box13" id = "D" value = "D">不合格
                </label>
            </div>
        </div>
    </th>
</tr>
<tr>
    <th class = "boxContent"><p>论文格式与写作</p>
        <p>（10%）</p>
    </th class="boxContent">
    <th colspan = "3">条理清楚，层次分明，文笔流畅；书写格式、图表规范；外文摘要语句无错</th>
    <th colspan = "2">
        <div class = "control-group">
            <div class = "controls">
                <label class = "radio">
                    <input type = "radio" name = "box14" id = "A" value = "A">优秀
                </label>
                <label class = "radio">
                    <input type = "radio" name = "box14" id = "B" value = "B">良好
                </label>
                <label class = "radio">
                    <input type = "radio" name = "box14" id = "C" value = "C">合格
                </label>
                <label class = "radio">
                    <input type = "radio" name = "box14" id = "D" value = "D">不合格
                </label>
            </div>
        </div>
    </th>
</tr>
<tr>
    <th class = "boxContent"><p>论文工作量</p>
        <p>（5%）</p>
    </th class="boxContent">
    <th colspan = "3">字数不得少于5万字</th>
    <th colspan = "2">
        <div class = "control-group">
            <div class = "controls">
                <label class = "radio">
                    <input type = "radio" name = "box15" id = "A" value = "A">优秀
                </label>
                <label class = "radio">
                    <input type = "radio" name = "box15" id = "B" value = "B">良好
                </label>
                <label class = "radio">
                    <input type = "radio" name = "box15" id = "C" value = "C">合格
                </label>
                <label class = "radio">
                    <input type = "radio" name = "box15" id = "D" value = "D">不合格
                </label>
            </div>
        </div>
    </th>
</tr>
<tr>
    <th class = "boxContent"><p>论文报告与答辩</p>
        <p>（10%）</p>
    </th class="boxContent">
    <th colspan = "3">能流利、清晰地报告论文的主要内容；能准确回答各种问题</th>
    <th colspan = "2">
        <div class = "control-group">
            <div class = "controls">
                <label class = "radio">
                    <input type = "radio" name = "box16" id = "A" value = "A">优秀
                </label>
                <label class = "radio">
                    <input type = "radio" name = "box16" id = "B" value = "B">良好
                </label>
                <label class = "radio">
                    <input type = "radio" name = "box16" id = "C" value = "C">合格
                </label>
                <label class = "radio">
                    <input type = "radio" name = "box16" id = "D" value = "D">不合格
                </label>
            </div>
        </div>
    </th>
</tr>
<tr>
    <th class = "boxContent"><p>参考文献</p>
        <p>（5%）</p>
    </th class="boxContent">
    <th colspan = "3">参考文献的总量；外文文献的数量；参考文献的质量等</th>
    <th colspan = "2">
        <div class = "control-group">
            <div class = "controls">
                <label class = "radio">
                    <input type = "radio" name = "box17" id = "A" value = "A">优秀
                </label>
                <label class = "radio">
                    <input type = "radio" name = "box17" id = "B" value = "B">良好
                </label>
                <label class = "radio">
                    <input type = "radio" name = "box17" id = "C" value = "C">合格
                </label>
                <label class = "radio">
                    <input type = "radio" name = "box17" id = "D" value = "D">不合格
                </label>
            </div>
        </div>
    </th>
</tr>
<tr>
    <th class = "boxContent">总体评价</th>
    <td colspan = "5">
        <div class = "control-group">
            <div class = "controls">
                <label class = "radio">
                    <input type = "radio" name = "box18" id = "A" value = "A">优秀
                </label>
                <label class = "radio">
                    <input type = "radio" name = "box18" id = "B" value = "B">良好
                </label>
                <label class = "radio">
                    <input type = "radio" name = "box18" id = "C" value = "C">合格
                </label>
                <label class = "radio">
                    <input type = "radio" name = "box18" id = "D" value = "D">不合格
                </label>
            </div>
        </div>
    </td>
</tr>
<tr>
    <th class = "boxContent">表决意见</th>
    <td colspan = "5">
        <div class = "control-group">
            <div class = "controls">
                <label class = "radio">
                    <input type = "radio" name = "box19" id = "A" value = "A">建议立即授予学位
                </label>
                <label class = "radio">
                    <input type = "radio" name = "box19" id = "B" value = "B">建议论文修改后授予学位
                </label>
                <label class = "radio">
                    <input type = "radio" name = "box19" id = "C" value = "C">建议不授予学位
                </label>
            </div>
        </div>
    </td>
</tr>
</table>
</div>
<div class = "modal-footer">
    <a href = "#" class = "btn" data-dismiss = "modal">关闭</a>
    <button type = "submit" class = "btn btn-primary">保存</button>
</div>
</form>
</div>

<div class = "mybox modal hide fade" id = "myBox2">
<div class = "modal-header">
    <button type = "button" class = "close" data-dismiss = "modal">×</button>
    <h3>评审</h3>
</div>
<form>
<div class = "modal-body table-striped">
<table class = "table table-bordered">
<tr>
    <th class = "boxContent title">学号</th>
    <td class = "boxContent">1234678765432</td>
    <th class = "boxContent">姓名</th>
    <td class = "boxContent">王七五</td>
    <th class = "boxContent">专业</th>
    <td class = "boxContent">体育教育训练学</td>
</tr>
<tr>
    <th class = "boxContent">论文下载</th>
    <td colspan = "5"><a class = "btn btn-success">下载</a></td>
</tr>
<tr>
    <th class = "boxContent">评价指标
        <p>（权重）</p>
    </th class="boxContent">
    <th colspan = "3" class = "boxContent">评价内容</th>
    <th colspan = "2" class = "boxContent">评分</th>
</tr>
<tr>
    <th class = "boxContent"><p>论文选题与综述</p>
        <p>（15%）</p>
    </th class="boxContent">
    <th colspan = "3">接触学科前沿，理论或实际意义；<br>阅读量、综合分析能力，了解本专业学术动态程度</th>
    <th colspan = "2">
        <div class = "control-group">
            <div class = "controls">
                <label class = "radio">
                    <input type = "radio" name = "box21" id = "A" value = "A">优秀
                </label>
                <label class = "radio">
                    <input type = "radio" name = "box21" id = "B" value = "B">良好
                </label>
                <label class = "radio">
                    <input type = "radio" name = "box21" id = "C" value = "C">合格
                </label>
                <label class = "radio">
                    <input type = "radio" name = "box21" id = "D" value = "D">不合格
                </label>
            </div>
        </div>
    </th>
</tr>
<tr>
    <th class = "boxContent"><p>研究思路与方法</p>
        <p>（30%）</p>
    </th class="boxContent">
    <th colspan = "3">研究思路清晰，调查研究与分析方法（如测量工具、统计分析方法）先进、科学，结论正确</th>
    <th colspan = "2">
        <div class = "control-group">
            <div class = "controls">
                <label class = "radio">
                    <input type = "radio" name = "box22" id = "A" value = "A">优秀
                </label>
                <label class = "radio">
                    <input type = "radio" name = "box22" id = "B" value = "B">良好
                </label>
                <label class = "radio">
                    <input type = "radio" name = "box22" id = "C" value = "C">合格
                </label>
                <label class = "radio">
                    <input type = "radio" name = "box22" id = "D" value = "D">不合格
                </label>
            </div>
        </div>
    </th>
</tr>
<tr>
    <th class = "boxContent"><p>研究结果与结论</p>
        <p>（25%）</p>
    </th class="boxContent">
    <th colspan = "3">结果准确、真实；结论恰当，有一定的社会效益或学术贡献</th>
    <th colspan = "2">
        <div class = "control-group">
            <div class = "controls">
                <label class = "radio">
                    <input type = "radio" name = "box23" id = "A" value = "A">优秀
                </label>
                <label class = "radio">
                    <input type = "radio" name = "box23" id = "B" value = "B">良好
                </label>
                <label class = "radio">
                    <input type = "radio" name = "box23" id = "C" value = "C">合格
                </label>
                <label class = "radio">
                    <input type = "radio" name = "box23" id = "D" value = "D">不合格
                </label>
            </div>
        </div>
    </th>
</tr>
<tr>
    <th class = "boxContent"><p>论文格式与写作</p>
        <p>（10%）</p>
    </th class="boxContent">
    <th colspan = "3">条理清楚，层次分明，文笔流畅；书写格式、图表规范；外文摘要语句无错</th>
    <th colspan = "2">
        <div class = "control-group">
            <div class = "controls">
                <label class = "radio">
                    <input type = "radio" name = "box24" id = "A" value = "A">优秀
                </label>
                <label class = "radio">
                    <input type = "radio" name = "box24" id = "B" value = "B">良好
                </label>
                <label class = "radio">
                    <input type = "radio" name = "box24" id = "C" value = "C">合格
                </label>
                <label class = "radio">
                    <input type = "radio" name = "box24" id = "D" value = "D">不合格
                </label>
            </div>
        </div>
    </th>
</tr>
<tr>
    <th class = "boxContent"><p>论文工作量</p>
        <p>（5%）</p>
    </th class="boxContent">
    <th colspan = "3">字数不得少于5万字</th>
    <th colspan = "2">
        <div class = "control-group">
            <div class = "controls">
                <label class = "radio">
                    <input type = "radio" name = "box25" id = "A" value = "A">优秀
                </label>
                <label class = "radio">
                    <input type = "radio" name = "box25" id = "B" value = "B">良好
                </label>
                <label class = "radio">
                    <input type = "radio" name = "box25" id = "C" value = "C">合格
                </label>
                <label class = "radio">
                    <input type = "radio" name = "box25" id = "D" value = "D">不合格
                </label>
            </div>
        </div>
    </th>
</tr>
<tr>
    <th class = "boxContent"><p>论文报告与答辩</p>
        <p>（10%）</p>
    </th class="boxContent">
    <th colspan = "3">能流利、清晰地报告论文的主要内容；能准确回答各种问题</th>
    <th colspan = "2">
        <div class = "control-group">
            <div class = "controls">
                <label class = "radio">
                    <input type = "radio" name = "box26" id = "A" value = "A">优秀
                </label>
                <label class = "radio">
                    <input type = "radio" name = "box26" id = "B" value = "B">良好
                </label>
                <label class = "radio">
                    <input type = "radio" name = "box26" id = "C" value = "C">合格
                </label>
                <label class = "radio">
                    <input type = "radio" name = "box26" id = "D" value = "D">不合格
                </label>
            </div>
        </div>
    </th>
</tr>
<tr>
    <th class = "boxContent"><p>参考文献</p>
        <p>（5%）</p>
    </th class="boxContent">
    <th colspan = "3">参考文献的总量；外文文献的数量；参考文献的质量等</th>
    <th colspan = "2">
        <div class = "control-group">
            <div class = "controls">
                <label class = "radio">
                    <input type = "radio" name = "box27" id = "A" value = "A">优秀
                </label>
                <label class = "radio">
                    <input type = "radio" name = "box27" id = "B" value = "B">良好
                </label>
                <label class = "radio">
                    <input type = "radio" name = "box27" id = "C" value = "C">合格
                </label>
                <label class = "radio">
                    <input type = "radio" name = "box27" id = "D" value = "D">不合格
                </label>
            </div>
        </div>
    </th>
</tr>
<tr>
    <th class = "boxContent">总体评价</th>
    <td colspan = "5">
        <div class = "control-group">
            <div class = "controls">
                <label class = "radio">
                    <input type = "radio" name = "box28" id = "A" value = "A">优秀
                </label>
                <label class = "radio">
                    <input type = "radio" name = "box28" id = "B" value = "B">良好
                </label>
                <label class = "radio">
                    <input type = "radio" name = "box28" id = "C" value = "C">合格
                </label>
                <label class = "radio">
                    <input type = "radio" name = "box28" id = "D" value = "D">不合格
                </label>
            </div>
        </div>
    </td>
</tr>
<tr>
    <th class = "boxContent">表决意见</th>
    <td colspan = "5">
        <div class = "control-group">
            <div class = "controls">
                <label class = "radio">
                    <input type = "radio" name = "box29" id = "A" value = "A">建议立即授予学位
                </label>
                <label class = "radio">
                    <input type = "radio" name = "box29" id = "B" value = "B">建议论文修改后授予学位
                </label>
                <label class = "radio">
                    <input type = "radio" name = "box29" id = "C" value = "C">建议不授予学位
                </label>
            </div>
        </div>
    </td>
</tr>
</table>
</div>
<div class = "modal-footer">
    <a href = "#" class = "btn" data-dismiss = "modal">关闭</a>
    <button type = "submit" class = "btn btn-primary">保存</button>
</div>
</form>
</div>
</body>
</html>
