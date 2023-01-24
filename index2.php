<?php
echo $_SERVER['HTTP_HOST'];


$mysql_hostname = "database";
$mysql_user = "root";
$mysql_password = "";
$mysql_database = "database";
// $link = mysqli_connect("localhost", "root", "");
// mysql_select_db("rotem",$link) OR DIE ("Error: No es posible establecer la conexión");
// mysql_set_charset('utf8');
$mysqli = new mysqli($mysql_hostname, $mysql_user, $mysql_password,$mysql_database) or die("Error: No es posible establecer la conexión");
$mysqli->set_charset("utf8");

?>