<?php

$db_host = "localhost";
$db_table = "o2o";
$db_username="username";
$db_password="password";

if(!@mysql_connect($db_host, $db_username, $db_password)) die ("連線失敗1");

if(!@mysql_select_db($db_table)) die("連線失敗2");
mysql_query("SET NAMES'utf8'");


?>
