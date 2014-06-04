cd /d %~dp0
mysqldump -uroot -p11 tylw >upFile\tylw.sql
php backups.php
