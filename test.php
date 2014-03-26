<?php
include("myFunction.php");
if (isset($_GET['vehicle'])) {
    print_r($_GET['vehicle']);
}
$PHP_SELF=$_SERVER['PHP_SELF'];
$url='http://'.$_SERVER['HTTP_HOST'].substr($PHP_SELF,0,strrpos($PHP_SELF,'/')+1);
echo $url . "<br/>";
echo $PHP_SELF;
echo time();;
?>
<html>
<head>
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $(".btn1").click(function(){
                $("p").text("Hello world!");
            });
        });
    </script>
</head>
<body>
<p>This is a paragraph.</p>
<p>This is another paragraph.</p>
<button class="btn1">改变所有 p 元素的文本内容</button>
</body>
</html>
