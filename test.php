<?php
include("myFunction.php");
if (isset($_GET['vehicle'])) {
    print_r($_GET['vehicle']);
}
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
