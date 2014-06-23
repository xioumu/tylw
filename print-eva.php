<!DOCTYPE html>
<?php include("config.php"); ?>
<html lang = zh">
<head>
    <meta charset = "utf-8">
    <title>武汉体育学院学位管理系统</title>
    <?php include('script.php'); ?>
    <?php include('myFunction.php'); ?>
    <style media=print type="text/css">
        .noprint{ display: none;}
    </style>
</head>
<body>
<div>
    <div>
        <!-- road -->
        <div>
            <?php
            judgeUser(array('web', 'onTea', 'outTea'));
            if (!isset($_GET['id'])) {
                errorUser();
            }

            $eid = $_GET['id'];
            if (isset($_GET['judgeInfo'])) {
                judgeUser(array('web'));
                $evaInfo = getRecEvaInfo($eid, $_GET['judgeInfo']);
            }
            else {
                $self = $_SESSION['is_login'];
                $userType = getUserType($self);
                if ($userType != 'web' &&  !judgeTeaEva($self, $eid)) {
                    errorUser();
                }
                $evaInfo = getEvaInfo($eid);
                $stuInfo = getStuInfo($evaInfo['studentID']);
                $evaInfo['paperNum'] = $stuInfo['paperNum'];
                $evaInfo['paperName'] = $stuInfo['paperName'];
            }
            ?>
            <div>
                <div>
                    <div class="noprint">
                        <div>
                            <button onclick="myPrint()">打印</button>
                        </div>
                    </div>
                    <div>
                        <table border = "1"  border = "1" style="border-collapse:collapse;">
                            <caption>
                                <strong style="font-size:1.5em;">武汉体育学院论文盲审评阅书</strong>
                            </caption>
                            <tr>
                                <th colspan = "1">论文编号</th>
                                <td colspan = "2"><?php echo $evaInfo['paperNum']; ?></td>
                                <th colspan = "2">论文题目</th>
                                <td colspan = "1"><?php echo $evaInfo['paperName']; ?></td>
                            </tr>
                            <tr>
                                <th>评价要素
                                </th>
                                <th colspan = "4">参考内容</th>
                                <th colspan = "1">评分</th>
                            </tr>
                            <tr>
                                <th><p>论文选题</p></th>
                                <th colspan = "4">接触学科前沿，理论或实际意义</th>
                                <th colspan = "1">
                                    <?php echo getEvaInfoC($evaInfo['c1']); ?>
                                </th>
                            </tr>
                            <tr>
                                <th><p>文献综述</p></th>
                                <th colspan = "4">阅读量、综合分析能力，了解本学科专业学术动态程度义</th>
                                <th colspan = "1">
                                    <?php echo getEvaInfoC($evaInfo['c2']); ?>
                                </th>
                            </tr>
                            <tr>
                                <th><p>成果与创新</p></th>
                                <th colspan = "4">论文成果与新见解</th>
                                <th colspan = "1">
                                    <?php echo getEvaInfoC($evaInfo['c3']); ?>
                                </th>
                            </tr>
                            <tr>
                                <th><p>论基础理论与专门知识 </p></th>
                                <th colspan = "4">基础理论的坚实度、专门知识的系统性</th>
                                <th colspan = "1">
                                    <?php echo getEvaInfoC($evaInfo['c4']); ?>
                                </th>
                            </tr>
                            <tr>
                                <th><p>研究手段或设计能力</p></th>
                                <th colspan = "4">研究方法是否恰当并加以严格论证，独立进行分析问题，解决问题的能力如何</th>
                                <th colspan = "1">
                                    <?php echo getEvaInfoC($evaInfo['c5']); ?>
                                </th>
                            </tr>
                            <tr>
                                <th><p>写作能力与学风</p></th>
                                <th colspan = "4">条理性、逻辑性、文笔等各方面，书写格式、图表是否规范</th>
                                <th colspan = "1">
                                    <?php echo getEvaInfoC($evaInfo['c6']); ?>
                                </th>
                            </tr>
                            <tr>
                                <th><p>工作量</p></th>
                                <th colspan = "4">工作量及难度</th>
                                <th colspan = "1">
                                    <?php echo getEvaInfoC($evaInfo['c7']); ?>
                                </th>
                            </tr>
                            <tr>
                                <th><p>参考文献</p></th>
                                <th colspan = "4">参考文献的总量；外文文献的数量；参考文献的质量等。</th>
                                <th colspan = "1">
                                    <?php echo getEvaInfoC($evaInfo['c8']); ?>
                                </th>
                            </tr>
                            <tr>
                                <th><p>是否抄袭</p></th>
                                <th colspan = "5">
                                    <?php echo getEvaInfoC9($evaInfo['c9']); ?>
                                </th>
                            </tr>
                            <tr>
                                <th><p>论文能否答辩</p></th>
                                <th colspan = "5">
                                    <?php echo getEvaInfoC10($evaInfo['c10']); ?>
                                </th>
                            <tr>
                                <th><p>对论文水平的总体评价</p></th>
                                <th colspan = "5">
                                    <?php echo getEvaInfoC($evaInfo['c11']); ?>
                                </th>
                            </tr>
                            <tr>
                                <td colspan = "6">
                                    <strong>论文的不足之处及对论文工作的意见或建议:</strong>
                                    <hd>
                                    <p><?php echo $evaInfo['summary']; ?></p>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
                <!--/span-->
            </div>
            <!--/row-->
        </div>
        <!--/#content.span10-->
    </div>
    <!--/fluid-row-->
</div>
<!--/.fluid-container-->
<script>
    function myPrint() {
        window.print();
    }
</script>
</body>
</html>