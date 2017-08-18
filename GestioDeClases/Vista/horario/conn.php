<?php
if(!defined('INCLUDE_CHECK')) die('NO Permission to execute this file directly');

/* DB Connection */
$db_host= 'localhost';
$db_user= 'root';
$db_pass= '';
$db_database= 'bd_pro';

$conn = mysql_connect($db_host, $db_user, $db_pass) or die('Database Connection Error');

mysql_select_db($db_database, $conn);
mysql_query("SET names UTF8");
?>