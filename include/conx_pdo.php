<?php

if($_SERVER['HTTP_HOST'] == "localhost:8080"){
    $mysql_hostname = "db";
    $mysql_user = "root";
    $mysql_password = "test";
    $mysql_database = "dbname";
}else{
    $mysql_database = "neum68927_neumaequipos";
    $mysql_hostname = "localhost";
    $mysql_user = "neum68927_taoista";
    $mysql_password = "7340458Tao";

}

$base = new PDO('mysql:host='.$mysql_hostname.'; dbname='.$mysql_database, $mysql_user, $mysql_password);
// $base = new PDO('mysql:host=db;dbname=dbname', 'root', 'test');
$base->exec("SET CHARACTER SET utf8");

?>