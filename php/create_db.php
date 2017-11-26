<?php
session_start();

$conn = mysql_connect('localhost','root','') or die("Can not connect to mysql!\n");

if(mysql_query("CREATE DATABASE user_db",$conn)){
	echo "Database created!\n";
}

mysql_select_db('user_db',$conn) or die("Can not connect to database!\n");

$sql = "CREATE TABLE user_info(name varchar(15),pswd varchar(20),email varchar(20))";
mysql_query($sql,$conn);

?>
