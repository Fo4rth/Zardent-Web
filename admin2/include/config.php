<?php
$mysql_hostname = "sdb-p.hosting.stackcp.net";
$mysql_user = "cs3101g1-31393881d6";
$mysql_password = "cs3101g1";
$mysql_database = "cs3101g1-31393881d6";
$bd = mysqli_connect($mysql_hostname, $mysql_user, $mysql_password, $mysql_database) or die("Could not connect database");

?>