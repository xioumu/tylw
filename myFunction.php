<?php
function loginCheck($username, $passwd) {
    $result = mysql_query("SELECT * FROM user WHERE user = '{$username}' ");
    if ($row = mysql_fetch_array($result)) {
        if ($row['passwd'] === $passwd) {
            return true;
        }
        else return false;
    }
    else return false;
}

function getUserType($username) {
    $result = mysql_query("SELECT * FROM user WHERE user = '{$username}' ");
    if ($row = mysql_fetch_array($result)) {
        return $row['uType'];
    }
    else  echo "错误的用户名";
}
?>