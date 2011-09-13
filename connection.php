<?php
$hostname_conn = "localhost";
$database_conn = "jsnodgrass";
$username_conn = "jsnodgrass";
$password_conn = "jhizzle";

$conn = mysql_connect($hostname_conn, $username_conn, $password_conn);// or trigger_error(mysql_error(),E_USER_ERROR);
mysql_select_db($database_conn, $conn);
?>