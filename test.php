<html>
<body>
<?php include('css.php'); ?>
<?php include('script.php'); ?>
<script type="text/javascript">
    $(function() {
        $("#checkall").click(function() {
            $("input[name='checkname[]']").each(function() {
                $(this).parent().addClass("checked");
            });
        });
        $("#delcheckall").click(function() {
            $("input[name='checkname[]']").each(function() {
                $(this).parent().removeClass("checked");
            });
        });
    });
</script>

<input type='checkbox' id='id1' name='checkname[]' value='1' />value1
<input type='checkbox' id='id2' name='checkname[]' value='2' />value2
<input type='checkbox' id='id3' name='checkname[]' value='3' />value3

<input type="button" id="checkall" name="checkall" value="1" />
<input type="button" id="delcheckall" name="delcheckall" value="2" /
</body>
</html>
