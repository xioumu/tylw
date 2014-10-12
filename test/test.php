<html>
<body>
<form action="test.php" method="post" enctype="multipart/form-data">
<input  id = "report" type = "file" name = "paperFile"/>
<input type="submit"/>
</form>
<?php
    if (isset($_FILES['paperFile']["name"])) {
        echo $_FILES['paperFile']["name"];
    }
?>
</body>
</html>
