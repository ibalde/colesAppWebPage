<?php 
$server = "localhost";
$username = "root";
$password = "";

$con = mysql_connect($server, $username, $password);

if(!$con) die ("Failed to connect to server: ".mysql_error());

mysql_select_db("test") or die("Failed to select db: ".mysql_error());


?>