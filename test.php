<?php
include("myFunction.php");
if (isset($_GET['vehicle'])) {
    print_r($_GET['vehicle']);
}
?>
<html>
<body>

<form action="test.php" method="get">
    <input type="checkbox" name="vehicle[]" value="Bike" onabort=alert()"/> I have a bike<br />
    <input type="checkbox" name="vehicle[]" value="Car" /> I have a car<br />
    <input type="checkbox" name="vehicle[]" value="Airplane" /> I have an airplane<br />
    <input type="submit" value="Submit" />
</form>

<p>请单击确认按钮，输入会发送到服务器上名为 "form_action.asp" 的页面。</p>

</body>
</html>

?>
